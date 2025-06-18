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

    public function adicionarDestaque($idVendedor, $idProduto)
    {
        $sqlCheck = "SELECT COUNT(*) FROM destaques WHERE id_vendedor = :id_vendedor AND id_produto = :id_produto";
        $stmtCheck = $this->db->prepare($sqlCheck);
        $stmtCheck->execute([
            ':id_vendedor' => $idVendedor,
            ':id_produto' => $idProduto,
        ]);

        if ($stmtCheck->fetchColumn() > 0) {
            return false; 
        }

        $sqlInsert = "INSERT INTO destaques (id_vendedor, id_produto) VALUES (:id_vendedor, :id_produto)";
        $stmtInsert = $this->db->prepare($sqlInsert);

        try {
            $stmtInsert->execute([
                ':id_vendedor' => $idVendedor,
                ':id_produto' => $idProduto,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Erro ao adicionar destaque: " . $e->getMessage());
            return false;
        }
    }

    public function getDestaquesPorVendedor($idVendedor)
    {
        $sql = "SELECT p.*, ip.endereco_imagem_produto 
                FROM destaques d
                JOIN produto p ON p.id_produto = d.id_produto
                LEFT JOIN imagem_produto ip ON ip.id_produto = p.id_produto AND ip.index_imagem_produto = 1
                WHERE d.id_vendedor = :id_vendedor";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_vendedor' => $idVendedor]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
