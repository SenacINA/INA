<?php    

class VendedorProductController extends RenderView {
    public function pedidos() {
        $this->loadView('vendedor/GerenciarPedidos', []);
    }

    public function confirm() {
        $this->loadView('vendedor/ConfirmarPedido', []);
    }

    public function create() {
        $this->loadView('vendedor/RegistroProduto', []);
    }

    public function edit() {
        $this->loadView('vendedor/EditarProduto', []);
    }

    public function report() {
        $this->loadView('vendedor/RelatorioVendas', []);
    }

}