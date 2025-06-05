<?php    
require_once __DIR__.'/../../models/admin/AdminModel.php';
require_once __DIR__.'/../../models/admin/GerenciarUsuariosModel.php';
require_once __DIR__.'/../../models/geral/GeralModel.php';


class AdminController extends RenderView {

    public function dashboard() {
        $this->loadView('admin/Dashboard', []);
    }

    public function perfil() {
        $this->loadView('admin/PerfilAdmin', []);
    }

    public function aprovarVendedor() {
        $this->loadView('admin/AprovarVendedor', []);
    }

    public function atualizarUsuario() {
        $this->loadView('admin/AtualizarUsuario', []);
    }

    public function gerenciarUsuarios() {
        $this->loadView('admin/GerenciarUsuario', ['usuarioSelecionado' => $usuarioSelecionado ?? null, 'info' => $info ?? []]);
    }

    public function gerenciarProdutos() {
        $this->loadView('admin/GerenciarProdutos', []);
    }

    public function gerenciarCarrossel() {
        $this->loadView('admin/GerenciarCarrossel', []);
    }

    public function relatorioVendedor() {
        $this->loadView('admin/RelatorioVendedor', []);
    }

    public function historicoAcesso() {
        $this->loadView('admin/HistoricoAcesso', []);
    }

    public function adminCarrossel() {
        $this->loadView('admin/AdminCarrossel', []);
    }

    public function showUsers() {
        $model = new GerenciarUsuariosModel();
        $user = $model->tipoUser($_SESSION['cliente_id']);
        if ($user != 'admin') {
            header("Location: perfil");
        }
        else {
            return $model->getUsers();
        }
    }

    public function searchDesativarUser() {
        $nomeCodigo = $_POST['nomeUsuario'] ?? '';
        $status = $_POST['select_cod'] ?? '';
        $mes = $_POST['mes'] ?? '';
        $ano = $_POST['ano'] ?? '';


        $model = new GerenciarUsuariosModel();
        $resultados = $model->searchUserForms($nomeCodigo, $status, $mes, $ano);
        $usuarioSelecionado = !empty($resultados) ? $resultados[0] : null;
        $this->loadView('admin/GerenciarUsuario', [
            'usuarioSelecionado' => $usuarioSelecionado
        ]);
    }

    public function desativarUser() {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];

