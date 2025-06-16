<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Gerenciar Usuários - E ao Quadrado";
$css = ["/css/admin/GerenciarUsuario.css"];
require_once('./utils/head.php');

if (!$usuarioSelecionado) {
  $estaAtivo = false;
  $textoBotao = 'DESATIVAR';
} else {
  $estaAtivo = $usuarioSelecionado['status_conta_cliente'] == 1;
  $textoBotao = $estaAtivo ? 'DESATIVAR' : 'USUÁRIO JÁ DESATIVADO';
}

$disativar = $estaAtivo ? '' : 'disabled';

?>
<script src="<?= $PATH_PUBLIC ?>/js/admin/GerenciarUsuario.js"></script>
<script src="../../../public/js/admin/GerenciarUsuario.js"></script>
  
<body>
  <!-- Até 768px -->

  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main class="gerenciar_usuario_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="gerenciar_usuario_header_holder">
        <div class="gerenciar_usuario_text_titulo">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/lista_lupa_icon.svg" alt="">
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
                  <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_lupa_icon.svg" alt="">
                  <h2 class="font_subtitulo font_celadon">Pesquisar Usuários</p>
                </div>
              </div>
              <form action="searchDesativarUser" method="post" class="gerenciar_usuario_forms_pesquisa_usuario">
                <div class="gerenciar_usuario_form_cliente">
                  <label class="font_subtitulo font_celadon">Código Do Usuário / Nome Usuário</label>
                  <input type="text" spellcheck="false" class="base_input" name="nomeUsuario">
                </div>
                <div class="gerenciar_usuario_inputs_esquerda">
                  <div class="gerenciar_usuario_input_status base_input_select">
                    <label for="select_cod" class="font_subtitulo font_celadon">Status</label>
                    <select name="select_cod" class="gerenciar_usuario_select_status base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value="1">Ativo</option>
                      <option value="0">Inativo</option>
                    </select>
                  </div>
                  <div class="gerenciar_usuario_input_mes base_input_select">
                    <label for="mes" class="font_subtitulo font_celadon">Mês</label>
                    <select name="mes" id="mes" class="gerenciar_usuario_mes_select base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value="01">Janeiro</option>
                      <option value="02">Fevereiro</option>
                      <option value="03">Março</option>
                      <option value="04">Abril</option>
                      <option value="05">Maio</option>
                      <option value="06">Junho</option>
                      <option value="07">Julho</option>
                      <option value="08">Agosto</option>
                      <option value="09">Setembro</option>
                      <option value="10">Outubro</option>
                      <option value="11">Novembro</option>
                      <option value="12">Dezembro</option>
                    </select>
                  </div>
                  <div class="gerenciar_usuario_input_ano base_input_select">
                    <label for="ano" class="font_subtitulo font_celadon">Ano</label>
                    <select name="ano" id="ano" class="gerenciar_usuario_ano_select base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value="2020">2020</option>
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
                    <img src="<?= $PATH_PUBLIC ?>/image\geral\botoes\x_branco_icon.svg">
                    CANCELAR
                  </button>

                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?= $PATH_PUBLIC ?>/image\geral\botoes\v_branco_icon.svg">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            <div class="gerenciar_usuario_estatisticas">
              <div class="gerenciar_usuario_subtitulo_generico">
                <div class="gerenciar_usuario_linha_vertical"></div>
                <div class="gerenciar_usuario_subtitle_holder">
                  <img class="gerenciar_usuario_img_user" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Perfil de Usuário</h2>
                </div>
              </div>
              <div class="gerenciar_usuario_estatistica_holder">
                <div class="gerenciar_usuario_card">
                  <span class="gerenciar_usuario_titulo2" id="nome_cliente">
                    <?= $usuarioSelecionado ? htmlspecialchars($usuarioSelecionado['nome_cliente']) : '-' ?>
                  </span>
                  <img src="<?= $PATH_PUBLIC ?>/image/admin/perfil_admin/perfil_img.svg" alt="" class="gerenciar_usuario_card_img_perfil">

                  <button id="disable_button" class="base_botao btn_red" <?= $disativar ?>>
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/x_branco_icon.svg">
                    <?=
                    $textoBotao
                    ?>
                  </button> 
                <div class="modal_desativar" id="modal_desativar">
                    <div class="modal_content">
                      <button class="modal_fechar" id="modal_fechar">X</button>
                      <h1>Confirmação</h1>
                      <p>Você deseja desativar este Usuario?</p>
                      <button class="modal_confirmar" id="modal_confirmar">CONFIRMAR</button>
                    </div>
                </div>
                </div>

                <div class="gerenciar_usuario_card_column_2">
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">Data de Cadastro</span>
                    <span class="gerenciar_usuario_estatistica_descricao">
                      <?= $usuarioSelecionado ? htmlspecialchars($usuarioSelecionado['data_registro_cliente']) : '-' ?>
                    </span>
                  </div>
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">E-Mail</span>
                    <span class="gerenciar_usuario_estatistica_descricao" id="email_cliente">
                      <?= $usuarioSelecionado ? htmlspecialchars($usuarioSelecionado['email_cliente']) : '-' ?>
                    </span>
                  </div>
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">Cargo</span>
                    <span class="gerenciar_usuario_estatistica_descricao" id="cargo_cliente">
                      <?php
                      if ($usuarioSelecionado) {
                        echo ($usuarioSelecionado['tipo_conta_cliente'] == 0) ? 'Admin' : (($usuarioSelecionado['tipo_conta_cliente'] == 1) ? 'Vendedor' : 'Cliente');
                      } else {
                        echo '-';
                      }
                      ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_usuario_header_title">
      <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/pasta_clock_icon.svg" />
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
            <?php
            $controller = new AdminController();
            $info = $controller->showUsers();
            foreach ($info as $chave) {
              if ($chave['id_cliente'] != $_SESSION['cliente_id']) {
                $tipoConta = ($chave['tipo_conta_cliente'] == 0) ? 'Admin' : (($chave['tipo_conta_cliente'] == 1) ? 'Vendedor' : 'Cliente');
                $statusConta = ($chave['status_conta_cliente'] == 0) ? 'Inativo' : 'Ativo';
                echo <<<HTML
                      <tr>
                        <td># {$chave['id_cliente']}</td>
                        <td><span>{$chave['nome_cliente']}</span></td>
                        <td>{$chave['data_registro_cliente']}</td>
                        <td>{$tipoConta}</td>
                        <td><span>{$chave['email_cliente']}</span></td>
                        <td>({$chave['ddd_cliente']}) {$chave['numero_celular_cliente']}</td>
                        <td><span>{$statusConta}</span></td>
                      </tr>
                    HTML;
              }
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