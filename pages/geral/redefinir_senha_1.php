<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/geral/redefinir_senha_1.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  
  <main>
    <div class="redefinir_senha_1_container">
      <div class="redefinir_senha_1_main_content">
        <div class="redefinir_senha_1_bem_vindo">
          <img src="../../image/geral/logo-eaoquadrado.png">
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
          <img src="../../image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">Voltar
        </button>
        <button class="redefinir_senha_1_botao_avancar" onclick="pag('geral/redefinir_senha_2')">
          <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">Avançar
        </button>
      </div>
    </div>
  </main>

  <script type="module" src="../../js/admin/toggle_redefinir.js"></script>
</body>
</html>
