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
        header('Content-Type: application/json');
        $dadosEndereco = [
            'rua' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'numero' => $_POST['numero'],
            'referencia' => $_POST['referencia'] ?? 'Não Definido',
            'uf' => '',
            'cidade' => $_POST['cidade'],
            'id_cliente' => $_SESSION['cliente_id'],
        ];

        $isEditing = true;
        isset($_POST['id_endereco']) ? $dadosEndereco['id_endereco'] = $_POST['id_endereco'] : $isEditing = false;

        if ($this->dadosModel->salvarEnderecoModel($dadosEndereco)) {
            echo json_encode(
                $isEditing === true
                    ? ['success' => true, 'message' => 'Endereço editado com sucesso']
                    : ['success' => true, 'message' => 'Endereço salvo com sucesso']
            );
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao salvar o endereço']);
            exit;
        }
    }

    public function excluirEndereco()
    {
        header('Content-Type: application/json');
        $enderecoId = $_POST['endereco_id'];
        if ($this->dadosModel->excluirEnderecoModel($enderecoId)) {
            echo json_encode(['success' => true, 'message' => 'Endereço deletado com sucesso']);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao deletar o endereço']);
            exit;
        }
    }

    public function editEndereco()
    {
        header('Content-Type: application/json');
        $enderecoId = $_POST['endereco_id'];
        echo json_encode($this->dadosModel->editEndereco($enderecoId));
        exit;
    }
};
