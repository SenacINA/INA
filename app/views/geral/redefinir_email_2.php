<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Redefinir E-mail - E ao Quadrado";
  $css = ["/css/geral/redefinir_email_2.css"];
  require_once('./utils/head.php');
?>
<body>
  <!-- Até 375px -->
  <!--Camino de Icon Correto -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  
  <main>
    <div class="redefinir_email_2_container">
      <div class="redefinir_email_2_main_content">
        <div class="redefinir_email_2_bem_vindo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png">
          <h1>Redefinir E-mail</h1>
        </div>

        <form class="redefinir_email_2_form" action="">
          <div class="redefinir_email_2_input">
            <label for="email">Novo E-mail:</label>
            <input class="base_input" type="text" name="email" id="email">
          </div>

          <div class="redefinir_email_2_input">
            <label for="email">Confirmar E-mail:</label>
            <input class="base_input" type="text" name="email" id="confirm-email">
          </div>
        </form>
        
        
      </div>
      <div class="redefinir_email_2_botoes">
        <button class="redefinir_email_2_botao_voltar" onclick="history.back()">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="redefinir_email_2_botao_salvar" id="continuar_button">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Salvar
        </button>
      </div>
    </div>
  </main>
  
  <!-- Pop-Up -->
  <div class="popup_container" id="popup">
    <div class="popup">
      <div class="text_popup">
        <img src="<?=$PATH_PUBLIC?>/image/geral/icons/check_carolina_icon.svg" width="200px" height="200px">
        <p class="font_base font_bold">Redefinição de senha realizada!</p>
      </div>
      <button class="base_botao btn_blue" id="close_btn" onclick="pag('cliente/login')">
        <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
        TELA INICIAL
      </button>
    </div>
  </div>

  <script src="<?=$PATH_PUBLIC?>/js/geral/pop-Up_redefinir.js"></script>
  <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>
</body>
</html>
