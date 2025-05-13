<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../models/connect.php';

class EnviarTokenController {
    public function gerarToken() {
        $db = new Database();
        $db->connect();
        $pdo = $db->getConnection();

        $email = $_POST['email'] ?? '';

        $stmt = $pdo->prepare("SELECT id_cliente FROM cliente WHERE email_cliente = ?");
        $stmt->execute([$email]);
        $cliente = $stmt->fetch();

        if (!$cliente) {
            echo json_encode(["mensagem" => "E-mail não encontrado."]);
            return;
        }

        $token = bin2hex(random_bytes(32));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $stmt = $pdo->prepare("INSERT INTO redefinicao_senha (id_cliente, token, expira_em) VALUES (?, ?, ?)");
        $stmt->execute([$cliente['id_cliente'], $token, $expira]);

        $_SESSION['redefinir_senha_token'] = $token;
        $link = "redefinir-senha-confirmar";

        echo json_encode([
            "mensagem" => "Clique no link abaixo para redefinir sua senha:",
            "link" => $link
        ]);
    }

    public function salvarSenha() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }
    
        header('Content-Type: application/json; charset=utf-8');
    
        $db = new Database();
        $db->connect();
        $pdo = $db->getConnection();
    
        $senha      = $_POST['senha'] ?? '';
        $novaSenha  = $_POST['confirmaSenha'] ?? '';
        $token      = $_POST['token'] ?? '';
    
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
                'errors'  => $errors
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        // Validação do token
        $stmt = $pdo->prepare("SELECT * FROM redefinicao_senha WHERE token = ? AND usado = 0 AND expira_em > NOW()");
        $stmt->execute([$token]);
        $registro = $stmt->fetch();
    
        if (!$registro) {
            echo json_encode([
                'success' => false,
                'errors'  => ['Token inválido ou expirado.']
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
    
        // Atualiza senha
        $stmt = $pdo->prepare("UPDATE cliente SET senha_cliente = ? WHERE id_cliente = ?");
        $stmt->execute([$hashSenha, $registro['id_cliente']]);
    
        // Marca o token como usado
        $stmt = $pdo->prepare("UPDATE redefinicao_senha SET usado = 1 WHERE token = ?");
        $stmt->execute([$token]);
    
        echo json_encode([
            'success' => true,
            'message' => 'Senha alterada com sucesso!'
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
    
}
