<?php
function gerarProdutoCards($quantidade)
{
    for ($i = 0; $i < $quantidade; $i++) {
        echo "
        <div class='index_body_produto_card'>
            <div class='index_body_desconto'>
                <span>20% OFF</span>
            </div>
            <div class='index_body_imagem_produto'>
                <img src='https://placehold.co/200' alt=''>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pellentesque vel nulla quis dapibus. Donec purus purus, maximus eget sollicitudin a, maximus vitae enim. Maecenas facilisis elementum porta. Nullam sagittis, orci eu gravida consequat, turpis diam maximus lectus, in aliquam libero tortor a lorem. Donec malesuada purus at ligula consequat dignissim. Sed quis mollis sem. In laoreet metus maximus velit venenatis eleifend eu vel dui. Vivamus dignissim velit vel nisi lobortis aliquam</p>
            </div>
            <div class='index_body_estrela_valor'>
                <div class='index_body_estrela_produto'>
                    <p>★★★★★</p>
                    <h4>(12)</h4>
                </div>
                <div class='index_body_valor_produto'>
                    <p id='indexBodyValorAntigo'>R$1000</p>
                    <p id='indexBodyValorProduto'>R$800</p>
                </div>
            </div>
        </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/vendedor/perfil_vendedor.css">
    <script src="../../js/geral/base.js"></script>
</head>
<body>
    <!-- Até 375px -->
    <!-- Caminho de Icon Correto -->

    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    
<main>
    <img src="../../image/vendedor/perfil_vendedor/banner_vendedor_mini_perfil.png" alt="banner" class="perfil_vendedor_banner">

    <div class="perfil_vendedor_content_pfp">
        <div class="perfil_vendedor_pfp">
            <img src="../../image/vendedor/perfil_vendedor/pfp_vendedor.png" alt="pfp_vendedor">
            <h1>Cliente 10</h1>
        </div>
        <div class="perfil_vendedor_btn_menu base_input_select">
            <form action="">
                <select class="base_input" name="" id="menu" onchange="selectPag(this.value)">
                <option selected disabled value="">Menu</option>
                    <option value="vendedor/editar_perfil_vendedor">Editar Perfil</option>
                    <option value="vendedor/confirmar_pedido">Pedidos</option>
                    <option value="vendedor/relatorio_vendas">Relatório</option>
                    <option value="vendedor/editar_produto">Editar Produtos</option>
                    <option value="cliente/login">Sair</option>
                </select>
            </form>
        </div>
    </div>
    
    <div class="perfil_vendedor_grid_principal">
        <div class="perfil_vendedor_infos_container">
            <div class="perfil_vendedor_infos_item1">
                <img class="base_icon" src="../../image/geral/icons/localizacao_icon.svg">
                <p>São Paulo, São Paulo</p>
            </div>
            <div class="perfil_vendedor_infos_item2">
                <img class="base_icon" src="../../image/geral/icons/balao_exclamacao_icon.svg">
                <p>Ativo há: Agora</p>
            </div>
            <div class="perfil_vendedor_infos_item3">
                <img class="base_icon" src="../../image/geral/icons/perfil_membros_icon.svg">
                <p>Cliente há: 6 Meses</p>
            </div>
            <div class="perfil_vendedor_contatos_vendedor">
                <div class="instagram_vendedor">
                    <img class="base_icon" src="../../image/geral/icons/instagram_icon.svg" class="perfil_vendedor_icon_instagram_vendedor">
                    <a href="#" class="perfil_vendedor_instagram_vendedor">my.vendedor10</a>
                </div>
                <hr class="linha_vertical">
                <div class="facebook_vendedor">
                    <img class="base_icon" src="../../image/geral/icons/facebook_icon.svg" class="perfil_vendedor_icon_facebook_vendedor">
                    <a href="#" class="perfil_vendedor_facebook_vendedor">vendedor10</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="info_container">
            <div class="about_container">
                <div class="about_text">
                    <img class="base_icon" src="../../image/geral/icons/texto_icon.svg">
                    <h1>Sobre nós:</h1>
                </div>
                <p>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio.
                    In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis.
                    Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus.
                    At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae.
                    At dolorum quos non omnis internos et quos quis.
                </p>
            </div>

            <div class="contatos_vendedor">
                <div class="contatos_vendedor_column">
                    <div class="item_contatos_vendedor">
                        <img class="base_icon" src="../../image/geral/icons/instagram_icon.svg" class="icon_instagram_vendedor">
                        <a href="#">my.thudergames</a>
                    </div>
                    
                    <div class="item_contatos_vendedor">
                        <img class="base_icon" src="../../image/geral/icons/facebook_icon.svg" class="icon_facebook_vendedor">
                        <a href="#">thundergames</a>
                    </div>
                    
                    <div class="item_contatos_vendedor">
                        <img class="base_icon" src="../../image/geral/icons/x_twitter_icon.svg" class="icon_x_vendedor">
                        <a href="#">thundergames_</a>
                    </div>
                </div>
    
                <hr>

                <div class="contatos_vendedor_column">
                    <div class="item_contatos_vendedor">
                        <img class="base_icon" src="../../image/geral/icons/linkedin_icon.svg" class="icon_linkedin_vendedor">
                        <a href="#">thundergames</a>
                    </div>

                    <div class="item_contatos_vendedor">
                        <img class="base_icon" src="../../image/geral/icons/youtube_icon.svg" class="icon_youtube_vendedor">
                        <a href="#">Thunder Games</a>
                    </div>

                    <div class="item_contatos_vendedor">
                        <img class="base_icon" src="../../image/geral/icons/tiktok_icon.svg" class="icon_tiktok_vendedor">
                        <a href="#">thunder.games</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="perfil_vendedor_grid_destaques">
            <div class="perfil_vendedor_about_container_2">
                <img src="../../image/geral/icons/tempo_icon.svg" alt="Icon Loja">
                <h1>Destaques:</h1>
            </div>
            <div class="destaques_itens">
                <?php gerarProdutoCards(8); ?>
            </div>
            <div class="ver_mais_container">
                <p class="ver_mais_text">Ver Mais</p>
                <img src="../../image/geral/icons/seta_longa_icon.svg">
            </div>
        </div>

        <div class="perfil_vendedor_grid_produtos">
            <div class="perfil_vendedor_about_container_2">
                <img src="../../image/geral/icons/tempo_icon.svg" alt="Icon Loja">
                <h1>Produtos:</h1>
            </div>
            <div class="produtos_itens">
                <?php gerarProdutoCards(8); ?>
            </div>
            <div class="ver_mais_container">
                <p class="ver_mais_text">Ver Mais</p>
                <img src="../../image/geral/icons/seta_longa_icon.svg">
            </div>
        </div>
    </div>
</main>

<?php 
    include_once('../../pages/geral/footer.php');
?>
</body>
</html>