<?php

require_once __DIR__ . '../../../models/geral/TrocarEmail1Model.php';

class TrocarEmail1Controller
{

  public function TrocarEmail()
  {
    if (!isset($_SESSION['cliente_id'])) {
      header("Location: login-cliente");
      exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      header('Content-Type: application/json');

      $senha = $_POST['senha_cliente'] ?? '';
      $cliente_id = $_SESSION['cliente_id'];

      if (empty($senha)) {
        echo json_encode([
          'status' => 'error',
          'messagem' => 'Senha não pode estar vazia.'
        ]);
        exit();
      }

      $model = new TrocarEmailModel;

      $result = $model->VerificarCLiente($_SESSION['cliente_id']);

      if (!$result) {
        echo json_encode([
          'status' => 'error',
          'messagem' => 'Cliente não encontrado.'
        ]);
        exit;
      }

      $storedHash = $result[0]['senha_cliente'];

      if (password_verify($senha, $storedHash)) {
        echo json_encode(['status' => 'success']);
      } else {
        echo json_encode([
          'status' => 'error',
          'messagem' => 'Senha incorreta.'
        ]);
      }

      exit();
    }
  }
}
