<!DOCTYPE html>
<html lang="pt-br">

<?php
  $css = ["/css/cliente/editar_perfil_cliente.css"];
  require_once("./utils/head.php")
?>

<body>
  <!-- Atá 375px -->  

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <div class="title_mobile">
    <div class="title_text">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg">
      <h1 class="font_titulo title_main_text">Editar perfil</h1>
    </div>
  </div>
  <main class="quadrado_cliente">
    <div class="title">
      <div class="title_text">
        <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg">
        <h1 class="font_titulo title_main_text">Editar perfil</h1>
      </div>
      <hr class="linha_title">
    </div>
    <div class="mini_perfil_cliente">
      <img src="<?=$PATH_PUBLIC?>/image/cliente/editar_perfil/mini_banner_perfil_cliente.png" alt="banner" class="banner_cliente">
      <img src="<?=$PATH_PUBLIC?>/image/cliente/editar_perfil/perfil_usuario.svg" alt="pfp_cliente" class="pfp_cliente">
      <div class="infos_container">
        <div class="nome_cliente">
          <h1 class="nome_cliente">Cliente10</h1>
        </div>
        <div class="produtos_cliente_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/loja_icon.svg" class="icon_produtos_cliente">
          <p class="produtos_cliente">Produtos: 8</p>
        </div>
        <div class="avaliacao_cliente_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/estela_icon.svg">
          <p class="avaliacao_cliente">Avaliação geral: 4.5</p>
        </div>
        <div class="tempo_cliente_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_membros_icon.svg">
          <p class="tempo_cliente">Cliente há: 4 Meses</p>
        </div>
        <div class="localizacao_cliente_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/localizacao_icon.svg">
          <p class="localizacao_cliente">São Paulo, São Paulo</p>
        </div>
      </div>
      <hr class="separador_mini_perfil">
      <div class="about_container">
        <img src="<?=$PATH_PUBLIC?>/image/geral/icons/texto_icon.svg" class="icon_about_us">
        <h1 class="sobre_nos_cliente">Sobre:</h1>
        <p class="text_about">Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</p>
      </div>
      <div class="contatos_container">
        <div class="contatos_cliente">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" class="icon_instagram_cliente">
          <a href="#" class="instagram_cliente">my.Cliente10</a>
          <hr class="linha_vertical_mini">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" class="icon_facebook_cliente">
          <a href="#" class="facebook_cliente">Cliente10</a>
        </div>
      </div>
    </div>
    <div class="forms">
      <form action="" class="forms_container">
        <div class="forms_inner_container">
          <label for="nomeVendedor" class="inner">Nome:</label>
          <input type="text" name="nomeVendedor" id="nomeVendedor" class="base_input nome_cliente_forms">
        </div>
        <div class="forms_inner_container">
          <label for="descricao">Descrição:</label>
          <textarea name="descricao" id="descricao" cols="90" rows="10" class="base_input"></textarea>
        </div>
        <div class="forms_inner_container">
          <label for="localizacaoVendedor">Localização:</label>
          <input type="text" name="localizacaoVendedor" id="localizacaoVendedor" class="base_input">
        </div>
        <div class="forms_inner_container">
          <label for="email_cliente">Email:</label>
          <input type="email" name="email_cliente" id="email_cliente" class="base_input">
        </div>
      </form>
      <div class="botoes_redefinir">
        <button type="button" onclick="pag('redefinir-senha')" class='base_botao btn_blue redefinir_senha_cliente'>
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
          Redefinir senha
        </button>

        <button type="button" onclick="pag('redefinir-email')" class="base_botao btn_blue redefinir_email_cliente">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
          Redefinir email
        </button>
      </div>
      <div class="redes_sociais_cliente">
        <div class="redes_text">
          <hr class="linha_vertical">
          <p class="main_text_redes">Redes Sociais:</p>
        </div>
        <div class="redes_edit">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" alt="instagram"> <a href="#" class="link_instagram">my.Cliente10 </a>
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" alt="facebook"> <a href="#" class="link_facebook">Cliente10</a>
        </div>
        <button class="base_botao btn_blue botao_edit" id="botao_editar">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/caneta_branca_icon.svg" alt="">
          Editar
        </button>
      </div>
    </div>
    <div class="edit_foto">
      <div class="foto_container">
        <div class="foto_text">
          <hr class="linha_vertical">
          <p class="text_pfp">Imagem de Perfil:</p>
        </div>
        <button class="img_container">
          <img src="<?=$PATH_PUBLIC?>/image/cliente/editar_perfil/perfil_usuario.svg">
        </button>
        <p class="warn">As dimensões recomendadas são: 400 x 400 pixels.</p>
      </div>
      <div class="banner_container">
        <div class="banner_text">
          <hr class="linha_vertical">
          <p class="text_banner">Imagem de Banner:</p>
        </div>
        <button class="img_container">
          <img src="<?=$PATH_PUBLIC?>/image/cliente/editar_perfil/mini_banner_perfil_cliente.png" class="banner_cliente_forms">
        </button>
        <p class="warn">As dimensões recomendadas são: 1500 x 500 pixels.</p>
      </div>
    </div>
    <div class="botoes">
      <button class="base_botao btn_blue salvar">
        <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg">Salvar
      </button>
      <button class="base_botao btn_outline_red cancelar">
        <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_vermelho_icon.svg">Cancelar
      </button>
    </div>
  </main>
  <div class="popup_container" id="popup">
    <div class="popup">
      <div class="text_popup">
        <hr class="linha_vertical">
        <h1 class="font_titulo">Redes Sociais</h1>
        <div>
          <button class="fechar" id="close_btn">X</button>
        </div>
      </div>
      <form action="#" method="get" class="forms_redes_sociais">
        <div>
          <label for="instagram"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg">Instagram *</label>
          <input class="base_input" type="text" name="instagram" placeholder="my.Cliente10">
          <label for="facebook"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg">Facebook *</label>
          <input class="base_input" type="text" name="facebook" placeholder="Cliente10">
          <label for="x"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/x_twitter_icon.svg">X.com *</label>
          <input class="base_input" type="text" name="x">
        </div>
        <div>
          <label for="linkedin"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/linkedin_icon.svg">Linkedin *</label>
          <input class="base_input" type="text" name="linkedin">
          <label for="youtube"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/youtube_icon.svg">Youtube *</label>
          <input class="base_input" type="text" name="youtube">
          <label for="tiktok"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/tiktok_icon.svg">Tiktok *</label>
          <input class="base_input" type="text" name="tiktok">
        </div>
        <p>* Opcional</p>
        <button class="base_botao btn_blue"><img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg">Salvar</button>
      </form>
    </div>
  </div>
  <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
<script src="<?=$PATH_PUBLIC?>/js/cliente/editar_perfil_cliente.js"></script>
</body>

</html>