<?php
require_once __DIR__ . '/../../models/cliente/ClienteModel.php';
require_once __DIR__ . '/../../models/vendedor/VendedorModel.php';

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
        $model = new VendedorModel();
        $idVendedor = $model->getVendedorId($_SESSION['cliente_id']);
        
        $lastCodProduct = $model->getLastCod($idVendedor) ?? 1000;

        $this->loadView('vendedor/RegistroProduto', ['proxCod' => $lastCodProduct + 1]);
    }

    public function edit() {
        $this->loadView('vendedor/EditarProduto', []);
    }

    public function report() {
        $this->loadView('vendedor/RelatorioVendas', []);
    }
}