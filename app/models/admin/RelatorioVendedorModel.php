<?php
require_once('./app/models/connect.php'); // Include Database class

class RelatorioVendedorModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Create Database instance
    }

    public function buscarPorVendedor($vendedor_id) {
        $this->db->connect(); // Establish connection

        // SQL sem quebra de linha ou espaços antes de SELECT
        $sql = "SELECT 
                    rv.id AS id,
                    rv.produto_id,
                    p.nome_produto AS produto,
                    p.preco_produto AS preco,
                    rv.quantidade,
                    rv.status,
                    c.nome_cliente AS cliente
                FROM relatorio_vendedor rv
                JOIN produto p ON p.id_produto = rv.produto_id
                JOIN cliente c ON c.id_cliente = rv.cliente_id
                WHERE rv.cliente_id = :id_cliente";

        $params = [':id_cliente' => $vendedor_id];

        $result = $this->db->executeQuery($sql, $params);
        $this->db->disconnect(); // Close connection

        return $result; // sempre será array (mesmo vazio) pois o SQL começa com "SELECT"
    }
}
