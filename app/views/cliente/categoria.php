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
                <div class="container_filtro">
                    <div class="titulo_filtro">
                        <h2 class="font_cinza font_subtitulo">Categorias</h2>
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro.svg" alt="Setinha">
                    </div>
                    <div class='grid_filtro'>
                        <?php
                        $categoriaController = new CategoriaController;
                        $subcategorias = $categoriaController->sendSubcategoria();
                        foreach ($subcategorias as $subcategoria) {
                            $checked = (isset($subcategoriaChecked) && $subcategoriaChecked == $subcategoria['id_subcategoria']) ? 'checked' : '';
                            echo "
                            <div class='filtro_item font_descricao'>
                                <input type='radio' id='categoria-checkbox' name='subcategoria' {$checked} class='css_checkbox' value='" . $subcategoria['id_subcategoria'] . "'/>
                                <label class='fit_content' for='subcategoria'>" . $subcategoria['nome_subcategoria'] . "</label>
                            </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="produtos_container bg_branco">
                <h2 class="font_cinza font_subtitulo">Destaques</h2>
                <div id="destaque_produtos" class="linha_card_produto grid_produtos">
                </div>
                <h2 class="font_cinza font_subtitulo">Produtos</h2>
                <div class="produtos_categoria">
                    <cardProduto data-id="<?= $categoria ?>" id="produtos_categoria_div"></cardProduto>
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
    <script src='<?= $PATH_PUBLIC ?>/js/geral/BtnTopo.js'></script>
    <script src="<?= $PATH_PUBLIC ?>/js/geral/carrossel.js"></script>
    <script src='<?= $PATH_PUBLIC ?>/js/cliente/Filtros.js'></script>
    <script src="<?= $PATH_PUBLIC ?>/js/cliente/produtosCategoria.js" type="module"></script>

    </html>