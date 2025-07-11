<?php
require_once './app/models/admin/GerenciarUsuariosModel.php';

class GerenciarUsuariosController
{
    private $model;

    public function __construct()
    {
        $this->model = new GerenciarUsuariosModel();
        if (!isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        }

        $userType = $this->model->tipoUser($_SESSION['cliente_id']);
        if ($userType !== 'admin') {
            header('Location: perfil');
            exit;
        }
    }

    public function index()
    {
        $usuarios = $this->model->getUsers();

        foreach ($usuarios as &$usuario) {
            $usuario['ddd_cliente'] = $usuario['ddd_cliente'] ?? '-';
            $usuario['numero_celular_cliente'] = $usuario['numero_celular_cliente'] ?? '-';
        }

        require_once('./app/views/admin/GerenciarUsuario.php');
    }


    public function desativarUsuario()
    {
        $dados = json_decode(file_get_contents("php://input"), true);
        $id = $dados['id'] ?? null;

        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID do usuário não fornecido.']);
            return;
        }

        $resultado = $this->model->desativarUserById((int)$id);

        echo json_encode(['success' => $resultado]);
    }

    public function ativarUsuario()
    {
        $dados = json_decode(file_get_contents("php://input"), true);
        $id = $dados['id'] ?? null;

        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID do usuário não fornecido.']);
            return;
        }

        $resultado = $this->model->ativarUserById((int)$id);

        echo json_encode(['success' => $resultado]);
    }

    public function searchDesativar()
    {
        $nomeCodigo = $_POST['nomeUsuario'] ?? '';
        $status = $_POST['select_cod'] ?? '';
        $mes = $_POST['mes'] ?? '';
        $ano = $_POST['ano'] ?? '';
        $contato = $_POST['contato'] ?? '';

        $usuarios = $this->model->searchUserForms($nomeCodigo, $status, $mes, $ano, $contato);
        $usuarioSelecionado = !empty($usuarios) ? $usuarios[0] : null;

        require_once('./app/views/admin/GerenciarUsuario.php');
    }
}
