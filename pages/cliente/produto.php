<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/cliente/produto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="../../js/geral/base.js"></script>
</head>
<body>
    <!-- Até 375px -->
    <!-- Caminho de Icon Correto -->
     
    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <div class='produto_main_container'>
        <div class="grid_produto">
            <div class="grid_nome_vendedor">
                <div class='produto_img_vendedor'>
                    <div class="imagem_nome_vendedor">
                        <img src="../../image/cliente/produto/user_thunder_gamers.png" alt="">
                    </div>
                    <div class="nome_vendedor">
                        <h1>THUNDER GAMERS</h1>
                        <h2>
                            <img src="../../image/geral/icons/localizacao_icon.svg" alt="">
                            São Paulo, São Paulo</h2>
                    </div>
                </div>
                
                <div class="avaliacao_vendedor">
                    <h1>AVALIAÇÃO GERAL</h1>
                    <div class='vendedor_rating'>
                        <h2 class='nome_vendedor_estrela'>★★★★★</h2>
                        <h2>4.5</h2>
                    </div>
                    <h3>(156mil+)</h3>
                </div>
            </div>

            <div class="grid_scroll">
                <div class="icon_scroll">
                    <img src="../../image/geral/icons/seta_menor_icon.svg" alt="">
                </div>

                <div class="images_scroll">
                    <div class='imagem_selecionada'><img src="../../image/cliente/produto/cadeira_gamer_1.jpg" alt=""></div>
                    <div><img src="../../image/cliente/produto/cadeira_gamer_2.jpg" alt=""></div>
                    <div><img src="../../image/cliente/produto/cadeira_gamer_3.jpg" alt=""></div>
                    <div><img src="../../image/cliente/produto/cadeira_gamer_4.jpg" alt=""></div>
                </div>


                <div class="icon_scroll foward">
                    <img src="../../image/geral/icons/seta_menor_icon.svg" alt="">
                </div>
            </div>

            <div class="grid_produto_image">
                <div class="produto_image">
                    <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="">
                </div>
                
            </div>

            <div class="grid_produto_info_bg">
                <div class="grid_produto_info">
                    <div class='produto_title'>
                        <div class="produto_info_nome">
                            <h1>CADEIRA GAMER THRONE - RGB</h1>
                        </div>
                        <div class="produto_info_text">
                            <h2>Vendido e entregue por: <a href=""><b>THUNDER GAMES</b></a> </h2>
                            <h3>Em estoque</h3>
                        </div>
                    </div>
                    <div class='div_produto_valor'>
                        <div class="grid_produto_info_valor">
                            <div class="produto_info_valor">
                                <h2>R$2000,00</h2>
                                <div class='produto_bandeira'>
                                    <h3>30%<br>OFF</h3>
                                </div>
                                <h1>R$1400,00</h1>
                            </div>
                        </div>
                        <div class="produto_info_text2">
                            <h2>À vista no PIX com até 10% OFF
                                <b>R$ 1400,00</b>
                                Em até 10x de
                                <b>R$ 140,00</b>
                                sem juros no cartão Ou em 1x no cartão com até 5% OFF
                            </h2>
                        </div>
                    </div>
                    
                    <div class="grid_produto_info_button">
                        <button class="base_botao btn_blue"><img src="../../image/geral/botoes/cesta_branca_icon.svg" alt="">CARRINHO</button>
                        <button class="base_botao btn_outline_blue" onclick="pag('cliente/carrinho_vazio')">
                            <img src="../../image/geral/botoes/+_carolina_icon.svg" alt="">
                            COMPRAR
                        </button>
                    </div>
                </div>
            </div>


            <div class="grid_consultar_frete_cupom">
                <div class="consultar_frete">
                    <h1>CONSULTAR FRETE</h1>
                    <div class="consultar_input">
                        <input class="base_input" type="text">
                        <button class='base_botao btn_blue btn_consulta'>Ok</button>
                    </div>
                </div>

                <div class="consultar_cupom">
                    <h1>CUPOM</h1>
                    <div class="consultar_input">
                        <input class="base_input" type="text">
                        <button class='base_botao btn_blue'>Ok</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="grid_descricao_produto">
        <div class="descricao_produto_item2">
            <img src="../../image/geral/icons/etiqueta_icon.svg" alt="">
            <h1>DESCRIÇÃO DO PRODUTO</h1>
        </div>
        <p><strong>CADEIRA GAMER THRONE RGB</strong></p>
        <p>A Cadeira Perfeita Ergonômica tem seu design baseado em características que trazem o máximo em conforto para várias horas de jogatina sem prejudicar sua coluna! Foi feita com materiais premium, de alta qualidade, sendo couro sintético e base reforçada para maior vida útil do assento. Possui também ajuste de altura com sistema butterfly e pistão a gás de 4ª geração Airlift, já que suporta até 150 kg, com almofadas para apoio cervical e lombar para uma posição mais confortável!</p>
        <p>Maciez e conforto com sua base de nylon reforçado. E não podíamos deixar de falar do seu principal diferencial, que é o sistema de iluminação. Acompanha controle remoto para personalização da iluminação. Você poderá escolher a cor que deseja ou navegar através dos efeitos disponíveis!</p>
        <p><strong>Especificações Técnicas:</strong></p>
        <ul>
            <li>● Almofadas para apoio cervical e lombar para uma posição ergonômica e confortável</li>
            <li>● Ajuste de altura com sistema butterfly</li>
            <li>● Apoio de braço 3D regulável em PVC de alta resistência</li>
            <li>● Iluminação em LED RGB</li>
        </ul>
        <p> <a href="">Compre já o seu na E ao Quadrado!</a></p>
    </div>

    <div class="grid_descricao_produto">
        <div class="line_top"></div>
        <div class="descricao_produto_item3">
            <img src="../../image/geral/icons/etiqueta_icon.svg" alt="">
            <h1>AVALIAÇÕES DO PRODUTO</h1>
        </div>

        <div class="avaliacao_produto_bg">
            <div class="grid_estrelas_avaliacao_produto">
                <div class="estrelas_avaliacao_produto">
                    <h1>4.5</h1>
                </div>
                <div class="estrelas_avaliacao_produto">
                    <h2 class='nome_vendedor_estrela'>★★★★★</h2>
                </div>
            </div>

            <div class="grid_retangulos_avaliacao_produto ">
                <div class="retangulos_avaliacao_produto">
                    <button><p>5 Estrelas (1,3 mil)</p></button>
                    <button><p>4 Estrelas (708)</p></button>
                    <button><p>3 Estrelas (19)</p></button>
                    <button><p>2 Estrelas (75)</p></button>
                    <button><p>1 Estrela (5)</p></button>
                    <button><p>Com mídia (3)</p></button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid_comentarios_usuarios">
        <div class="comentario_usuario_1">
            <div class="grid_user_1">
                <div class='cliente_nome_pic'>
                    <img src="../../image/cliente/produto/icon_profile.svg" alt="">
                    <h1>Carlos</h1>
                </div>

                <div class="estrelas_avaliacao_produto">
                    <h2 class='nome_vendedor_estrela'>★★★★★</h2>
                </div>
            </div>

            <div class="grid_comentario_user_1">
                <div class="avaliacao_user_1_item1">
                    <h2>Qualidade:</h2>
                    <h3>Muito boa</h3>
                </div>
                <div class="avaliacao_user_1_item2">
                    <h2>Parecido com o anúncio:</h2>
                    <h3>Sim</h3>
                </div>
                <h2 class='produto_comentario'>
                    Uma cadeira gamer envolvente e seduzente é muito mais do que um simples móvel. Ela combina conforto ergonômico com um design atraente que promove uma imersão total na experiência de jogo. Com seu encosto alto e ajustes personalizáveis, não só proporciona suporte para longas sessões de jogo, mas também se torna um elemento marcante no ambiente, convidando você a se entregar ao mundo virtual com estilo e conforto.
                </h2>
            </div>

            <div class="grid_images_user_1">
                <div class="image1_user_1">
                    <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="">
                    <div class='div_video'>
                        <img src="../../image/cliente/produto/icon_camera.svg" alt="">
                        1:32
                    </div>
                </div>
                <div class='image1_user_1'>
                    <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="">
                </div>
            </div>
        </div>

        <div class="comentario_usuario_1">
            <div class="grid_user_1">
                <div class='cliente_nome_pic'>
                    <img src="../../image/cliente/produto/icon_profile.svg" alt="">
                    <h1>Julia</h1>
                </div>

                <div class="estrelas_avaliacao_produto">
                    <h2 class='nome_vendedor_estrela'>★★★★★</h2>
                </div>
            </div>

            <div class="grid_comentario_user_1">
                <div class="avaliacao_user_1_item1">
                    <h2>Qualidade:</h2>
                    <h3>Muito boa</h3>
                </div>
                <div class="avaliacao_user_1_item2">
                    <h2>Parecido com o anúncio:</h2>
                    <h3>Sim</h3>
                </div>
                <h2 class='produto_comentario'>
                    Uma cadeira gamer que se destaca pela sua envolvência, sedução e incrível conforto transcende o conceito tradicional de móvel. Com linhas sofisticadas e um encosto que abraça suavemente, ela não apenas complementa o ambiente com seu design elegante, mas também oferece um suporte ergonômico que se adapta perfeitamente ao corpo.
                </h2>
            </div>

            <div class="grid_images_user_1">
                <div class='image1_user_1'>
                    <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="">
                </div>
                <div class='image1_user_1'>
                    <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="">
                </div>
            </div>
        </div>

        <div class="comentario_usuario_1">
            <div class="grid_user_1">
                <div class='cliente_nome_pic'>
                    <img src="../../image/cliente/produto/icon_profile.svg" alt="">
                    <h1>Alex</h1>
                </div>
                
                <div class="estrelas_avaliacao_produto">
                    <h2 class='nome_vendedor_estrela'>★★★★★</h2>
                </div>
            </div>

            <div class="grid_comentario_user_1">
                <div class="avaliacao_user_1_item1">
                    <h2>Qualidade:</h2>
                    <h3>Incrível</h3>
                </div>
                <div class="avaliacao_user_1_item2">
                    <h2>Parecido com o anúncio:</h2>
                    <h3>Sim</h3>
                </div>
                <h2 class='produto_comentario'>
                    Meu irmao adorou a cadeira 😁
                </h2>
            </div>

            <div class="grid_images_user_1">
                <div class="image1_user_1">
                    <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="">
                    <div class='div_video'>
                        <img src="../../image/cliente/produto/icon_camera.svg" alt="">
                        0:45
                    </div>
                </div>
                <div class='image1_user_1'>
                    <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="">
                </div>
            </div>
        </div>

    </div>
    <?php 
      include_once('../../pages/geral/footer.php');
    ?>
</body>
<script type='module' src='../../js/cliente/produto_carrossel.js'></script>
</html>