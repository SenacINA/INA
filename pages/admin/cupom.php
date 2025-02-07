<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupom</title>
    <link rel="stylesheet" href="../../css/admin/admin_cupom.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="../../js/admin/cupom.js"></script>
</head>
<body>
  <nav class="navbar"></nav>
  <header>
    <img src="../../image/admin/gerenciar_carrossel/header_gerenciar_carrossel.svg" alt="header" width="100%">
  </header>
  <main class="relatorio_vendedor_main_container">
    <div class="relatorio_vendedor_main_content">
      <div class="relatorio_vendedor_grid_parent">
        <div class="relatorio_vendedor_grid_info_main">
          <div class="relatorio_vendedor_grid_main">
          <div class="admin_linha_vertical"></div>
            <p class="font_titulo relatorio_vendedor_align_text_center" style="font-weight: 600;">              
              <img src="../../image/admin/Engrenagem.png" alt="" style="transform: translateY(1px);"> Gerenciar Cupom</p>
            <p class="cupom_p">Código do Cupom:</p>
            <div class="relatorio_vendedor_filtro">Código</div>
            <p class="cupom_p">Vendedor:</p>
            <div class="relatorio_vendedor_filtro">Vendedor</div>
            <div class="cupom_container">
            <div class="cupom_section">
              <h2>Uso por Usuário:</h2>
              <input type="text" name="cupom_valor_minimo" class="cupom_input" placeholder="0">
              <h2>Valor Mínimo:</h2>
              <input type="text" name="cupom_desconto" class="cupom_input" placeholder="0,00" oninput="formatarMoeda(this)">
              <div class="cupom_input_symbol">R$</div>
            </div>
            <div class="cupom_section">
              <h2>Usos Máximos:</h2>
              <input type="text" name="cupom_valor_minimo" class="cupom_input" placeholder="0">
              <h2>Desconto do cupom:</h2>
              <input type="text" name="cupom_desconto" class="cupom_input" placeholder="0" oninput="formatarPorcentagem(this)">
              <div class="cupom_input_symbol">%</div>
            </div>
          </div>

          </div>          
        </div>
        <div class="relatorio_vendedor_grid_perfil">
          <div class="main_text_info_container">
            
          <div class="admin_linha_vertical"></div>
            <p class="font_titulo relatorio_vendedor_align_text_center" style="font-weight: bold;"> <img src="../../image/admin/Engrenagem.png" alt="" style="transform: translateY(1px);"> Tipo de Cupom</p>
            <hr class="admin_linha">            
            <div class="cupom_section">
              <h2>Tipo de cupom:</h2>
              <div class="radio-group">
                <label class="radio-toggle">
                  <input type="radio" name="option" value="total" checked>
                  <span class="toggle"></span>
                  <div class="cupom_radio_text">Reais Sobre o Total</div>
                </label>
                <label class="radio-toggle">
                  <input type="radio" name="option" value="frete">
                  <span class="toggle"></span>
                  <div class="cupom_radio_text">Reais Sobre o Frete</div>
                </label>
                <label class="radio-toggle">
                  <input type="radio" name="option" value="percentage">
                  <span class="toggle"></span>
                  <div class="cupom_radio_text">Porcentagem Sobre o Total</div>
                </label>
                <label class="radio-toggle">
                  <input type="radio" name="option" value="promo">
                  <span class="toggle"></span>
                  <div class="cupom_radio_text">Porcentagem Sobre o Frete</div>
                </label>
              </div>
            </div>
          <div class="admin_linha_vertical"></div> <p class="font_titulo relatorio_vendedor_align_text_center" style="font-weight: bold;"> <img src="../../image/admin/Produto.png" alt="" style="transform: translateY(1px);"> Buscar Produto</p>
          </div>          
          </div>
        </div>
      </div>
    </div>    
  </main>
</body>
</html>