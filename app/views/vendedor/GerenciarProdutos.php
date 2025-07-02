<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Gerenciar Produtos - E ao Quadrado";
$css = ['/css/vendedor/GerenciarProdutos.css'];
require_once('./utils/head.php');
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="gerenciar_produtos_body_container">
    <div class="gerenciar_produtos_firula_holder">
      <div class="gerenciar_produtos_header_holder">
        <div class="gerenciar_produtos_text_titulo">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/etiqueta_icon.svg" alt="">
          <h1 class="gerenciar_produtos_header_holder font_titulo">GERENCIAR PRODUTOS</h1>
        </div>
        <hr class="gerenciar_produtos_linha_sublinhado">
      </div>

      <div class="gerenciar_produtos_body_holder">
        <div class="gerenciar_produtos_main_content">
          <div class="gerenciar_produtos_quadrado_container">
            <div class="gerenciar_produtos_pesquisar_pedidos">
              <div class="gerenciar_produtos_subtitulo_generico">
                <div class="gerenciar_produtos_linha_vertical"></div>
                <div class="gerenciar_produtos_subtitle_holder">
                  <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/produto_lupa_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Pesquisar Produtos</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_produtos_forms_pesquisa_pedidos">
                <div class="gerenciar_produtos_form_cliente">
                  <label class="font_subtitulo font_celadon">Nome do Produto</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="gerenciar_produtos_form_cliente">
                  <label class="font_subtitulo font_celadon">Código Do Produto</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <p class="instrucoes_busca">Preencha <strong>pelo menos um</strong> dos campos abaixo para realizar a pesquisa.</p>

                <div class="gerenciar_produtos_holder_botao">
                  <button type="reset" class="base_botao btn_red">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/x_branco_icon.svg">
                    CANCELAR
                  </button>

                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            <div class="gerenciar_produtos_estatisticas">
              <div class="gerenciar_produtos_subtitulo_generico">
                <div class="gerenciar_produtos_linha_vertical"></div>
                <div class="gerenciar_produtos_subtitle_holder">
                  <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/lista_lupa_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Resultado da Consulta</p>
                </div>
              </div>
              <div class="resultado_pesquisa">
                  <p class="resultado_title"><strong>&nbsp;</strong>&nbsp;</p>
                  <img class="resultado_img" src="./public/image/geral/image_placeholder.png" alt="">
                  <div class="resultado_dados">
                    
                    <p><strong>Preço:</strong> -</p>
                    <p><strong>Quantidade:</strong> -</p>
                    <p><strong>Status:</strong> -</p>
                  </div>
                  <button id="editar_search" disabled class='base_botao btn_blue'>
                    <img class='base_icon' src='public/image/geral/icons/caneta_branca_icon.svg'>
                    EDITAR
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_produtos_header_title">
      <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/produto_icon.svg" />
      <h1 class="gerenciar_produtos_text_header font_titulo">PRODUTOS</h1>
    </div>
    <div class="gerenciar_produtos_table">
      <div class="gerenciar_produtos_table_filtro bg_carolina">
        <p class="gerenciar_produtos_filtro_titulo font_subtitulo">Organizar por:</p>
        <select id="filtroRelatorio">
          <option value="code">Código</option>
          <option value="name">Nome</option>
          <option value="qty_asc">Quantidade ASC</option>
          <option value="qty_desc">Quantidade DESC</option>
          <option value="active">Ativos</option>
          <option value="inactive">Inativos</option>
        </select>
      </div>

      <div class='tabela-scroll'>
        <div class="base_tabela">
          <table>
            <colgroup>
              <col class="gerenciar_produtos_table_col-1">
              <col class="gerenciar_produtos_table_col-2">
              <col class="gerenciar_produtos_table_col-3">
              <col class="gerenciar_produtos_table_col-4">
              <col class="gerenciar_produtos_table_col-5">
            </colgroup>
            <thead>
              <tr>
                <th>Cód.</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Qtn.</th>
                <th>Status</th>
                <th>Gerenciamento</th>
              </tr>
            <tbody>
            </tbody>
            </thead>
          </table>
        </div>
      </div>
      <div class='base_navegacao'></div>

    </div>
  </main>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
      <?php if (!empty($_SESSION['errors'])): ?>
        gerarToast(<?= json_encode($_SESSION['errors']) ?>, "erro");
        <?php unset($_SESSION['errors']); ?>
      <?php endif; ?>

      <?php if (!empty($_SESSION['successMessage'])): ?>
        gerarToast(<?= json_encode($_SESSION['successMessage']) ?>, "sucesso");
        <?php unset($_SESSION['successMessage']); ?>
      <?php endif; ?>
    });
  </script>
<script>
  const idVendedor = <?= $idVendedor ?>;
</script><script src="<?= $PATH_PUBLIC ?>/js/vendedor/produtoSearch.js"></script>
<script src="<?= $PATH_PUBLIC ?>/js/tabelas/renderTableProdutos.js"></script>
<script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>


</html>