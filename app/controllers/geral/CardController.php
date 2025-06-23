<?php

require_once __DIR__ . '../../../models/geral/CardModel.php';

class CardController extends RenderView
{
  public function sendProdutos()
  {
    $model = new CardModel;
    return $model->getProdutoInfo();
  }

  public function filtrarProdutosSubcategoria()
  {
    $subcategoria = $_POST['subcategoria'];
    $model = new CardModel;
    $produtos = $model->getProdutoInfoComSubcategoria($subcategoria);
    $this->loadView('cliente/Categoria', [
      'subcategoriaChecked'      => $subcategoria,
      'produtosFiltrados' => $produtos
    ]);
  }
  public function filtrarProdutosCategoria($categoria)
  {
    $model = new CardModel;
    $produtos = $model->getProdutoInfoComCategoria($categoria);
    return $produtos;
  }

  public function sendProdutosVendedor($idVendedor)
  {
    $model = new CardModel;
    return $model->getProdutoInfoPorVendedor($idVendedor);
  }

  public function sendDestaques($idVendedor)
  {
    $model = new CardModel;
    return $model->getDestaquesPorVendedor($idVendedor);
  }

  public function sendProdutosNaoDestaques($idVendedor)
  {
    $model = new CardModel;
    $todosProdutos = $model->getProdutoInfoPorVendedor($idVendedor);
    $produtosDestaques = $model->getDestaquesPorVendedor($idVendedor);

    $idsDestaques = array_column($produtosDestaques, 'id_produto');

    $produtosFiltrados = array_filter($todosProdutos, function ($produto) use ($idsDestaques) {
      return !in_array($produto['id_produto'], $idsDestaques);
    });

    return $produtosFiltrados;
  }
}
