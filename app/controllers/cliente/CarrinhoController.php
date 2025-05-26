<?php

require_once __DIR__ . '/../../models/cliente/CarrinhoModel.php';

class CarrinhoController extends RenderView
{
  public CarrinhoModel $model;

  public function __construct()
  {
    $this->model = new CarrinhoModel;
  }

  public function adicionarItem()
  {
    $idProduto = $_POST['produto_id'] ?? null;
    $quantidade = $_POST['quantidade'] ?? 1;

    if ($idProduto) {
      $this->model->adicionarItem((int)$idProduto, (int)$quantidade);
    }
    header("Location: /Carrinho-comitem");
    exit;
  }

  public function removerItem($idProduto)
  {
    $this->model->removerItem($_SESSION['cliente_id'], (int)$idProduto);
    header("Location: /Carrinho");
    exit;
  }

  public function limparCarrinho()
  {
    $this->model->limparCarrinho($_SESSION['cliente_id']);
    header("Location: /Carrinho");
    exit;
  }

  public function exibirItens()
  {
    $itensCarrinho = $this->model->getItensCarrinho($_SESSION['cliente_id']);
    if (!empty($itensCarrinho)) {
      $totalCarrinho = $this->model->calcularTotal($_SESSION['cliente_id']);
      return [
        'itensCarrinho' => $itensCarrinho,
        'totalCarrinho' => $totalCarrinho
      ];
    }
    else {
      $this->index();
    }

  }

  public function index() {
    $this->loadView('cliente/Carrinho', []);
  }
}
