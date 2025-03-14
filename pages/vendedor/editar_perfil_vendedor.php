<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/vendedor/editar_perfil_vendedor.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body> 
  <!-- fazer responsividade -->
  <!-- arruamar o nome das class -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main class="quadrado_vendedor">
    <div class="mini_perfil_vendedor">
      <img src="../../image/vendedor/editar_perfil/banner_vendedor_mini_perfil.png" alt="banner" class="banner_vendedor">
      <img src="../../image/vendedor/editar_perfil/pfp_vendedor.png" alt="pfp_vendedor" class="pfp_vendedor">
      <div class="infos_container">
        <div class="nome_vendedor">
          <h1 class="nome_vendedor">THUNDER GAMES</h1>
        </div>
        <div class="produtos_vendedor_container">
          <img src="../../image/vendedor/editar_perfil/icon_produtos_vendedor.svg" class="icon_produtos_vendedor">
          <p class="produtos_vendedor">Produtos: 8</p>
        </div>
        <div class="avaliacao_vendedor_container">
          <img src="../../image/vendedor/editar_perfil/icon_avaliacao_vendedor.svg">
          <p class="avaliacao_vendedor">Avaliação geral: 4.5</p>
        </div>
        <div class="tempo_vendedor_container">
          <img src="../../image/vendedor/editar_perfil/icon_tempo_vendedor.svg">
          <p class="tempo_vendedor">Vendedor há: 4 Meses</p>
        </div>
        <div class="localizacao_vendedor_container">
          <img src="../../image/vendedor/editar_perfil/icon_localizacao_vendedor.svg">
          <p class="localizacao_vendedor">São Paulo, São Paulo</p>
        </div>
      </div>
      <hr class="separador_mini_perfil">
      <div class="about_container">
        <img src="../../image/vendedor/editar_perfil/icon_about_us.svg" class="icon_about_us">
        <h1 class="sobre_nos_vendedor">Sobre nós:</h1>
        <p class="text_about">Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</p>
      </div>
      <div class="contatos_container">
        <img src="../../image/vendedor/editar_perfil/icon_contatos_vendedor.svg" class="icon_contatos_vendedor">
        <h1 class="main_text_contatos">Contatos</h1>
        <div class="contatos_vendedor">
          <img src="../../image/vendedor/editar_perfil/icon_instagram_vendedor.svg" class="icon_instagram_vendedor">
          <a href="#" class="instagram_vendedor">my.thudergames</a>
          <img src="../../image/vendedor/editar_perfil/icon_facebook_vendedor.svg" class="icon_facebook_vendedor">
          <a href="#" class="facebook_vendedor">thundergames</a>
          <img src="../../image/vendedor/editar_perfil/icon_x_vendedor.png" class="icon_x_vendedor">
          <a href="#" class="x_vendedor">thundergames_</a>
          <img src="../../image/vendedor/editar_perfil/icon_linkedin_vendedor.png" class="icon_linkedin_vendedor">
          <a href="#" class="linkedin_vendedor">thundergames</a>
          <img src="../../image/vendedor/editar_perfil/icon_youtube_vendedor.png" class="icon_youtube_vendedor">
          <a href="#" class="youtube_vendedor">Thunder Games</a>
          <img src="../../image/vendedor/editar_perfil/icon_tiktok_vendedor.png" class="icon_tiktok_vendedor">
          <a href="#" class="tiktok_vendedor">thunder.games</a>
        </div>
      </div>
    </div>
    <div class="forms">
      <form action="" class="forms_container">
        <div class="forms_inner_container">
          <label for="nomeVendedor" class="inner">Nome:</label>
          <input type="text" name="nomeVendedor" id="nomeVendedor" class="nome_vendedor_forms" placeholder="THUNDER GAMES">
        </div>
        <div class="forms_inner_container">
          <label for="descricao">Descrição:</label>
          <textarea name="descricao" id="descricao" cols="90" rows="10"></textarea>
        </div>
        <div class="forms_inner_container">
          <label for="localizacaoVendedor">Localização:</label>
          <input type="text" name="localizacaoVendedor" id="localizacaoVendedor">
        </div>
        <div class="forms_inner_container">
          <label for="email_vendedor">Email:</label>
          <input type="text" name="email_vendedor" id="email_vendedor">
        </div>
      </form>
      <div class="botoes_redefinir">
        <button type="button" class='redefinir_senha_vendedor'>Redefinir senha</button>
        <button type="button" class="redefinir_email_vendedor">Redefinir email</button>
      </div>
      <div class="redes_sociais_vendedor">
        <p class="main_text_redes">Redes Sociais:</p>
        <div class="redes_edit">
          <img src="../../image/vendedor/editar_perfil/icon_instagram_vendedor.svg" alt="instagram"> <a href="#" class="link_instagram">my.thudergames </a>
          <img src="../../image/vendedor/editar_perfil/icon_facebook_vendedor.svg" alt="facebook"> <a href="#" class="link_facebook">thundergames</a>
        </div>
        <button class="botao_edit">Editar</button>
      </div>
    </div>
    <div class="edit_foto">
      <div class="foto_container">
        <p class="text_pfp">Imagem de Perfil:</p>
        <input type="file" name="foto_vendedor" id="fotoVendedor" class="btn_foto" />
        <img src="../../image/vendedor/editar_perfil/pfp_vendedor.png" alt="">
        <p class="warn">As dimensões recomendadas são: 400 x 400 pixels.</p>
      </div>
      <div class="banner_container">
        <p class="text_banner">Imagem de Banner:</p>
        <input type="file" name="foto_vendedor" id="fotoVendedor" class="btn_banner" />
        <img src="../../image/vendedor/editar_perfil/banner_vendedor_mini_perfil.png" class="banner_vendedor_forms" alt="">
        <p class="warn">As dimensões recomendadas são: 1500 x 500 pixels.</p>
      </div>
    </div>
  </main>
  <footer>
    <img src="../../image/cliente/footer/img_footer_placeholder.png">
  </footer>
</body>

</html>