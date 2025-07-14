<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Gerenciar Usuários - E ao Quadrado";
$css = ["/css/admin/GerenciarUsuario.css"];
require_once('./utils/head.php');

$usuarioSelecionado = $usuarioSelecionado ?? null;
$estaAtivo = $usuarioSelecionado && $usuarioSelecionado['status_conta_cliente'] == 1;
$textoBotao = $estaAtivo ? 'DESATIVAR' : ($usuarioSelecionado ? 'USUÁRIO JÁ DESATIVADO' : 'DESATIVAR');
$disativar = $estaAtivo ? '' : 'disabled="disabled"';
?>

<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

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
                  <h2 class="font_subtitulo font_celadon">Pesquisar Usuários</h2>
                </div>
              </div>
              <form action="GerenciarUsuarios-search" method="post" class="gerenciar_usuario_forms_pesquisa_usuario">
                <div class="gerenciar_usuario_form_cliente">
                  <label class="font_subtitulo font_celadon">Código / Nome do Usuário</label>
                  <input type="text" spellcheck="false" class="base_input" name="nomeUsuario" placeholder="ID ou Nome">
                </div>

                <div class="gerenciar_usuario_holder_botao">
                  <button type="reset" class="base_botao btn_red">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/x_branco_icon.svg">
                    CANCELAR
                  </button>
                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>

            <div class="gerenciar_usuario_estatisticas">
              <div class="gerenciar_usuario_subtitulo_generico">
                <div class="gerenciar_usuario_linha_vertical"></div>
                <img class="icon_perfil_usuario" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_icon.svg" alt="">

                <div class="gerenciar_usuario_subtitle_holder">
                  <?php
                  $imgPerfil = $usuarioSelecionado && !empty($usuarioSelecionado['imagem_cliente'])
                    ? $PATH_UPLOADS . "/usuarios/" . $usuarioSelecionado['imagem_cliente']
                    : $PATH_PUBLIC . "/image/admin/perfil_admin/perfil_img.svg";
                  ?>
                  <h2 class="font_subtitulo font_celadon">Perfil de Usuário</h2>
                </div>
              </div>
              <div class="gerenciar_usuario_estatistica_holder">
                <div class="gerenciar_usuario_card">
                  <span class="gerenciar_usuario_titulo"><?= $usuarioSelecionado ? htmlspecialchars($usuarioSelecionado['nome_cliente']) : '---' ?></span>
                  <img src="<?= $PATH_PUBLIC ?>/image/admin/perfil_admin/perfil_img.svg" alt="" class="gerenciar_usuario_card_img_perfil">
                </div>
                <div class="gerenciar_usuario_card_column_2">
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">E-Mail</span>
                    <span class="gerenciar_usuario_estatistica_descricao">
                      <?= $usuarioSelecionado ? htmlspecialchars($usuarioSelecionado['email_cliente']) : '---' ?>
                    </span>
                  </div>
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">Data de Cadastro</span>
                    <span class="gerenciar_usuario_estatistica_descricao">
                      <?= $usuarioSelecionado ? htmlspecialchars($usuarioSelecionado['data_registro_cliente']) : '---' ?>
                    </span>
                  </div>
                  <div class="gerenciar_usuario_card">
                    <span class="gerenciar_usuario_titulo">Cargo</span>
                    <span class="gerenciar_usuario_estatistica_descricao">
                      <?= $usuarioSelecionado ? htmlspecialchars($usuarioSelecionado['cargo']) : '---' ?>
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
        <p class="gerenciar_usuario_filtro_titulo font_subtitulo">Ordenar por:</p>
        <select id="filtro-gerenciar-usuarios" class="base_input">
          <option value="" selected disabled hidden>Selecione</option>
          <option value="id_cliente">ID</option>
          <option value="nome_cliente">Nome</option>
          <option value="data_registro_cliente">Data Cadastro</option>
          <option value="tipo_conta_cliente">Cargo</option>
          <option value="status_conta_cliente">Status</option>
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
              <th>Gerenciamento</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($usuarios as $chave):
              if ($chave['id_cliente'] == $_SESSION['cliente_id']) continue;
              $tipoConta = $chave['tipo_conta_cliente'] == 0 ? 'Admin' : ($chave['tipo_conta_cliente'] == 1 ? 'Vendedor' : 'Cliente');
              $statusConta = $chave['status_conta_cliente'] == 0 ? 'Inativo' : 'Ativo';
            ?>
              <tr>
                <td><?= $chave['id_cliente'] ?></td>
                <td><?= htmlspecialchars($chave['nome_cliente']) ?></td>
                <td><?= htmlspecialchars($chave['data_registro_cliente']) ?></td>
                <td><?= $tipoConta ?></td>
                <td><?= htmlspecialchars($chave['email_cliente']) ?></td>
                <td>(<?= htmlspecialchars($chave['ddd_cliente']) ?>) <?= htmlspecialchars($chave['numero_celular_cliente']) ?></td>
                <?php
                $estaAtivo = $chave['status_conta_cliente'] == 1;
                $textoBotao = $estaAtivo ? 'Desativar' : 'Ativar';
                $classeBotao = $estaAtivo ? 'btn_red' : 'btn_blue';
                ?>
                <td data-status="<?= $chave['status_conta_cliente'] ?>">
                  <button class="base_botao <?= $classeBotao ?> btn-status" data-id="<?= $chave['id_cliente'] ?>" data-ativo="<?= $chave['status_conta_cliente'] ?>">
                    <?= $textoBotao ?>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="base_navegacao">
        <div class="gerenciar_usuario_navegacao">
          <button id="btnAnterior" class="base_botao btn_blue">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro_branco.svg" class="base_icon esquerda">
          </button>
          <button id="btnProximo" class="base_botao btn_blue">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_filtro_branco.svg" class="base_icon direita">
          </button>
        </div>
      </div>
    </div>
  </main>

  <div class="popup_container" id="popup_desativar">
    <div class="popup">
      <button id="close_btn_popUp" class="modal_fechar">x</button>
      <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/check_carolina_icon.svg" width="200" height="200">
      <div class="text_popup">
        <h1>Confirmação</h1>
        <p>Você deseja desativar este Usuário?</p>
        <button class="base_botao btn_blue botao_popup" id="confirmar_desativar">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">
          CONFIRMAR
        </button>
      </div>
    </div>
  </div>
</body>

<script>
  window.vendedores = <?= json_encode($usuarios ?? []) ?>;
</script>

<script src="<?= $PATH_PUBLIC ?>/js/tabelas/renderTableGerenciarUsuario.js"></script>
<script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>

</html>