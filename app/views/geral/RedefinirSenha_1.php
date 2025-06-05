<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Redefinir Senha - E ao Quadrado";
$css = ["/css/geral/RedefinirSenha_1.css"];
require_once('./utils/head.php');
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="redefinir_senha_1_container">
      <div class="redefinir_senha_1_main_content">
        <div class="redefinir_senha_1_bem_vindo">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/logo-eaoquadrado.png">
          <h1>Redefinir Senha</h1>
        </div>

        <form class="redefinir_senha_1_form" method="POST" action="redefinir-senha-api">
          <label for="email">E-mail:</label>
          <input class="base_input" type="email" name="email" id="email-senha">
        </form>
      </div>

      <div class="redefinir_senha_1_botoes">
        <button class="redefinir_senha_1_botao_voltar" onclick="history.back()">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="redefinir_senha_1_botao_avancar" id="continuar_button_senha">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Enviar
        </button>
      </div>
    </div>
  </main>

  <!-- Pop-Up -->
  <div class="popup_container" id="popup">
    <div class="popup">
      <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/check_carolina_icon.svg" width="200px" height="200px">
      <div class="text_popup">
      </div>
    </div>
  </div>

  <script type="module" src="<?= $PATH_PUBLIC ?>/js/admin/ToggleEyeSenha.js"></script>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/geral/popUpRedefinirSenhas.js"></script>
</body>

</html>