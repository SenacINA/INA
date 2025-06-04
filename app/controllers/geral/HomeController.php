<?php    

class HomeController extends RenderView {
    public function index() {
        $this->loadView('geral/Home', []);
    }
}
