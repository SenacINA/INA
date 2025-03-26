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
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->
   
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="cadastro_quadrado">
      <div class="cadastro_container">
        <div class="cadastro_bem_vindo">
          <img src="../../image/geral/logo-eaoquadrado.png">
          <h1>Cadastro de usuário</h1>
        </div>

        <form class="cadastro_formulario_cadastro">
          <label for="nomeDeUsuario">Nome:</label><br>
          <input type="text" class="base_input"><br>
          <label for="email">Email:</label><br>
          <input type="text" class="base_input"><br>
        </form>

        <form class="cadastro_redefinir_senha_2_form" action="">
          <label for="senha">Senha:</label>
          <div class="cadastro_redefinir_senha_2">
              <input type="password" name="senha" id="senha" class="base_input">
              <a href="javascript:void(0);" id="eye-icon-senha">
                  <img id="eye-img-senha" src="../../image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
          </div>
        
          <label for="nova_senha">Confirmar Senha:</label>
          <div class="cadastro_redefinir_senha_2">
              <input type="password" name="nova_senha" id="nova_senha" class="base_input">
              <a href="javascript:void(0);" id="eye-icon-nova-senha">
                  <img id="eye-img-nova-senha" src="../../image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
          </div>

          <div class="cadastro_regras">
            <ul class="cadastro_lista">
              <li>Deve conter ao menos 6 caracteres;</li>
              <li>Deve conter ao menos uma letra minúscula;</li>
              <li>Deve conter ao menos um número;</li>
              <li>Não pode ser uma de suas senhas antigas.</li>
            </ul>
          </div>
        </form>
      </div>

      <div class="cadastro_botoes">
        <button class="cadastro_botao_voltar" onclick="pag('cliente/login')">
          <img src="../../image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="cadastro_botao_cadastrar" onclick="pag('cliente/perfil_cliente')">
          <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">
          Cadastrar
        </button>
      </div>
    </div>

    <script type="module" src="../../js/admin/toggle_redefinir.js"></script>
  </main>
</body>
</html>
