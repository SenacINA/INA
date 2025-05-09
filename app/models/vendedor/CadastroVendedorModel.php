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
    $sqlUpdateCliente = "UPDATE cliente SET rg_cliente = :rg, cep_cliente = :cep, tipo_conta_cliente = 1 WHERE id_cliente = :id;";
    $stmt = $this->db->getConnection()->prepare($sqlUpdateCliente);
    $stmt->bindValue(':rg', $rg);
    $stmt->bindValue(':cep', $cep);
    $stmt->bindValue(':id', $id);
    
    $sqlInsertVendedor = "INSERT INTO `vendedor`(`nome_fantasia`, `cnpj_vendedor`) VALUES (:nome, :cpfcnpj);";
    $stmt = $this->db->getConnection()->prepare($sqlInsertVendedor);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':cpfcnpj', $cpfcnpj);
    $stmt->execute();
    
    $sqlInsertEndereco = "INSERT INTO `endereco`(`rua_endereco`, `numero_endereco`, `uf_endereco`, `id_cliente`) VALUES (:locradouro, :numero, :uf, :id);";
    $stmt = $this->db->getConnection()->prepare($sqlInsertEndereco);
    $stmt->bindValue(':locradouro', $locradouro);
    $stmt->bindValue(':numero', $numero);
    $uf = substr($localEmpresa, 0, 3);
    $stmt->bindValue(':uf', $uf);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();

  }
}