<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao quadrado</title>
  <link rel="stylesheet" href="../../css/cliente/editar_perfil.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- fazer responsividade -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="editar_perfil_container">
      <div class="editar_perfil_view">
        <img src="../../image/cliente/editar_perfil/mini_banner_perfil_cliente.png" class="editar_perfil_banner" alt="Banner de perfil do cliente">
        <img src="../../image/cliente/editar_perfil/perfil_usuario.svg" class="editar_perfil_pfp" alt="Foto de perfil do cliente">
        <p class="editar_perfil_nome_cliente">Cliente10</p>
        <div class="editar_perfil_detalhes">
          <img src="../../image/cliente/editar_perfil/icon_ativo.svg" class="editar_perfil_ico_ativo" alt="Ícone de status ativo">
          <p class="editar_perfil_cliente_ativo">Ativo há: Agora</p>
          <img src="../../image/cliente/editar_perfil/icon_users_anonimo.svg" class="editar_perfil_ico_tempo" alt="Ícone de tempo">
          <p class="editar_perfil_cliente_tempo">Cliente há: 4 meses</p>
          <img src="../../image/cliente/editar_perfil/icon_localizacao.svg" class="editar_perfil_ico_localizacao" alt="Ícone de localização">
          <p class="editar_perfil_cliente_localizacao">São Paulo, São Paulo</p>
        </div>
        <div class="editar_perfil_redes_sociais_mini">
          <p class="editar_perfil_redes_sociais_mini_text">Redes Sociais:</p>
          <div class="editar_perfil_redes2">
            <img src="../../image/geral/icone_instagram.svg" class="editar_perfil_ico" alt="Ícone do Instagram"><span class="editar_perfil_text">soul_cliente10</span>
            <img src="../../image/geral/icone_facebook.svg" class="editar_perfil_ico2" alt="Ícone do Facebook"><span class="editar_perfil_text2">cliente10</span>
          </div>
        </div>
      </div>
      <div class="editar_perfil_edicao">
        <form action="">
          <label for="nome">Nome:</label><br>
          <input type="text" id="nome" class="editar_perfil_font_descricao base_input"><br>
          <label for="localizacao">Localização:</label><br>
          <input type="text" id="localizacao" class="editar_perfil_font_descricao base_input"><br>
          <label for="email">Email:</label><br>
          <input type="text" id="email" class="editar_perfil_font_descricao base_input"><br>
          <label for="telefone">Telefone:</label><br>
          <input type="tel" id="telefone" class="editar_perfil_font_descricao base_input"><br>
        </form>
        <div class="editar_perfil_botoes">
          <button class="editar_perfil_redefinir_senha" onclick="pag('geral/redefinir_senha_1')">Redefinir senha</button>
          <button class="editar_perfil_redefinir_email" onclick="pag('geral/redefinir_email_1')">Redefinir email</button>
        </div>
        <div class="editar_perfil_redes_sociais">
          <p class="editar_perfil_title_redes">Redes Sociais:</p>
          <div class="editar_perfil_redes">
            <img src="../../image/geral/icone_instagram.svg" class="editar_perfil_ico" alt="Instagram"><span class="editar_perfil_text">soul_cliente10</span>
            <img src="../../image/geral/icone_facebook.svg" class="editar_perfil_ico2" alt="Facebook"><span class="editar_perfil_text2">cliente10</span>
          </div>
          <div class="editar_perfil_editar_redes">
            <button class="editar_perfil_edit">
              editar
            </button>
          </div> 
        </div>
      </div>
      <div class="editar_perfil_upload">
        <form action="">
          <div>
            <label for="foto_perfil">Imagem de perfil:</label><br>
            <input type="file" name="foto_perfil" id="foto_perfil" class="base_input"><br>
            <img src="../../image/cliente/editar_perfil/perfil_usuario.svg" alt=""><br>
            <p>As dimensões recomendadas são: 400 x 400 pixels.</p>
          </div>
          <div>
            <label for="banner_perfil">Imagem de banner:</label><br>
            <input type="file" name="banner_perfil" id="banner_perfil" class="base_input"><br>
            <img src="../../image/cliente/editar_perfil/mini_banner_perfil_cliente.png" width="274px" height="118px"><br>
            <p>As dimensões recomendadas são: 1500 x 500 pixels.</p>
          </div>
        </form>
      </div>
    </div>
    
  </main>

  <footer><p>© 2024 Senac Hub Academy MS CG e E ao Quadrado.com. Todos os direitos reservados.</p></footer>
</body>
</html>
