<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Aprovar Vendedor - E ao Quadrado";
$css = ["/css/admin/AprovarVendedor.css"];
require_once('./utils/head.php');
require_once('./app/controllers/admin/AprovarVendedorController.php');

$controller = new AprovarVendedorController();
$filtros     = $controller->filtros;
$lista       = $controller->lista;
$estatisticas = $controller->model->getEstatisticas();
$e = $estatisticas ?? ['aprovados' => 0, 'reprovados' => 0, 'inativados' => 0];

?>

<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main class="aprovar_vendedor_body_container">
    <div class="aprovar_vendedor_firula_holder">
      <div class="aprovar_vendedor_header_holder">
        <div class="aprovar_vendedor_text_titulo">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/aprovar_vendedor2.svg" alt="">
          <h1 class="aprovar_vendedor_header_holder font_titulo">APROVAR VENDEDOR</h1>
        </div>
        <hr class="aprovar_vendedor_linha_sublinhado">
        <div>

          <div class="aprovar_vendedor_main_content">
            <div class="aprovar_vendedor_quadrado_container">
              <div class="aprovar_vendedor_pesquisar_pedidos">
                <div class="aprovar_vendedor_subtitulo_generico">
                  <div class="aprovar_vendedor_linha_vertical"></div>
                  <div class="aprovar_vendedor_subtitle_holder">
                    <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/produto_lupa_icon.svg" />
                    <h2 class="font_subtitulo font_celadon">Pesquisar Vendedor</p>
                  </div>
                </div>
                <form action="" method="post" class="aprovar_vendedor_forms_pesquisa_pedidos">
                  <label class="font_subtitulo font_celadon">Código / Nome Vendedor</label>
                  <input type="text" name="search" class="base_input"
                    placeholder="Código / Nome" value="<?= htmlspecialchars($filtros['search']) ?>">
                  <div class="aprovar_vendedor_filtro">
                    <div class="aprovar_vendedor_container_status base_input_select">
                      <label class="font_subtitulo font_celadon">Status</label>
                      <select name="status" class="aprovar_vendedor_select_status base_input">
                        <option value="">Todos</option>
                        <option value="Aprovado" <?= $filtros['status'] === 'Aprovado' ? 'selected' : '' ?>>Aprovado</option>
                        <option value="Pendente" <?= $filtros['status'] === 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                        <option value="Reprovado" <?= $filtros['status'] === 'Reprovado' ? 'selected' : '' ?>>Reprovado</option>
                      </select>
                    </div>

                    <div class="aprovar_vendedor_container_mes base_input_select">
                      <label class="font_subtitulo font_celadon">Mês</label>
                      <select name="mes" class="aprovar_vendedor_mes_select base_input">
                        <option value="" <?= $filtros['mes'] === '' ? 'selected' : '' ?>>Todos</option>
                        <?php
                        $meses = [
                          'Janeiro' => 'January',
                          'Fevereiro' => 'February',
                          'Março' => 'March',
                          'Abril' => 'April',
                          'Maio' => 'May',
                          'Junho' => 'June',
                          'Julho' => 'July',
                          'Agosto' => 'August',
                          'Setembro' => 'September',
                          'Outubro' => 'October',
                          'Novembro' => 'November',
                          'Dezembro' => 'December'
                        ];

                        foreach ($meses as $m_pt => $m_en): ?>
                          <option value="<?= $m_en ?>"
                            <?= $filtros['mes'] === $m_en ? 'selected' : '' ?>>
                            <?= $m_pt ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="aprovar_vendedor_container_ano base_input_select">
                      <label class="font_subtitulo font_celadon">Ano</label>
                      <select name="ano" class="aprovar_vendedor_ano_select base_input">
                        <option value="" <?= $filtros['ano'] === '' ? 'selected' : '' ?>>Todos</option>
                        <?php for ($y = date('Y'); $y >= date('Y') - 5; $y--): ?>
                          <option value="<?= $y ?>" <?= $filtros['ano'] === (string)$y ? 'selected' : '' ?>>
                            <?= $y ?>
                          </option>
                        <?php endfor; ?>
                      </select>
                    </div>
                  </div>

                  <div class="aprovar_vendedor_container_botao">
                    <div class="aprovar_vendedor_holder_botao">
                      <button type="submit" class="btn_blue base_botao">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
                        PESQUISAR
                      </button>
                      <button type="submit" name="btnPesquisar" class="btn_red base_botao">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/cesta_lixo_branca_icon.svg" alt="">
                        LIMPAR
                      </button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="aprovar_vendedor_estatisticas">
                <div class="aprovar_vendedor_subtitulo_generico">
                  <div class="aprovar_vendedor_linha_vertical"></div>
                  <div class="aprovar_vendedor_subtitle_holder">
                    <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/grafico_icon.svg" />
                    <h2 class="font_subtitulo font_celadon">Estatísticas de Aprovação</h2>
                  </div>
                </div>
                <div class="aprovar_vendedor_estatistica_holder">
                  <div class="aprovar_vendedor_card">
                    <div class="aprovar_vendedor_titulo">Vendedores Aprovados</div>
                    <div class="aprovar_vendedor_estatistica_descricao"><?= htmlspecialchars($e['aprovados']) ?></div>
                  </div>

                  <div class="aprovar_vendedor_card">
                    <div class="aprovar_vendedor_titulo">Vendedores Reprovados</div>
                    <div class="aprovar_vendedor_estatistica_descricao"><?= htmlspecialchars($e['reprovados']) ?></div>
                  </div>

                  <div class="aprovar_vendedor_card">
                    <div class="aprovar_vendedor_titulo">Vendedores Inativados</div>
                    <div class="aprovar_vendedor_estatistica_descricao"><?= htmlspecialchars($e['inativados']) ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="aprovar_vendedor_titulo_1">
      <div class="aprovar_vendedor_text_titulo_1">
        <img class="base_icon" src="<?= $PATH_PUBLIC . '/image/geral/icons/pasta_clock_icon.svg' ?>" alt="" />
        <h1>GERENCIAR VENDEDOR</h1>
      </div>
    </div>
    <div class="aprovar_vendedor_table_filtro bg_carolina">
      <p class="aprovar_vendedor_filtro_titulo font_subtitulo">Organizar por:</p>
      <select id="filtros-gerenciar-vendas" name="ordenar">
        <option selected value="cod">CÓD.</option>
        <option value="alfabetica">A-Z</option>
        <option value="requisitos">REQUISITOS</option>
        <option value="declaracao">DECLARAÇÃO</option>
        <option value="status">STATUS</option>
      </select>
    </div>
    <div class="base_tabela">
      <table>
        <colgroup>
          <col class="aprovar_vendedor_table_col-1">
          <col class="aprovar_vendedor_table_col-2">
          <col class="aprovar_vendedor_table_col-3">
          <col class="aprovar_vendedor_table_col-4">
          <col class="aprovar_vendedor_table_col-5">
          <col class="aprovar_vendedor_table_col-6">
        </colgroup>
        <thead>
          <tr>
            <th>Cód.</th>
            <th>Vendedor</th>
            <th>Requisitos</th>
            <th>Declaração</th>
            <th>Status</th>
            <th>Gerenciamento</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <div class="base_navegacao">
      <div class="aprovar_vendedor_navegacao">
        <button id="btnAnterior" class="base_botao btn_blue">
          <img src="./public/image/geral/icons/seta_filtro_branco.svg" class="base_icon esquerda">
        </button>
        <button id="btnProximo" class="base_botao btn_blue">
          <img src="./public/image/geral/icons/seta_filtro_branco.svg" class="base_icon direita">
        </button>
      </div>
    </div>
  </main>
</body>
<script src="<?= $PATH_PUBLIC ?>/js/tabelas/renderTableAprovarVendedor.js"></script>
<script>
  window.vendedores = <?= json_encode($lista) ?>;
</script>

</html>