<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Perfil - E ao Quadrado";
  $css = ["/css/admin/RelatorioVendedor.css"];
  require_once('./utils/head.php');
  require_once './app/controllers/admin/AdminRelatorioVendedorController.php';

  $controller = new RelatorioVendedorController();
  $dados = $controller->handle();
  $vendas = $dados['vendas'];
  $perfil = $dados['perfil'];
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main>
    <div class="relatorio_vendedor_body">
      <!-- Título Principal -->
      <div class="relatorio_vendedor_titulo_1">
        <div class="relatorio_vendedor_text_titulo_1">
          <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/lista_relatorio_icon.svg' ?>" alt="">
          <h1>RELATÓRIO DO VENDEDOR</h1>
        </div>
        <hr class="relatorio_vendedor_linha_titulo">
      </div>

      <div class="bg_mobile_1"></div>

      <!-- Grid de Conteúdo -->
      <div class="relatorio_vendedor_grid_conteudo">
        <!-- Bloco: Pesquisa de Vendedor -->
        <div>
          <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_1">
            <hr class="relatorio_vendedor_vertical">
            <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/perfil_lupa_icon.svg' ?>" alt=""/>
            <h1 class="relatorio_vendedor_text">Pesquisar Vendedor</h1>
          </div>

          <div class="relatorio_vendedor_pesquisar_usuario">
            <h2>Digite o ID do Vendedor para encontrá-lo. Após isso clique em Pesquisar.</h2>
            <form action="" method="post" class="relatorio_vendedor_forms">
              <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_1">
                <label class="font_subtitulo font_celadon">ID do Vendedor</label>
                <input type="text" name="vendedor_id" class="base_input">
                <button type="submit" class="base_botao btn_blue">
                  <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/botoes/v_branco_icon.svg' ?>" alt=""/>PESQUISAR
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Bloco: Perfil do Vendedor -->
        <div class="relatorio_vendedor_bloco_perfil_do_vendedor">
          <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_4">
            <hr class="relatorio_vendedor_vertical">
            <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/lista_icon.svg' ?>" alt=""/>
            <h1 class="relatorio_vendedor_text">Perfil Do Vendedor</h1>
          </div>

          <div class="relatorio_vendedor_estatistica_holder">
            <div class="relatorio_vendedor_card">
              <span class="relatorio_vendedor_titulo2" id="nome_cliente"></span>
              <img src="<?= $PATH_PUBLIC . '/image/admin/perfil_admin/perfil_img.svg' ?>" alt="" class="relatorio_vendedor_card_img_perfil">
            </div>

            <div class="relatorio_vendedor_card_column_2">
              <div class="relatorio_vendedor_card">
                <span class="relatorio_vendedor_titulo">cu</span>
              </div>

              <div class="relatorio_vendedor_card">
                <span class="relatorio_vendedor_titulo">cu</span>
              </div>

              <div class="relatorio_vendedor_card">
                <span class="relatorio_vendedor_titulo">cu</span>
              </div>
            </div>
          </div>

          <?php if ($perfil): ?>
            <div class="relatorio_vendedor_perfil_usuario">
              <img src="<?= $PATH_PUBLIC . htmlspecialchars($perfil['foto_perfil']) ?>" alt="Foto do vendedor" class="base_icon" />
              <h1><?= htmlspecialchars($perfil['nome']) ?></h1>
              <h2><?= !empty($perfil['descricao_perfil']) ? htmlspecialchars($perfil['descricao_perfil']) : 'Descrição não informada.' ?></h2>
            </div>
          <?php endif; ?>
        </div>

      </div>
      <!-- GRID CONTEUDO -->
    </div>

    <!-- Seção: Histórico de Pedidos -->
    <div class="relatorio_vendedor_titulo_2">
      <div class="relatorio_vendedor_text_titulo_2">
        <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/pasta_clock_icon.svg' ?>" alt=""/>
        <h1>HISTÓRICO DE PEDIDOS</h1>
      </div>
    </div>

    <div class="gerenciar_pedidos_table">
      <!-- Filtro de Tabela -->
      <div class="gerenciar_pedidos_table_filtro bg_carolina">
        <p class="gerenciar_pedidos_filtro_titulo font_subtitulo">Organizar por:</p>
        <select class="base_input">
          <option value="" selected disabled style="display: none;"></option>
          <option value="">ID</option>
          <option value="">Produto</option>
          <option value="">Preço Uni.</option>
          <option value="">Quantidade</option>
          <option value="">Entregue</option>
        </select>
      </div>

      <!-- Tabela de Pedidos -->
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
              <th>Preço Uni.</th>
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
