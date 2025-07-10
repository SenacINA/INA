<!DOCTYPE html>
<html lang="pt-br">
<?php
$css = ["/css/geral/Pesquisar.css"];
require_once('./utils/head.php');
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="pesquisa_body_main_container">
    <div class="content_container_pesquisa">
      <div class="pesquisa_text">
        <img class="pesquisa_lupa" src="<?= $PATH_PUBLIC ?>\image\geral\icons\produto_lupa_icon.svg">
        <h1 class="pesquisa_text font_sapphire font_titulo font_sappire">Pesquisando por <?php echo $_GET['pesquisa'] ?>:</h1>
      </div>
      <div class="produto_container" id="produto_container"></div>
    </div>
  </main>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <button id="btnTopo" class="btn-topo" title="Voltar ao topo">
    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_cima.svg" alt="">
  </button>
</body>
<script src='<?= $PATH_PUBLIC ?>/js/geral/BtnTopo.js' data-isindex="1"></script>
<script src='<?= $PATH_PUBLIC ?>/js/geral/card.js'></script>
<script src='<?= $PATH_PUBLIC ?>/js/geral/Pesquisar.js' type="module"></script>
<script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>

</html>