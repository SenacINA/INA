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
  <link rel="stylesheet" href="../../css/cliente/perfil_cliente.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>

<body>
    <!-- fazer responsividade -->

    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    
    <main>
        <img src="../../image/cliente/perfil_cliente/banner_user.png" alt="banner" class="perfil_cliente_banner_cliente">

        <div class="perfil_cliente_pfp_cliente">
            <img src="../../image/cliente/perfil_cliente/foto_user.png" alt="pfp_cliente">
            <h1>Cliente 10</h1>
        </div>

        <div class="menu_1">
            <form action="">
                <select name="menu base_input" id="menu" onchange="selectPag(this.value)">
                    <option selected disabled value="">Menu</option>
                    <option value="cliente/editar_perfil">Editar Perfil</option>
                    <option value="vendedor/cadastro_vendedor_1">Cadastro como vendedor</option>
                    <option value="cliente/login">Sair</option>
                </select>
            </form>
        </div>

        <div class="perfil_cliente_grid_principal">
            <div class="perfil_cliente_infos_container">
                <div class="perfil_cliente_infos_item1">
                    <img src="../../image/cliente/perfil_cliente/icon_localizacao_cliente.svg">
                    <p>São Paulo, São Paulo</p>
                </div>
                <div class="perfil_cliente_infos_item2">
                    <img src="../../image/cliente/perfil_cliente/chat_user.svg">
                    <p>Ativo há: Agora</p>
                </div>
                <div class="perfil_cliente_infos_item3">
                    <img src="../../image/cliente/perfil_cliente/membro_user.svg">
                    <p>Cliente há: 6 Meses</p>
                </div>
                <div class="perfil_cliente_contatos_cliente">
                    <div class="instagram_cliente">
                        <img src="../../image/cliente/perfil_cliente/icon_instagram_cliente.svg" class="perfil_cliente_icon_instagram_cliente">
                        <a href="#" class="perfil_cliente_instagram_cliente">my.cliente10</a>
                    </div>
                    <hr class="linha_vertical">
                    <div class="facebook_cliente">
                        <img src="../../image/cliente/perfil_cliente/icon_facebook_cliente.svg" class="perfil_cliente_icon_facebook_cliente">
                        <a href="#" class="perfil_cliente_facebook_cliente">cliente10</a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="perfil_cliente_grid_historico">
                <div class="perfil_cliente_about_container_2">
                    <img src="../../image/cliente/perfil_cliente/icon_lojinha.svg" alt="Icon Loja">
                    <h1>Histórico:</h1>
                </div>
                <div class="historico_items">
                    <?php gerarProdutoCards(8); ?>
                </div>
                <div class="ver_mais_container">
                    <p class="ver_mais_text">Ver Mais</p>
                    <img src="../../image/cliente/perfil_cliente/seta.svg">
                </div>
            </div>

            <!-- <img src="../../image/cliente/perfil_cliente/Anuncio.png" class="anuncio"> -->
    </main>

    <?php
    include_once('../../pages/geral/footer.php');
    ?>

</body>

</html>