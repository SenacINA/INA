<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/vendedor/gerenciar_pedidos.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="gerenciar_pedidos_main_container">
  <nav class="gerenciar_pedidos_navbar_principal"></nav>
  <header class="gerenciar_pedidos_header_relatorio">
    <div class="gerenciar_pedidos_inner_header">
      <h1 class="gerenciar_pedidos_text_header">Gerenciar Pedidos</h1>
      <hr class="gerenciar_pedidos_linha_header">
    </div>
  </header>
  <main class="gerenciar_pedidos_main_content">
    <div class="gerenciar_pedidos_quadrado_container">
      <div class="gerenciar_pedidos_pesquisar_pedidos">
        <div class="gerenciar_pedidos_header_pedidos">
          <p class="gerenciar_pedidos_text_pedidos">Pesquisar Pedidos</p>
          <hr class="gerenciar_pedidos_linha_pedidos">
        </div>
        <form action="" method="post" class="gerenciar_pedidos_forms_pesquisa_pedidos">
          <label class="gerenciar_pedidos_label_cod">Código Do Produto / Nome Cliente</label>
          <input type="text" class="gerenciar_pedidos_input_cod">
          <label for="select_cod" class="gerenciar_pedidos_label_status">Status</label>
          <select name="select_cod" class="gerenciar_pedidos_select_status">
            <option value="Entregue">Entregue</option>
            <option value="Em transporte">Em transporte</option>
          </select>
          <label for="mes" class="gerenciar_pedidos_mes">Mês</label>
              <select name="mes" id="mes" class="gerenciar_pedidos_mes_select">
                <option value="">Selecione um mês</option>
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
              <label for="ano" class="gerenciar_pedidos_ano">Ano</label>
              <select name="ano" id="ano" class="gerenciar_pedidos_ano_select">
                <option value="">Selecione um ano</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
              </select>
          <button type="reset" class="gerenciar_pedidos_cancelar">Cancelar</button>
          <button type="submit" class="gerenciar_pedidos_confirmar">Confirmar</button>
        </form>
      </div>
      <div class="gerenciar_pedidos_estatisticas">
        <div class="gerenciar_pedidos_header_estatisticas">
          <p class="gerenciar_pedidos_text_estatisticas">Estatísticas</p>
          <hr class="gerenciar_pedidos_linha_estatisticas">
        </div>
        <span class="gerenciar_pedidos_titulo_geral">geral</span>
        <div class="gerenciar_pedidos_valor_total">
          <span class="gerenciar_pedidos_titulo">Valor Total</span>
          <span class="gerenciar_pedidos_num">R$14.145,35</span>
        </div>
        <div class="gerenciar_pedidos_total_vendas">
          <span class="gerenciar_pedidos_titulo">Total De Vendas</span>
          <span class="gerenciar_pedidos_num">14 UNI</span>
        </div>
        <div class="gerenciar_pedidos_pedidos_recebidos">
          <span class="gerenciar_pedidos_titulo">Pedidos Recebidos</span>
          <span class="gerenciar_pedidos_num">4 - 100%</span>
        </div>
        <div class="gerenciar_pedidos_horario_medio">
          <span class="gerenciar_pedidos_titulo">Horário Médio Da Entrega</span>
          <span class="gerenciar_pedidos_num">Manhã</span>
        </div>
        <div class="gerenciar_pedidos_total_pedidos">
          <span class="gerenciar_pedidos_titulo">Total De Pedidos</span>
          <span class="gerenciar_pedidos_num">4</span>
        </div>
        <div class="gerenciar_pedidos_reembolso">
          <span class="gerenciar_pedidos_titulo">Pedidos Reembolsados</span>
          <span class="gerenciar_pedidos_num">0 - 0%</span>
        </div>
        <div class="gerenciar_pedidos_medio_entrega">
          <span class="gerenciar_pedidos_titulo">Tempo Medio De Entrega</span>
          <span class="gerenciar_pedidos_num">9 Dias</span>
        </div>
        <div class="gerenciar_pedidos_placeholder">
          <span class="gerenciar_pedidos_titulo">-</span>
        </div>
      </div>
    </div>
    <div class="gerenciar_pedidos_filtro"></div>
    <div class="gerenciar_pedidos_table"></div>
  </main>
</body>
</html>