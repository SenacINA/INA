<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/cliente/footer.css">
    <link rel="stylesheet" href="../../css/cliente/categoria.css">
    <script src="../../js/geral/base.js"></script>
    <title>Categoria</title>
</head>

<body class="gradiente_azul">
    <?php
    include_once('../../pages/geral/navbar.php');
    ?>

    <div class="img_fundo largura_com_scroll">
        <div class="index_body_carrossel">
            <div class="index_body_carrossel_content">
                <button class="index_body_carrossel_but back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                    </svg>
                </button>
                <div class="carousel-container">
                    
                    <div class="carousel-wrapper">
                        <img id="carrossel_image" src="./image/index/carrosselConsole.png" alt="Imagem Carrossel">
                    </div>

                    
                </div>
                <button class="index_body_carrossel_but forward">                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                    </svg> 
                </button>
            </div>
            <div class="index_body_carrossel_nav">
                <button class="active" onclick="currentSlide(1)"></button>
                <button onclick="currentSlide(2)"></button>
                <button onclick="currentSlide(3)"></button>
                <button onclick="currentSlide(4)"></button>
            </div>
            <div class="index_body_categorias_nav">
                <div class="index_body_categorias_block" onclick="pag('cliente/categoria',0)">
                    <img src="./image/index/carrosselHardware.png" alt="">
                    <p>Hardware</p>
                </div>
                <div class="index_body_categorias_block" onclick="pag('cliente/categoria',0)">
                    <img src="./image/index/carrosselPerifericos.png" alt="">
                    <p>Periféricos</p>
                </div>
                <div class="index_body_categorias_block" onclick="pag('cliente/categoria',0)">
                    <img src="./image/index/carrosselEscritorio.png" alt="">
                    <p>Escritório</p>
                </div>
                <div class="index_body_categorias_block" onclick="pag('cliente/categoria',0)">
                    <img src="./image/index/carrosselCelulares.png" alt="">
                    <p>Celulares</p>
                </div>
                <div class="index_body_categorias_block" onclick="pag('cliente/categoria',0)">
                    <img src="./image/index/carrosselEletro.png" alt="">
                    <p>Eletrodomésticos</p>
                </div>
            </div>
        </div>
        
    </div>

    <main class="conteudo_categoria grid_categoria">
        <div class="mobile-filters-dropdown">
            <button class="dropdown-toggle">
                Filtrar
                <img src="../../image/geral/icons/configure.svg" alt="filtro">
            </button>
        </div>

        <div class="filtros">
            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Marcas</h2>
                    <img src="../../image/geral/icons/seta_filtro.svg" alt="Setinha">
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

            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Conexão</h2>
                    <img src="../../image/geral/icons/seta_filtro.svg" alt="Setinha">
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

            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Comprimento</h2>
                    <img src="../../image/geral/icons/seta_filtro.svg" alt="Setinha">
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

            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Cor</h2>
                    <img src="../../image/geral/icons/seta_filtro.svg" alt="Setinha">
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
                    include_once ('../../pages/geral/card_produto.php');
                    gerarProdutoCards(6, 0);
                ?>
            </div>
            <h2 class="font_cinza font_subtitulo">Produtos</h2>
            <div class="produtos_categoria">
                <div id="linha1" class="linha_card_produto grid_produtos">
                    <?php 
                        gerarProdutoCards(6, 0);
                    ?>

                </div>
                <div id="linha2" class="linha_card_produto grid_produtos">
                    <?php 
                        gerarProdutoCards(6, 0);
                    ?>

                </div>
                <div id="linha3" class="linha_card_produto grid_produtos">
                    <?php 
                        gerarProdutoCards(6, 0);
                    ?>

                </div>
                <div id="linha4" class="linha_card_produto grid_produtos">
                    <?php 
                        gerarProdutoCards(6, 0);
                    ?>

                </div>
                <div id="linha5" class="linha_card_produto grid_produtos">
                    <?php 
                        gerarProdutoCards(6, 0);
                    ?>
                </div>
            </div>
        </div>
    </main>
    <button id="btnTopo" class="btn-topo" title="Voltar ao topo">
        <img src="../../image/geral/icons/seta_cima.svg" alt="">
    </button>
    <?php 
      include_once('../../pages/geral/footer.php');
    ?>
    <!-- <script type="text/javascript" src="../../js/cliente/categoria.js"></script> -->
</body>
<script src='../../js/geral/btn_topo.js'></script>
<script src="../../js/cliente/carrossel.js"></script>
<script src='../../js/cliente/filtro.js'></script>
</html>