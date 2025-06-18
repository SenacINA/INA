<?php

require_once __DIR__ . '/../../models/vendedor/DestaqueModel.php';

class DestaqueController
{
    private $model;
    private $db;

    public function __construct()
    {
        $this->model = new DestaqueModel();
        $db = new Database();
        $db->connect();
        $this->db = $db->getConnection();
    }

    public function listarDestaques()
    {
        $idCliente = $_SESSION['cliente_id'] ?? null;
        if (!$idCliente) return [];

        $stmt = $this->db->prepare("SELECT id_vendedor FROM vendedor WHERE id_cliente = :id_cliente");
        $stmt->execute([':id_cliente' => $idCliente]);
        $idVendedor = $stmt->fetchColumn();

        if (!$idVendedor) return [];

        return $this->model->getDestaquesPorVendedor($idVendedor);
    }

    public function salvarDestaque()
    {
        header('Content-Type: application/json');
        session_start();

        $idVendedor = $_SESSION['vendedor_id'] ?? null;
        $idProduto = $_POST['id_produto'] ?? null;

        if (!$idVendedor || !$idProduto) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Dados ausentes.']);
            return;
        }

        if ($this->salvarDestaque($idVendedor, $idProduto)) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Erro ao salvar destaque.']);
        }
    }
}
