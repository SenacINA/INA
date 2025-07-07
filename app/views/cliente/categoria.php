    <!DOCTYPE html>
    <html lang="pt-br">

    <?php
    $css = ["/css/cliente/Categoria.css"];
    require_once("./utils/head.php");
    require_once("$PATH_CONTROLLER/cliente/CategoriaController.php");
    $subcategoriaChecked = $subcategoriaId;
    ?>

    <body class="gradiente_azul">
        <?php
        include_once("$PATH_COMPONENTS/php/navbar.php");
        ?>

        <div class="img_fundo largura_com_scroll">
            <div id="carrosel_container" class="carrossel" data-path='./public' style="background: url('./public/image/index/fundoCarrossel.jpg') center/cover no-repeat">
            </div>
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
                    <form method="POST" action="FiltrarSubcategoria" class='grid_filtro'>
                        <?php
                        $categoriaController = new CategoriaController;
                        $subcategorias = $categoriaController->sendSubcategoria();
                        foreach ($subcategorias as $subcategoria) {
                            $checked = (isset($subcategoriaChecked) && $subcategoriaChecked == $subcategoria['id_subcategoria']) ? 'checked' : '';
                            echo "
                            <div class='filtro_item font_descricao'>
                                <input type='radio' id='categoria-checkbox' name='subcategoria' {$checked} class='css_checkbox' value='" . $subcategoria['id_subcategoria'] . "' onchange='this.form.submit()'/>
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
                <div
                    <?= isset($subcategoriaId)
                        ? "data-id-subcategoria='{$subcategoriaId}'"
                        : "data-id='{$categoria}'"
                    ?>
                    id="produtos_categoria_div"
                    class="produtos_categoria">

                </div>
            </div>
        </main>
        <button id="btnTopo" class="btn-topo" title="Voltar ao topo">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_cima.svg" alt="">
        </button>
        <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
        ?>
    </body>
    <script src='<?= $PATH_PUBLIC ?>/js/geral/BtnTopo.js'></script>
    <script type="module" src="<?= $PATH_PUBLIC ?>/js/geral/carrossel.js"></script>
    <script src='<?= $PATH_PUBLIC ?>/js/cliente/Filtros.js' type="module"></script>
    <script src='<?= $PATH_PUBLIC ?>/js/geral/card.js'></script>
    <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>

    </html>