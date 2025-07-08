<?php
require_once('./app/models/connect.php');

class GerenciarPropagandasModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function inserirOuAtualizarImagemPropaganda(string $tipo, string $endereco, int $index = 0, bool $ativo = true)
    {
        $tipo = strtoupper($tipo);

        $sql = "INSERT INTO imagem_propagandas (tipo_propaganda, endereco_imagem, index_exibicao, ativo) 
                VALUES (:tipo, :endereco, :index, :ativo)
                ON DUPLICATE KEY UPDATE 
                    endereco_imagem = VALUES(endereco_imagem),
                    ativo = VALUES(ativo)";

        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([
            ':tipo' => $tipo,
            ':endereco' => $endereco,
            ':index' => $index,
            ':ativo' => $ativo ? 1 : 0
        ]);
    }

    public function inserirOuAtualizarImagemCarrossel(string $endereco, int $index = 0, bool $ativo = true)
    {
        $sql = "INSERT INTO imagem_carrossel (endereco_carrossel, index_exibicao, ativo) 
                VALUES (:endereco, :index, :ativo)
                ON DUPLICATE KEY UPDATE 
                    endereco_carrossel = VALUES(endereco_carrossel),
                    ativo = VALUES(ativo)";

        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([
            ':endereco' => $endereco,
            ':index' => $index,
            ':ativo' => $ativo ? 1 : 0
        ]);
    }

    public function buscarImagemPropagandaPorTipoEIndex(string $tipo, int $index)
    {
        $sql = "SELECT endereco_imagem FROM imagem_propagandas WHERE tipo_propaganda = :tipo AND index_exibicao = :index LIMIT 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([
            ':tipo' => strtoupper($tipo),
            ':index' => $index,
        ]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado['endereco_imagem'] : null;
    }

    public function buscarImagemCarrosselPorIndex(int $index)
    {
        $sql = "SELECT endereco_carrossel FROM imagem_carrossel WHERE index_exibicao = :index LIMIT 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([':index' => $index]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado['endereco_carrossel'] : null;
    }

    public function contarImagensAtivasPorTipo($tipo)
    {
        $sql = "SELECT COUNT(*) as total FROM imagem_propagandas WHERE tipo_propaganda = :tipo AND ativo = 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([':tipo' => strtoupper($tipo)]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $resultado['total'];
    }

    public function listarImagensPorTipo(string $tipo, int $limite = 2)
    {
        $limite = (int) $limite;
        if ($limite <= 0) {
            $limite = 2;
        }
        $sql = "SELECT endereco_imagem, index_exibicao AS `index` FROM imagem_propagandas WHERE tipo_propaganda = :tipo AND ativo = 1 ORDER BY index_exibicao ASC LIMIT $limite";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([':tipo' => strtoupper($tipo)]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarImagensCarrossel()
    {
        $sql = "SELECT endereco_carrossel, index_exibicao AS `index` FROM imagem_carrossel WHERE ativo = 1 ORDER BY index_exibicao ASC LIMIT 4";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function limparDuplicatas()
    {
        try {
            $db = $this->db->getConnection();

            $sqlPropagandas = "
            DELETE ip FROM imagem_propagandas ip
            INNER JOIN (
                SELECT tipo_propaganda, index_exibicao, MIN(id_imagem_propaganda) AS menor_id
                FROM imagem_propagandas
                GROUP BY tipo_propaganda, index_exibicao
                HAVING COUNT(*) > 1
            ) dup ON ip.tipo_propaganda = dup.tipo_propaganda
                  AND ip.index_exibicao = dup.index_exibicao
                  AND ip.id_imagem_propaganda <> dup.menor_id;
        ";

            $sqlCarrossel = "
            DELETE ic FROM imagem_carrossel ic
            INNER JOIN (
                SELECT index_exibicao, MIN(id_imagem_carrossel) AS menor_id
                FROM imagem_carrossel
                GROUP BY index_exibicao
                HAVING COUNT(*) > 1
            ) dup ON ic.index_exibicao = dup.index_exibicao
                  AND ic.id_imagem_carrossel <> dup.menor_id;
        ";

            $db->beginTransaction();
            $db->exec($sqlPropagandas);
            $db->exec($sqlCarrossel);
            $db->commit();

            return ['sucesso' => true, 'mensagem' => 'Duplicatas removidas com sucesso.'];
        } catch (PDOException $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            return ['erro' => 'Falha ao remover duplicatas: ' . $e->getMessage()];
        }
    }
}
