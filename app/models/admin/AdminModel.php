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

    public function pesquisarUsuario(?string $id, ?string $email): ?array
    {
    $sql = "SELECT * FROM cliente WHERE ";
    $params = [];

    if ($id && $email) {
        $sql .= "id_cliente = :id OR email_cliente = :email";
        $params[':id'] = $id;
        $params[':email'] = $email;
    } elseif ($id) {
        $sql .= "id_cliente = :id";
        $params[':id'] = $id;
    } elseif ($email) {
        $sql .= "email_cliente = :email";
        $params[':email'] = $email;
    }

    $sql .= " LIMIT 1";

    $stmt = $this->db->getConnection()->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ?: null;
}

}