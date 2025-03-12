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
                    <p id='indexBodyValorAntigo'>R$100</p>
                    <p id='indexBodyValorProduto'>R$1000</p>
                </div>
            </div>
            <div class='index_body_botoes_produto'>
                <button>
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' viewBox='0 0 26 26' fill='none'>
                        <path d='M5.78305 4.44444H23.75L21.3056 13H7.09931M22.5278 17.8889H7.86111L5.41667 2H1.75M9.08333 22.7778C9.08333 23.4528 8.53612 24 7.86111 24C7.1861 24 6.63889 23.4528 6.63889 22.7778C6.63889 22.1027 7.1861 21.5556 7.86111 21.5556C8.53612 21.5556 9.08333 22.1027 9.08333 22.7778ZM22.5278 22.7778C22.5278 23.4528 21.9806 24 21.3056 24C20.6305 24 20.0833 23.4528 20.0833 22.7778C20.0833 22.1027 20.6305 21.5556 21.3056 21.5556C21.9806 21.5556 22.5278 22.1027 22.5278 22.7778Z' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/>
                    </svg>
                </button>
                <button>
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
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    <title>E ao Quadrado</title>
    <link rel="icon" type="image/x-icon" href="./image/geral/icone_eaoquadrado.ico">
</head>
<body>
    <?php
    include('./pages/geral/navbar.php');
    ?>
</body>
</html>
