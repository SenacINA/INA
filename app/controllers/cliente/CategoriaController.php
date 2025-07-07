<?php
require_once __DIR__ . "../../../models/cliente/CategoriaModel.php";

class CategoriaController extends RenderView
{
    public function index($categoria = null)
{
    if (!$categoria) {
        $categoria = $_GET['categoria'] ?? 'defaultCategoria';
    }

    $this->loadView('cliente/Categoria', ['categoria' => $categoria]);
}


    public function sendSubcategoria()
    {
        $model = new CategoriaModel;
        return $model->getSubcategoria();
    }
}
