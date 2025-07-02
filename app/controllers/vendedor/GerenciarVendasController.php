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

    if(isset($_POST['filtro'])) {
      $filtro = $_POST['filtro'];
      $vendas = $this->model->getVendas($_SESSION['cliente_id'], $filtro);

      echo json_encode(["success" => false, "message" => 'Erro ao adquirir vendas', 'data' => $vendas]);
      exit;
    } else {
      $vendas = $this->model->getVendas($_SESSION['cliente_id']);
    }
      
    $estatisticas = $this->model->getEstatisticas($_SESSION['cliente_id']);

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