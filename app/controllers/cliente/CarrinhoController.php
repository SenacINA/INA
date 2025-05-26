<?php

require_once __DIR__ . '/../../views/cliente/Carrinho.php';
require_once __DIR__ . '/../../models/cliente/CarrinhoModel.php';

class CarrinhoController
{
  private $model;
  private $idCliente;

  public function __construct(PDO $pdo, int $idCliente)
  {
    $this->model = new CarrinhoModel($pdo);
    $this->idCliente = $idCliente; 
  }

  public function adicionarItem()
  {
    $idProduto = $_POST['produto_id'] ?? null;
    $quantidade = $_POST['quantidade'] ?? 1;

    if ($idProduto) {
      $this->model->adicionarItem($this->idCliente, (int)$idProduto, (int)$quantidade);
    }
    header("Location: /Carrinho");
    exit;
  }

  public function removerItem($idProduto)
  {
    $this->model->removerItem($this->idCliente, (int)$idProduto);
    header("Location: /Carrinho");
    exit;
  }

  public function limparCarrinho()
  {
    $this->model->limparCarrinho($this->idCliente);
    header("Location: /Carrinho");
    exit;
  }

  public function exibirItens()
  {
    $itensCarrinho = $this->model->getItensCarrinho($this->idCliente);
    $totalCarrinho = $this->model->calcularTotal($this->idCliente);

    return [
      'itensCarrinho' => $itensCarrinho,
      'totalCarrinho' => $totalCarrinho
    ];
  }
}
