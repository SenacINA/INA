<?php
function gerarProdutoCards($quantidade)
{
  for ($i = 0; $i < $quantidade; $i++) {
    echo "
        <div class='index_body_produto_card'>
            <div class='index_body_desconto'>
                <span>20% OFF</span>
            </div>
            <div class='index_body_imagem_produto'>
                <img src='https://placehold.co/200' alt=''>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pellentesque vel nulla quis dapibus. Donec purus purus, maximus eget sollicitudin a, maximus vitae enim. Maecenas facilisis elementum porta. Nullam sagittis, orci eu gravida consequat, turpis diam maximus lectus, in aliquam libero tortor a lorem. Donec malesuada purus at ligula consequat dignissim. Sed quis mollis sem. In laoreet metus maximus velit venenatis eleifend eu vel dui. Vivamus dignissim velit vel nisi lobortis aliquam</p>
            </div>
            <div class='index_body_estrela_valor'>
                <div class='index_body_estrela_produto'>
                    <p>★★★★★</p>
                    <h4>(12)</h4>
                </div>
                <div class='index_body_valor_produto'>
                    <p id='indexBodyValorAntigo'>R$1000</p>
                    <p id='indexBodyValorProduto'>R$800</p>
                </div>
            </div>
        </div>";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Editar Perfil - E ao Quadrado";
  $css = ["/css/vendedor/editar_perfil_vendedor.css"];
  require_once('../../../utils/head.php');
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <div class="title_mobile">
    <div class="title_text">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg">
      <h1 class="font_titulo title_main_text">Editar perfil</h1>
    </div>
  </div>
  <main class="quadrado_vendedor">
    <div class="title">
      <div class="title_text">
        <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg">
        <h1 class="font_titulo title_main_text">Editar perfil</h1>
      </div>
      <hr class="linha_title">
    </div>
    <div class="mini_perfil_vendedor">
      <img src="<?=$PATH_PUBLIC?>/image/vendedor/editar_perfil_vendedor/banner_vendedor_mini_perfil.png" alt="banner" class="banner_vendedor">
      <img src="<?=$PATH_PUBLIC?>/image/vendedor/editar_perfil_vendedor/pfp_vendedor.png" alt="pfp_vendedor" class="pfp_vendedor">
      <div class="infos_container">
        <div class="nome_vendedor">
          <h1 class="nome_vendedor">Thunder Games</h1>
        </div>
        <div class="produtos_vendedor_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/loja_icon.svg" class="icon_produtos_vendedor">
          <p class="produtos_vendedor">Produtos: 8</p>
        </div>
        <div class="avaliacao_vendedor_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/estela_icon.svg">
          <p class="avaliacao_vendedor">Avaliação geral: 4.5</p>
        </div>
        <div class="tempo_vendedor_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_membros_icon.svg">
          <p class="tempo_vendedor">Cliente há: 4 Meses</p>
        </div>
        <div class="localizacao_vendedor_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/localizacao_icon.svg">
          <p class="localizacao_vendedor">São Paulo, São Paulo</p>
        </div>
      </div>
      <hr class="separador_mini_perfil">
      <div class="about_container">
        <img src="<?=$PATH_PUBLIC?>/image/geral/icons/texto_icon.svg" class="icon_about_us">
        <h1 class="sobre_nos_vendedor">Sobre:</h1>
        <p class="text_about">Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</p>
      </div>
      <div class="contatos_container">
        <div class="contatos_vendedor">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" class="icon_instagram_vendedor">
          <a href="#" class="instagram_vendedor">my.Thunder_Games</a>
          <hr class="linha_vertical_mini">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" class="icon_facebook_vendedor">
          <a href="#" class="facebook_vendedor">Thunder_Games</a>
        </div>
      </div>
    </div>
    <div class="forms">
      <form action="" class="forms_container">
        <div class="forms_inner_container">
          <label for="nomeVendedor" class="inner">Nome:</label>
          <input type="text" name="nomeVendedor" id="nomeVendedor" class="base_input nome_vendedor_forms">
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
          <label for="email_vendedor">Email:</label>
          <input type="email" name="email_vendedor" id="email_vendedor" class="base_input">
        </div>
      </form>
      <div class="botoes_redefinir">
        <button type="button" class='base_botao btn_blue redefinir_senha_vendedor'>
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
          Redefinir senha

        </button>
        <button type="button" class="base_botao btn_blue redefinir_email_vendedor">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
          Redefinir email
        </button>
      </div>
      <div class="redes_sociais_vendedor">
        <div class="redes_text">
          <hr class="linha_vertical">
          <p class="main_text_redes">Redes Sociais:</p>
        </div>
        <div class="redes_edit">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" alt="instagram">
           <a href="#" class="link_instagram">my.Thunder_Games </a>
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" alt="facebook">
           <a href="#" class="link_facebook">Thunder_Games</a>
        </div>
        <button class="base_botao btn_blue botao_edit">
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
          <img src="<?=$PATH_PUBLIC?>/image/vendedor/editar_perfil_vendedor/pfp_vendedor.png">
        </button>
        <p class="warn">As dimensões recomendadas são: 400 x 400 pixels.</p>
      </div>
      <div class="banner_container">
        <div class="banner_text">
          <hr class="linha_vertical">
          <p class="text_banner">Imagem de Banner:</p>
        </div>
        <button class="img_container">
          <img src="<?=$PATH_PUBLIC?>/image/vendedor/editar_perfil_vendedor/banner_vendedor_mini_perfil.png" class="banner_vendedor_forms">
        </button>
        <p class="warn">As dimensões recomendadas são: 1500 x 500 pixels.</p>
      </div>
    </div>
    <div class="destaques">
        <div class="destaques_text">
          <hr class="linha_vertical">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/loja_icon.svg" class="icon_destaques_vendedor">
          <p class="destaques_main_text">Destaques</p>
        </div>
        <div class="destaques_container">
          <?php gerarProdutoCards(3); ?>
          <button class="add">
            <img src="<?=$PATH_PUBLIC?>/image/geral/icons/add_icon.svg">
          </button>
        </div>
        <p class="destaques_num">3 / 5</p>
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
  <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>
</html>