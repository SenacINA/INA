<?php

require_once __DIR__ . '/../../../models/admin/HistoricoAcessoModel.php';
require_once __DIR__ . '/../../../utils/RenderView.php';

session_start();

class HistoricoAcessoController {
    public function index() {
        $model = new HistoricoAcessoModel();

        // Salva e carrega filtros da sessão
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['filtro_ip'] = $_POST['ip'] ?? '';
            $_SESSION['filtro_data'] = $_POST['data'] ?? '';
            $_SESSION['filtro_hora'] = $_POST['hora'] ?? '';
        }

        $ip = $_SESSION['filtro_ip'] ?? '';
        $data = $_SESSION['filtro_data'] ?? '';
        $hora = $_SESSION['filtro_hora'] ?? '';

        $resultados = $model->buscarAcessos($ip, $data, $hora);

        RenderView::render('admin/HistoricoAcesso', [
            'resultados' => $resultados,
            'filtros' => compact('ip', 'data', 'hora')
        ]);
    }
}
