<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';
require_once __DIR__.'/../../models/geral/GeralModel.php';


class ClienteController extends RenderView {
    public function perfil() {
        $this->loadView('cliente/perfil_cliente', []);
    }

    public function editarPerfil() {
        $this->loadView('cliente/editar_perfil', []);
    }

    public function dados( ) {
        $this->loadView('cliente/carrinho_dados', []);
    }

    public function pagamentos( ) {
        $this->loadView('cliente/carrinho_pagamentos', []);
    }

    public function login() {
        $this->loadView('cliente/login', []);
    }

    public function cadastro()
      {
          $this->loadView('cliente/cadastro', []);
      }
    

    public function register() {
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
        $cidadeId  = trim($input['localizacaoCliente'] ?? '');
        $rawFoto   = $input['foto']    ?? null;   
        $rawBanner = $input['banner']  ?? null;

        $errors = [];
        if ($nome === '')     $errors[] = 'O nome não pode ficar em branco.';
        if ($cidadeId === '') $errors[] = 'Selecione uma localização.';

        if ($rawFoto   && !preg_match('#^data:image/webp;base64,#', $rawFoto))   { $errors[] = 'Formato de foto inválido.';   $rawFoto   = null; }
        if ($rawBanner && !preg_match('#^data:image/webp;base64,#', $rawBanner)) { $errors[] = 'Formato de banner inválido.'; $rawBanner = null; }

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
            $ok2   = $geral->updateLocalizacao($clienteId, (int)$cidadeId);

            // Prepara pasta upload/clientes/{id}/
            $baseDir = __DIR__ . '/../../../public/upload/clientes/' . $clienteId . '/';
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            $ok3     = true;
            $relFoto = null;
            if ($binFoto) {
                $fn      = 'foto.webp';
                $absPath = $baseDir . $fn;
                // remove antiga, se existir
                if (file_exists($absPath)) {
                    @unlink($absPath);
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
                $fn       = 'banner.webp';
                $absPath  = $baseDir . $fn;
                // remove antigo, se existir
                if (file_exists($absPath)) {
                    @unlink($absPath);
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



}
