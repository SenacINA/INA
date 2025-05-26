<?php

class HistoricoAcessoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
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

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
