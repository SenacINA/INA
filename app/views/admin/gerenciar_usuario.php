<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Gerenciar Usuários - E ao Quadrado";
  $css = ["/css/admin/gerenciar_usuario.css"];
  require_once('./utils/head.php');
?>
<body>
  <!-- Até 768px -->

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="gerenciar_usuario_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="gerenciar_usuario_header_holder">
        <div class="gerenciar_usuario_text_titulo">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_lupa_icon.svg" alt="">
          <h1 class="gerenciar_usuario_header_holder font_titulo">GERENCIAR USUÁRIOS</h1>
        </div>
        <hr class="gerenciar_usuario_linha_sublinhado">
      </div>
      
      <div class="gerenciar_usuario_body_holder">
        <div class="gerenciar_usuario_main_content">
          <div class="gerenciar_usuario_quadrado_container">
            <div class="gerenciar_usuario_pesquisar_usuario">
              <div class="gerenciar_usuario_subtitulo_generico">
                <div class="gerenciar_usuario_linha_vertical"></div>
                <div class="gerenciar_usuario_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_lupa_icon.svg" alt="">
                  <h2 class="font_subtitulo font_celadon">Pesquisar Usuários</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_usuario_forms_pesquisa_usuario">
                <div class="gerenciar_usuario_form_cliente">
                  <label class="font_subtitulo font_celadon">Código Do Usuário / Nome Usuário</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="gerenciar_usuario_inputs_esquerda">
                  <div class="gerenciar_usuario_input_status base_input_select">
                    <label for="select_cod" class="font_subtitulo font_celadon">Status</label>
                    <select name="select_cod" class="gerenciar_usuario_select_status base_input">
                      <option value="Ativo">Ativo</option>
                      <option value="Inativo">Inativo</option>
                    </select>
                  </div>
                  <div class="gerenciar_usuario_input_mes base_input_select">
                    <label for="mes" class="font_subtitulo font_celadon">Mês</label>
                    <select name="mes" id="mes" class="gerenciar_usuario_mes_select base_input">
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
                  <div class="gerenciar_usuario_input_ano base_input_select">
                    <label for="ano" class="font_subtitulo font_celadon">Ano</label>
                    <select name="ano" id="ano" class="gerenciar_usuario_ano_select base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value=" 2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                    </select>
                  </div>
                </div>
                <div class="gerenciar_usuario_holder_botao">
                  <button type="reset" class="base_botao btn_red">
                    <img src="<?=$PATH_PUBLIC?>/image\geral\botoes\x_branco_icon.svg">
                    CANCELAR
                  </button>

                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?=$PATH_PUBLIC?>/image\geral\botoes\v_branco_icon.svg">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            <div class="gerenciar_usuario_estatisticas">
              <div class="gerenciar_usuario_subtitulo_generico">
                <div class="gerenciar_usuario_linha_vertical"></div>
                <div class="gerenciar_usuario_subtitle_holder">
                  <img class="gerenciar_usuario_img_user" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Perfil de Usuário</p>
                </div>
              </div>
              <div class="gerenciar_usuario_estatistica_holder">
                <div class="gerenciar_usuario_card">
                  <span class="gerenciar_usuario_titulo2">Luis Fernando</span>
                  <img src="<?=$PATH_PUBLIC?>/image/admin/perfil_admin/perfil_img.svg" alt="" class="gerenciar_usuario_card_img_perfil">

                  <button type="reset" class="base_botao btn_red">
                    <img src="<?=$PATH_PUBLIC?>/image\geral\botoes\x_branco_icon.svg">
                    DESATIVAR
                  </button>
                </div>

                <div class="gerenciar_usuario_card_column_2">
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">Data de Cadastro</span>
                    <span class="gerenciar_usuario_estatistica_descricao">23/06/2024</span>
                  </div>
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">E-Mail</span>
                    <span class="gerenciar_usuario_estatistica_descricao">Admin01@gmail.com</span>
                  </div>
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">Cargo</span>
                    <span class="gerenciar_usuario_estatistica_descricao">Admin</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_usuario_header_title">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/pasta_clock_icon.svg"/>
      <h1 class="gerenciar_usuario_text_header font_titulo">HISTÓRICO DE PEDIDOS</h1>
    </div>
    <div class="gerenciar_usuario_table">
      <div class="gerenciar_usuario_table_filtro bg_carolina">
        <p class="gerenciar_usuario_filtro_titulo font_subtitulo">Organizar por:</p>
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
            <col class="gerenciar_usuario_table_col-1">
            <col class="gerenciar_usuario_table_col-2">
            <col class="gerenciar_usuario_table_col-3">
            <col class="gerenciar_usuario_table_col-4">
            <col class="gerenciar_usuario_table_col-5">
            <col class="gerenciar_usuario_table_col-6">
            <col class="gerenciar_usuario_table_col-7">
          </colgroup>
          <thead>
            <tr>
              <th>Cód.</th>
              <th>Nome</th>
              <th>Data de Cadastro</th>
              <th>Cargo</th>
              <th>E-Mail</th>
              <th>Contato</th>
              <th>Status</th>
            </tr>
            <tbody>
              <tr>
                <td># 1001</td>
                <td>
                  <span>
                   Luís Fernando
                  </span>
                </td>
                <td>23/06/2024</td>
                <td>Admin</td>
                <td>
                  <span>
                    Admin01@gmail.com
                  </span>
                </td>
                <td>+55 67 99999-6666</td>
                <td>
                  <span>
                    Ativo
                  </span>
                </td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Elias </td>
                <td>23/06/2024</td>
                <td>Admin</td>
                <td>Admin02@gmail.com</td>
                <td>+55 67 99999-7777</td>
                <td>Ativo</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Luís Felipe Gomes Cunha</td>
                <td>23/06/2024</td>
                <td>Admin</td>
                <td>admin03@gmail.com</td>
                <td>+55 67 99999-7777</td>
                <td>Ativo</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Enzo </td>
                <td>23/06/2024</td>
                <td>Vendedor</td>
                <td>vendedor@gmail.com</td>
                <td>+55 67 99999-6666</td>
                <td>Ativo</td>
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </main>
</body>
</html>