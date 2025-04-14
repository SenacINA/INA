<?php
session_start();
require_once('../../../config/database.php'); // Arquivo de configuração do banco

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // Conexão com o banco (exemplo)
    $db = new PDO("mysql:host=localhost;dbname=seu_banco", "usuario", "senha");
    
    // Buscar usuário
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Cria a sessão
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email']
            // Adicione outros dados relevantes
        ];
        
        // Redireciona
        header('Location: /pagina-restrita');
        exit();
    } else {
        $_SESSION['erro_login'] = "Credenciais inválidas!";
        header('Location: /login');
        exit();
    }
}