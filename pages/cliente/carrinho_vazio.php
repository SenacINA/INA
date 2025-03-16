<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/cliente/carrinho_vazio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/geral/base.js"></script>
</head>

<body class="carrinho_vazio_body">
    <?php
        include_once('../../pages/geral/navbar.php');
    ?>
    <main class="carrinho_vazio_main">
        <div class="carrinho_vazio_nav">
            <div class="carrinho_vazio_nav_item">
                <img src="../../image/carrinho/carrinho.svg">
                <p class="text">Carrinho</p>
            </div>
            <hr class="divisoria">
            <div class="carrinho_vazio_nav_item">
                <img src="../../image/carrinho/identificacao.svg">
                <p class="text-2">Identificação</p>
            </div>
            <hr class="divisoria">
            <div class="carrinho_vazio_nav_item">
                <img src="../../image/carrinho/conclusao.svg">
                <p class="text-2">Conclusão</p>
            </div>
            <hr class="divisoria">
            <div class="carrinho_vazio_nav_item">
                <img src="../../image/carrinho/confirmacao.svg">
                <p class="text-2">Confirmação</p>
            </div>
        </div>

        <div class="carrinho_vazio_conteudo">
            <div class="text_info">
                <h1 class="text_ produto"><b>Produto</b></h1>
                <h1 class="text_"><b>Quantidade</b></h1>
                <h1 class="text_ valor"><b>Valor</b></h1>
                <h1 class="text_ resumo_text"><b>Resumo</b></h1>
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
                <div class="resumo">
                    <hr class="quadrado_resumo">
                    <hr class="quadrado_resumo_maior">
                    <hr class="quadrado_resumo_maior">
                    <hr class="quadrado_resumo_maior">
                </div>
            </div>
            <div class="botoes">
                <button class="voltar_botao"><img src="../../image/geral/seta_botao.svg">VOLTAR</button>
                <button class="remover_botao"><img src="../../image/geral/x_botao.svg">REMOVER PRODUTO(S)</button>
                <button class="salvar_botao"><img src="../../image/geral/confirm_botao.svg">SALVAR</button>
            </div>
        </div>
    </main>
</body>

</html>