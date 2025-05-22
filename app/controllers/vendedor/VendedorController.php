<?php

require_once __DIR__ . '/../../models/vendedor/CadastroVendedorModel.php';
require_once __DIR__ .'/../../models/cliente/ClienteModel.php';
require_once __DIR__ . '/../../models/vendedor/VendedorModel.php';
require_once __DIR__ . '/../../models/geral/GeralModel.php';

class VendedorController extends RenderView
{ 
    private $clienteData;

    public function __construct()
    {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        }

        $clienteId = $_SESSION['cliente_id'];

        $clienteModel = new ClienteModel();
        $this->clienteData  = $clienteModel->findById($clienteId);
        $this->userType = $clienteModel->tipoCliente($_SESSION['cliente_id']);
        
        if ($this->clienteData['uf'] && $this->clienteData['cidade']) {
            $localizacao = $this->clienteData['uf'] . ' - ' . $this->clienteData['cidade'];
            $this->clienteData['localizacao'] = $localizacao;
        } else {
            $this->clienteData['localizacao'] = null;
        }
    }

    public function perfil()
    {
        $this->loadView('vendedor/PerfilVendedor', []);
    }

    public function showInfo()
    {
        $this->loadView('vendedor/CadastroVendedor_1', []);
    }

    public function showFormCadastro()
    {   
        if ($this->userType != 'cliente') {
            header("Location: page-not-found");
        } else {
            $this->loadView('vendedor/CadastroVendedor_2', ['user' => $this->clienteData]);
        }
    }

    public function editarPerfil()
    {
        $this->loadView('vendedor/EditarPerfilVendedor', []);
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

        if($this->userType != 'cliente') {
            header("Location: page-not-found");
        }

        if (!empty($errors)) {
            $this->loadView('vendedor/CadastroVendedor_2', ['errors' => $errors, 'user' => $this->clienteData]);
            exit;
        }

        $model = new CadastroVendedorModel();
        $success = $model->createVendedor($_SESSION['cliente_id'], $localEmpresa, $cep, $logradouro, $numero, $nome, $cpfcnpj, $rg, $email, $categoria, $telefone1, $telefone2);

        if ($success[0]) {
            $_SESSION['successMessage'] = $success[1];
            header("Location: perfil");
            exit();
        } else {
            $errors[] = 'Erro ao cadastrar usuário.';
            $errors[] = $success[1];
            $this->loadView('vendedor/CadastroVendedor_2', ['errors' => $errors, 'user' => $this->clienteData]);
        }

    }

    public function editarDadosVendedor()
    {
        header('Content-Type: application/json; charset=utf-8');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'errors' => ['Método não permitido.']], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $clienteId = $_SESSION['cliente_id'] ?? null;
        if (!$clienteId) {
            http_response_code(401);
            echo json_encode(['success' => false, 'errors' => ['Usuário não autenticado.']], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $input = json_decode(file_get_contents('php://input'), true) ?: [];
        $nome = trim($input['nomeCliente'] ?? '');
        $descricao = trim($input['descricao'] ?? '');
        $rawFoto = $input['foto'] ?? null;
        $rawBanner = $input['banner'] ?? null;
        $uf = trim($input['ufCliente'] ?? '');
        $cidade = trim($input['cidadeCliente'] ?? '');

        $errors = [];

        if (empty($uf) || empty($cidade)) {
            $errors[] = 'Selecione uma localização válida.';
        }

        if ($nome === '') {
            $errors[] = 'O nome não pode ficar em branco.';
        }

        $maxLengthNome = 50;
        if (strlen($nome) > $maxLengthNome) {
            $errors[] = "O nome não pode ter mais de $maxLengthNome caracteres.";
        }

        $maxLengthDescricao = 500;
        if (strlen($descricao) > $maxLengthDescricao) {
            $errors[] = "A descrição não pode ter mais de $maxLengthDescricao caracteres.";
        }

        if ($rawFoto && !preg_match('#^data:image/webp;base64,#', $rawFoto)) {
            $errors[] = 'Formato de foto inválido.';
            $rawFoto = null;
        }
        if ($rawBanner && !preg_match('#^data:image/webp;base64,#', $rawBanner)) {
            $errors[] = 'Formato de banner inválido.';
            $rawBanner = null;
        }

        // Decodifica e verifica tamanho (máx 4MB)
        $binFoto = null;
        $binBanner = null;
        $maxSize = 4 * 1024 * 1024;
        if (empty($errors) && $rawFoto) {
            $base64 = substr($rawFoto, strpos($rawFoto, ',') + 1);
            $bin = base64_decode($base64);
            if ($bin === false || strlen($bin) > $maxSize) {
                $errors[] = 'Foto muito grande (máx 4MB).';
            } else {
                $binFoto = $bin;
            }
        }
        if (empty($errors) && $rawBanner) {
            $base64 = substr($rawBanner, strpos($rawBanner, ',') + 1);
            $bin = base64_decode($base64);
            if ($bin === false || strlen($bin) > $maxSize) {
                $errors[] = 'Banner muito grande (máx 4MB).';
            } else {
                $binBanner = $bin;
            }
        }

        if (empty($errors)) {
            $geral = new GeralModel();
            $vendedor = new VendedorModel();
            $vendedorDados = $vendedor->dadosVendedor($clienteId);

            $ok1 = $vendedor->updateNomeFantasia($vendedorDados['id_vendedor'], $nome);
            $ok2 = $geral->updateLocalizacao($clienteId, $uf, $cidade);
            $ok5 = $geral->updateDescricaoPerfil($clienteId, $descricao); // Chamando a atualização da descrição

            // Prepara pasta upload/clientes/{id}/
            $baseDir = __DIR__ . '/../../../public/upload/vendedores/' . $clienteId . '/';
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            $ok3 = true;
            $relFoto = null;
            if ($binFoto) {
                $fn = 'foto_' . time() . '.webp';
                $absPath = $baseDir . $fn;

                foreach (glob($baseDir . 'foto_*') as $oldFoto) {
                    @unlink($oldFoto);
                }

                if (file_put_contents($absPath, $binFoto) === false) {
                    $errors[] = 'Falha ao salvar imagem de perfil.';
                    $ok3 = false;
                } else {
                    $relFoto = '/upload/vendedores/' . $clienteId . '/' . $fn;
                    $ok3 = $geral->updateFotoPerfil($clienteId, $relFoto);
                }
            }

            $ok4 = true;
            $relBanner = null;
            if ($binBanner) {
                $fn = 'banner_' . time() . '.webp';
                $absPath = $baseDir . $fn;

                foreach (glob($baseDir . 'banner_*') as $oldBanner) {
                    @unlink($oldBanner);
                }

                if (file_put_contents($absPath, $binBanner) === false) {
                    $errors[] = 'Falha ao salvar imagem de banner.';
                    $ok4 = false;
                } else {
                    $relBanner = '/upload/vendedores/' . $clienteId . '/' . $fn;
                    $ok4 = $geral->updateBannerPerfil($clienteId, $relBanner);
                }
            }

            if (empty($errors) && $ok1 && $ok2 && $ok3 && $ok4 && $ok5) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Perfil atualizado com sucesso!',
                    'foto' => $relFoto,
                    'banner' => $relBanner
                ], JSON_UNESCAPED_UNICODE);
                exit;
            }

            if (empty($errors)) {
                $errors[] = 'Erro ao salvar no banco. Tente novamente.';
            }
        }

        echo json_encode([
            'success' => false,
            'errors' => $errors
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

}
