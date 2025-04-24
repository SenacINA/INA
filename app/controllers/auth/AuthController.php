<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';


class AuthController extends RenderView {
    public function requestEmailReset() {
      $this->loadView('geral/redefinir_email_1', []);
    }
    public function confirmEmailReset() {
      $this->loadView('geral/redefinir_email_2', []);
    }
    public function requestPasswordReset() {
      $this->loadView('geral/redefinir_senha_1', []);
    }
    public function confirmPasswordReset() {
      $this->loadView('geral/redefinir_senha_2', []);
    }

    public function login()
      {
        session_start();
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        

        // 1) valida campos vazios
        if (!$email || !$senha) {
            header("Location: /INA/login-cliente?error=emptyfields");
            exit;
        }

        // 2) busca usuário
        $model = new ClienteModel();
        $user  = $model->findByEmail($email);

        if (!$user) {
            header("Location: /INA/login-cliente?error=notfound");
            exit;
        }

        // 3) verifica a senha usando password_verify
        if (!password_verify($senha, $user['senha_cliente'])) {
            header("Location: /INA/login-cliente?error=invalidpassword");
            exit;
        }

        // 4) sucesso
        $_SESSION['cliente_id'] = $user['id_cliente'];
        header("Location: /INA/perfil-cliente");
        exit;
    }


  public function logout()
  {
    session_start();
    session_destroy();
    header("Location: /INA/");
    exit;
  }
}
  
  