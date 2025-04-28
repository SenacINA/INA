<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/perfil_cliente.css"];
require_once("./utils/head.php");
require_once("./app/models/cliente/perfil_cliente_model.php");
$array = getPerfil($_SESSION['cliente_id']);
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <img src="<?= $PATH_PUBLIC;
              echo $array[0]['banner_perfil'] ?>" alt="banner" class="perfil_cliente_banner">

    <div class="perfil_cliente_content_pfp">
      <div class="perfil_cliente_pfp">
        <img src="<?= $PATH_PUBLIC;
                  echo $array[0]['foto_perfil'] ?>" alt="pfp_cliente">
        <h1><?=$array[0]['nome_cliente'] ?></h1>
      </div>
      <div class="perfil_cliente_btn_menu base_input_select">
        <form action="">
          <select class="base_input" name="" id="menu" onchange="selectPag(this.value)">
            <option selected disabled value="">Menu</option>
            <option value="cliente/editar_perfil_cliente">Editar Perfil</option>
            <option value="vendedor/cadastro_vendedor_1">Cadastro de vendedor</option>
            <option value="cliente/login">Sair</option>
          </select>
        </form>
      </div>
    </div>

    <div class="perfil_cliente_grid_principal">
      <div class="perfil_cliente_infos_container">
        <div class="perfil_cliente_infos_item1">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/localizacao_icon.svg">
          <p>São Paulo, São Paulo</p>
        </div>
        <div class="perfil_cliente_infos_item2">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/balao_exclamacao_icon.svg">
          <p>Ativo há: Agora</p>
        </div>
        <div class="perfil_cliente_infos_item3">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_membros_icon.svg">
          <p>Cliente há: 6 Meses</p>
        </div>
        <div class="perfil_cliente_contatos_cliente">
          <div class="instagram_cliente">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/instagram_icon.svg" class="perfil_cliente_icon_instagram_cliente">
            <a href="#" class="perfil_cliente_instagram_cliente"><?php echo $array[0]['instagram_perfil']; ?></a>
          </div>
          <hr class="linha_vertical">
          <div class="facebook_cliente">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/facebook_icon.svg" class="perfil_cliente_icon_facebook_cliente">
            <a href="#" class="perfil_cliente_facebook_cliente"><?php echo $array[0]['facebook_perfil']; ?></a>
          </div>
        </div>
      </div>
      <hr>
      <div class="perfil_cliente_grid_historico">
        <div class="perfil_cliente_about_container_2">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/tempo_icon.svg" alt="Icon Loja">
          <h1>Histórico:</h1>
        </div>
        <div class="historico_itens">
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
    </div>
  </main>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>

</body>

</html>