<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $titulo = "Redefinir E-mail - E ao Quadrado";
    $css = ["/css/geral/redefinir_email_1.css"];
    require_once('./utils/head.php');
  ?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="redefinir_email_1_container">
      <div class="redefinir_email_1_main_content">
        <div class="redefinir_email_1_bem_vindo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png">
          <h1>Redefinir E-mail</h1>
        </div>

        <form class="redefinir_email_1_form" action="">
          <label for="senha:">Senha:</label>
          <div class="redefinir_email_1_input">
              <input class="base_input" type="password" name="senha" id="senha-email">
              <a href="javascript:void(0);" id="eye-icon-email">
                  <img class="base_icon" id="eye-img-email" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
          </div>
          <a href="./redefinir_senha_1.php">Redefinir Senha</a>
        </form>
      </div>

      <div class="redefinir_email_1_botoes">
        <button class="redefinir_email_1_botao_voltar" onclick="history.back()">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="redefinir_email_1_botao_avancar" onclick="pag('geral/redefinir_email_2')">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Avançar
        </button>
      </div>
    </div>
  </main>

  <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>
</body>
</html>
