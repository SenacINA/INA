<?php

require_once './app/models/admin/RelatorioVendedorModel.php';

class RelatorioVendedorController {
    private $model;

    public function __construct() {
        $this->model = new RelatorioVendedorModel();
    }

    public function handle(): array {
        $vendas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vendedor_id'])) {
            $vendedorId = intval($_POST['vendedor_id']);
            $vendas = $this->model->buscarPorVendedor($vendedorId);
        }

        return $vendas;
    }
}