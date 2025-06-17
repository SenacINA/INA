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
  $sql = "SELECT 
            c.id_compra, 
            c.data_compra, 
            cli.nome_cliente AS cliente,
            SUM(ic.preco_pago_compra * ic.quantidade_compra) AS valor_total,
            GROUP_CONCAT(DISTINCT p.nome_produto SEPARATOR ', ') AS produtos
          FROM compra c
          JOIN cliente cli ON c.id_cliente = cli.id_cliente
          JOIN item_compra ic ON c.id_compra = ic.id_compra
          JOIN produto p ON ic.id_produto = p.id_produto
          WHERE c.id_vendedor = :idVendedor
          GROUP BY c.id_compra, c.data_compra, cli.nome_cliente";

  $stmt = $this->db->getConnection()->prepare($sql);
  $stmt->bindValue(':idVendedor', $_SESSION['cliente_id']);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



}