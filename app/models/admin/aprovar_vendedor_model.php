<?php
require_once('./app/models/connect.php');

class VendedorModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getRequisicoes(array $filtros = []): array {
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

        // filtro de busca por código ou nome
        if (!empty($filtros['search'])) {
            $where[] = "(v.id_vendedor LIKE :search OR v.nome_fantasia LIKE :search)";
            $params[':search'] = '%' . $filtros['search'] . '%';
        }

        // filtro de status
        if (!empty($filtros['status'])) {
            $where[] = 'v.status = :status';
            $params[':status'] = $filtros['status'];
        }

        // filtro de mês
        if (!empty($filtros['mes'])) {
            $where[] = 'MONTH(v.data_requisicao) = :mes';
            // converte nome do mês para número
            $mesNum = date('n', strtotime("1 {$filtros['mes']}"));
            $params[':mes'] = $mesNum;
        }

        // filtro de ano
        if (!empty($filtros['ano'])) {
            $where[] = 'YEAR(v.data_requisicao) = :ano';
            $params[':ano'] = $filtros['ano'];
        }

        if (count($where) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }

        $sql .= ' ORDER BY v.data_requisicao DESC LIMIT 100';

        $result = $this->db->executeQuery($sql, $params);
        $this->db->disconnect();

        return $result;
    }
}
