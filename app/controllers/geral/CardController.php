<?php

require_once __DIR__ . '../../../models/geral/CardModel.php';

class CardController extends RenderView
{
  private $model;

  public function __construct()
  {
    $this->model = new CardModel;
  }

  public function sendProdutos()
  {
    return $this->model->getProdutoInfo();
  }

  public function filtrarProdutosSubcategoria()
  {
    $subcategoria = $_POST['subcategoria'];
    $produtos = $this->model->getProdutoInfoComSubcategoria($subcategoria);
    // echo json_encode();
  }
  public function filtrarProdutosCategoria()
  {
    $categoria = $_POST['id_categoria'];
    $produtos = $this->model->getProdutoInfoComCategoria($categoria);
    echo json_encode($produtos);
    exit;
  }

  public function sendProdutosVendedor($idVendedor)
  {
    return $this->model->getProdutoInfoPorVendedor($idVendedor);
  }

  public function sendDestaques($idVendedor)
  {
    return $this->model->getDestaquesPorVendedor($idVendedor);
  }

  public function sendProdutosNaoDestaques($idVendedor)
  {
    $todosProdutos = $this->model->getProdutoInfoPorVendedor($idVendedor);
    $produtosDestaques = $this->model->getDestaquesPorVendedor($idVendedor);

    $idsDestaques = array_column($produtosDestaques, 'id_produto');

    $produtosFiltrados = array_filter($todosProdutos, function ($produto) use ($idsDestaques) {
      return !in_array($produto['id_produto'], $idsDestaques);
    });

    return array_values($produtosFiltrados);
  }
}
