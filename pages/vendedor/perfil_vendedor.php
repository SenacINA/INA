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
    <!-- Fazer responsividade -->
    <!-- Caminho de Icon Correto -->

    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <main>
        <div class="pfp_vendedor">
            <img src="../../image/vendedor/perfil_vendedor/banner_vendedor_mini_perfil.png" alt="banner" class="banner_vendedor">
            <div class="pfp_container">
                <img src="../../image/vendedor/perfil_vendedor/pfp_vendedor.png" alt="pfp_vendedor" class="pfp_vendedor_ico">
                <h1 class="nome_vendedor">THUNDER GAMES</h1>
            </div>
        </div>

        <div class="botao_menu">
            <form action="" class="menu_1">
                <select name="menu" id="menu" onchange="selectPag(this.value)">
                    <option selected disabled value="">Menu</option>
                    <option value="vendedor/editar_perfil_vendedor">Editar Perfil</option>
                    <option value="vendedor/confirmar_pedido">Pedidos</option>
                    <option value="vendedor/relatorio_vendas">Relatório</option>
                    <option value="admin/admin_cupom">Criar Cupom</option>
                    <option value="vendedor/editar_produto">Editar Produtos</option>
                    <option value="cliente/login">Sair</option>
                </select>
            </form>
        </div>

        <div class="grid_principal">
            <div class="infos_container">
                <div class="infos_item1">
                    <img src="../../image/geral/icons/localizacao_icon.svg">
                    <p>São Paulo, São Paulo</p>
                </div>
                <div class="infos_item2">
                    <img src="../../image/geral/icons/produto_icon.svg">
                    <p>Produtos: 8</p>
                </div>
                <div class="infos_item3">
                    <img src="../../image/geral/icons/perfil_membros_icon.svg">
                    <p>Vendedor há: 4 Meses</p>
                </div>
                <div class="infos_item4">
                    <img src="../../image/geral/icons/estela_icon.svg">
                    <p>Avaliação geral: 4.5</p>
                </div>
            </div>

            <hr class="hr_1">
            <div class="info_container">
                <div class="about_container">
                    <div class="about_text">
                        <img src="../../image\geral\icons\texto_icon.svg">
                        <h1>Sobre nós:</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</p>
                </div>
                <div class="contatos_vendedor">
                    <img src="../../image/geral/icons/instagram_icon.svg" class="icon_instagram_vendedor">
                    <a href="#" class="instagram_vendedor">my.thudergames</a>

                    <img src="../../image/geral/icons/facebook_icon.svg" class="icon_facebook_vendedor">
                    <a href="#" class="facebook_vendedor">thundergames</a>

                    <img src="../../image/geral/icons/x_twitter_icon.svg" class="icon_x_vendedor">
                    <a href="#" class="x_vendedor">thundergames_</a>

                    <hr class="vr">

                    <img src="../../image/geral/icons/linkedin_icon.svg" class="icon_linkedin_vendedor">
                    <a href="#" class="linkedin_vendedor">thundergames</a>

                    <img src="../../image/geral/icons/youtube_icon.svg" class="icon_youtube_vendedor">
                    <a href="#" class="youtube_vendedor">Thunder Games</a>

                    <img src="../../image/geral/icons/tiktok_icon.svg" class="icon_tiktok_vendedor">
                    <a href="#" class="tiktok_vendedor">thunder.games</a>
                </div>
            </div>

            <hr class="hr_2">

            <div class="grid_carrossel">
                <div class="about_container_2">
                    <img src="../../image/geral/icons/estela_icon.svg" alt="">
                    <h1>Destaques:</h1>
                </div>
                <div class="historico_items">
                    <?php gerarProdutoCards(8); ?>
                </div>

                <div class="ver_mais_container">
                    <p class="ver_mais_text">Ver Mais</p>
                    <img src="../../image/geral/icons/seta_longa_icon.svg">
                </div>

                <div class="about_container_2">
                    <img src="../../image/geral/icons/produto_icon.svg" class="estrela">
                    <h1>Produtos:</h1>
                </div>

                <div class="historico_items historico_items_2">
                    <?php gerarProdutoCards(8); ?>
                </div>
                <div class="ver_mais_container ver_mais_container_text_2">
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