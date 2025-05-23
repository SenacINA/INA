<?php

require_once __DIR__ . '/../../views/cliente/Carrinho.php';
require_once __DIR__ . '/../../models/CarrinhoModel.php';

class CarrinhoController
{
  private $model;

  public function __construct()
  {
    $this->model = new CarrinhoModel();
  }

  public function addItem()
  {
    var_dump($_POST);
    exit; 

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      header("Location: /Produto");
      exit;
    }

    $id = $_POST['produto_id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $imagem = $_POST['imagem'] ?? '';
    $quantidade = isset($_POST['quantidade']) ? intval($_POST['quantidade']) : 1;

    if ($id) {
      $sucesso = $this->model->adicionarItem($id, $nome, $preco, $imagem, $quantidade);

      if ($sucesso) {
        header("Location: /Carrinho");
      } else {
        header("Location: /Produto?error=invalid_data");
      }
      exit;
    } else {
      header("Location: /Produto");
      exit;
    }
  }

  public function removerItem($id)
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    if (isset($_SESSION['carrinho'][$id])) {
      unset($_SESSION['carrinho'][$id]);
    }

    header("Location: /Carrinho");
    exit;
  }

  public function removerTudo()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    unset($_SESSION['carrinho']);
    header("Location: /Carrinho");
    exit;
  }

  public function exibirItens()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    if (!isset($_SESSION['carrinho'])) {
      $_SESSION['carrinho'] = [];
    }

    $itensCarrinho = $_SESSION['carrinho'];
    $totalCarrinho = 0;

    foreach ($itensCarrinho as $item) {
      $totalCarrinho += $item['preco'] * $item['quantidade'];
    }

    // Aqui você poderia retornar ou renderizar uma view
    return [
      'itensCarrinho' => $itensCarrinho,
      'totalCarrinho' => $totalCarrinho
    ];
  }
}
