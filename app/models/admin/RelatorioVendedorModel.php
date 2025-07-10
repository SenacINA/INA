<?php
require_once('./app/models/connect.php');

class RelatorioVendedorModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    // Busca lista de vendedores (com dados básicos)
    public function listarVendedores($limit = 10, $offset = 0)
    {
        $sql = "
            SELECT 
                v.id_vendedor,
                c.nome_cliente AS nome,
                c.data_registro_cliente AS data_cadastro,
                v.nome_fantasia,
                v.cnpj_vendedor
            FROM vendedor v
            JOIN cliente c ON v.id_cliente = c.id_cliente
            ORDER BY c.data_registro_cliente DESC
            LIMIT :limit OFFSET :offset
        ";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    // Busca vendas de um vendedor
    public function buscarPorVendedor($vendedor_id)
    {
        
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

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id_vendedor', $vendedor_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }


    // Buscar perfil do vendedor (igual ao que você já tem)
    public function buscarPerfilVendedor($vendedor_id)
    {
        $sqlCliente = "SELECT id_cliente FROM vendedor WHERE id_vendedor = :vendedor_id";
        $stmt = $this->db->getConnection()->prepare($sqlCliente);
        $stmt->bindParam(':vendedor_id', $vendedor_id, PDO::PARAM_INT);
        $stmt->execute();
        $resultCliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$resultCliente || !isset($resultCliente['id_cliente'])) {
            error_log("Nenhum cliente associado ao vendedor ID $vendedor_id");
            return null;
        }

        $id_cliente = $resultCliente['id_cliente'];

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

        $stmt = $this->db->getConnection()->prepare($sqlPerfil);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->execute();

        $resultPerfil = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultPerfil ?: null;
    }
}
