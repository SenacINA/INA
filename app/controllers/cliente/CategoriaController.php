<?php    

class CategoriaController extends RenderView {
    public function index() {
        $this->loadView('cliente/Categoria', []);
    }
}
