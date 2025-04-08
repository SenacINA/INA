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

<?php
  $css = ["/css/cliente/perfil_cliente.css"];
  require_once("../../../utils/head.php")
?>

<body>
    <!-- Até 375px -->
    <!-- Caminho de Icon Correto -->

    <?php
        include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>
    
<main>
    <img src="<?=$PATH_PUBLIC?>/image/cliente/perfil_cliente/banner_user.png" alt="banner" class="perfil_cliente_banner">

    <div class="perfil_cliente_content_pfp">
        <div class="perfil_cliente_pfp">
            <img src="<?=$PATH_PUBLIC?>/image/cliente/perfil_cliente/foto_user.png" alt="pfp_cliente">
            <h1>Cliente 10</h1>
        </div>
        <div class="perfil_cliente_btn_menu base_input_select">
            <form action="">
                <select class="base_input" name="" id="menu" onchange="selectPag(this.value)">
                    <option selected disabled value="">Menu</option>
                    <option value="cliente/editar_perfil">Editar Perfil</option>
                    <option value="vendedor/cadastro_vendedor_1">Cadastro de vendedor</option>
                    <option value="cliente/login">Sair</option>
                </select>
            </form>
        </div>
    </div>
    
    <div class="perfil_cliente_grid_principal">
        <div class="perfil_cliente_infos_container">
            <div class="perfil_cliente_infos_item1">
                <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/localizacao_icon.svg">
                <p>São Paulo, São Paulo</p>
            </div>
            <div class="perfil_cliente_infos_item2">
                <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/balao_exclamacao_icon.svg">
                <p>Ativo há: Agora</p>
            </div>
            <div class="perfil_cliente_infos_item3">
                <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_membros_icon.svg">
                <p>Cliente há: 6 Meses</p>
            </div>
            <div class="perfil_cliente_contatos_cliente">
                <div class="instagram_cliente">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" class="perfil_cliente_icon_instagram_cliente">
                    <a href="#" class="perfil_cliente_instagram_cliente">my.cliente10</a>
                </div>
                <hr class="linha_vertical">
                <div class="facebook_cliente">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" class="perfil_cliente_icon_facebook_cliente">
                    <a href="#" class="perfil_cliente_facebook_cliente">cliente10</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="perfil_cliente_grid_historico">
            <div class="perfil_cliente_about_container_2">
                <img src="<?=$PATH_PUBLIC?>/image/geral/icons/tempo_icon.svg" alt="Icon Loja">
                <h1>Histórico:</h1>
            </div>
            <div class="historico_items">
                <?php gerarProdutoCards(8); ?>
            </div>
            <div class="ver_mais_container">
                <p class="ver_mais_text">Ver Mais</p>
                <img src="<?=$PATH_PUBLIC?>/image/geral/icons/seta_longa_icon.svg">
            </div>
        </div>
    </div> 
</main>
<?php
    include_once("$PATH_COMPONENTS/php/footer.php");
?>

</body>
</html>