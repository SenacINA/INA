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

  public function createProduto(int $id, string $nome, string $preco, string $categoria, string $subCategoria, string $origem, string $unidade, string $peso, string $pesoBruto, string $largura, string $altura, string $comprimento, string $descricao, string $status): bool
  {

    $sql = "INSERT INTO produto(id_vendedor, nome_produto, preco_produto, categoria_produto, subcategoria_produto, origem_produto, unidade_produto, peso_liquido_produto, peso_bruto_produto, largura_produto, altura_produto, comprimento_produto, descricao_produto, status_produto) 
                VALUES (:id, :nome, :preco, :categoria, :subCategoria, :origem, :unidade, :peso, :pesoBruto, :largura, :altura, :comprimento, :descricao, :status)";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id',  $id);
    $stmt->bindValue(':nome',  $nome);
    $stmt->bindValue(':preco', $preco);
    $stmt->bindValue(':categoria', $categoria);
    $stmt->bindValue(':subCategoria', $subCategoria);
    $stmt->bindValue(':origem', $origem);
    $stmt->bindValue(':unidade', $unidade);
    $stmt->bindValue(':peso', $peso);
    $stmt->bindValue(':pesoBruto', $pesoBruto);
    $stmt->bindValue(':largura', $largura);
    $stmt->bindValue(':altura', $altura);
    $stmt->bindValue(':comprimento', $comprimento);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':status', $status);

    return $stmt->execute();
  }
}
