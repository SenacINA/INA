<?php

require_once __DIR__ . '/../../models/vendedor/VendaModel.php';

class VendaController extends RenderView
{
    public VendaModel $model;
    public ?string $id_venda = null;

    public function __construct()
    {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        }
        $this->model = new VendaModel();
    }

    public function pegarDados()
    {
        if ($this->id_venda === null) {
            return [
                'vendas' => [],
                'id_venda' => null,
                'data_compra' => null
            ];
        }

        $vendas = $this->model->getVendas((int)$this->id_venda);
        $dataCompra = null;

        if (!empty($vendas)) {
            setlocale(LC_TIME, 'pt_BR.utf8', 'pt_BR', 'Portuguese_Brazil.1252');
            $timestamp = strtotime($vendas[0]['data_compra']);
            $dataCompra = strftime('%d de %B de %Y, %H:%M', $timestamp);
        }

        return [
            'vendas' => $vendas,
            'id_venda' => $this->id_venda,
            'data_compra' => $dataCompra
        ];
    }

    public function exibirVenda()
    {
        $this->id_venda = $_POST['id_venda'] ?? null;
        $dados = $this->pegarDados();
        $this->loadView('vendedor/Venda', $dados);
    }
}
