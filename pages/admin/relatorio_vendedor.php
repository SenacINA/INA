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
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->

  <?php
    include('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="relatorio_vendedor_body">
      <div class="relatorio_vendedor_titulo_1">
        <div class="relatorio_vendedor_text_titulo_1">
          <img src="../../image\geral\icons\lista_relatorio_icon.svg" alt="">
          <h1>RELATÓRIO DO VENDEDOR</h1>
        </div>
        <hr class="relatorio_vendedor_linha_titulo">
      </div>

      <div class="bg_mobile_1"></div>
     
      <div class="relatorio_vendedor_grid_conteudo">
       
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_1"> 
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image\geral\icons\perfil_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Dados Pessoais</h1>
        </div>

        <div class="relatorio_vendedor_pesquisar_usuario">
          <h2>Digite o ID e o E-mail do usuário para encontra-lo,
          Deixe em branco para cadastrar um usuário.</h2>
          <form action="" method="post" class="relatorio_vendedor_forms">
            <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_1">
              <label>Nome</label>
              <input type="text" class="base_input">
            </div>
            <div class="relatorio_vendedor_dados_pessoais_conjunto">
              <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_2">
                <label>E-mail</label>
                <input type="text" class="base_input">
              </div>
              <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_2">
                <label>Telefone</label>
                <input type="text" class="base_input">
              </div>
            </div>
          </form>
        </div>
        
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_2">
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image\geral\icons\loja_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Loja</h1>
        </div>
        
        <form action="" method="post" class="relatorio_vendedor_dados_pessoais">      
          <div class="relatorio_vendedor_dados_pessoais_conjunto">
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_3">
              <label>E-mail</label>
              <input type="text" class="base_input">
            </div>
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_4">
              <label>Telefone</label>
              <input type="text" class="base_input">
            </div>
          </div>

          <div class="relatorio_vendedor_dados_pessoais_conjunto">
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_5">
              <label>CPF</label>
              <input type="text" class="base_input">
            </div>
            <div class="relatorio_vendedor_dados_pessoais_item" id="relatorio_vendedor_dados_pessoais_item_6">
              <label>Telefone 2</label>
              <input type="text" class="base_input">
            </div>
          </div>
        </form>

        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_3">
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image\geral\icons\localizacao_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Localização</h1>
        </div>

        <form action="" method="post" class="relatorio_vendedor_localizacao">
          <div class="relatorio_vendedor_localizacao_conjunto">
            <!-- row 1 -->
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_1">
              <label>CEP</label>
              <input type="text" class="base_input">
            </div>
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_2">
              <label>Estado</label>
              <input type="text" class="base_input">
            </div>
          </div>
          
          <div class="relatorio_vendedor_localizacao_conjunto">
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_3">
              <label>Cidade</label>
              <input type="text" class="base_input">
            </div>
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_4">
              <label>Bairro</label>
              <input type="text" class="base_input">
            </div>
          </div>

          <div class="relatorio_vendedor_localizacao_conjunto">
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_5">
              <label>Endereço</label>
              <input type="text" class="base_input">
            </div>
            <div class="relatorio_vendedor_localizacao_item" id="relatorio_vendedor_localizacao_item_6">
              <label>Número</label>
              <input type="text" class="base_input">
            </div>
          </div>
        </form>

        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_4">
          <hr class="relatorio_vendedor_vertical">
          <img src="../../image\geral\icons\lista_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Perfil Do Vendedor</h1>
        </div>        
    
        <div class="relatorio_vendedor_perfil_usuario">
          <img src="../../image/admin/relatorio_vendedor/imagem_perfil_vendedor.png" alt=""/>
          <h1>THUNDER GAMES</h1>
          <h2>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</h2>
        </div>
      </div>
    </div>

    <div class="relatorio_vendedor_titulo_2">
      <div class="relatorio_vendedor_text_titulo_2">
        <img src="../../image\geral\icons\pasta_clock_icon.svg" alt=""/>
        <h1>HISTÓRICO DE PEDIDOS</h1>
      </div>
    </div>

    <!-- Tabela -->
    <div class="gerenciar_pedidos_table">
      <div class="gerenciar_pedidos_table_filtro bg_carolina">
        <p class="gerenciar_pedidos_filtro_titulo font_subtitulo">Organizar por:</p>
        <select class="base_input">
          <option value="" selected disable style="display: none;"></option>
          <option value="">Opa1</option>
          <option value="">Opa2</option>
          <option value="">Opa3</option>
          <option value="">Opa4</option>
        </select>
      </div>
      <div class="gerenciar_pedidos_table_holder">
        <table>
          <colgroup>
            <col class="gerenciar_pedidos_table_col-1">
            <col class="gerenciar_pedidos_table_col-2">
            <col class="gerenciar_pedidos_table_col-3">
            <col class="gerenciar_pedidos_table_col-4">
            <col class="gerenciar_pedidos_table_col-5">
            <col class="gerenciar_pedidos_table_col-6">
            <col class="gerenciar_pedidos_table_col-7">
          </colgroup>
          <thead>
            <tr>
              <th>Cód.</th>
              <th>Produto</th>
              <th>Preço</th>
              <th>Qtn.</th>
              <th>Previsão de Entrega</th>
              <th>Status</th>
              <th>Cliente</th>
            </tr>
            <tbody>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>25/03/2024 - 06/04/2024</td>
                <td>Entregue</td>
                <td>Roberto Carlos</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>25/03/2024 - 06/04/2024</td>
                <td>Entregue</td>
                <td>Roberto Carlos</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>25/03/2024 - 06/04/2024</td>
                <td>Entregue</td>
                <td>Roberto Carlos</td>
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </main>
</body>
</html>
