<?php

require_once __DIR__ . '/../connect.php';

class HomeModel {
  private Database $db;

  public function __construct()
  {
    $this->db = new Database;
    $this->db->connect();
  }

  public function getProdutoHome() {
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
    produto p
  LEFT JOIN
    avaliacao a 
    ON p.id_produto = a.id_produto AND a.status_avaliacao = TRUE
  LEFT JOIN 
    imagem_produto ip 
    ON p.id_produto = ip.id_produto AND ip.index_imagem_produto = 1
  WHERE 
    p.status_produto != 0
  GROUP BY
    p.id_produto;";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>