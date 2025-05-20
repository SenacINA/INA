<?php    

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
        $this->loadView('admin/GerenciarUsuario', []);
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
}
