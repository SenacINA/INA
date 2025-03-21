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
    <!-- fazer responsividade -->
     
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
                    <img id="carrossel_image" src="../../image/index/carrosselConsole.png" alt="Imagem Carrossel">
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
        
    </div>
    </div>

    <main class="conteudo_categoria grid_categoria">
        <div class="filtros">
            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Marcas</h2>
                    <img src="../../image/cliente/categoria/img_seta_triangulo.png" alt="Setinha">
                </div>

                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto1_1">LogiTech</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_2" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto1_2">Razer</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_3" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto1_3">Kingston</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto1_4" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto1_4">MultiLaser</label>
                    </div>
                </div>
            </div>
            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Conexão</h2>
                    <img src="../../image/cliente/categoria/img_seta_triangulo.png" alt="Setinha">
                </div>

                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto2_1">24 Pinos</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_2" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto2_2">8 Pinos</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_3" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto2_3">Bluetooth</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto2_4" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto2_4">Com Fio</label>
                    </div>
                </div>
            </div>
            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Comprimento</h2>
                    <img src="../../image/cliente/categoria/img_seta_triangulo.png" alt="Setinha">
                </div>

                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto3_1">1 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_2" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto3_2">1,2 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_3" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto3_3">1,5 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_4" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto3_4">1,8 m</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto3_5" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto3_5">2 m</label>
                    </div>
                </div>
            </div>
            <div class="container_filtro bg_branco">
                <div class="titulo_filtro">
                    <h2 class="font_cinza font_subtitulo">Cor</h2>
                    <img src="../../image/cliente/categoria/img_seta_triangulo.png" alt="Setinha">
                </div>

                <div class="grid_filtro">
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_1" name="checkbox" class="css_checkbox" />
                        <label class="fit_content" for="card_produto4_1">Azul</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_2" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto4_2">Amarelo</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_3" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto4_3">Branco</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_4" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto4_4">Cinza</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_5" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto4_5">Rosa</label>
                    </div>
                    <div class="filtro_item font_descricao">
                        <input type="checkbox" id="card_produto4_6" name="checkbox"  class="css_checkbox"/>
                        <label class="fit_content" for="card_produto4_6">Preto</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="produtos_container bg_branco">
            <h2 class="font_cinza font_subtitulo">Destaques</h2>
            <div id="destaque_produtos" class="linha_card_produto grid_produtos">

            </div>
            <h2 class="font_cinza font_subtitulo">Produtos</h2>
            <div class="produtos_categoria">
                <div id="linha1" class="linha_card_produto grid_produtos">

                </div>
                <div id="linha2" class="linha_card_produto grid_produtos">

                </div>
                <div id="linha3" class="linha_card_produto grid_produtos">

                </div>
                <div id="linha4" class="linha_card_produto grid_produtos">

                </div>
                <div id="linha5" class="linha_card_produto grid_produtos">

                </div>
            </div>
        </div>
    </main>
    <br>
    <div class="container_voltar">
        <button class="redefinir_email_1_botao_voltar" onclick="history.back()">
            <img src="../../image/geral/seta_botao_branco.svg" alt="">Voltar
        </button>
    </div>
    <br>
    <template id="produto_card_template">
        <div class="produto_card bg_branco">
            <div id="card_desconto_template" class="card_desconto font_descricao font_bold font_10px">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 21" fill="none" style="position: absolute;">
                    <path d="M0 0.5H80V20.5H0L17.3359 10.5L0 0.5Z" fill="#006494"/>
                </svg>
                <p class="valor_desconto">30</p>
                <p class="texto_esquerda">% OFF</p>
            </div>
            <a target="_blank" href="about:blank">
                <img src="https://placehold.co/200x225.webp?text=Placeholder\n200w\nx\n225h"  alt="Placeholder">
            </a>
            <p class="produto_nome font_descricao font_bold font_14px">Nome produto placeholder Nome produto placeholder</p>
            <div class="produto_preco_estrela font_descricao font_bold font_14px">
                <div class="container_card_estrela">
                    <p class="card_estrela_texto font_14px">★★★★★</p>
                    <p class="card_estrela_quantidade font_10px">(1342)</p>
                </div>
                <div class="container_card_preco">
                    <p class="card_preco_desconto font_10px">R$24.532,90</p>
                    <p class="card_preco">R$24.532,90</p>
                </div>
            </div>
            <div class="produto_botoes">
                <button type="button" onclick="pag('cliente/carrinho_vazio')" class="botao_estilo font_14px">
                    <svg class="icone_carrinho" xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none">
                        <path d="M5.78305 3.94444H23.75L21.3056 12.5H7.09931M22.5278 17.3889H7.86111L5.41667 1.5H1.75M9.08333 22.2778C9.08333 22.9528 8.53612 23.5 7.86111 23.5C7.1861 23.5 6.63889 22.9528 6.63889 22.2778C6.63889 21.6027 7.1861 21.0556 7.86111 21.0556C8.53612 21.0556 9.08333 21.6027 9.08333 22.2778ZM22.5278 22.2778C22.5278 22.9528 21.9806 23.5 21.3056 23.5C20.6305 23.5 20.0833 22.9528 20.0833 22.2778C20.0833 21.6027 20.6305 21.0556 21.3056 21.0556C21.9806 21.0556 22.5278 21.6027 22.5278 22.2778Z" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button type="button" onclick="pag('cliente/produto')" class="botao_estilo font_14px">
                    Comprar
                </button>
            </div>
        </div>
    </template>
    <?php 
      include_once('../../pages/geral/footer.php');
    ?>
    <script type="text/javascript" src="../../js/cliente/categoria.js"></script>
</body>
<script src="../../js/cliente/carrossel.js"></script>
</html>