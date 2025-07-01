<?php
require_once __DIR__ . '/../../models/cliente/ClienteModel.php';
require_once __DIR__ . '/../../models/vendedor/VendedorModel.php';

class VendedorProductController extends RenderView {
    public function __construct()
    {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        } else if ($_SESSION['user_type'] != "vendedor") {
            header("Location: page-not-found");
        }
    }
    public function pedidos() {
        $this->loadView('vendedor/GerenciarPedidos', []);
    }

    public function confirm() {
        $this->loadView('vendedor/PedidoConfirmar', []);
    }

    public function create() {
        $model = new VendedorModel();
        $idVendedor = $model->getVendedorId($_SESSION['cliente_id']);
        
        $lastCodProduct = $model->getLastCod($idVendedor) ?? 1000;

        $this->loadView('vendedor/RegistroProduto', ['proxCod' => $lastCodProduct + 1]);
    }

    public function edit() {
        if (empty($_GET['id'])) {
            header("Location: GerenciarProdutos");
        };
        $model = new VendedorModel;

        $idVendedor = $model->getVendedorId($_SESSION['cliente_id']);
        $produto = $model->fetchProdutoComImagens($idVendedor, $_GET['id']);
        $promocoes = $model->fetchPromocoes($_GET['id']) ?? [];

        // var_dump($promocoes);
            
        $valorProduto = $produto['preco_produto'];

        if (!empty($promocoes)) {
            
            $tipoPromocao = $promocoes[0]['tipo_promocao_nome'];
            
            if ($tipoPromocao == 'Reais sobre Total') {
                $valorProduto = $produto['preco_produto'] - $promocoes[0]['desconto_promocao'];
                $promocoes[0]['calculo'] = sprintf("%.2f (%.2f - R$%.2f)", $valorProduto, $produto['preco_produto'], $promocoes[0]['desconto_promocao']);
            } elseif ($tipoPromocao == 'Porcentagem sobre Total') {
                $valorProduto = $produto['preco_produto'] - ($produto['preco_produto'] * ($promocoes[0]['desconto_promocao'] / 100));
                $promocoes[0]['calculo'] = sprintf("%.2f (%.2f - %d%%)", $valorProduto, $produto['preco_produto'], $promocoes[0]['desconto_promocao']);
            } else {
                $valorProduto = $produto['preco_produto'];
            } 
             
        };

        $produto['preco_total'] = $valorProduto; 

        $this->loadView('vendedor/EditarProduto', ['produto' => $produto, 'promocao' => $promocoes[0] ?? []]);
    }

    public function report() {
        $this->loadView('vendedor/RelatorioVendas', []);
    }
}