<?php    
require_once __DIR__.'/../../models/admin/AdminModel.php';
require_once __DIR__.'/../../models/admin/GerenciarUsuariosModel.php';

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
}
