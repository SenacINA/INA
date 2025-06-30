<?php

require_once __DIR__ . '/../connect.php';

class VendedorModel
{

  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function dadosVendedor(string $id): ?array
  {
    $sql = "
          SELECT * FROM vendedor WHERE id_cliente = :id;
        ";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
  }

   public function getVendedorId(int $clienteId): ?int
    {
        $db = new Database();
        $db->connect();
        
        $sql = "SELECT id_vendedor FROM vendedor WHERE id_cliente = :id_cliente";
        $stmt = $db->getConnection()->prepare($sql);
        $stmt->bindValue(':id_cliente', $clienteId, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['id_vendedor'] : null;
    }

  public function getEstrelasPorVendedor(string $idVendedor): array
  {
    $sql = "SELECT estrelas_avaliacao FROM avaliacao WHERE id_vendedor = :idVendedor";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':idVendedor', $idVendedor, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
  }

  public function getQuantidadeProdutos(string $id): int
  {
    $sql = "
            SELECT COUNT(id_produto) FROM produto WHERE id_vendedor = :id AND status_produto != false;
        ";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return (int) $stmt->fetchColumn();
  }

  public function updateNomeFantasia(int $id_vendedor, string $nome_fantasia): bool
  {
    $maxLength = 255;
    if (strlen($nome_fantasia) > $maxLength) {
      return false;
    }

    $conn = $this->db->getConnection();

    $check = $conn->prepare("SELECT nome_fantasia FROM vendedor WHERE id_vendedor = :id_vendedor");
    $check->execute([':id_vendedor' => $id_vendedor]);
    $atual = $check->fetchColumn();

    if ($atual === $nome_fantasia) return true;

    $stmt = $conn->prepare("UPDATE vendedor SET nome_fantasia = :nome_fantasia WHERE id_vendedor = :id_vendedor");
    return $stmt->execute([':nome_fantasia' => $nome_fantasia, ':id_vendedor' => $id_vendedor]);
  }

  public function getLastCod(int $id_vendedor): ?int {
    $sql = "
      SELECT max(cod_produto) FROM produto WHERE id_vendedor = :id_vendedor;
    ";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
  }
  
  public function getAllProducts(int $id_vendedor): ?array {
    $sql = "
        SELECT p.*, i.endereco_imagem_produto
        FROM produto p
        LEFT JOIN imagem_produto i
            ON i.id_produto = p.id_produto
            AND i.index_imagem_produto = 1
        WHERE p.id_vendedor = :id_vendedor
        ORDER BY p.cod_produto ASC
    ";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllProductsFiltered(int $id_vendedor, string $filter = 'code'): ?array
  {
    $allowed = ['code', 'name', 'qty_asc', 'qty_desc', 'active', 'inactive'];
    if (!in_array($filter, $allowed, true)) {
        $filter = 'code';
    }

    $orderBy = 'p.cod_produto'; 
    $where   = '';

    switch ($filter) {
        case 'name':
            $orderBy = 'p.nome_produto';
            break;
        case 'qty_asc':
            $orderBy = 'p.unidade_produto ASC';
            break;
        case 'qty_desc':
            $orderBy = 'p.unidade_produto DESC';
            break;
        case 'active':
            $where   = 'AND p.status_produto = 1';
            break;
        case 'inactive':
            $where   = 'AND p.status_produto = 0';
            break;
        case 'code':
        default:
            $orderBy = 'p.cod_produto';
            break;
    }

    $sql = "
        SELECT
            p.*,
            i.endereco_imagem_produto
        FROM produto p
        LEFT JOIN imagem_produto i
          ON i.id_produto = p.id_produto
         AND i.index_imagem_produto = 1
        WHERE p.id_vendedor = :id_vendedor
        $where
        ORDER BY $orderBy
    ";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function fetchProdutoComImagens(int $id_vendedor, int $id_produto): array {
    $sql = "
      SELECT
        p.*,
        i.id_imagem_produto,
        i.endereco_imagem_produto,
        i.index_imagem_produto
      FROM produto AS p
      LEFT JOIN imagem_produto AS i
        ON i.id_produto = p.id_produto
      WHERE p.id_vendedor = :id_vendedor
        AND p.id_produto  = :id_produto
    ";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute([
      ':id_vendedor' => $id_vendedor,
      ':id_produto'  => $id_produto
    ]);
    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    if (!$rows) {
      return [];
    }

    $first = $rows[0];
    $produto = [
      'id_produto'   => $first['id_produto'],
      'nome_produto' => $first['nome_produto'],  // pega o nome completo!
      'preco_produto'=> $first['preco_produto'],
      'imagens'      => [],
    ];

    foreach ($rows as $r) {
      if ($r['id_imagem_produto']) {
        $produto['imagens'][] = [
          'id'    => $r['id_imagem_produto'],
          'url'   => $r['endereco_imagem_produto'],
          'index' => $r['index_imagem_produto'],
        ];
      }
    }

    return $produto;
  }

  public function fetchPromocoes(int $id_produto): array {
    $sql = "
      SELECT
        pr.*,
        tp.promocao AS tipo_promocao_nome
      FROM promocao AS pr
      LEFT JOIN tipo_promocoes AS tp
        ON tp.id_tipo_promocao = pr.tipo_promocao
      WHERE pr.id_produto = :id_produto
    ";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute([':id_produto' => $id_produto]);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }


}
