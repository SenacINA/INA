<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/admin/aprovar_vendedor.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 768px -->
  <!-- Caminho de Icon Correto -->
  
  <?php
    include_once('../../pages/geral/navbar.php');
    ?>
  <main class="aprovar_vendedor_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="aprovar_vendedor_header_holder">
        <div class="aprovar_vendedor_text_titulo">
          <img class="base_icon" src="../../image/geral/icons/perfil_verificado_icon.svg" alt="">
          <h1 class="aprovar_vendedor_header_holder font_titulo">APROVAR VENDEDOR</h1>
        </div>
        <hr class="aprovar_vendedor_linha_sublinhado">
      </div>
      
      <div class="aprovar_vendedor_body_holder"> 
        <div class="aprovar_vendedor_main_content">
          <div class="aprovar_vendedor_quadrado_container">
            <div class="aprovar_vendedor_pesquisar_pedidos">
              <div class="aprovar_vendedor_subtitulo_generico">
                <div class="aprovar_vendedor_linha_vertical"></div>
                <div class="aprovar_vendedor_subtitle_holder">
                  <img class="base_icon" src="../../image/geral/icons/lista_lupa_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Pesquisar Requisições</p>
                </div>
              </div>
              <form action="" method="post" class="aprovar_vendedor_forms_pesquisa_pedidos">
                <div class="aprovar_vendedor_form_cliente">
                  <label class="font_subtitulo font_celadon">Código De Requisição / Nome Cliente</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="aprovar_vendedor_inputs_esquerda">
                  <div class="aprovar_vendedor_input_status">
                    <label for="select_cod" class="font_subtitulo font_celadon">Status</label>
                    <select name="select_cod" class="aprovar_vendedor_select_status base_input">
                      <option value="Entregue">Aprovado</option>
                      <option value="Em transporte">Pendente</option>
                    </select>
                  </div>
                  <div class="aprovar_vendedor_input_mes">
                    <label for="mes" class="font_subtitulo font_celadon">Mês</label>
                    <select name="mes" id="mes" class="aprovar_vendedor_mes_select base_input">
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
                  <div class="aprovar_vendedor_input_ano">
                    <label for="ano" class="font_subtitulo font_celadon">Ano</label>
                    <select name="ano" id="ano" class="aprovar_vendedor_ano_select base_input">
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
                <div class="aprovar_vendedor_holder_botao">
                  <button type="reset" class="base_botao btn_red">
                    <img src="../../image/geral/botoes/x_branco_icon.svg">
                    CANCELAR
                  </button>

                  <button type="submit" class="base_botao btn_blue">
                    <img src="../../image/geral/botoes/v_branco_icon.svg">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            <div class="aprovar_vendedor_estatisticas">
              <div class="aprovar_vendedor_subtitulo_generico">
                <div class="aprovar_vendedor_linha_vertical"></div>
                <div class="aprovar_vendedor_subtitle_holder">
                  <img class="base_icon" src="../../image/geral/icons/grafico_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Estatísticas de Aprovação</h2>
                </div>
              </div>

              <div class="aprovar_vendedor_estatistica_holder">
                <div class="aprovar_vendedor_card">
                  <div class="aprovar_vendedor_titulo">Requisições Aprovadas / Mês</div>
                  <div class="aprovar_vendedor_estatistica_descricao">25</div>
                </div>
                
                <div class="aprovar_vendedor_card">
                  <div class="aprovar_vendedor_titulo">Pedidos Reprovados</div>
                  <div class="aprovar_vendedor_estatistica_descricao">3</div>
                </div>
                
               <div class="aprovar_vendedor_card">
                  <div class="aprovar_vendedor_titulo">Pedidos Inativados</div>
                  <div class="aprovar_vendedor_estatistica_descricao">1</div>
                </div>
                
                <div class="aprovar_vendedor_card">
                  <div class="aprovar_vendedor_titulo">Pedidos Pendentes de Aprovação</div>
                  <div class="aprovar_vendedor_estatistica_descricao">5</div>
                </div>
                
                <div class="aprovar_vendedor_card">
                  <div class="aprovar_vendedor_titulo">Pedidos / Doc. Pendente</div>
                  <div class="aprovar_vendedor_estatistica_descricao">2</div>
                </div>
                
                <div class="aprovar_vendedor_card">
                  <div class="aprovar_vendedor_titulo">Vendedores Inativados</div>
                  <div class="aprovar_vendedor_estatistica_descricao">4</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="aprovar_vendedor_header_title">
      <img class="base_icon" src="../../image/geral/icons/pasta_clock_icon.svg"/>
      <h1 class="aprovar_vendedor_text_header font_titulo">HISTÓRICO DE PEDIDOS</h1>
    </div>
    <div class="aprovar_vendedor_table">
      <div class="aprovar_vendedor_table_filtro bg_carolina">
        <p class="aprovar_vendedor_filtro_titulo font_subtitulo">Organizar por:</p>
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
              <th>Pedido</th>
              <th>Requisitos</th>
              <th>Declaração</th>
              <th>Gerenciar</th>
              <th>Status</th>
            </tr>
            <tbody>
              <tr>
                <td># 1001</td>
                <td>Thunder Games</td>
                <td>Completo</td>
                <td>Entregue</td>
                <td>
                  <button class="aprovar_vendedor_btn_inativar">
                    INATIVAR
                  </button>
                </td>
                <td>Aprovado</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>GameFlix </td>
                <td>Completo</td>
                <td>Entregue</td>
                <td>
                  <button class="aprovar_vendedor_btn_inativar">
                    INATIVAR
                  </button>
                </td>
                <td>Aprovado</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Raio Games </td>
                <td>Completo</td>
                <td>Entregue</td>
                <td class="aprovar_vendedor_coluna_botoes">
                  <button class="aprovar_vendedor_btn_aprovar">
                    APROVAR
                  </button>
                  <button class="aprovar_vendedor_btn_recusar">
                    RECUSAR
                  </button>
                </td>
                <td>Pendente</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Piratex </td>
                <td>Completo</td>
                <td>Entregue</td>
                <td class="aprovar_vendedor_coluna_botoes">
                <button class="aprovar_vendedor_btn_aprovar">
                    APROVAR
                  </button>
                  <button class="aprovar_vendedor_btn_recusar">
                    RECUSAR
                  </button>
                </td>
                <td>Pendente</td>
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </main>
</body>

</html>