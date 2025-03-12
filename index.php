<?php
function gerarProdutoCards($quantidade) {
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
            <div class='index_body_botoes_produto'>
                <button onclick=\"pag('cliente/login')\">
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' viewBox='0 0 26 26' fill='none'>
                        <path d='M5.78305 4.44444H23.75L21.3056 13H7.09931M22.5278 17.8889H7.86111L5.41667 2H1.75M9.08333 22.7778C9.08333 23.4528 8.53612 24 7.86111 24C7.1861 24 6.63889 23.4528 6.63889 22.7778C6.63889 22.1027 7.1861 21.5556 7.86111 21.5556C8.53612 21.5556 9.08333 22.1027 9.08333 22.7778ZM22.5278 22.7778C22.5278 23.4528 21.9806 24 21.3056 24C20.6305 24 20.0833 23.4528 20.0833 22.7778C20.0833 22.1027 20.6305 21.5556 21.3056 21.5556C21.9806 21.5556 22.5278 22.1027 22.5278 22.7778Z' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/>
                    </svg>
                </button>
                <button onclick=\"pag('cliente/produto')\">
                    Comprar
                </button>
            </div>
        </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    <title>E ao Quadrado</title>
    <link rel="icon" type="image/x-icon" href="./image/geral/icone_eaoquadrado.ico">    
    <script src="js/geral/base.js"></script>
</head>
<body>
<header class="nav style_nav shadow_nav">
    <div class="grid-container style_nav">
        <div class="item1">
            <img id="imgLupa" src="./image/index/lupa.png" alt="">
            <input type="text">
        </div>
        <div class="item2">
            <button id="buttonLogo">
                <a href="#">
                    <img href="#" id="imgLogo" src="./image/index/Logo.svg">
                </a>
            </button>
        </div>
        <div class="item3">
            <a class="button" href="#">
                <img src="./image/index/user.png" alt="Usuário">
            </a>
            <a class="button" href="#">
                <img src="./image/index/carrinho.png" alt="Carrinho">
            </a>
            <a class="button" href="#">
                <img src="./image/index/config.png" alt="Configurações">
            </a>
        </div>
    </div>
</header>
<div class="index_body_main_container">
    <div class="index_body_carrossel">
        <div class="index_body_carrossel_content">
            <button class="index_body_carrossel_but back">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                </svg>
            </button>
            <div class="index_body_carrossel_text">
                <h2>CONSOLES</h2>
                <h3>Experimente a próxima geração de entretenimento com nossos consoles de última tecnologia!</h3>
            </div>
            <img id="fg_image" src="./image/index/fgCarrosselEx.png" alt="">
            <button class="index_body_carrossel_but forward">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                </svg> 
            </button>
        </div>
        <div class="index_body_carrossel_nav">
            <button class="active"></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        <div class="index_body_categorias_nav">
            <div class="index_body_categorias_block" onclick="pag('cliente/categoria')">
                <img src="./image/index/carrosselHardware.png" alt="">
                <p>Hardware</p>
            </div>
            <div class="index_body_categorias_block" onclick="pag('cliente/categoria')">
                <img src="./image/index/carrosselPerifericos.png" alt="">
                <p>Periféricos</p>
            </div>
            <div class="index_body_categorias_block" onclick="pag('cliente/categoria')">
                <img src="./image/index/carrosselEscritorio.png" alt="">
                <p>Escritório</p>
            </div>
            <div class="index_body_categorias_block" onclick="pag('cliente/categoria')">
                <img src="./image/index/carrosselCelulares.png" alt="">
                <p>Celulares</p>
            </div>
            <div class="index_body_categorias_block" onclick="pag('cliente/categoria')">
                <img src="./image/index/carrosselEletro.png" alt="">
                <p>Eletrodomésticos</p>
            </div>
        </div>
    </div>
    <div class="index_body_bg_container">
        <div class="index_body_content_container">
            <div class="index_body_ad_box">
                <div class="index_body_big_ad">
                    <img src="./image/index/BannerCupom25.jpg" alt="">
                </div>
                <div class="index_body_mid_ad">
                    <img src="./image/index/BannerCupom10.jpg" alt="">
                    <img src="./image/index/BannerGarantia.jpg" alt="">
                </div>
            </div>
            <h1>Descobertas do Dia</h1>
            <div class="index_body_produto_container">
                <div class="index_body_container_title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M17.66 11.2c-.23-.3-.51-.56-.77-.82c-.67-.6-1.43-1.03-2.07-1.66C13.33 7.26 13 4.85 13.95 3c-.95.23-1.78.75-2.49 1.32c-2.59 2.08-3.61 5.75-2.39 8.9c.04.1.08.2.08.33c0 .22-.15.42-.35.5c-.23.1-.47.04-.66-.12a.6.6 0 0 1-.14-.17c-1.13-1.43-1.31-3.48-.55-5.12C5.78 10 4.87 12.3 5 14.47c.06.5.12 1 .29 1.5c.14.6.41 1.2.71 1.73c1.08 1.73 2.95 2.97 4.96 3.22c2.14.27 4.43-.12 6.07-1.6c1.83-1.66 2.47-4.32 1.53-6.6l-.13-.26c-.21-.46-.77-1.26-.77-1.26m-3.16 6.3c-.28.24-.74.5-1.1.6c-1.12.4-2.24-.16-2.9-.82c1.19-.28 1.9-1.16 2.11-2.05c.17-.8-.15-1.46-.28-2.23c-.12-.74-.1-1.37.17-2.06c.19.38.39.76.63 1.06c.77 1 1.98 1.44 2.24 2.8c.04.14.06.28.06.43c.03.82-.33 1.72-.93 2.27"/>
                    </svg>
                    <h2>Novidades</h2>
                </div>
                <div class="index_body_produtos_content">
                    <?php gerarProdutoCards(6); ?>
                </div>
                <div class="index_body_ver_mais" onclick="pag('cliente/categoria')">
                    <p>Ver Mais</p>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="index_body_produto_container">
                <div class="index_body_container_title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path fill="currentColor" fill-rule="evenodd" d="M9.744 2.072L7.818.917L5.892 2.072l-2.237.198l-.88 2.066l-1.693 1.475L1.585 8l-.503 2.189l1.693 1.475l.88 2.066l2.237.198l1.926 1.155l1.926-1.155l2.237-.198l.88-2.066l1.694-1.475L14.05 8l.504-2.189l-1.694-1.475l-.88-2.066zM5.5 6.5a.5.5 0 1 1 1 0a.5.5 0 0 1-1 0M6 5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m-.146 5.854l5-5l-.708-.708l-5 5zM9.5 10a.5.5 0 1 1 1 0a.5.5 0 0 1-1 0m.5-1.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" clip-rule="evenodd"/>
                    </svg>
                    <h2>Descontos</h2>
                </div>
                <div class="index_body_produtos_content">
                    <?php gerarProdutoCards(6); ?>
                </div>
                <div class="index_body_ver_mais" onclick="pag('cliente/categoria')">
                    <p>Ver Mais</p>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                        </svg>
                    </button>
                </div>
            </div>
            <img class="index_body_large_ad" src="./image/index/BannerRedragon.jpg" alt="">
            <div class="index_body_produto_container">
                <div class="index_body_container_title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/>
                    </svg>
                    <h2>Mais Vendidos</h2>
                </div>
                <div class="index_body_produtos_content">
                    <?php gerarProdutoCards(6); ?>
                </div>
                <div class="index_body_ver_mais" onclick="pag('cliente/categoria')">
                    <p>Ver Mais</p>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
