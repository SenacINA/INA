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

        if ($idProduto) {
            $this->model->adicionarItem((int)$idProduto, (int)$quantidade);
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

    // ************ NOVOS MÉTODOS ADICIONADOS ************
    public function dados()
    {
        $idCliente = $_SESSION['cliente_id'] ?? null;
        
        if (!$idCliente) {
            header('Location: /Login');
            exit;
        }

        $enderecos = $this->model->getEnderecosCliente($idCliente);
        $this->loadView('cliente/CarrinhoDados', ['enderecos' => $enderecos]);
    }

    public function salvarEndereco()
    {
        $idCliente = $_SESSION['cliente_id'] ?? null;
        
        if (!$idCliente) {
            header('Location: /Login');
            exit;
        }

        // Validação básica
        $required = ['nome', 'cpf', 'endereco', 'cep', 'cidade', 'telefone', 'email'];
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $_SESSION['erro_mensagem'] = "Preencha todos os campos obrigatórios";
                header('Location: /CarrinhoDados');
                exit;
            }
        }

        $dadosEndereco = [
            'rua' => $_POST['endereco'],
            'bairro' => '', // Implementar conforme necessidade
            'numero' => $_POST['numeroCasa'],
            'referencia' => $_POST['ponto'] ?? '',
            'uf' => '', // Implementar conforme necessidade
            'cidade' => $_POST['cidade'],
            'id_cliente' => $idCliente
        ];

        if ($this->model->salvarEndereco($dadosEndereco)) {
            $_SESSION['sucesso_mensagem'] = "Endereço salvo com sucesso!";
        } else {
            $_SESSION['erro_mensagem'] = "Erro ao salvar endereço";
        }

        header('Location: /CarrinhoDados');
        exit;
    }

    public function excluirEndereco()
    {
        $idEndereco = $_POST['idEndereco'] ?? null;
        
        if ($idEndereco && $this->model->excluirEndereco((int)$idEndereco)) {
            $_SESSION['sucesso_mensagem'] = "Endereço excluído com sucesso!";
        } else {
            $_SESSION['erro_mensagem'] = "Erro ao excluir endereço";
        }

        header('Location: /CarrinhoDados');
        exit;
    }
}