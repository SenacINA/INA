<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Gerenciar Carrossel- E ao Quadrado";
  $css = ["/css/admin/gerenciar_carrossel.css"];
  require_once('../../../utils/head.php');
?>
  <!-- Até 768px -->
  <!-- Caminho de Icon Correto -->
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="gerenciar_carrossel_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="gerenciar_carrossel_header_holder">
        <div class="gerenciar_carrossel_header_title_1">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/carrossel_icon.svg"/>
          <h1 class="gerenciar_carrossel_text_header">GERENCIAR CARROSSEL</h1>
        </div>
        <div class="gerenciar_carrossel_linha_sublinhado"></div>
      </div>
      <div class="gerenciar_carrossel_body_holder">
        <div class="gerenciar_carrossel_main_content">
          <div class="gerenciar_carrossel_quadrado_container">
            <div class="gerenciar_carrossel_pesquisar_pedidos">
              <div class="gerenciar_carrossel_subtitulo_generico">
                <div class="gerenciar_carrossel_linha_vertical"></div>
                <div class="gerenciar_carrossel_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Pesquisar</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_carrossel_forms_pesquisa_pedidos">
                <div class="gerenciar_carrossel_form_cliente">
                  <h2>Digite o ID e o E-mail do usuário para encontrá-lo.</h2>
                  <label class="font_subtitulo font_celadon">ID do Usuário</label>
                  <input type="text" spellcheck="false" class="base_input" >
                </div>
                <div class="gerenciar_carrossel_inputs_esquerda">
                  <div class="gerenciar_carrossel_input_status">
                    <label for="select_cod" class="font_subtitulo font_celadon">Email</label>
                    <input class="gerenciar_carrossel_select_status base_input" type="text">
                  </div>
                </div>
             
              </form>
            </div>
            <div class="gerenciar_carrossel_estatisticas">
              <div class="gerenciar_carrossel_subtitulo_generico">
                <div class="gerenciar_carrossel_linha_vertical"></div>
                <div class="gerenciar_carrossel_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Informações Do usuário</p>
                </div>
              </div>
                <div class="gerenciar_carrossel_perfil">
                  <img src="<?=$PATH_PUBLIC?>/image/admin/gerenciar_carrossel/perfil_img.svg">
                </div>
                <form action="" method="post" class="gerenciar_carrossel_forms_pesquisa_pedidos">
                  <div class="gerenciar_carrossel_form_cliente">
                    <label class="font_subtitulo font_celadon">Nome</label>
                    <input type="text" class="base_input">
                  </div>
                  <div class="gerenciar_carrossel_input_status base_input_select">
                    <label for="select_cod" class="font_subtitulo font_celadon">Plano</label>
                    <select name="select_cod" class="gerenciar_carrossel_select_status base_input">
                      <option value="Semanal">Semanal</option>
                      <option value="Mensal">Mensal</option>
                      <option value="Bimestral">Bimestral</option>

                    </select>
                  </div>
                  <div class="gerenciar_carrossel_flex">                  
                    <div class="gerenciar_carrossel_input_mes">
                      <label class="font_subtitulo font_celadon">Data de Início</label>
                      <input type="date" class="gerenciar_carrossel_mes_select base_input">
                    </div>
                    <div class="gerenciar_carrossel_input_ano">
                      <label class="font_subtitulo font_celadon">Data de Expiração</label>
                      <input type="date" class="gerenciar_carrossel_ano_select base_input">
                    </div>
                  </div>
                </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_carrossel_header_title_2">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/anuncio_icon.svg"/>
      <h1 class="gerenciar_carrossel_text_header font_titulo">Gerenciar Anúncios</h1>
    </div>
    <div class="gerenciar_carrossel_table">
      <div class="gerenciar_carrossel_table_filtro bg_carolina">
        <p class="gerenciar_carrossel_filtro_titulo font_subtitulo">Organizar por:</p>
        <select>
          <option value="" selected disable style="display: none;"></option>
          <option value="">IP</option>
          <option value="">Nome</option>
          <option value="">Categoria</option>
          <option value="">Cargo</option>
          <option value="">Data de Início</option>
          <option value="">Data de Expiração</option>
          <option value="">Plano</option>
        </select>
      </div>
      <div class="base_tabela">
        <table>
          <colgroup>
            <col class="gerenciar_carrossel_table_col-1">
            <col class="gerenciar_carrossel_table_col-2">
            <col class="gerenciar_carrossel_table_col-3">
            <col class="gerenciar_carrossel_table_col-4">
            <col class="gerenciar_carrossel_table_col-5">
            <col class="gerenciar_carrossel_table_col-6">
            <col class="gerenciar_carrossel_table_col-7">
          </colgroup>
          <thead>
            <tr>
              <th>IP</th>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Cargo</th>
              <th>Data de Início</th>
              <th>Data de Expiração</th>
              <th>Plano</th>
            </tr>
            <tbody>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia</td>
                <td>Hardware</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Mensal</td>
              </tr>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia </td>
                <td>Periféricos</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Bimestral</td>
              </tr>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia</td>
                <td>Periféricos</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Semanal</td>
              </tr>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia</td>
                <td>Celulares</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Semanal</td>
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </main>
</body>
</html>