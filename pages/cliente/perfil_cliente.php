<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/cliente/perfil_cliente.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
    <!-- fazer responsividade -->

    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <main>
        <img src="../../image/cliente/perfil_cliente/banner_user.png" alt="banner" class="perfil_cliente_banner_cliente">

        <div class="perfil_cliente_pfp_cliente">
            <img src="../../image/cliente/perfil_cliente/foto_user.png" alt="pfp_cliente" >
            <h1>Cliente 10</h1>
        </div>

        <div class="perfil_cliente_botao_menu">
            <form action="">
                <select name="menu" id="menu"> 
                    <option selected disabled value ="">Menu</option>
                    <option value="editar-perfil" onclick="pag('cliente/editar_perfil')">Editar Perfil</option>
                    <option value="pedidos" onclick="pag('vendedor/cadastro_vendedor_1')">Cadastro como vendedor</option>
                    <option value="sair" onclick="pag('cliente/login')">Sair</option>
                </select>
            </form>  
        </div>

        <div class="perfil_cliente_grid_principal">
            <div class="perfil_cliente_infos_container">
                <div class="perfil_cliente_infos_item1">
                    <img src="../../image/cliente/perfil_cliente/icon_localizacao_cliente.svg">
                    <p>Produtos: 8</p>
                </div>
                <div class="perfil_cliente_infos_item2">
                    <img src="../../image/cliente/perfil_cliente/chat_user.png">
                    <p>Avaliação geral: 4.5</p>
                </div>
                <div class="perfil_cliente_infos_item3">
                    <img src="../../image/cliente/perfil_cliente/membro_user.png">
                    <p>cliente há: 4 Meses</p>
                </div>
            </div>

            <hr>

            <div class="perfil_cliente_about_container">
                <img src="../../image/cliente/perfil_cliente/icon_contato_user.png">
                <h1>Contatos</h1>
            </div>
            
            <div class="perfil_cliente_contatos_cliente">
                <img src="../../image/cliente/perfil_cliente/icon_instagram_cliente.svg" class="perfil_cliente_icon_instagram_cliente">
                <a href="#" class="perfil_cliente_instagram_cliente">my.cliente10</a>
            
                <img src="../../image/cliente/perfil_cliente/icon_facebook_cliente.svg" class="perfil_cliente_icon_facebook_cliente">
                <a href="#" class="perfil_cliente_facebook_cliente">cliente10</a>
            </div>  

            <hr>

            <div class="perfil_cliente_grid_historico">
                <div class="perfil_cliente_about_container_2">
                    <img src="../../image/cliente/perfil_cliente/icon_lojinha.png" alt="Icon Loja">
                    <h1>Histórico:</h1>
                </div>  
            
                <div class="perfil_cliente_grid_item">
                    <div class="perfil_cliente_frame_img">
                        <img src="../../image/cliente/perfil_cliente/teclado_gamer.png" alt="Teclado Gamer">
                    </div>
            
                    <div class="perfil_cliente_produto_item">
                        <div>
                            <h1>Teclado mecânico Redragon Kumara</h1>
                            <h2>★★★★★</h2>
                        </div>
                        
                        <div class="perfil_cliente_produto_status">
                            <h2>Avaliado</h2>
                            <h4>Pedido Entregue</h4>
                            <h3>x1</h3>
                        </div>
                        <div class="perfil_cliente_produto_preco">
                            <h3>R$235,18</h3>
                            <h4>R$147,99</h4>
                        </div>
                        <div class="perfil_cliente_produto_total">
                            <h1>Total do pedido: R$1421,00</h1>
                        </div>
                    </div>
            
                    <div class="perfil_cliente_grid_botoes">
                        <div class="perfil_cliente_btn_1" onclick="pag('cliente/carrinho_vazio')"><h1>Compra Novamente</h1></div>
                    </div>
                </div>
                <hr class="perfil_cliente_hr_2">
                <div class="perfil_cliente_grid_item">
                    <div class="perfil_cliente_frame_img">
                        <img src="../../image/cliente/perfil_cliente/teclado_gamer.png" alt="Teclado Gamer">
                    </div>
            
                    <div class="perfil_cliente_produto_item">
                        <div>
                            <h1>Teclado mecânico Redragon Kumara</h1>
                            <h2>★★★★★</h2>
                        </div>
                        
                        <div class="perfil_cliente_produto_status">
                            <h2>Avaliado</h2>
                            <h4>Pedido Entregue</h4>
                            <h3>x1</h3>
                        </div>
                        <div class="perfil_cliente_produto_preco">
                            <h3>R$235,18</h3>
                            <h4>R$147,99</h4>
                        </div>
                        <div class="perfil_cliente_produto_total">
                            <h1>Total do pedido: R$1421,00</h1>
                        </div>
                    </div>
            
                    <div class="perfil_cliente_grid_botoes">
                        <div class="perfil_cliente_btn_1" onclick="pag('cliente/carrinho_vazio')"><h1>Compra Novamente</h1></div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
     
    <footer>
      <img class="perfil_cliente_footer_img" src="../../image/cliente/footer/img_footer_placeholder.png">
    </footer>
</body>
</html>