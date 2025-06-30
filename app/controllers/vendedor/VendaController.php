<?php

require_once __DIR__ . '/../../models/vendedor/VendaModel.php';

class VendaController extends RenderView
{
  public VendaModel $model;
  public str $id_venda;

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
    $vendas = [];

    if (isset($_SESSION['cliente_id'])) {
      $vendas = $this->model->getVendas($_SESSION['cliente_id'], [
        'cliente' => $_POST['cliente'] ?? null,
        'mes' => $_POST['mes'] ?? null,
        'ano' => $_POST['ano'] ?? null,
        'ordenar' => $_POST['ordenar'] ?? null
      ]);
      
    }

    return [
      'vendas' => $vendas
    ];
  }

  public function exibirVenda()
  {
    $this->$id_venda = $_POST['id_venda'] ?? null;
    $dados = $this->pegarDados();
    $this->loadView('vendedor/Venda', $dados);
  }
}