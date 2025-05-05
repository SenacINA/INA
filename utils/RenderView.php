<?php

class RenderView {
    public function loadView($view, $args) {
        extract($args);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        require_once __DIR__ . "/../app/views/$view.php";
    }
}