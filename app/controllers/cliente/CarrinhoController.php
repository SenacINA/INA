<?php

require_once __DIR__ . '/../../models/cliente/CarrinhoModel.php';

class CarrinhoController extends RenderView
{
    public CarrinhoModel $model;

    public function __construct()
    {
        $this->model = new CarrinhoModel();
    }

    public function adicionarItem()
    {
        $idProduto = $_POST['produto_id'] ?? null;
        $quantidade = $_POST['quantidade'] ?? 1;

        if (isset($_SESSION['cliente_id']) && $idProduto) {
            $carrinho = $this->model->adicionarItem((int)$idProduto, (int)$quantidade);
            if (gettype($carrinho) == 'string') {
                echo json_encode([
                    'success' => false,
                    'message' => 'Limite de itens atingido'
                ], JSON_UNESCAPED_UNICODE);
                exit;
            }
            echo json_encode([
                'success' => true
            ], JSON_UNESCAPED_UNICODE);
            exit;
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'É necessário estar logado para adicionar um produto ao carrinho.'
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }
    }

    public function removerItem()
    {
        $this->model->removerItem($_POST['id_produto']);

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function limparCarrinho()
    {
        $idProduto = (int)$_POST['idProduto'];
        $this->model->limparCarrinho($idProduto);

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function exibirItens()
    {
        if (isset($_SESSION['cliente_id'])) {
            $itensCarrinho = $this->model->getItensCarrinho();
            $totalCarrinho = $this->model->calcularTotal();
        } else {
            $itensCarrinho = [];
            $totalCarrinho = 0;
        }
        return [
            'itensCarrinho' => $itensCarrinho,
            'totalCarrinho' => $totalCarrinho
        ];
    }

    public function exibirBadge()
    {
        $produtos = $this->exibirItens();
        header('Content-Type: application/json');

        $quantidade = count($produtos['itensCarrinho']);

        echo json_encode(['quantidade' => $quantidade]);
    }

    public function atualizar()
    {
        $itemId = $_POST['id'];
        $itemQuantidade = $_POST['quantidade'];

        $this->model->atualizarQuantidade($itemId, $itemQuantidade);
    }

    public function index()
    {
        $dados = $this->exibirItens();
        $this->loadView('cliente/Carrinho', $dados);
    }
}
