<?php
require_once __DIR__ . '/../connect.php';

class RelatorioVendasModel
{
    private e2_database $db;

    public function __construct()
    {
        $this->db = new e2_database();
        $this->db->connect();
    }

    public function getPedidosFiltrados($filtros)
    {
        
        $sql = "SELECT 
                    p.id_pedido as codigo,
                    GROUP_CONCAT(pr.nome SEPARATOR ', ') as produtos,
                    p.valor_total as preco,
                    SUM(ip.quantidade) as quantidade,
                    p.data_pedido,
                    p.data_entrega_prevista,
                    p.status,
                    c.nome as cliente
                FROM pedidos p
                JOIN itens_pedido ip ON p.id_pedido = ip.id_pedido
                JOIN produtos pr ON ip.id_produto = pr.id_produto
                JOIN clientes c ON p.id_cliente = c.id_cliente
                WHERE p.id_vendedor = :id_vendedor";
        
        $params = [':id_vendedor' => $_SESSION['id_usuario']];

    
        if (!empty($filtros['codigo_nome'])) {
            if (is_numeric($filtros['codigo_nome'])) {
                $sql .= " AND p.id_pedido = :codigo";
                $params[':codigo'] = $filtros['codigo_nome'];
            } else {
                $sql .= " AND (c.nome LIKE :nome OR pr.nome LIKE :nome)";
                $params[':nome'] = '%' . $filtros['codigo_nome'] . '%';
            }
        }

        if (!empty($filtros['status'])) {
            $sql .= " AND p.status = :status";
            $params[':status'] = $filtros['status'];
        }

        if (!empty($filtros['mes'])) {
            $sql .= " AND MONTH(p.data_pedido) = :mes";
            $params[':mes'] = $filtros['mes'];
        }

        if (!empty($filtros['ano'])) {
            $sql .= " AND YEAR(p.data_pedido) = :ano";
            $params[':ano'] = $filtros['ano'];
        }

        $sql .= " GROUP BY p.id_pedido ORDER BY p.data_pedido DESC";

        return $this->db->executeQuery($sql, $params);
    }

    public function getEstatisticasVendas($filtros)
    {
        $sql = "SELECT 
                    COUNT(DISTINCT p.id_pedido) as total_vendas,
                    SUM(p.valor_total) as valor_total,
                    AVG(DATEDIFF(p.data_entrega, p.data_pedido)) as tempo_medio_entrega,
                    SUM(CASE WHEN p.status = 'Entregue' THEN 1 ELSE 0 END) as pedidos_entregues,
                    SUM(CASE WHEN p.status = 'Reembolsado' THEN 1 ELSE 0 END) as pedidos_reembolsados
                FROM pedidos p
                WHERE p.id_vendedor = :id_vendedor";
        
        $params = [':id_vendedor' => $_SESSION['id_usuario']];

   
        if (!empty($filtros['mes'])) {
            $sql .= " AND MONTH(p.data_pedido) = :mes";
            $params[':mes'] = $filtros['mes'];
        }

        if (!empty($filtros['ano'])) {
            $sql .= " AND YEAR(p.data_pedido) = :ano";
            $params[':ano'] = $filtros['ano'];
        }

        return $this->db->executeQuery($sql, $params, true);
    }
}