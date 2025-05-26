<?php

class HistoricoAcessoController extends RenderView {
    
    public function renderHistoricoAcesso() {
        // Inicializa a variável como um array vazio para garantir limpeza
        $resultados = [];

        // Carrega a view sem resultados pré-existentes
        $this->loadView('admin/HistoricoAcesso', ['resultados' => $resultados]);
    }

    public function buscarHistoricoAcesso() {
        require_once __DIR__.'/../../models/admin/HistoricoAcessoModel.php';

        $model = new HistoricoAcessoModel();

        // Captura os filtros da requisição e assegura que estão no formato correto
        $ip = $_POST['ip'] ?? null;
        $data = $_POST['data'] ?? null;
        $horario = $_POST['horario'] ?? null;

        // Garante que os filtros vazios sejam tratados corretamente no model
        $resultados = $model->buscarHistoricoAcesso($ip, $data, $horario);

        // Carrega a view apenas com os resultados filtrados
        $this->loadView('admin/HistoricoAcesso', ['resultados' => $resultados]);
        exit;
    }
}
