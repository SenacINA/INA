<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';


class AuthController extends RenderView {
    public function requestEmailReset() {
      $this->loadView('geral/trocar_email_1', []);
    }
    public function confirmEmailReset() {
      $this->loadView('geral/trocar_email_2', []);
    }
    public function requestPasswordReset() {
      $this->loadView('geral/redefinir_senha_1', []);
    }
    public function confirmPasswordReset() {
      $this->loadView('geral/redefinir_senha_2', []);
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
            $this->loadView('cliente/login', ['errors' => $errors]);
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

            if (password_verify($password, $storedHash)) {
                $_SESSION['cliente_id'] = $user['id_cliente'];

                $tipoConta = $user['tipo_conta_cliente'];

                if ($tipoConta == 0) {
                    $_SESSION['user_type'] = 'admin';
                    $this->loadView('admin/dashboard', []);
                } elseif ($tipoConta == 1) {
                    $_SESSION['user_type'] = 'vendedor';
                    $this->loadView('vendedor/perfil_vendedor', []);
                } elseif ($tipoConta == 2) {
                    $_SESSION['user_type'] = 'cliente';
                    $this->loadView('cliente/perfil_cliente', []);
                } else {
                    $_SESSION['user_type'] = 'desconhecido';
                    $this->loadView('cliente/perfil_cliente', []);
                }

                exit;
            } else {
                $errors[] = 'Senha inválida.';
                $this->loadView('cliente/login', ['errors' => $errors]);
                exit;
            }
        } else {
            $errors[] = 'Usuário não encontrado.';
            $this->loadView('cliente/login', ['errors' => $errors]);
            exit;
        }

        $db->disconnect();
    }



  public function logout()
  {
    session_start();
    session_destroy();
    http_response_code(200);
    // echo json_encode(['status' => 'success', 'message' => 'Sesssão destruida']);
    $this->loadView('geral/home', []);
    exit();
  }
}
  
  