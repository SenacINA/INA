<?php    

class CarrinhoController extends RenderView {
    public function index() {
        $this->loadView('cliente/carrinho', []);
    }
}
