<?php
require_once __DIR__ . '/../controllers/RelatorioVendasController.php';
$controller = new RelatorioVendasController();
$dados = $controller->index();
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Relatório de Vendas- E ao Quadrado";
  $css = ["/css/vendedor/relatorio_vendas.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>
  
  <main class="relatorio_vendas_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <!-- Cabeçalho -->
      <div class="relatorio_vendas_header_holder">
        <div class="relatorio_vendas_text_titulo">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_relatorio_icon.svg" alt="">
          <h1 class="font_titulo">RELATÓRIO DE VENDAS</h1>
        </div>
        <hr class="relatorio_vendas_linha_sublinhado">
      </div>
      
      <!-- Corpo principal -->
      <div class="relatorio_vendas_body_holder"> 
        <div class="relatorio_vendas_main_content">
          <div class="relatorio_vendas_quadrado_container">
            <!-- Formulário de pesquisa -->
            <div class="relatorio_vendas_pesquisar_pedidos">
              <div class="relatorio_vendas_subtitulo_generico">
                <div class="relatorio_vendas_linha_vertical"></div>
                <div class="relatorio_vendas_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/produto_lupa_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Pesquisar Pedidos</h2>
                </div>
              </div>
              <form method="post" class="relatorio_vendas_forms_pesquisa_pedidos">
                <!-- Campos do formulário -->
                <div class="relatorio_vendas_form_cliente">
                  <label class="font_subtitulo font_celadon">Código Do Produto / Nome Cliente</label>
                  <input type="text" name="codigo_nome" value="<?= htmlspecialchars($dados['filtros']['codigo_nome']) ?>" class="base_input">
                </div>
                <div class="relatorio_vendas_inputs_esquerda">
                  <!-- Status -->
                  <div class="relatorio_vendas_input_status base_input_select">
                    <label class="font_subtitulo font_celadon">Status</label>
                    <select name="status" class="base_input">
                      <option value="">Todos</option>
                      <option value="Entregue" <?= $dados['filtros']['status'] === 'Entregue' ? 'selected' : '' ?>>Entregue</option>
                      <option value="Em transporte" <?= $dados['filtros']['status'] === 'Em transporte' ? 'selected' : '' ?>>Em transporte</option>
                      <option value="Reembolsado" <?= $dados['filtros']['status'] === 'Reembolsado' ? 'selected' : '' ?>>Reembolsado</option>
                    </select>
                  </div>
                  
                  <!-- Mês -->
                  <div class="relatorio_vendas_input_mes base_input_select">
                    <label class="font_subtitulo font_celadon">Mês</label>
                    <select name="mes" class="base_input">
                      <option value="">Todos</option>
                      <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?= $i ?>" <?= $dados['filtros']['mes'] == $i ? 'selected' : '' ?>>
                          <?= DateTime::createFromFormat('!m', $i)->format('F') ?>
                        </option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  
                  <!-- Ano -->
                  <div class="relatorio_vendas_input_ano base_input_select">
                    <label class="font_subtitulo font_celadon">Ano</label>
                    <select name="ano" class="base_input">
                      <option value="">Todos</option>
                      <?php for ($ano = date('Y'); $ano >= 2020; $ano--): ?>
                        <option value="<?= $ano ?>" <?= $dados['filtros']['ano'] == $ano ? 'selected' : '' ?>><?= $ano ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                
                <!-- Botões -->
                <div class="relatorio_vendas_holder_botao">
                  <button type="reset" class="base_botao btn_red">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_branco_icon.svg"> CANCELAR
                  </button>
                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg"> CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            
            <!-- Estatísticas -->
            <div class="relatorio_vendas_estatisticas">
              <div class="relatorio_vendas_subtitulo_generico">
                <div class="relatorio_vendas_linha_vertical"></div>
                <div class="relatorio_vendas_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/grafico_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Estatísticas</h2>
                </div>
              </div>
              <div class="relatorio_vendas_estatistica_holder">
                <!-- Cards de estatísticas -->
                <?php
                $cards = [
                    ['Valor Total', 'R$' . $dados['estatisticas']['valor_total']],
                    ['Total De Vendas', $dados['estatisticas']['total_vendas'] . ' UNI'],
                    ['Tempo Medio De Entrega', $dados['estatisticas']['tempo_medio_entrega'] . ' Dias'],
                    ['Pedidos Recebidos', $dados['estatisticas']['pedidos_entregues']],
                    ['Total De Pedidos', $dados['estatisticas']['total_pedidos']],
                    ['Pedidos Reembolsados', $dados['estatisticas']['pedidos_reembolsados']]
                ];
                
                foreach ($cards as $card): ?>
                  <div class="relatorio_vendas_card">
                    <span class="relatorio_vendas_titulo"><?= $card[0] ?></span>
                    <span class="relatorio_vendas_estatistica_descricao"><?= $card[1] ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Tabela de histórico -->
    <div class="relatorio_vendas_header_title">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/pasta_clock_icon.svg"/>
      <h1 class="font_titulo">HISTÓRICO DE PEDIDOS</h1>
    </div>
    
    <div class="relatorio_vendas_table">
      <div class="relatorio_vendas_table_filtro bg_carolina">
        <p class="relatorio_vendas_filtro_titulo font_subtitulo">Organizar por:</p>
        <select>
          <option value="">Mais recentes</option>
          <option value="">Mais antigos</option>
          <option value="">Maior valor</option>
          <option value="">Menor valor</option>
        </select>
      </div>
      
      <div class="base_tabela">
        <table>
          <colgroup>
            <col class="relatorio_vendas_table_col-1">
            <col class="relatorio_vendas_table_col-2">
            <col class="relatorio_vendas_table_col-3">
            <col class="relatorio_vendas_table_col-4">
            <col class="relatorio_vendas_table_col-5">
            <col class="relatorio_vendas_table_col-6">
            <col class="relatorio_vendas_table_col-7">
          </colgroup>
          <thead>
            <tr>
              <th>Cód.</th>
              <th>Pedido</th>
              <th>Preço</th>
              <th>Qtn.</th>
              <th>Previsão de Entrega</th>
              <th>Status</th>
              <th>Cliente</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($dados['pedidos'])): ?>
              <?php foreach ($dados['pedidos'] as $pedido): ?>
                <tr>
                  <td>#<?= $pedido['codigo'] ?></td>
                  <td><?= htmlspecialchars($pedido['produtos']) ?></td>
                  <td>R$ <?= number_format($pedido['preco'], 2, ',', '.') ?></td>
                  <td><?= $pedido['quantidade'] ?></td>
                  <td>
                    <?= date('d/m/Y', strtotime($pedido['data_pedido'])) ?> - 
                    <?= date('d/m/Y', strtotime($pedido['data_entrega_prevista'])) ?>
                  </td>
                  <td><?= $pedido['status'] ?></td>
                  <td><?= htmlspecialchars($pedido['cliente']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center">Nenhum pedido encontrado</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  
  <?php include_once("$PATH_COMPONENTS/php/footer.php"); ?>
</body>
</html>