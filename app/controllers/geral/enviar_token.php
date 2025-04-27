<?php
require_once __DIR__ . '/../../models/connect.php';

$db = new Database();
$db->connect();
$pdo = $db->getConnection();

$email = $_POST['email'] ?? '';

$stmt = $pdo->prepare("SELECT id_cliente FROM cliente WHERE email_cliente = ?");
$stmt->execute([$email]);
$cliente = $stmt->fetch();

if (!$cliente) {
    echo json_encode(["mensagem" => "E-mail não encontrado."]);
    exit;
}

$token = bin2hex(random_bytes(32));
$expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

$stmt = $pdo->prepare("INSERT INTO redefinicao_senha (id_cliente, token, expira_em) VALUES (?, ?, ?)");
$stmt->execute([$cliente['id_cliente'], $token, $expira]);

// ⚡ Em vez de enviar e-mail, vamos gerar o link
$link = "http://localhost/INA/app/views/geral/redefinir_senha_2.php?token=$token";

// Agora enviamos o link junto no JSON
echo json_encode([
    "mensagem" => "Clique no link abaixo para redefinir sua senha:",
    "link" => $link
]);
