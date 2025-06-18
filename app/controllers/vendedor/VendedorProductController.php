<?php
require_once __DIR__ . '/../../models/cliente/ClienteModel.php';
class VendedorProductController extends RenderView {
    public function __construct()
    {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        } else if ($_SESSION['user_type'] != "vendedor") {
            header("Location: page-not-found");
        }
    }
    public function pedidos() {
        $this->loadView('vendedor/GerenciarPedidos', []);
    }

    public function confirm() {
        $this->loadView('vendedor/PedidoConfirmar', []);
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