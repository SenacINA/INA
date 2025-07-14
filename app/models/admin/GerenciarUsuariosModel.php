<?php
require_once('./app/models/connect.php');

class GerenciarUsuariosModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function tipoUser(string $id): string
  {
    $sql  = "SELECT tipo_conta_cliente FROM cliente WHERE id_cliente = :id";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $tipoConta = $stmt->fetchColumn();

    switch ($tipoConta) {
      case 0:
        return "admin";
      case 1:
        return "vendedor";
      case 2:
        return "cliente";
      default:
        return "Tipo desconhecido";
    }
  }

  public function getUsers()
  {
    $sql = "SELECT 
          id_cliente, nome_cliente, data_registro_cliente, email_cliente,
          numero_celular_cliente, ddd_cliente, foto_perfil_cliente,
          tipo_conta_cliente, status_conta_cliente,
          CASE
            WHEN tipo_conta_cliente = 0 THEN 'Admin'
            WHEN tipo_conta_cliente = 1 THEN 'Vendedor'
            ELSE 'Cliente'
          END AS cargo
        FROM cliente";

    return $this->db->executeQuery($sql);
  }


  public function searchUserForms($nomeCodigo, $status, $mes, $ano)
  {
    if (
      (empty($nomeCodigo) || trim($nomeCodigo) === '' || $nomeCodigo === '0') &&
      (empty($status) || $status === null) &&
      (empty($mes) || $mes === null) &&
      (empty($ano) || $ano === null)
    ) {
      return $this->getUsers();
    }

    $sql = "SELECT 
          id_cliente, nome_cliente, email_cliente, data_registro_cliente,
          numero_celular_cliente, ddd_cliente, foto_perfil_cliente,
          tipo_conta_cliente, status_conta_cliente,
          CASE
            WHEN tipo_conta_cliente = 0 THEN 'Admin'
            WHEN tipo_conta_cliente = 1 THEN 'Vendedor'
            ELSE 'Cliente'
          END AS cargo
        FROM cliente
        WHERE 1=1";


    $params = [];
    if (!empty($nomeCodigo)) {
      if (ctype_digit($nomeCodigo)) {
        $sql .= " AND id_cliente = :id_cliente";
        $params[':id_cliente'] = (int)$nomeCodigo;
      } else {
        $sql .= " AND nome_cliente LIKE :nome_cliente";
        $params[':nome_cliente'] = '%' . $nomeCodigo . '%';
      }
    } else {
      if (!empty($status)) {
        $sql .= " AND status_conta_cliente = :status";
        $params[':status'] = $status;
      }

      if (!empty($mes)) {
        $sql .= " AND MONTH(data_registro_cliente) = :mes";
        $params[':mes'] = (int)$mes;
      }

      if (!empty($ano)) {
        $sql .= " AND YEAR(data_registro_cliente) = :ano";
        $params[':ano'] = (int)$ano;
      }
    }
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function desativarUserById(int $id): bool
  {
    $sql = "UPDATE cliente SET status_conta_cliente = 0 WHERE id_cliente = :id";
    $stmt = $this->db->getConnection()->prepare($sql);
    return $stmt->execute([':id' => $id]);
  }

  public function ativarUserById(int $id): bool
  {
    $sql = "UPDATE cliente SET status_conta_cliente = 1 WHERE id_cliente = :id";
    $stmt = $this->db->getConnection()->prepare($sql);
    return $stmt->execute([':id' => $id]);
  }
}
