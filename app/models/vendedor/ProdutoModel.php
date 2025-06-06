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
  ): int|any {
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
            $stmt->bindValue(':preco', $preco, PDO::PARAM_STR);            
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

            $stmt->execute();
            return $this->db->getConnection()->lastInsertId();
      } catch (PDOException $e) {
            error_log("Erro ao inserir produto: " . $e->getMessage());
            return false;
      }
  }

  public function adicionarImagemProduto(int $produtoId, string $caminhoImagem, int $ordem): bool
    {
        $sql = "INSERT INTO imagem_produto 
                (id_produto, endereco_imagem_produto, index_imagem_produto) 
                VALUES (:produto_id, :caminho, :ordem)";
        
        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':produto_id', $produtoId, PDO::PARAM_INT);
            $stmt->bindValue(':caminho', $caminhoImagem, PDO::PARAM_STR);
            $stmt->bindValue(':ordem', $ordem, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao inserir imagem do produto: " . $e->getMessage());
            return false;
        }
    }

    public function deletarProduto(int $produtoId): bool
    {
        $sql = "DELETE FROM produto WHERE id_produto = :id";
        
        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $produtoId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao deletar produto: " . $e->getMessage());
            return false;
        }
    }

    public function categoriaExiste(int $id): bool
    {
        $sql = "SELECT COUNT(*) FROM categoria WHERE id_categoria = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function subcategoriaExiste(int $id): bool
    {
        $sql = "SELECT COUNT(*) FROM subcategoria WHERE id_subcategoria = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function subcategoriaPertenceACategoria(int $subId, int $catId): bool
    {
        $sql = "SELECT COUNT(*) FROM subcategoria 
                WHERE id_subcategoria = :subId 
                AND categoria_subcategoria = :catId";
        
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':subId', $subId, PDO::PARAM_INT);
        $stmt->bindValue(':catId', $catId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

  
}
