<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/vendedor/relatorio_vendas.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="main_container">
  <!-- fazer a responsividade -->
  <!-- arrumar o nome das class -->
   
  <?php
    include_once('../../pages/geral/navbar.php');
    ?> 
  <header class="header_relatorio">
    <div class="inner_header">
      <h1 class="text_header">Relatório de Vendas</h1>
      <hr class="linha_header">
    </div>
  </header>
  <main class="main_content">
    <div class="quadrado_container">
      <div class="pesquisar_pedidos">
        <div class="header_pedidos">
          <p class="text_pedidos">Pesquisar Pedidos</p>
          <hr class="linha_pedidos">
        </div>
        <form action="" method="post" class="forms_pesquisa_pedidos">
          <label class='label_cod'>Código Do Produto / Nome Cliente</label>
          <input type="text" class='input_cod'>
          <label for="select_cod" class="label_status">Status</label>
          <select name="select_cod" class="select_status">
            <option value="Entregue">Entregue</option>
            <option value="Em transporte">Em transporte</option>
          </select>
          <label for="mes" class="mes">Mês</label>
              <select name="mes" id="mes" class="mes_select">
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
              <label for="ano" class="ano">Ano</label>
              <select name="ano" id="ano" class="ano_select">
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
          <button type="reset" class="cancelar">Cancelar</button>
          <button type='submit' class="confirmar">Confirmar</button>
        </form>
      </div>
      <div class="estatisticas">
        <div class="header_estatisticas">
          <p class="text_estatisticas">Estatísticas</p>
          <hr class="linha_estatisticas">
        </div>
        <span class='titulo_geral'>geral</span>
        <div class="valor_total">
          <span class='titulo'>Valor Total</span>
          <span class='num'>R$14.145,35</span>
        </div>
        <div class="total_vendas">
          <span class='titulo'>Total De Vendas</span>
          <span class='num'>14 UNI</span>
        </div>
        <div class="pedidos_recebidos">
          <span class='titulo'>Pedidos Recebidos</span>
          <span class='num'>4 - 100%</span>
        </div>
        <div class="horario_medio">
          <span class='titulo'>Horário Médio Da Entrega</span>
          <span class='num'>Manhã</span>
        </div>
        <div class="total_pedidos">
          <span class='titulo'>Total De Pedidos</span>
          <span class='num'>4</span>
        </div>
        <div class="reembolso">
          <span class='titulo'>Pedidos Reembolsados</span>
          <span class='num'>0 - 0%</span>
        </div>
        <div class="medio_entrega">
          <span class='titulo'>Tempo Medio De Entrega</span>
          <span class='num'>9 Dias</span>
        </div>
        <div class="placeholder">
          <span class='titulo'>-</span>
        </div>
      </div>
    </div>
    <div class="filtro"></div>
    <div class="table"></div>
  </main>
</body>
</html>