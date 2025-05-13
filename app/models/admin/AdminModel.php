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
    $sql = "
        SELECT 
            c.*, 
            e.rua_endereco AS endereco, 
            e.bairro_endereco AS bairro, 
            e.numero_endereco AS numero, 
            e.referencia_endereco AS referencia,
            e.uf_endereco AS estado, 
            e.cidade_endereco AS cidade
        FROM cliente c
        LEFT JOIN endereco e ON e.id_cliente = c.id_cliente
        WHERE 
    ";

    $params = [];

    if ($id && $email) {
        $sql .= "c.id_cliente = :id OR c.email_cliente = :email";
        $params[':id'] = $id;
        $params[':email'] = $email;
    } elseif ($id) {
        $sql .= "c.id_cliente = :id";
        $params[':id'] = $id;
    } elseif ($email) {
        $sql .= "c.email_cliente = :email";
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