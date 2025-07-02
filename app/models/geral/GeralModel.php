<?php

require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../cliente/ClienteModel.php';

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

    public function updateEmail(int $id, string $email): bool
    {
        $email = trim($email);
        if (strlen($email) > 70) {
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $current = $this->db->getConnection()
                          ->prepare("SELECT email_cliente FROM cliente WHERE id_cliente = :id");
        $current->execute([':id' => $id]);
        if ($current->fetchColumn() === $email) {
            return true;
        }
        $clienteModel = new ClienteModel();
        if ($clienteModel->emailExists($email)) {
            return false;
        }
        $stmt = $this->db->getConnection()
                        ->prepare("UPDATE cliente SET email_cliente = :email WHERE id_cliente = :id");
        return $stmt->execute([
            ':email' => $email,
            ':id'    => $id
        ]);
    }


    public function updateTelefone(int $id, string $ddd, string $numero): bool
    {
        $ddd    = trim($ddd);
        $numero = trim($numero); 

        // only digits
        if (!ctype_digit($ddd) || !ctype_digit($numero)) {
            return false;
        }
        // DDD: 2 digits; número: 8 a 9 dígitos
        if (strlen($ddd) !== 2 || strlen($numero) < 8 || strlen($numero) > 9) {
            return false;
        }

        // if it's already this phone, nothing to do
        $stmt = $this->db->getConnection()
                         ->prepare("SELECT ddd_cliente, numero_celular_cliente FROM cliente WHERE id_cliente = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
        if (($row['ddd_cliente'] ?? '') === $ddd && ($row['numero_celular_cliente'] ?? '') === $numero) {
            return true;
        }

        // perform update
        $stmt = $this->db->getConnection()
                         ->prepare("UPDATE cliente 
                                      SET ddd_cliente = :ddd, numero_celular_cliente = :num 
                                    WHERE id_cliente = :id");
        return $stmt->execute([
            ':ddd' => $ddd,
            ':num' => $numero,
            ':id'  => $id
        ]);
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

    public function updateDescricaoPerfil(int $id_cliente, string $descricao): bool {
        $maxLength = 500; 
        if (strlen($descricao) > $maxLength) {
            return false; 
        }
    
        $conn = $this->db->getConnection();
    
        $check = $conn->prepare("SELECT descricao_perfil FROM perfil WHERE id_cliente = :id_cliente");
        $check->execute([':id_cliente' => $id_cliente]);
        $atual = $check->fetchColumn();
    
        if ($atual === $descricao) return true; 

        $descricao = htmlspecialchars($descricao, ENT_QUOTES, 'UTF-8');
    
        $stmt = $conn->prepare("UPDATE perfil SET descricao_perfil = :descricao WHERE id_cliente = :id_cliente");
        return $stmt->execute([':descricao' => $descricao, ':id_cliente' => $id_cliente]);
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
