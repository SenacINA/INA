<?php

require_once __DIR__ . '/../../models/vendedor/VendaModel.php';

class VendaController extends RenderView
{
    public VendaModel $model;
    public ?string $id_venda = null;

    public function __construct()
    {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        }

        $this->model = new VendaModel();
    }

    public function pegarDados(): array
    {
        if ($this->id_venda === null) {
            return [
                'vendas' => [],
                'id_venda' => null,
                'data_compra' => null,
                'nome_cliente' => null,
                'numero_celular_cliente' => null,
                'cep_cliente' => null,
                'rua_endereco' => null,
                'bairro_endereco' => null,
                'numero_endereco' => null,
                'uf_endereco' => null,
                'cidade_endereco' => null,
                'total_pago_compra' => null
            ];
        }

        $vendas = $this->model->getVendas((int)$this->id_venda);

        $dataCompra = null;
        $nomeCliente = null;
        $numeroCelularCliente = null;
        $cepCliente = null;
        $ruaEndereco = null;
        $bairroEndereco = null;
        $numeroEndereco = null;
        $ufEndereco = null;
        $cidadeEndereco = null;
        $totalPagoCompra = null;

        if (!empty($vendas)) {
            setlocale(LC_TIME, 'pt_BR.utf8', 'pt_BR', 'Portuguese_Brazil.1252');
            $timestamp = strtotime($vendas[0]['data_compra']);
            $dataCompra = strftime('%d de %B de %Y, %H:%M', $timestamp);

            $nomeCliente = $vendas[0]['nome_cliente'] ?? null;
            $numeroCelularCliente = $vendas[0]['numero_celular_cliente'] ?? null;
            $cepCliente = $vendas[0]['cep_cliente'] ?? null;
            $ruaEndereco = $vendas[0]['rua_endereco'] ?? null;
            $bairroEndereco = $vendas[0]['bairro_endereco'] ?? null;
            $numeroEndereco = $vendas[0]['numero_endereco'] ?? null;
            $ufEndereco = $vendas[0]['uf_endereco'] ?? null;
            $cidadeEndereco = $vendas[0]['cidade_endereco'] ?? null;
            $totalPagoCompra = $vendas[0]['total_pago_compra'] ?? null;
        }

        return [
            'vendas' => $vendas,
            'id_venda' => $this->id_venda,
            'data_compra' => $dataCompra,
            'nome_cliente' => $nomeCliente,
            'numero_celular_cliente' => $numeroCelularCliente,
            'cep_cliente' => $cepCliente,
            'rua_endereco' => $ruaEndereco,
            'bairro_endereco' => $bairroEndereco,
            'numero_endereco' => $numeroEndereco,
            'uf_endereco' => $ufEndereco,
            'cidade_endereco' => $cidadeEndereco,
            'total_pago_compra' => $totalPagoCompra
        ];
    }


    public function exibirVenda(): void
    {
        $this->id_venda = $_POST['id_venda'] ?? null;
        $dados = $this->pegarDados();
        $this->loadView('vendedor/Venda', $dados);
    }
}
