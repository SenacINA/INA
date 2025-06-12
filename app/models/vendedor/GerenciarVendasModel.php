<?php

require_once('./app/models/connect.php');

class GerenciarVendasModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function getVendas(): array
  {
    $sql = "SELECT c.id_produto, c.quantidade_produto, p.nome_produto, p.preco_produto, i.endereco_imagem_produto
            FROM carrinho c
            JOIN produto p ON c.id_produto = p.id_produto
            LEFT JOIN imagem_produto i ON p.id_produto = i.id_produto AND i.index_imagem_produto = 1
            WHERE c.id_cliente = :idCliente";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':idCliente', $_SESSION['cliente_id']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}