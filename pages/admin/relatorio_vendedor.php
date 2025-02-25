<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/admin/relatorio_vendedor.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <main>
    <!-- Falta Nav-bar -->
    <nav class="relatorio_vendedor_nav_bar"></nav>  

    <div class="relatorio_vendedor_body">
      <div class="relatorio_vendedor_header">
        <div class="relatorio_vendedor_text_header">
          <img src="../../image/admin/relatorio_vendedor/icon_relatorio.svg" alt="">
          <h1>RELATÓRIO DO VENDEDOR</h1>
        </div>
        <hr class="relatorio_vendedor_linha_header">
      </div>

      <div class="bg_mobile_1"></div>
      <div class="bg_mobile_2"></div>
     
      <div class="relatorio_vendedor_grid_conteudo">
       
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_1"> 
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image/admin/relatorio_vendedor/texto_icon.svg" alt="">
          <h1 class="relatorio_vendedor_text">Dados Pessoais</h1>
        </div>

        <div class="relatorio_vendedor_pesquisar_usuario">
          <h2>Digite o ID e o E-mail do usuário para encontra-lo
          Deixe em branco para cadastrar um usuário.</h2>
          <form action="" method="post" class="relatorio_vendedor_forms">
            <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_1" >
              <label>Nome</label>
              <input type="text" placeholder="00001">
            </div>
            <div class="relatorio_vendedor_dados_pessoais_conjunto">
              <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_2">
                <label>E-mail</label>
                <input type="text" placeholder="admin@gmail.com">
              </div>
              <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_2">
                <label>Telefone</label>
                <input type="text" placeholder="+55 (19) 99486-4017">
              </div>
            </div>
            
          </form>
        </div>
        
        
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_2">
        
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image/admin/relatorio_vendedor/perfil_icon.svg" alt="">
          <h1 class="relatorio_vendedor_text">Loja</h1>
        </div>
        
        <form action="" method="post" class="relatorio_vendedor_dados_pessoais">      
          <div class="relatorio_vendedor_dados_pessoais_conjunto">
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_3">
              <label>E-mail</label>
              <input type="text" placeholder="thundergames@gmail.com">
            </div>
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_4">
              <label>Telefone</label>
              <input type="text" placeholder="+55 (19) 99486-4017">
            </div>
          </div>

          <div class="relatorio_vendedor_dados_pessoais_conjunto">
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_5">
              <label>CPf</label>
              <input type="text" placeholder="000-000-000-00">
            </div>
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_6">
              <label>Telefone 2</label>
              <input type="text" placeholder="+55 (19) 99486-4017">
            </div>
          </div>
        </form>

        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_3">
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image/admin/relatorio_vendedor/localizacao_icon.svg" alt="">
          <h1 class="relatorio_vendedor_text">Localização</h1>
        </div>

        <form action="" method="post" class="relatorio_vendedor_localizacao">
          <div class="relatorio_vendedor_localizacao_conjunto">
            <!-- row 1 -->
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_1">
              <label>CEP</label>
              <input type="text" placeholder="04261-080">
            </div>
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_2">
              <label>Estado</label>
              <input type="text" placeholder="São Paulo">
            </div>
          </div>
          
          <div class="relatorio_vendedor_localizacao_conjunto">
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_3">
              <label>Cidade</label>
              <input type="text" placeholder="São Paulo">
            </div>
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_4">
              <label>Bairro</label>
              <input type="text" placeholder="Vila Monumento">
            </div>
          </div>

          <div class="relatorio_vendedor_localizacao_conjunto">
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_5">
              <label>Endereço</label>
              <input type="text" placeholder="R. Eng. Sampaio Coelho">
            </div>
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_6">
              <label>Número</label>
              <input type="text" placeholder="122">
            </div>
          </div>
        </form>

        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_4">
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image/admin/relatorio_vendedor/engrenagem_icon.svg" alt="">
          <h1 class="relatorio_vendedor_text">Perfil Do Vendedor</h1>
        </div>        
      </div>

      <div class="relatorio_vendedor_perfil_usuario">
        <img src="" alt="">
        <h1>THUNDER GAMES</h1>
        <h2>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius  
        et nesciunt temporibus. At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</h2>
      </div>
    </div>
    
    <!-- Falta footer -->
    <footer class="footer_temporario_relatorio_vendedor">
      <img src="../../image/admin/relatorio_vendedor/footer_mobile.svg" alt="">
    </footer>
  </main>
</body>
</html>
