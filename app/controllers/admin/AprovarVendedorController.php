<?php
require_once('./app/models/admin/AprovarVendedorModel.php');

class AprovarVendedorController
{
    public VendedorModel $model;
    public array $filtros;
    public array $lista;
    
    public function __construct()
    {
        $this->model = new VendedorModel();
        $this->processarRequisicao();
        $this->carregarFiltros();
        $this->buscarLista();
    }

    private function loadView(string $viewPath, array $data = []): void
    {
        extract($data);
        require_once("./app/views/{$viewPath}.php");
    }

    public function index()
    {
        $estatisticas = $this->model->getEstatisticas();
        $this->loadView('admin/AprovarVendedor', [
            'lista'        => $this->lista,
            'estatisticas' => $estatisticas
        ]);
    }

    private function processarRequisicao(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'], $_POST['vendedor_id'])) {
            $acao = $_POST['acao'];
            $id   = (int)$_POST['vendedor_id'];

            if ($acao === 'aprovar') {
                $this->model->atualizarStatus($id, 'Aprovado');
            } elseif ($acao === 'reprovar') {
                $this->model->atualizarStatus($id, 'Reprovado');
            } elseif ($acao === 'inativar') {
                $this->model->atualizarStatus($id, 'Inativado');
            } elseif ($acao === 'ativar') {
                $this->model->atualizarStatus($id, 'Pendente');
            }
        }
    }

    private function carregarFiltros(): void
    {
        $this->filtros = [
            'search' => $_POST['search'] ?? '',
            'status' => $_POST['status'] ?? '',
            'mes'    => $_POST['mes']    ?? '',
            'ano'    => $_POST['ano']    ?? '',
        ];
    }

    private function buscarLista(): void
    {
        $this->lista = $this->model->getRequisicoes($this->filtros);
    }
}
