<?php

require_once __DIR__ . '/../../models/cliente/CarrinhoDadosModel.php';

class CarrinhoDadosController extends RenderView
{
    private CarrinhoDadosModel $dadosModel;

    public function __construct()
    {
        $this->dadosModel = new CarrinhoDadosModel();
    }

    public function index()
    {
        $idCliente = $_SESSION['cliente_id'] ?? null;
        if (!$idCliente) {
            header('Location: Login');
            exit;
        }

        $enderecos = $this->dadosModel->getEnderecosCliente($idCliente);
        $this->loadView('cliente/CarrinhoDados', ['enderecos' => $enderecos]);
    }

    public function salvarEndereco()
    {
        $dadosEndereco = [
            'rua' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'numero' => $_POST['numeroCasa'],
            'referencia' => $_POST['referencia'] ?? '',
            'uf' => '',
            'cidade' => $_POST['cidade'],
            'id_cliente' => $_SESSION['cliente_id']
        ];

        if ($this->dadosModel->salvarEnderecoModel($dadosEndereco)) {
            echo json_encode(['success' => true, 'message' => 'Endereço salvo com sucesso']);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao salvar o endereço']);
            exit;
        }
    }

    public function excluirEndereco()
    {
        $enderecoId = $_POST['endereco_id'];
        if ($this->dadosModel->excluirEnderecoModel($enderecoId)) {
            echo json_encode(['success' => true, 'message' => 'Endereço deletado com sucesso']);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao deletar o endereço']);
            exit;
        }
    }
    public function editEndereco() {
        $enderecoId = $_POST['endereco_id'];
        return $this->dadosModel->editEderecos($enderecoId);
    }
};
