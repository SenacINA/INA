<?php

require_once __DIR__ . '/../connect.php';

class CarrinhoModel
{

  public function adicionarItem($id, $nome, $preco, $imagem, $quantidade)
  {
    // Verifica se o item já está no carrinho
    if (isset($_SESSION['carrinho'][$id])) {
      // Se já existir, apenas aumenta a quantidade
      $_SESSION['carrinho'][$id]['quantidade'] += $quantidade;
    } else {
      // Caso contrário, adiciona o item
      $_SESSION['carrinho'][$id] = [
        'nome' => $nome,
        'preco' => $preco,
        'imagem' => $imagem,
        'quantidade' => $quantidade
      ];
    }
  }

  public function getItensCarrinho()
  {
    // Retorna todos os itens do carrinho
    return $_SESSION['carrinho'];
  }

  public function calcularTotal()
  {
    // Calcula o total do carrinho
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
      $total += $item['preco'] * $item['quantidade'];
    }
    return $total;
  }
}
