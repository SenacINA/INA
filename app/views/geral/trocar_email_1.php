

<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $titulo = "trocar E-mail - E ao Quadrado";
    $css = ["/css/geral/trocar_email_1.css"];
    require_once('./utils/head.php');
  ?>
  <body>
    <?php 
      include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>

    <main>
      <div class="trocar_email_1_container">
        <div class="trocar_email_1_main_content">
          <div class="trocar_email_1_bem_vindo">
            <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png">
            <h1>Trocar E-mail</h1>
          </div>

          <form class="trocar_email_1_form" id="form_trocar_email" method="POST" action="trocarEmail1.php" autocomplete="on">
            <label for="senha-email">Senha:</label>
            <div class="trocar_email_1_input">
                <input class="base_input" type="password" name="senha_cliente" id="senha-email" required>
                <a href="javascript:void(0);" id="eye-icon-email">
                    <img class="base_icon" id="eye-img-email" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
                </a>
            </div>

            <div id="response-message"></div>
          </form>
        </div>

        <div class="trocar_email_1_botoes">
          <button class="trocar_email_1_botao_voltar" onclick="history.back()">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
            Voltar
          </button>

          <button type="button" id="avancar-btn" class="trocar_email_1_botao_avancar">
              <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
              Avançar
          </button>
        </div>
      </div>
    </main>

    <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>
    <script type="module" src="<?=$PATH_COMPONENTS?>/js/toast.js"></script>
    <script type="module" src="<?=$PATH_COMPONENTS?>/js/geral/trocar_email_1.js"></script>
  </body>
</html>


