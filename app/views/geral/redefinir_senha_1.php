<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $titulo = "Redefinir Senha - E ao Quadrado";
    $css = ["/css/geral/redefinir_senha_1.css"];
    require_once('../../../utils/head.php');
  ?>
<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  
  <main>
    <div class="redefinir_senha_1_container">
      <div class="redefinir_senha_1_main_content">
        <div class="redefinir_senha_1_bem_vindo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png">
          <h1>Redefinir Senha</h1>
        </div>

        <form class="redefinir_senha_1_form" action="">
          <label for="email">E-mail:</label>
          <input class="base_input" type="email" name="email" id="email-senha">

          <a href="./redefinir_email_1.php">Redefinir E-Mail</a>
        </form>
      </div>

      <div class="redefinir_senha_1_botoes">
        <button class="redefinir_senha_1_botao_voltar" onclick="history.back()">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="redefinir_senha_1_botao_avancar" id="continuar_button">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Enviar
        </button>
      </div>
    </div>
  </main>

  <!-- Pop-Up -->
  <div class="popup_container" id="popup">
    <div class="popup">
      <div class="text_popup">
        <img src="<?=$PATH_PUBLIC?>/image/geral/icons/check_carolina_icon.svg" width="200px" height="200px">
        <p class="font_base font_bold">
          Enviamos um link de redefinição para o seu email.
          Por favor, verifique sua caixa de entrada (ou spam) para continuar o processo.
        </p>
      </div>
      <button class="base_botao btn_blue" id="close_btn">
        <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
        Ok
      </button>
    </div>
  </div>

  <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>
  <script src="<?=$PATH_PUBLIC?>/js/geral/pop-Up_redefinir.js"></script>
</body>
</html>
