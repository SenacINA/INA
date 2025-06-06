<!DOCTYPE html>
<html lang="en">    
<?php
  $titulo = "Sobre Nós - E ao Quadrado";
  $css = ["/css/geral/SobreNos.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
    <h1>I.N.A.</h1>
    <div class="team-description">
        <p>O Time Inteligência Não Artificial é composto de pessoas incríveis que trabalharam juntas para lhe trazer EaoQuadrado.</p>
        <p>Conheça cada uma delas nesse carrossel.</p>
    </div>
    
    <div class="carousel-wrapper">
        <div class="arrow" onclick="prevSlide()">&#9664;</div>
        
        <div class="carousel-container">
            <div class="carousel" id="carousel">
                <img src="<?=$PATH_PUBLIC?>/image/geral/enzo.png" alt="Person 1">
                <img src="<?=$PATH_PUBLIC?>/image/index/Produto02.jpg" alt="Person 2">
                <img src="<?=$PATH_PUBLIC?>/image/index/Produto03.jpg" alt="Person 3">
                <img src="<?=$PATH_PUBLIC?>/image/index/Produto04.jpg" alt="Person 4">
                <img src="<?=$PATH_PUBLIC?>/image/index/Produto05.jpg" alt="Person 5">
                <img src="<?=$PATH_PUBLIC?>/image/index/Produto06.jpg" alt="Person 6">
                <img src="<?=$PATH_PUBLIC?>/image/index/Produto07.jpg" alt="Person 7">
                <img src="<?=$PATH_PUBLIC?>/image/index/Produto08.jpg" alt="Person 8">
            </div>
        </div>
        
        <div class="arrow" onclick="nextSlide()">&#9654;</div>
    </div>
    <div class="footer" id="footer">
        <h2>Roberto Filho</h2>
        <p>Fez poha nenhuma<br>Fica dando spoiler de Invencível<br>Não consegue concentrar em uma tarefa por mais de 5 minutos.<br>Não gosta de JojoLand</p>
    </div>

    <div class="footer-background"></div>
    
    <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
    ?>
    
<script src='<?=$PATH_PUBLIC?>/js/geral/sobre_nos.js'></script>
</body>
</html>