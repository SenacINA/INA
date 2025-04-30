<?php    

class AdminController extends RenderView {

    public function dashboard() {
        $this->loadView('admin/dashboard', []);
    }

    public function perfil() {
        $this->loadView('admin/perfil_admin', []);
    }

    public function aprovarVendedor() {
        $this->loadView('admin/aprovar_vendedor', []);
    }

    public function atualizarUsuario() {
        $this->loadView('admin/atualizar_usuario', []);
    }

    public function gerenciarUsuarios() {
        $this->loadView('admin/gerenciar_usuario', []);
    }

    public function gerenciarProdutos() {
        $this->loadView('admin/gerenciar_produtos', []);
    }

    public function gerenciarCarrossel() {
        $this->loadView('admin/gerenciar_carrossel', []);
    }

    public function relatorioVendedor() {
        $this->loadView('admin/relatorio_vendedor', []);
    }

    public function historicoAcesso() {
        $this->loadView('admin/historico_acesso', []);
    }

    public function adminCarrossel() {
        $this->loadView('admin/admin_carrossel', []);
    }

    public function searchUser() {
        
    }

    public function updateUser() {

    }
}
