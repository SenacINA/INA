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
        // Apenas renderiza a view
        require_once("./app/views/admin/RelatorioVendedor.php");
    }

    public function exibirRelatorio()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['vendedor_id'])) {
                // Busca perfil e vendas do vendedor
                $vendedorId = (int)$_POST['vendedor_id'];
                $dados = $this->model->buscarPerfilVendedor($vendedorId);
                if (!$dados) {
                    echo json_encode(['success' => false, 'message' => 'Vendedor não encontrado.']);
                    return;
                }
                $vendas = $this->model->buscarPorVendedor($vendedorId);
                echo json_encode([
                    'success' => true,
                    'perfil' => $dados,
                    'vendas' => $vendas
                ]);
                return;
            } elseif (isset($_POST['listar_vendedores']) && $_POST['listar_vendedores'] == 1) {
                // Retorna a lista de vendedores para preencher a tabela inicial
                $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 10;
                $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
                $vendedores = $this->model->listarVendedores($limit, $offset);
                echo json_encode(['success' => true, 'vendedores' => $vendedores]);
                return;
            }
        }

        echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
    }
}
