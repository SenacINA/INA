<?php

require_once __DIR__ . '/../../models/geral/PesquisaModel.php';

class PesquisaController extends RenderView
{
  public function index()
  {
    $this->loadView('geral/Pesquisa', []);
  }

  public function sendPesquisa() {
    $model = new PesquisaModel;
    $produtos = $model->getProdutosPesquisa($_POST['pesquisa']);
    echo json_encode($produtos);
    exit;
  }
}
