<?php

require_once('./app/models/connect.php');

class VendaModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

public function getVendas(int $idVenda)
{
  $sql = "
  SELECT 
  c.data_compra,
  c.id_cliente,
  cli.nome_cliente,
  cli.numero_celular_cliente,
  cli.cep_cliente,
  end.rua_endereco,
  end.bairro_endereco,
  end.numero_endereco,
  end.uf_endereco,
  end.cidade_endereco,
  SUM(ic.preco_pago_compra * ic.quantidade_compra) AS total_pago_compra,
  (SELECT COUNT(*) FROM compra c2 WHERE c2.id_cliente = c.id_cliente AND c2.id_vendedor = c.id_vendedor) AS quantidade_compras_cliente_vendedor,
  MAX(ic.status_pagamento_compra) AS status_pagamento_compra,
  MAX(ic.status_entrega_compra) AS status_entrega_compra
FROM compra c
INNER JOIN cliente cli ON cli.id_cliente = c.id_cliente
INNER JOIN endereco end ON end.id_endereco = c.id_endereco
INNER JOIN item_compra ic ON ic.id_compra = c.id_compra
WHERE c.id_compra = :idVenda
GROUP BY 
  c.data_compra,
  c.id_cliente,
  cli.nome_cliente,
  cli.numero_celular_cliente,
  cli.cep_cliente,
  end.rua_endereco,
  end.bairro_endereco,
  end.numero_endereco,
  end.uf_endereco,
  end.cidade_endereco
        ";




  $stmt = $this->db->getConnection()->prepare($sql);
  $stmt->bindValue(':idVenda', $idVenda, PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getItensVenda(int $idVenda)
{
    $sql = "
        SELECT 
            ic.id_item_compra,
            ic.id_produto,
            p.nome_produto,
            ic.quantidade_compra,
            ic.preco_pago_compra,
            (ic.preco_pago_compra * ic.quantidade_compra) AS total_item
        FROM item_compra ic
        INNER JOIN produto p ON p.id_produto = ic.id_produto
        WHERE ic.id_compra = :idVenda
    ";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':idVenda', $idVenda, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function atualizarStatusEntrega(int $idCompra, int $status): void
{
    $stmt = $this->db->getConnection()->prepare(
        "UPDATE item_compra SET status_entrega_compra = :status WHERE id_compra = :idCompra"
    );
    $stmt->execute([':status' => $status, ':idCompra' => $idCompra]);
}

public function atualizarStatusPagamento(int $idCompra, int $status): void
{
    $stmt = $this->db->getConnection()->prepare(
        "UPDATE item_compra SET status_pagamento_compra = :status WHERE id_compra = :idCompra"
    );
    $stmt->execute([':status' => $status, ':idCompra' => $idCompra]);
}



}