        $model = new GerenciarUsuariosModel();
        return $model->desativarUser($nome, $email, $cargo);
    }
    public function searchUser()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }

        header('Content-Type: application/json; charset=utf-8');

        $id = trim($_POST['idUsuario'] ?? '');
        $email = trim($_POST['emailUsuario'] ?? '');

        if (!$id && !$email) {
            echo json_encode([
                'success' => false,
                'errors'  => ['Informe o ID ou o e-mail para realizar a busca.']
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $model = new AdminModel();
        $result = $model->pesquisarUsuario($id, $email);

        if ($result) {
            echo json_encode([
                'success' => true,
                'data'    => $result
            ], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([
                'success' => false,
                'errors'  => ['Nenhum cliente encontrado com os dados informados.']
            ], JSON_UNESCAPED_UNICODE);
        }
        exit;
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new AdminModel();

            $dados = [
                'id' => $_POST['id'] ?? null,
                'nomeInput' => $_POST['nomeInput'] ?? '',
                'senhaInput' => $_POST['senhaInput'] ?? '',
                'emailInput' => $_POST['emailInput'] ?? '',
                'cpfInput' => $_POST['cpfInput'] ?? '',
                'telefoneInput' => $_POST['telefoneInput'] ?? '',
                'cepInput' => $_POST['cepInput'] ?? '',
                'estadoInput' => $_POST['estadoInput'] ?? '',
                'cidadeInput' => $_POST['cidadeInput'] ?? '',
                'bairroInput' => $_POST['bairroInput'] ?? '',
                'enderecoInput' => $_POST['enderecoInput'] ?? '',
                'numeroInput' => $_POST['numeroInput'] ?? '',
                'tipoConta' => isset($_POST['adminCheckbox']) ? 0 : (isset($_POST['clienteCheckbox']) ? 1 : 2),
                'status' => isset($_POST['statusCheckbox']) ? 1 : 0
            ];

            $sucesso = $model->atualizarUsuario($dados);

            header('Content-Type: application/json');
            echo json_encode([
                'success' => $sucesso,
                'message' => $sucesso ? 'Dados atualizados com sucesso!' : 'Erro ao atualizar dados.'
            ]);
            exit;
        }
    }

    public function editarDadosAdmin()
    {
        header('Content-Type: application/json; charset=utf-8');

        // 1) Método e autenticação
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'errors' => ['Método não permitido.']], JSON_UNESCAPED_UNICODE);
            exit;
        }
        $adminId = $_SESSION['cliente_id'] ?? null;
        if (!$adminId) {
            http_response_code(401);
            echo json_encode(['success' => false, 'errors' => ['Usuário não autenticado.']], JSON_UNESCAPED_UNICODE);
            exit;
        }

        // 2) Lê JSON
        $input      = json_decode(file_get_contents('php://input'), true) ?: [];
        $nome       = trim($input['nomeAdmin']  ?? '');
        $email      = trim($input['email']      ?? '');
        $telefone   = trim($input['telefone']   ?? '');
        $rawFoto    = $input['foto']            ?? null;   // data:image/webp;base64,...

        $errors = [];
        if ($nome === '')     $errors[] = 'O nome não pode ficar em branco.';
        if ($email === '')    $errors[] = 'O e-mail não pode ficar em branco.';
        if ($telefone === '') $errors[] = 'O telefone não pode ficar em branco.';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'E-mail inválido';
        }

        // nome máximo
        if (strlen($nome) > 50) {
            $errors[] = 'O nome não pode ter mais de 50 caracteres.';
        }

        // só WebP
        if ($rawFoto && !preg_match('#^data:image/webp;base64,#', $rawFoto)) {
            $errors[]  = 'Formato de foto inválido.';
            $rawFoto   = null;
        }

        // 3) decodifica e checa tamanho (4MB)
        $binFoto = null;
        if (empty($errors) && $rawFoto) {
            $b64  = substr($rawFoto, strpos($rawFoto, ',') + 1);
            $bin  = base64_decode($b64);
            if ($bin === false || strlen($bin) > 4 * 1024 * 1024) {
                $errors[] = 'Foto muito grande (máx 4 MB).';
            } else {
                $binFoto = $bin;
            }
        }


        // 4) se ok até aqui, tenta as atualizações
        if (empty($errors)) {
            $geral    = new GeralModel();
            $okNome   = $geral->updateNome($adminId, $nome);
            $okEmail  = $geral->updateEmail($adminId, $email);

            // telefone: tira não dígitos, separa DDD+número
            $cleanTel = preg_replace('/\D+/', '', $telefone);
            if (strlen($cleanTel) >= 10) {
                $ddd     = substr($cleanTel, 0, 2);
                $num     = substr($cleanTel, 2);
                $okTel   = $geral->updateTelefone($adminId, $ddd, $num);
            } else {
                $okTel = false;
                $errors[] = 'Telefone inválido.';
            }

            // 5) foto
            $okFoto = true;
            $relFoto = null;
            if ($binFoto) {
                // pasta user
                $baseDir = __DIR__ . '/../../../public/upload/clientes/' . $adminId . '/';
                if (!is_dir($baseDir)) {
                    mkdir($baseDir, 0755, true);
                }
                // remove anteriores
                $fn = 'foto_' . time() . '.webp';
                $absPath = $baseDir . $fn;

                foreach (glob($baseDir . 'foto_*') as $oldFoto) {
                    @unlink($oldFoto);
                }
                // grava sempre com nome fixo
                if (file_put_contents($absPath, $binFoto) === false) {
                    $okFoto = false;
                    $errors[] = 'Falha ao salvar a foto.';
                } else {
                    $relFoto = '/upload/clientes/' . $adminId . '/' . $fn;
                    $okFoto  = $geral->updateFotoPerfil($adminId, $relFoto);
                }
            }

            // 6) retorna
            if ($okNome && $okEmail && $okTel && $okFoto && empty($errors)) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Perfil de administrador atualizado!',
                    'foto'    => $relFoto
                ], JSON_UNESCAPED_UNICODE);
                exit;
            }

            // se chegou aqui com tudo executado mas alguma flag falhou
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
