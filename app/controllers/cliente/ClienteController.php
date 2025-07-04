<?php

require_once __DIR__ . '/../../models/cliente/ClienteModel.php';
require_once __DIR__ . '/../../models/geral/GeralModel.php';


class ClienteController extends RenderView
{
    public function isLogged() {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        }
    }
    public function perfil()
    {
        $this->loadView('cliente/PerfilCliente', []);
    }

    public function editarPerfil()
    {
        $this->loadView('cliente/EditarPerfil', []);
    }

    public function dados()
    {
        $this->isLogged();
        $this->loadView('cliente/CarrinhoDados', []);
    }

    public function pagamentos()
    {
        $this->isLogged();
        $this->loadView('cliente/CarrinhoPagamentos', []);
    }

    public function login()
    {
        if (isset($_SESSION['user_type']) || isset($_SESSION['cliente_id'])) {
            header('Location: /INA/');
            exit;
        } else {
            $this->loadView('cliente/Login', []);
        }
    }

    public function cadastro()
    {
        $this->loadView('cliente/Cadastro', []);
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }
        header('Content-Type: application/json; charset=utf-8');

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $confirma = $_POST['confirmaSenha'] ?? '';

        $errors = [];

        if (!$nome || !$email || !$senha || !$confirma) {
            $errors[] = 'Preencha todos os campos.';
        }
        if (strlen($senha) < 6) {
            $errors[] = 'A senha deve ter ao menos 6 caracteres.';
        }
        if (!preg_match('/[a-z]/', $senha)) {
            $errors[] = 'A senha deve conter ao menos uma letra minúscula.';
        }
        if (!preg_match('/\d/', $senha)) {
            $errors[] = 'A senha deve conter ao menos um número.';
        }

        if (preg_match('/\s/', $senha)) {
            $errors[] = 'A senha não pode conter espaços.';
        }

        if ($senha !== $confirma) {
            $errors[] = 'As senhas não coincidem.';
        }

        $model = new ClienteModel();
        if ($model->emailExists($email)) {
            $errors[] = 'Este e-mail já está cadastrado.';
        }

        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors'  => $errors
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $hash = password_hash($senha, PASSWORD_BCRYPT);
        $ok   = $model->createUser($nome, $email, $hash);

        if ($ok) {
            echo json_encode([
                'success' => true,
                'message' => 'Cadastro realizado com sucesso!'
            ], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'errors'  => ['Erro interno, tente novamente mais tarde.']
            ], JSON_UNESCAPED_UNICODE);
        }
        exit;
    }


    public function editarDadosCliente()
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

        $input     = json_decode(file_get_contents('php://input'), true) ?: [];
        $nome      = trim($input['nomeCliente']        ?? '');
        $rawFoto   = $input['foto']    ?? null;
        $rawBanner = $input['banner']  ?? null;
        $uf = trim($input['ufCliente'] ?? '');
        $cidade = trim($input['cidadeCliente'] ?? '');

        if (empty($uf) || empty($cidade)) {
            $errors[] = 'Selecione uma localização válida.';
        }

        $errors = [];
        if ($nome === '') {
            $errors[] = 'O nome não pode ficar em branco.';
        }

        $maxLength = 50; // Define o limite de caracteres
        if (strlen($nome) > $maxLength) {
            $errors[] = "O nome não pode ter mais de $maxLength caracteres.";
        }

        if ($rawFoto   && !preg_match('#^data:image/webp;base64,#', $rawFoto)) {
            $errors[] = 'Formato de foto inválido.';
            $rawFoto   = null;
        }
        if ($rawBanner && !preg_match('#^data:image/webp;base64,#', $rawBanner)) {
            $errors[] = 'Formato de banner inválido.';
            $rawBanner = null;
        }

        // Decodifica e verifica tamanho (máx 4 MB)
        $binFoto   = null;
        $binBanner = null;
        $maxSize   = 4 * 1024 * 1024;
        if (empty($errors) && $rawFoto) {
            $base64 = substr($rawFoto, strpos($rawFoto, ',') + 1);
            $bin    = base64_decode($base64);
            if ($bin === false || strlen($bin) > $maxSize) {
                $errors[] = 'Foto muito grande (máx 4 MB).';
            } else {
                $binFoto = $bin;
            }
        }
        if (empty($errors) && $rawBanner) {
            $base64 = substr($rawBanner, strpos($rawBanner, ',') + 1);
            $bin    = base64_decode($base64);
            if ($bin === false || strlen($bin) > $maxSize) {
                $errors[] = 'Banner muito grande (máx 4 MB).';
            } else {
                $binBanner = $bin;
            }
        }

        if (empty($errors)) {
            $geral = new GeralModel();
            $ok1   = $geral->updateNome($clienteId, $nome);
            $ok2 = $geral->updateLocalizacao(
                $clienteId,
                $uf,
                $cidade
            );

            // Prepara pasta upload/clientes/{id}/
            $baseDir = __DIR__ . '/../../../public/upload/clientes/' . $clienteId . '/';
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            $ok3     = true;
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
                    $relFoto = '/upload/clientes/' . $clienteId . '/' . $fn;
                    $ok3     = $geral->updateFotoPerfil($clienteId, $relFoto);
                }
            }

            $ok4      = true;
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
                    $relBanner = '/upload/clientes/' . $clienteId . '/' . $fn;
                    $ok4       = $geral->updateBannerPerfil($clienteId, $relBanner);
                }
            }

            if (empty($errors) && $ok1 && $ok2 && $ok3 && $ok4) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Perfil atualizado com sucesso!',
                    'foto'    => $relFoto,
                    'banner'  => $relBanner,
                ], JSON_UNESCAPED_UNICODE);
                exit;
            }
            if (empty($errors)) {
                $errors[] = 'Erro ao salvar no banco. Tente novamente.';
            }
        }

        echo json_encode([
            'success' => false,
            'errors'  => $errors
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function updateSocial()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }
        header('Content-Type: application/json; charset=utf-8');

        $clienteId = $_SESSION['cliente_id'] ?? null;
        if (!$clienteId) {
            http_response_code(401);
            echo json_encode([
                'success' => false,
                'errors'  => ['Não autenticado.']
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $data = [
            'descricao' => trim($_POST['descricao'] ?? ''),
            'instagram' => trim($_POST['instagram'] ?? ''),
            'facebook' => trim($_POST['facebook'] ?? ''),
            'linkedin' => trim($_POST['linkedin'] ?? ''),
            'youtube' => trim($_POST['youtube'] ?? ''),
            'tiktok' => trim($_POST['tiktok'] ?? ''),
            'x' => trim($_POST['x'] ?? ''),
        ];

        $errors = [];

        $maxSocialLength = 50;
        foreach (['instagram', 'facebook', 'linkedin', 'youtube', 'tiktok', 'x'] as $rede) {
            if (strlen($data[$rede]) > $maxSocialLength) {
                $errors[] = ucfirst($rede) . " não pode ter mais de $maxSocialLength caracteres.";
            }
        }

        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors'  => $errors
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $model = new GeralModel();
        $ok = $model->updateSocial((int)$clienteId, $data);

        if ($ok) {
            echo json_encode([
                'success' => true,
                'message' => 'Redes sociais atualizadas com sucesso!'
            ], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([
                'success' => true,
                'message' => 'Nenhuma mudança detectada.'
            ], JSON_UNESCAPED_UNICODE);
        }
        exit;
    }
}
