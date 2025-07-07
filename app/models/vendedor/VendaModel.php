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
        SUM(ic.preco_pago_compra) AS total_pago_compra
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


}