<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Perfil - E ao Quadrado";
  $css = ["/css/admin/PerfilAdmin.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main>
    <div class="perfil_admin_body">
      <div class="perfil_admin_titulo">
        <div class="perfil_admin_text_titulo">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg" alt="">
          <h1>PERFIL ADMIN</h1>
        </div>
        <hr class="perfil_admin_linha_titulo">
      </div>

      <div class="perfil_admin_grid_conteudo">
        <div class="perfil_admin_text_1">
          <hr class="perfil_admin_vertical">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_icon.svg" alt="">
          <h1 class="perfil_admin_text">Seu Perfil</h1>
        </div>

        <div class="perfil_admin_text_2">
          <hr class="perfil_admin_vertical">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/engrenagem_icon.svg" alt="">
          <h1 class="perfil_admin_text">Permissões</h1>
        </div>

        <div class="perfil_admin_foto">
          <label for="perfil_admin_foto">
            <img class="perfil_admin_pfp"
              src="<?= $PATH_PUBLIC . (!empty($user['foto_perfil']) ? $user['foto_perfil'] : '/image/admin/perfil_admin/perfil_img.svg') ?>"
              alt=""
              id="imgPreviewFoto">
          </label>

          <form action="" method="post" class="form">
            <button class="base_botao btn_blue" type="button" onclick="document.getElementById('fileInputFoto').click();">
              <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/enviar_branco_icon.svg" class="base_icon" alt="">
              <input type="file" id="fileInputFoto" name="foto" style="display: none;" accept="image/*" />
              Enviar arquivo
            </button>
          </form>
        </div>

        <form action="" method="post" class="perfil_admin_forms">
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_1">
            <label>Nome</label>
            <input type="text" class="base_input" id='nomeAdmin' value="<?=$user['nome_cliente']?>">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_2">
            <label>E-mail</label>
            <input type="text" id="emailAdmin" class="base_input" value="<?=$user['email_cliente'] ?? 'Não informado'?>">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_3">
            <label>CPF</label>
            <input type="text" class="base_input" value="<?= $user['cpf_cliente'] ?? 'Não informado'?>" readonly disabled>
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_4">
            <label>Telefone</label>
            <input id="telefoneAdmin" type="text" class="base_input" value="<?= empty($user['numero_celular_cliente']) ? 'Não informado' : '(' . $user['ddd_cliente'] . ') ' . $user['numero_celular_cliente'] ?>">
          </div>
        </form>

        <form action="" method="post" class="perfil_admin_forms_permissoes">
          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle_container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_gerenciar_carrossel" class="base_input" disabled
                  <?= $user['gerenciar_carrossel'] ? 'checked' : '' ?>>
                <span class="toggle_slider"></span>
              </label>
            </div>
            <div class="label_container">
              <label for="perfil_admin_gerenciar_carrossel">Gerenciar carrossel</label>
            </div>
          </div>

          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle_container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_gerenciar_usuarios" class="base_input" disabled
                  <?= $user['gerenciar_usuarios'] ? 'checked' : '' ?>>
                <span class="toggle_slider"></span>
              </label>
            </div>
            <div class="label_container">
              <label for="perfil_admin_gerenciar_usuarios">Gerenciar usuários</label>
            </div>
          </div>

          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle_container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_gerenciar_produtos" class="base_input" disabled
                  <?= $user['gerenciar_produtos'] ? 'checked' : '' ?>>
                <span class="toggle_slider"></span>
              </label>
            </div>
            <div class="label_container">
              <label for="perfil_admin_gerenciar_produtos">Gerenciar produtos</label>
            </div>
          </div>

          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle_container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_historico_acessos" class="base_input" disabled
                  <?= $user['acessar_historico_acesso'] ? 'checked' : '' ?>>
                <span class="toggle_slider"></span>
              </label>
            </div>
            <div class="label_container">
              <label for="perfil_admin_historico_acessos">Acessar histórico de acessos</label>
            </div>
          </div>
          <div class="perfil_admin_botao_salvar">
          <button id='salvarEdit' class="base_botao btn_blue">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
            <label>SALVAR</label>
          </button>
        </div>
        </form>

        

      </div> <!-- perfil_admin_grid_conteudo -->
    </div> <!-- perfil_admin_body -->
  </main>

  <script src="<?=$PATH_PUBLIC?>/js/cliente/PfpInput.js"></script>
  <script type="module" src="<?=$PATH_COMPONENTS?>/js/Toast.js"></script>
  <script src="<?=$PATH_PUBLIC?>/js/admin/UpdateProfile.js"></script>
</body>
</html>