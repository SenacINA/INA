<!DOCTYPE html>
<html lang="pt-br">

<?php
   // Parte 1: Configurações iniciais
   $css = ["/css/cliente/login.css"];
   require_once("./utils/head.php");

?>

<body>
  <!-- Até 375px -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

    
  <main>
    <div class="login_quadrado">
      <div class="login_container">
        <div class="login_bem_vindo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png">
          <h1>Login de usuário</h1>
          <h2>Bem-vindo de volta!</h2>
        </div>
        <form class="login_form_content" id="loginForm" method="post" action="/INA/login/auth">
          <div class="login_formulario_login">
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" class="base_input"><br>
          </div>

          <div class="login_redefinir_senha_2_form">
              <label for="senha">Senha:</label>
              <div class="login_redefinir_senha_2">
                <input type="password" name="senha" id="senha" class="base_input">
                <a href="javascript:void(0);" id="eye-icon-senha">
                  <img class="base_icon" id="eye-img-senha" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
                </a>
              </div>
              
              <div class="login_links_conatiner">
                <div class="login_checkbox_container">
                  <input type="checkbox" class="base_input">
                  <p>Manter Conectado</p>
                </div>
              </div>

              <div class="login_links">
                  <div class="login_fit_content" onclick="pag('redefinir-senha')">
                    <p>Redefinir Senha</p>
                  </div>        
                  <div class="login_fit_content" onclick="pag('cadastro-cliente')">
                    <p>Não tem login? Clique aqui</p>
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="login_botoes">
          <button class="login_botao_entrar" type="submit" form="loginForm">
              <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">Entrar
          </button>
        </div>
    </div>

    <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
      const params = new URLSearchParams(window.location.search);
      const error = params.get('error');
      if (!error) return;

      let mensagem;
      switch (error) {
        case 'emptyfields':
          mensagem = 'Preencha todos os campos.';
          break;
        case 'notfound':
          mensagem = 'Usuário não encontrado.';
          break;
        case 'invalidpassword':
          mensagem = 'Senha inválida.';
          break;
        default:
          mensagem = 'Ocorreu um erro inesperado.';
      }

      gerarToast(mensagem, 'erro');
    });
  
  </script>
</main>



<script type="module" src="./app/components/js/toast.js"></script>

</body>
</html>