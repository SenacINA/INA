<?php
require_once __DIR__ . '/../connect.php';

class ClienteModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function emailExists(string $email): bool
    {
        $sql  = "SELECT COUNT(*) FROM cliente WHERE email_cliente = :email";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return (int)$stmt->fetchColumn() > 0;
    }

    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM cliente WHERE email_cliente = :email LIMIT 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function createUser(string $nome, string $email, string $senha): bool
    {
        $sql = "INSERT INTO cliente
                  (nome_cliente, email_cliente, senha_cliente,
                   data_registro_cliente, tipo_conta_cliente, status_conta_cliente)
                VALUES
                  (:nome, :email, :senha, CURDATE(), 2, 1)";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':nome',  $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        return $stmt->execute();
    }
}
