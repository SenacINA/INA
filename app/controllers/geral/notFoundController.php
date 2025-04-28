<?php

class notFoundController extends RenderView {
    public function index () {
        $this->loadView('geral/error', []);
    }
}