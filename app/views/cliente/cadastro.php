<!DOCTYPE html>
<html lang="pt-br">
<?php
  $css = ["/css/cliente/cadastro.css"];
  require_once __DIR__ . '/../../../utils/head.php';
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main>
    <div class="cadastro_quadrado">
      <div class="cadastro_container">
        <div class="cadastro_bem_vindo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png" alt="Logo">
          <h1>Cadastro de usuário</h1>
        </div>

        <form id="cadastroForm"
              action="/INA/cadastro-cliente"
              method="POST"
              class="cadastro_formulario_cadastro">

          <label for="nome">Nome:</label><br>
          <input type="text"
                 id="nome"
                 name="nome"
                 class="base_input"
                 value="<?= htmlspecialchars($old['nome'] ?? '') ?>"
          ><br>

          <label for="email">Email:</label><br>
          <input type="email"
                 id="email"
                 name="email"
                 class="base_input"
                 value="<?= htmlspecialchars($old['email'] ?? '') ?>"
          ><br>

          <label for="senha">Senha:</label>
          <div class="cadastro_redefinir_senha_2">
            <input type="password"
                   id="senha"
                   name="senha"
                   class="base_input"
            >
            <a href="javascript:void(0);" id="eye-icon-senha">
              <img class="base_icon"
                   id="eye-img-senha"
                   src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg"
                   alt="Mostrar senha"
              >
            </a>
          </div>

          <label for="confirmaSenha">Confirmar Senha:</label>
          <div class="cadastro_redefinir_senha_2">
            <input type="password"
                   id="confirmaSenha"
                   name="confirmaSenha"
                   class="base_input"
            >
            <a href="javascript:void(0);" id="eye-icon-confirma">
              <img class="base_icon"
                   id="eye-img-confirma"
                   src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg"
                   alt="Mostrar senha"
              >
            </a>
          </div>
        </form>

        <div class="cadastro_regras">
          <ul class="cadastro_lista">
            <li>Deve conter ao menos 6 caracteres;</li>
            <li>Deve conter ao menos uma letra minúscula;</li>
            <li>Deve conter ao menos um número;</li>
            <li>Não pode ser uma de suas senhas antigas.</li>
          </ul>
        </div>
      </div>

      <div class="cadastro_botoes">
        <button class="cadastro_botao_voltar"
                type="button"
                onclick="pag('cliente/login')">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
          Voltar
        </button>
        <button class="cadastro_botao_cadastrar"
                type="submit"
                form="cadastroForm">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
          Cadastrar
        </button>
      </div>
    </div>
  </main>

  <!-- Toggle senha -->
  <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>

  <script>
    // Se vier $errors do back, exibe toast
    <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $e): ?>
        window.gerarToast("<?= addslashes($e) ?>", "erro");
      <?php endforeach; ?>
    <?php endif; ?>

    // Se cadastro ok
    <?php if (!empty($_GET['cadastro']) && $_GET['cadastro']==='success'): ?>
      window.gerarToast("Cadastro realizado com sucesso!", "sucesso");
    <?php endif; ?>
  </script>
<script src="./app/components/js/toast.js"></script>
</body>
</html>
