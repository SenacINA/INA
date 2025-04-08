<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Redefinir E-mail - E ao Quadrado";
  $css = ["/css/geral/redefinir_email_2.css"];
  require_once('../../../utils/head.php');
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
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">Voltar
        </button>
        <button class="redefinir_email_2_botao_salvar" onclick="pag('geral/redefinir_email_3')">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">Salvar
        </button>
      </div>
    </div>
  </main>

  <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>
</body>
</html>
