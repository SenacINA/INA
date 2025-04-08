<!DOCTYPE html>
<html lang="pt-br">
  <?php
    $titulo = "Redefinir E-mail - E ao Quadrado";
    $css = ["/css/geral/redefinir_email_3.css"];
    require_once('../../../utils/head.php');
  ?>
<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="redefinir_email_3_container">
      <div class="redefinir_email_3_content">
        <img src="<?=$PATH_PUBLIC?>/image/geral/confirmacao.svg">
        <h2>Redefinição de E-mail realizada!</h2>
      </div>
      
      <button class="redefinir_email_3_botao_tela_inicial" onclick="pag('index',2)">
        <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
        <h3>TELA INICIAL</h3>
      </button>
    </div>
  </main>
</body>
</html>