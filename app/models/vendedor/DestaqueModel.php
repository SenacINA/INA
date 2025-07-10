<?php
require_once __DIR__ . '/../connect.php';

class DestaqueModel
{
    private $db;

    public function __construct()
    {
        $db = new Database();
        $db->connect();
        $this->db = $db->getConnection();
    }

    public function adicionarDestaque($idCliente, $idProduto)
    {
        $sqlCliente = "SELECT id_vendedor FROM vendedor WHERE id_cliente = :id_cliente";
        $stmtCheck = $this->db->prepare($sqlCliente);
        $stmtCheck->execute([
            ':id_cliente' => $idCliente
        ]);

        $idVendedor = $stmtCheck->fetchColumn();

        $sqlCheck = "SELECT COUNT(*) FROM destaques WHERE id_vendedor = :id_vendedor AND id_produto = :id_produto";
        $stmtCheck = $this->db->prepare($sqlCheck);
        $stmtCheck->execute([
            ':id_vendedor' => $idVendedor,
            ':id_produto' => $idProduto,
        ]);

        $sqlInsert = "INSERT INTO destaques (id_vendedor, id_produto) VALUES (:id_vendedor, :id_produto)";
        $stmtInsert = $this->db->prepare($sqlInsert);

        $stmtInsert->execute([
            ':id_vendedor' => $idVendedor,
            ':id_produto' => $idProduto,
        ]);
        return true;
    }

    public function getDestaquesPorVendedor($idVendedor)
    {
        $sql = "SELECT 
            p.id_produto,
            p.nome_produto,
            p.preco_produto,
            p.categoria_produto,
            p.subcategoria_produto,
            p.status_produto,
            ip.id_imagem_produto,
            ip.endereco_imagem_produto,
            ip.index_imagem_produto,
            COALESCE(AVG(a.estrelas_avaliacao), 0) AS media_avaliacoes,
            COUNT(a.id_avaliacao) AS total_avaliacoes
        FROM 
            destaques d
        LEFT JOIN
            produto p 
            ON p.id_produto = d.id_produto
        LEFT JOIN
            avaliacao a 
            ON p.id_produto = a.id_produto AND a.status_avaliacao = TRUE
        LEFT JOIN 
            imagem_produto ip 
            ON p.id_produto = ip.id_produto AND ip.index_imagem_produto = 1
        WHERE 
            p.status_produto != 0 AND d.id_vendedor = :id_vendedor
        GROUP BY
            p.id_produto;";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_vendedor' => $idVendedor]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removerDestaque($idCliente, $idProduto)
    {
        $stmt = $this->db->prepare("SELECT id_vendedor FROM vendedor WHERE id_cliente = :id_cliente");
        $stmt->execute([':id_cliente' => $idCliente]);
        $idVendedor = $stmt->fetchColumn();

        if (!$idVendedor) return false;

        $stmt = $this->db->prepare("DELETE FROM destaques WHERE id_produto = :id_produto AND id_vendedor = :id_vendedor");
        return $stmt->execute([
            ':id_produto' => $idProduto,
            ':id_vendedor' => $idVendedor
        ]);
    }
}
