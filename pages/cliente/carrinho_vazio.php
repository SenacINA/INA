<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/cliente/carrinho_vazio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    
</head>
<body>
<header class="nav style_nav shadow_nav">
    <div class="grid-container style_nav">
        <div class="item1">
            <img id="imgLupa" src="../../image/index/lupa.png" alt="">
            <input type="text">
        </div>
        <div class="item2">
            <button id="buttonLogo">
                <a href="#">
                <img href="#" id="imgLogo" src="../../image/index/logo.svg">
                </a>
            </button>
        </div>
        <div class="item3">
            <a class="button" href="#">
                <img src="../../image/index/user.png" alt="Usuário">
            </a>
            <a class="button" href="#">
                <img src="../../image/index/carrinho.png" alt="Carrinho">
            </a>
            <a class="button" href="#">
                <img src="../../image/index/config.png" alt="Configurações">
            </a>
        </div>
        
    </div>
</header>
    <div class="carrinho_vazio">
        <img class="carrinho" src="../../image/carrinho/carrinho.svg" alt="">
        <p class="text">Carrinho</p>
        <img class="divisoria" src="../../image/geral/linha-divisoria-azul.png" alt="">
        <img class="perfil" src="../../image/carrinho/perfil.svg" alt="">
        <p class="text-2">Identificação</p>
        <img class ="divisoria" src="../../image/geral/linha-divisoria-azul.png" alt="">
        <img class="pagamento" src="../../image/carrinho/pagamento-com-cartao-de-credito.svg" alt="">
        <p class="text-2">Conclusão</p>
    </div>
  <main>
      
      <div class="quadrado">  
          <h1 class="text_"><b>Produto</b></h1>
          <h1 class="text_"><b>Quantidade</b></h1>
          <h1 class="text_"><b>Valor</b></h1>
          <h1 class="text_"><b>Resumo</b></h1>
          <img class="divisoria_quadrado" src="../../image/geral/linha-divisoria-azul.png"alt="">
        </div>
        
        <div class="grid_pag">
            <div class="quadrado_serv1">
                <h1 id="text-3">Nenhum item adicionado ao carrinho</h1>
                <div class="quadrado_serv2">
                    <div class="qd">
                        <img class="ferramenta" src="../../image/carrinho/servico.svg" alt="">
                        <h2 id="text-4">Serviços</h2>
                        <img class="seta" src="../../image/carrinho/seta3.svg" alt="">
                        <h3 id="text-5">Subtotal serviços:</h3>
                        <h3 id="text-6">R$00,00</h3>
                    </div>
                </div>
            </div>
            <div id="quadrado_resumo">
                <div id="quad_1">
                    <nav id="quad_2"></nav>
                    <nav id="quad_3"></nav>
                    <nav id="quad_4"></nav>
                    <nav id="quad_5"></nav>
                </div>
            </div>
            
            <div class="botoes">
                <div class="botoes_1">
                    <img class="lixo" src="../../image/carrinho/lata-de-lixo.svg" alt="">
                    <button id="botao_remover" type="button" class="remover">Remover Produtos</button>
                    <button id="botao_salvar" type="button" class="salvar">Salvar</button>
                </div>
            </div>
        </div>
        </div>
</main>
</body>
</html>


