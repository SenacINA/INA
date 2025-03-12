<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/admin/gerenciar_produtos.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <header class = "gerenciar_produtos_header">
    <div class = "gerenciar_produtos_header_title">
      <h1>GERENCIAR PRODUTOS</h1> 
    </div>
    <div class="gerenciar_produtos_header_linha"></div>
  </header>

  <main class="gerenciar_produtos_main_container">
    <div class="gerenciar_produtos_main_content">
      <div class="gerenciar_produtos_pesquisa">
        <div class="gerenciar_produtos_pesquisa_cliente">
          <div class="gerenciar_produtos_main_text_pesquisa_container">
            <p class="gerenciar_produtos_main_text_pesquisa">Pesquisar Produtos</p>
            <hr class="gerenciar_produtos_linha">
          </div>
          <form class="gerenciar_produtos_forms_pesquisa">
            <label for="ip_email">Código do produto / Nome vendedor</label>
            <input type="text" name="ip_email" id="gerenciar_produtos_ip_email">
            <div class="gerenciar_produtos_selects">
              <label for="plano" class="gerenciar_produtos_plano">Status</label>
              <select name="plano" id="gerenciar_produtos_plano" class="gerenciar_produtos_plano_select">
              </select>
              <label for="mes" class="gerenciar_produtos_mes">Mês</label>
              <select name="mes" id="gerenciar_produtos_mes" class="gerenciar_produtos_mes_select">
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
              <label for="ano" class="gerenciar_produtos_ano">Ano</label>
              <select name="ano" id="gerenciar_produtos_ano" class="gerenciar_produtos_ano_select">
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
            </div>
            <div class="gerenciar_produtos_botoes_submit">
              <button type="reset" class="gerenciar_produtos_cancelar_submit"><img src="../../image/geral/x_botao_vermelho.svg">Cancelar</button>
              <button type="submit" class="gerenciar_produtos_confirmar_submit"><img src="../../image/geral/confirm_botao.svg">Confirmar</button>
            </div>
          </form>
        </div>
        <div class="gerenciar_produtos_estatisticas">
          <div class="gerenciar_produtos_main_text_info_container">
            <p class="gerenciar_produtos_main_text_info">Estatísticas</p>
            <hr class="gerenciar_produtos_linha">
            <p class="gerenciar_produtos_sub_text_info gerenciar_produtos_font_subtitulo">Geral</p>

            <div class="gerenciar_produtos_grid_item">1</div>
            <div class="gerenciar_produtos_grid_item">2</div>
            <div class="gerenciar_produtos_grid_item">3</div>
            <div class="gerenciar_produtos_grid_item">4</div>
            <div class="gerenciar_produtos_grid_item">5</div>
            <div class="gerenciar_produtos_grid_item">6</div>
            <div class="gerenciar_produtos_grid_item">7</div>
            <div class="gerenciar_produtos_grid_item">8</div>
            <div class="gerenciar_produtos_grid_item">9</div>
          </div>
        </div>
      </div>
    </div>
    </div>



    <div class="gerenciar_produtos_botoes">


      <main class="gerenciar_produtos_main_container">
        <div class="gerenciar_produtos_botoes">
          <select name="filtro" id="gerenciar_produtos_filtro" class="gerenciar_produtos_filtro">
            <option value="">Organizar por:</option>
            <option value="cod">Código</option>
            <option value="nome">Nome</option>
            <option value="requisitos">Requisitos</option>
            <option value="declaracao">Declaração</option>
            <option value="aprovar">Aprovar</option>
            <option value="status">Status</option>
          </select>
        </div>
        <div class="gerenciar_produtos_table">
          <p>CÓDIGO</p>
          <p>PRODUTO</p>
          <p>PREÇO</p>
          <p>QUANTIDADE</p>
          <p>PREVIEW DA ENTREGA</p>
          <p>VENDEDOR</p>
          <span># 1001</span>
          <span>Cadeira Gamer Throne - RGB </span>
          <span>R$ 1.400,00</span>
          <span>01</span>
          <span>25/03/2024 20:23:31 - 06/04/2024 06:07:53</span>
          <span>THUNDER GAMES</span>
          <span># 1002</span>
          <span>Carregador Portátil</span>
          <span>R$ 199,90</span>
          <span>02</span>
          <span>25/03/2024 21:43:20 - 06/04/2024 07:32:54</span>
          <span>Revendedor Tec</span>
          <span># 1003</span>
          <span>Xiaomi Redmi PocoPhone X6</span>
          <span>R$ 12.043,90</span>
          <span>10</span>
          <span>25/03/2024 22:13:51 - 06/04/2024 07:37:51</span>
          <span>Revendedor Tec</span>
          <span># 1004</span>
          <span>Mesa de Escritório Luna</span>
          <span>R$ 899,90</span>
          <span>01</span>
          <span>25/03/2024 23:55:32 - 06/04/2024 07:48:38</span>
          <span>Móveis e Decorações</span>
        </div>
      </main>
</body>

</html>