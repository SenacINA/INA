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

    if (isset($_SESSION['cliente_id'])) {
      $vendas = $this->model->getVendas($_SESSION['cliente_id'], [
        'cliente' => $_POST['cliente'] ?? null,
        'mes' => $_POST['mes'] ?? null,
        'ano' => $_POST['ano'] ?? null,
        'ordenar' => $_POST['ordenar'] ?? null
      ]);
      
      $estatisticas = $this->model->getEstatisticas($_SESSION['cliente_id']);
    }

    return [
      'vendas' => $vendas,
      'estatisticas' => $estatisticas
    ];
  }

  public function exibirVenda()
  {
     $id_venda = $_POST['id_venda'] ?? null;

      if (!$id_venda) {
          echo "ID da venda não foi fornecido.";
          return;
      }

      // $venda = $this->model->getVendaPorId($id_venda);

      // if (!$venda) {
      //     echo "Venda não encontrada.";
      //     return;
      // }

      $this->loadView('vendedor/PedidoConfirmar', [$id_venda]);
  }



  public function index()
  {
    $dados = $this->exibirVendas();
    $this->loadView('vendedor/GerenciarVendas', $dados);
  }
}