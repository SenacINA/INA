<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';

class GeralController extends RenderView {
    public function sobreNos() {
        $this->loadView('geral/sobre_nos', []);
    }

    public function editarPerfil() {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            $this->loadView('cliente/login', []);
            exit;
        }
    
        $clienteId = $_SESSION['cliente_id'];
        $userType = $_SESSION['user_type'];
    
        $clienteModel = new ClienteModel();
        $clienteData = $clienteModel->findById($clienteId); 
        if (!$clienteData) {
            $this->loadView('cliente/login', []);
            exit;
        }
    
        switch ($userType) {
            case 'admin':
                $this->loadView('admin/dashboard', ['user' => $clienteData]);
                break;
    
            case 'vendedor':
                $this->loadView('vendedor/editar_perfil_vendedor', [
                    'user' => $clienteData
                ]);
                break;
    
            case 'cliente':
                $this->loadView('cliente/editar_perfil', [
                    'user' => $clienteData
                ]);
                break;
    
            default:
                $this->loadView('cliente/login', []);
                break;
        }
    }
    
    
}
