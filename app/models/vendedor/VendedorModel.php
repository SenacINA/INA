<?php

require_once __DIR__ . '/../connect.php';

class VendedorModel {

    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function dadosVendedor(string $id) : ?array {
        $sql = "
          SELECT * FROM vendedor WHERE id_cliente = :id;
        ";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
      }
    
      public function getEstrelasPorVendedor(string $idVendedor): array {
        $sql = "SELECT estrelas_avaliacao FROM avaliacao WHERE id_vendedor = :idVendedor";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':idVendedor', $idVendedor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
      }

      public function getQuantidadeProdutos(string $id): int {
        $sql = "
            SELECT COUNT(id_produto) FROM produto WHERE id_vendedor = :id AND status_produto != false;
        ";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
    

}