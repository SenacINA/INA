<?php

require_once __DIR__.'/../../models/cliente/ClienteModel.php';
require_once __DIR__.'/../../models/vendedor/VendedorModel.php';
require_once __DIR__.'/../../models/geral/GeralModel.php';

class GeralController extends RenderView {

    // Função que verifiaca a sessão
    private function renderPerfil(string $action) {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        }
    
        $clienteId = $_SESSION['cliente_id'];
    
        $clienteModel = new ClienteModel();
        $vendedorModel = new VendedorModel();

        $userType = $clienteModel->tipoCliente($_SESSION['cliente_id']);
        $_SESSION['user_type'] = $userType;

        $geralModel   = new GeralModel();
    
        // Caso o usuário seja admin, direciona para o dashboard
        if ($userType === 'admin') {
            $adminData = ['nome' => 'Admin', 'email' => 'admin@admin.com'];
            $this->loadView('admin/Dashboard', ['user' => $adminData]);
            return;
        }
    
        // Lógica para vendedor e cliente
        if ($userType === 'vendedor' || $userType === 'cliente') {
            $clienteData = $clienteModel->findById($clienteId);
    
            if (!$clienteData) {
                $this->loadView('cliente/Login', []);
                exit;
            }
    
            if ($userType === 'vendedor') {
                $vendedorData = $vendedorModel->dadosVendedor($clienteId);
                $vendedorAvaliacoes = $vendedorModel->getEstrelasPorVendedor($vendedorData['id_vendedor']);
                $total = 0;

                foreach ($vendedorAvaliacoes as $avaliacao) {
                    $total += $avaliacao;
                };

                $vendedorData['mediaEstrelas'] = count($vendedorAvaliacoes) > 0 
                ? round($total / count($vendedorAvaliacoes) * 2) / 2 
                : 0;

                $dataRequisicao = strtotime($vendedorData['data_requisicao']);
                $agora = time();
                $diferencaDias = floor(($agora - $dataRequisicao) / (60 * 60 * 24));

                if ($diferencaDias >= 365) {
                    $anos = floor($diferencaDias / 365);
                    $mesesRestantes = floor(($diferencaDias % 365) / 30);
                    $vendedorData['tempo'] = ($anos > 1 ? "{$anos} anos" : "{$anos} ano") . 
                        ($mesesRestantes > 0 ? " e " . ($mesesRestantes > 1 ? "{$mesesRestantes} meses" : "{$mesesRestantes} mês") : "");
                } elseif ($diferencaDias >= 30) {
                    $meses = floor($diferencaDias / 30);
                    $vendedorData['tempo'] = $meses > 1 ? "{$meses} meses" : "{$meses} mês";
                } else {
                    $vendedorData['tempo'] = $diferencaDias > 1 ? "{$diferencaDias} dias" : "{$diferencaDias} dia";
                }

                $vendedorData['quantidadeProdutos'] = $vendedorModel->getQuantidadeProdutos($vendedorData['id_vendedor']);
                // $vendedorData['quantidadeProdutos'] > 0 ?? $vendedorData['quantidadeProdutos'] = 0;

                $viewPath = $action === 'perfil'
                    ? 'vendedor/PerfilVendedor'
                    : 'vendedor/EditarPerfilVendedor';
            } else { 
                $viewPath = $action === 'perfil'
                    ? 'cliente/PerfilCliente'
                    : 'cliente/EditarPerfil';
            }
    
            // Configura imagens padrão se os campos estiverem vazios
            if (empty($clienteData['banner_perfil'])) {
                $clienteData['banner_perfil'] = '/image/cliente/editar_perfil/mini_banner_perfil_cliente.png';
            }
    
            if (empty($clienteData['foto_perfil'])) {
                $clienteData['foto_perfil'] = '/image/cliente/editar_perfil/perfil_usuario.svg';
            }

            if ($clienteData['uf'] && $clienteData['cidade']) {
                $localizacao = $clienteData['uf'] . ' - ' . $clienteData['cidade'];
                $clienteData['localizacao'] = $localizacao;
            } else {
                $clienteData['localizacao'] = null;
            }

            $vendedorData = $vendedorData ?? [];

            $this->loadView($viewPath, [
                'user' => $clienteData,
                'vendedor' => $vendedorData
            ]);
        } else {
            $this->loadView('cliente/Login', []);
        }
    }
    
    public function perfil() {
        $this->renderPerfil('Perfil');
    }
    
    public function editarPerfil() {
        $this->renderPerfil('EditarPerfil');
    }

    public function error() {
        $this->loadView('geral/error', []);
    }
}
