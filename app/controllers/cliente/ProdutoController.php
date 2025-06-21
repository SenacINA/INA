<?php
require_once __DIR__ . '/../../models/cliente/ProdutoClienteModel.php';
require_once __DIR__ . '/../../models/cliente/ClienteModel.php';
require_once __DIR__ . '/../../models/vendedor/VendedorModel.php';



class ProdutoController extends RenderView {
    public function index() {
        $id = $_POST['produto_id'];
        $clienteId = $_SESSION['cliente_id'] ?? 0;
        $comprou = false; 

        if ($clienteId > 0) {
            $model = new ProdutoClienteModel();
            $modelCliente = new ClienteModel();
            $comprou = $model->clientePodeAvaliar($clienteId, $id);
            $dados = $modelCliente->findById($clienteId);
        }

        $media = round($model->getMediaAvaliacoes($id));
        $media = $media > 5 ? 5 : $media;

        $this->loadView('cliente/Produto', [
            'id' => $id,
            'comprou' => $comprou,
            'cliente' => $dados,
            'media' => $media
        ]);
    }
    public function exibirProduto($id)
    {
        $model = new ProdutoClienteModel;
        $modelVendedor = new VendedorModel;
        $info = $model->searchProduto($id);

        $vendedorAvaliacoes = $modelVendedor->getEstrelasPorVendedor($info['infoProduto']['id_vendedor']);

        $total = 0;
        foreach ($vendedorAvaliacoes as $avaliacao) {
          $total += $avaliacao;
        }

        $info['total_avaliacoes'] = $total;

        $info['mediaEstrelasVendedor'] = count($vendedorAvaliacoes) > 0
          ? round($total / count($vendedorAvaliacoes) * 2) / 2
          : 0;

        
        $info['distribuicao_avaliacoes'] = $model->getDistribuicaoAvaliacoes($id);
        
        return $info;
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
