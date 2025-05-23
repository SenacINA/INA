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

    public function getPerfil(int $id): array {
        $sql = "SELECT foto_perfil, banner_perfil
                FROM perfil
                WHERE id_cliente = :id
                LIMIT 1";
        $params = [':id' => $id];
        $res = $this->db->executeQuery($sql, $params);
        return $res[0] ?? [];
    }

    public function updateSocial(int $clienteId, array $data): bool {
        $map = [
            'descricao' => 'descricao_perfil',
            'tiktok'    => 'tiktok_perfil',
            'linkedin'  => 'linkedin_perfil',
            'facebook'  => 'facebook_perfil',
            'youtube'   => 'youtube_perfil',
            'instagram' => 'instagram_perfil',
            'x'         => 'x_perfil',
        ];
        $sets   = [];
        $params = [':id_cliente' => $clienteId];
        foreach ($map as $field => $col) {
            if (isset($data[$field])) {
                $sets[] = "`{$col}` = :{$field}";
                $params[":{$field}"] = $data[$field];
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
        $maxLength = 100; 
        if (strlen($nome) > $maxLength) {
            return false; 
        }

        $conn = $this->db->getConnection();

        $check = $conn->prepare("SELECT nome_cliente FROM cliente WHERE id_cliente = :id");
        $check->execute([':id' => $id]);
        $atual = $check->fetchColumn();

        if ($atual === $nome) return true; 

        $stmt = $conn->prepare("UPDATE cliente SET nome_cliente = :nome WHERE id_cliente = :id");
        return $stmt->execute([':nome' => $nome, ':id' => $id]);
    }


    public function updateLocalizacao(int $clienteId, string $uf, string $cidade): bool {
        $sql = "
            INSERT INTO endereco (id_cliente, uf_endereco, cidade_endereco)
            VALUES (:id, :uf, :cidade)
            ON DUPLICATE KEY UPDATE
                uf_endereco = VALUES(uf_endereco),
                cidade_endereco = VALUES(cidade_endereco)
        ";
        
        $params = [
            ':id'     => $clienteId,
            ':uf'     => $uf,
            ':cidade' => $cidade
        ];
        
        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute($params);
    }

    public function updateFotoPerfil(int $id, string $path): bool {
        $sql = "UPDATE perfil SET foto_perfil = :path WHERE id_cliente = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':path', $path);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function updateBannerPerfil(int $id, string $path): bool {
        $sql = "UPDATE perfil SET banner_perfil = :path WHERE id_cliente = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':path', $path);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
   
}
