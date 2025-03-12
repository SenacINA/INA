<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/geral/redefinir_email_1.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="redefinir_email_1_container">
      <h1>REDEFINIÇÃO DE E-MAIL</h1>
      <hr>
      <div class="redefinir_email_1_main_content">
        <h2>ESQUECEU O E-MAIL?</h2>
        <h3>É necessário inserir sua senha para realizar a mudança.</h3>

        <form class="redefinir_email_1_form" action="">
          <label for="senha">Senha</label>
          <div class="redefinir_email_1_input">
              <input type="password" name="senha" id="senha-email">
              <a href="javascript:void(0);" id="eye-icon-email">
                  <img id="eye-img-email" src="../../image/geral/olho_fechado.svg" alt="Olho Fechado">
              </a>
          </div>
          <a href="">Esqueceu sua Senha?</a>
        </form>
        
        <!-- colocar botões novos -->
        <button class="redefinir_email_1_enviar">
          <img src="" alt="">
          <h3>ENVIAR</h3>
        </button>

        <button class="redefinir_email_1_voltar">
          <img src="" alt="">
          <h3>VOLTAR</h3>
        </button>
      </div>
    </div>
  </main>

  <script type="module" src="../../js/admin/toggle_redefinir.js"></script>

  <!-- footer -->
  <!-- coloca display:none no desktop -->
</body>
</html>
