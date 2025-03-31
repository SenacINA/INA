<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
      <div class="dashboard_body">
        <div class="dashboard_titulo">
          <div class="dashboard_text_titulo">
            <img src="../../image/admin/dashboard/gestao.svg" alt="">
            <h1>DASHBOARD</h1>
          </div>
          <hr class="dashboard_linha_titulo">
        </div>
        <div class="dashboard_body_container_botoes_linha">

        <a href="./perfil_admin.php">
          <div class="dashboard_body_container_botoes_base_linha">
            <div class="dashboard_body_container_botoes_base_linha_div">
              <img src="../../image/admin/dashboard/linha.svg" alt="">
              <img src="../../image/admin/dashboard/seu_perfil.svg" alt="">
              <h2>Seu Perfil</h2>
            </div>
            <img src="../../image/admin/dashboard/seta.svg" alt="">
          </div>
        </a>

        <a href="./relatorio_vendedor.php">
          <div class="dashboard_body_container_botoes_base_linha">
            <div class="dashboard_body_container_botoes_base_linha_div">
              <img src="../../image/admin/dashboard/linha.svg" alt="">
              <img src="../../image/admin/dashboard/relatorio_vendas.svg" alt="">
              <h2>Relatório de Vendas</h2>
            </div>
            <img src="../../image/admin/dashboard/seta.svg" alt="">
          </div>
        </a>

        <a href="./gerenciar_usuario.php">
          <div class="dashboard_body_container_botoes_base_linha">
            <div class="dashboard_body_container_botoes_base_linha_div">
              <img src="../../image/admin/dashboard/linha.svg" alt="">
              <img src="../../image/admin/dashboard/gerenciar_user.svg" alt="">
              <h2>Gerenciar Usuário</h2>
            </div>
            <img src="../../image/admin/dashboard/seta.svg" alt="">
          </div>
        </a>

        </div>
        <div class="dashboard_body_container_botoes">

        <!-- linha 1 -->
          <a href="./gerenciar_produtos.php">
            <div class="dashboard_body_container_botoes_base">
              <img src="../../image/admin/dashboard/gerenciar_produtos.svg" alt="">
              <h2>Gerenciar Produtos</h2>
              <img src="../../image/admin/dashboard/seta_baixo.svg" alt="">
            </div>
          </a>

          <!-- <a href="./admin_cupom.php">
            <div class="dashboard_body_container_botoes_base">
              <img src="../../image/admin/dashboard/gerenciar_cupom.svg" alt="">
              <h2>Gerenciar Cupom</h2>
              <img src="../../image/admin/dashboard/seta_baixo.svg" alt="">
            </div>
          </a> -->

          <a href="./gerenciar_carrossel.php">
            <div class="dashboard_body_container_botoes_base">
              <img src="../../image/admin/dashboard/gerenciar_carrossel.svg" alt="">
              <h2>Gerenciar Carrossel</h2>
              <img src="../../image/admin/dashboard/seta_baixo.svg" alt="">
            </div>
          </a>

        <!-- linha 2 -->

          <a href="../geral/redefinir_senha_1.php">
            <div class="dashboard_body_container_botoes_base">
              <img src="../../image/admin/dashboard/redefinir_senha.svg" alt="">
              <h2>Redefinir Senha</h2>
              <img src="../../image/admin/dashboard/seta_baixo.svg" alt="">
            </div>
          </a>

          <a href="./aprovar_vendedor.php">
            <div class="dashboard_body_container_botoes_base">
              <img src="../../image/admin/dashboard/aprovar_vendedor.svg" alt="">
              <h2>Aprovar Vendedor</h2>
              <img src="../../image/admin/dashboard/seta_baixo.svg" alt="">
            </div>
          </a>

          <a href="../../index.php">
            <div class="dashboard_body_container_botoes_base">
              <img src="../../image/admin/dashboard/logout.svg" alt="">
              <h2 class="classe_vermelho">Logout</h2>
              <img src="../../image/admin/dashboard/seta_baixo2.svg" alt="">
            </div>
          </a>
        </div>
      </div>
  </main>
</body>
</html>