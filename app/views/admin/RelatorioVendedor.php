<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Relatório de Vendedor - E ao Quadrado";
  $css = ["/css/admin/relatorio_vendedor.css"];
  require_once('./utils/head.php');
  require_once './app/controllers/admin/AdminRelatorioVendedorController.php';

  $controller = new RelatorioVendedorController();
  $vendas = $controller->handle();
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <div class="relatorio_vendedor_body">
      <div class="relatorio_vendedor_titulo_1">
        <div class="relatorio_vendedor_text_titulo_1">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_relatorio_icon.svg" alt="">
          <h1>RELATÓRIO DO VENDEDOR</h1>
        </div>
        <hr class="relatorio_vendedor_linha_titulo">
      </div>

      <div class="bg_mobile_1"></div>
     
      <div class="relatorio_vendedor_grid_conteudo">
        
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_1"> 
          <hr class="relatorio_vendedor_vertical">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Procurar o vendedor</h1>
        </div>

        <div class="relatorio_vendedor_pesquisar_usuario">
          <h2>Digite o ID do usuário para encontrá-lo. Após isso clique em procurar.</h2>
          <form action="" method="post" class="relatorio_vendedor_forms">
            <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_1">
              <label>ID</label>
              <input type="text" name="vendedor_id" class="base_input">
            <button type="submit" class="base_botao">Procurar</button>
            </div>
          </form>
        </div>
        <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_4">
          <hr class="relatorio_vendedor_vertical">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_icon.svg" alt=""/>
          <h1 class="relatorio_vendedor_text">Perfil Do Vendedor</h1>
        </div>        

        <div class="relatorio_vendedor_perfil_usuario">
          <img src="<?=$PATH_PUBLIC?>/image/admin/relatorio_vendedor/imagem_perfil_vendedor.png" alt=""/>
          <h1>THUNDER GAMES</h1>
          <h2>Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium...</h2>
        </div>
      </div>
    </div>

    <div class="relatorio_vendedor_titulo_2">
      <div class="relatorio_vendedor_text_titulo_2">
        <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/pasta_clock_icon.svg" alt=""/>
        <h1>HISTÓRICO DE PEDIDOS</h1>
      </div>
    </div>

    <div class="gerenciar_pedidos_table">
      <div class="gerenciar_pedidos_table_filtro bg_carolina">
        <p class="gerenciar_pedidos_filtro_titulo font_subtitulo">Organizar por:</p>
        <select class="base_input">
          <option value="" selected disabled style="display: none;"></option>
          <option value="">ID</option>
          <option value="">Produto</option>
          <option value="">Preço</option>
          <option value="">Quantidade</option>
          <option value="">Entregue</option>
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
          </colgroup>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Preço</th>
              <th>Qtn.</th>
              <th>Status</th>
              <th>Cliente</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($vendas)): ?>
              <?php foreach ($vendas as $v): ?>
                <tr>
                  <td><?= $v['id'] ?></td>
                  <td><?= htmlspecialchars($v['produto']) ?></td>
                  <td>R$ <?= number_format($v['preco'], 2, ',', '.') ?></td>
                  <td><?= $v['quantidade'] ?></td>
                  <td><?= $v['status'] ?></td>
                  <td><?= htmlspecialchars($v['cliente']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>
