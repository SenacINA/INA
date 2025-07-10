<?php

require_once __DIR__ . '/../../models/geral/HomeModel.php';

class HomeController extends RenderView {
    public function index() {
        $this->loadView('geral/Home', []);
    }
    
    public function sendProdutoHome() {
        header('Content-Type: application/json; charset=utf-8');
        
        $model = new HomeModel;

        $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : null;

        $produtos = [];

        !empty($filtro) ? $produtos = $model->getProdutoHome($filtro) : $produtos = $model->getProdutoHome();
        
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
