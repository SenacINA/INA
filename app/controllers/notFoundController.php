<?php

class notFoundController extends RenderView {
    public function index () {
        $this->loadView('error', [
            'title' => 'Home',
            'users' => 'eu',
        ]);
    }
}