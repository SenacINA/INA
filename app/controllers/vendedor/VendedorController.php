<?php

require_once __DIR__ . '/../../models/vendedor/CadastroVendedorModel.php';
require_once __DIR__ . '/../../models/vendedor/CidadeVendedorModel.php';

class VendedorController extends RenderView
{
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
        $this->loadView('vendedor/cadastro_vendedor_2', []);
    }

    public function editarPerfil()
    {
        $this->loadView('vendedor/editar_perfil_vendedor', []);
    }

    public function getCidade()
    {
        $model = new CidadeVendedorModel;
        return $model->getCidade();
    }

    public function cadastro()
    {
        $localEmpresa = $_POST['local_da_empresa'];
        $cep = $_POST['cep'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $nome = $_POST['nome_razao_social'];
        $cpfcnpj = $_POST['cpf_cnpj'];
        $rg = $_POST['rg'];
        $email = $_POST['email'];
        $categoria = $_POST['categoria_produtos'];
        $telefone1 = $_POST['telefone1'];
        $telefone2 = $_POST['telefone2'];

        $model = new CadastroVendedorModel;

        if ($model->createVendedor($_SESSION['cliente_id'], $localEmpresa, $cep, $logradouro, $numero, $nome, $cpfcnpj, $rg, $email, $categoria, $telefone1, $telefone2)) {
            session_destroy();
            http_response_code(200);
            $this->loadView('geral/home', []);
            exit();
        }
    }
}
