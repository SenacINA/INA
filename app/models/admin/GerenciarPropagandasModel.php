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

    public function adicionarImagem($tipo, $endereco, $index = 0, $ativo = true)
    {
        $sql = "INSERT INTO imagem_propagandas (tipo_propaganda, endereco_imagem, index_exibicao, ativo) 
                VALUES (:tipo, :endereco, :index, :ativo)";
        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([
            ':tipo' => $tipo,
            ':endereco' => $endereco,
            ':index' => $index,
            ':ativo' => $ativo ? 1 : 0
        ]);
    }

    public function adicionarImagemCarrossel($endereco, $index = 0, $ativo = true)
    {
        $sql = "INSERT INTO imagem_carrossel (endereco_carrossel, index_exibicao, ativo) 
            VALUES (:endereco, :index, :ativo)";
        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([
            ':endereco' => $endereco,
            ':index' => $index,
            ':ativo' => $ativo ? 1 : 0
        ]);
    }

    public function contarImagensAtivasPorTipo($tipo)
    {
        $sql = "SELECT COUNT(*) as total FROM imagem_propagandas WHERE tipo_propaganda = :tipo AND ativo = 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([':tipo' => $tipo]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $resultado['total'];
    }

    public function listarImagensPorTipo(string $tipo, int $limite = 2)
    {
        $limite = (int) $limite;
        if ($limite <= 0) {
            $limite = 2;
        }
        $sql = "SELECT * FROM imagem_propagandas WHERE tipo_propaganda = :tipo LIMIT $limite";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([':tipo' => $tipo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listarImagensCarrossel()
    {
        $sql = "SELECT * FROM imagem_carrossel ORDER BY id_imagem_carrossel ASC LIMIT 4";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
