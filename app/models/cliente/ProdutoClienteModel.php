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
        c.foto_perfil_cliente,
        pr.ativo_promocao,
        pr.tipo_promocao,
        pr.desconto_promocao,
        pr.data_inicio_promocao,
        pr.data_fim_promocao,
        pr.hora_fim_promocao
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
        LEFT JOIN promocao pr
            ON p.id_produto = pr.id_produto
            AND pr.ativo_promocao = TRUE
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

    public function getMediaAvaliacoes(int $idProduto): float
    {
        $sql = "
            SELECT 
                AVG(a.estrelas_avaliacao) AS media,
                COUNT(a.id_avaliacao) AS total_avaliacoes
            FROM avaliacao a
            WHERE 
                a.id_produto = :idProduto
                AND a.status_avaliacao = 1
        ";

        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idProduto', $idProduto, \PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result['media'] ? (float) $result['media'] : 0.0;
    }

    public function clientePodeAvaliar(int $idCliente, int $idProduto): bool
    {
    $pdo = $this->db->getConnection();

    $sql = "SELECT 
            (SELECT COUNT(*) FROM item_compra ic
            JOIN compra c ON ic.id_compra = c.id_compra
            WHERE c.id_cliente = :idCliente 
            AND ic.id_produto = :idProduto
            AND ic.status_entrega_compra = 1) AS comprou,
            
            (SELECT COUNT(*) FROM avaliacao 
            WHERE id_cliente = :idCliente 
            AND id_produto = :idProduto) AS avaliou";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idCliente' => $idCliente, ':idProduto' => $idProduto]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($result['comprou'] > 0) && ($result['avaliou'] == 0);
    }

    public function getDistribuicaoAvaliacoes(int $idProduto): array
    {
        $pdo = $this->db->getConnection();
        
        $sql = "
            SELECT
                estrelas_avaliacao,
                COUNT(*) AS total
            FROM avaliacao
            WHERE 
                id_produto = :idProduto
                AND status_avaliacao = 1
            GROUP BY estrelas_avaliacao
            ORDER BY estrelas_avaliacao DESC
        ";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idProduto', $idProduto, \PDO::PARAM_INT);
        $stmt->execute();
        
        $distribuicao = [
            5 => 0,
            4 => 0,
            3 => 0,
            2 => 0,
            1 => 0
        ];
        
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $estrelas = (int) $row['estrelas_avaliacao'];
            if ($estrelas >= 1 && $estrelas <= 5) {
                $distribuicao[$estrelas] = (int) $row['total'];
            }
        }
        
        $sqlMidia = "
            SELECT COUNT(DISTINCT a.id_avaliacao) AS total
            FROM avaliacao a
            JOIN imagem_avaliacao i ON a.id_avaliacao = i.id_avaliacao
            WHERE 
                a.id_produto = :idProduto
                AND a.status_avaliacao = 1
        ";
        
        $stmtMidia = $pdo->prepare($sqlMidia);
        $stmtMidia->bindValue(':idProduto', $idProduto, \PDO::PARAM_INT);
        $stmtMidia->execute();
        $midia = $stmtMidia->fetch(\PDO::FETCH_ASSOC);
        
        return [
            'estrelas' => $distribuicao,
            'com_midia' => $midia['total'] ?? 0
        ];
    } 

    public function insertAvaliacao($data) {
       $sql = "INSERT INTO avaliacao (
            status_avaliacao,
            estrelas_avaliacao,
            descricao_avaliacao,
            qualidade,
            parecido,
            id_produto,
            id_cliente,
            id_vendedor,
            data_avaliacao
        ) VALUES (1, ?, ?, ?, ?, ?, ?, ?, CURDATE())";

        
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([
            $data['estrelas'],
            $data['comentario'],
            $data['qualidade'],
            $data['parecido'],
            $data['id_produto'],
            $data['id_cliente'],
            $data['id_vendedor']
        ]);

        
        return $this->db->getConnection()->lastInsertId();
    }

    public function insertImagemAvaliacao($avaliacaoId, $caminho) {
        $sql = "INSERT INTO imagem_avaliacao (id_avaliacao, endereco_imagem_avaliacao) VALUES (?, ?)";
        
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$avaliacaoId, $caminho]);
    }

    public function getComentarios(int $idProduto, int $limit = 5, int $offset = 0): array
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
                COALESCE(p.foto_perfil, c.foto_perfil_cliente) AS foto_perfil_cliente,
                GROUP_CONCAT(ia.endereco_imagem_avaliacao SEPARATOR '||') AS imagens
            FROM avaliacao a
            JOIN cliente c ON c.id_cliente = a.id_cliente
            LEFT JOIN perfil p ON p.id_cliente = c.id_cliente
            LEFT JOIN imagem_avaliacao ia ON ia.id_avaliacao = a.id_avaliacao
            WHERE
                a.id_produto = :idProduto
                AND a.status_avaliacao = 1
            GROUP BY a.id_avaliacao
            ORDER BY a.data_avaliacao DESC
            LIMIT :limit OFFSET :offset
        ";

        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':idProduto', $idProduto, \PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        
        $stmt->execute();

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($rows as &$r) {
            $r['imagens'] = $r['imagens'] ? explode('||', $r['imagens']) : [];
        }

        return $rows;
    }

    public function countComentarios(int $idProduto): int
    {
        $sql = "
            SELECT COUNT(DISTINCT a.id_avaliacao) as total
            FROM avaliacao a
            WHERE
                a.id_produto = :idProduto
                AND a.status_avaliacao = 1
        ";

        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idProduto', $idProduto, \PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return (int) $result['total'];
    }

    public function getAvaliacaoCliente(int $idVendedor, int $idProduto, int $idCliente): ?array
    {
        $sql = "SELECT 
                    c.nome_cliente,
                    a.estrelas_avaliacao,
                    a.qualidade,
                    a.parecido,
                    a.descricao_avaliacao AS texto,
                    a.data_avaliacao,
                    c.foto_perfil_cliente AS foto_perfil,
                    GROUP_CONCAT(ia.endereco_imagem_avaliacao) AS imagens
                FROM avaliacao a
                JOIN cliente c ON a.id_cliente = c.id_cliente
                LEFT JOIN imagem_avaliacao ia ON a.id_avaliacao = ia.id_avaliacao
                WHERE a.id_vendedor = :idVendedor 
                    AND a.id_produto = :idProduto 
                    AND a.id_cliente = :idCliente
                GROUP BY a.id_avaliacao
                LIMIT 1";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':idVendedor', $idVendedor, PDO::PARAM_INT);
        $stmt->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
        $stmt->bindValue(':idCliente', $idCliente, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            // Processar imagens para array
            $result['imagens'] = $result['imagens'] 
                ? explode(',', $result['imagens']) 
                : [];
                
            return $result;
        }
        
        return null;
    }

    public function beginTransaction() {
        $this->db->getConnection()->beginTransaction();
    }

    public function commit() {
        $this->db->getConnection()->commit();
    }

    public function rollBack() {
        $this->db->getConnection()->rollBack();
    }
}