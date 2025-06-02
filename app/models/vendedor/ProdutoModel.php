<?php

require_once __DIR__ . '/../connect.php';

class ProdutoModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function createProduto(
      int $idVendedor,
      string $nome,
      float $preco,
      int $categoria,
      int $subCategoria,
      string $origem,
      int $unidade,
      float $peso,
      float $pesoBruto,
      float $largura,
      float $altura,
      float $comprimento,
      string $descricao,
      bool $status
  ): bool {
      $sql = "INSERT INTO produto(
          id_vendedor, nome_produto, preco_produto, categoria_produto, subcategoria_produto,
          origem_produto, unidade_produto, peso_liquido_produto, peso_bruto_produto,
          largura_produto, altura_produto, comprimento_produto, descricao_produto, status_produto
      ) VALUES (
          :id_vendedor, :nome, :preco, :categoria, :subCategoria,
          :origem, :unidade, :peso, :pesoBruto,
          :largura, :altura, :comprimento, :descricao, :status
      )";

      try {
          $stmt = $this->db->getConnection()->prepare($sql);

          $stmt->bindValue(':id_vendedor', $idVendedor, PDO::PARAM_INT);
          $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
          $stmt->bindValue(':preco', number_format($preco, 2, '.', ''), PDO::PARAM_STR);
          $stmt->bindValue(':categoria', $categoria, PDO::PARAM_INT);
          $stmt->bindValue(':subCategoria', $subCategoria, PDO::PARAM_INT);
          $stmt->bindValue(':origem', $origem, PDO::PARAM_STR);
          $stmt->bindValue(':unidade', $unidade, PDO::PARAM_INT);
          $stmt->bindValue(':peso', $peso, PDO::PARAM_STR);
          $stmt->bindValue(':pesoBruto', $pesoBruto, PDO::PARAM_STR);
          $stmt->bindValue(':largura', $largura, PDO::PARAM_STR);
          $stmt->bindValue(':altura', $altura, PDO::PARAM_STR);
          $stmt->bindValue(':comprimento', $comprimento, PDO::PARAM_STR);
          $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
          $stmt->bindValue(':status', $status, PDO::PARAM_BOOL);

          return $stmt->execute();
      } catch (PDOException $e) {
          error_log("Erro ao inserir produto: " . $e->getMessage());
          return false;
      }
  }

  
}
