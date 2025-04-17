<!DOCTYPE html>
<html lang="pt-br">
<?php
    $css = [__DIR__."/../../../public/css/geral/error.css"];
    require_once(__DIR__.'/../../../utils/head.php')
?>


<body>

    
    <?php
        include_once(__DIR__."/$PATH_COMPONENTS/php/navbar.php");
    ?>

    <main class="error_main">
        <div class='error_bot_message'>
            <img class='error_bot_img' src="<?=__DIR__."/$PATH_PUBLIC"?>/image/geral/error/inaBot_tv.png" alt="">
        </div>
        <button id='homeButton' class='base_botao btn_blue' onclick="pag('geral/home')">
            <img src="<?=__DIR__."/$PATH_PUBLIC;"?>/image/geral/icons/loja_icon_branco.svg" alt="">
            VOLTAR PARA A TELA INICIAL
        </button>
        
    </main>

    <?php
        include_once(__DIR__."/$PATH_COMPONENTS/php/footer.php");
    ?>

</body>
</html>
