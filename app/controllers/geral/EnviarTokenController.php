<?php
header('Content-Type: application/json');

require_once __DIR__ . '../../../models/geral/EnviarTokenModel.php';

class EnviarTokenController
{
  private $model;
  public function __construct()
  {
    $this->model = new RedefinicaoSenhaModel();
  }

  public function gerarToken()
  {
    $email = $_POST['email'] ?? '';
    $cliente = $this->model->buscarClientePorEmail($email);

    $token = bin2hex(random_bytes(32));
    $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $this->model->salvarToken($cliente['id_cliente'], $token, $expira);

    $_SESSION['redefinir_senha_token'] = $token;

    echo json_encode([
      "mensagem" => "<p>Clique no link abaixo para redefinir sua senha</p>",
      "link" => "redefinir-senha-confirmar"
    ]);
  }

  public function salvarSenha()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405);
      exit;
    }

    $senha     = $_POST['senha'] ?? '';
    $novaSenha = $_POST['confirmaSenha'] ?? '';
    $token     = $_POST['token'] ?? '';

    $errors = [];

    if (!$senha || !$novaSenha || !$token) {
      $errors[] = 'Preencha todos os campos.';
    }
    if (strlen($senha) < 8) {
      $errors[] = 'A senha deve ter no mínimo 8 caracteres.';
    }
    if (!preg_match('/[a-z]/', $senha)) {
      $errors[] = 'A senha deve conter pelo menos uma letra minúscula.';
    }
    if (!preg_match('/\d/', $senha)) {
      $errors[] = 'A senha deve conter pelo menos um número.';
    }
    if (preg_match('/\s/', $senha)) {
      $errors[] = 'A senha não pode conter espaços.';
    }
    if ($senha !== $novaSenha) {
      $errors[] = 'As senhas não coincidem.';
    }

    if (!empty($errors)) {
      echo json_encode([
        'success' => false,
        'errors' => $errors
      ], JSON_UNESCAPED_UNICODE);
      return;
    }

    $registro = $this->model->validarToken($token);
    if (!$registro) {
      echo json_encode([
        'success' => false,
        'errors' => ['Token inválido ou expirado.']
      ], JSON_UNESCAPED_UNICODE);
      return;
    }

    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
    $this->model->atualizarSenha($registro['id_cliente'], $hashSenha);
    $this->model->marcarTokenComoUsado($token);

    echo json_encode([
      'success' => true,
      'message' => 'Senha alterada com sucesso!'
    ], JSON_UNESCAPED_UNICODE);
  }
}
