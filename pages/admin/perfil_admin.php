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
  <nav class="navbar_principal"></nav>
  <main class="quadrado">
    <div class="main_text">
      <h1 class="title">SEU PERFIL</h1>
      <hr>
    </div>
    <div class="perfil_admin">
      <div class="text_perfil">
        <hr class="vertical">
        <h1 class="perfil_text">PERFIL ADMIN</h1>
      </div>
      <form action="" method="post" class="forms_admin">
        <label>Nome</label>
        <input type="text">
        <label>CPF</label>
        <input type="text">
        <label>Telefone Celular</label>
        <input type="text">
        <label>E-mail</label>
        <input type="text">
      </form>
      <div class="foto">
        <img src="../../image/admin/perfil/perfil_admin.png" alt="" class="pfp">
        <form action="" method="post" class="forms_pfp">
          <input type="file" name="pfp" id="foto_admin">
          <p class="tamanho_arquivo">O tamanho do arquivo não deve ultrapassar 2MB</p>
        </form>
      </div>
    </div>
    <div class="permissoes">
      <div class="text_permissoes">
        <hr class="vertical">
        <h1 class="perfil_text">PERMISSÕES</h1>
      </div>
    </div>
  </main>
</body>
</html>