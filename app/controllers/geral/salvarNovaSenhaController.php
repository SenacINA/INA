<?php
require_once __DIR__ . '/../../models/RedefinicaoSenhaModel.php';

class SalvarNovaSenhaController
{
  public function alterarSenha()
  {
    header('Content-Type: application/json');

    $senha = $_POST['senha'] ?? '';
    $novaSenha = $_POST['nova_senha'] ?? '';
    $token = $_POST['token'] ?? '';

    if (!$senha || !$novaSenha || !$token) {
      $this->responderErro("Preencha todos os campos.");
    }

    if ($senha !== $novaSenha) {
      $this->responderErro("As senhas não coincidem.");
    }

    if (strlen($senha) < 8) {
      $this->responderErro("A senha deve ter no mínimo 8 caracteres.");
    }

    $model = new SalvarNovaSenhaModel();
    $registro = $model->validarToken($token);

    if (!$registro) {
      $this->responderErro("Token inválido ou expirado.");
    }

    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

    $model->atualizarSenhaCliente($registro['id_cliente'], $hashSenha);
    $model->marcarTokenComoUsado($token);

    echo json_encode([
      "mensagem" => "Senha alterada com sucesso!"
    ]);
  }

  private function responderErro($mensagem)
  {
    echo json_encode([
      "status" => "error",
      "mensagem" => $mensagem
    ]);
    exit;
  }
}
