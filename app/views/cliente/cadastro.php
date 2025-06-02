<!DOCTYPE html>
<html lang="pt-br">
<?php
  $css = ["/css/cliente/Cadastro.css"];
  require_once './utils/head.php';
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main>
    <div class="cadastro_quadrado">
      <div class="cadastro_container">
        <div class="cadastro_bem_vindo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png" alt="">
          <h1>Cadastro de usuário</h1>
        </div>

        <form id="cadastroForm" class="cadastro_formulario_cadastro">

          <label for="nome">Nome:</label><br>
          <input type="text" class="base_input" name="nome" id="nome"><br>

          <label for="email">Email:</label><br>
          <input type="email" class="base_input" name="email" id="email"><br>

          <label for="senha">Senha:</label>
          <div class="cadastro_redefinir_senha_2">
            <input type="password" name="senha" id="senha" class="base_input">
            <a href="javascript:void(0);" id="eye-icon-senha">
              <img class="base_icon" id="eye-img-senha" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Mostrar Senha">
            </a>
          </div>

          <label for="confirmaSenha">Confirmar Senha:</label>
          <div class="cadastro_redefinir_senha_2">
            <input type="password" name="confirmaSenha" id="confirmaSenha" class="base_input">
            <a href="javascript:void(0);" id="eye-icon-nova-senha">
              <img class="base_icon" id="eye-img-nova-senha" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Mostrar Senha">
            </a>
          </div>

          <div class="cadastro_regras">
            <ul class="cadastro_lista">
              <li id="regra-caracteres">Deve conter ao menos 6 caracteres;</li>
              <li id="regra-minuscula">Deve conter ao menos uma letra minúscula;</li>
              <li id="regra-numero">Deve conter ao menos um número;</li>
              <li id="regra-senha-coicidir">As senhas precisam coincidirem;</li>
            </ul>
          </div>

          <div class="cadastro_botoes">
            <button type="button" class="cadastro_botao_voltar" onclick="pag('Login')">
              <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">Voltar
            </button>
            <button type="submit" class="cadastro_botao_cadastrar">
              <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">Cadastrar
            </button>
          </div>

        </form>
      </div>
    </div>
  </main>

  <!-- Scripts -->
  <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_eyeSenha.js"></script>
  <script type="module" src="<?=$PATH_COMPONENTS?>/js/Toast.js"></script>
  <script src="<?=$PATH_PUBLIC?>/js/cliente/cadastro.js"></script>

</body>
</html>
