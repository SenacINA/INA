<?php

require_once('./app/models/connect.php');

class CarrinhoModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function getItensCarrinho(): array
  {
    $sql = "SELECT c.id_produto, c.quantidade_produto, p.nome_produto, p.preco_produto
                FROM carrinho c
                JOIN produto p ON c.id_produto = p.id_produto
                WHERE c.id_cliente = :idCliente";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':idCliente', $_SESSION['cliente_id']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function adicionarItem(int $idProduto, int $quantidade)
  {
    $sql = "SELECT quantidade_produto FROM carrinho WHERE id_cliente = :idCliente AND id_produto = :idProduto";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute(['idCliente' => $_SESSION['cliente_id'], 'idProduto' => $idProduto]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($item)) {
      $novaQuantidade = $item['quantidade_produto'] + $quantidade;
      $sqlUpdate = "UPDATE carrinho SET quantidade_produto = :quantidade WHERE id_cliente = :idCliente AND id_produto = :idProduto";
      $stmtUpdate = $this->db->getConnection()->prepare($sqlUpdate);
      $stmtUpdate->execute([
        'quantidade' => $novaQuantidade,
        'idCliente' => $_SESSION['cliente_id'],
        'idProduto' => $idProduto
      ]);
    } else {
      $sqlInsert = "INSERT INTO carrinho (id_cliente, id_produto, quantidade_produto) VALUES (:idCliente, :idProduto, :quantidade)";
      $stmtInsert = $this->db->getConnection()->prepare($sqlInsert);
      $stmtInsert->execute([
        'idCliente' => $_SESSION['cliente_id'],
        'idProduto' => $idProduto,
        'quantidade' => $quantidade
      ]);
    }
  }

  public function removerItem(int $idProduto)
  {
    $sql = "DELETE FROM carrinho WHERE id_cliente = :idCliente AND id_produto = :idProduto";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute([
      'idCliente' => $_SESSION['cliente_id'],
      'idProduto' => $idProduto
    ]);
  }

  public function atualizarQuantidade(int $idProduto, int $quantidade)
  {
    if ($quantidade <= 0) {
      $this->removerItem($idProduto);
    } else {
      $sql = "UPDATE carrinho SET quantidade_produto = :quantidade WHERE id_cliente = :idCliente AND id_produto = :idProduto";
      $stmt = $this->db->getConnection()->prepare($sql);
      $stmt->execute([
        'quantidade' => $quantidade,
        'idCliente' => $_SESSION['cliente_id'],
        'idProduto' => $idProduto
      ]);
    }
  }

  public function limparCarrinho()
  {
    $sql = "DELETE FROM carrinho WHERE id_cliente = :idCliente";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute(['idCliente' => $_SESSION['cliente_id']]);
  }

  public function calcularTotal(): float
  {
    $sql = "SELECT SUM(p.preco_produto * c.quantidade_produto) as total
                FROM carrinho c
                JOIN produto p ON c.id_produto = p.id_produto
                WHERE c.id_cliente = :idCliente";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute(['idCliente' => $_SESSION['cliente_id']]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['total'] ?? 0;
  }
}

// INSERT INTO produto (
//   id_vendedor,
//   nome_produto,
//   preco_produto,
//   categoria_produto,
//   subcategoria_produto,
//   origem_produto,
//   unidade_produto,
//   peso_liquido_produto,
//   peso_bruto_produto,
//   largura_produto,
//   altura_produto,
//   comprimento_produto,
//   descricao_produto,
//   status_produto
// ) VALUES (
//   1,                            -- id_vendedor (exemplo: vendedor com ID 1)
//   'Cadeira Gamer',              -- nome_produto
//   899.99,                      -- preco_produto
//   1,                            -- categoria_produto (ex: categoria com ID 2)
//   1,                            -- subcategoria_produto (ex: subcategoria com ID 3)
//   'China',                      -- origem_produto
//   1,                            -- unidade_produto (ex: unidade)
//   15.5,                         -- peso_liquido_produto (kg)
//   17.0,                         -- peso_bruto_produto (kg)
//   70.0,                         -- largura_produto (cm)
//   120.0,                        -- altura_produto (cm)
//   70.0,                         -- comprimento_produto (cm)
//   'Cadeira gamer confortável com ajuste de altura e encosto reclinável.', -- descricao_produto
//   true                          -- status_produto (ativo)
// );
