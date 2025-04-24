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
          session_start();
          $model = new ClienteModel();
  
          // Se for GET, só renderiza a página
          if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
              $this->loadView('cliente/cadastro', []);
              return;
          }
  
          // Captura e sanitiza
          $nome         = trim($_POST['nome']         ?? '');
          $email        = trim($_POST['email']        ?? '');
          $senha        = $_POST['senha']             ?? '';
          $confirmaSenha= $_POST['confirmaSenha']     ?? '';
  
          $errors = [];
  
          // 1) validações básicas
          if (!$nome || !$email || !$senha || !$confirmaSenha) {
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
          if ($senha !== $confirmaSenha) {
              $errors[] = 'As senhas não coincidem.';
          }
          // 2) email duplicado?
          if ($model->emailExists($email)) {
              $errors[] = 'Este e-mail já está cadastrado.';
          }
  
          // Se houve erros, grava em sessão e redireciona de volta
          if ($errors) {
              $_SESSION['flash_errors'] = $errors;
              // guarda valores já digitados
              $_SESSION['flash_old']    = ['nome'=>$nome, 'email'=>$email];
              header('Location: /INA/cadastro-cliente');
              exit;
          }
  
          // 3) cria usuário (hash Bcrypt)
          $hash = password_hash($senha, PASSWORD_BCRYPT);
          $model->createUser($nome, $email, $hash);
  
          // sucesso
          $_SESSION['flash_success'] = 'Cadastro realizado com sucesso!';
          header('Location: /INA/login-cliente');
          exit;
      }

}
