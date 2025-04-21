<?php
    // session_start();
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $routes = require __DIR__ . '/config/routes.php';
    

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = str_ireplace("/INA/", '', $uri);
    // echo $uri;
    // echo $uri;
    // echo $routes['/'];

    // if ($uri === '/INA/index.php') {

    //     require(__DIR__ . $routes['/']);
    // }

    // elseif ($uri === '/INA/contato.php') {

    //     require(__DIR__ . $routes['/contato']);
    // }

    // else {
    //     require(__DIR__ . $routes['404']);
    // }

    if (array_key_exists($uri, $routes)) {
        require(__DIR__ . $routes[$uri]);
    } else {
        require(__DIR__ . $routes['404']);
    }