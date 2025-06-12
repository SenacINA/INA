<?php

require_once __DIR__ . '/../connect.php';

class CardModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database;
    $this->db->connect();
  }

  public function getProdutoInfo()
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
    ip.index_imagem_produto
FROM 
    produto p
LEFT JOIN 
    imagem_produto ip 
    ON p.id_produto = ip.id_produto AND ip.index_imagem_produto = 1
WHERE 
    p.status_produto != 0;";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    return $res;
  }

  public function getProdutoInfoComSubcategoria($subcategoria)
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
        ip.index_imagem_produto
    FROM 
        produto p
    LEFT JOIN 
        imagem_produto ip 
        ON p.id_produto = ip.id_produto AND ip.index_imagem_produto = 0
    WHERE 
        p.status_produto != 0
        AND p.subcategoria_produto = :subcategoria;";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':subcategoria', $subcategoria);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public function getProdutoInfoComCategoria($categoria)
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
    ip.index_imagem_produto
  FROM 
    produto p
  LEFT JOIN 
    imagem_produto ip 
    ON p.id_produto = ip.id_produto AND ip.index_imagem_produto = 0
  WHERE 
    p.status_produto != 0
    AND p.categoria_produto = :categoria;";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':categoria', $categoria); 
    $stmt->execute();

    return $stmt->fetchAll();
  }
}
