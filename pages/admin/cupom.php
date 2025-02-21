<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cupom</title>
  <link rel="stylesheet" href="../../css/admin/admin_cupom.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <main>
    <nav class="cupom_nav_bar"></nav>  

    <div class="cupom_body">
      <div class="cupom_header">
        <div class="cupom_text_header">
          <img src="../../image/admin/cupom/cupom.svg" alt="">
          <h1>Gerar Cupom</h1>
        </div>
        <hr class="cupom_linha_header">
      </div>

      <div class="bg_mobile_1"></div>
      <div class="bg_mobile_2"></div>
     
      <div class="cupom_grid_conteudo">
       
        <div class="cupom_text" id="cupom_text_1"> 
          <hr class="cupom_vertical">
          <img src="../../image/admin/cupom/texto_icon.svg" alt="">
          <h1 class="cupom_text">Seu Perfil</h1>
        </div>

        <div class="cupom_pesquisar_usuario">
          <form action="" method="post" class="cupom_forms">
            <div class="cupom_pesquisar_usuario_item" id="cupom_pesquisar_usuario_item_1" >
              <label>Código do cupom</label>
              <input type="text" placeholder="00001">
            </div>
            <div class="cupom_pesquisar_usuario_item" id="cupom_pesquisar_usuario_item_2">
              <label>Vendedor</label>
              <input type="text" placeholder="Vendedor">
            </div>
            <div class="cupom_configuracao_grid" id="cupom_pesquisar_usuario_item_2">
              <div class="cupom_configuracao_item">
                <label>Uso por Pessoa</label>
                <input type="number" placeholder="0">
              </div>
              <div class="cupom_configuracao_item">
                <label>Uso Máximo</label>
                <input type="number" placeholder="0">
              </div>
              <div class="cupom_configuracao_item">
                <label>Valor Mínimo</label>
                <input type="number" placeholder="0">
              </div>
              <div class="cupom_configuracao_item">
                <label>Desconto do Cupom</label>
                <input type="number" placeholder="0">
              </div>
            </div>
          </form>
        </div>
        
        
        <div class="cupom_text" id="cupom_text_2">
        
          <hr class="cupom_vertical">
          <img src="../../image/admin/cupom/perfil_icon.svg" alt="">
          <h1 class="cupom_text">Buscar Produtos</h1>
        </div>
        
        <form action="" method="post" class="cupom_dados_pessoais">
  
          <div class="cupom_dados_pessoais_item" id="cupom_dados_pessoais_item_1" >
            <label>Nome do Produto</label>
            <input type="text" placeholder="Produto">
          </div>
        </form>

        <div class="cupom_text" id="cupom_text_3">
          <hr class="cupom_vertical">
          <img src="../../image/admin/cupom/localizacao_icon.svg" alt="">
          <h1 class="cupom_text">Localização</h1>
        </div>

        <form action="" method="post" class="cupom_localizacao">
          <div class="cupom_localizacao_conjunto">
            <!-- row 1 -->
            <div class="cupom_localizacao_item" id="cupom_localizacao_item_1">
              <label>CEP</label>
              <input type="text" placeholder="04261-080">
            </div>
            <div class="cupom_localizacao_item" id="cupom_localizacao_item_2">
              <label>Estado</label>
              <input type="text" placeholder="São Paulo">
            </div>
          </div>
          
          <div class="cupom_localizacao_conjunto">
            <div class="cupom_localizacao_item" id="cupom_localizacao_item_3">
              <label>Cidade</label>
              <input type="text" placeholder="São Paulo">
            </div>
            <div class="cupom_localizacao_item" id="cupom_localizacao_item_4">
              <label>Bairro</label>
              <input type="text" placeholder="Vila Monumento">
            </div>
          </div>

          <div class="cupom_localizacao_conjunto">
            <div class="cupom_localizacao_item" id="cupom_localizacao_item_5">
              <label>Endereço</label>
              <input type="text" placeholder="R. Eng. Sampaio Coelho">
            </div>
            <div class="cupom_localizacao_item" id="cupom_localizacao_item_6">
              <label>Número</label>
              <input type="text" placeholder="122">
            </div>
          </div>
        </form>

        <div class="cupom_text" id="cupom_text_4">
        </div>

        <div class="cupom_botao_salvar">
          <button class="cupom_salvar">
            <img src="../../image/admin/cupom/v_icon.svg" alt="">
            <label>COMFIRMAR</label>
          </button>
        </div>
      </div>
    
    </div>
    
    <!-- Falta footer -->
    <footer class="footer_temporario_cupom">
      <img src="../../image/admin/cupom/footer_mobile.svg" alt="">
    </footer>
  </main>
</body>
</html>
