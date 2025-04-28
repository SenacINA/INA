<?php

function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        die("Erro: Arquivo .env não encontrado em $filePath");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $key = trim($parts[0], "\"'");
            $value = trim($parts[1], "\"'");

            putenv("$key=$value");
            $_ENV[$key] = $value; 
        }
    }
}

loadEnv(__DIR__ . '/../config.env');

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_CHARSET', $_ENV['DB_CHARSET']);
define('BASE_URL', '/INA');
