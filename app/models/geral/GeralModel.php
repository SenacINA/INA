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
}
