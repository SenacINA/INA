<?php
require_once __DIR__ . '/../../models/geral/TrocarEmailConfirmarModel.php';

class SalvarNovoEmailController
{
  public function salvarEmail()
  {
    header('Content-Type: application/json');
    
    $novoEmail = $_POST['email_cliente'] ?? '';
    $confirmEmail = $_POST['confirm_email_cliente'] ?? '';  
    $clienteId = $_SESSION['cliente_id'] ?? null;

    if (!$novoEmail || !filter_var($novoEmail, FILTER_VALIDATE_EMAIL)) {
      $this->responderErro("E-mail inválido ou não informado.");
    }

    if (!$confirmEmail || $novoEmail !== $confirmEmail) {
      $this->responderErro("Os e-mails não coincidem.");
    }

    if (!$clienteId) {
      $this->responderErro("Usuário não autenticado.");
    }

    $cliente = new TrocarEmailConfirmarModel();

    $emailAtual = $cliente->getEmailAtual($clienteId);

    if ($novoEmail === $emailAtual) {
      $this->responderErro("O e-mail fornecido é o mesmo do e-mail atual.");
    }

    if ($cliente->emailExiste($novoEmail)) {
      $this->responderErro("Este e-mail já está em uso por outro cliente.");
    }

    $atualizado = $cliente->atualizarEmail($clienteId, $novoEmail);

    // Resposta imediata com sucesso, sem delay
    if ($atualizado) {
      echo json_encode([
        "success" => true,
        "mensagem" => "E-mail atualizado com sucesso.",
        "redirect" => "editar-perfil"
      ]);
    } else {
      $this->responderErro("Erro ao atualizar e-mail.");
    }
  }

  private function responderErro($mensagem)
  {
    echo json_encode([
      "success" => false,
      "mensagem" => $mensagem
    ]);
    exit;
  }
}
