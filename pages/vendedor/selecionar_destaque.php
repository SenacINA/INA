<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/vendedor/selecionar_destaque.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <!-- fazer a responsividade -->
    <!--arrumar o nome das class  -->

    <?php
    include_once('../../pages/geral/navbar.php');
    ?>

    <div class="vendedor_selecionar_destaque_conteudo_externo display_grid">
        <div class="vendedor_selecionar_destaque_barra_azul bg_sappire">
            <h2 class="font_titulo">SELECIONAR DESTAQUES</h2>
        </div>
        <div class="vendedor_selecionar_destaque_produtos">
            <h2 class="font_titulo vendedor_selecionar_destaque_titulo">DESTAQUES</h2>
            <div class="vendedor_selecionar_destaque_produto_holder">
                <div class="vendedor_selecionar_destaque_cartao_produto">
                    <img src="https://placehold.co/200x200.png" alt="Gaming Chair" class="product_image">
                    <div class="vendedor_selecionar_destaque_produto_titulo">Nova DigitalDeluxe Matrix S2 Pro</div>
                    <div class="vendedor_selecionar_destaque_estrelas">★★★★☆</div>
                    <div class="vendedor_selecionar_destaque_preco">R$2.099,99</div>
                </div>
                <div class="vendedor_selecionar_destaque_cartao_produto">
                    <img src="https://placehold.co/200x200.png" alt="Gaming Keyboard" class="product_image">
                    <div class="vendedor_selecionar_destaque_produto_titulo">Fone De Ouvido Ultra Avançar</div>
                    <div class="vendedor_selecionar_destaque_estrelas">★★★★★</div>
                    <div class="vendedor_selecionar_destaque_preco">R$569,99</div>
                </div>
                <div class="vendedor_selecionar_destaque_cartao_produto">
                    <img src="https://placehold.co/200x200.png" alt="Gaming Headset" class="product_image">
                    <div class="vendedor_selecionar_destaque_produto_titulo">Headset Gamer Star Pro Astro A50</div>
                    <div class="vendedor_selecionar_destaque_estrelas">★★★★☆</div>
                    <div class="vendedor_selecionar_destaque_preco">R$899,99</div>
                </div>
            </div>
        </div>

        <table class="vendedor_selecionar_destaque_tabela_produto">
            <thead>
                <tr>
                    <th class="vendedor_selecionar_destaque_tabela_titulo">PRODUTO</th>
                    <th class="vendedor_selecionar_destaque_tabela_titulo">PREÇO</th>
                    <th class="vendedor_selecionar_destaque_tabela_titulo">PROMOÇÃO</th>
                    <th class="vendedor_selecionar_destaque_tabela_titulo">VALOR FINAL</th>
                    <th class="vendedor_selecionar_destaque_tabela_titulo">TOTAL DE VENDAS</th>
                    <th class="vendedor_selecionar_destaque_tabela_titulo">CLASSIFICAÇÃO</th>
                    <th class="vendedor_selecionar_destaque_tabela_titulo">AVALIAÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <tr class="vendedor_selecionar_destaque_tabela_linha">
                    <td class="vendedor_selecionar_destaque_tabela_celula">
                        <img src="https://placehold.co/50x50.png" alt="Product" class="small_product_image">
                        Cadeira Gamer Throne - RGB
                    </td>
                    <td class="vendedor_selecionar_destaque_tabela_celula">R$2.000,00</td>
                    <td class="vendedor_selecionar_destaque_tabela_celula">45% OFF</td>
                    <td class="vendedor_selecionar_destaque_tabela_celula">R$1.400,00</td>
                    <td class="vendedor_selecionar_destaque_tabela_celula">573 UN</td>
                    <td class="vendedor_selecionar_destaque_tabela_celula">4.5 Estrelas</td>
                    <td class="vendedor_selecionar_destaque_tabela_celula">689</td>
                </tr>
                <!-- Additional rows with similar structure -->
            </tbody>
        </table>

    </div>
</body>

</html>


<!-- <body>
    <header class="nav_bar">
        <h1>Nav</h1>
    </header>
    <div class="vendedor_selecionar_destaque_barra_azul">
        <p>Selecionar Destaques</p>
    </div>
    <div class="vendedor_selecionar_destaque_conteudo display_grid">
        <div class="vendedor_selecionar_destaque_opcoes">
            <h2>Destaques</h2>

            <div class="vendedor_selecionar_destaque_grid_produtos display_grid">
                <div class="prod">
                    <p>Lol</p>
                </div>
                <div class="prod">
                    <p>Lol</p>
                </div>
                <div class="prod">
                    <p>Lol</p>
                </div>
            </div>
        </div>
    </div>
</body> -->