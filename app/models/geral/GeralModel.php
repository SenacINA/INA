<?php

require_once __DIR__ . '/../connect.php';

class GeralModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->db->connect();
    }

    public function getLocalizacoes(): array {
        $sql = "SELECT cidade.id_cidade, cidade.nome_cidade, estado.sigla_estado 
                FROM cidade
                JOIN estado ON cidade.id_estado = estado.id_estado
                ORDER BY estado.sigla_estado, cidade.nome_cidade";
        
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPerfil(int $id): array {
        $sql = "SELECT foto_perfil, banner_perfil FROM perfil WHERE id_cliente = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
    

    public function updateSocial(int $clienteId, array $data): bool {
        $dados = [
            'descricao' => 'descricao_perfil',
            'tiktok' => 'tiktok_perfil',
            'linkedin' => 'linkedin_perfil',
            'facebook' => 'facebook_perfil',
            'youtube' => 'youtube_perfil',
            'instagram' => 'instagram_perfil',
            'x' => 'x_perfil'
        ];

        $sets   = [];
        $params = [':id_cliente' => $clienteId];

        foreach ($dados as $key => $column) {
            if (isset($data[$key])) {
                $sets[] = "`$column` = :$key";
                $params[":$key"] = $data[$key];
            }
        }

        if (empty($sets)) {
            return false;
        }

        $sql = "UPDATE perfil
                SET " . implode(', ', $sets) . "
                WHERE id_cliente = :id_cliente";

        return $this->db->executeQuery($sql, $params) > 0;
    }

    public function updateNome(int $id, string $nome): bool {
        $sql = "UPDATE cliente 
                  SET nome_cliente = :nome 
                WHERE id_cliente = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':id',   $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateLocalizacao(int $clienteId, int $cidadeId): bool {
        $sql = "
          INSERT INTO endereco (id_cliente, id_cidade)
          VALUES (:id, :cidade)
          ON DUPLICATE KEY
          UPDATE id_cidade = :cidade
        ";
        $params = [
          ':id'      => $clienteId,
          ':cidade'  => $cidadeId
        ];
        $rows = $this->db->executeQuery($sql, $params);
        return $rows !== false;
    }

    public function updateFotoBlob(int $id, string $bin): bool {
        $sql = "UPDATE perfil 
                  SET foto_perfil = :blob 
                WHERE id_cliente = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':blob', $bin, PDO::PARAM_LOB);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateBannerBlob(int $id, string $bin): bool {
        $sql = "UPDATE perfil 
                  SET banner_perfil = :blob 
                WHERE id_cliente = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':blob', $bin, PDO::PARAM_LOB);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
