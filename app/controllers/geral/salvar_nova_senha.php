<?php
require_once __DIR__ . '/../../models/connect.php';

$db = new Database();
$db->connect();
$pdo = $db->getConnection();

$senha = $_POST['senha'] ?? '';
$novaSenha = $_POST['nova_senha'] ?? '';
$token = $_POST['token'] ?? '';

if (!$senha || !$novaSenha || !$token) {
    echo json_encode(["mensagem" => "Preencha todos os campos."]);
    exit;
}

if ($senha !== $novaSenha) {
    echo json_encode(["mensagem" => "As senhas não coincidem."]);
    exit;
}

if (strlen($senha) < 8) {
    echo json_encode(["mensagem" => "A senha deve ter no mínimo 8 caracteres."]);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM redefinicao_senha WHERE token = ? AND usado = 0 AND expira_em > NOW()");
$stmt->execute([$token]);
$registro = $stmt->fetch();

if (!$registro) {
    echo json_encode(["mensagem" => "Token inválido ou expirado."]);
    exit;
}

$hashSenha = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("UPDATE cliente SET senha_cliente = ? WHERE id_cliente = ?");
$stmt->execute([$hashSenha, $registro['id_cliente']]);

$stmt = $pdo->prepare("UPDATE redefinicao_senha SET usado = 1 WHERE token = ?");
$stmt->execute([$token]);

echo json_encode(["mensagem" => "Senha alterada com sucesso!"]);
