<?php
require_once __DIR__ . '/../../models/cliente/ProdutoClienteModel.php';
class ProdutoController extends RenderView {
    public function index() {
        $id = $_POST['produto_id'];
        $this->loadView('cliente/Produto', ['id' => $id]);
    }
    public function exibirProduto($id) {
        $model = new ProdutoClienteModel;
        return $model->searchProduto($id);
    }
}
