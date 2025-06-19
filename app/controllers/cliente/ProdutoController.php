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

    public function comentarios(array $params): array
    {
        $idV = (int)  ($params['idVendedor'] ?? 0);
        $idP = (int)  ($params['idProduto']  ?? 0);
        $lim = (int)  ($params['maxRender']  ?? 5);
        $ofs = (int)  ($params['offset']     ?? 0);

        if ($idV < 1 || $idP < 1) {
            return [];
        }

        $model = new ProdutoClienteModel();
        return $model->getComentarios($idV, $idP, $lim, $ofs);
    }
}
