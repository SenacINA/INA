<?php

require_once('./app/models/connect.php');

class CarrinhoModel
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function getItensCarrinho(int $idCliente): array
  {
    $sql = "SELECT c.id_produto, c.quantidade_produto, p.nome, p.preco, p.imagem
                FROM carrinho c
                JOIN produto p ON c.id_produto = p.id_produto
                WHERE c.id_cliente = :idCliente";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['idCliente' => $idCliente]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function adicionarItem(int $idCliente, int $idProduto, int $quantidade = 1)
  {
    $sql = "SELECT quantidade_produto FROM carrinho WHERE id_cliente = :idCliente AND id_produto = :idProduto";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['idCliente' => $idCliente, 'idProduto' => $idProduto]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
      $novaQuantidade = $item['quantidade_produto'] + $quantidade;
      $sqlUpdate = "UPDATE carrinho SET quantidade_produto = :quantidade WHERE id_cliente = :idCliente AND id_produto = :idProduto";
      $stmtUpdate = $this->pdo->prepare($sqlUpdate);
      $stmtUpdate->execute([
        'quantidade' => $novaQuantidade,
        'idCliente' => $idCliente,
        'idProduto' => $idProduto
      ]);
    } else {
      $sqlInsert = "INSERT INTO carrinho (id_cliente, id_produto, quantidade_produto) VALUES (:idCliente, :idProduto, :quantidade)";
      $stmtInsert = $this->pdo->prepare($sqlInsert);
      $stmtInsert->execute([
        'idCliente' => $idCliente,
        'idProduto' => $idProduto,
        'quantidade' => $quantidade
      ]);
    }
  }

  public function removerItem(int $idCliente, int $idProduto)
  {
    $sql = "DELETE FROM carrinho WHERE id_cliente = :idCliente AND id_produto = :idProduto";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
      'idCliente' => $idCliente,
      'idProduto' => $idProduto
    ]);
  }

  public function atualizarQuantidade(int $idCliente, int $idProduto, int $quantidade)
  {
    if ($quantidade <= 0) {
      $this->removerItem($idCliente, $idProduto);
    } else {
      $sql = "UPDATE carrinho SET quantidade_produto = :quantidade WHERE id_cliente = :idCliente AND id_produto = :idProduto";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([
        'quantidade' => $quantidade,
        'idCliente' => $idCliente,
        'idProduto' => $idProduto
      ]);
    }
  }

  public function limparCarrinho(int $idCliente)
  {
    $sql = "DELETE FROM carrinho WHERE id_cliente = :idCliente";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['idCliente' => $idCliente]);
  }

  public function calcularTotal(int $idCliente): float
  {
    $sql = "SELECT SUM(p.preco * c.quantidade_produto) as total
                FROM carrinho c
                JOIN produto p ON c.id_produto = p.id_produto
                WHERE c.id_cliente = :idCliente";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['idCliente' => $idCliente]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['total'] ?? 0;
  }
}
