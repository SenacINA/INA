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

  public function getIdVendedor(int $idCliente): ?int
  {
    $sql = "SELECT id_vendedor FROM vendedor WHERE id_cliente = :idCliente";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(":idCliente", $idCliente);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id_vendedor'] ?? null;
  }


  public function getVendas(int $idCliente, $filtro = 'id_compra'): array
  {
    $sql = "select id_vendedor from vendedor WHERE id_cliente = :idCliente";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(":idCliente", $idCliente);
    $stmt->execute();

    $idVendedor = $stmt->fetch(PDO::FETCH_ASSOC);

    switch ($filtro) {
      case 'alfabetica':
        $orderBy = 'cli.nome_cliente';
        break;
      case 'valor_total':
        $orderBy = 'valor_total ASC';
        break;
      case 'data_compra':
        $orderBy = 'c.data_compra DESC';
        break;
      case 'id_compra':
      default:
        $orderBy = 'c.id_compra';
        break;
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
    WHERE c.id_vendedor = :idVendedor
    GROUP BY c.id_compra, c.data_compra, cli.nome_cliente
    ORDER BY $orderBy
    ";


    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(":idVendedor", $idVendedor['id_vendedor']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  private function convertMesToNumero(string $mes): int
  {
    $mapa = [
      'janeiro' => 1,
      'fevereiro' => 2,
      'marco' => 3,
      'abril' => 4,
      'maio' => 5,
      'junho' => 6,
      'julho' => 7,
      'agosto' => 8,
      'setembro' => 9,
      'outubro' => 10,
      'novembro' => 11,
      'dezembro' => 12
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
