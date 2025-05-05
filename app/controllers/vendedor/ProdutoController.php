<?php

session_start();
require_once __DIR__ . '/../../models/vendedor/ProdutoModel.php';

class ProdutoController extends RenderView
{
  
  public function produto()
  {
    $nome = $_POST['nomeProduto'];
    $valor = $_POST['valorProduto'];
    $marca = $_POST['marcaProduto'];
    $codigo = $_POST['codigoProduto'];
    $unidade = $_POST['estoqueProduto'];
    $origem = $_POST['origemProduto'];
    $peso = $_POST['pesoProduto'];
    $pesoBruto = $_POST['pesoBrutoProduto'];
    $largura = $_POST['larguraProduto'];
    $altura = $_POST['alturaProduto'];
    $comprimento = $_POST['comprimentoProduto'];
    $categoria = $_POST['categoriaProduto'];

    if (isset($_POST['toggle-group'])) {
      $promocao = $_POST['tipoPromocaoProduto'];
      $desconto = $_POST['produtoDescontPromo'];
      $inicio = $_POST['promoDataInicio'];
      $fim = $_POST['promoDataFim'];
      $inicio_horario = $_POST['promoHoraInicio'];
      $fim_horario = $_POST['promoHoraFim'];
    }

    $produtoImagem = $_POST['produtoImagem'];
    $descricao = $_POST['descricao'];

    $model = new ProdutoModel;
    if ($model->createProduto($_SESSION['cliente_id'], $nome, $valor, 1, 1, $origem, $unidade, $peso, $pesoBruto, $largura, $altura, $comprimento, $descricao, 'ativo')) {
      $this->loadView('geral/home', []);
    }
  }
  
}
