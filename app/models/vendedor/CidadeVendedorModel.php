<?php

require_once __DIR__ . '/../connect.php';

class CidadeVendedorModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function getCidade() {
    $sql = "Select * from cidade";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchALl(PDO::FETCH_ASSOC);
  }
}