<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/cliente/login.css">   
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
    <div class="login_quadrado">
      <div class="login_container">
        <div class="login_bem_vindo">
          <img src="../../image/geral/logo-eaoquadrado.png">
          <h1>Login de usuário</h1>
          <h2>Bem-vindo de volta!</h2>
        </div>

        <form class="login_formulario_login">
          <label for="email">Email:</label><br>
          <input type="text" id="email" class="base_input"><br>
        </form>

        <form class="login_redefinir_senha_2_form" action="">
            <label for="senha">Senha:</label>
            <div class="login_redefinir_senha_2">
              <input type="password" name="senha" id="senha" class="base_input">
              <a href="javascript:void(0);" id="eye-icon-senha">
                <img id="eye-img-senha" src="../../image/geral/olho_fechado.svg" alt="Olho Fechado">
              </a>
            </div>
            
            <div class="login_links_conatiner">
              <div class="login_checkbox_container">
                <input type="checkbox" class="base_input">
                <p>Manter Conectado</p>
              </div>
            </div>

            <div class="login_links">
                <div onclick="pag('geral/redefinir_senha_1')">
                  <p>Redefinir Senha</p>
                </div>        
                <div onclick="pag('cliente/cadastro')">
                  <p>Não tem login? Clique aqui</p>
                </div>
            </div>
        </form>
      </div>
      <div class="login_botoes">
          <button class="login_botao_entrar" onclick="login()">
              <img src="../../image/geral/confirm_botao.svg" alt="">Entrar
          </button>
        </div>
    </div>

    <script type="module" src="../../js/admin/toggle_redefinir.js"></script>
  </main>
</body>
</html>
