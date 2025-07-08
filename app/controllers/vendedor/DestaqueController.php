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
        header('Content-Type: application/json');

        if (!isset($_POST['id_vendedor'])) {
            $idCliente = $_SESSION['cliente_id'] ?? null;
            if (!$idCliente) {
                echo json_encode([]);
                return;
            }

            $stmt = $this->db->prepare("SELECT id_vendedor FROM vendedor WHERE id_cliente = :id_cliente");
            $stmt->execute([':id_cliente' => $idCliente]);
            $idVendedor = $stmt->fetchColumn();
        } else {
            $idVendedor = $_POST['id_vendedor'];
        }

        $destaques = $this->model->getDestaquesPorVendedor($idVendedor);

        echo json_encode($destaques);
        exit;
    }



    public function salvarDestaque()
    {
        header('Content-Type: application/json');

        $id = $_SESSION['cliente_id'] ?? null;
        $idProduto = $_POST['id_produto'] ?? null;

        if (!$id || !$idProduto) {
            echo json_encode(['success' => false, 'error' => $idProduto]);
            exit;
        }

        try {
            if ($this->model->adicionarDestaque($id, $idProduto)) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => 'Erro ao salvar destaque.']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Exceção: ' . $e->getMessage()]);
        }
    }

    public function removerDestaque()
    {
        header('Content-Type: application/json');

        $id = $_SESSION['cliente_id'] ?? null;
        $idProduto = $_POST['id_produto'] ?? null;

        if (!$id || !$idProduto) {
            echo json_encode(['success' => false, 'error' => 'Dados incompletos.']);
            exit;
        }

        try {
            if ($this->model->removerDestaque($id, $idProduto)) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => 'Erro ao remover destaque.']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Exceção: ' . $e->getMessage()]);
        }
    }
}
