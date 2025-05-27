<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Perfil - E ao Quadrado";
  $css = ["/css/admin/relatorio_vendedor.css"];
  require_once('./utils/head.php');
?>
<body>
  <!-- Até 375px -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <div class="relatorio_vendedor_body">
      <div class="relatorio_vendedor_titulo_1">
        <div class="relatorio_vendedor_text_titulo_1">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image\geral\icons\lista_relatorio_icon.svg" alt="">
          <h1>RELATÓRIO DO VENDEDOR</h1>
        </div>
        <hr class="relatorio_vendedor_linha_titulo">
      </div>

      <div class="bg_mobile_1"></div>
     
      <div class="relatorio_vendedor_grid_conteudo">
       
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_1"> 
          <hr class="relatorio_vendedor_vertical">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image\geral\icons\perfil_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Procurar o vendedor</h1>
        </div>

        <div class="relatorio_vendedor_pesquisar_usuario">
          <h2>Digite o nome do usuário para encontra-lo, Após isso clique em procurar.</h2>
          <form action="" method="post" class="relatorio_vendedor_forms">
            <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_1">
              <label>Nome</label>
              <input type="text" class="base_input">
            </div>
          </form>
        </div>
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_4">
          <hr class="relatorio_vendedor_vertical">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image\geral\icons\lista_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Perfil Do Vendedor</h1>
        </div>        
    
        <div class="relatorio_vendedor_perfil_usuario">
          <img src="<?=$PATH_PUBLIC?>/image/admin/relatorio_vendedor/imagem_perfil_vendedor.png" alt=""/>
          <h1>THUNDER GAMES</h1>
          <h2>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</h2>
        </div>
      </div>
    </div>

    <div class="relatorio_vendedor_titulo_2">
      <div class="relatorio_vendedor_text_titulo_2">
        <img class="base_icon" src="<?=$PATH_PUBLIC?>/image\geral\icons\pasta_clock_icon.svg" alt=""/>
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
