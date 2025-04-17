<?php
    // session_start();

    $routes = require __DIR__ . '/config/routes.php';
    

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // echo $uri;
    // echo $routes['/'];

    if ($uri === '/INA/index.php') {

        header("Location: " . $routes['/']);
        
    }

    else {
        http_response_code(404);
        header("Location: ./app/views/geral/error.php");
    }
