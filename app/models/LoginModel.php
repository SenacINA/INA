<?php
session_start();
require_once('../../../config/database.php'); // Database configuration file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // Database connection using PDO
    $db = new PDO("mysql:host=localhost;dbname=seu_banco", "usuario", "senha");
    
    // Query user
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Create user session
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email']
            // Other relevant data can be added here
        ];
        
        // Redirect to a restricted area
        header('Location: /pagina-restrita');
        exit();
    } else {
        $_SESSION['erro_login'] = "Credenciais inválidas!";
        header('Location: /Login');
        exit();
    }
}
