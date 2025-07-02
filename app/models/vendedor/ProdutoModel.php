<?php

require_once __DIR__ . '/../connect.php';

class ProdutoModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function createPromocao(
        int $produtoId,
        bool $ativo_promocao,
        int $tipo_promocao,
        float $desconto_promocao,
        string $data_inicio_promocao,
        string $data_fim_promocao,
        string $hora_inicio_promocao,
        string $hora_fim_promocao
    ) {
        $sql = "INSERT INTO `promocao`(`id_produto`, `ativo_promocao`, `tipo_promocao`, `desconto_promocao`, `data_inicio_promocao`, `data_fim_promocao`, `hora_inicio_promocao`, `hora_fim_promocao`
        ) VALUES (
            :produtoId, :ativo_promocao, :tipo_promocao, :desconto_promocao, :data_inicio_promocao, :data_fim_promocao, :hora_inicio_promocao, :hora_fim_promocao
        );";
        try {
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindValue(':produtoId', $produtoId, PDO::PARAM_INT);
            $stmt->bindValue(':ativo_promocao', $ativo_promocao, PDO::PARAM_BOOL);
            $stmt->bindValue(':tipo_promocao', $tipo_promocao, PDO::PARAM_INT);
            $stmt->bindValue(':desconto_promocao', $desconto_promocao, PDO::PARAM_STR);
            $stmt->bindValue(':data_inicio_promocao', $data_inicio_promocao, PDO::PARAM_STR);
            $stmt->bindValue(':data_fim_promocao', $data_fim_promocao, PDO::PARAM_STR);
            $stmt->bindValue(':hora_inicio_promocao', $hora_inicio_promocao, PDO::PARAM_STR);
            $stmt->bindValue(':hora_fim_promocao', $hora_fim_promocao, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao inserir produto: " . $e->getMessage());
            return false;
        }
    }

    public function createProduto(
        int $idVendedor,
        string $nome,
        float $preco,
        string $marca,
        int $cod,
        int $categoria,
        int $subCategoria,
        string $origem,
        int $unidade,
        float $peso,
        float $pesoBruto,
        float $largura,
        float $altura,
        float $comprimento,
        string $descricao,
        bool $status
    ): int|false {
        $sql = "INSERT INTO produto(
          id_vendedor, nome_produto, preco_produto, marca_produto, cod_produto, categoria_produto, subcategoria_produto,
          origem_produto, unidade_produto, peso_liquido_produto, peso_bruto_produto,
          largura_produto, altura_produto, comprimento_produto, descricao_produto, status_produto
      ) VALUES (
          :id_vendedor, :nome, :preco, :marca, :cod, :categoria, :subCategoria,
          :origem, :unidade, :peso, :pesoBruto,
          :largura, :altura, :comprimento, :descricao, :status
      )";

        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':id_vendedor', $idVendedor, PDO::PARAM_INT);
            $stmt->bindValue(':cod', $cod, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindValue(':marca', $marca, PDO::PARAM_STR);
            $stmt->bindValue(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindValue(':subCategoria', $subCategoria, PDO::PARAM_INT);
            $stmt->bindValue(':origem', $origem, PDO::PARAM_STR);
            $stmt->bindValue(':unidade', $unidade, PDO::PARAM_INT);
            $stmt->bindValue(':peso', $peso, PDO::PARAM_STR);
            $stmt->bindValue(':pesoBruto', $pesoBruto, PDO::PARAM_STR);
            $stmt->bindValue(':largura', $largura, PDO::PARAM_STR);
            $stmt->bindValue(':altura', $altura, PDO::PARAM_STR);
            $stmt->bindValue(':comprimento', $comprimento, PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindValue(':status', $status, PDO::PARAM_BOOL);

            $stmt->execute();
            return $this->db->getConnection()->lastInsertId();
        } catch (PDOException $e) {
            error_log("Erro ao inserir produto: " . $e->getMessage());
            return false;
        }
    }

    public function adicionarImagemProduto(int $produtoId, string $caminhoImagem, int $ordem): bool
    {
        $sql = "INSERT INTO imagem_produto 
                (id_produto, endereco_imagem_produto, index_imagem_produto) 
                VALUES (:produto_id, :caminho, :ordem)";

        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':produto_id', $produtoId, PDO::PARAM_INT);
            $stmt->bindValue(':caminho', $caminhoImagem, PDO::PARAM_STR);
            $stmt->bindValue(':ordem', $ordem, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao inserir imagem do produto: " . $e->getMessage());
            return false;
        }
    }

    public function deletarProduto(int $produtoId): bool
    {
        $sql = "DELETE FROM produto WHERE id_produto = :id";

        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $produtoId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao deletar produto: " . $e->getMessage());
            return false;
        }
    }

    public function categoriaExiste(int $id): bool
    {
        $sql = "SELECT COUNT(*) FROM categoria WHERE id_categoria = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function subcategoriaExiste(int $id): bool
    {
        $sql = "SELECT COUNT(*) FROM subcategoria WHERE id_subcategoria = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function subcategoriaPertenceACategoria(int $subId, int $catId): bool
    {
        $sql = "SELECT COUNT(*) FROM subcategoria 
                WHERE id_subcategoria = :subId 
                AND categoria_subcategoria = :catId";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':subId', $subId, PDO::PARAM_INT);
        $stmt->bindValue(':catId', $catId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function searchProduct(?string $nome, ?string $codProduto, int $vendedorId): ?array {
        $conds = [];
        $params = [];

        if ($nome !== null && $nome !== '') {
            $conds[] = 'p.nome_produto LIKE :nome';
            $params[':nome'] = '%' . $nome . '%';
        }
        if ($codProduto !== null && $codProduto !== '') {
            $conds[] = 'p.cod_produto = :cod';
            $params[':cod'] = $codProduto;
        }
        if (empty($conds)) {
            return null;
        }

        $where = implode(' AND ', $conds);

        $sql = "
            SELECT
                p.id_produto AS id,
                p.cod_produto AS cod_produto,
                p.nome_produto,
                p.preco_produto,
                p.unidade_produto AS quantidade,
                p.status_produto,
                i.endereco_imagem_produto
            FROM produto p
            LEFT JOIN imagem_produto i
            ON i.id_produto = p.id_produto
            AND i.index_imagem_produto = 1
            WHERE ($where)
            AND p.id_vendedor = :vendedor
            LIMIT 1
        ";

        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindValue(':vendedor', $vendedorId, PDO::PARAM_INT);
        foreach ($params as $k => $v) {
            $stmt->bindValue($k, $v, PDO::PARAM_STR);
        }
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function getProdutoById(int $produtoId): ?array
    {
        $sql = "SELECT p.*, 
                    pr.id_promocao, pr.ativo_promocao, pr.tipo_promocao, pr.desconto_promocao,
                    pr.data_inicio_promocao, pr.data_fim_promocao, pr.hora_inicio_promocao, pr.hora_fim_promocao
                FROM produto p
                LEFT JOIN promocao pr ON pr.id_produto = p.id_produto
                WHERE p.id_produto = :id";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $produtoId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function updateProduto(
        int $produtoId,
        string $nome,
        float $preco,
        string $marca,
        int $cod,
        int $categoria,
        int $subCategoria,
        string $origem,
        int $unidade,
        float $peso,
        float $pesoBruto,
        float $largura,
        float $altura,
        float $comprimento,
        string $descricao
    ): bool {
        $sql = "UPDATE produto SET
            nome_produto = :nome,
            preco_produto = :preco,
            marca_produto = :marca,
            cod_produto = :cod,
            categoria_produto = :categoria,
            subcategoria_produto = :subCategoria,
            origem_produto = :origem,
            unidade_produto = :unidade,
            peso_liquido_produto = :peso,
            peso_bruto_produto = :pesoBruto,
            largura_produto = :largura,
            altura_produto = :altura,
            comprimento_produto = :comprimento,
            descricao_produto = :descricao
        WHERE id_produto = :produtoId";

        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindValue(':marca', $marca, PDO::PARAM_STR);
            $stmt->bindValue(':cod', $cod, PDO::PARAM_INT);
            $stmt->bindValue(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindValue(':subCategoria', $subCategoria, PDO::PARAM_INT);
            $stmt->bindValue(':origem', $origem, PDO::PARAM_STR);
            $stmt->bindValue(':unidade', $unidade, PDO::PARAM_INT);
            $stmt->bindValue(':peso', $peso, PDO::PARAM_STR);
            $stmt->bindValue(':pesoBruto', $pesoBruto, PDO::PARAM_STR);
            $stmt->bindValue(':largura', $largura, PDO::PARAM_STR);
            $stmt->bindValue(':altura', $altura, PDO::PARAM_STR);
            $stmt->bindValue(':comprimento', $comprimento, PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindValue(':produtoId', $produtoId, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao atualizar produto: " . $e->getMessage());
            return false;
        }
    }

    public function getPromocaoByProdutoId(int $produtoId): ?array
    {
        $sql = "SELECT * FROM promocao WHERE id_produto = :produtoId";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':produtoId', $produtoId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function updatePromocao(
        int $promocaoId,
        bool $ativo,
        int $tipo,
        float $desconto,
        string $dataInicio,
        string $dataFim,
        string $horaInicio,
        string $horaFim
    ): bool {
        $sql = "UPDATE promocao SET
            ativo_promocao = :ativo,
            tipo_promocao = :tipo,
            desconto_promocao = :desconto,
            data_inicio_promocao = :dataInicio,
            data_fim_promocao = :dataFim,
            hora_inicio_promocao = :horaInicio,
            hora_fim_promocao = :horaFim
        WHERE id_promocao = :promocaoId";

        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':ativo', $ativo, PDO::PARAM_BOOL);
            $stmt->bindValue(':tipo', $tipo, PDO::PARAM_INT);
            $stmt->bindValue(':desconto', $desconto, PDO::PARAM_STR);
            $stmt->bindValue(':dataInicio', $dataInicio, PDO::PARAM_STR);
            $stmt->bindValue(':dataFim', $dataFim, PDO::PARAM_STR);
            $stmt->bindValue(':horaInicio', $horaInicio, PDO::PARAM_STR);
            $stmt->bindValue(':horaFim', $horaFim, PDO::PARAM_STR);
            $stmt->bindValue(':promocaoId', $promocaoId, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao atualizar promoção: " . $e->getMessage());
            return false;
        }
    }

    public function desativarPromocao(int $promocaoId): bool
    {
        $sql = "UPDATE promocao SET ativo_promocao = 0 WHERE id_promocao = :id";
        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $promocaoId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao desativar promoção: " . $e->getMessage());
            return false;
        }
    }

    public function getImagensProduto(int $produtoId): array
    {
        $sql = "SELECT * FROM imagem_produto WHERE id_produto = :produtoId ORDER BY index_imagem_produto";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':produtoId', $produtoId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removerImagemProduto(int $imagemId): bool
    {
        $sql = "DELETE FROM imagem_produto WHERE id_imagem_produto = :imagemId";
        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':imagemId', $imagemId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao remover imagem: " . $e->getMessage());
            return false;
        }
    }

    public function atualizarOrdemImagem(int $imagemId, int $ordem): bool
    {
        $sql = "UPDATE imagem_produto SET index_imagem_produto = :ordem WHERE id_imagem_produto = :imagemId";
        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':ordem', $ordem, PDO::PARAM_INT);
            $stmt->bindValue(':imagemId', $imagemId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao atualizar ordem da imagem: " . $e->getMessage());
            return false;
        }
    }

    public function ativarInativarProduto(int $produtoId, bool $status): bool
    {
        $sql = "UPDATE produto SET status_produto = :status WHERE id_produto = :produtoId";
        try {
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':status', $status, PDO::PARAM_BOOL);
            $stmt->bindValue(':produtoId', $produtoId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao atualizar status do produto: " . $e->getMessage());
            return false;
        }
    }
}
