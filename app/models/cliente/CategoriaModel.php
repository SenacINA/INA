<?php

require_once('./app/models/connect.php');

class CategoriaModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function getSubcategoria() {
    $sql = "SELECT * FROM subcategoria";
    return $this->db->executeQuery($sql);
  }
}