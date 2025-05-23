<?php

require_once __DIR__ . '/../../models/connect.php';

class HistoricoAcessoModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function buscarAcessos($ip = null, $data = null, $hora = null) {
        $sql = "SELECT ha.ip_historico_acesso, 
                       CASE 
                           WHEN c.tipo_conta_cliente = 0 THEN 'Cliente'
                           WHEN c.tipo_conta_cliente = 1 THEN 'Vendedor'
                           WHEN c.tipo_conta_cliente = 2 THEN 'Admin'
                           ELSE 'Desconhecido'
                       END AS cargo,
                       ha.data_historico_acesso,
                       ha.horario_historico_acesso,
                       ha.navegador_historico_acesso
                FROM historico_acesso ha
                LEFT JOIN cliente c ON ha.id_cliente = c.id_cliente
                WHERE 1 = 1";

        $params = [];

        if (!empty($ip)) {
            $sql .= " AND ha.ip_historico_acesso LIKE :ip";
            $params[':ip'] = "%$ip%";
        }

        if (!empty($data)) {
            $sql .= " AND ha.data_historico_acesso = :data";
            $params[':data'] = $data;
        }

        if (!empty($hora)) {
            $sql .= " AND ha.horario_historico_acesso = :hora";
            $params[':hora'] = $hora;
        }

        return $this->db->executeQuery($sql, $params);
    }
}
