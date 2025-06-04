<?php    
require_once __DIR__ . "../../../models/cliente/CategoriaModel.php";

class CategoriaController extends RenderView {
    public function index() {
        $this->loadView('cliente/Categoria', ['categoria' => 1]);
    }
    public function sendSubcategoria() {
        $model = new CategoriaModel;
        return $model->getSubcategoria();
    }
}
