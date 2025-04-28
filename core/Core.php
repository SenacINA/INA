<?php

class Core {
    public function run($routes) {
        $url = '/' . ($_GET['url'] ?? '');

        if ($url !== '/') {
            $url = rtrim($url, '/');
        }

        $routerFound = false;

        foreach ($routes as $path => $controller) {
            $pattern = '#^' . preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                
                [$namespace, $controllerAction] = explode('/', $controller); 
                [$controllerName, $action] = explode('@', $controllerAction);
                
                $filePath = __DIR__ . "/../app/controllers/$namespace/$controllerName.php";

                if (file_exists($filePath)) {
                    require_once $filePath;

                    $fullControllerName = $controllerName;
                    $routerFound = true;

                    $newController = new $fullControllerName();
                    $newController->$action(...array_values($matches));
                    return;
                }
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . "/../app/controllers/geral/notFoundController.php";
            $controller = new notFoundController();
            $controller->index();
        }
    }
}
