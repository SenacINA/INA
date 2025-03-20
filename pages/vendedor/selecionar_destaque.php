<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/vendedor/selecionar_destaque.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src='../../js/geral/base.js'></script>
    
</head>
<body>
    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <main>
        <div class = "selecionardestaques_body">

            <div class="selecionardestaques_titulo">
                <div class="selecionardestaques_text_titulo">
                    <img src="../../image/vendedor/selecionar_destaques/estrela.svg" alt="">
                    <h1>SELECIONAR DESTAQUES</h1>
                </div>
                <hr class="selecionardestaques_linha_titulo">
            </div>
            <div class="selecionardestaques_body_container_botoes">
                <?php 
                    include_once ('../../pages/geral/card_produto.php');
                    gerarProdutoCards(3, 0);
                ?>
                <button class="selecionardestaques_add_button">
                    <img src="../../image/vendedor/selecionar_destaques/add.svg" alt="">
                </button>
            </div>
            
        </div>  <!-- BODY -->
    </main>
    <!-- <?php 
    //   include_once('../../pages/geral/footer.php');
    ?> -->
</body>
</html>