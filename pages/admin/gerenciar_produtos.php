<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/admin/gerenciar_produtos.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 768px -->

  <?php
    include_once('../../pages/geral/navbar.php');
    ?>
  <main class="gerenciar_produtos_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="gerenciar_produtos_header_holder">
        <div class="gerenciar_produtos_text_titulo">
          <img src="../../image/admin/gerenciar_produtos/produto.svg" alt="">
          <h1 class="gerenciar_produtos_header_holder font_titulo">GERENCIAR PRODUTOS</h1>
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
                  <img class="base_icon" src="../../image/admin/gerenciar_produtos/pesquisar_produto.svg" />
                  <h2 class="font_subtitulo font_celadon">Pesquisar Produtos</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_produtos_forms_pesquisa_pedidos">
                <div class="gerenciar_produtos_form_cliente">
                  <label class="font_subtitulo font_celadon">Código Do Produto / Nome Vendedor</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="gerenciar_produtos_inputs_esquerda">
                  
                  <div class="gerenciar_produtos_input_mes">
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
                  <div class="gerenciar_produtos_input_ano">
                    <label for="ano" class="font_subtitulo font_celadon">Ano</label>
                    <select name="ano" id="ano" class="gerenciar_produtos_ano_select base_input">
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
                <div class="gerenciar_produtos_holder_botao">
                  <button type="reset" class="base_botao btn_red">
                    <img src="../../image/geral/botoes/x_icon_branco.svg">
                    CANCELAR
                  </button>

                  <button type="submit" class="base_botao btn_blue">
                    <img src="../../image/geral/botoes/v_icon_branco.svg">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            <div class="gerenciar_produtos_estatisticas">
              <div class="gerenciar_produtos_subtitulo_generico">
                <div class="gerenciar_produtos_linha_vertical"></div>
                <div class="gerenciar_produtos_subtitle_holder">
                  <img class="base_icon" src="../../image/admin/gerenciar_produtos/estatisticas.svg" />
                  <h2 class="font_subtitulo font_celadon">Estatísticas</p>
                </div>
              </div>
              <div class="gerenciar_produtos_estatistica_holder">
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Valor Total</span>
                  <span class="gerenciar_produtos_estatistica_descricao">R$14.145,35</span>
                </div>
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Total De Vendas</span>
                  <span class="gerenciar_produtos_estatistica_descricao font_descricao">14 UNI</span>
                </div>
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Tempo Medio De Entrega</span>
                  <span class="gerenciar_produtos_estatistica_descricao">9 Dias</span>
                </div>
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Pedidos Recebidos</span>
                  <span class="gerenciar_produtos_estatistica_descricao">4 - 100%</span>
                </div>
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Total De Pedidos</span>
                  <span class="gerenciar_produtos_estatistica_descricao">4</span>
                </div>
                <div class="gerenciar_produtos_card">
                  <span class="gerenciar_produtos_titulo">Pedidos Reembolsados</span>
                  <span class="gerenciar_produtos_estatistica_descricao">0 - 0%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_produtos_header_title">
      <img src="../../image/vendedor/gerenciar_pedidos/pasta_clock.svg" />
      <h1 class="gerenciar_produtos_text_header font_titulo">HISTÓRICO DE PEDIDOS</h1>
    </div>
    <div class="gerenciar_produtos_table">
      <div class="gerenciar_produtos_table_filtro bg_carolina">
        <p class="gerenciar_produtos_filtro_titulo font_subtitulo">Organizar por:</p>
        <select>
          <option value="" selected disable style="display: none;"></option>
          <option value="">Opa1</option>
          <option value="">Opa2</option>
          <option value="">Opa3</option>
          <option value="">Opa4</option>
        </select>
      </div>
      <div class="base_tabela">
        <table>
          <colgroup>
            <col class="gerenciar_produtos_table_col-1">
            <col class="gerenciar_produtos_table_col-2">
            <col class="gerenciar_produtos_table_col-3">
            <col class="gerenciar_produtos_table_col-4">
            <col class="gerenciar_produtos_table_col-5">
            <col class="gerenciar_produtos_table_col-6">
            
          </colgroup>
          <thead>
            <tr>
              <th>Cód.</th>
              <th>Produto</th>
              <th>Preço</th>
              <th>Qtn.</th>
              <th>Preview da Entrega</th>
              <th>Vendedor</th>
             
            </tr>
            <tbody>
              <tr>
                <td># 1001</td>
                <td>
                  <span>
                    Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB
                  </span>
                </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>
                  <span>
                    25/03/2024 - 06/04/2024
                  </span>
                </td>
                <td>THUNDER GAMES</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>25/03/2024 - 06/04/2024</td>
                <td>THUNDER GAMES</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>25/03/2024 - 06/04/2024</td>
                <td>THUNDER GAMES</td>
                
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>25/03/2024 - 06/04/2024</td>
                <td>THUNDER GAMES</td>
                
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
      <a href="./dashboard.php">
        <div class="voltar">
          <button type="reset" class="base_botao btn_outline_blue">
                        <img src="../../image/geral/botoes/v_icon_carolina.svg">VOLTAR</button>
        </div>
      </a>
    </div>
  </main>
</body>
</html>