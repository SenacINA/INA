<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/admin/perfil_admin.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="perfil_admin_body">
      <div class="perfil_admin_titulo">
        <div class="perfil_admin_text_titulo">
          <img class="base_icon" src="../../image/geral/icons/perfil_icon.svg" alt="">
          <h1>PERFIL ADMIN</h1>
        </div>
        
        <hr class="perfil_admin_linha_titulo">
      </div>

      <div class="perfil_admin_grid_conteudo">
        <div class="perfil_admin_text_1">
          <hr class="perfil_admin_vertical">
          <img class="base_icon" src="../../image/geral/icons/lista_icon.svg" alt="">
          <h1 class="perfil_admin_text">Seu Perfil</h1>
        </div>
        <div class="perfil_admin_text_2">
          <hr class="perfil_admin_vertical">
          <img class="base_icon" src="../../image/geral/icons/engrenagem_icon.svg" alt="">
          <h1 class="perfil_admin_text">Permissões</h1>
        </div>
        
        <div class="perfil_admin_foto">
          <label for="perfil_admin_foto">
            <img  src="../../image/admin/perfil_admin/perfil_img.svg" alt="" id="img_admin_perfil">
          </label>

          <form action="" method="post" class="perfil_admin_foto_pfp">
            <label for="perfil_admin_foto" class="perfil_admin_foto_label">
              <img class="base_icon" src="../../image/admin/perfil_admin/enviar_arquivo.svg" alt="Enviar Arquivo" class="perfil_admin_foto">
            </label>
            <input type="file" name="pfp" id="perfil_admin_foto" class="base_input" style="display: none;">
          </form>
        </div>

        <form action="" method="post" class="perfil_admin_forms">
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_1">
            <label>Nome</label>
            <input type="text" class="base_input">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_2">
            <label>E-mail</label>
            <input type="text" class="base_input">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_3">
            <label>CPF</label>
            <input type="text" class="base_input">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_4">
            <label>Telefone</label>
            <input type="text" class="base_input">
          </div>
        </form>

        <form action="" method="post" class="perfil_admin_forms_permissoes">
          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle_container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_gerenciar_carrossel" class="base_input">
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
                <input type="checkbox" id="perfil_admin_gerenciar_usuarios" class="base_input">
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
                <input type="checkbox" id="perfil_admin_gerenciar_produtos" class="base_input">
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
                <input type="checkbox" id="perfil_admin_historico_acessos" class="base_input">
                <span class="toggle_slider"></span>
              </label>
            </div>
            <div class="label_container">
              <label for="perfil_admin_historico_acessos">Acessar histórico de acessos</label>
            </div>
          </div>
        </form>
        
      </div>

        <div class="perfil_admin_botao_salvar">
          <button class="perfil_admin_salvar" onclick="pag('admin/dashboard')">
            <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">
            <label>SALVAR</label>
          </button>
        </div>
      </div>

    </div>
    
    <!-- Falta footer -->
  </main>
</body>
</html>
