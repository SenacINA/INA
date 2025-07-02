<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Perfil - E ao Quadrado";
$css = ["/css/admin/RelatorioVendedor.css"];
require_once('./utils/head.php');
require_once './app/controllers/admin/RelatorioVendedorController.php';

$controller = new RelatorioVendedorController();
$dados = $controller->exibirRelatorio();
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

      <div class="relatorio_vendedor_grid_conteudo">
        <div>
          <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_1">
            <hr class="relatorio_vendedor_vertical">
            <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/perfil_lupa_icon.svg' ?>" alt="" />
            <h1 class="relatorio_vendedor_text">Pesquisar Vendedor</h1>
          </div>

          <div class="relatorio_vendedor_pesquisar_usuario">
            <h2>Digite o ID do Vendedor para encontrá-lo. Após isso clique em Pesquisar.</h2>
            <form action="" method="post" class="relatorio_vendedor_forms">
              <div class="relatorio_vendedor_pesquisar_usuario_item" id="relatorio_vendedor_pesquisar_usuario_item_1">
                <label class="font_subtitulo font_celadon">ID do Vendedor</label>
                <input type="text" name="vendedor_id" class="base_input" value="<?= htmlspecialchars($_POST['vendedor_id'] ?? '') ?>">
                <button type="submit" class="base_botao btn_blue">
                  <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/botoes/v_branco_icon.svg' ?>" alt="" />
                  PESQUISAR
                </button>
              </div>
            </form>
          </div>
        </div>

        <div class="relatorio_vendedor_bloco_perfil_do_vendedor">
          <div class="relatorio_vendedor_text" id="relatorio_vendedor_text_4">
            <hr class="relatorio_vendedor_vertical">
            <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/lista_icon.svg' ?>" alt="" />
            <h1 class="relatorio_vendedor_text">Perfil Do Vendedor</h1>
          </div>

          <?php if ($perfil): ?>
            <div class="relatorio_vendedor_estatistica_holder">
              <div class="relatorio_vendedor_card">
                <span class="relatorio_vendedor_titulo2" id="nome"><?= htmlspecialchars($perfil['nome'] ?? '') ?></span>
                <img src="<?= $PATH_PUBLIC . htmlspecialchars($perfil['foto_perfil'] ?? '') ?>" alt="Foto do perfil" class="relatorio_vendedor_card_img_perfil">
              </div>

              <div class="relatorio_vendedor_card_column_2">
                <div class="relatorio_vendedor_card">
                  <span class="relatorio_vendedor_titulo">Nome:</span>
                  <label> <?= htmlspecialchars($perfil['nome'] ?? '') ?> </label>
                </div>

                <div class="relatorio_vendedor_card">
                  <span class="relatorio_vendedor_titulo">E-mail: </span>
                  <label> <?= htmlspecialchars($perfil['email'] ?? '') ?> </label>
                </div>

                <div class="relatorio_vendedor_card">
                  <span class="relatorio_vendedor_titulo">Data de Cadastro: </span>
                  <label> <?= !empty($perfil['data_cadastro']) ? date('d/m/Y', strtotime($perfil['data_cadastro'])) : '' ?> </label>
                </div>
              </div>
            </div>
          <?php else: ?>
            <p>Perfil do vendedor não encontrado.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="relatorio_vendedor_titulo_2">
      <div class="relatorio_vendedor_text_titulo_2">
        <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/pasta_clock_icon.svg' ?>" alt="" />
        <h1>HISTÓRICO DE PEDIDOS</h1>
      </div>
    </div>

    <div class="relatorio_vendedor_table">
      <div class="relatorio_vendedor_table_filtro bg_carolina">
        <p class="relatorio_vendedor_filtro_titulo font_subtitulo">Organizar por:</p>
        <select class="base_input">
          <option value="" selected disabled style="display: none;"></option>
          <option value="">ID</option>
          <option value="">Produto</option>
          <option value="">Preço Uni.</option>
          <option value="">Quantidade</option>
          <option value="">Entregue</option>
        </select>
      </div>

      <div class="relatorio_vendedor_table_holder">
        <table>
          <colgroup>
            <col class="relatorio_vendedor_table_col-1">
            <col class="relatorio_vendedor_table_col-2">
            <col class="relatorio_vendedor_table_col-3">
            <col class="relatorio_vendedor_table_col-4">
            <col class="relatorio_vendedor_table_col-5">
            <col class="relatorio_vendedor_table_col-6">
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