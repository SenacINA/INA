<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/admin/admin_cupom.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="admin_cupom_body">
      <div class="admin_cupom_header">
        <div class="admin_cupom_text_header">
          <img src="../../image/geral/icons/cupom_icon.svg" alt="">
          <h1>GERAR CUPOM</h1>
        </div>
        <hr class="admin_cupom_linha_header">
      </div>

      <div class="bg_mobile_1"></div>
      <div class="bg_mobile_2"></div>
     
      <div class="admin_cupom_grid_conteudo">
       
        <div class="admin_cupom_text" id="cupom_text_1"> 
          <hr class="admin_cupom_vertical">
          <img src="../../image/geral/icons/lista_icon.svg" alt="">
          <h1 class="admin_cupom_text">Seu Perfil</h1>
        </div>

        <div class="admin_cupom_pesquisar_usuario">
          <form action="" method="post" class="admin_cupom_forms">
            <div class="admin_cupom_pesquisar_usuario_item" id="cupom_pesquisar_usuario_item_1" >
              <label>Código do cupom</label>
              <input type="text" class="base_input">
            </div>
            <div class="admin_cupom_pesquisar_usuario_item" id="cupom_pesquisar_usuario_item_2">
              <label>Vendedor</label>
              <input type="text" class="base_input">
            </div>
            <div class="admin_cupom_configuracao_grid" id="cupom_pesquisar_usuario_item_2">
              <div class="admin_cupom_configuracao_item">
                <label>Uso por Pessoa</label>
                <input type="number" class="base_input">
              </div>
              <div class="admin_cupom_configuracao_item">
                <label>Uso Máximo</label>
                <input type="number" class="base_input">
              </div>
              <div class="admin_cupom_configuracao_item">
                <label>Valor Mínimo</label>
                <input type="number" class="base_input">
              </div>
              <div class="admin_cupom_configuracao_item">
                <label>Desconto do Cupom</label>
                <input type="number" class="base_input">
              </div>
            </div>
          </form>
        </div>
        
        <div class="admin_cupom_text" id="cupom_text_2">
          <hr class="admin_cupom_vertical">
          <img src="../../image/geral/icons/perfil_icon.svg" alt="">
          <h1 class="admin_cupom_text">Buscar Produtos</h1>
        </div>
        
        <form action="" method="post" class="admin_cupom_dados_pessoais">
  
          <div class="admin_cupom_dados_pessoais_item" id="cupom_dados_pessoais_item_1" >
            <label>Nome do Produto</label>
            <input class="base_input" type="text">
          </div>

          <div class="admin_cupom_achar_produto_organizar">
            <p>Organizar por :</p>
          </div>
          
          <div class="admin_cupom_metodo_procura_body">
            <p id="cupom_metodo_procura" class="admin_cupom_metodo_procura_body_head">Cód.</p>
            <div></div>
          </div>
          <div class="admin_cupom_caixa_procura">

            <!-- Fazer -->

          </div>
        </form>

        <div class="admin_cupom_text" id="cupom_text_3">
          <hr class="admin_cupom_vertical">
          <img src="../../image/geral/icons/engrenagem_icon.svg" alt="">
          <h1 class="admin_cupom_text">Tipo de Cupom</h1>
        </div>

        <form action="" method="post" class="admin_cupom_localizacao">
          <div class="toggle-group">
            <label class="toggle">
                <input type="radio" name="toggle-group" class="base_input" checked>
                <span class="slider"></span>
                <label>Reais sobre o Total</label>
            </label>

            <label class="toggle">
                <input type="radio" name="toggle-group" class="base_input">
                <span class="slider"></span>
                <label>Porcentagem sobre o Total</label>
            </label>
            <label class="toggle">
                <input type="radio" name="toggle-group" class="base_input">
                <span class="slider"></span>
                <label>Reais sobre Frete</label>
            </label>
          </div> 
        </form>

        <div class="admin_cupom_text" id="cupom_text_4"></div>
          <div class="admin_cupom_botao_salvar">
            <button class="admin_cupom_cancelar base_botao">
              <img src="../../image/geral/botoes/x_vermelho_icon.svg" alt="">
              <label>CANCELAR</label>
            </button>

            <button class="admin_cupom_salvar base_botao">
              <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">
              <label>SALVAR</label>
            </button>
          </div>
      </div>
    </div>
  </main>
  
</body>
</html>
