<!DOCTYPE html>
<html lang="pt-br">
<?php
    $titulo = "Aprovar Vendedores - E ao Quadrado";
    $css = ["/css/admin/AprovarVendedor.css"];
    require_once('./utils/head.php');
    require_once('./app/models/admin/AprovarVendedorModel.php');

    // Processa ações de aprovação/reprovação
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'], $_POST['vendedor_id'])) {
        $acao = $_POST['acao'];
        $id   = (int)$_POST['vendedor_id'];
        $model = new VendedorModel();

        if ($acao === 'aprovar') {
            $model->atualizarStatus($id, 'Aprovado');
        } elseif ($acao === 'reprovar') {
            $model->atualizarStatus($id, 'Reprovado');
        }
    }

    // Filtros do formulário
    $filtros = [
        'search' => $_POST['search'] ?? '',
        'status' => $_POST['status'] ?? '',
        'mes'    => $_POST['mes']    ?? '',
        'ano'    => $_POST['ano']    ?? '',
    ];

    $model = new VendedorModel();
    $lista = $model->getRequisicoes($filtros);
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main class="aprovar_vendedor_body_container">
    <form action="" method="post" class="aprovar_vendedor_forms_pesquisa_pedidos">
      <input type="text" name="search" class="base_input"
             placeholder="Código / Nome" value="<?= htmlspecialchars($filtros['search']) ?>">
      
      <select name="status" class="aprovar_vendedor_select_status base_input">
        <option value="">Todos</option>
        <option value="Aprovado" <?= $filtros['status']==='Aprovado' ? 'selected':'' ?>>Aprovado</option>
        <option value="Pendente" <?= $filtros['status']==='Pendente' ? 'selected':'' ?>>Pendente</option>
        <option value="Reprovado"<?= $filtros['status']==='Reprovado'? 'selected':'' ?>>Reprovado</option>
      </select>

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

      <select name="ano" class="aprovar_vendedor_ano_select base_input">
        <option value="" <?= $filtros['ano'] === '' ? 'selected' : '' ?>>Todos</option>
        <?php for ($y = date('Y'); $y >= date('Y') - 5; $y--): ?>
          <option value="<?= $y ?>" <?= $filtros['ano'] === (string)$y ? 'selected' : '' ?>>
            <?= $y ?>
          </option>
        <?php endfor; ?>
      </select>

      <button type="submit" class="base_botao btn_blue">Buscar</button>
      <button type="reset" class="base_botao btn_red">Limpar</button>
    </form>

    <!-- Estatísticas de Aprovação (fake data) -->
    <div class="aprovar_vendedor_estatisticas">
      <div class="aprovar_vendedor_subtitulo_generico">
        <div class="aprovar_vendedor_linha_vertical"></div>
        <div class="aprovar_vendedor_subtitle_holder">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/grafico_icon.svg" />
          <h2 class="font_subtitulo font_celadon">Estatísticas de Aprovação</h2>
        </div>
      </div>
      <div class="aprovar_vendedor_estatistica_holder">
        <div class="aprovar_vendedor_card">
          <div class="aprovar_vendedor_titulo">Vendedores Aprovados</div>
          <div class="aprovar_vendedor_estatistica_descricao">25</div>
        </div>

        <div class="aprovar_vendedor_card">
          <div class="aprovar_vendedor_titulo">Vendedores Reprovados</div>
          <div class="aprovar_vendedor_estatistica_descricao">3</div>
        </div>

        <div class="aprovar_vendedor_card">
          <div class="aprovar_vendedor_titulo">Vendedores Inativados</div>
          <div class="aprovar_vendedor_estatistica_descricao">1</div>
        </div>
      </div>
    </div>

    <!-- Tabela de resultados -->
    <div class="base_tabela">
      <table>
        <thead>
          <tr>
            <th>Cód.</th><th>Vendedor</th><th>Requisitos</th>
            <th>Declaração</th><th>Gerenciar</th><th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($lista)): ?>
          <tr><td colspan="6">Nenhum resultado encontrado</td></tr>
        <?php else: ?>
          <?php foreach ($lista as $v): ?>
            <tr>
              <td># <?= htmlspecialchars($v['codigo']) ?></td>
              <td><?= htmlspecialchars($v['vendedor']) ?></td>
              <td><?= htmlspecialchars($v['requisitos']) ?></td>
              <td><?= htmlspecialchars($v['declaracao']) ?></td>
              <td class="aprovar_vendedor_coluna_botoes">
                <?php if ($v['status'] === 'Pendente'): ?>
                  <form method="post" style="display:inline;">
                    <input type="hidden" name="acao" value="aprovar">
                    <input type="hidden" name="vendedor_id" value="<?= $v['codigo'] ?>">
                    <button type="submit" class="aprovar_vendedor_btn_aprovar">APROVAR</button>
                  </form>
                  <form method="post" style="display:inline;">
                    <input type="hidden" name="acao" value="reprovar">
                    <input type="hidden" name="vendedor_id" value="<?= $v['codigo'] ?>">
                    <button type="submit" class="aprovar_vendedor_btn_recusar">RECUSAR</button>
                  </form>
                <?php else: ?>
                  <button class="aprovar_vendedor_btn_inativar">INATIVAR</button>
                <?php endif; ?>
              </td>
              <td><?= htmlspecialchars($v['status']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

  <?php include_once("$PATH_COMPONENTS/php/footer.php"); ?>
</body>
</html>
