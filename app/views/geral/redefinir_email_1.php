<?php

require_once ('../../models/connect.php');

if (!isset($_SESSION['cliente_id'])) {
    header("Location: ../cliente/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $senha = $_POST['senha_cliente'] ?? '';
    $cliente_id = $_SESSION['cliente_id'];

    if (empty($senha)) {
        echo json_encode(['status' => 'error', 'message' => 'Senha não pode estar vazia.']);
        exit();
    }

    $db = new Database();
    $db -> connect();

    $sql = "SELECT senha_cliente FROM cliente WHERE id_cliente = :id";
    $params = [':id' => $cliente_id];
    $result = $db->executeQuery($sql, $params);

    if ($result) {
        $storedHash = $result[0]['senha_cliente'];

        if (password_verify($senha, $storedHash)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Senha incorreta.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Cliente não encontrado.']);
    }

    $db->disconnect();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $titulo = "Redefinir E-mail - E ao Quadrado";
    $css = ["/css/geral/redefinir_email_1.css"];
    require_once('./utils/head.php');
  ?>
  <body>
    <?php 
      include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>

    <main>
      <div class="redefinir_email_1_container">
        <div class="redefinir_email_1_main_content">
          <div class="redefinir_email_1_bem_vindo">
            <img src="<?=$PATH_PUBLIC?>/image/geral/logo-eaoquadrado.png">
            <h1>Redefinir E-mail</h1>
          </div>

          <!-- Formulário de redefinir email -->
          <form class="redefinir_email_1_form" id="form_redefinir_email" method="POST" autocomplete="on">
            <label for="senha-email">Senha:</label>
            <div class="redefinir_email_1_input">
              <input class="base_input" type="password" name="senha_cliente" id="senha-email" required>
              <a href="javascript:void(0);" id="eye-icon-email">
                <img class="base_icon" id="eye-img-email" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
            </div>
            <a href="./redefinir_senha_1.php">Redefinir Senha</a>

            <div id="response-message"></div>
          </form>
        </div>

        <div class="redefinir_email_1_botoes">
          <button class="redefinir_email_1_botao_voltar" onclick="history.back()">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
            Voltar
          </button>

          <button type="button" id="avancar-btn" class="redefinir_email_1_botao_avancar">
            <span id="btn-text">
              <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="Ícone de avançar">
              <span>Avançar</span>
            </span>
          </button>
        </div>
      </div>
    </main>

    <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>

    <script>
      document.getElementById("avancar-btn").addEventListener("click", function () {
      const senha = document.getElementById("senha-email").value;
      const responseBox = document.getElementById("response-message");

      const formData = new FormData();
      formData.append("senha_cliente", senha);

      fetch("redefinir_email_1.php", {
        method: "POST",
        body: formData
      })
        .then(res => res.json())
        .then(response => {
          if (response.status === "success") {
            responseBox.style.color = "green";
            responseBox.innerText = "Senha verificada com sucesso!";
            setTimeout(() => {
              window.location.href = "redefinir_email_2.php";
            }, 2000);
          } else {
            responseBox.style.color = "red";
            responseBox.innerText = response.message;
          }
        })
        .catch(() => {
          responseBox.style.color = "red";
          responseBox.innerText = "Erro inesperado ao processar.";
        });
      });
    </script>
  </body>
</html>