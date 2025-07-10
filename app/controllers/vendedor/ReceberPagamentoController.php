<?php
require_once __DIR__ . '/../../models/vendedor/VendaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_venda'])) {
    $idVenda = (int)$_POST['id_venda'];
    $model = new VendaModel();
    $model->atualizarStatusPagamento($idVenda, 1);
    echo json_encode(['success' => true]);
}
