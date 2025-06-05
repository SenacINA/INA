<?php    
require_once __DIR__ . "../../../models/cliente/CategoriaModel.php";

class CategoriaController extends RenderView {
    public function index() {
        $categoria = $_GET['categoria'];
        $this->loadView('cliente/Categoria', ['categoria' => $categoria]);
    }
    public function sendSubcategoria() {
        $model = new CategoriaModel;
        return $model->getSubcategoria();
    }
}
