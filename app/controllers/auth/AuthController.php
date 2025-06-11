<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';


class AuthController extends RenderView {
    public function requestEmailReset() {
      $this->loadView('geral/TrocarEmail_1', []);
    }
    public function confirmEmailReset() {
      $this->loadView('geral/TrocarEmail_2', []);
    }
    public function requestPasswordReset() {
      $this->loadView('geral/RedefinirSenha_1', []);
    }
    public function confirmPasswordReset() {
      $this->loadView('geral/RedefinirSenha_2', []);
    }

    public function loginForm()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }

        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['senha'] ?? '';

        $errors = [];

        if (empty($email) || empty($password)) {
            $errors[] = 'Preencha todos os campos.';
            $this->loadView('cliente/Login', ['errors' => $errors]);
            exit;
        }

        $db = new Database();
        $db->connect();

        $sql    = "SELECT * FROM cliente WHERE email_cliente = :email";
        $params = [':email' => $email];
        $result = $db->executeQuery($sql, $params);

        if ($result) {
            $user = $result[0];
            $storedHash = $user['senha_cliente'];

            if ($result[0]['status_conta_cliente'] != 1) {
                $errors[] = 'Conta suspensa';
                $this->loadView('cliente/Login', ['errors' => $errors]);
                exit;
            }

            if (password_verify($password, $storedHash)) {
                $_SESSION['cliente_id'] = $user['id_cliente'];

                $tipoConta = $user['tipo_conta_cliente'];

                if ($tipoConta == 0) {
                    $_SESSION['user_type'] = 'admin';
                    header('Location: AdminDashboard');
                } elseif ($tipoConta == 1) {
                    $_SESSION['user_type'] = 'vendedor';
                    header('Location: Perfil');
                } elseif ($tipoConta == 2) {
                    $_SESSION['user_type'] = 'cliente';
                    header('Location: Perfil');
                } else {
                    $_SESSION['user_type'] = 'desconhecido';
                    header('Location: Perfil');
                }

                exit;
            } else {
                $errors[] = 'Senha inválida.';
                $this->loadView('cliente/Login', ['errors' => $errors]);
                exit;
            }
        } else {
            $errors[] = 'Usuário não encontrado.';
            $this->loadView('cliente/Login', ['errors' => $errors]);
            exit;
        }

        $db->disconnect();
    }



  public function logout()
  {
    if (! isset($_SESSION)) {
      session_start();
  }
    session_destroy();
    http_response_code(200);
    // echo json_encode(['status' => 'success', 'message' => 'Sesssão destruida']);
    // $this->loadView('geral/home', []);
    header('Location: index.php');
    exit();
  }
}
  
  