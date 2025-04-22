<?php

// Simulando os dados de um usuário autenticado
$_SESSION['cliente'] = [
    'id' => 1, // ID do usuário
    'email' => 'joao.silva@example.com',  // Agora com o e-mail do cliente
    'senha_cliente' => 'hashed_password_example',  // Certifique-se de usar um hash válido
    'nome' => 'João Silva'
];

// Verifique se a senha foi enviada
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../../config/database.php'); // Arquivo de configuração com dados do banco
    
    // A senha recebida do formulário
    $senha_enviada = $_POST['senha_cliente'];  

    if (isset($_SESSION['cliente'])) {  // Verifica se o cliente está autenticado
        $cliente_id = $_SESSION['cliente']['id'];  // Acessa o id do cliente na sessão

        try {
            // Conectar ao banco de dados utilizando PDO
            $db = new PDO("mysql:host=localhost;dbname=e2_database", "epiliF", "1234");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparar a consulta para buscar as informações do cliente, incluindo e-mail
            $stmt = $db->prepare("SELECT id_cliente, nome_cliente, email_cliente, senha_cliente FROM cliente WHERE id_cliente = ?");
            $stmt->execute([$cliente_id]);
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($cliente) {
                // Verificar se a senha é válida
                if (password_verify($senha_enviada, $cliente['senha_cliente'])) {
                    // Retorna os dados do cliente, incluindo o e-mail
                    echo json_encode([
                        'status' => 'success',
                        'cliente' => [
                            'id' => $cliente['id_cliente'],
                            'nome' => $cliente['nome_cliente'],
                            'email' => $cliente['email_cliente']
                        ]
                    ]);  // Envia sucesso com os dados do cliente
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Senha incorreta!']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Usuário não encontrado!']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Usuário não autenticado!']);
    }
    exit();
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
          <form class="redefinir_email_1_form" id="form_redefinir_email" method="POST" autocomplete="on">
            <label for="senha-email">Senha:</label>
            <div class="redefinir_email_1_input">
              <input class="base_input" type="password" name="senha_cliente" id="senha-email" required>
              <a href="javascript:void(0);" id="eye-icon-email">
                <img class="base_icon" id="eye-img-email" src="<?=$PATH_PUBLIC?>/image/geral/icons/olho_fechado_icon.svg" alt="Olho Fechado">
              </a>
            </div>
            <a href="./redefinir_senha_1.php">Redefinir Senha</a>

            <!-- Área onde a mensagem de erro/sucesso será exibida -->
            <div id="response-message"></div>
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
        // Captura o valor do campo de senha
        var senha = document.getElementById("senha-email").value;
        
        // Envia a requisição AJAX
        var formData = new FormData();
        formData.append('senha_cliente', senha);  // Envia a senha do campo

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "redefinir_email_1.php", true);

        xhr.onload = function() {
          var response = JSON.parse(xhr.responseText);
          
          if (response.status === 'success') {
            // Caso a senha esteja correta, você pode redirecionar ou mostrar a mensagem de sucesso
            document.getElementById('response-message').style.color = 'green';
            document.getElementById('response-message').innerText = 'Senha verificada com sucesso!';
            // Redirecionar para a próxima página ou continuar no fluxo
            setTimeout(function() {
              window.location.href = "./redefinir_email_2.php";
            }, 2000); // Redireciona após 2 segundos
          } else {
            // Caso haja erro, mostra a mensagem de erro
            document.getElementById('response-message').style.color = 'red';
            document.getElementById('response-message').innerText = response.message;
          }
        };

        xhr.send(formData);
      });
    </script>
  </body>
</html>
