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

    public function salvarEndereco(array $dadosEndereco): bool
    {
        $sql = "INSERT INTO endereco (
                    rua_endereco, bairro_endereco, numero_endereco,
                    referencia_endereco, uf_endereco, cidade_endereco, id_cliente
                ) VALUES (
                    :rua, :bairro, :numero, :referencia, :uf, :cidade, :idCliente
                )";

        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([
            ':rua' => $dadosEndereco['rua'],
            ':bairro' => $dadosEndereco['bairro'],
            ':numero' => $dadosEndereco['numero'],
            ':referencia' => $dadosEndereco['referencia'],
            ':uf' => $dadosEndereco['uf'],
            ':cidade' => $dadosEndereco['cidade'],
            ':idCliente' => $dadosEndereco['id_cliente']
        ]);
    }

    public function excluirEndereco(int $idEndereco): bool
    {
        $sql = "DELETE FROM endereco WHERE id_endereco = :idEndereco";
        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([':idEndereco' => $idEndereco]);
    }
}