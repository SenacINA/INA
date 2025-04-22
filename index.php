<?php
    // session_start();
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    // $routes = require __DIR__ . '/config/routes.php';
    
    require_once __DIR__ . '/core/Core.php';
    require_once __DIR__ . '/config/routes.php';

    spl_autoload_register(function($className) {
        $paths = [
            __DIR__ . '/utils/',
            __DIR__ . '/app/models/',
            __DIR__ . '/app/controllers/',
        ];

        foreach ($paths as $path) {
            $file = $path . $className . '.php';
            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    });



    $core = new Core();
    $core -> run($routes);

    // $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // $uri = str_ireplace("/INA/", '', $uri);
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

    // if (array_key_exists($uri, $routes)) {
    //     require(__DIR__ . $routes[$uri]);
    // } else {
    //     require(__DIR__ . $routes['404']);
    // }