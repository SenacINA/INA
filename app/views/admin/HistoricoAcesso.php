<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Histórico de Acesso - E ao Quadrado";
  $css = ["/css/admin/historico_acesso.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="historico_acesso_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="historico_acesso_header_holder">
        <div class="historico_acesso_header_title_1">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/tempo_icon.svg"/>
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
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/grafico_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Relátório Geral</p>
                </div>
              </div>
              <form action="HistoricoAcessoBuscar" method="post" class="historico_acesso_forms_pesquisa_pedidos">
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
                  <button type="reset" class="base_botao btn_outline_red historico_acesso_base_botao" onclick="pag('HistoricoAcesso')">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_vermelho_icon.svg" alt="">
                    Limpar
                  </button>
                  <button type="reset" class="base_botao btn_red historico_acesso_base_botao">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_branco_icon.svg" alt="">
                    CANCELAR
                  </button>
                  <button type="submit" class="base_botao btn_blue historico_acesso_base_botao">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
                    CONFIRMAR
                  </button>
 
                </div>
              </form>
            </div>
            <div class="historico_acesso_estatisticas">
              <div class="historico_acesso_subtitulo_generico">
                <div class="historico_acesso_linha_vertical"></div>
                <div class="historico_acesso_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_info_icon.svg"/>
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
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/pasta_clock_icon.svg"/>
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
              <?php

                $resultados = isset($resultados) ? $resultados : [];
                if (isset($resultados) && count($resultados) > 0) {
                  foreach ($resultados as $linha) {
                    echo "<tr>";
                    echo "<td>{$linha['ip']}</td>";
                    echo "<td>{$linha['cargo']}</td>";
                    echo "<td>" . date('d/m/Y', strtotime($linha['data'])) . "</td>";
                    echo "<td>" . substr($linha['horario'], 0, 5) . "</td>";
                    echo "<td>{$linha['navegador']}</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='5'>Nenhum registro encontrado com os filtros informados.</td></tr>";
                }
              ?>
              </tbody>
          </thead>
        </table>
      </div>
    </div>

  </main>
</body>

</html>
