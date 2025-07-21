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
    
    public function mostrarProduto($id)
    {
        $model         = new ProdutoClienteModel;
        $modelVendedor = new VendedorModel;

        // 1) Busca dados do produto (inclui promo se houver)
        $info = $model->searchProduto($id);
        if (!$info) {
            $this->loadView('geral/404', []);
            return;
        }

        // 2) Avaliação do cliente
        $clienteId    = $_SESSION['cliente_id'] ?? 0;
        $comprou      = $clienteId ? $model->clientePodeAvaliar($clienteId, $id) : false;
        $clienteDados = $clienteId ? (new ClienteModel())->findById($clienteId) : [];

        // 3) Estatísticas de avaliação do vendedor
        $vendedorAvaliacoes = $modelVendedor->getEstrelasPorVendedor($info['infoProduto']['id_vendedor']);
        $total               = array_sum($vendedorAvaliacoes);
        $mediaEstrelas       = count($vendedorAvaliacoes) > 0
                            ? round($total / count($vendedorAvaliacoes) * 2) / 2
                            : 0;

        $info['total_avaliacoes']      = count($vendedorAvaliacoes);
        $info['mediaEstrelasVendedor'] = $mediaEstrelas;
        $info['distribuicao_avaliacoes'] = $model->getDistribuicaoAvaliacoes($id);

        // 4) Monta $info['promo'] a partir de $info['infoProduto']
        $p = $info['infoProduto'];

        // Verifica se há promoção ativa
        if (!empty($p['ativo_promocao'])
            && isset($p['desconto_promocao'], $p['tipo_promocao'])
            && $p['desconto_promocao'] > 0
        ) {
            $desconto      = (float)$p['desconto_promocao'];
            $precoOriginal = (float)$p['preco_produto'];

            if ((int)$p['tipo_promocao'] === 1) {
                // desconto fixo em R$
                $flag      = '- R$' . number_format($desconto, 2, ',', '.');
                $precoPromo = $precoOriginal - $desconto;
            } else {
                // desconto percentual
                $flag      = $desconto . '% OFF';
                $precoPromo = $precoOriginal * (1 - $desconto / 100);
            }

            $info['promo'] = [
                'flag_promo'          => $flag,
                'desconto_promocao'   => $desconto,
                'tipo_promocao'       => (int)$p['tipo_promocao'],
                'preco_produto_promo' => round($precoPromo, 2),
                'data_inicio'         => $p['data_inicio_promocao'] ?? null,
                'data_fim' => !empty($p['data_fim_promocao']) ? date('d/m/Y', strtotime($p['data_fim_promocao'])) : null,
                'hora_inicio'         => $p['hora_inicio_promocao'] ?? null,
                'hora_fim'            => $p['hora_fim_promocao']    ?? null,
            ];
        } else {
            $info['promo'] = null;
        }

        // 5) Média de avaliações do próprio produto
        $mediaProduto     = round($model->getMediaAvaliacoes($id));
        $info['mediaProduto'] = min($mediaProduto, 5);

        // 6) Renderiza a view
        $this->loadView('cliente/Produto', [
            'id'      => $id,
            'comprou' => $comprou,
            'cliente' => $clienteDados,
            'media'   => $info['mediaProduto'],
            'info'    => $info,
        ]);
    }

    public function comentarioCliente() {
        header('Content-Type: application/json; charset=utf-8');

        try {
            // 1) Obter parâmetros da query string
            $idVendedor = isset($_GET['idVendedor']) ? (int) $_GET['idVendedor'] : 0;
            $idProduto  = isset($_GET['idProduto'])  ? (int) $_GET['idProduto']  : 0;
            $idCliente  = isset($_GET['idCliente'])  ? (int) $_GET['idCliente']  : 0;

            // 2) Validar parâmetros
            if ($idVendedor <= 0 || $idProduto <= 0 || $idCliente <= 0) {
                throw new Exception("Parâmetros inválidos", 400);
            }

            // 3) Obter comentário do cliente
            $model = new ProdutoClienteModel();
            $comentario = $model->getAvaliacaoCliente($idVendedor, $idProduto, $idCliente);

            if ($comentario === null) {
                // Se não encontrou avaliação específica do cliente
                throw new Exception("Comentário do cliente não encontrado", 404);
            }

            // 4) Montar resposta de sucesso
            $response = [
                'success' => true,
                'data'    => $comentario
            ];
            echo json_encode($response);

        } catch (Exception $e) {
            // Definir código HTTP (ou 500 se não tiver sido passado)
            http_response_code($e->getCode() ?: 500);

            // Montar resposta de erro
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage(),
                'code'    => $e->getCode()
            ]);
        }

        exit;
    }

    public function comentarios() {
        header('Content-Type: application/json; charset=utf-8');
        
        try {
            $idP   = (int) ($_GET['idProduto']   ?? 0);
            $idV   = (int) ($_GET['idVendedor']  ?? 0);
            $lim   = (int) ($_GET['maxRender']   ?? 10);
            $ofs   = (int) ($_GET['offset']      ?? 0);
            
            if ($idP <= 0 || $idV <= 0) {
                throw new Exception("Parâmetros idProduto e idVendedor são obrigatórios.", 400);
            }
            
            $filters = [];
            if (isset($_GET['estrelas'])) {
                $est = (int) $_GET['estrelas'];
                if ($est < 1 || $est > 5) {
                    throw new Exception("Parâmetro 'estrelas' inválido.", 400);
                }
                $filters['estrelas'] = $est;
            }
            if (isset($_GET['com_midia'])) {
                $filters['com_midia'] = true;
            }
    
            $model = new ProdutoClienteModel();
            $comentarios = $model->getComentarios($idP, $lim, $ofs, $filters);
    
            $totalComentarios = $model->countComentarios($idP, $filters);
            $hasMore = ($ofs + $lim) < $totalComentarios;
    
            $response = [
                'success'    => true,
                'data'       => $comentarios,
                'pagination' => [
                    'total'    => $totalComentarios,
                    'limit'    => $lim,
                    'offset'   => $ofs,
                    'has_more' => $hasMore
                ]
            ];
            echo json_encode($response);
    
        } catch (Exception $e) {
            http_response_code($e->getCode() ?: 500);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage(),
                'code'    => $e->getCode()
            ]);
        }
        exit;
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
