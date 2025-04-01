<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/vendedor/confirmar_pedido.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="../../js/geral/base.js"></script>
</head>
<body>
    <!-- Atá 375px -->  
    <!-- Caminho de Icon Correto -->

    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <main class="confirmar_pedido_body">
        <div class="confirmar_pedido_titulo">
            <div class="confirmar_pedido_text_titulo">
                <img src="../../image/geral/icons/carrinho_carga_icon.svg" alt="">
                <h1>CONFIRMAR PEDIDO</h1>
            </div>
                
            <hr class="confirmar_pedido_linha_titulo">
        </div>

        <div class="confirmar_pedido_grid_id_pedido">
            <div class="confirmar_pedido_text_1">
                <hr class="confirmar_pedido_vertical">
                <div class="confirmar_pedido_id_pedido">
                    <h1>#1001</h1>
                    <h2>05 de julho 2024, 17:37</h2>
                </div>
                
            </div>

            <div class="confirmar_pedido_botoes_status">
                <div class="confirmar_pedido_botao_1">
                    <h2>O Pagamento Pendente</h2>
                </div>
                <div class="confirmar_pedido_botao_2">
                    <h2>O Não processado</h2>
                </div>
            </div>
        </div>
        
        <div class="confirmar_pedido_grid_principal">
            <div class="confirmar_pedido_container_1">
                <div class="confirmar_pedido_itens">
                    <div class="confirmar_pedido_produtos">
                        <img src="../../image/vendedor/confirmar_pedido/mouse.svg" alt="">
                        <h1>Mouse Logitech G203</h1>
                        <div class="confirmar_pedido_produtos_valor">
                            <h2>R$170,91 x 1</h2>
                            <h1>R$170,91</h1>
                        </div>
                    </div>
                    <hr>
                    <div class="confirmar_pedido_produtos">
                        <img src="../../image/vendedor/confirmar_pedido/mouse.svg" alt="">
                        <h1>Mouse Logitech G203</h1>
                        <div class="confirmar_pedido_produtos_valor">
                            <h2>R$170,91 x 1</h2>
                            <h1>R$170,91</h1>
                        </div>
                    </div>
                    <hr>
                    <div class="confirmar_pedido_produtos">
                        <img src="../../image/vendedor/confirmar_pedido/mouse.svg" alt="">
                        <h1>Mouse Logitech G203</h1>
                        <div class="confirmar_pedido_produtos_valor">
                            <h2>R$170,91 x 1</h2>
                            <h1>R$170,91</h1>
                        </div>
                    </div>
                </div>
                
                <div class="confirmar_pedido_botao_confirmar_envio">
                    <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">
                    <h1>CONFIRMAR ENVIO</h1>
                </div>
            </div>

            <div class="confirmar_pedido_container_2">
                <div class="confirmar_pedido_titulo_cronograma">
                    <img src="../../image/geral/icons/relogio_icon.svg" alt="">
                    <h1>CRONOGRAMA</h1>
                </div>
                    
                <div class="confirmar_pedido_itens_container_2">
                    <div class="confirmar_pedido_container_2_item">
                        <div>
                            <img src="../../image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
                            <hr>
                        </div>
                        <div>
                            <h1>Guilherme Xavier</h1> 
                            <h2>fez o pedido em</h2>
                            <h2>05/07/2024</h2> 
                            <h2>às</h2>
                            <h2>17:37.</h2>
                        </div>
                    </div>
                        
                    <!-- Pagamento confirmado -->
                    <div class="confirmar_pedido_container_2_item">
                        <div>
                            <img src="../../image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
                        </div>
                        <div>
                            <h1>Guilherme Xavier</h1> 
                            <h2>pagamento confirmado em</h2>
                            <h2>06/07/2024</h2> 
                            <h2>às</h2>
                            <h2>10:15.</h2>
                        </div>
                    </div>

                    <!-- Aguardando Confirmação -->
                    <div class="confirmar_pedido_container_2_item">
                        <div>
                            <img src="../../image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
                        </div>
                        <div>
                            <h1>Aguardando Confirmação</h1> 
                            <h2>Iniciado em</h2>
                            <h2>06/07/2024</h2> 
                            <h2>às</h2>
                            <h2>11:00.</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="confirmar_pedido_container_3">
                <div class="confirmar_pedido_itens_container_3">
                    <div class="confirmar_pedido_container_3_item">
                        <h2>Subtotal</h2>
                        <h2>3 itens</h2>
                        <h2>R$1.2225,57</h2>
                    </div>
                    
                    <div class="confirmar_pedido_container_3_total">
                        <h1>TOTAL</h1>
                        <hr>
                        <div class="confirmar_pedido_container_3_total_valor">
                            <h2>Pago pelo Cliente</h2>
                            <h2>R$0</h2>
                        </div>
                        
                    </div>
                </div>

                <div class="confirmar_pedido_botao_receber_pagamento">
                    <img src="../../image/geral/botoes/enviar_branco_icon.svg" alt="">
                    <h1>RECEBER PAGAMENTO</h1>
                </div>
            </div>
            
            <div class="confirmar_pedido_container_4">
                <div class="confirmar_pedido_container_4_item">
                    <h1>CLIENTE</h1>
                    <h2>Guilherme Xavier</h2>
                    <h2>3 pedidos</h2>
                </div>

                <div class="confirmar_pedido_container_4_item">
                    <div class="confirmar_pedido_linha">
                        <h1>INFORMAÇÕES DE CONTATO</h1>
                    </div>
                    <h2>(67) 9 9999-9999</h2>
                </div>

                <div class="confirmar_pedido_container_4_item">
                    <div class="confirmar_pedido_linha">
                        <h1>ENDEREÇO DE ENTREGA</h1>
                    </div>
                    <div class="confirmar_pedido_linha_2">
                        <h3>CEP:</h3>
                        <h2>69910-890</h2>
                    </div>
                    <h2>Rua Vinte e Três, Tancredo Neves - Rio Branco, AC</h2>
                </div>
                <div class="confirmar_pedido_botao_denunciar_usuario">
                    <img src="../../image/geral/botoes/x_branco_icon.svg" alt="">
                    <h1>DENUNCIAR</h1>
                </div>
            </div>
        </div>
</main>
    <?php 
      include_once('../../pages/geral/footer.php');
    ?>
</body>
</html>
