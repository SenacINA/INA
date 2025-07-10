<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/PerfilCliente.css"];
require_once("./utils/head.php");
require_once("./app/models/cliente/PerfilClienteModel.php");
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <img src="<?= $PATH_PUBLIC . $user['banner_perfil'] ?>" alt="banner" class="perfil_cliente_banner">
    <div class="perfil_cliente_content_pfp">
      <div class="perfil_cliente_pfp">
        <img src="<?= $PATH_PUBLIC . $user['foto_perfil'] ?>" class='perfil_cliente_pfp_pic' alt="pfp_cliente">
        <h1><?= htmlspecialchars($user['nome_cliente'] ?? 'Cliente Anônimo') ?></h1>
        <div class="perfil_cliente_infos_container">
          <div class="perfil_cliente_infos_item1">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/localizacao_icon.svg">
            <p><?= htmlspecialchars($user['localizacao'] ?? 'Localização não definida') ?></p>
          </div>
          <div class="perfil_cliente_infos_item2">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/balao_exclamacao_icon.svg">
            <p>Ativo há: Agora</p>
          </div>
          <div class="perfil_cliente_infos_item3">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_membros_icon.svg">
            <p>
              Cliente há <?=$user['tempo']?>
            </p>
          </div>
          <div class="perfil_cliente_contatos_cliente">
            <?php if (!empty($user['instagram_perfil'])): ?>
              <div class='redes_div'>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/instagram_icon.svg" alt="instagram" class='base_icon'>
                <a href="https://instagram.com/<?= htmlspecialchars($user['instagram_perfil']) ?>">@<?= htmlspecialchars($user['instagram_perfil']) ?></a>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['facebook_perfil'])): ?>
              <div class='redes_div'>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/facebook_icon.svg" alt="facebook" class='base_icon'>
                <a href="https://facebook.com/<?= htmlspecialchars($user['facebook_perfil']) ?>"><?= htmlspecialchars($user['facebook_perfil']) ?></a>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['x_perfil'])): ?>
              <div class='redes_div'>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/x_twitter_icon.svg" alt="x.com" class='base_icon'>
                <a href="https://x.com/<?= htmlspecialchars($user['x_perfil']) ?>">@<?= htmlspecialchars($user['x_perfil']) ?></a>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['linkedin_perfil'])): ?>
              <div class='redes_div'>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/linkedin_icon.svg" alt="linkedin" class='base_icon'>
                <a href="https://linkedin.com/in/<?= htmlspecialchars($user['linkedin_perfil']) ?>"><?= htmlspecialchars($user['linkedin_perfil']) ?></a>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['youtube_perfil'])): ?>
              <div class='redes_div'>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/youtube_icon.svg" alt="youtube" class='base_icon'>
                <a href="https://youtube.com/@<?= htmlspecialchars($user['youtube_perfil']) ?>">@<?= htmlspecialchars($user['youtube_perfil']) ?></a>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['tiktok_perfil'])): ?>
              <div class='redes_div'>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/tiktok_icon.svg" alt="tiktok" class='base_icon'>
                <a href="https://tiktok.com/@<?= htmlspecialchars($user['tiktok_perfil']) ?>">@<?= htmlspecialchars($user['tiktok_perfil']) ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="perfil_cliente_btn_menu base_input_select">
        <form action="">
          <select class="base_input" name="" id="menu" onchange="selectPag(this.value)">
            <option selected disabled value="">Menu</option>
            <option value="EditarPerfil">Editar Perfil</option>
            <option value="CadastroVendedorInfo">Cadastro de vendedor</option>
            <!-- <option value="RedefinirSenha">Redefinir Senha</option> -->
            <option value="Logout">Sair</option>
          </select>
        </form>
      </div>
    </div>

    <div class="perfil_cliente_grid_principal">

      <hr>
      <div class="perfil_cliente_grid_historico">
        <div class="perfil_cliente_about_container_2">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/tempo_icon.svg" alt="Icon Loja">
          <h1>Histórico:</h1>
        </div>
        <div id="historico_cliente" class="historico_itens">
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
  <script type="module" src="<?= $PATH_PUBLIC ?>/js/cliente/perfilCardsCliente.js"></script>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
  <script src='<?= $PATH_PUBLIC ?>/js/geral/card.js'></script>
</body>

</html>