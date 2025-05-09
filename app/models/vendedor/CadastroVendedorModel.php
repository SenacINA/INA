<?php

require_once __DIR__ . '/../connect.php';

class CadastroVendedorModel {
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function createVendedor(int $id, string $localEmpresa, string $cep, string $locradouro, int $numero, string $nome, string $cpfcnpj, string $rg, string $email, string $categoria, string $telefone1, string $telefone2) :bool {
    $sql = "UPDATE cliente SET rg_cliente = :rg, cep_cliente = :cep, tipo_conta_cliente = 1 WHERE id_cliente = :id;
    INSERT INTO `vendedor`(`nome_fantasia`, `cnpj_vendedor`) VALUES (:nome, :cpfcnpj);";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':rg', $rg);
    $stmt->bindValue(':cep', $cep);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':cpfcnpj', $cpfcnpj);

    return $stmt->execute();
  }
}