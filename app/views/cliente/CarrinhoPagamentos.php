<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/CarrinhoPagamentos.css"];
require_once("./utils/head.php")
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <div class="carrinho_pagamentos_nav">
      <div class="carrinho_pagamentos_nav_item">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/carrinho_cinza_icon.svg">
        <span>Carrinho</span>
      </div>
      <hr>
      <div class="carrinho_pagamentos_nav_item">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/identificacao_cinza_icon.svg">
        <span>Identificação</span>
      </div>
      <hr>
      <div class="carrinho_pagamentos_nav_item carrinho_pagamentos_nav_selected">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/pagamento_icon.svg">
        <span>Pagamento</span>
      </div>
    </div>

    <div class="carrinho_dados_pagamentos">
      <div class="container_whats">
        <p>Fale diretamente com o seu Vendedor.</p>
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/whatsapp_user_carrinho_pagamentos.png" alt="">
        <p>Continue com o Pagamento no WhatsApp!</p>
        <button class="botao_whats base_botao">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/whatsapp_icon.svg" alt="">
          Iniciar conversa
        </button>
        <div class="separador_whats"></div>
        <p>Não tem o WhatsApp ainda?</p>
        <a>Baixe agora e comece a conversar</a>

        <div class="botoes_content">
          <button class="carrinho_pagamentos_start base_botao btn_outline_blue" onclick="history.back()">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_carolina_icon.svg">
            VOLTAR
          </button>

          <button class="base_botao btn_blue" onclick="pag('')">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
            FINALIZAR
          </button>
        </div>
      </div>
    </div>
  </main>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>

</html>