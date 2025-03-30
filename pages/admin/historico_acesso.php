<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/admin/historico_acesso.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
  <?php
    include_once('../../pages/geral/navbar.php');
    ?>
  <main class="historico_acesso_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="historico_acesso_header_holder">
        <div class="historico_acesso_header_title_1">
          <img src="../../image\geral\icons\tempo_icon.svg"/>
          <h1 class="historico_acesso_text_header font_titulo">HISTÓRICO DE ACESSO</h1>
        </div>
        <div class="historico_acesso_linha_sublinhado"></div>
      </div>
      <div class="historico_acesso_body_holder">
        <div class="historico_acesso_main_content">
          <div class="historico_acesso_quadrado_container">
            <div class="historico_acesso_pesquisar_pedidos">
              <div class="historico_acesso_subtitulo_generico">
                <div class="historico_acesso_linha_vertical"></div>
                <div class="historico_acesso_subtitle_holder">
                  <img class="base_icon" src="../../image\geral\icons\grafico_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Relátório Geral</p>
                </div>
              </div>
              <form action="" method="post" class="historico_acesso_forms_pesquisa_pedidos">
                <div class="historico_acesso_form_cliente">
                  <label class="font_subtitulo font_celadon">IP Do Usuário</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="historico_acesso_inputs_esquerda">
                  <div class="historico_acesso_input_status">
                    <label for="select_cod" class="font_subtitulo font_celadon">Horário</label>
                    <input class="historico_acesso_select_status base_input" type="time">
                  </div>
                  
                  <div class="historico_acesso_input_ano">
                    <label for="ano" class="font_subtitulo font_celadon">Data</label>
                    <input class="historico_acesso_ano_select base_input" type="date">
                  </div>
                </div>
                <div class="historico_acesso_holder_botao">
                  <button type="reset" class="base_botao btn_red historico_acesso_base_botao">
                    <img src="../../image/geral/botoes/x_branco_icon.svg" alt="">
                    CANCELAR
                  </button>
                  <button type="submit" class="base_botao btn_blue historico_acesso_base_botao">
                    <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            <div class="historico_acesso_estatisticas">
              <div class="historico_acesso_subtitulo_generico">
                <div class="historico_acesso_linha_vertical"></div>
                <div class="historico_acesso_subtitle_holder">
                  <img class="base_icon" src="../../image/geral/icons/perfil_info_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Informações de Usuário</p>
                </div>
              </div>
              <form action="" method="post" class="historico_acesso_info_user">
            
                <div class="historico_acesso_info_user_item" id="historico_acesso_info_user_item_1" >
                  <label>IP</label>
                  <input type="text" class="base_input" readonly>
                </div>
  
                <div class="historico_acesso_info_user_item" id="historico_acesso_info_user_item_2">
                  <label>Cargo</label>
                  <input type="text" class="base_input" readonly>
                </div>
  
                <div class="historico_acesso_info_user_conjunto">
                  <div class="historico_acesso_info_user_item" id="historico_acesso_info_user_item_3">
                    <label>Data De Acesso</label>
                    <input type="date" class="base_input" readonly>
                  </div>
                  <div class="historico_acesso_info_user_item" id="historico_acesso_info_user_item_4">
                    <label>Horário</label>
                    <input type="time"class="base_input" readonly>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="historico_acesso_header_title_2">
      <img src="../../image/geral/icons/pasta_clock_icon.svg"/>
      <h1 class="historico_acesso_text_header font_titulo">HISTÓRICO DE ACESSO</h1>
    </div>
    <div class="historico_acesso_table">
      <div class="historico_acesso_table_filtro bg_carolina">
        <p class="historico_acesso_filtro_titulo font_subtitulo">Organizar por:</p>
        <select>
          <option value="" selected disable style="display: none;"></option>
          <option value="">IP</option>
          <option value="">Cargo</option>
          <option value="">Data De Acesso</option>
          <option value="">Navegador</option>
        </select>
      </div>
      <div class="base_tabela">
        <table>
          <colgroup>
            <col class="historico_acesso_table_col-1">
            <col class="historico_acesso_table_col-2">
            <col class="historico_acesso_table_col-3">
            <col class="historico_acesso_table_col-4">
            <col class="historico_acesso_table_col-5">
   
          </colgroup>
          <thead>
            <tr>
              <th>IP</th>
              <th>CARGO</th>
              <th>DATA DE ACESSOS</th>
              <th>HORÁRIO</th>
              <th>NAVEGADOR</th>
            </tr>
            <tbody>
              <tr>
                <td>192.168.0.1</td>
                <td>Cliente</td>
                <td>22/03/2024</td>
                <td>08:32:34</td>
                <td>...</td>
              </tr>
              <tr>
                <td>221.121.2.2</td>
                <td>Cliente</td>
                <td>01/01/2001</td>
                <td>12:34:10</td>
                <td>...</td>

              </tr>
              <tr>
                <td>112.212.0.2</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>13:40:11</td>
                <td>...</td>

              </tr>
              <tr>
                <td>112.212.0.2</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>13:49:11</td>
                <td>...</td>

              </tr>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </main>
</body>

</html>
