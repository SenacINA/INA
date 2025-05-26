<?php

require_once __DIR__ . '/../connect.php';

class AdminModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->db->connect();
    }

    public function getInfoAdmin($id) {
        $sql = "
            SELECT * 
            FROM cliente 
            JOIN permissao_admin 
            ON cliente.id_cliente = permissao_admin.id_cliente
            WHERE cliente.id_cliente = :id;
        ";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }
}
