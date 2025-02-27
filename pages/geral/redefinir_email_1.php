<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/geral/redefinir_email_1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    
</head>
<body>
<header class="nav style_nav shadow_nav">
    <div class="grid-container style_nav">
        <div class="item1">
            <img id="imgLupa" src="../../image/index/lupa.png" alt="">
            <input type="text">
        </div>
        <div class="item2">
            <button id="buttonLogo">
                <a href="#">
                <img href="#" id="imgLogo" src="../../image/index/Logo.svg">
                </a>
            </button>
        </div>
        <div class="item3">
            <a class="button" href="#">
                <img src="../../image/index/user.png" alt="Usuário">
            </a>
            <a class="button" href="#">
                <img src="../../image/index/carrinho.png" alt="Carrinho">
            </a>
            <a class="button" href="#">
                <img src="../../image/index/config.png" alt="Configurações">
            </a>
        </div>
        
    </div>
</header>
  <main>
    <div class="quadrado">
      <div class="main_txt">
        <p>REDEFINIÇÃO DE E-MAIL</p>
        <img src="../../image/divisoria_geral.png" alt="">
      </div>
     <div class="main_content">
        <p class="esqueceu">DESEJA ALTERAR SEU E-MAIL?</p>
        <p class="info">É necessário inserir sua senha para realizar a mudança:</p>
        <form action="">
          <label for="senha">Senha:</label><br>
          <input type="text" id="senha"><br>
          <a class="link">Esqueceu sua senha?</a>
        </form>
     </div>
     <div class="botoes">
      <button id="botao_voltar" type="button" class="voltar">Voltar</button>
      <button id="botao_continuar" type="button" class="continuar">Continuar</button>
     </div>
    </div>
  </main>
</body>
</html>


