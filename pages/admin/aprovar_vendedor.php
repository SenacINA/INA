<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/admin/aprovar_vendedor.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
  <?php
  include('../../pages/geral/navbar.php');
  ?>
  <div class="aprovar_vendedor_main_title">
    <h1 class="aprovar_vendedor_main_text">Aprovação do vendedor</h1>
    <hr class="aprovar_vendedor_main_linha">
  </div>
  <main class="aprovar_vendedor_main_container">
    <div class="aprovar_vendedor_filtro">
      <form action="" method="post">
        <select name="aprovar_vendedor_filtro" id="filtro" class="aprovar_vendedor_input_select">
          <option value="Organizar por:" disabled selected>Organizar por:</option>
          <option value="codigo">Código</option>
          <option value="nome">Nome</option>
          <option value="declaracao">Declaração</option>
          <option value="status">Status</option>
        </select>
      </form>
    </div>
    <div class="aprovar_vendedor_main_quadrado">
      <p>Código</p>
      <p>Nome</p>
      <p>Requisitos</p>
      <p>Declaração</p>
      <p>Aprovar</p>
      <p>Status</p>
      <span>232.015.2.23</span>
      <span class="aprovar_vendedor_nome">Thunder Games</span>
      <span>Completo</span>
      <span>Entregue</span>
      <div>
        <button class="aprovar_vendedor_ativar">Ativar</button>
        <button class="aprovar_vendedor_inativar">Inativar</button>
      </div>
      <span class="ultimo">Aprovado</span>
      <span>242.014.2.21</span>
      <span class="aprovar_vendedor_nome">Raio Games</span>
      <span>Completo</span>
      <span>Entregue</span>
      <div>
        <button class="aprovar_vendedor_ativar">Ativar</button>
        <button class="aprovar_vendedor_inativar">Inativar</button>
      </div>
      <span class="ultimo">Aprovado</span>
      <span>132.125.2.20</span>
      <span class="aprovar_vendedor_nome">Piratex</span>
      <span>Completo</span>
      <span>Entregue</span>
      <div>
        <button class="aprovar_vendedor_aprovar">Aprovar</button>
        <button class="aprovar_vendedor_inativar">Recusar</button>
      </div>
      <span class="ultimo">Pendente</span>
      <span>111.012.2.3</span>
      <span class="aprovar_vendedor_nome">Gameflix</span>
      <span>Pendente</span>
      <span>Entregue</span>
      <div>
        <p class="aprovar_vendedor_requisitos">Requisitos Não Atendidos</p>
      </div>
      <span class="ultimo">Pendente</span>
    </div>
  </main>
</body>

</html>