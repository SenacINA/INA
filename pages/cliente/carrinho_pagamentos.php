<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="../../css/cliente/carinho_pagamentos.css">
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="fundo">
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <div class="carrinho_pagamentos">
    <img src="../../image/cliente/carrinho_pagementos/carrinho_pagamento.png" class="carrinho_top">
    <div class="main_pagamentos">
      <div class="main_container_carrinho_pagamentos">
        <p class="main_text_carrinho_pagamentos">Pagamento</p>
        <hr class="separador_carrinho">
      </div>
      <div class="container_whats">
        <p>Conversar com Atendimento direto do vendedor</p>
        <img src="../../image/cliente/carrinho_pagementos/whatsapp_user_carrinho_pagamentos.png" alt="">
        <p class="conversar_vendedor">Conversar com Vendedor no WhatsApp</p>
        <button class="botao_whats">Iniciar conversa</button>
        <div class="separador_whats"></div>
        <p class="nao_tem">Ainda não tem o WhatsApp?</p>
        <a href="#" class="baixar_whats">Baixar</a>
        <div class="botoes">
          <button class="finalizar"><img src="../../image/geral/lixo.svg" alt="">Finalizar</button>
          <button class="voltar"><img src="../../image/geral/voltar_vermelho_botao.svg" alt="">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer_carrinho">
    <img src="../../image/cliente/footer/img_footer_placeholder.png" width="100%" height="100%">
  </footer>
</body>
</html>