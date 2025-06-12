<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/Produto.css"];
require_once("./utils/head.php");
require_once("$PATH_CONTROLLER/cliente/ProdutoController.php");
$controller = new ProdutoController;
$info = $controller->exibirProduto($id);
?>

<body>
    <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>

    <div class='produto_main_container'>
        <div class="grid_produto">
            <div class="grid_nome_vendedor">
                <div class='produto_img_vendedor'>
                    <div class="imagem_nome_vendedor">
                        <img src="<?= $PATH_PUBLIC ?> <?= empty($info['infoProduto']['foto_perfil_cliente']) ? '/image/cliente/perfil_cliente/foto_user.png' : $info['infoProduto']['foto_perfil_cliente'] ?>" alt="foto do vendedor">
                    </div>
                    <div class="nome_vendedor">
                        <h1><?= $info['infoProduto']['nome_vendedor'] ?></h1>
                        <h2>
                            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/localizacao_icon.svg" alt="">
                            <?= $info['infoProduto']['cidade_endereco']  . ' - ' . $info['infoProduto']['uf_endereco'] ?>
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
                    <?php
                    if (isset($info['imagens'][0]['endereco_imagem_produto']) && !empty($info['imagens'][0]['endereco_imagem_produto'])) {
                        for ($i = 1; $i <= count($info['imagens']); $i++) {
                            if ($i == 1) {
                                echo "<div class='imagem_selecionada'> <img src='$PATH_PUBLIC" . $info['imagens'][0]['endereco_imagem_produto'] . "'></div>";
                            } else {
                                echo "<div><img src='$PATH_PUBLIC" . $info['imagens'][$i - 1]['endereco_imagem_produto'] . "'></div>";
                            }
                        }
                    }
                    else {
                        echo "<div class='imagem_selecionada'> <img src='https://placehold.co/400x400'></div>";
                    }
                    ?>
                </div>


                <div class="icon_scroll foward">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_menor_icon.svg" alt="">
                </div>
            </div>

            <div class="grid_produto_image">
                <div class="produto_image">
                    <img src="<?= isset($info['imagens'][0]['endereco_imagem_produto']) && !empty($info['imagens'][0]['endereco_imagem_produto']) ? $PATH_PUBLIC . $info['imagens'][0]['endereco_imagem_produto'] : 'https://placehold.co/400x400'; ?>" alt=''>
                </div>

            </div>

            <div class="grid_produto_info_bg">
                <div class="grid_produto_info">
                    <div class='produto_title'>
                        <div class="produto_info_nome">
                            <h1><?= $info['infoProduto']['nome_produto'] ?></h1>
                        </div>
                        <div class="produto_info_text">
                            <h2>Vendido e entregue por: <a href=""><b><?= $info['infoProduto']['nome_vendedor'] ?></b></a> </h2>
                            <h3>Em estoque</h3>
                        </div>
                    </div>
                    <div class='div_produto_valor'>
                        <div class="grid_produto_info_valor">
                            <div class="produto_info_valor">
                                <h1>R$ <?= number_format($info['infoProduto']['preco_produto'], 2, ',', '.') ?></h1>
                            </div>
                        </div>
                        <div class="produto_info_text2">
                            <h2>Peso liquído:
                                <b><?= $info['infoProduto']['peso_liquido_produto'] ?>g</b>
                                Altura:
                                <b><?= $info['infoProduto']['altura_produto'] ?>cm</b>
                                Largura:
                                <b><?= $info['infoProduto']['largura_produto'] ?>cm</b>
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
        </div>
    </div>

    <div class="grid_descricao_produto">
        <div class="descricao_produto_item2">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/etiqueta_icon.svg" alt="">
            <h1>DESCRIÇÃO DO PRODUTO</h1>
        </div>
        <?= $info['infoProduto']['descricao_produto'] ?>
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