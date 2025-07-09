<?php
require_once('./app/models/connect.php');

class RelatorioVendedorModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Busca as vendas realizadas por um vendedor
    public function buscarPorVendedor($vendedor_id)
    {
        $this->db->connect();

        $sql = "
            SELECT 
                ic.id_item_compra AS id,
                p.nome_produto AS produto,
                ic.preco_pago_compra AS preco,
                ic.quantidade_compra AS quantidade,
                CASE
                    WHEN ic.status_entrega_compra = 1 THEN 'Entregue'
                    ELSE 'Pendente'
                END AS status,
                c.nome_cliente AS cliente
            FROM item_compra ic
            JOIN compra co ON ic.id_compra = co.id_compra
            JOIN produto p ON ic.id_produto = p.id_produto
            JOIN cliente c ON co.id_cliente = c.id_cliente
            WHERE p.id_vendedor = :id_vendedor
            ORDER BY ic.id_item_compra DESC
        ";

        $params = [':id_vendedor' => $vendedor_id];
        $result = $this->db->executeQuery($sql, $params);

        $this->db->disconnect();

        return is_array($result) ? $result : [];
    }

    // Busca o perfil de um vendedor, considerando que vendedor está ligado ao cliente
    public function buscarPerfilVendedor($vendedor_id)
    {
        $this->db->connect();

        // 1. Buscar o id_cliente correspondente ao id_vendedor
        $sqlCliente = "SELECT id_cliente FROM vendedor WHERE id_vendedor = :vendedor_id";
        $params = [':vendedor_id' => $vendedor_id];
        $resultCliente = $this->db->executeQuery($sqlCliente, $params);

        if (!$resultCliente || !isset($resultCliente[0]['id_cliente'])) {
            $this->db->disconnect();
            return null; // Vendedor não encontrado
        }

        $id_cliente = $resultCliente[0]['id_cliente'];

        // 2. Buscar os dados de perfil do cliente
        $sqlPerfil = "
            SELECT 
                c.nome_cliente AS nome,
                c.email_cliente AS email,
                c.data_registro_cliente AS data_cadastro,
                v.nome_fantasia,
                v.cnpj_vendedor,
                p.foto_perfil,
                p.descricao_perfil
            FROM cliente c
            LEFT JOIN perfil p ON p.id_cliente = c.id_cliente
            LEFT JOIN vendedor v ON v.id_cliente = c.id_cliente
            WHERE c.id_cliente = :id_cliente
        ";

        $paramsPerfil = [':id_cliente' => $id_cliente];
        $resultPerfil = $this->db->executeQuery($sqlPerfil, $paramsPerfil);

        $this->db->disconnect();

        return isset($resultPerfil[0]) ? $resultPerfil[0] : null;
    }
}
