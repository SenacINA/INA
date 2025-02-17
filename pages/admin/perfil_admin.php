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
    <!-- Falta Nav-bar -->
    <nav class="perfil_admin_nav_bar"></nav>  

    <div class="perfil_admin_body">
      <div class="perfil_admin_header">
        <div class="perfil_admin_text_header">
          <img src="../../image/admin/perfil_admin/perfil_icon.svg" alt="">
          <h1>PERFIL ADMIN</h1>
        </div>
        
        <hr class="perfil_admin_linha_header">
      </div>

      <div class="perfil_admin_grid_conteudo">
        <div class="perfil_admin_text_1">
          <hr class="perfil_admin_vertical">
          <img src="../../image/admin/perfil_admin/texto_icon.svg" alt="">
          <h1 class="perfil_admin_text">Seu Perfil</h1>
        </div>
        <div class="perfil_admin_text_2">
          <hr class="perfil_admin_vertical">
          <img src="../../image/admin/perfil_admin/engrenagem_icon.svg" alt="">
          <h1 class="perfil_admin_text">Permissões</h1>
        </div>
        
        <div class="perfil_admin_foto">
          <img src="../../image/admin/perfil_admin/perfil_admin.svg" alt="" id="img_admin_perfil">

          <form action="" method="post" class="perfil_admin_foto_pfp">
            <label for="perfil_admin_foto" class="perfil_admin_foto_label">
              <img src="../../image/admin/perfil_admin/enviar_arquivo.png" alt="Enviar Arquivo" class="perfil_admin_foto">
            </label>
            <input type="file" name="pfp" id="perfil_admin_foto">
          </form>
        </div>

        <form action="" method="post" class="perfil_admin_forms">
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_1" >
            <label>Nome</label>
            <input type="text" placeholder="Digite seu nome">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_2">
            <label>E-mail</label>
            <input type="text" placeholder="exemplo@email.com">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_3">
            <label>CPF</label>
            <input type="text" placeholder="000.000.000-00">
          </div>
          <div class="perfil_admin_forms_item" id="perfil_admin_forms_item_4">
            <label>Telefone</label>
            <input type="text" placeholder="+00 (00) 00000-0000">
          </div>
        </form>

        <form action="" method="post" class="perfil_admin_forms_permissoes">
          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle-container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_gerenciar_carrossel">
                <span class="toggle-slider"></span>
              </label>
            </div>
            <div class="label-container">
              <label for="perfil_admin_gerenciar_carrossel">Gerenciar carrossel</label>
            </div>
          </div>

          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle-container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_gerenciar_usuarios">
                <span class="toggle-slider"></span>
              </label>
            </div>
            <div class="label-container">
              <label for="perfil_admin_gerenciar_usuarios">Gerenciar usuários</label>
            </div>
          </div>

          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle-container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_gerenciar_produtos">
                <span class="toggle-slider"></span>
              </label>
            </div>
            <div class="label-container">
              <label for="perfil_admin_gerenciar_produtos">Gerenciar produtos</label>
            </div>
          </div>

          <div class="perfil_admin_forms_item_permissoes">
            <div class="toggle-container">
              <label class="toggle">
                <input type="checkbox" id="perfil_admin_historico_acessos">
                <span class="toggle-slider"></span>
              </label>
            </div>
            <div class="label-container">
              <label for="perfil_admin_historico_acessos">Acessar histórico de acessos</label>
            </div>
          </div>
        </form>


        
        <div class="perfil_admin_botao_salvar">
          <button class="perfil_admin_salvar">
            <img src="../../image/admin/perfil_admin/positivo_botao_salvar.svg" alt="">
            <label>SALVAR</label>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Falta footer -->
    <footer class="footer_temporario_perfil_admin">
      <img src="../../image/admin/perfil_admin/footer_mobile.svg" alt="">
    </footer>
  </main>
</body>
</html>
