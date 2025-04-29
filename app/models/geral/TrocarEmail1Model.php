<?php

require_once __DIR__ . '/../connect.php';

class TrocarEmailModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database;
    $this->db->connect();
  }

  public function VerificarCLiente(string $cliente_id)
  {

    $sql = "SELECT senha_cliente FROM cliente WHERE id_cliente = :id";
    $stmt = $this->db->getConnection()->prepare($sql);

    $stmt->bindValue(':id', $cliente_id);

    return $stmt->execute();
  }
}
