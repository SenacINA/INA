<?php

require_once __DIR__ . '../../../models/geral/CardModel.php';

class CardController {
  public function sendProdutos() {
    $model = new CardModel;
    return $model->getProdutoInfo();
  }
}