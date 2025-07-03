<?php

require_once __DIR__ . '/../../models/vendedor/GerenciarVendasModel.php';

class GerenciarVendasController extends RenderView
{
  public GerenciarVendasModel $model;

  public function __construct()
  {
    if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
      header('Location: Login');
      exit;
    }
    $this->model = new GerenciarVendasModel();
  }

  public function exibirVendas()
  {
    $vendas = [];
    $estatisticas = ['lucro_total' => 0, 'total_vendas' => 0];

    $idCliente = $_SESSION['cliente_id'];
    $idVendedor = $this->model->getIdVendedor($idCliente);

    if (!$idVendedor) {
      return [
        'vendas' => [],
        'estatisticas' => $estatisticas
      ];
    }

    if (isset($_POST['filtro'])) {
      $filtro = $_POST['filtro'];
      $vendas = $this->model->getVendas($idCliente, $filtro);

      echo json_encode(["success" => true, "message" => 'Vendas carregadas com sucesso', 'data' => $vendas]);
      exit;
    } else {
      $vendas = $this->model->getVendas($idCliente);
    }

    $estatisticas = $this->model->getEstatisticas($idVendedor);

    return [
      'vendas' => $vendas,
      'estatisticas' => $estatisticas
    ];
  }

  public function index()
  {
    $dados = $this->exibirVendas();
    $this->loadView('vendedor/GerenciarVendas', $dados);
  }
}
