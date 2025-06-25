<?php

require_once __DIR__ . '/../../models/cliente/CarrinhoDadosModel.php';

class CarrinhoDadosController extends RenderView
{
    private CarrinhoDadosModel $dadosModel;

    public function __construct()
    {
        $this->dadosModel = new CarrinhoDadosModel();
    }

    public function dados()
    {
        $idCliente = $_SESSION['cliente_id'] ?? null;
        if (!$idCliente) {
            header('Location: /Login');
            exit;
        }

        $enderecos = $this->dadosModel->getEnderecosCliente($idCliente);
        $this->loadView('cliente/CarrinhoDados', ['enderecos' => $enderecos]);
    }

    public function salvarEnderecoAjax()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido']);
        return;
    }

    $idCliente = $_SESSION['cliente_id'] ?? null;
    if (!$idCliente) {
        http_response_code(401);
        echo json_encode(['sucesso' => false, 'mensagem' => 'Não autenticado']);
        return;
    }

    $json = file_get_contents('php://input');
    $dados = json_decode($json, true);

    $required = ['nome', 'cpf', 'endereco', 'cep', 'cidade', 'telefone', 'email'];
    foreach ($required as $campo) {
        if (empty($dados[$campo])) {
            echo json_encode(['sucesso' => false, 'mensagem' => "Campo obrigatório faltando: $campo"]);
            return;
        }
    }

    $dadosEndereco = [
        'rua' => $dados['endereco'],
        'bairro' => '',
        'numero' => $dados['numeroCasa'],
        'referencia' => $dados['ponto'] ?? '',
        'uf' => '',
        'cidade' => $dados['cidade'],
        'id_cliente' => $idCliente
    ];

    if ($this->dadosModel->salvarEndereco($dadosEndereco)) {
        echo json_encode(['sucesso' => true]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao salvar no banco']);
    }
}
};