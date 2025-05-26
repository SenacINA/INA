<?php

class HistoricoAcessoController extends RenderView{

    public function renderHistoricoAcesso() {

        // Se a sessão com resultados existir, carrega para a view
        $dados = $_SESSION['historico_resultados'] ?? [];
        unset($_SESSION['historico_resultados']);
        $this->loadView('admin/HistoricoAcesso', []);

    }

    public function buscarHistoricoAcesso() {
        session_start();
        require_once __DIR__ . '/../../../models/connect.php';
        require_once __DIR__ . '/../../../models/admin/HistoricoAcessoModel.php';

        $pdo = connect();
        $model = new HistoricoAcessoModel($pdo);

        $ip = $_POST['ip'] ?? '';
        $data = $_POST['data'] ?? '';
        $horario = $_POST['horario'] ?? '';

        $resultados = $model->buscarHistoricoAcesso($ip, $data, $horario);
        $_SESSION['historico_resultados'] = $resultados;

        header('Location: HistoricoAcesso');
        exit;
    }
}
