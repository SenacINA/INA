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
        $sql .= "c.id_cliente = :id AND c.email_cliente = :email";
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

    public function atualizarUsuario(array $dados): bool {
        $conn = $this->db->getConnection();


        $sqlCliente = "UPDATE cliente SET 
            nome_cliente = :nome,
            senha_cliente = :senha,
            email_cliente = :email,
            cpf_cliente = :cpf,
            numero_celular_cliente = :telefone,
            ddd_cliente = :ddd,
            cep_cliente = :cep,
            tipo_conta_cliente = :tipoConta,
            status_conta_cliente = :status
            WHERE id_cliente = :id";

        $stmtCliente = $conn->prepare($sqlCliente);
        $stmtCliente->execute([
            ':nome' => $dados['nomeInput'],
            ':senha' => $dados['senhaInput'],
            ':email' => $dados['emailInput'],
            ':cpf' => $dados['cpfInput'],
            ':telefone' => $dados['telefoneInput'],
            ':ddd' => substr($dados['telefoneInput'], 0, 2), // ou calcule de outra forma
            ':cep' => $dados['cepInput'],
            ':tipoConta' => $dados['tipoConta'],
            ':status' => $dados['status'],
            ':id' => $dados['id']
        ]);

        $sqlEndereco = "UPDATE endereco SET
            rua_endereco = :endereco,
            bairro_endereco = :bairro,
            numero_endereco = :numero,
            uf_endereco = :estado,
            cidade_endereco = :cidade
            WHERE id_cliente = :id";

        $stmtEndereco = $conn->prepare($sqlEndereco);
        return $stmtEndereco->execute([
            ':endereco' => $dados['enderecoInput'],
            ':bairro' => $dados['bairroInput'],
            ':numero' => $dados['numeroInput'],
            ':estado' => $dados['estadoInput'],
            ':cidade' => $dados['cidadeInput'],
            ':id' => $dados['id']
    ]);
}
}
