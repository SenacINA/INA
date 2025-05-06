<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';
require_once __DIR__.'/../../models/geral/GeralModel.php';


class ClienteController extends RenderView {
    public function perfil() {
        $this->loadView('cliente/perfil_cliente', []);
    }

    public function editarPerfil() {
        $this->loadView('cliente/editar_perfil', []);
    }

    public function dados( ) {
        $this->loadView('cliente/carrinho_dados', []);
    }

    public function pagamentos( ) {
        $this->loadView('cliente/carrinho_pagamentos', []);
    }

    public function login() {
        $this->loadView('cliente/login', []);
    }

    public function cadastro()
      {
          $this->loadView('cliente/cadastro', []);
      }
    
    public function editarRedes() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }
        header('Content-Type: application/json; charset=utf-8');

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $confirma = $_POST['confirmaSenha'] ?? '';

        $errors = [];

        if (!$nome || !$email || !$senha || !$confirma) {
            $errors[] = 'Preencha todos os campos.';
        }
        if (strlen($senha) < 6) {
            $errors[] = 'A senha deve ter ao menos 6 caracteres.';
        }
        if (!preg_match('/[a-z]/', $senha)) {
            $errors[] = 'A senha deve conter ao menos uma letra minúscula.';
        }
        if (!preg_match('/\d/', $senha)) {
            $errors[] = 'A senha deve conter ao menos um número.';
        }

        if (preg_match('/\s/', $senha)) {
            $errors[] = 'A senha não pode conter espaços.';
        }

        if ($senha !== $confirma) {
            $errors[] = 'As senhas não coincidem.';
        }

        $model = new ClienteModel();
        if ($model->emailExists($email)) {
            $errors[] = 'Este e-mail já está cadastrado.';
        }

        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors'  => $errors
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $hash = password_hash($senha, PASSWORD_BCRYPT);
        $ok   = $model->createUser($nome, $email, $hash);

        if ($ok) {
            echo json_encode([
            'success' => true,
            'message' => 'Cadastro realizado com sucesso!'
            ], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode([
            'success' => false,
            'errors'  => ['Erro interno, tente novamente mais tarde.']
            ], JSON_UNESCAPED_UNICODE);
        }
        exit;
    }

    public function updateSocial()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }
        header('Content-Type: application/json; charset=utf-8');

        $clienteId = $_SESSION['cliente_id'] ?? null;
        if (!$clienteId) {
            http_response_code(401);
            echo json_encode([
                'success' => false,
                'errors'  => ['Não autenticado.']
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $data = [
            'descricao' => trim($_POST['descricao'] ?? ''),
            'instagram' => trim($_POST['instagram'] ?? ''),
            'facebook' => trim($_POST['facebook'] ?? ''),
            'linkedin' => trim($_POST['linkedin'] ?? ''),
            'youtube' => trim($_POST['youtube'] ?? ''),
            'tiktok' => trim($_POST['tiktok'] ?? ''),
            'x' => trim($_POST['x'] ?? ''),
        ];

        $errors = [];

        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors'  => $errors
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $model = new GeralModel();
        $ok = $model->updateSocial((int)$clienteId, $data);

        if ($ok) {
            echo json_encode([
                'success' => true,
                'message' => 'Redes sociais atualizadas com sucesso!'
            ], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([
                'success' => true,
                'message' => 'Nenhuma mudança detectada.'
            ], JSON_UNESCAPED_UNICODE);
        }
        exit;
    }

}
