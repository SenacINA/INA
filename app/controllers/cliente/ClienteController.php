<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';


class ClienteController extends RenderView {
    public function perfil() {
        $this->loadView('cliente/perfil', []);
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
        session_start();
        $error = $_GET['error'] ?? null;
        $this->loadView('cliente/login', ['error' => $error]);
      }

    public function cadastro()
      {
          // Se for GET, apenas exibe a view
          if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
              $this->loadView('cliente/cadastro', [
                  'old'    => [],
                  'errors' => []
              ]);
              return;
          }
  
          // Se POST, processa o formulário
          session_start();
          $nome         = trim($_POST['nome'] ?? '');
          $email        = trim($_POST['email'] ?? '');
          $senha        = $_POST['senha'] ?? '';
          $confirma     = $_POST['confirmaSenha'] ?? '';
          $errors       = [];
  
          // Validações
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
          if ($senha !== $confirma) {
              $errors[] = 'As senhas não coincidem.';
          }
  
          $model = new ClienteModel();
          if ($model->emailExists($email)) {
              $errors[] = 'Este e-mail já está cadastrado.';
          }
  
          // Se houver erros, volta para a view com eles
          if ($errors) {
            $query = http_build_query(['error' => $errors[0]]); // ou serialize array se preferir
            header("Location: /INA/cadastro-cliente?$query");
            exit;
            }  
        
  
          // Cria o usuário
          $hash = password_hash($senha, PASSWORD_BCRYPT);
          $model->createUser([
              'nome'   => $nome,
              'email'  => $email,
              'senha'  => $hash
          ]);
  
          // Redireciona com flag de sucesso
          header('Location: /INA/cadastro-cliente?cadastro=success');
          exit;
      }

}
