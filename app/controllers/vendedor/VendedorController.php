<?php    

class VendedorController extends RenderView {
    public function perfil() {
        $this->loadView('vendedor/perfil_vendedor', []);
    }

    public function showInfo() {
        $this->loadView('vendedor/cadastro_vendedor_1', []);
    }

    public function showFormCadastro() {
        $this->loadView('vendedor/cadastro_vendedor_2', []);
    }

    public function editarPerfil() {
        $this->loadView('vendedor/editar_perfil_vendedor', []);
    }

}