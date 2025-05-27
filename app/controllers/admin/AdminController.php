<?php
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

    public function searchUser() {
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
}
