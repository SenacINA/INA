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
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="redefinir_email_2_container">
      <h1>REDEFINIÇÃO DE E-MAIL</h1>
      <hr>
      <div class="redefinir_email_2_main_content">
        <form class="redefinir_email_2_form" action="">
          <div class="redefinir_email_2">
            <label for="email">Novo E-mail</label>
            <input type="text" name="email" id="email">  
          </div>

          <div class="redefinir_email_2">
            <label for="email">Confirmar Novo E-mail</label>
            <input type="text" name="email" id="email">  
          </div>
        </form>
        
        <!-- colocar botões novos -->
        <button class="redefinir_email_2_salvar" onclick="pag('geral/redefinir_email_3')">
          <img src="" alt="">
          <h3>SALVAR</h3>
        </button>

        <button class="redefinir_email_2_voltar" onclick="history.back()">
          <img src="" alt="">
          <h3>VOLTAR</h3>
        </button>
      </div>
    </div>
  </main>

  <!-- footer -->
  <!-- coloca display:none no desktop -->
</body>
</html>