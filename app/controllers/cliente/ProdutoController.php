<?php    

class ProdutoController extends RenderView {
    public function index() {
        $this->loadView('cliente/produto', []);
    }
}
