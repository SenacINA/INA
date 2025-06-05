    <!DOCTYPE html>
    <html lang="pt-br">

    <?php
    $css = ["/css/cliente/Categoria.css"];
    require_once("./utils/head.php");
    require_once("$PATH_CONTROLLER/cliente/CategoriaController.php");
    $subcategoriaChecked = $subcategoriaChecked ?? null;
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
                    <form method='POST' action='FiltroSubcategoria' class='grid_filtro'>
                        <?php
                        $categoriaController = new CategoriaController;
                        $subcategorias = $categoriaController->sendSubcategoria();
                        foreach ($subcategorias as $subcategoria) {
                            $checked = (isset($subcategoriaChecked) && $subcategoriaChecked == $subcategoria['id_subcategoria']) ? 'checked' : '';
                            echo "
                            <div class='filtro_item font_descricao'>
                                <input type='radio' id='categoria-checkbox' name='subcategoria' {$checked} class='css_checkbox' value='" . $subcategoria['id_subcategoria'] . "'onchange='this.form.submit()';/>
                                <label class='fit_content' for='subcategoria'>" . $subcategoria['nome_subcategoria'] . "</label>
                            </div>";
                        }
                        ?>
                    </form>
                </div>
            </div>

            <div class="produtos_container bg_branco">
                <h2 class="font_cinza font_subtitulo">Destaques</h2>
                <div id="destaque_produtos" class="linha_card_produto grid_produtos">
                    <?php
                    include_once("$PATH_COMPONENTS/php/card_produto.php");
                    include_once("$PATH_CONTROLLER/geral/CardController.php");
                    $card = new cardProduto;
                    $controller = new CardController;
                    if (isset($produtosFiltrados)) {
                        $card->gerarProdutoCards(6, $produtosFiltrados);
                    } else {
                        $info = $controller->filtrarProdutosCategoria($categoria);
                        $card->gerarProdutoCards(6, $info);
                    }
                    ?>
                </div>
                <h2 class="font_cinza font_subtitulo">Produtos</h2>
                <div class="produtos_categoria">
                    <?php if (isset($produtosFiltrados)) {
                        $card->gerarProdutoCards(12, $produtosFiltrados);
                    } else {
                        $card->gerarProdutoCards(12, $info);
                    }?>
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