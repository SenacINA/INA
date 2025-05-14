<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Perfil - E ao Quadrado";
  $css = ["/css/vendedor/perfil_vendedor.css"];
  require_once('./utils/head.php');
  require_once("./app/models/vendedor/perfil_vendedor_model.php");
  $array = getPerfil($_SESSION['cliente_id']);
 
?>

<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <img src="<?= $PATH_PUBLIC . '/';
              echo $array[0]['banner_perfil'] ?>" alt="banner" class="perfil_vendedor_banner">

    <div class="perfil_vendedor_content_pfp">
      <div class="perfil_vendedor_pfp">
        <img src="<?= $PATH_PUBLIC . '/';
              echo $array[0]['foto_perfil'] ?>" alt="pfp_vendedor">
        <h1><?=$array[0]['nome_cliente'] ?></h1>
      </div>
      <div class="perfil_vendedor_btn_menu base_input_select">
        <form action="">
          <select class="base_input" name="" id="menu" onchange="selectPag(this.value)">
            <option selected disabled value="">Menu</option>
            <option value="vendedor/editar-perfil">Editar Perfil</option>
            <option value="vendedor/confirmar_pedido">Pedidos</option>
            <option value="vendedor/relatorio_vendas">Relatório</option>
            <option value="vendedor/editar_produto">Editar Produtos</option>
            <option value="cliente/login">Sair</option>
          </select>
        </form>
      </div>
    </div>

    <div class="perfil_vendedor_grid_principal">
      <div class="perfil_vendedor_infos_container">
        <div class="perfil_vendedor_infos_item1">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/localizacao_icon.svg">
          <p>São Paulo, São Paulo</p>
        </div>
        <div class="perfil_vendedor_infos_item2">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/loja_icon.svg">
          <p>Produtos: 8</p>
        </div>
        <div class="perfil_vendedor_infos_item3">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_membros_icon.svg">
          <p>Vendedor há: 6 Meses</p>
        </div>
        <div class="perfil_vendedor_infos_item4">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/estela_icon.svg" class="base_icon">
          <p>Avaliação geral: 4.5</p>
        </div>
      </div>
      <hr>

      <div class="info_container">
        <div class="about_container">
          <div class="about_text">
            <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/texto_icon.svg">
            <h1>Sobre nós:</h1>
          </div>
          <p>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio.
            In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis.
            Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus.
            At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae.
            At dolorum quos non omnis internos et quos quis.
          </p>
        </div>

        <div class="contatos_vendedor">
          <div class="contatos_vendedor_column">
            <div class="item_contatos_vendedor">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" class="icon_instagram_vendedor">
              <a href="#"><?php echo $array[0]['instagram_perfil']; ?></a>
            </div>

            <div class="item_contatos_vendedor">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" class="icon_facebook_vendedor">
              <a href="#"><?php echo $array[0]['facebook_perfil']; ?></a>
            </div>

            <div class="item_contatos_vendedor">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/x_twitter_icon.svg" class="icon_x_vendedor">
              <a href="#">tu dudududud udududud</a>
            </div>
          </div>

          <hr>

          <div class="contatos_vendedor_column">
            <div class="item_contatos_vendedor">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/linkedin_icon.svg" class="icon_linkedin_vendedor">
              <a href="#"><?php echo $array[0]['linkedin_perfil']; ?></a>
            </div>

            <div class="item_contatos_vendedor">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/youtube_icon.svg" class="icon_youtube_vendedor">
              <a href="#"><?php echo $array[0]['youtube_perfil']; ?></a>
            </div>

            <div class="item_contatos_vendedor">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/tiktok_icon.svg" class="icon_tiktok_vendedor">
              <a href="#"><?php echo $array[0]['tiktok_perfil']; ?></a>
            </div>
          </div>
        </div>
      </div>
      <hr>

      <div class="perfil_vendedor_grid_destaques">
        <div class="perfil_vendedor_about_container_2">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/tempo_icon.svg" alt="Icon Loja" class="base_icon">
          <h1>Destaques:</h1>
        </div>
        <div class="destaques_itens">
          <?php
          include("$PATH_COMPONENTS/php/card_produto.php");
          gerarProdutoCards(6, 1);
          ?>
        </div>
        <div class="ver_mais_container">
          <p class="ver_mais_text">Ver Mais</p>
          <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19" />
            </svg>
          </button>
        </div>
      </div>

      <div class="perfil_vendedor_grid_produtos">
        <div class="perfil_vendedor_about_container_2">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/tempo_icon.svg" alt="Icon Loja" class="base_icon">
          <h1>Produtos:</h1>
        </div>
        <div class="produtos_itens">
          <?php
          gerarProdutoCards(6, 1);
          ?>
        </div>
        <div class="ver_mais_container">
          <p class="ver_mais_text">Ver Mais</p>
          <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </main>
  <script type="module" src="<?=$PATH_COMPONENTS?>/js/toast.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      <?php if (!empty($errors)): ?>
        <?php foreach($errors as $e): ?>
          gerarToast("<?= addslashes($e) ?>", "erro");
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($success)): ?>
        gerarToast("<?= addslashes($success) ?>", "sucesso");
      <?php endif; ?>
    });
  </script>


  <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>

</html>