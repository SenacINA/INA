<?php    

class VendedorProductController extends RenderView {
    public function pedidos() {
        $this->loadView('vendedor/gerenciar_pedidos', []);
    }

    public function confirm() {
        $this->loadView('vendedor/confirmar_pedido', []);
    }

    public function create() {
        $this->loadView('vendedor/registro_produto', []);
    }

    public function edit() {
        $this->loadView('vendedor/editar_produto', []);
    }

    public function report() {
        $this->loadView('vendedor/relatorio_vendas', []);
    }

}