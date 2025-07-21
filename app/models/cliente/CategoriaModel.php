<?php
include_once './app/models/connect.php';

class CategoriaModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function getSubcategoriaPorCategoria($idCategoria)
  {
    $sql = "SELECT * FROM subcategoria WHERE categoria_subcategoria = :id_categoria";
    return $this->db->executeQuery($sql, [':id_categoria' => $idCategoria]);
  }

  public function getProdutosPorCategoria($idCategoria)
  {
    $sql = "
      SELECT 
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
        COUNT(a.id_avaliacao) AS total_avaliacoes,
        pr.tipo_promocao,
        pr.desconto_promocao,
        pr.data_inicio_promocao,
        pr.data_fim_promocao
      FROM produto p
      LEFT JOIN avaliacao a 
        ON p.id_produto = a.id_produto 
       AND a.status_avaliacao = TRUE
      LEFT JOIN imagem_produto ip 
        ON p.id_produto = ip.id_produto 
       AND ip.index_imagem_produto = 1
      LEFT JOIN promocao pr
        ON p.id_produto = pr.id_produto
       AND pr.ativo_promocao = TRUE
       AND CURDATE() BETWEEN pr.data_inicio_promocao AND pr.data_fim_promocao
      WHERE 
        p.status_produto != 0
        AND p.categoria_produto = :categoria
      GROUP BY
        p.id_produto;";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':categoria', $idCategoria);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProdutosPorSubcategoria($idSubcategoria)
  {
    $sql = "
      SELECT 
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
        COUNT(a.id_avaliacao) AS total_avaliacoes,
        pr.tipo_promocao,
        pr.desconto_promocao,
        pr.data_inicio_promocao,
        pr.data_fim_promocao
      FROM produto p
      LEFT JOIN avaliacao a 
        ON p.id_produto = a.id_produto 
       AND a.status_avaliacao = TRUE
      LEFT JOIN imagem_produto ip 
        ON p.id_produto = ip.id_produto 
       AND ip.index_imagem_produto = 1
      LEFT JOIN promocao pr
        ON p.id_produto = pr.id_produto
       AND pr.ativo_promocao = TRUE
       AND CURDATE() BETWEEN pr.data_inicio_promocao AND pr.data_fim_promocao
      WHERE 
        p.status_produto != 0
        AND p.subcategoria_produto = :idsubcategoria
      GROUP BY
        p.id_produto;";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':idsubcategoria', $idSubcategoria);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getSubcategoria()
  {
    $sql = "SELECT * FROM subcategoria";
    return $this->db->executeQuery($sql);
  }
}
