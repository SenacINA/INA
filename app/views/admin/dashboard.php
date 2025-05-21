<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Dashboard - E ao Quadrado";
$css = ["/css/admin/dashboard.css"];
require_once('./utils/head.php');
?>

<body>
  <!-- Até 375px -->

  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <div class="dashboard_body">
      <div class="dashboard_titulo">
        <div class="dashboard_text_titulo">
          <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/gestao.svg" alt="">
          <h1>DASHBOARD</h1>
        </div>
        <hr class="dashboard_linha_titulo">
      </div>
      <div class="dashboard_body_container_botoes_linha">

        <a href="AdminPerfil">
          <div class="dashboard_body_container_botoes_base_linha">
            <div class="dashboard_body_container_botoes_base_linha_div">
              <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/linha.svg" alt="">
              <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seu_perfil.svg" alt="">
              <h2>Seu Perfil</h2>
            </div>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta.svg" alt="">
          </div>
        </a>

        <a href="RelatorioVendedor">
          <div class="dashboard_body_container_botoes_base_linha">
            <div class="dashboard_body_container_botoes_base_linha_div">
              <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/linha.svg" alt="">
              <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/relatorio_vendas.svg" alt="">
              <h2>Relatório de Vendas</h2>
            </div>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta.svg" alt="">
          </div>
        </a>

        <a href="GerenciarUsuarios">
          <div class="dashboard_body_container_botoes_base_linha">
            <div class="dashboard_body_container_botoes_base_linha_div">
              <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/linha.svg" alt="">
              <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/gerenciar_user.svg" alt="">
              <h2>Gerenciar Usuário</h2>
            </div>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta.svg" alt="">
          </div>
        </a>


      </div>
      <div class="dashboard_body_container_botoes">

        <!-- linha 1 -->
        <a href="GerenciarProdutos">
          <div class="dashboard_body_container_botoes_base">
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/gerenciar_produtos.svg" alt="">
            <h2>Gerenciar Produtos</h2>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta_baixo.svg" alt="">
          </div>
        </a>

        <a href="GerenciarCarrossel">
          <div class="dashboard_body_container_botoes_base">
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/gerenciar_carrossel.svg" alt="">
            <h2>Gerenciar Carrossel</h2>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta_baixo.svg" alt="">
          </div>
        </a>

        <!-- linha 2 -->
        <a href="RedefinirSenha">
          <div class="dashboard_body_container_botoes_base">
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/redefinir_senha.svg" alt="">
            <h2>Redefinir Senha</h2>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta_baixo.svg" alt="">
          </div>
        </a>

        <a href="AprovarVendedor">
          <div class="dashboard_body_container_botoes_base">
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/aprovar_vendedor.svg" alt="">
            <h2>Aprovar Vendedor</h2>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta_baixo.svg" alt="">
          </div>
        </a>

        <a href="Logout">
          <div class="dashboard_body_container_botoes_base">
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/logout.svg" alt="">
            <h2 class="classe_vermelho">Logout</h2>
            <img src="<?= $PATH_PUBLIC ?>/image/admin/dashboard/seta_baixo2.svg" alt="">
          </div>
        </a>
      </div>
    </div>
  </main>
</body>

</html>