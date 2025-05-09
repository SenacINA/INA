<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';
require_once __DIR__.'/../../models/geral/GeralModel.php';

class GeralController extends RenderView {

    // Função que verifiaa a sessão
    private function renderPerfil(string $action) {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: login');
            exit;
        }
    
        $clienteId = $_SESSION['cliente_id'];
        $userType  = $_SESSION['user_type'];
    
        $clienteModel = new ClienteModel();
        $geralModel   = new GeralModel();
    
        // Caso o usuário seja admin, direciona para o dashboard
        if ($userType === 'admin') {
            $adminData = ['nome' => 'Admin', 'email' => 'admin@admin.com'];
            $this->loadView('admin/dashboard', ['user' => $adminData]);
            return;
        }
    
        // Lógica para vendedor e cliente
        if ($userType === 'vendedor' || $userType === 'cliente') {
            $clienteData  = $clienteModel->findById($clienteId);
            $localizacoes = $geralModel->getLocalizacoes();
    
            if (!$clienteData) {
                $this->loadView('cliente/login', []);
                exit;
            }
    
            if ($userType === 'vendedor') {
                $viewPath = $action === 'perfil'
                    ? 'vendedor/perfil_vendedor'
                    : 'vendedor/editar_perfil_vendedor';
            } else { 
                $viewPath = $action === 'perfil'
                    ? 'cliente/perfil_cliente'
                    : 'cliente/editar_perfil';
            }
    
            // Configura imagens padrão se os campos estiverem vazios
            if (empty($clienteData['banner_perfil'])) {
                $clienteData['banner_perfil'] = './public/image/cliente/editar_perfil/mini_banner_perfil_cliente.png';
            }
    
            if (empty($clienteData['foto_perfil'])) {
                $clienteData['foto_perfil'] = './public/image/cliente/editar_perfil/perfil_usuario.svg';
            }
    
            $this->loadView($viewPath, [
                'user'          => $clienteData,
                'localizacoes'  => $localizacoes
            ]);
        } else {
            $this->loadView('cliente/login', []);
        }
    }
    
    public function perfil() {
        $this->renderPerfil('perfil');
    }
    
    public function editarPerfil() {
        $this->renderPerfil('editar_perfil');
    }
}
