<?php

    require_once __DIR__ . '/core/Core.php';
    require_once __DIR__ . '/config/routes.php';    

    if (! isset($_SESSION)) {
        session_start();
    }

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