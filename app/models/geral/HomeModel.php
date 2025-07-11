<?php

require_once __DIR__ . '/../connect.php';

class HomeModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database;
    $this->db->connect();
  }

  public function getProdutoHome(?string $filtro = null): array
  {
      switch ($filtro) {
          case 'mais_vendidos':
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
                  COALESCE(SUM(ic.quantidade_compra), 0) AS total_vendido,
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
              LEFT JOIN item_compra ic 
                  ON p.id_produto = ic.id_produto
              LEFT JOIN (
                  SELECT * 
                  FROM promocao 
                  WHERE ativo_promocao = TRUE
                      AND CURDATE() BETWEEN data_inicio_promocao AND data_fim_promocao
              ) pr ON p.id_produto = pr.id_produto
              WHERE p.status_produto != 0
              GROUP BY 
                  p.id_produto,
                  pr.tipo_promocao,       
                  pr.desconto_promocao,   
                  pr.data_inicio_promocao,
                  pr.data_fim_promocao    
              ORDER BY total_vendido DESC
              LIMIT 20;
              ";
              break;

          case 'promocao':
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
                      COUNT(a.id_avaliacao)                  AS total_avaliacoes,
                      pr.tipo_promocao,
                      pr.desconto_promocao,
                      pr.data_inicio_promocao,
                      pr.data_fim_promocao
                  FROM produto p
                  -- avaliações
                  LEFT JOIN avaliacao a 
                      ON p.id_produto = a.id_produto 
                    AND a.status_avaliacao = TRUE
                  -- imagem principal
                  LEFT JOIN imagem_produto ip 
                      ON p.id_produto = ip.id_produto 
                    AND ip.index_imagem_produto = 1
                  -- promoção ativa
                  INNER JOIN promocao pr
                      ON p.id_produto = pr.id_produto
                    AND pr.ativo_promocao = TRUE
                    AND CURDATE() BETWEEN pr.data_inicio_promocao AND pr.data_fim_promocao
                  WHERE p.status_produto != 0
                  GROUP BY p.id_produto
                  ORDER BY pr.desconto_promocao DESC
                  LIMIT 20;
              ";
              break;

          default:
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
                    COUNT(a.id_avaliacao)                  AS total_avaliacoes,
                    pr.tipo_promocao,
                    pr.desconto_promocao,
                    pr.data_inicio_promocao,
                    pr.data_fim_promocao
                FROM produto p
                -- avaliações ativas
                LEFT JOIN avaliacao a 
                  ON p.id_produto = a.id_produto 
                AND a.status_avaliacao = TRUE
                -- imagem principal
                LEFT JOIN imagem_produto ip 
                  ON p.id_produto = ip.id_produto 
                AND ip.index_imagem_produto = 1
                -- promoção ativa e no período
                LEFT JOIN promocao pr
                  ON p.id_produto = pr.id_produto
                AND pr.ativo_promocao = TRUE
                AND CURDATE() BETWEEN pr.data_inicio_promocao AND pr.data_fim_promocao
                WHERE p.status_produto != 0
                GROUP BY p.id_produto
                LIMIT 20;
            ";
            break;

      }

      $stmt = $this->db->getConnection()->prepare($sql);

      // bindValue apenas se for filtro de busca genérica
      if ($filtro && ! in_array($filtro, ['mais_vendidos', 'promocao'], true)) {
          $stmt->bindValue(':filtro', '%' . $filtro . '%');
      }

      $stmt->execute();
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }


  public function getCategoriasHome() {
    $sql = "SELECT id_categoria, nome_categoria, endereco_imagem_categoria FROM categoria;";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
