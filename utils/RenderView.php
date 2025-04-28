<?php

class RenderView {
    public function loadView($view, $args) {
        extract($args);

        require_once __DIR__ . "/../app/views/$view.php";
    }
}