<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/vendedor/perfil_vendedor.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav_bar"></nav>
    <main>
        <img src="../../image/vendedor/perfil_vendedor/banner_vendedor_mini_perfil.png" alt="banner" class="banner_vendedor">

        <div class="pfp_vendedor">
            <img src="../../image/vendedor/perfil_vendedor/pfp_vendedor.png" alt="pfp_vendedor" >
            <h1>THUNDER GAMES</h1>
        </div>

        <div class="botao_menu">
            <form action="">
                <select name="menu" id="menu"> 
                    <option value="">Menu</option>
                    <option value="editar-perfil">Editar Perfil</option>
                    <option value="pedidos">Pedidos</option>
                    <option value="relatorio">Relatório</option>
                    <option value="criar-cupom">Criar Cupom</option>
                    <option value="editar-produtos">Editar Produtos</option>
                    <option value="sair">Sair</option>
                </select>
            </form>  
        </div>

        <div class="grid_principal">
            <div class="infos_container">
                <div class="infos_item1">
                    <img src="../../image/vendedor/perfil_vendedor/icon_produtos_vendedor.svg">
                    <p>Produtos: 8</p>
                </div>
                <div class="infos_item2">
                    <img src="../../image/vendedor/perfil_vendedor/icon_avaliacao_vendedor.svg">
                    <p>Avaliação geral: 4.5</p>
                </div>
                <div class="infos_item3">
                    <img src="../../image/vendedor/perfil_vendedor/icon_tempo_vendedor.svg">
                    <p>Vendedor há: 4 Meses</p>
                </div>
                <div class="infos_item4">
                    <img src="../../image/vendedor/perfil_vendedor/icon_localizacao_vendedor.svg">
                    <p>São Paulo, São Paulo</p>
                </div>
            </div>

            <hr>

            <div class="about_container">
                <img src="../../image/vendedor/perfil_vendedor/icon_about_us.svg">
                <h1>Sobre nós:</h1>
                <p>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</p>
            </div>
            
            <div class="contatos_vendedor">
                <img src="../../image/vendedor/perfil_vendedor/icon_instagram_vendedor.svg" class="icon_instagram_vendedor">
                <a href="#" class="instagram_vendedor">my.thudergames</a>
            
                <img src="../../image/vendedor/perfil_vendedor/icon_facebook_vendedor.svg" class="icon_facebook_vendedor">
                <a href="#" class="facebook_vendedor">thundergames</a>
            
                <img src="../../image/vendedor/perfil_vendedor/icon_x_vendedor.png" class="icon_x_vendedor">
                <a href="#" class="x_vendedor">thundergames_</a>

                <div class="vr"></div>

                <img src="../../image/vendedor/perfil_vendedor/icon_linkedin_vendedor.png" class="icon_linkedin_vendedor">
                <a href="#" class="linkedin_vendedor">thundergames</a>
            
                <img src="../../image/vendedor/perfil_vendedor/icon_youtube_vendedor.png" class="icon_youtube_vendedor">
                <a href="#" class="youtube_vendedor">Thunder Games</a>
            
                <img src="../../image/vendedor/perfil_vendedor/icon_tiktok_vendedor.png" class="icon_tiktok_vendedor">
                <a href="#" class="tiktok_vendedor">thunder.games</a>
            </div>  

            <hr>

            <div class="grid_carrossel">
                <div class="about_container_2">
                    <img src="../../image/vendedor/perfil_vendedor/contato_user.png" alt="">
                    <h1>Destaques:</h1>
                </div>
                    <div class="produtos_container bg_branco">
                        <div id="destaque_produtos" class="linha_card_produto grid_produtos">
            
                        </div>
                    </div>
            <hr>    
                <div class="about_container_2">   
                    <img src="../../image/vendedor/perfil_vendedor/icon_lojinha.png" alt="">
                    <h1>Produtos do Mesmo Vendedor:</h1>
                </div>
                <div class="produtos_container bg_branco">
                    <div id="linha1" class="linha_card_produto grid_produtos">
                        
                    </div>
                </div>
            </div>  
  
        </div>
    </main>
    
    
    <footer>
      <img src="../../image/cliente/footer/img_footer_placeholder.png">
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