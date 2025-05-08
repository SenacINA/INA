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

    public function editarDadosCliente()
    {
        header('Content-Type: application/json; charset=utf-8');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success'=>false,'errors'=>['Método não permitido.']], JSON_UNESCAPED_UNICODE);
            exit;
        }
        $clienteId = $_SESSION['cliente_id'] ?? null;
        if (!$clienteId) {
            http_response_code(401);
            echo json_encode(['success'=>false,'errors'=>['Usuário não autenticado.']], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $input     = json_decode(file_get_contents('php://input'), true) ?? [];
        $nome      = trim($input['nomeCliente']        ?? '');
        $cidadeId  = trim($input['localizacaoCliente'] ?? '');
        $rawFoto   = $input['foto']                    ?? null;
        $rawBanner = $input['banner']                  ?? null;

        $errors = [];
        if ($nome === '')     $errors[] = 'O nome não pode ficar em branco.';
        if ($cidadeId === '') $errors[] = 'Selecione uma localização.';

        // valida Base64
        if ($rawFoto && !preg_match('#^data:image/(jpeg|jpg|png);base64,#', $rawFoto)) {
            $errors[] = 'Formato de foto inválido.';
            $rawFoto = null;
        }
        if ($rawBanner && !preg_match('#^data:image/(jpeg|jpg|png);base64,#', $rawBanner)) {
            $errors[] = 'Formato de banner inválido.';
            $rawBanner = null;
        }

        $geral = new GeralModel();
        // 4 MB máximo
        $maxSize = 4 * 1024 * 1024;

        $binFoto   = null;
        $binBanner = null;

        // decodifica e checa tamanho
        if (empty($errors) && $rawFoto) {
            $raw  = substr($rawFoto, strpos($rawFoto, ',') + 1);
            $bin  = base64_decode($raw);
            if ($bin === false || strlen($bin) > $maxSize) {
                $errors[] = 'Foto muito grande (máx 4 MB).';
            } else {
                $binFoto = $bin;
            }
        }

        if (empty($errors) && $rawBanner) {
            $raw  = substr($rawBanner, strpos($rawBanner, ',') + 1);
            $bin  = base64_decode($raw);
            if ($bin === false || strlen($bin) > $maxSize) {
                $errors[] = 'Banner muito grande (máx 4 MB).';
            } else {
                $binBanner = $bin;
            }
        }

        if (empty($errors)) {
            $ok1 = $geral->updateNome($clienteId, $nome);
            $ok2 = $geral->updateLocalizacao($clienteId, (int)$cidadeId);
            $ok3 = true;
            $ok4 = true;

            if ($binFoto)   $ok3 = $geral->updateFotoBlob($clienteId, $binFoto);
            if ($binBanner) $ok4 = $geral->updateBannerBlob($clienteId, $binBanner);

            if ($ok1 && $ok2 && $ok3 && $ok4) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Perfil atualizado com sucesso!'
                ], JSON_UNESCAPED_UNICODE);
                exit;
            }
            $errors[] = 'Erro ao salvar no banco. Tente novamente.';
        }

        echo json_encode([
            'success' => false,
            'errors'  => $errors
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }



}
