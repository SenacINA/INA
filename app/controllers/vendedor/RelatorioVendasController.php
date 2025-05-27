<?php
require_once __DIR__ . '/../models/RelatorioVendasModel.php';

class RelatorioVendasController
{
    private $model;

    public function __construct()
    {
        $this->model = new RelatorioVendasModel();
    }

    public function index()
    {

        $filtros = [
            'codigo_nome' => '',
            'status' => '',
            'mes' => '',
            'ano' => ''
        ];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filtros = [
                'codigo_nome' => trim($_POST['codigo_nome'] ?? ''),
                'status' => $_POST['status'] ?? '',
                'mes' => $_POST['mes'] ?? '',
                'ano' => $_POST['ano'] ?? ''
            ];
        }

        try {

            $pedidos = $this->model->getPedidosFiltrados($filtros);
            $estatisticas = $this->model->getEstatisticasVendas($filtros);

 
            $percentual_entregues = $estatisticas['total_vendas'] > 0 
                ? ($estatisticas['pedidos_entregues'] / $estatisticas['total_vendas']) * 100 
                : 0;
                
            $percentual_reembolsados = $estatisticas['total_vendas'] > 0 
                ? ($estatisticas['pedidos_reembolsados'] / $estatisticas['total_vendas']) * 100 
                : 0;

            return [
                'pedidos' => $pedidos ?: [],
                'estatisticas' => [
                    'valor_total' => number_format($estatisticas['valor_total'] ?? 0, 2, ',', '.'),
                    'total_vendas' => $estatisticas['total_vendas'] ?? 0,
                    'tempo_medio_entrega' => round($estatisticas['tempo_medio_entrega'] ?? 0),
                    'pedidos_entregues' => ($estatisticas['pedidos_entregues'] ?? 0) . ' - ' . round($percentual_entregues) . '%',
                    'total_pedidos' => $estatisticas['total_vendas'] ?? 0,
                    'pedidos_reembolsados' => ($estatisticas['pedidos_reembolsados'] ?? 0) . ' - ' . round($percentual_reembolsados) . '%'
                ],
                'filtros' => $filtros
            ];
        } catch (Exception $e) {
            error_log("Erro no RelatorioVendasController: " . $e->getMessage());
            return [
                'pedidos' => [],
                'estatisticas' => [
                    'valor_total' => '0,00',
                    'total_vendas' => 0,
                    'tempo_medio_entrega' => 0,
                    'pedidos_entregues' => '0 - 0%',
                    'total_pedidos' => 0,
                    'pedidos_reembolsados' => '0 - 0%'
                ],
                'filtros' => $filtros
            ];
        }
    }
}