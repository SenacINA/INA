<?php

require_once __DIR__ . '/../../models/geral/HomeModel.php';

class HomeController extends RenderView {
    public function index() {
        $this->loadView('geral/Home', []);
    }
    
    public function sendProdutoHome() {
        $model = new HomeModel;
        $produtos = $model->getProdutoHome();
        echo json_encode($produtos);
        exit;
    }

    public function sendCategoriaHome() {
        $model = new HomeModel;
        $categorias = $model->getCategoriasHome();
        echo json_encode($categorias);
        exit;
    }
}
