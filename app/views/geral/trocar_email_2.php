<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Trocar E-mail - E ao Quadrado";
$css = ["/css/geral/trocar_email_2.css"];
require_once('./utils/head.php');
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="trocar_email_2_container">
      <div class="trocar_email_2_main_content">
        <div class="trocar_email_2_bem_vindo">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/logo-eaoquadrado.png">
          <h1>trocar E-mail</h1>
        </div>

        <form class="trocar_email_2_form" method="POST" action="trocar-email-api-confirmar">
          <div class="trocar_email_2_input">
            <label for="email">Novo E-mail:</label>
            <input class="base_input" type="text" name="email_novo" id="email-novo">
          </div>

          <div class="trocar_email_2_input">
            <label for="email">Confirmar E-mail:</label>
            <input class="base_input" type="text" name="email_confirmacao" id="email-novo-confirm">
          </div>
          <p>Esse e-mail será vinculado à sua conta atual.</p>
        </form>
      </div>

      <div class="trocar_email_2_botoes">
        <button class="trocar_email_2_botao_voltar" onclick="history.back()">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="trocar_email_2_botao_salvar" id="continuar_button_email">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Salvar
        </button>
      </div>
    </div>
  </main>

  <script src="<?= $PATH_PUBLIC ?>/js/geral/TrocarEmailConfirmar.js"></script>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/toast.js"></script>

</body>

</html>