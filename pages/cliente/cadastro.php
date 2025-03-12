<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/cliente/cadastro.css">
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
    <div class="quadrado">
      <div class="bem_vindo">
        <img src="../../image/geral/logo-eaoquadrado.png">
        <p class="cadastro_bem_vindo">Bem-vindo!</p>
        <p class="cadastro_text">Cadastre suas credenciais</p>
      </div>

      <form class="formulario_cadastro">
        <label for="nomeDeUsuario">Nome de usuário:</label><br>
        <input type="text"><br>
        <label for="email">Email:</label><br>
        <input type="text"><br>
        <label for="novaSenha">Nova senha:</label><br>
        <input type="password"><br>
        <label for="confirmarSenha">Confirmar senha:</label><br>
        <input type="password">
      </form>

      <div class="regras">
        <h1 class="regras_senha">Regras da senha</p>
        <ul class="lista">
          <li>Deve conter ao menos 6 caracteres</li>
          <li>Deve conte ao menos uma letra minúscula</li>
          <li>Deve conter ao menos um número</li>
          <li>Não pode ser uma de suas senhas antigas</li>
        </ul>
      </div>
      <div class="botoes">
        <button class="voltar"><img src="../../image/geral/seta_botao_branco.svg" alt="">Voltar</button>
        <button class="salvar"><img src="../../image/geral/confirm_botao.svg" alt="">Cadastrar</button>
      </div>
    </div>
  </main>
</body>
</html>