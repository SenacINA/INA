<?php
require_once __DIR__ . '/../connect.php';

class ProdutoClienteModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function searchProduto($id)
  {
    $sql = "SELECT
    p.id_vendedor,
    p.nome_produto,
    p.preco_produto,
    p.status_produto,
    p.peso_liquido_produto,
    p.altura_produto,
    p.largura_produto,
    p.descricao_produto,
    ip.id_imagem_produto,
    ip.endereco_imagem_produto,
    ip.index_imagem_produto,
    v.nome_fantasia AS nome_vendedor,
    e.uf_endereco,
    e.cidade_endereco,
    c.foto_perfil_cliente

FROM 
    produto p
LEFT JOIN 
    imagem_produto ip ON p.id_produto = ip.id_produto
INNER JOIN
    vendedor v ON p.id_vendedor = v.id_vendedor
INNER JOIN
    cliente c ON v.id_cliente = c.id_cliente
LEFT JOIN
    endereco e ON c.id_cliente = e.id_cliente
WHERE 
    p.status_produto != 0
    AND p.id_produto = :id;";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql2 = "SELECT id_imagem_produto, endereco_imagem_produto, index_imagem_produto FROM imagem_produto WHERE id_produto = :id";
    $stmt2 = $this->db->getConnection()->prepare($sql2);
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();
    $imagens = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    return [
      'infoProduto' => $produto,
      'imagens' => $imagens
    ];
  }

  public function getComentarios(int $idVendedor, int $idProduto, int $limit = 5, int $offset = 0): array
  {
      $sql = "
          SELECT
              a.id_avaliacao,
              a.estrelas_avaliacao,
              a.data_avaliacao,
              a.descricao_avaliacao,
              a.qualidade,
              a.parecido,
              c.nome_cliente,
              p.foto_perfil AS foto_perfil_cliente,
              GROUP_CONCAT(i.endereco_imagem_avaliacao SEPARATOR '||') AS imagens
          FROM avaliacao a
          JOIN cliente c
            ON c.id_cliente = a.id_cliente
          LEFT JOIN perfil p
            ON p.id_cliente = c.id_cliente
          LEFT JOIN imagem_avaliacao i
            ON i.id_avaliacao = a.id_avaliacao
          WHERE
            a.id_vendedor   = :idVendedor
            AND a.id_produto = :idProduto
            AND a.status_avaliacao = 1
          GROUP BY a.id_avaliacao
          ORDER BY a.data_avaliacao DESC
          LIMIT :limit OFFSET :offset
      ";

      // Obter conexão PDO
      $pdo = $this->db->getConnection();
      $stmt = $pdo->prepare($sql);

      $stmt->bindValue(':idVendedor', $idVendedor, \PDO::PARAM_INT);
      $stmt->bindValue(':idProduto',  $idProduto,  \PDO::PARAM_INT);
      $stmt->bindValue(':limit',      $limit,      \PDO::PARAM_INT);
      $stmt->bindValue(':offset',     $offset,     \PDO::PARAM_INT);
      
      $stmt->execute();

      $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      foreach ($rows as &$r) {
          $r['imagens'] = $r['imagens'] ? explode('||', $r['imagens']) : [];
      }

      return $rows;
  }
}