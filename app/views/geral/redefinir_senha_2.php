<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Redefinir Senha - E ao Quadrado";
$css = ["/css/geral/redefinir_senha_2.css"];
require_once('./utils/head.php');

// Pega o token da URL
$token = $_SESSION['redefinir_senha_token'] ?? '';
if (!$token) {
  echo '
      <div class="mensagem-erro">
        <p>Token inválido ou expirado.</p>
        <a onclick="pag(\'\')" class="botao-voltar">Voltar para a Página Inicial</a>
      </div>
    ';
  die();
}
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="redefinir_senha_2_container">
      <div class="redefinir_senha_2_main_content">
        <div class="redefinir_senha_2_bem_vindo">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/logo-eaoquadrado.png">
          <h1>Redefinir Senha</h1>
        </div>

        <form class="redefinir_senha_2_form" action="javascript:void(0);">
          <!-- Campo escondido para guardar o token -->
          <input type="hidden" name="token" id="token" value="<?= htmlspecialchars($token) ?>">

          <div class="redefinir_senha_2_input">
            <label for="senha">Nova Senha:</label>
            <div class="redefinir_senha_2">
              <input class="base_input" type="password" name="senha" id="senha">
              <a href="javascript:void(0);" id="eye-icon-senha">
                <img class="base_icon" id="eye-img-senha" src="<?= $PATH_PUBLIC ?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
            </div>
          </div>

          <div class="redefinir_senha_2_input">
            <label for="confirmaSenha">Confirmar Nova Senha:</label>
            <div class="redefinir_senha_2">
              <input class="base_input" type="password" name="confirmaSenha" id="confirmaSenha">
              <a href="javascript:void(0);" id="eye-icon-nova-senha">
                <img class="base_icon" id="eye-img-nova-senha" src="<?= $PATH_PUBLIC ?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
            </div>
          </div>
        </form>
      </div>

      <div class="redefinir_senha_2_botoes">
        <button class="redefinir_senha_2_botao_voltar" onclick="history.back()">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="redefinir_senha_2_botao_salvar" id="continuar_button">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Salvar
        </button>
      </div>
    </div>
  </main>

  <div class="popup_container" id="popup" style="display: none;">
    <div class="popup">
      <div class="text_popup">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/check_carolina_icon.svg" width="200px" height="200px">
        <p class="font_base font_bold">Redefinição de senha realizada!</p>
      </div>
      <button class="base_botao btn_blue" id="close_btn" onclick="pag('')">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/sair_branco_icon.svg" alt="">
        TELA INICIAL
      </button>
    </div>
  </div>

  <script type="module" src="<?= $PATH_PUBLIC ?>/js/admin/toggle_eyeSenha.js"></script>
  <script type='module' src="./app/components/js/toast.js"></script>

  <!-- Script para enviar senha -->
  <script>
    document.getElementById("continuar_button").addEventListener("click", async () => {
      const senha = document.getElementById("senha").value;
      const confirmar = document.getElementById("confirmaSenha").value;
      const token = document.getElementById("token").value;

      const formData = new FormData();
      formData.append("senha", senha);
      formData.append("confirmaSenha", confirmar);
      formData.append("token", token);

      try {
        const res = await fetch("redefinir-senha-api-salvar", {
          method: "POST",
          body: formData
        });

        const data = await res.json();
        if (data.success) {
          gerarToast(data.message, 'sucesso');
          setTimeout(() => {
            pag('');
          }, 3000);
        } else if (data.errors && Array.isArray(data.errors)) {
          data.errors.forEach(error => gerarToast(error, 'erro'));
        } else {
          gerarToast('Erro desconhecido ao alterar senha.', 'erro');
        }
      } catch (error) {
        gerarToast('Erro ao conectar ao servidor.', 'erro');
        console.error(error);
      }
    });
  </script>
</body>

</html>