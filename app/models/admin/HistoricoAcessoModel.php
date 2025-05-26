<?php
require_once __DIR__ . '/../connect.php';


class HistoricoAcessoModel {

    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function buscarHistoricoAcesso($ip = '', $data = '', $horario = '') {
        $where = [];
        $params = [];

        if (!empty($ip)) {
            $where[] = "ha.ip_historico_acesso LIKE :ip";
            $params[':ip'] = '%' . $ip . '%';
        }

        if (!empty($data)) {
            $where[] = "ha.data_historico_acesso = :data";
            $params[':data'] = $data;
        }

       if (!empty($horario)) {
            $horario = date('H:i:s', strtotime($horario)); // Garante formato correto
            $where[] = "ha.horario_historico_acesso = :horario";
            $params[':horario'] = $horario;
        }

        $sql = "
            SELECT 
                ha.ip_historico_acesso AS ip,
                CASE 
                    WHEN c.tipo_conta_cliente = 0 THEN 'Cliente'
                    WHEN c.tipo_conta_cliente = 1 THEN 'Vendedor'
                    WHEN c.tipo_conta_cliente = 2 THEN 'Administrador'
                    ELSE 'Desconhecido'
                END AS cargo,
                ha.data_historico_acesso AS data,
                ha.horario_historico_acesso AS horario,
                ha.navegador_historico_acesso AS navegador
            FROM historico_acesso ha
            JOIN cliente c ON ha.id_cliente = c.id_cliente
        ";

        if (!empty($where)) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }

        $sql .= ' ORDER BY ha.data_historico_acesso DESC, ha.horario_historico_acesso DESC';

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute($params);
                
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

}
