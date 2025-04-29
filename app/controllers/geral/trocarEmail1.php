<?php

require_once('./app/models/connect.php');

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

  $db = new Database();
  $db->connect();

  $sql = "SELECT senha_cliente FROM cliente WHERE id_cliente = :id";
  $params = [':id' => $cliente_id];
  $result = $db->executeQuery($sql, $params);

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

  $db->disconnect();
  exit();
}
