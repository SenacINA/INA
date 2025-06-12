<?php
require_once __DIR__ . '/../connect.php';

class ProdutoClienteModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function searchProduto($id)
  {
    $sql = "SELECT
    p.nome_produto,
    p.preco_produto,
    p.status_produto,
    p.peso_liquido_produto,
    p.altura_produto,
    p.largura_produto,
    p.descricao_produto,
    ip.id_imagem_produto,
    ip.endereco_imagem_produto,
    ip.index_imagem_produto,
    v.nome_fantasia AS nome_vendedor,
    e.uf_endereco,
    e.cidade_endereco,
    c.foto_perfil_cliente

FROM 
    produto p
LEFT JOIN 
    imagem_produto ip ON p.id_produto = ip.id_produto
INNER JOIN
    vendedor v ON p.id_vendedor = v.id_vendedor
INNER JOIN
    cliente c ON v.id_cliente = c.id_cliente
LEFT JOIN
    endereco e ON c.id_cliente = e.id_cliente
WHERE 
    p.status_produto != 0
    AND p.id_produto = :id;";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql2 = "SELECT id_imagem_produto, endereco_imagem_produto, index_imagem_produto FROM imagem_produto WHERE id_produto = :id";
    $stmt2 = $this->db->getConnection()->prepare($sql2);
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();
    $imagens = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    return [
      'infoProduto' => $produto,
      'imagens' => $imagens
    ];
  }
}