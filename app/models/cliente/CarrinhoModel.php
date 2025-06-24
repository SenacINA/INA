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
    $sql = "SELECT c.id_produto, c.quantidade_produto, p.nome_produto, p.preco_produto, i.endereco_imagem_produto
            FROM carrinho c
            JOIN produto p ON c.id_produto = p.id_produto
            LEFT JOIN imagem_produto i ON p.id_produto = i.id_produto AND i.index_imagem_produto = 1
            WHERE c.id_cliente = :idCliente";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':idCliente', $_SESSION['cliente_id']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function adicionarItem(int $idProduto, int $quantidade)
  {
    try {
      $verificaProduto = $this->db->getConnection()->prepare("SELECT 1 FROM produto WHERE id_produto = :id");
      $verificaProduto->execute(['id' => $idProduto]);

      if (!$verificaProduto->fetch()) {
        throw new Exception("Produto com ID $idProduto não existe.");
      }

      $sql = "SELECT quantidade_produto FROM carrinho WHERE id_cliente = :idCliente AND id_produto = :idProduto";
      $stmt = $this->db->getConnection()->prepare($sql);
      $stmt->execute(['idCliente' => $_SESSION['cliente_id'], 'idProduto' => $idProduto]);
      $item = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($item) {
        if ($item['quantidade_produto'] == 99) {
          return 'Limite de produtos atingido';
          exit;
        }
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
    } catch (Exception $e) {
      error_log("Erro ao adicionar item ao carrinho: " . $e->getMessage());
      $_SESSION['erro_mensagem'] = $e->getMessage();
      header('Location: /INA/Error');
      exit;
    }
  }

  public function atualizarQuantidade(int $idProduto, int $quantidade)
  {
    $sql = "UPDATE carrinho SET quantidade_produto = :quantidade WHERE id_cliente = :idCliente AND id_produto = :idProduto";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute([
      ':quantidade' => $quantidade,
      ':idCliente' => $_SESSION['cliente_id'],
      ':idProduto' => $idProduto
    ]);
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

  public function limparCarrinho()
  {
    $sql = "DELETE FROM carrinho 
        WHERE id_cliente = :idCliente";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute([
      'idCliente' => $_SESSION['cliente_id']
    ]);
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
