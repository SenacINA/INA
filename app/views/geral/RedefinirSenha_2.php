<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Redefinir Senha - E ao Quadrado";
$css = ["/css/geral/RedefinirSenha_2.css"];
require_once('./utils/head.php');

// Pega o token da URL
$token = $_SESSION['redefinir_senha_token'] ?? '';
if (!$token) {
  echo '
      <div class="mensagem-erro">
        <p>Token inválido ou expirado.</p>
        <a onclick="pag(/' / ')" class="botao-voltar">Voltar para a Página Inicial</a>
      </div>
    ';
  die();
}
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="redefinir_senha_2_container">
      <div class="redefinir_senha_2_main_content">
        <div class="redefinir_senha_2_bem_vindo">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/logo-eaoquadrado.png">
          <h1>Redefinir Senha</h1>
        </div>

        <form class="redefinir_senha_2_form" action="javascript:void(0);">

          <input type="hidden" name="token" id="token" value="<?= htmlspecialchars($token) ?>">

          <div class="redefinir_senha_2_input">
            <label for="senha">Nova Senha:</label>
            <div class="redefinir_senha_2">
              <input class="base_input" type="password" name="senha" id="senha">
              <a href="javascript:void(0);" id="eye-icon-senha">
                <img class="base_icon" id="eye-img-senha" src="<?= $PATH_PUBLIC ?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
            </div>
          </div>

          <div class="redefinir_senha_2_input">
            <label for="confirmaSenha">Confirmar Nova Senha:</label>
            <div class="redefinir_senha_2">
              <input class="base_input" type="password" name="confirmaSenha" id="confirmaSenha">
              <a href="javascript:void(0);" id="eye-icon-nova-senha">
                <img class="base_icon" id="eye-img-nova-senha" src="<?= $PATH_PUBLIC ?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
            </div>
          </div>
        </form>
      </div>

      <div class="redefinir_senha_2_botoes">
        <button class="redefinir_senha_2_botao_voltar" onclick="history.back()">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="redefinir_senha_2_botao_salvar" id="continuar_button_senha">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Salvar
        </button>
      </div>
    </div>
  </main>

  <script type="module" src="<?= $PATH_PUBLIC ?>/js/admin/toggle_eyeSenha.js"></script>
  <script type='module' src="./app/components/js/Toast.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/geral/redefinirSenha.js"></script>

</body>

</html>