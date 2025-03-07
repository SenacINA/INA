<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/admin/admin_carrosel.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar"></nav>
  <header>
    <img src="../../image/admin/gerenciar_carrossel/header_gerenciar_carrossel.svg" alt="header" width="100%">
  </header>
  <main class="main_container">
    <div class="main_content">
      <div class="pesquisa">
        <div class="pesquisa_cliente">
          <div class="main_text_pesquisa_container">
            <p class="main_text_pesquisa">Pesquisar Clientes</p>
            <hr class="linha">
          </div>
          <form class="forms_pesquisa">
            <label for="ip_email">IP / E-Mail</label>
            <input type="text" name="ip_email" id="ip_email">
            <div class="selects">
              <label for="plano" class="plano">Plano</label>
              <select name="plano" id="plano" class="plano_select">
                <option value="">Selecione um plano</option>
                <option value="mensal">Mensal</option>
                <option value="semestral">Semestral</option>
                <option value="anual">Anual</option>
              </select>
              <label for="mes" class="mes">Mês</label>
              <select name="mes" id="mes" class="mes_select">
                <option value="">Selecione um mês</option>
                <option value="janeiro">Janeiro</option>
                <option value="fevereiro">Fevereiro</option>
                <option value="marco">Março</option>
                <option value="abril">Abril</option>
                <option value="maio">Maio</option>
                <option value="junho">Junho</option>
                <option value="julho">Julho</option>
                <option value="agosto">Agosto</option>
                <option value="setembro">Setembro</option>
                <option value="outubro">Outubro</option>
                <option value="novembro">Novembro</option>
                <option value="dezembro">Dezembro</option>
              </select>
              <label for="ano" class="ano">Ano</label>
              <select name="ano" id="ano" class="ano_select">
                <option value="">Selecione um ano</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
              </select>                 
            </div>
          </form>
        </div>
        <div class="informacoes_cliente">
          <div class="main_text_info_container">
            <p class="main_text_info">Informações do Usuário</p>
            <hr class="linha">
          </div>
          <div class="usuario_info">
            <img src="../../image/cliente/editar_perfil/perfil_usuario.svg" alt="pfp" class="pfp_info">
            <p class="nome_info">info@nvidia.com</p>
          </div>
          <div class="data_inicio">
            <p class="data_inicio_text">Data De Início</p>
            <p class="data_inicio_date">25/07/2024</p>
          </div>
          <div class="data_expiracao">
            <p class="data_expiracao_text">Data De Expiração</p>
            <p class="data_expiracao_date">25/08/2024</p>
          </div>
          <div class="cargo">
            <p class="cargo_text">Cargo</p>
            <p class="cargo_info">Vendedor</p>
          </div>
        </div>
      </div>
    </div>
    <div class="botoes">
      <select name="filtro" id="filtro" class="filtro">
        <option value="">Organizar por:</option>
        <option value="nome">Nome</option>
        <option value="categoria">Categoria</option>
        <option value="cargo">Cargo</option>
        <option value="plano">Plano</option>
        <option value="data_inicio">Data de início</option>
        <option value="data_expiracao">Data de expiração</option>
      </select>
      <button class="add_anuncio"><img src="../../image/geral/add_botao.svg">Adicionar anúncio</button>
    </div>
    <div class="table">
      <p>IP</p>
      <p>NOME</p>
      <p>CATEGORIA</p>
      <p>CARGO</p>
      <p>PLANO</p>
      <p>DATA DE INICIO</p>
      <p>DATA DE EXPIRAÇÃO</p>
      <span>192.168.0.1</span>
      <span>info@nvidia.com</span>
      <span>Hardware</span>
      <span>Vendedor</span>
      <span>Mensal</span>
      <span>25/07/2024</span>
      <span>25/08/2024</span>
      <span>192.138.0.2</span>
      <span>suporte@periféricos.com</span>
      <span>Periféricos</span>
      <span>Vendedor</span>
      <span>Semestral</span>
      <span>25/01/2024</span>
      <span>25/07/2024</span>
      <span>192.231.0.3</span>
      <span>admin@admin.com</span>
      <span>Celulares</span>
      <span>Admin</span>
      <span>Anual</span>
      <span>25/07/2024</span>
      <span>25/07/2025</span>
    </div>
  </main>
</body>
</html>