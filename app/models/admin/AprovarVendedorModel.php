<?php
require_once('./app/models/connect.php');

class VendedorModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getRequisicoes(array $filtros = []): array
  {
    $this->db->connect();

    $sql = "SELECT 
        v.id_vendedor AS codigo,
        v.nome_fantasia AS vendedor,
        CASE WHEN v.requisitos_completos = 1 THEN 'Completo' ELSE 'Incompleto' END AS requisitos,
        CASE WHEN v.documento_entregue = 1 THEN 'Entregue' ELSE 'Pendente' END AS declaracao,
        v.status,
        v.data_requisicao
    FROM vendedor v";

    $where = [];
    $params = [];

    if (!empty($filtros['search'])) {
      if (is_numeric($filtros['search'])) {
        $where[] = "v.id_vendedor = :id";
        $params[':id'] = (int)$filtros['search'];
      } else {
        $where[] = "v.nome_fantasia LIKE :nome";
        $params[':nome'] = '%' . $filtros['search'] . '%';
      }
    }

    if (!empty($filtros['status'])) {
      $where[] = 'v.status = :status';
      $params[':status'] = $filtros['status'];
    }

    if (!empty($filtros['mes'])) {
      $mesNum = date('n', strtotime("1 {$filtros['mes']}"));
      $where[] = 'MONTH(v.data_requisicao) = :mes';
      $params[':mes'] = $mesNum;
    }

    if (!empty($filtros['ano'])) {
      $where[] = 'YEAR(v.data_requisicao) = :ano';
      $params[':ano'] = $filtros['ano'];
    }

    if ($where) {
      $sql .= ' WHERE ' . implode(' AND ', $where);
    }

    $sql .= ' ORDER BY v.data_requisicao DESC LIMIT 100';

    $result = $this->db->executeQuery($sql, $params);
    $this->db->disconnect();

    return $result;
  }

  public function atualizarStatus(int $id, string $novoStatus): bool
  {
    $this->db->connect();

    $sql = "UPDATE vendedor SET status = :status WHERE id_vendedor = :id";
    $params = [
      ':status' => $novoStatus,
      ':id' => $id
    ];

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute($params);

    $rowCount = $stmt->rowCount();

    $this->db->disconnect();

    return $rowCount > 0;
  }

  public function getEstatisticas(): array
{
    $this->db->connect();

    $sql = "SELECT status, COUNT(*) AS total FROM vendedor GROUP BY status";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $this->db->disconnect();

    $estatisticas = [
        'Aprovado' => 0,
        'Reprovado' => 0,
        'Inativado' => 0
    ];

    foreach ($resultados as $linha) {
        $estatisticas[$linha['status']] = (int)$linha['total'];
    }

    return $estatisticas;
}

}
