<?php

require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../geral/GeralModel.php';

class CadastroVendedorModel {
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  
  public function createVendedor(
      int $id, string $localEmpresa, string $cep, string $logradouro, int $numero, 
      string $nome, string $cpfcnpj, string $rg, string $email, string $categoria, 
      string $telefone1, string $telefone2
  ): bool {
      // Garantir que todos os valores estão limpos
      $rg = trim($rg);
      $cep = trim($cep);
      $nome = trim($nome);
      $cpfcnpj = trim($cpfcnpj);
      $localEmpresa = trim($localEmpresa);

      // Extrair UF e cidade do campo localEmpresa
      if (!empty($localEmpresa) && strpos($localEmpresa, '-') !== false) {
          list($uf, $cidade) = array_map('trim', explode('-', $localEmpresa));
      } else {
          $uf = '';
          $cidade = '';
      }

      try {
          $db = $this->db->getConnection();

          // Atualizar cliente
          $sql1 = "UPDATE cliente SET rg_cliente = :rg, cep_cliente = :cep, tipo_conta_cliente = 1 WHERE id_cliente = :id";
          $stmt1 = $db->prepare($sql1);
          $stmt1->bindValue(':rg', $rg);
          $stmt1->bindValue(':cep', $cep);
          $stmt1->bindValue(':id', $id);
          $stmt1->execute();

          // Inserir vendedor
          $sql2 = "INSERT INTO vendedor (nome_fantasia, cnpj_vendedor) VALUES (:nome, :cpfcnpj)";
          $stmt2 = $db->prepare($sql2);
          $stmt2->bindValue(':nome', $nome);
          $stmt2->bindValue(':cpfcnpj', $cpfcnpj);
          $stmt2->execute();

          $modelGeral = new GeralModel();
          $successLocalizacao = $modelGeral->updateLocalizacao($id, $uf, $cidade);

          if (!$successLocalizacao) {
              throw new Exception('Erro ao atualizar localização.');
          }

          return true;
      } catch (PDOException | Exception $e) {
          return false;
      }
  }

}