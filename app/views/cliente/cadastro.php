<!DOCTYPE html>
<html lang="pt-br">

<?php
  $css = ["/css/cliente/cadastro.css"];
  require_once("../../../utils/head.php")
?>
<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");

  ?>
  <main>
    <div class="cadastro_quadrado">
      <div class="cadastro_container">
        <div class="cadastro_bem_vindo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png">
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
                  <img class="base_icon" id="eye-img-senha" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
          </div>
        
          <label for="nova_senha">Confirmar Senha:</label>
          <div class="cadastro_redefinir_senha_2">
              <input type="password" name="nova_senha" id="nova_senha" class="base_input">
              <a href="javascript:void(0);" id="eye-icon-nova-senha">
                  <img class="base_icon" id="eye-img-nova-senha" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
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
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="cadastro_botao_cadastrar" onclick="pag('cliente/perfil_cliente')">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Cadastrar
        </button>
      </div>
    </div>

    <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>
  </main>
</body>
</html>
