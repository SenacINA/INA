<?php

require_once('./app/models/connect.php');

class VendaModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

public function getVendas(int $idVenda)
{
  $sql = "
    SELECT 
      c.data_compra
    FROM compra c
    WHERE c.id_compra = :idVenda
  ";

  $stmt = $this->db->getConnection()->prepare($sql);
  $stmt->bindValue(':idVenda', $idVenda, PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}