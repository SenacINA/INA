<!DOCTYPE html>
<html lang="pt-br">
<?php
    $css = ["/css/geral/Error.css"];
    require_once('./utils/head.php')
?>


<body>

    
    <?php
        include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>

    <main class="error_main">
        <div class='error_bot_message'>
            <img class='error_bot_img' src="<?="$PATH_PUBLIC"?>/image/geral/error/inaBot_tv.png" alt="">
        </div>
        <button id='homeButton' class='base_botao btn_blue' onclick="pag('')">
            <img src="<?="$PATH_PUBLIC"?>/image/geral/icons/loja_icon_branco.svg" alt="">
            VOLTAR PARA A TELA INICIAL
        </button>
        
    </main>

    <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
    ?>

</body>
</html>
