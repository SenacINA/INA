<!DOCTYPE html>
<html lang="pt-BR">
<?php
  $titulo = "Sobre Nós - E ao Quadrado";
  $css = ["/css/geral/sobre_nos.css"];
  require_once('../../../utils/head.php');
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <div class="sobrenos_body">
    
    <!-- Título -->
    <div class="sobrenos_titulo">
      <div class="sobrenos_text_titulo">
        <img src="<?=$PATH_PUBLIC?>/image/geral/icons/botteste_icon.svg">
        <h1>SOBRE NÓS</h1>
      </div>
    </div>
    

    <section class="sobrenos_historia">
      <div class="sobrenos_profile_text">
          <div class="sobrenos_profile_text_titulo">
            <img src="<?=$PATH_PUBLIC?>/image/geral/icons/pessoas_icon.svg">
            <h2>Quem Somos?</h2>
          </div>
      </div>
      <p>
        Somos o time <strong>I.N.A</strong>, um grupo formado por estudantes do curso de Análise e Desenvolvimento de Sistemas (ADS). Este projeto de portfólio surgiu como uma forma de aplicar, na prática, tudo o que aprendemos ao longo do nosso percurso acadêmico.
      </p>
      <p>
        Ao longo dessa jornada, enfrentamos muitos desafios: bugs que nos tiraram o sono, prazos apertados, e linguagens que pareciam indecifráveis no começo. Mas também vivemos momentos incríveis — de conquistas, aprendizado mútuo e evolução constante.
      </p>
      <p>
        Mais do que colegas de equipe, nos tornamos parceiros de crescimento. Criamos um ambiente de harmonia e cooperação, onde cada linha de código escrita foi acompanhada de diálogo, escuta e apoio mútuo.
      </p>
    </section>

    <section class="sobrenos_homenagem">
      <div class="sobrenos_profile_text">
          <div class="sobrenos_profile_text_titulo">
            <img src="<?=$PATH_PUBLIC?>/image/geral/icons/coracao_icon.svg">
            <h2>Uma Homenagem Especial</h2>
          </div>
      </div>
      <p>
        Também queremos dedicar um espaço a alguns colegas que fizeram parte da nossa caminhada, mas que, por motivos pessoais, precisaram se afastar do curso, ou mudarem de turno. A contribuição de vocês foi essencial para o início desse projeto, e levamos com carinho tudo o que vivemos juntos. Obrigado por terem feito parte da nossa história.
      </p>
  </section>


    <!-- Perfil do membro da equipe -->
    <div class="sobrenos_team_profile">
      <div class="sobrenos_profile_image">
        <img src="<?=$PATH_PUBLIC?>/image/geral/enzo.png" alt="Foto de Enzo">
      </div>
      <div class="sobrenos_profile_text">
        <div class="sobrenos_profile_text_titulo">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/star_icon.svg">
          <h2>Enzo Guenka Lopes</h2>
        </div>
        <p>Enzo é um dos fundadores da E ao Quadrado, com paixão por inovação e tecnologia. Atua como desenvolvedor full stack, sempre buscando soluções eficientes e criativas.</p>
      </div>

    </div>
    

    <!-- Carrossel de imagens
    <div class="sobrenos_carousel_wrapper">
      <div class="sobrenos_arrow" onclick="prevSlide()">&#9664;</div>

      <div class="sobrenos_carousel_container">
        <div class="sobrenos_carousel" id="sobrenos_carousel">
          <img src="<?=$PATH_PUBLIC?>/image/geral/enzo.png" alt="Person 1">
          <img src="../../image/index/Produto02.jpg" alt="Person 2">
          <img src="../../image/index/Produto03.jpg" alt="Person 3">
          <img src="../../image/index/Produto04.jpg" alt="Person 4">
          <img src="../../image/index/Produto05.jpg" alt="Person 5">
          <img src="../../image/index/Produto06.jpg" alt="Person 6">
          <img src="../../image/index/Produto07.jpg" alt="Person 7">
          <img src="../../image/index/Produto08.jpg" alt="Person 8">
        </div>
      </div>

      <div class="sobrenos_arrow" onclick="nextSlide()">&#9654;</div>
    </div>

    <div id="sobrenos_carousel_footer" class="sobrenos_carousel_footer"></div> -->
  </div>

  <script src='<?=$PATH_PUBLIC?>/js/geral/sobre_nos.js'></script>
  <?php include_once("$PATH_COMPONENTS/php/footer.php"); ?>
</body>
</html>
