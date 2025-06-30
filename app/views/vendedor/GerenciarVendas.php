<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Gerenciar Vendas - E ao Quadrado";
  $css = ["/css/admin/GerenciarVendas.css"];
  require_once('./utils/head.php');
?>
<body>

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="gerenciar_produtos_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="gerenciar_produtos_header_holder">
        <div class="gerenciar_produtos_text_titulo">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/produto_icon.svg" alt="">
          <h1 class="gerenciar_produtos_header_holder font_titulo">GERENCIAR VENDAS</h1>
        </div>
        <hr class="gerenciar_produtos_linha_sublinhado">
      </div>
      
      <div class="gerenciar_produtos_body_holder">
        <div class="gerenciar_produtos_main_content">
          <div class="gerenciar_produtos_quadrado_container">
            <div class="gerenciar_produtos_pesquisar_produtos">
              <div class="gerenciar_produtos_subtitulo_generico">
                <div class="gerenciar_produtos_linha_vertical"></div>
                <div class="gerenciar_produtos_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/produto_lupa_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Pesquisar Produtos</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_produtos_forms_pesquisa_pedidos">
                <div class="gerenciar_produtos_form_cliente">
                  <label class="font_subtitulo font_celadon">Nome do Cliente</label>
                  <input type="text" spellcheck="false" class="base_input" name="cliente">
                </div>
                <div class="gerenciar_produtos_inputs_esquerda">
                  
                  <div class="gerenciar_produtos_input_mes base_input_select">
                    <label for="mes" class="font_subtitulo font_celadon">Mês</label>
                    <select name="mes" id="mes" class="gerenciar_produtos_mes_select base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value="janeiro">Janeiro</option>
                      <option value="fevereiro">Fevereiro</option>
                      <option value="marco">Março</option>
                      <option value="abril">Abril</option>
                      <option value="maio">Maio</option>
                      <option value="junho">Junho</option>
                      <option value="julho">Julho</option>
                      <option value="agosto">Agosto</option>
                      <option value="setembro">Setembro</option>
                      <option value="outubro">Outubro</option>
                      <option value="novembro">Novembro</option>
                      <option value="dezembro">Dezembro</option>
                    </select>
                  </div>
                  <div class="gerenciar_produtos_input_ano base_input_select">
                    <label for="ano" class="font_subtitulo font_celadon">Ano</label>
                    <select name="ano" id="ano" class="gerenciar_produtos_ano_select base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value="2025">2025</option>
                    </select>
                  </div>
                </div>
                <div class="gerenciar_produtos_holder_botao">

                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg">
                    PROCURAR
                  </button>
                </div>
              </form>
            </div>
            <div class="gerenciar_produtos_estatisticas">
              <div class="gerenciar_produtos_subtitulo_generico">
                <div class="gerenciar_produtos_linha_vertical"></div>
                <div class="gerenciar_produtos_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/grafico_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Estatísticas</p>
                </div>
              </div>
              <div class="gerenciar_produtos_estatistica_holder">
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Lucro total</span>
                  <span class="gerenciar_produtos_estatistica_descricao">
                    R$ <?= number_format($estatisticas['lucro_total'] ?? 0, 2, ',', '.') ?>
                  </span>
                </div>
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Total De Vendas</span>
                  <span class="gerenciar_produtos_estatistica_descricao">
                    <?= $estatisticas['total_vendas'] ?? 0 ?> UNI
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_produtos_header_title">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/pasta_clock_icon.svg"/>
      <h1 class="gerenciar_produtos_text_header font_titulo">HISTÓRICO DE VENDAS</h1>
    </div>
    <div class="gerenciar_produtos_table">
      <div class="gerenciar_produtos_table_filtro bg_carolina">
        <p class="gerenciar_produtos_filtro_titulo font_subtitulo">Organizar por:</p>
        <form method="post" id="ordenarForm">
          <select name="ordenar" onchange="document.getElementById('ordenarForm').submit();">
            <option value="" selected disabled>Selecione</option>
            <option value="id_compra">ID</option>
            <option value="cliente">CLIENTE</option>
            <option value="valor_total">PREÇO</option>
            <option value="data_compra">DATA DE COMPRA</option>
          </select>
        </form>
      </div>
      <div class="base_tabela">
        <table>
        <thead>
          <tr>
            <th>ID</th><th>Cliente</th><th>Preço</th>
            <th>Gerenciamento</th><th>Data de Compra</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($vendas)): ?>
            <tr><td colspan="6">Nenhum resultado encontrado</td></tr>
          <?php else: ?>
            <?php foreach ($vendas as $v): ?>
              <tr>
                <td># <?= htmlspecialchars($v['id_compra']) ?></td>
                <td><?= htmlspecialchars($v['cliente']) ?></td>
                <td>R$ <?= number_format($v['valor_total'], 2, ',', '.') ?></td>
                <td>
                  <form method="POST" style="display:inline;" action="Venda-api-sale">
                    <input type="hidden" name="id_venda" value=<?= htmlspecialchars($v['id_compra']) ?>>
                    <button type="submit" class="aprovar_vendedor_btn_aprovar btn_blue base_botao">GERENCIAR</button>
                  </form>
                </td>
                <td><?= htmlspecialchars(date('d/m/Y', strtotime($v['data_compra']))) ?></td>
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