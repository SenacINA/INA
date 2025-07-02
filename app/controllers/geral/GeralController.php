<?php

require_once __DIR__ . '/../../models/cliente/ClienteModel.php';
require_once __DIR__ . '/../../models/vendedor/VendedorModel.php';
require_once __DIR__ . '/../../models/geral/GeralModel.php';

class GeralController extends RenderView
{
  private function renderPerfil(string $action, bool $isCliente, int $idVendedor = 0)
  {
    if ($isCliente == true) {
      $vendedorModel = new VendedorModel();
      $clienteModel = new ClienteModel();

      $clienteData = $clienteModel->findById($idVendedor);
      $vendedorData = $vendedorModel->dadosVendedor($idVendedor);
      $vendedorAvaliacoes = $vendedorModel->getEstrelasPorVendedor($idVendedor) ?? [];

      $total = 0;
      foreach ($vendedorAvaliacoes as $avaliacao) {
        $total += $avaliacao;
      }

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

      $vendedorData['quantidadeProdutos'] = $vendedorModel->getQuantidadeProdutos($idVendedor);

      $this->loadView('vendedor/PerfilVendedor', [
        'user' => $clienteData,
        'vendedor' => $vendedorData,
        'isCliente' => $isCliente,
        'idVendedor'=> $idVendedor
      ]);
    } else if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
      header('Location: Login');
      exit;
    } else {
      $clienteId = $_SESSION['cliente_id'];

      $clienteModel = new ClienteModel();
      $vendedorModel = new VendedorModel();

      $userType = $clienteModel->tipoCliente($clienteId);
      $_SESSION['user_type'] = $userType;

      if ($userType === 'admin') {
        require_once __DIR__ . '/../../models/admin/AdminModel.php';
        $adminModel = new AdminModel();
        $adminData = $adminModel->getInfoAdmin($clienteId);
        $this->loadView('admin/PerfilAdmin', ['user' => $adminData]);
        return;
      }

      if ($userType === 'vendedor' || $userType === 'cliente') {
        if (isset($_GET['idVendedor']) && $_SESSION['cliente_id'] != $_GET['idVendedor']) {
          $clienteData = $clienteModel->findById($clienteData);
        } else {
          $clienteData = $clienteModel->findById($clienteId);
        }

        if (!$clienteData) {
          header('Location: Login');
          exit;
        }

        $vendedorData = [];

        if ($userType === 'vendedor') {
          $vendedorData = $vendedorModel->dadosVendedor($clienteId);
          $vendedorAvaliacoes = $vendedorModel->getEstrelasPorVendedor($clienteId) ?? [];

          $total = 0;
          foreach ($vendedorAvaliacoes as $avaliacao) {
            $total += $avaliacao;
          }

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
        }

        if ($userType === 'vendedor') {
          $viewPath = $action === 'perfil'
            ? 'vendedor/PerfilVendedor'
            : 'vendedor/EditarPerfilVendedor';
        } else {
          $viewPath = $action === 'perfil'
            ? 'cliente/PerfilCliente'
            : 'cliente/EditarPerfil';
        }

        if (empty($clienteData['banner_perfil'])) {
          $clienteData['banner_perfil'] = '/image/cliente/editar_perfil/mini_banner_perfil_cliente.png';
        }

        if (empty($clienteData['foto_perfil'])) {
          $clienteData['foto_perfil'] = '/image/cliente/editar_perfil/perfil_usuario.svg';
        }

        if (!empty($clienteData['uf']) && !empty($clienteData['cidade'])) {
          $clienteData['localizacao'] = $clienteData['uf'] . ' - ' . $clienteData['cidade'];
        } else {
          $clienteData['localizacao'] = null;
        }

        $this->loadView($viewPath, [
          'user' => $clienteData,
          'vendedor' => $vendedorData,
          'isCliente' => false
        ]);
      } else {
        header('Location: Login');
        exit;
      }
    }
  }

  public function perfil($isCliente = false)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idVendedor']) && isset($_GET['isCliente'])) {
      $idVendedor = $_GET['idVendedor'];
      $isCliente = $_GET['isCliente'];
      $this->renderPerfil('perfil', $isCliente, $idVendedor);
    } else {
      $this->renderPerfil('perfil', $isCliente);
    }
  }

  public function sobreNos($clienteView = false)
  {
    $this->loadview('geral/SobreNos', []);
  }

  public function editarPerfil($clienteView = false)
  {
    $this->renderPerfil('EditarPerfil', $clienteView);
  }

  public function error()
  {
    $this->loadView('geral/error', []);
  }
}
