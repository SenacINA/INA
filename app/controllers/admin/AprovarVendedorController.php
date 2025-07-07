<?php
require_once('./app/models/admin/AprovarVendedorModel.php');

class AprovarVendedorController
{
  public VendedorModel $model;
  public array $filtros = [];
  public array $lista = [];

  public function __construct()
  {
    $this->model = new VendedorModel();
  }

  public function index()
  {
    $filtros = [
      'search' => $_GET['search'] ?? '',
      'status' => $_GET['status'] ?? '',
      'mes'    => $_GET['mes'] ?? '',
      'ano'    => $_GET['ano'] ?? '',
    ];

    $lista = $this->model->getRequisicoes($filtros);
    $estatisticas = $this->model->getEstatisticas();

    require_once("./app/views/admin/AprovarVendedor.php");
  }

  public function atualizarStatus()
  {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!$input || !isset($input['acao'], $input['vendedor_id'])) {
      http_response_code(400);
      echo json_encode(['erro' => 'Dados inválidos']);
      return;
    }

    $acao = $input['acao'];
    $id = (int)$input['vendedor_id'];

    $statusMap = [
      'aprovar' => 'Aprovado',
      'reprovar' => 'Reprovado',
      'inativar' => 'Inativado',
      'ativar' => 'Pendente'
    ];

    if (!array_key_exists($acao, $statusMap)) {
      http_response_code(400);
      echo json_encode(['erro' => 'Ação inválida']);
      return;
    }

    $sucesso = $this->model->atualizarStatus($id, $statusMap[$acao]);

    if ($sucesso) {
      echo json_encode([
        'sucesso' => true,
        'mensagem' => "Status do vendedor atualizado para '{$statusMap[$acao]}'."
      ]);
    } else {
      http_response_code(500);
      echo json_encode(['erro' => 'Falha ao atualizar status']);
    }
  }

  public function mostrarEstatisticas()
  {
    $estatisticas = $this->model->getEstatisticas();

    header('Content-Type: application/json');
    echo json_encode([
      'aprovados' => $estatisticas['Aprovado'] ?? 0,
      'reprovados' => $estatisticas['Reprovado'] ?? 0,
      'inativados' => $estatisticas['Inativado'] ?? 0,
    ]);
  }
}
