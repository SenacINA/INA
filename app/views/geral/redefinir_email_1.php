<?php

// Simulando os dados de um usuário autenticado
$_SESSION['usuario'] = [
    'id' => 1, // ID do usuário (por exemplo, ID 1)
    'email' => 'joao.silva@example.com',
    'nome' => 'João Silva'
];

// Verifique se a senha foi enviada
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecte-se ao banco de dados
    require_once('../../../config/database.php'); // Arquivo de configuração com dados do banco
    
    // Recebe a senha enviada pelo usuário
    $senha_enviada = $_POST['senha'];

    // Verifique se a sessão do usuário está ativa
    if (isset($_SESSION['usuario'])) {
        $usuario_id = $_SESSION['usuario']['id'];

        try {
            // Conectar ao banco de dados utilizando PDO
            $db = new PDO("mysql:host=localhost;dbname=e2_database", "epiliF", "1234");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Debug: Mostrar que a conexão foi bem-sucedida
            error_log("Conexão com o banco de dados estabelecida com sucesso.");

            // Preparar a consulta para buscar as informações do usuário
            $stmt = $db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
            $stmt->execute([$usuario_id]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Debug: Verificar se o usuário foi encontrado
            error_log("Usuário encontrado: " . print_r($usuario, true));

            // Verifique se o usuário existe e se a senha é válida
            if ($usuario && password_verify($senha_enviada, $usuario['senha_cliente'])) {
                // Se a senha for correta, permite que o usuário continue
                $_SESSION['sucesso'] = "Senha verificada com sucesso! Redirecionando para a próxima etapa.";
                header('Location: ./redefinir_email_2.php');  // Redireciona para a próxima etapa de redefinição de e-mail
                exit();
            } else {
                // Caso a senha seja inválida, exibe uma mensagem de erro
                $_SESSION['erro_senha'] = "Senha incorreta!";
                error_log("Senha incorreta para o usuário ID: " . $usuario_id);
                header('Location: ./redefinir_email_1.php');  // Redireciona de volta à mesma página
                exit();
            }
        } catch (PDOException $e) {
            // Se ocorrer algum erro na conexão ou consulta, exibe uma mensagem de erro
            $_SESSION['erro_senha'] = "Erro ao conectar ao banco de dados: " . $e->getMessage();
            error_log("Erro ao conectar ao banco de dados: " . $e->getMessage());
            header('Location: ./redefinir_email_1.php');
            exit();
        }
    } else {
        // Caso o usuário não esteja autenticado
        $_SESSION['erro_senha'] = "Usuário não autenticado!";
        error_log("Tentativa de acesso sem autenticação.");
        header('Location: ../cliente/login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $titulo = "Redefinir E-mail - E ao Quadrado";
    $css = ["/css/geral/redefinir_email_1.css"];
    require_once('../../../utils/head.php');
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
          <form class="redefinir_email_1_form" action="redefinir_email_1.php" method="POST" id="form_redefinir_email" autocomplete="on">
            <label for="senha-email">Senha:</label>
            <div class="redefinir_email_1_input">
              <input class="base_input" type="password" name="senha" id="senha-email" required>
              <a href="javascript:void(0);" id="eye-icon-email">
                <img class="base_icon" id="eye-img-email" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
            </div>
            <a href="./redefinir_senha_1.php">Redefinir Senha</a>
            
            <!-- Exibindo a mensagem de erro, se houver -->
            <?php if (isset($_SESSION['erro_senha'])): ?>
                <p style="color: red;"><?= $_SESSION['erro_senha']; ?></p>
                <script>
                    // Exibe o erro no console
                    console.log("Erro de senha: <?= $_SESSION['erro_senha']; ?>");
                </script>
                <?php unset($_SESSION['erro_senha']); // Limpa a mensagem de erro após exibi-la ?>
            <?php endif; ?>
          </form>
        </div>

        <div class="redefinir_email_1_botoes">
          <button class="redefinir_email_1_botao_voltar" onclick="history.back()">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_branco_icon.svg" alt="">
            Voltar
          </button>

          <button type="button" id="avancar-btn" class="redefinir_email_1_botao_avancar">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
            Avançar
          </button>
        </div>
      </div>
    </main>

    <script type="module" src="<?=$PATH_PUBLIC?>/js/admin/toggle_redefinir.js"></script>

    <script>
      document.getElementById("avancar-btn").addEventListener("click", function() {
        document.getElementById("form_redefinir_email").submit();
      });
    </script>
  </body>
</html>
