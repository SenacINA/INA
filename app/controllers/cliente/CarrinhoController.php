<?php

require_once __DIR__ . '/../../views/cliente/Carrinho.php';
require_once __DIR__ . '/../../models/CarrinhoModel.php';

class CarrinhoController
{
  public function adicionarItem()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $id = $_POST['produto_id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $imagem = $_POST['imagem'] ?? '';
    $quantidade = 1;

    if ($id) {
      if (!isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] = [
          'nome' => $nome,
          'preco' => $preco,
          'imagem' => $imagem,
          'quantidade' => $quantidade
        ];
      } else {
        $_SESSION['carrinho'][$id]['quantidade'] += $quantidade;
      }
      
      header("Location: /Carrinho"); // Redireciona para a página do carrinho
      exit;
    } else {
      header("Location: /Produto"); // Caso algo falhe
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
