<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/geral/redefinir_email_2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  
  <main>
    <div class="redefinir_email_2_container">
      <div class="redefinir_email_2_main_content">
        <div class="redefinir_email_2_bem_vindo">
          <img src="../../image/geral/logo-eaoquadrado.png">
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
          <img src="../../image/geral/seta_botao_branco.svg" alt="">Voltar
        </button>
        <button class="redefinir_email_2_botao_salvar" onclick="pag('geral/redefinir_email_3')">
          <img src="../../image/geral/confirm_botao.svg" alt="">Salvar
        </button>
      </div>
    </div>
  </main>

  <script type="module" src="../../js/admin/toggle_redefinir.js"></script>
</body>
</html>
