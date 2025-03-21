<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/vendedor/selecionar_destaque.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src='../../js/geral/base.js'></script>
</head>
<body>

    <?php
    include_once('../../pages/geral/navbar.php');
    ?>

    <main>
        <div class = "selecionardestaques_body">
            <div class="selecionardestaques_titulo">
                <div class="selecionardestaques_text_titulo">
                    <img src="../../image/vendedor/selecionar_destaques/estrela.svg" alt="">
                    <h1>SELECIONAR DESTAQUES</h1>
                </div>
                <hr class="selecionardestaques_linha_titulo">
            </div>
            <div class="selecionardestaques_body_container_botoes">
                <?php 
                    include_once ('../../pages/geral/card_produto.php');
                    gerarProdutoCards(3, 0);
                ?>
                <button class="selecionardestaques_add_button">
                    <img src="../../image/vendedor/selecionar_destaques/add.svg" alt="">
                </button>
            </div> 
        </div>

        <div class="gerenciar_pedidos_header_title">
            <img src="../../image/vendedor/gerenciar_pedidos/pasta_clock.svg"/>
            <h1 class="gerenciar_pedidos_text_header font_titulo">HISTÓRICO DE PEDIDOS</h1>
        </div>

        <div class="gerenciar_pedidos_table">
            <div class="gerenciar_pedidos_table_filtro bg_carolina">
                <p class="gerenciar_pedidos_filtro_titulo font_subtitulo">Organizar por:</p>
                <select>
                <option value="" selected disable style="display: none;"></option>
                <option value="">Opa1</option>
                <option value="">Opa2</option>
                <option value="">Opa3</option>
                <option value="">Opa4</option>
                </select>
            </div>
            <div class="base_tabela">
                <table>
                    <colgroup>
                        <col class="gerenciar_pedidos_table_col-1">
                        <col class="gerenciar_pedidos_table_col-2">
                        <col class="gerenciar_pedidos_table_col-3">
                        <col class="gerenciar_pedidos_table_col-4">
                        <col class="gerenciar_pedidos_table_col-5">
                        <col class="gerenciar_pedidos_table_col-6">
                        <col class="gerenciar_pedidos_table_col-7">
                        <col class="gerenciar_pedidos_table_col-8">
                        
                    </colgroup>
                    <thead>
                        <tr>
                        <th>Cód.</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Promoção</th>
                        <th>Valor Final</th>
                        <th>Vendas</th>
                        <th>Classificação</th>
                        <th>Avaliações</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td class="gerenciar_pedidos_table_td_check">
                                    <span>    
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </td>
                                <td class="gerenciar_pedidos_table_td-img">
                                    <span>
                                        <img src="../../image/index/Produto04.jpg" alt="">
                                        Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB
                                    </span>
                                </td>
                                <td>R$ 2.000,00</td>
                                <td>30% OFF</td>
                                <td><span>R$ 1.400,00</span></td>
                                <td>R$ 1,400,00</td>
                                <td><span>4,5 Estrelas</span></td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td class="gerenciar_pedidos_table_td_check">
                                    <span>    
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </td>
                                <td class="gerenciar_pedidos_table_td-img">
                                    <span>
                                        <img src="../../image/index/Produto03.jpg" alt="">
                                        Cadeira Gamer Throne - RGB
                                    </span>
                                </td>
                                <td>R$ 2.000,00</td>
                                <td>30% OFF</td>
                                <td>R$ 1,400,00</td>
                                <td>Pendente</td>
                                <td>4,5 Estrelas</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td class="gerenciar_pedidos_table_td_check">
                                    <span>    
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </td>
                                <td class="gerenciar_pedidos_table_td-img">
                                    <span>
                                        <img src="../../image/index/Produto02.jpg" alt="">
                                        Cadeira Gamer Throne - RGB
                                    </span>
                                </td>
                                <td>R$ 2.000,00</td>
                                <td>Nenhuma</td>
                                <td>R$ 1,400,00</td>
                                <td>Pendente</td>
                                <td>4,5 Estrelas</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td class="gerenciar_pedidos_table_td_check">
                                    <span>    
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </td>
                                <td class="gerenciar_pedidos_table_td-img">
                                    <span>
                                        <img src="../../image/index/Produto01.jpg" alt="">
                                        Cadeira Gamer Throne - RGB
                                    </span>
                                </td>
                                <td>R$ 2.000,00</td>
                                <td>30% OFF</td>
                                <td>R$ 1,400,00</td>
                                <td>Pago</td>
                                <td>4,5 Estrelas</td>
                                <td>500</td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </main>

    <!-- <?php 
    //   include_once('../../pages/geral/footer.php');
    ?> -->
</body>
</html>