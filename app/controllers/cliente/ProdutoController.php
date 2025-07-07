<?php
require_once __DIR__ . '/../../models/cliente/ProdutoClienteModel.php';
require_once __DIR__ . '/../../models/cliente/ClienteModel.php';
require_once __DIR__ . '/../../models/vendedor/VendedorModel.php';



class ProdutoController extends RenderView {
    public function index() {
        // $id = $_POST['produto_id'];
        // $clienteId = $_SESSION['cliente_id'] ?? 0;
        // $comprou = false; 
        // $model = new ProdutoClienteModel();
        // $info = $model->searchProduto($id);
        // $dados = [];

        // if ($clienteId > 0) {

        //     $modelCliente = new ClienteModel();
        //     $comprou = $model->clientePodeAvaliar($clienteId, $id);
        //     $dados = $modelCliente->findById($clienteId);
        // }

        // $media = round($model->getMediaAvaliacoes($id));

        // $media = $media > 5 ? 5 : $media;

        // $this->loadView('cliente/Produto', [
        //     'id' => $id,
        //     'comprou' => $comprou,
        //     'cliente' => $dados,
        //     'media' => $media
        // ]);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'])) {
            $id = $_POST['produto_id'];
            header("Location: Produto/$id");
            exit;
        }
    }
    public function mostrarProduto($id) {
        $model = new ProdutoClienteModel;
        $modelVendedor = new VendedorModel;
    
        $info = $model->searchProduto($id);
        if (!$info) {
            $this->loadView('geral/404', []);
            return;
        }
    
        $clienteId = $_SESSION['cliente_id'] ?? 0;
        $comprou = $clienteId ? $model->clientePodeAvaliar($clienteId, $id) : false;
        $clienteDados = $clienteId ? (new ClienteModel())->findById($clienteId) : [];
    
        $vendedorAvaliacoes = $modelVendedor->getEstrelasPorVendedor($info['infoProduto']['id_vendedor']);
    
        $total = array_sum($vendedorAvaliacoes);
        $mediaEstrelas = count($vendedorAvaliacoes) > 0
            ? round($total / count($vendedorAvaliacoes) * 2) / 2
            : 0;
    
        $info['total_avaliacoes'] = count($vendedorAvaliacoes);
        $info['mediaEstrelasVendedor'] = $mediaEstrelas;
        $info['distribuicao_avaliacoes'] = $model->getDistribuicaoAvaliacoes($id);
    
        $mediaProduto = round($model->getMediaAvaliacoes($id));
        $mediaProduto = min($mediaProduto, 5);
    
        $this->loadView('cliente/Produto', [
            'id' => $id,
            'comprou' => $comprou,
            'cliente' => $clienteDados,
            'media' => $mediaProduto,
            'info' => $info,
        ]);
    }
    

    public function comentarios(array $params): array
    {
        $idP = (int)  ($params['idProduto']  ?? 0);
        $lim = (int)  ($params['maxRender']  ?? 10);
        $ofs = (int)  ($params['offset']     ?? 0);

        $model = new ProdutoClienteModel();
        return $model->getComentarios($idP, $lim, $ofs);
    }

    public function avaliarProduto() {
        header('Content-Type: application/json; charset=utf-8');
        
        $clienteId = $_SESSION['cliente_id'] ?? null;
        if (!$clienteId) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Não autenticado']);
            exit;
        }

        $required = ['estrelas', 'comentario', 'qualidade', 'parecido', 'id_produto'];
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                echo json_encode(['success' => false, 'message' => "Campo $field é obrigatório"]);
                exit;
            }
        }

        // Preparar dados
        $data = [
            'id_cliente' => $clienteId,
            'id_produto' => (int)$_POST['id_produto'],
            'id_vendedor' => (int)$_POST['id_vendedor'],
            'estrelas' => (float)$_POST['estrelas'],
            'comentario' => trim($_POST['comentario']),
            'qualidade' => trim($_POST['qualidade']),
            'parecido' => $_POST['parecido'] === 'Sim' ? 1 : 0,
            'imagens' => json_decode($_POST['imagens'] ?? '[]', true) ?: []
        ];

        try {
            $model = new ProdutoClienteModel;
            $model->beginTransaction();
            
            $avaliacaoId = $model->insertAvaliacao($data);
            
            // Processar imagens
            foreach ($data['imagens'] as $base64) {
                if (!preg_match('#^data:image/webp;base64,#', $base64)) continue;
                
                $bin = base64_decode(substr($base64, strpos($base64, ',') + 1));
                if (!$bin) continue;
                
                // Criar diretório se necessário
                $dir = __DIR__ . '/../../../public/upload/avaliacoes/' . $data['id_produto'] . '/' . $avaliacaoId . '/';
                if (!is_dir($dir)) mkdir($dir, 0755, true);
                
                // Gerar nome único
                $filename = 'img_' . uniqid() . '.webp';
                $filepath = $dir . $filename;
                
                if (file_put_contents($filepath, $bin)) {
                    $relPath = '/upload/avaliacoes/' . $data['id_produto'] . '/' . $avaliacaoId . '/' . $filename;
                    $model->insertImagemAvaliacao($avaliacaoId, $relPath);
                }
            }
            
            $model->commit();
            echo json_encode(['success' => true, 'message' => 'Avaliação registrada!']);
        } catch (Exception $e) {
            $model->rollBack();
            error_log($e->getMessage());
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erro no servidor']);
        }
    }
}
