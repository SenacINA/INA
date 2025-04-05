<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/geral/error.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    <title>E ao Quadrado</title>
    <link rel="icon" type="image/x-icon" href="./image/geral/icone_eaoquadrado.ico">    
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/geral/base.js"></script>
</head>
<body>
    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <main class="error_main">
        <h1>Ops...<br>
            Parece que esta página não existe
        </h1>
        <div class='error_erroBot'>
            <img id='inaBot' src="../../image/geral/icons/INA_bot.svg" alt="">
            <div class='error_div'>
                <img id='errorMessage' src="../../image/geral/error/error_message.gif" alt="">
                <img id='televisionError' src="../../image/geral/error/television_mockup.png" alt="">
            </div>
        </div>
        <button id='homeButton' class='base_botao btn_blue' onclick="<?php echo getOnClickValue('../index'); ?>">
            <img src="../../image/geral/icons/loja_icon_branco.svg" alt="">
            Voltar para a Tela Inicial
        </button>
    </main>
    <?php
        $isIndex = 0;
        include_once('../../pages/geral/footer.php');
    ?>

</body>
</html>
