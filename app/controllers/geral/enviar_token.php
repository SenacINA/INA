<?php
require_once '../../models/connect.php'; // ajuste o caminho conforme sua estrutura

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

$link = "http://localhost/INA/app/views/geral/redefinir_senha_2.php?token=$token";

// ⚠️ Envio de e-mail simples (teste básico)
mail($email, "Redefina sua senha", "Clique aqui: $link");

echo json_encode(["mensagem" => "Enviamos um link para o seu e-mail."]);
