<?php
require_once('./app/models/connect.php');

class RelatorioVendedorModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function buscarPorVendedor($vendedor_id)
    {
        $this->db->connect();
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
                WHERE rv.vendedor_id = :id_vendedor";

        $params = [':id_vendedor' => $vendedor_id];

        $result = $this->db->executeQuery($sql, $params);
        $this->db->disconnect();

        return $result;
    }

    public function buscarPerfilVendedor($vendedor_id)
    {
        $this->db->connect();

        $sql = "SELECT 
                    c.nome_cliente AS nome,
                    c.email_cliente AS email,
                    c.data_registro_cliente AS data_cadastro,
                    v.nome_fantasia,
                    v.cnpj_vendedor,
                    p.foto_perfil,
                    p.descricao_perfil
                FROM vendedor v
                JOIN cliente c ON v.id_cliente = c.id_cliente
                LEFT JOIN perfil p ON p.id_cliente = c.id_cliente
                WHERE v.id_vendedor = :vendedor_id";

        $params = [':vendedor_id' => $vendedor_id];
        $result = $this->db->executeQuery($sql, $params);

        $this->db->disconnect();

        return $result[0] ?? null;
    }
}
