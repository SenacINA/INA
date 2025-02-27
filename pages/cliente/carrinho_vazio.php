<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/cliente/carrinho_vazio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body>
    <header class="nav style_nav shadow_nav">
        <div class="grid-container style_nav">
            <div class="item1">
                <img id="imgLupa" src="../../image/index/lupa.png" alt="">
                <input type="text">
            </div>
            <div class="item2">
                <button id="buttonLogo">
                    <a href="#">
                        <img href="#" id="imgLogo" src="../../image/index/logo.svg">
                    </a>
                </button>
            </div>
            <div class="item3">
                <a class="button" href="#">
                    <img src="../../image/index/user.png" alt="Usuário">
                </a>
                <a class="button" href="#">
                    <img src="../../image/index/carrinho.png" alt="Carrinho">
                </a>
                <a class="button" href="#">
                    <img src="../../image/index/config.png" alt="Configurações">
                </a>
            </div>

        </div>
    </header>
    <main>
        <div class="carrinho_vazio">
            <img src="../../image/carrinho/carrinho.svg">
            <p class="text">Carrinho</p>
            <hr class="divisoria">
            <img src="../../image/carrinho/identificacao.svg">
            <p class="text-2">Identificação</p>
            <hr class="divisoria">
            <img src="../../image/carrinho/conclusao.svg">
            <p class="text-2">Conclusão</p>
            <hr class="divisoria">
            <img src="../../image/carrinho/confirmacao.svg">
            <p class="text-2">Confirmação</p>
        </div>

        <div class="quadrado">
            <div class="text_info">
                <h1 class="text_"><b>Produto</b></h1>
                <h1 class="text_"><b>Quantidade</b></h1>
                <h1 class="text_"><b>Valor</b></h1>
                <h1 class="text_"><b>Resumo</b></h1>
            </div>
            <hr class="divisoria_quadrado">
            <div class="main_content">
                <div class="itens_e_servicos">
                    <div class="items">
                        <h1 class="items_vazio">NENHUM ITEM ADICIONADO AO CARRINHO</h1>
                    </div>
                    <div class="servicos">
                        <div class="servicos_container_text">
                            <img src="../../image/carrinho/servico.svg" class="servico_icon">
                            <p class="servicos_text">SERVIÇOS</p>
                        </div>
                        <div class="subtotal_container_text">
                            <img src="../../image/carrinho/seta.svg" class="seta">
                            <p class="subtotal_text">Subtotal serviços: R$ 00,00</p>
                        </div>
                    </div>
                </div>
                <div class="resumo"></div>
            </div>
    </main>
</body>

</html>