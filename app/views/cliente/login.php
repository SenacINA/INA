<!DOCTYPE html>
<html lang="pt-br">

<?php
   // Parte 1: Configurações iniciais
   $css = ["/css/cliente/login.css"];
   require_once("./utils/head.php");

   
   // Parte 2: Sessão (deve ser iniciada ANTES de qualquer output)
   if (isset($_SESSION['erro_login'])) {
       echo '<div class="erro">' . $_SESSION['erro_login'] . '</div>';
       unset($_SESSION['erro_login']);
   }
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
        <form class="login_form_content" id="loginForm" method="post" action="auth">
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
                  <div class="login_fit_content" onclick="pag('geral/redefinir_senha_1')">
                    <p><u>Redefinir Senha</u></p>
                  </div>        
                  <div class="login_fit_content" >
                    <p>Não tem login? <u onclick="pag('cadastro-cliente')">Clique aqui</u></p>
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
  </main>

  <?php if (isset($_GET['error'])): ?>
    <script>
        <?php
        switch ($_GET['error']) {
            case 'emptyfields':
                echo "console.error('Erro: Campos de email ou senha vazios');";
                break;
            case 'invalidpassword':
                echo "console.error('Erro: Senha inválida');";
                break;
            case 'notfound':
                echo "console.error('Erro: Usuário não encontrado');";
                break;
        }
        ?>
    </script>
<?php endif; ?>

</body>
</html>