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

    <div class="sobrenos_team_profile" id="sobrenos_carousel_wrapper">
      <div class="carrossel_btn voltar" onclick="prevSlide()">
        <img src="<?=$PATH_PUBLIC?>/image/geral/icons/seta_branca_icon.svg" alt="Anterior">
      </div>

      <div class="sobrenos_carousel" id="sobrenos_carousel">
        <img src="<?=$PATH_PUBLIC?>/image/geral/enzo.png" alt="Person 1">
        <img src="<?=$PATH_PUBLIC?>/image/geral/enzo.png" alt="Person 1">
      </div>

      <div class="sobrenos_profile_text" id="sobrenos_carousel_footer"></div>

      <div class="carrossel_btn ir" onclick="nextSlide()">
        <img src="<?=$PATH_PUBLIC?>/image/geral/icons/seta_branca_ir_icon.svg" alt="Próximo">
      </div>
    </div>
  </div>
  <script src='<?=$PATH_PUBLIC?>/js/geral/sobre_nos.js'></script>
  <?php include_once("$PATH_COMPONENTS/php/footer.php"); ?>
</body>
</html>
