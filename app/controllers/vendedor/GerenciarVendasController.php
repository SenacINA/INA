<?php

require_once __DIR__ . '/../../models/vendedor/GerenciarVendasModel.php';

class GerenciarVendasController extends RenderView
{
  public GerenciarVendasModel $model;

  public function __construct()
  {
    $this->model = new GerenciarVendasModel();
  }

  public function exibirVendas()
  {
    if (isset($_SESSION['cliente_id'])) {
      $vendas = $this->model->getVendas();
    } else {
      $vendas = [];
    }
    return [
      'vendas' => $vendas
    ];
  }
}