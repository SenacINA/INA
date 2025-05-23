<?php

require_once __DIR__ . '/../connect.php';

class CarrinhoModel
{

  public function __construct()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    if (!isset($_SESSION['carrinho'])) {
      $_SESSION['carrinho'] = [];
    }
  }

  public function removerItem($id)
  {
    unset($_SESSION['carrinho'][$id]);
  }

  public function limparCarrinho()
  {
    $_SESSION['carrinho'] = [];
  }


  public function adicionarItem($id, $nome, $preco, $imagem, $quantidade)
  {
    if (!$id || $quantidade <= 0 || $preco < 0) {
      return false; 
    }

    if (isset($_SESSION['carrinho'][$id])) {
      $_SESSION['carrinho'][$id]['quantidade'] += $quantidade;
    } else {
      $_SESSION['carrinho'][$id] = [
        'nome' => $nome,
        'preco' => $preco,
        'imagem' => $imagem,
        'quantidade' => $quantidade
      ];
    }

    return true;
  }


  public function getItensCarrinho()
  {
    return $_SESSION['carrinho'];
  }

  public function calcularTotal()
  {
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
      $total += $item['preco'] * $item['quantidade'];
    }
    return $total;
  }
}
