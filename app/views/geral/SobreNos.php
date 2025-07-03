<!DOCTYPE html>
<html lang="pt-br">    
<?php
  $titulo = "Sobre Nós - E ao Quadrado";
  $css = ["/css/geral/SobreNos.css"];
  require_once('./utils/head.php');
?>
<body>
    <?php
        include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>
    
    <main>
        <div class="about-background">
            <div class="background-gif-wrapper">
                <img class="background-gif" src="<?= $PATH_PUBLIC ?>/image/geral/wallpaper-sn.gif" alt="">
            </div>
            <div class="about-text">
                <h1>I.N.A.</h1>
                <p>O Time Inteligência Não Artificial é composto de pessoas incríveis que trabalharam juntas para lhe trazer EaoQuadrado.</p>
                <p>Conheça cada uma delas nesse carrossel.</p>
            </div>
            <div class="about-text">
                <img src="<?= $PATH_PUBLIC ?>/image/geral/ina.png">
            </div>
        </div>

        <div class="heros-main">
            <div class="hero-container">
                <div class="card">
                    <div class="details">
                        <div class="cardHeader">CSS Hover Animation</div>
                        <div class="cardText">
                        Welcome to this card where i have made use of the "Hover" effect to add
                        some really cool interactions to it. Enjoy
                        </div>
                        <div class="button">Learn More</div>
                    </div>
                </div>


            </div>
        </div>
    </main>
        
    <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
    ?>
    
<!-- <script src='<?=$PATH_PUBLIC?>/js/geral/SobreNos.js'></script> -->
</body>
</html>