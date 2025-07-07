<?php
require_once __DIR__ . "../../../models/cliente/CategoriaModel.php";

class CategoriaController extends RenderView
{
    public function index()
    {
        $categoria = $_GET['categoria'] ?? null;
        $subcategoria = $_GET['subcategoria'] ?? null;

        $model = new CategoriaModel;

        $subcategorias = $model->getSubcategoriaPorCategoria($categoria);

        $this->loadView('cliente/Categoria', [
            'categoria' => $categoria,
            'subcategoriaId' => $subcategoria,
            'subcategorias' => $subcategorias
        ]);
    }


    public function filtrarCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoria'])) {
            $id = $_POST['categoria'];
            header("Location: Categoria?categoria={$id}");
            exit;
        }

        header("Location: Categoria");
        exit;
    }


    public function filtrarSubcategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subcategoria'])) {
            $id = $_POST['subcategoria'];
            $categoria = ($_POST['categoria'] ?? 0);
            header("Location: Categoria?categoria=$categoria&subcategoria=$id");
            exit;
        }

        header("Location: Categoria");
        exit;
    }

    public function sendProdutosCategorias() {
        $categoria = $_POST['id_categoria'];
        $model = new CategoriaModel;

        $produtos = $model->getProdutosPorCategoria($categoria);
        echo json_encode($produtos);
        exit;
    }

    public function sendProdutosSubcategorias() {
        $subcategoria = $_POST['id_subcategoria'];
        $model = new CategoriaModel;

        $produtos = $model->getProdutosPorSubcategoria($subcategoria);
        echo json_encode($produtos);
        exit;
    }

    $this->loadView('cliente/Categoria', ['categoria' => $categoria]);
}


    public function sendSubcategoria()
    {
        $model = new CategoriaModel;
        return $model->getSubcategoria();
    }
}
