<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Perfil - E ao Quadrado";
  $css = ["/css/vendedor/PerfilVendedor.css"];
  require_once('./utils/head.php');
  require_once("./app/models/vendedor/PerfilVendedorModel.php");
 
?>

<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <img class='perfil_vendedor_banner' src="<?= $PATH_PUBLIC . $user['banner_perfil'] ?>">

    <div class="perfil_vendedor_content_pfp">
      <div class="perfil_vendedor_pfp">
        <img class='pfp_img' src="<?= $PATH_PUBLIC . $user['foto_perfil'] ?>" alt="pfp_vendedor">
        <h1><?= $vendedor['nome_fantasia'] ?></h1>
        <div class="perfil_vendedor_infos_container">
          <div class="perfil_vendedor_infos_item1">
            <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/localizacao_icon.svg">
            <p><?= htmlspecialchars($user['localizacao'] ?? 'Localização não definida') ?></p>
          </div>
          <div class="perfil_vendedor_infos_item2">
            <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/loja_icon.svg">
            <p>Produtos: <?=$vendedor['quantidadeProdutos']?></p>
          </div>
          <div class="perfil_vendedor_infos_item3">
            <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_membros_icon.svg">
            <p>Vendedor há: <?=$vendedor['tempo']?></p>
          </div>
          <div class="perfil_vendedor_infos_item4">
            <img src="<?=$PATH_PUBLIC?>/image/geral/icons/estela_icon.svg" class="base_icon">
            <p>Avaliação geral: <?= $vendedor['mediaEstrelas']?></p>
          </div>
        </div>
      </div>
      <div class="perfil_vendedor_btn_menu base_input_select">
        <form action="">
          <select class="base_input" name="" id="menu" onchange="selectPag(this.value)">
            <option selected disabled value="">Menu</option>
            <option value="EditarPerfil">Editar Perfil</option>
            <option value="ConfirmarPedido">Pedidos</option>
            <option value="RelatorioVendas">Relatório</option>
            <option value="ProdutoEditar">Editar Produtos</option>
            <option value="Logout">Sair</option>
          </select>
        </form>
      </div>
    </div>

    <div class="perfil_vendedor_grid_principal">
      
      <hr>

      <div class="info_container">
        <div class="about_container">
          <div class="about_text">
            <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/texto_icon.svg">
            <h1>Sobre nós:</h1>
          </div>
          <p><?=$user['descricao_perfil'] ?? 'Sem descrição' ?></p>
        </div>

        <div class="contatos_vendedor">
          <?php if (!empty($user['instagram_perfil'])): ?>
                <div class='redes_div'>
                    <img src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" alt="instagram" class='base_icon'>
                    <a href="https://instagram.com/<?= htmlspecialchars($user['instagram_perfil']) ?>">@<?= htmlspecialchars($user['instagram_perfil']) ?></a>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['facebook_perfil'])): ?>
                <div class='redes_div'>
                    <img src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" alt="facebook" class='base_icon'>
                    <a href="https://facebook.com/<?= htmlspecialchars($user['facebook_perfil']) ?>"><?= htmlspecialchars($user['facebook_perfil']) ?></a>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['x_perfil'])): ?>
                <div class='redes_div'>
                    <img src="<?=$PATH_PUBLIC?>/image/geral/icons/x_twitter_icon.svg" alt="x.com" class='base_icon'>
                    <a href="https://x.com/<?= htmlspecialchars($user['x_perfil']) ?>">@<?= htmlspecialchars($user['x_perfil']) ?></a>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['linkedin_perfil'])): ?>
                <div class='redes_div'>
                    <img src="<?=$PATH_PUBLIC?>/image/geral/icons/linkedin_icon.svg" alt="linkedin" class='base_icon'>
                    <a href="https://linkedin.com/in/<?= htmlspecialchars($user['linkedin_perfil']) ?>"><?= htmlspecialchars($user['linkedin_perfil']) ?></a>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['youtube_perfil'])): ?>
                <div class='redes_div'>
                    <img src="<?=$PATH_PUBLIC?>/image/geral/icons/youtube_icon.svg" alt="youtube" class='base_icon'>
                    <a href="https://youtube.com/@<?= htmlspecialchars($user['youtube_perfil']) ?>">@<?= htmlspecialchars($user['youtube_perfil']) ?></a>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['tiktok_perfil'])): ?>
                <div class='redes_div'>
                    <img src="<?=$PATH_PUBLIC?>/image/geral/icons/tiktok_icon.svg" alt="tiktok" class='base_icon'>
                    <a href="https://tiktok.com/@<?= htmlspecialchars($user['tiktok_perfil']) ?>">@<?= htmlspecialchars($user['tiktok_perfil']) ?></a>
                </div>
            <?php endif; ?>
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
  <script type="module" src="<?=$PATH_COMPONENTS?>/js/Toast.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      <?php if (!empty($errors)): ?>
        <?php foreach($errors as $e): ?>
          gerarToast("<?= addslashes($e) ?>", "erro");
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($_SESSION['successMessage'])): ?>
        gerarToast("<?= addslashes($_SESSION['successMessage']) ?>", "sucesso");
        <?php unset($_SESSION['successMessage']); ?>
      <?php endif; ?>
      
    });
  </script>


  <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>

</html>