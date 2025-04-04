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
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/geral/redefinir_senha_3.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>

  <main>
    <div class="redefinir_senha_3_container">
      <div class="redefinir_senha_3_content">
        <img src="../../image/geral/confirmacao.svg">
        <h2>Redefinição de senha realizada!</h2>
      </div>
      
      <button class="redefinir_senha_3_botao_tela_inicial" onclick="pag('cliente/login')">
        <img src="../../image/geral/botoes/sair_branco_icon.svg" alt="">
        <h3>TELA INICIAL</h3>
      </button>
    </div>
  </main>
</body>
</html>