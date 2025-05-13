<?php

require_once __DIR__ . '/../../models/vendedor/CadastroVendedorModel.php';
require_once __DIR__ .'/../../models/cliente/ClienteModel.php';

class VendedorController extends RenderView
{ 
    private $clienteData;

    public function __construct()
    {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: login');
            exit;
        }

        $clienteId = $_SESSION['cliente_id'];

        $clienteModel = new ClienteModel();
        $this->clienteData  = $clienteModel->findById($clienteId);

        if ($this->clienteData['uf'] && $this->clienteData['cidade']) {
            $localizacao = $this->clienteData['uf'] . ' - ' . $this->clienteData['cidade'];
            $this->clienteData['localizacao'] = $localizacao;
        } else {
            $this->clienteData['localizacao'] = null;
        }
    }

    public function perfil()
    {
        $this->loadView('vendedor/perfil_vendedor', []);
    }

    public function showInfo()
    {
        $this->loadView('vendedor/cadastro_vendedor_1', []);
    }

    public function showFormCadastro()
    {   
        $this->loadView('vendedor/cadastro_vendedor_2', ['user' => $this->clienteData]);
    }

    public function editarPerfil()
    {
        $this->loadView('vendedor/editar_perfil_vendedor', []);
    }

    public function cadastroForm()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }
        
        $localEmpresa = $_POST['local_da_empresa'] ?? '';
        $cep = trim($_POST['cep'] ?? '');
        $logradouro = trim($_POST['logradouro'] ?? '');
        $numero = trim($_POST['numero'] ?? '');
        $nome = trim($_POST['nome_razao_social'] ?? '');
        $cpfcnpj = trim($_POST['cpf_cnpj'] ?? '');
        $rg = trim($_POST['rg'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $categoria = trim($_POST['categoria_produtos'] ?? '');
        $telefone1 = trim($_POST['telefone1'] ?? '');
        $telefone2 = trim($_POST['telefone2'] ?? '');

        $errors = [];

        if (empty($localEmpresa) || empty($cep) || empty($logradouro) || empty($numero) || empty($nome) || empty($cpfcnpj) || empty($email) || empty($categoria) || empty($telefone1)) {
            $errors[] = 'Preencha todos os campos obrigatórios.';
        }

        // Se houver erros, renderiza a view com os erros
        if (!empty($errors)) {
            $this->loadView('vendedor/cadastro_vendedor_2', ['errors' => $errors, 'user' => $this->clienteData]);
            exit;
        }

        $model = new CadastroVendedorModel();
        $success = $model->createVendedor($_SESSION['cliente_id'], $localEmpresa, $cep, $logradouro, $numero, $nome, $cpfcnpj, $rg, $email, $categoria, $telefone1, $telefone2);

        if ($success) {
            session_destroy();
            http_response_code(200);
            header('Location: perfil');
            exit;
        } else {
            $errors[] = 'Erro ao cadastrar usuário.';
            $this->loadView('vendedor/cadastro_vendedor_2', ['errors' => $errors, 'user' => $this->clienteData]);
        }

    }

}
