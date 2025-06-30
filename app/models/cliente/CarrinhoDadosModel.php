<?php

require_once('./app/models/connect.php');

class CarrinhoDadosModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getEnderecosCliente(int $idCliente): array
    {
        $sql = "SELECT * FROM endereco WHERE id_cliente = :idCliente";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':idCliente', $idCliente);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editEderecos(int $idEndereco) {
        $sql = "SELECT * FROM endereco WHERE id_endereco = :idEndereco";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':idEndereco', $idEndereco);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvarEnderecoModel(array $dadosEndereco): bool
    {
        $sql = "INSERT INTO endereco (
                    rua_endereco, bairro_endereco, numero_endereco,
                    referencia_endereco, uf_endereco, cidade_endereco, id_cliente
                ) VALUES (
                    :rua, :bairro, :numero, :referencia, :uf, :cidade, :idCliente
                )";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':rua', $dadosEndereco['rua']);
        $stmt->bindValue(':bairro', $dadosEndereco['bairro']);
        $stmt->bindValue(':numero', $dadosEndereco['numero']);
        $stmt->bindValue(':referencia', $dadosEndereco['referencia']);
        $stmt->bindValue(':uf', $dadosEndereco['uf']);
        $stmt->bindValue(':cidade', $dadosEndereco['cidade']);
        $stmt->bindValue(':idCliente', $dadosEndereco['id_cliente']);
        return $stmt->execute();
    }

    public function excluirEnderecoModel(int $idEndereco): bool
    {
        $sql = "DELETE FROM endereco WHERE id_endereco = :idEndereco";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':idEndereco', $idEndereco);
        return $stmt->execute();
    }
}
