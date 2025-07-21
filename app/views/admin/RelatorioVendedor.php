<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Relatorio do Vendedor - E ao Quadrado";
$css = ["/css/admin/RelatorioVendedor.css"];
require_once('./utils/head.php');
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

          <div class="relatorio_vendedor_estatistica_holder" id="perfil-vendedor">
            <div class="relatorio_vendedor_card">
              <span class="relatorio_vendedor_titulo2" id="nome"><?= htmlspecialchars($perfil['nome'] ?? '') ?></span>
              <img id="foto-perfil" src="" class="relatorio_vendedor_card_img_perfil" style="display: none;">
            </div>

            <div class="relatorio_vendedor_card_column_2">
              <div class="relatorio_vendedor_card">
                <span class="relatorio_vendedor_titulo">Nome</span>
                <label id="campo-nome"><?= htmlspecialchars($perfil['nome'] ?? '') ?></label>
              </div>

              <div class="relatorio_vendedor_card">
                <span class="relatorio_vendedor_titulo">E-mail</span>
                <label id="campo-email"><?= htmlspecialchars($perfil['email'] ?? '') ?></label>
              </div>

              <div class="relatorio_vendedor_card">
                <span class="relatorio_vendedor_titulo">Data de Cadastro</span>
                <label id="campo-data"><?= !empty($perfil['data_cadastro']) ? date('d/m/Y', strtotime($perfil['data_cadastro'])) : '' ?></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="relatorio_vendedor_titulo_2">
      <div class="relatorio_vendedor_text_titulo_2">
        <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/pasta_clock_icon.svg' ?>" alt="" />
        <h1>HISTÓRICO DE PEDIDOS</h1>
      </div>
    </div>

    <div class="relatorio_vendedor_table_filtro bg_carolina">
      <p class="relatorio_vendedor_filtro_titulo font_subtitulo">Organizar por:</p>
      <select id="filtros-relatorio-vendas" name="ordenar">
        <option selected value="id">ID</option>
        <option value="produto">Produto</option>
        <option value="preco">Preço Uni.</option>
        <option value="quantidade">Quantidade</option>
        <option value="status">Status</option>
      </select>
    </div>

    <div class="base_tabela">
      <table>
        <colgroup>
          <col class="">
          <col class="">
          <col class="">
          <col class="">
          <col class="">
          <col class="">
        </colgroup>
        <thead>
          <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Preço Uni.</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th>Cliente</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <div class="base_navegacao">
      <div class="relatorio_vendedor_navegacao">
        <button id="btnAnterior" class="base_botao btn_blue">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro_branco.svg" class="base_icon esquerda">
        </button>
        <button id="btnProximo" class="base_botao btn_blue">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro_branco.svg" class="base_icon direita">
        </button>
      </div>
    </div>
  </main>

  <script>
    const PATH_PUBLIC = "<?= $PATH_PUBLIC ?>";
  </script>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/tabelas/renderTableRelatorioVendedor.js"></script>

</body>

</html>