<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/geral/redefinir_senha_2.css">
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
    <div class="redefinir_senha_2_container">
      <h1>REDEFINIÇÃO DE SENHA</h1>
      <hr>
      <div class="redefinir_senha_2_main_content">
        <form class="redefinir_senha_2_form" action="">
          <label for="senha">Nova Senha</label>
          <div class="redefinir_senha_2">
              <input type="password" name="senha" id="senha">
              <a href="javascript:void(0);" id="eye-icon-senha">
                  <img id="eye-img-senha" src="../../image/geral/olho_fechado.svg" alt="Olho Fechado">
              </a>
          </div>
        
          <label for="nova_senha">Confirmar Nova Senha</label>
          <div class="redefinir_senha_2">
              <input type="password" name="nova_senha" id="nova_senha">
              <a href="javascript:void(0);" id="eye-icon-nova-senha">
                  <img id="eye-img-nova-senha" src="../../image/geral/olho_fechado.svg" alt="Olho Fechado">
              </a>
          </div>
        </form>
        
        <!-- colocar botões novos -->
        <button class="redefinir_senha_2_salvar" onclick="pag('geral/redefinir_senha_3')">
          <img src="" alt="">
          <h3>SALVAR</h3>
        </button>

        <button class="redefinir_senha_2_voltar" onclick="history.back()">
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
