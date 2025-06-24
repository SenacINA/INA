<?php

require_once('./app/models/connect.php');

class GerenciarVendasModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

 public function getVendas(int $idVendedor, array $filtros): array
{
  $params = [':idVendedor' => $idVendedor];
  $where = "WHERE c.id_vendedor = :idVendedor";

  if (!empty($filtros['cliente'])) {
    $where .= " AND cli.nome_cliente LIKE :cliente";
    $params[':cliente'] = '%' . $filtros['cliente'] . '%';
  }

  if (!empty($filtros['mes'])) {
    $where .= " AND MONTH(c.data_compra) = :mes";
    $params[':mes'] = $this->convertMesToNumero($filtros['mes']);
  }

  if (!empty($filtros['ano'])) {
    $where .= " AND YEAR(c.data_compra) = :ano";
    $params[':ano'] = $filtros['ano'];
  }

  $orderClause = '';
  if (!empty($filtros['ordenar'])) {
    $allowed = ['id_compra', 'cliente', 'valor_total', 'data_compra'];
    if (in_array($filtros['ordenar'], $allowed)) {
      $orderClause = "ORDER BY {$filtros['ordenar']}";
    }
  }

  $sql = "
    SELECT 
      c.id_compra, 
      c.data_compra, 
      cli.nome_cliente AS cliente,
      SUM(ic.preco_pago_compra * ic.quantidade_compra) AS valor_total,
      GROUP_CONCAT(DISTINCT p.nome_produto SEPARATOR ', ') AS produtos
    FROM compra c
    JOIN cliente cli ON c.id_cliente = cli.id_cliente
    JOIN item_compra ic ON c.id_compra = ic.id_compra
    JOIN produto p ON ic.id_produto = p.id_produto
    $where
    GROUP BY c.id_compra, c.data_compra, cli.nome_cliente
    $orderClause
  ";

  $stmt = $this->db->getConnection()->prepare($sql);
  foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
  }
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

private function convertMesToNumero(string $mes): int
{
  $mapa = [
    'janeiro' => 1, 'fevereiro' => 2, 'marco' => 3,
    'abril' => 4, 'maio' => 5, 'junho' => 6,
    'julho' => 7, 'agosto' => 8, 'setembro' => 9,
    'outubro' => 10, 'novembro' => 11, 'dezembro' => 12
  ];
  return $mapa[strtolower($mes)] ?? 0;
}

public function getEstatisticas(int $idVendedor): array
{
  $sql = "
    SELECT 
      SUM(ic.preco_pago_compra * ic.quantidade_compra) AS lucro_total,
      COUNT(DISTINCT c.id_compra) AS total_vendas
    FROM compra c
    JOIN item_compra ic ON c.id_compra = ic.id_compra
    WHERE c.id_vendedor = :idVendedor
  ";

  $stmt = $this->db->getConnection()->prepare($sql);
  $stmt->bindValue(':idVendedor', $idVendedor);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}



}