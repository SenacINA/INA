<?php

class Core {
    public function run($routes) {
        $url = '/' . ($_GET['url'] ?? '');

        ($url != '/') ? $url = rtrim($url, '/') : '';

        $routerFound = false;

        foreach ($routes as $path => $controller) {
            $pattern = '#^' . preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                [$currentController, $action] = explode('@', $controller);
                require_once __DIR__ . "/../app/controllers/$currentController.php";

                $routerFound = true;

                $newController = new $currentController();
                $newController->$action(...array_values($matches));
                return;
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . "/../app/controllers/notFoundController.php";
            $controller = new notFoundController();
            $controller->index();
        }
    }
}
