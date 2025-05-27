<?php

require_once __DIR__ . '/../../models/cliente/CarrinhoModel.php';

class CarrinhoController extends RenderView
{
  public CarrinhoModel $model;

  public function __construct()
  {
    $this->model = new CarrinhoModel();
  }

  public function adicionarItem()
  {
    $idProduto = $_POST['produto_id'] ?? null;
    $quantidade = $_POST['quantidade'] ?? 1;

    if ($idProduto) {
      $this->model->adicionarItem((int)$idProduto, (int)$quantidade);
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }

  public function removerItem($idProduto)
  {
    $this->model->removerItem((int)$idProduto);
    header("Location: /Carrinho");
    exit;
  }

  public function limparCarrinho()
  {
    $this->model->limparCarrinho();
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }

  public function exibirItens()
  {
    $itensCarrinho = $this->model->getItensCarrinho();
    $totalCarrinho = $this->model->calcularTotal();

    return [
      'itensCarrinho' => $itensCarrinho,
      'totalCarrinho' => $totalCarrinho
    ];
  }

  public function index()
  {
    $dados = $this->exibirItens();
    $this->loadView('cliente/Carrinho', $dados);
  }
}
