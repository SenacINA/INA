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
</head>
<body>
  <main>
    <nav class="perfil_admin_nav_bar"></nav>

    <div class="perfil_admin_body">
      <div class="perfil_admin_header">
        <h1 class="perfil_admin_text_header">SEU PERFIL</h1>
        <hr class="perfil_admin_linha_header">
      </div>

      <div class="perfil_admin_grid_conteudo">
        <div class="perfil_admin_text_1">
          <hr class="perfil_admin_vertical">
          <h1 class="perfil_admin_text">PERFIL ADMIN</h1>
        </div>
        <div class="perfil_admin_text_2">
          <hr class="perfil_admin_vertical">
          <h1 class="perfil_admin_text">PERMISSÕES</h1>
        </div>
        
        <div class="perfil_admin_foto">
          <img src="../../image/admin/perfil_admin/perfil_admin.svg" alt="">

          <form action="" method="post" class="perfil_admin_foto_pfp">
            <label for="perfil_admin_foto" class="perfil_admin_foto_label">
              <img src="../../image/admin/perfil_admin/enviar_arquivo.png" alt="Enviar Arquivo" class="perfil_admin_foto">
            </label>
            <input type="file" name="pfp" id="perfil_admin_foto">
            <p class="perfil_admin_foto_tamanho_arquivo">O tamanho do arquivo não deve ultrapassar 2MB</p>
            
            <p class="perfil_admin_foto_link">Adicionar link URL</p>
            <input type="url" name="url" id="perfil_admin_foto_url">
          </form>
        </div>

        <form action="" method="post" class="perfil_admin_forms">
          <label class="perfil_admin_label">Nome</label>
          <input type="text" class="perfil_admin_input">
          <label class="perfil_admin_label">CPF</label>
          <input type="text" class="perfil_admin_input">
          <label class="perfil_admin_label">Telefone Celular</label>
          <input type="text" class="perfil_admin_input">
          <label class="perfil_admin_label">E-mail</label>
          <input type="text" class="perfil_admin_input">
          <p class="perfil_admin_redefinir_senha">Redefinir senha</p>
        </form>
          
        <form action="" method="post" class="perfil_admin_forms_permissoes">
          <div class="perfil_admin_forms_item_permissoes">
            <input type="checkbox" id="perfil_admin_gerenciar_carrossel">
            <label for="perfil_admin_gerenciar_carrossel">Gerenciar carrossel</label>
          </div>
          <div class="perfil_admin_forms_item_permissoes">
            <input type="checkbox" id="perfil_admin_gerenciar_usuarios">
            <label for="perfil_admin_gerenciar_usuarios">Gerenciar usuários</label>
          </div>
          <div class="perfil_admin_forms_item_permissoes">
            <input type="checkbox" id="perfil_admin_gerenciar_produtos">
            <label for="perfil_admin_gerenciar_produtos">Gerenciar produtos</label>
          </div>
          <div class="perfil_admin_forms_item_permissoes">
            <input type="checkbox" id="perfil_admin_historico_acessos">
            <label for="perfil_admin_historico_acessos">Acessar histórico de acessos</label>
          </div>
        </form>
        
        <div class="perfil_admin_botao_cancelar">
          <button class="perfil_admin_cancelar" onclick="window.location.href='#'"> <!-- local de redirecionamento -->
            <img src="../../image/admin/perfil_admin/botao_salvar_187x50.svg" alt="">
          </button>
        </div>
      </div>
    </div>

  </main>
</body>
</html>
