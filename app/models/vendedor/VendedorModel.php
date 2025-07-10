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

    public function getVendedorNum(string $id_vendedor): ?array
    {
      $sql = "
        SELECT c.ddd_cliente, c.numero_celular_cliente
        FROM vendedor v
        JOIN cliente c ON c.id_cliente = v.id_cliente
        WHERE v.id_vendedor = :id_vendedor
        LIMIT 1;
      ";

      $stmt = $this->db->getConnection()->prepare($sql);
      $stmt->bindValue(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
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

  public function codJaExiste (int $id_vendedor, int $cod_produto): bool {
    $sql = "
      SELECT COUNT(*) FROM produto WHERE id_vendedor = :id_vendedor AND cod_produto = :cod_produto;
    ";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
    $stmt->bindValue(':cod_produto', $cod_produto, PDO::PARAM_INT);
    $stmt->execute();
    return (bool) $stmt->fetchColumn();
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
        c.id_categoria,
        c.nome_categoria,
        s.id_subcategoria,
        s.nome_subcategoria,
        i.id_imagem_produto,
        i.endereco_imagem_produto,
        i.index_imagem_produto
      FROM produto AS p
      LEFT JOIN categoria AS c
        ON p.categoria_produto = c.id_categoria
      LEFT JOIN subcategoria AS s
        ON p.subcategoria_produto = s.id_subcategoria
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
      'id_produto'          => $first['id_produto'],
      'id_vendedor'         => $first['id_vendedor'],
      'cod_produto'         => $first['cod_produto'],
      'nome_produto'        => $first['nome_produto'],
      'preco_produto'       => $first['preco_produto'],
      'marca_produto'       => $first['marca_produto'],
      'categoria_produto'   => $first['categoria_produto'],    
      'subcategoria_produto'=> $first['subcategoria_produto'], 
      'origem_produto'      => $first['origem_produto'],
      'unidade_produto'     => $first['unidade_produto'],
      'peso_liquido_produto'=> $first['peso_liquido_produto'],
      'peso_bruto_produto'  => $first['peso_bruto_produto'],
      'largura_produto'     => $first['largura_produto'],
      'altura_produto'      => $first['altura_produto'],
      'comprimento_produto' => $first['comprimento_produto'],
      'descricao_produto'   => $first['descricao_produto'],
      'status_produto'      => $first['status_produto'],

      'categoria' => [
        'id'   => $first['id_categoria'],
        'nome' => $first['nome_categoria'],
      ],

      'subcategoria' => [
        'id'   => $first['id_subcategoria'],
        'nome' => $first['nome_subcategoria'],
      ],

      'imagens' => [],
    ];

    foreach ($rows as $r) {
      if (!empty($r['id_imagem_produto'])) {
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

  public function getAllWithSub(): array
  {
    $sqlCat = "
        SELECT
          id_categoria  AS id,
          nome_categoria AS nome
        FROM categoria
        ORDER BY nome_categoria
    ";
    $stmtCat = $this->db->getConnection()->prepare($sqlCat);
    $stmtCat->execute();
    $cats = $stmtCat->fetchAll(PDO::FETCH_ASSOC);

    $sqlSub = "
        SELECT
          id_subcategoria           AS id,
          nome_subcategoria         AS nome,
          categoria_subcategoria    AS categoria_id
        FROM subcategoria
        WHERE categoria_subcategoria = :cid
        ORDER BY nome_subcategoria
    ";
    $stmtSub = $this->db->getConnection()->prepare($sqlSub);

    foreach ($cats as &$cat) {
        $stmtSub->execute([':cid' => $cat['id']]);
        $cat['subcategorias'] = $stmtSub->fetchAll(PDO::FETCH_ASSOC);
    }

    return $cats;
  }

  public function produtoDoVendedor(int $id_vendedor, int $id_produto): bool
  {
    $sql = "
      SELECT COUNT(*) FROM produto
      WHERE id_vendedor = :id_vendedor AND id_produto = :id_produto;
    ";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
    $stmt->bindValue(':id_produto', $id_produto, PDO::PARAM_INT);
    $stmt->execute();
    return (bool) $stmt->fetchColumn();
  }

}
