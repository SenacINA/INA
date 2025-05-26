<?php

class HistoricoAcessoController extends RenderView{

    public function renderHistoricoAcesso() {
        $resultados = [];
        // Se a sessão com resultados existir, carrega para a view
        $this->loadView('admin/HistoricoAcesso', ['resultados' => $resultados]);

    }

    public function buscarHistoricoAcesso() {
        require_once __DIR__.'/../../models/admin/HistoricoAcessoModel.php';

        $model = new HistoricoAcessoModel();

        $ip = $_POST['ip'] ?? '';
        $data = $_POST['data'] ?? '';
        $horario = $_POST['horario'] ?? '';

        $resultados = [];

        $resultados = $model->buscarHistoricoAcesso($ip, $data, $horario) ?: [];

        $this->loadView('admin/HistoricoAcesso', ['resultados' => $resultados]);
        exit;
    }
}
