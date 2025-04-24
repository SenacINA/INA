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

    /** Verifica se existe cliente com este email */
    public function emailExists(string $email): bool
    {
        $sql  = "SELECT COUNT(*) FROM cliente WHERE email_cliente = :email";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return (int)$stmt->fetchColumn() > 0;
    }

    /** Insere novo cliente na base */
    public function createUser(array $data): bool
    {
        $sql = "INSERT INTO cliente
                  (nome_cliente, email_cliente, senha_cliente,
                   data_registro_cliente, tipo_conta_cliente, status_conta_cliente)
                VALUES
                  (:nome, :email, :senha, CURDATE(), 2, 1)";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':nome',   $data['nome']);
        $stmt->bindValue(':email',  $data['email']);
        $stmt->bindValue(':senha',  $data['senha']);
        return $stmt->execute();
    }
}
