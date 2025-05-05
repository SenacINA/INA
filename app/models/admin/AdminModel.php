<?php
require_once __DIR__ . '/../connect.php';

class AdminModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function pesquisarUsuario(string $email): bool
    {
        $sql  = "SELECT COUNT(*) FROM cliente WHERE email_cliente = :email";
        // $stmt = $this->db->getConnection()->prepare($sql);
        // $stmt->bindValue(':email', $email);
        // $stmt->execute();
        // return (int)$stmt->fetchColumn() > 0;
    }
}