<!DOCTYPE html>
<html lang="pt-br">

<?php
  $css = ["/css/cliente/carrinho_pagamentos.css"];
  require_once("../../../utils/head.php")
?>

<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
<main>
  <div class="carrinho_vazio_nav">
    <div class="carrinho_vazio_nav_item">
      <img src="<?=$PATH_PUBLIC?>/image/carrinho/carrinho.svg">
      <span>Carrinho</span>
    </div>
    <hr>
    <div class="carrinho_vazio_nav_item">
      <img src="<?=$PATH_PUBLIC?>/image/carrinho/identificacao.svg">
      <span>Identificação</span>
    </div>
    <hr>
    <div class="carrinho_vazio_nav_item  carrinho_vazio_nav_selected">
      <img src="<?=$PATH_PUBLIC?>/image/carrinho/pagamento.svg">
      <span>Pagamento</span>
    </div>
  </div>

  <div class="carrinho_dados_pagamentos">
    <div class="container_whats">
      <p>Conversar com Atendimento direto do vendedor</p>
      <img src="<?=$PATH_PUBLIC?>/image/cliente/carrinho_pagamentos/whatsapp_user_carrinho_pagamentos.png" alt="">
      <p>Conversar com Vendedor no WhatsApp</p>
      <button class="botao_whats base_botao">Iniciar conversa</button>
      <div class="separador_whats"></div>
      <p>Ainda não tem o WhatsApp?</p>
      <a>Baixar</a>

      <div class="botoes_content">
        <button class="base_botao btn_blue" onclick="pag('../../index')">
          Finalizar
        </button>
        <button class="base_botao btn_red" onclick="history.back()">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
          Voltar
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