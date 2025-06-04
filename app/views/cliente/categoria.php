<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/Categoria.css"];
require_once("./utils/head.php");
require_once("$PATH_CONTROLLER/cliente/CategoriaController.php");
?>

<body class="gradiente_azul">
    <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>

    <div class="img_fundo largura_com_scroll">
        <?php
        include_once("$PATH_COMPONENTS/php/carrossel.php");
        Carrossel('.');
        ?>

    </div>

    <main class="conteudo_categoria grid_categoria gradiente_azul">
        <div class="mobile-filters-dropdown">
            <button class="dropdown-toggle">
                Filtrar
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/configure.svg" alt="filtro">
            </button>
        </div>

        <div class="filtros">
            <!-- Filtro de Categorias -->
            <div class="container_filtro">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Categorias</h2>
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro.svg" alt="Setinha">
                </div>
                <div class="grid_filtro">
                    <?php 
                    $controller = new CategoriaController;
                    $subcategorias = $controller->sendSubcategoria();
                    foreach ($subcategorias as $subcategoria) {
                        echo "<div class='filtro_item font_descricao'>
                        <input type='radio' id='categoria-checkbox' name='subcategoria' class='css_checkbox' value='" . $subcategoria['id_subcategoria'] . "'/>
                        <label class='fit_content' for='subcategoria'>" . $subcategoria['nome_subcategoria'] . "</label>
                        </div>";
                    }
                    
                    ?>
                </div>
            </div>

            <div class="container_filtro ">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Marcas</h2>
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro.svg" alt="Setinha">
                </div>
                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto1_1">LogiTech</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_2" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto1_2">Razer</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_3" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto1_3">Kingston</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_4" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto1_4">MultiLaser</label>
                    </div>
                </div>
            </div>

            <div class="container_filtro ">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Conexão</h2>
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro.svg" alt="Setinha">
                </div>
                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto2_1">24 Pinos</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_2" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto2_2">8 Pinos</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_3" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto2_3">Bluetooth</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_4" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto2_4">Com Fio</label>
                    </div>
                </div>
            </div>

            <div class="container_filtro ">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Comprimento</h2>
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro.svg" alt="Setinha">
                </div>
                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto3_1">1 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_2" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto3_2">1,2 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_3" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto3_3">1,5 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_4" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto3_4">1,8 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_5" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto3_5">2 m</label>
                    </div>
                </div>
            </div>

            <div class="container_filtro ">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Cor</h2>
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro.svg" alt="Setinha">
                </div>
                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto4_1">Azul</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_2" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto4_2">Amarelo</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_3" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto4_3">Branco</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_4" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto4_4">Cinza</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_5" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto4_5">Rosa</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_6" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto4_6">Preto</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="produtos_container bg_branco">
            <h2 class="font_cinza font_subtitulo">Destaques</h2>
            <div id="destaque_produtos" class="linha_card_produto grid_produtos">
                <?php
                include("$PATH_COMPONENTS/php/card_produto.php");
                include("$PATH_CONTROLLER/geral/CardController.php");
                $card = new cardProduto;
                $controller = new CardController;

                $info = $controller->filtrarProdutosCategoria($categoria);
                $card->gerarProdutoCards(6, $info);
                ?>
            </div>
            <h2 class="font_cinza font_subtitulo">Produtos</h2>
            <div class="produtos_categoria">
                <div id="linha1" class="linha_card_produto grid_produtos">
                    <?php $card->gerarProdutoCards(6, $info); ?>
                </div>
                <div id="linha2" class="linha_card_produto grid_produtos">
                    <?php $card->gerarProdutoCards(6, $info); ?>

                </div>
                <div id="linha3" class="linha_card_produto grid_produtos">
                    <?php $card->gerarProdutoCards(6, $info); ?>

                </div>
                <div id="linha4" class="linha_card_produto grid_produtos">
                    <?php $card->gerarProdutoCards(6, $info); ?>

                </div>
                <div id="linha5" class="linha_card_produto grid_produtos">
                    <?php $card->gerarProdutoCards(6, $info); ?>
                </div>
            </div>
        </div>
    </main>
    <button id="btnTopo" class="btn-topo" title="Voltar ao topo">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_cima.svg" alt="">
    </button>
    <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
    ?>
    <!-- <script type="text/javascript" src="../../js/cliente/categoria.js"></script> -->
</body>
<script src='<?= $PATH_PUBLIC ?>/js/geral/btn_topo.js'></script>
<script src="<?= $PATH_PUBLIC ?>/js/geral/carrossel.js"></script>
<script src='<?= $PATH_PUBLIC ?>/js/cliente/filtro.js'></script>
</html>