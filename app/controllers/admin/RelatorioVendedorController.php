<?php

require_once './app/models/admin/RelatorioVendedorModel.php';

class RelatorioVendedorController
{
    private $model;

    public function __construct()
    {
        $this->model = new RelatorioVendedorModel();
    }

    public function index()
    {
        $vendedorId = $_POST['vendedor_id'] ?? null;
        if ($vendedorId) {
            $dados = $this->obterDadosRelatorio(intval($vendedorId));
            $vendas = $dados['vendas'];
            $perfil = $dados['perfil'];
        } else {
            $vendas = [];
            $perfil = null;
        }
        require_once("./app/views/admin/RelatorioVendedor.php");
    }

    public function obterDadosRelatorio($vendedorId)
    {
        $vendas = $this->model->buscarPorVendedor($vendedorId);
        $perfil = $this->model->buscarPerfilVendedor($vendedorId);
        return ['vendas' => $vendas, 'perfil' => $perfil];
    }

    public function exibirRelatorio()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vendedor_id'])) {
            $vendedorId = intval($_POST['vendedor_id']);
            $dados = $this->obterDadosRelatorio($vendedorId);

            if (!is_array($dados['vendas'])) {
                $dados['vendas'] = [];
            }

            echo json_encode(array_merge(['success' => true], $dados));
        } else {
            echo json_encode(['success' => false, 'message' => 'ID do vendedor não enviado']);
        }
    }
}
