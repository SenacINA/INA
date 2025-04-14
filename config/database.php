<?php
// config/database.php

// Configurações do Banco de Dados
define('DB_HOST', 'localhost');     // Host do MySQL
define('DB_NAME', 'e2_database'); // Nome do seu banco de dados
define('DB_USER', 'root');          // Usuário do banco
define('DB_PASS', '');     // Senha do banco

try {
    // Conexão PDO
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . 
        ";dbname=" . DB_NAME . 
        ";charset=utf8",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    // Em caso de erro na conexão
    die("Erro de conexão: " . $e->getMessage());
}

// Funções úteis (opcional)
function db_prepare($sql) {
    global $pdo;
    return $pdo->prepare($sql);
}
?>