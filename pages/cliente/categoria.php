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
    <title>Categoria</title>
</head>
<body class="gradiente_azul">
    <!-- fazer responsividade -->
     
    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <div class="img_fundo largura_com_scroll">
        <div class="carrossel_categoria">
            <img src="../../image/cliente/categoria/img_carrossel_placeholder.png" alt="carrossel">
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
        <button class="botao_voltar font_subtitulo bg_branco">
            Voltar
        </button>
    </div>
    <br>
    <footer>
        <div class="svg-margin">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1926 585" width="1920" height="585">
                <title>image</title>
                <style>
                    .s0 { fill: #44aae4 } 
                    .s1 { fill: #0f3b62 } 
                </style>
                <g id="Layer 1">
                    <path id="Path 0" class="s0" d="m983 0.6c-4.1 0.2-14.5 0.8-23 1.4-8.5 0.6-25 2-36.5 3.1-11.5 1.1-30 3.1-41 4.5-11 1.3-33 4.4-49 6.9-16 2.5-40.3 6.5-54 8.9-13.8 2.5-40.8 7.4-60 11-19.3 3.6-53.7 10.2-76.5 14.6-22.8 4.5-73 14.2-111.5 21.6-38.5 7.4-76.8 14.6-85 16-8.3 1.4-20.4 3.2-27 4-6.6 0.8-20.8 2.1-31.5 2.9-10.7 0.8-30.5 1.5-44 1.5-13.5 0-33.7-0.7-45-1.5-11.3-0.9-28.4-2.5-38-3.6-9.6-1.1-25.6-3.4-35.5-5-9.9-1.6-23.6-4-30.5-5.3-6.9-1.4-20.2-4.3-29.5-6.4-9.3-2.2-26.2-6.6-37.5-9.7-11.3-3.1-28.4-8-38-11-9.6-3-26.7-8.5-38-12.4-11.3-3.8-27.5-9.4-36-12.5-8.5-3.1-15.9-5.7-16-5.7 0 0.2 0 5 0 11.1 0 9.7 0 7.5 0 10.6 1 0.2 15 5.3 29 10.2 14 5 35.6 12.2 48 16.1 12.4 3.8 29.9 9.1 39 11.6 9.1 2.6 26.4 7.1 38.5 10 12.1 3 30.1 7 40 8.9 9.9 1.9 25.4 4.6 34.5 6 9.1 1.4 24.6 3.5 34.5 4.5 9.9 1.1 25.4 2.6 34.5 3.2 9.1 0.7 29.8 1.2 46 1.2 16.2 0 36.5-0.6 45-1.2 8.5-0.6 21.6-1.8 29-2.7 7.4-0.8 20.3-2.6 28.5-4 8.3-1.4 52.4-9.7 98-18.5 45.6-8.8 101.5-19.6 124-23.9 22.5-4.3 55.6-10.6 73.5-13.9 17.9-3.4 44.4-8.1 59-10.5 14.6-2.5 37.3-6.1 50.5-8 13.2-1.9 31.6-4.4 41-5.5 9.4-1.1 21.5-2.5 27-3.1 5.5-0.5 17.6-1.7 27-2.5 9.4-0.8 30.3-1.9 46.5-2.6 17.7-0.7 42.1-0.9 61-0.5 17.3 0.3 41.4 1.3 53.5 2.1 12.1 0.8 27.2 1.9 33.5 2.5 6.3 0.5 19.8 1.9 30 3.1 10.2 1.1 24.6 2.9 32 4 7.4 1.1 22.5 3.5 33.5 5.4 11 1.9 28.8 5.2 39.5 7.4 10.7 2.2 31.9 7.2 47 11 15.1 3.8 38.8 10.1 52.5 13.9 13.8 3.8 38 10.6 54 15 16 4.4 38.7 10.5 50.5 13.5 11.8 3 29.4 7.3 39 9.5 9.6 2.2 28.8 6.1 42.5 8.6 13.8 2.5 34.2 5.9 45.5 7.5 11.3 1.7 31.5 4.1 45 5.5 13.5 1.4 35.1 3.3 48 4.1 12.9 0.9 39.9 1.9 60 2.2 22 0.3 46.8 0.1 62.5-0.6 14.3-0.6 33-1.8 41.5-2.6 8.5-0.9 20.5-2.2 26.5-3 6-0.9 16.2-2.4 22.5-3.5 6.3-1.1 12.6-2 13-2 0 0 0-10.5 0-10.5 0-10.4 0-9.3 0-10.5-1.2 0.3-9.9 1.8-16.5 2.9-6.6 1.1-17 2.7-23 3.5-6 0.8-19.1 2.2-29 3.1-9.9 0.9-33.3 2-52 2.5-18.8 0.4-46.1 0.4-61 0-14.8-0.5-35.1-1.4-45-2-9.9-0.6-29.3-2.2-43-3.6-13.8-1.4-35.3-4.1-48-5.9-12.7-1.9-31.5-4.9-42-6.9-10.5-1.9-25.3-4.9-33-6.6-7.7-1.7-26.4-6.2-41.5-10-15.1-3.8-40.8-10.6-57-15-16.2-4.5-42.5-11.7-58.5-16.1-16-4.4-39.6-10.6-52.5-13.9-12.9-3.2-32-7.6-42.5-9.8-10.5-2.2-28-5.6-39-7.6-11-1.9-28.1-4.6-38-6-9.9-1.4-26.3-3.4-36.5-4.5-10.2-1.2-31.1-3-46.5-4.2-22.3-1.7-38.6-2.1-79.5-2.4-28.3-0.1-54.9-0.1-59 0.1z"/>
                    <path id="Path 1" class="s1" d="m986.5 21c-10.5 0.5-25.3 1.3-33 2-7.7 0.6-20.8 1.7-29 2.6-8.3 0.8-22.6 2.3-32 3.5-9.4 1.1-27.8 3.6-41 5.5-13.2 1.9-35.9 5.5-50.5 8-14.6 2.4-41.1 7.1-59 10.5-17.9 3.3-51 9.6-73.5 13.9-22.5 4.3-78.4 15.1-124 23.9-45.6 8.8-89.8 17.1-98 18.5-8.3 1.4-21.1 3.2-28.5 4-7.4 0.9-20.5 2.1-29 2.7-8.5 0.6-28.8 1.2-45 1.2-16.2 0-36.9-0.5-46-1.2-9.1-0.6-24.6-2.1-34.5-3.2-9.9-1-25.4-3.1-34.5-4.5-9.1-1.4-24.6-4.1-34.5-6-9.9-1.9-27.9-5.9-40-8.9-12.1-2.9-29.4-7.4-38.5-10-9.1-2.5-26.6-7.8-39-11.6-12.4-3.9-34-11.1-48-16.1-14-4.9-28-10.3-29-10.6v549.8h1926c0-176.2 0-471.6 0-471.6 0 0-6.7 1.5-13 2.6-6.3 1.1-16.5 2.6-22.5 3.5-6 0.8-18 2.1-26.5 3-8.5 0.8-27.2 2-41.5 2.6-15.7 0.7-40.5 0.9-62.5 0.6-20.1-0.3-47.1-1.3-60-2.2-12.9-0.8-34.5-2.7-48-4.1-13.5-1.4-33.7-3.8-45-5.5-11.3-1.6-31.8-5-45.5-7.5-13.8-2.5-32.9-6.4-42.5-8.6-9.6-2.2-27.2-6.5-39-9.5-11.8-3-34.5-9.1-50.5-13.5-16-4.4-40.3-11.2-54-15-13.8-3.8-37.4-10.1-52.5-13.9-15.1-3.8-36.3-8.8-47-11-10.7-2.2-28.5-5.5-39.5-7.4-11-1.9-26.1-4.3-33.5-5.4-7.4-1.1-21.8-2.9-32-4-10.2-1.2-23.7-2.6-30-3.1-6.3-0.6-21.4-1.8-33.5-2.6-12.1-0.8-40-1.6-62-1.9-22-0.2-48.5 0-59 0.5z"/>
                </g>
            </svg>
            <div class="grid-overlay">
                <div class="grid-item">
                    <h2>Categorias</h2>
                    <a href="#">Hardware</a>
                    <a href="#">Periféricos</a>
                    <a href="#">Escritório</a>
                    <a href="#">Celulares</a>
                    <a href="#">Eletrodomésticos</a>
                    <a href="#">Games</a>
                    <a href="#">Livros</a>
                    <a href="#">Áudio</a>
                    <a href="#">Geek</a>
                </div>
                <div class="grid-item" id="categorias">
                    <h2>Termos e condições</h2>
                    <h3 id="faq">FAQ</h3>
                    <a href="#">Acessibilidade</a>
                    <a href="#">Privacidade e Proteção de dados</a>
                    <a href="#">Informações de venda</a>
                    <a href="#">Trabalhe conosco</a>
                </div>
                <div class="grid-item">
                    <h2>Contato</h2>
                    <p>Horário de atendimento:</p>
                    <p>07:00 a 22:00</p>
                    <p>Todos os Dias</p>
                    <p>Loja Virtual</p>
                    <p>(67) 91234-5678</p>
                    <p>E-mail:</p>
                    <p>Eaoquadrado@gmail.com</p>
                </div>
                <div class="grid-item left_grid" id="logo">
                    <img src="../../image/geral/logo-eaoquadrado.png">
                    <div class="whats">
                        <img src="../../image/cliente/footer/whats_logo.png" height="42" width="42">
                        <a href="#">Chat via Whatsapp</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
                <button type="button" onclick="window.open('about:blank', '_blank');" class="botao_estilo font_14px">
                    <svg class="icone_carrinho" xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none">
                        <path d="M5.78305 3.94444H23.75L21.3056 12.5H7.09931M22.5278 17.3889H7.86111L5.41667 1.5H1.75M9.08333 22.2778C9.08333 22.9528 8.53612 23.5 7.86111 23.5C7.1861 23.5 6.63889 22.9528 6.63889 22.2778C6.63889 21.6027 7.1861 21.0556 7.86111 21.0556C8.53612 21.0556 9.08333 21.6027 9.08333 22.2778ZM22.5278 22.2778C22.5278 22.9528 21.9806 23.5 21.3056 23.5C20.6305 23.5 20.0833 22.9528 20.0833 22.2778C20.0833 21.6027 20.6305 21.0556 21.3056 21.0556C21.9806 21.0556 22.5278 21.6027 22.5278 22.2778Z" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button type="button" onclick="window.open('about:blank', '_blank');" class="botao_estilo font_14px">
                    Comprar
                </button>
            </div>
        </div>
    </template>
    <script type="text/javascript" src="../../js/cliente/categoria.js"></script>
</body>
</html>