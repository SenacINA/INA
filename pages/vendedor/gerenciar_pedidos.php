<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/vendedor/gerenciar_pedidos.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="gerenciar_pedidos_main_container">
  <nav class="gerenciar_pedidos_navbar_principal" style="background-color: purple;"></nav>
  <div class="gerenciar_pedidos_body_container">
    <div class="gerenciar_pedidos_body_holder bg_azul_leve">
      <header class="gerenciar_pedidos_header_relatorio">
        <div class="gerenciar_pedidos_header_holder">
          <img src="../../image/admin/atualizar_usuario/perfil_icon.svg" />
          <h1 class="gerenciar_pedidos_text_header font_titulo">Gerenciar Pedidos</h1>
        </div>
        <hr class="gerenciar_pedidos_linha_header">
      </header>
      <main class="gerenciar_pedidos_main_content">
        <div class="gerenciar_pedidos_quadrado_container">
          <div class="gerenciar_pedidos_pesquisar_pedidos">
            <div class="gerenciar_pedidos_header_pedidos">
              <p class="gerenciar_pedidos_text_pedidos font_subtitulo font_celadon">Pesquisar Pedidos</p>
            </div>
            <form action="" method="post" class="gerenciar_pedidos_forms_pesquisa_pedidos">
              <div class="gerenciar_pedidos_form_cliente">
                <label class="gerenciar_pedidos_label_cod font_subtitulo font_celadon">Código Do Produto / Nome Cliente</label>
                <input type="text" class="gerenciar_pedidos_input_cod base_input">
              </div>
              <div class="gerenciar_pedidos_inputs_esquerda">
                <div class="gerenciar_pedidos_input_status">
                  <label for="select_cod" class="gerenciar_pedidos_label_status font_subtitulo font_celadon">Status</label>
                  <select name="select_cod" class="gerenciar_pedidos_select_status base_input">
                    <option value="Entregue">Entregue</option>
                    <option value="Em transporte">Em transporte</option>
                  </select>
                </div>
                <div class="gerenciar_pedidos_input_mes">
                  <label for="mes" class="gerenciar_pedidos_mes font_subtitulo font_celadon">Mês</label>
                  <select name="mes" id="mes" class="gerenciar_pedidos_mes_select base_input">
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
                <div class="gerenciar_pedidos_input_ano">
                  <label for="ano" class="gerenciar_pedidos_ano font_subtitulo font_celadon">Ano</label>
                  <select name="ano" id="ano" class="gerenciar_pedidos_ano_select base_input">
                    <option value="" selected disabled style="display: none;">Selecione</option>
                    <option value=" 2020">2020</option>
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
              </div>
              <div class="gerenciar_pedidos_holder_botao">
                <button type="reset" class="gerenciar_pedidos_cancelar base_botao">Cancelar</button>
                <button type="submit" class="gerenciar_pedidos_confirmar base_botao">Confirmar</button>
              </div>
            </form>
          </div>
          <div class="gerenciar_pedidos_estatisticas">
            <div class="gerenciar_pedidos_header_estatisticas">
              <p class="gerenciar_pedidos_text_estatisticas font_celadon">Estatísticas</p>
            </div>
            <div class="gerenciar_pedidos_estatistica_holder">
              <div class="gerenciar_pedidos_card">
                <span class="gerenciar_pedidos_titulo">Valor Total</span>
                <span class="gerenciar_pedidos_estatistica_descricao">R$14.145,35</span>
              </div>
              <div class="gerenciar_pedidos_card">
                <span class="gerenciar_pedidos_titulo">Total De Vendas</span>
                <span class="gerenciar_pedidos_estatistica_descricao">14 UNI</span>
              </div>
              <div class="gerenciar_pedidos_card">
                <span class="gerenciar_pedidos_titulo">Tempo Medio De Entrega</span>
                <span class="gerenciar_pedidos_estatistica_descricao">9 Dias</span>
              </div>
              <div class="gerenciar_pedidos_card">
                <span class="gerenciar_pedidos_titulo">Pedidos Recebidos</span>
                <span class="gerenciar_pedidos_estatistica_descricao">4 - 100%</span>
              </div>
              <div class="gerenciar_pedidos_card">
                <span class="gerenciar_pedidos_titulo">Total De Pedidos</span>
                <span class="gerenciar_pedidos_estatistica_descricao">4</span>
              </div>
              <div class="gerenciar_pedidos_card">
                <span class="gerenciar_pedidos_titulo">Pedidos Reembolsados</span>
                <span class="gerenciar_pedidos_estatistica_descricao">0 - 0%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="gerenciar_pedidos_filtro"></div>
        <div class="gerenciar_pedidos_table"></div>
      </main>
    </div>
  </div>
</body>

</html>