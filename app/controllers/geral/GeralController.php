<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';
require_once __DIR__.'/../../models/geral/GeralModel.php';


class GeralController extends RenderView {
    public function sobreNos() {
        $this->loadView('geral/sobre_nos', []);
    }

    public function perfil() {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            $this->loadView('cliente/login', []);
            exit;
        }
    
        $clienteId = $_SESSION['cliente_id'];
        $userType = $_SESSION['user_type'];
    
        $clienteModel = new ClienteModel();
        $geralModel = new GeralModel();
    
        switch ($userType) {
            case 'admin':
                $adminData = ['nome' => 'Admin', 'email' => 'admin@admin.com']; 
                $this->loadView('admin/dashboard', ['user' => $adminData]);
                break;
    
            case 'vendedor':
            case 'cliente':
                $clienteData = $clienteModel->findById($clienteId); 
                $localizacoes = $geralModel->getLocalizacoes();
                if (!$clienteData) {
                    $this->loadView('cliente/login', []);
                    exit;
                }
    
                $viewPath = $userType === 'vendedor'
                    ? 'vendedor/perfil_vendedor'
                    : 'cliente/perfil_cliente';
                

                if (empty($clienteData['banner_perfil'])) {
                    $clienteData['banner_perfil'] = './public/image/cliente/editar_perfil/mini_banner_perfil_cliente.png';
                } else {
                    $clienteData['banner_perfil'] = "data:image/png;base64," . base64_encode($clienteData['banner_perfil']);
                }

                if (empty($clienteData['foto_perfil'])) {
                    $clienteData['foto_perfil'] = './public/image/cliente/editar_perfil/perfil_usuario.svg';
                } else {
                    $clienteData['foto_perfil']  = "data:image/png;base64," . base64_encode($clienteData['foto_perfil']);
                }
                
                $this->loadView($viewPath, ['user' => $clienteData, 'localizacoes' => $localizacoes]);
                break;
    
            default:
                $this->loadView('cliente/login', []);
                break;
        }
    }

    
    public function editarPerfil() {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            $this->loadView('cliente/login', []);
            exit;
        }
    
        $clienteId = $_SESSION['cliente_id'];
        $userType = $_SESSION['user_type'];
    
        $clienteModel = new ClienteModel();
        $geralModel = new GeralModel();
    
        switch ($userType) {
            case 'admin':
                $adminData = ['nome' => 'Admin', 'email' => 'admin@admin.com']; 
                $this->loadView('admin/dashboard', ['user' => $adminData]);
                break;
    
            case 'vendedor':
            case 'cliente':
                $clienteData = $clienteModel->findById($clienteId); 
                $localizacoes = $geralModel->getLocalizacoes();
                if (!$clienteData) {
                    $this->loadView('cliente/login', []);
                    exit;
                }
    
                $viewPath = $userType === 'vendedor'
                    ? 'vendedor/editar_perfil_vendedor'
                    : 'cliente/editar_perfil';
                

                if (empty($clienteData['banner_perfil'])) {
                    $clienteData['banner_perfil'] = './public/image/cliente/editar_perfil/mini_banner_perfil_cliente.png';
                } else {
                    $clienteData['banner_perfil'] = "data:image/png;base64," . base64_encode($clienteData['banner_perfil']);
                }

                if (empty($clienteData['foto_perfil'])) {
                    $clienteData['foto_perfil'] = './public/image/cliente/editar_perfil/perfil_usuario.svg';
                } else {
                    $clienteData['foto_perfil']  = "data:image/png;base64," . base64_encode($clienteData['foto_perfil']);
                }
                
                $this->loadView($viewPath, ['user' => $clienteData, 'localizacoes' => $localizacoes]);
                break;
    
            default:
                $this->loadView('cliente/login', []);
                break;
        }
    }
    
    
    
}
