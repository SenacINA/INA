<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/Produto.css"];
require_once("./utils/head.php")
?>

<body>
    <!-- Até 375px -->
    <!-- Caminho de Icon Correto -->
    <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>

    <div class='produto_main_container'>
        <div class="grid_produto">
            <div class="grid_nome_vendedor">
                <div class='produto_img_vendedor'>
                    <div class="imagem_nome_vendedor">
                        <img src="<?= $PATH_PUBLIC ?>/image/cliente/produto/user_thunder_gamers.png" alt="">
                    </div>
                    <div class="nome_vendedor">
                        <h1>THUNDER GAMERS</h1>
                        <h2>
                            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/localizacao_icon.svg" alt="">
                            São Paulo, São Paulo
                        </h2>
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_menor_icon.svg" alt="">
                </div>

                <div class="images_scroll">
                    <div class='imagem_selecionada'><img src="<?= $PATH_PUBLIC ?>/image/cliente/produto/cadeira_gamer_1.jpg" alt=""></div>
                    <div><img src="<?= $PATH_PUBLIC ?>/image/cliente/produto/cadeira_gamer_2.jpg" alt=""></div>
                    <div><img src="<?= $PATH_PUBLIC ?>/image/cliente/produto/cadeira_gamer_3.jpg" alt=""></div>
                    <div><img src="<?= $PATH_PUBLIC ?>/image/cliente/produto/cadeira_gamer_4.jpg" alt=""></div>
                </div>


                <div class="icon_scroll foward">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_menor_icon.svg" alt="">
                </div>
            </div>

            <div class="grid_produto_image">
                <div class="produto_image">
                    <img src="<?= $PATH_PUBLIC ?>/image/cliente/produto/cadeira_gamer_size_big.png" alt="">
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
                        <button class="base_botao btn_blue"><img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/cesta_branca_icon.svg" alt="">CARRINHO</button>
                        <button class="base_botao btn_outline_blue" onclick="pag('Carrinho')">
                            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/+_carolina_icon.svg" alt="">
                            COMPRAR
                        </button>
                    </div>
                </div>
            </div>

            <div class="consultar_frete">
                <h1>CONSULTAR FRETE</h1>
                <div class="consultar_input">
                    <input class="base_input" type="text">
                    <button class='base_botao btn_blue btn_consulta'>Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid_descricao_produto">
        <div class="descricao_produto_item2">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/etiqueta_icon.svg" alt="">
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
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/etiqueta_icon.svg" alt="">
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
                    <button>
                        <p>5 Estrelas (1,3 mil)</p>
                    </button>
                    <button>
                        <p>4 Estrelas (708)</p>
                    </button>
                    <button>
                        <p>3 Estrelas (19)</p>
                    </button>
                    <button>
                        <p>2 Estrelas (75)</p>
                    </button>
                    <button>
                        <p>1 Estrela (5)</p>
                    </button>
                    <button>
                        <p>Com mídia (3)</p>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid_comentarios_usuarios">

        <?php
            require_once __DIR__ . '/../../components/php/avaliacao.php';

            // Dados de exemplo (normalmente viriam do banco de dados)
            $comentarios = [
                [
                    'nome' => 'Julia',
                    'foto_perfil' => $PATH_PUBLIC . '/image/cliente/produto/icon_profile.svg',
                    'estrelas' => 5,
                    'texto' => 'Uma cadeira gamer que se destaca pela sua envolvência, sedução e incrível conforto...',
                    'imagens' => [
                        $PATH_PUBLIC . '/image/cliente/produto/cadeira_gamer_size_big.png',
                        $PATH_PUBLIC .'/image/cliente/produto/cadeira_gamer_size_big.png'
                    ],
                    'data' => '10/05/2025'
                ],
                [
                    'nome' => 'Carlos',
                    'foto_perfil' => $PATH_PUBLIC . '/image/cliente/produto/icon_profile.svg',
                    'estrelas' => 4,
                    'texto' => 'Produto de ótima qualidade, entrega rápida...',
                    'imagens' => [],
                    'data' => '08/05/2025'
                ]
            ];

            // Renderizar todos os comentários
            foreach ($comentarios as $comentario) {
                echo ComentarioAvaliacaoComponent::render($comentario);
            }
        ?>

    </div>
    <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
    ?>
    <script type='module' src='<?= $PATH_PUBLIC ?>/js/cliente/ProdutoCarrossel.js'></script>
</body>

</html>