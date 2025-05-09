<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/perfil_cliente.css"];
require_once("./utils/head.php");
require_once("./app/models/cliente/perfil_cliente_model.php");
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <img src="<?= $PATH_PUBLIC . $user['banner_perfil'] ?>" alt="banner" class="perfil_cliente_banner">
    <div class="perfil_cliente_content_pfp">
      <div class="perfil_cliente_pfp">
        <img src="<?= $PATH_PUBLIC . $user['foto_perfil'] ?>" alt="pfp_cliente">
        <h1><?= htmlspecialchars($user['nome_cliente'] ?? 'Cliente Anônimo') ?></h1>
      </div>
      <div class="perfil_cliente_btn_menu base_input_select">
        <form action="">
          <select class="base_input" name="" id="menu" onchange="selectPag(this.value)">
            <option selected disabled value="">Menu</option>
            <option value="editar-perfil">Editar Perfil</option>
            <option value="cadastro-vendedor">Cadastro de vendedor</option>
            <option value="login-cliente">Sair</option>
          </select>
        </form>
      </div>
    </div>

    <div class="perfil_cliente_grid_principal">
      <div class="perfil_cliente_infos_container">
        <div class="perfil_cliente_infos_item1">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/localizacao_icon.svg">
          <p><?= htmlspecialchars($user['localizacao'] ?? 'Localização não informada') ?></p>
        </div>
        <div class="perfil_cliente_infos_item2">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/balao_exclamacao_icon.svg">
          <p>Ativo há: Agora</p>
        </div>
        <div class="perfil_cliente_infos_item3">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_membros_icon.svg">
          <p>
            <?php
                $dataRegistro = $user['data_registro_cliente'];
                $diasCliente = (strtotime(date('Y-m-d')) - strtotime($dataRegistro)) / 86400;
                echo "Cliente há: " . round($diasCliente) . " Dias";
            ?>  
          </p>
        </div>
        <div class="perfil_cliente_contatos_cliente">
          <div class="instagram_cliente">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/instagram_icon.svg">
            <a href="#" class="perfil_cliente_instagram_cliente"><?= htmlspecialchars($cliente['instagram_perfil'] ?? '@instagram') ?></a>
          </div>
          <hr class="linha_vertical">
          <div class="facebook_cliente">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/facebook_icon.svg">
            <a href="#" class="perfil_cliente_facebook_cliente"><?= htmlspecialchars($cliente['facebook_perfil'] ?? 'facebook.com') ?></a>
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
