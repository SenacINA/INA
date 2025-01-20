<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/admin/gerenciar_usuario.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar_principal"></nav>
  <header>
    <div class = "title">
      <h1>GERENCIAR USUARIO</h1> 
    </div>
    <div class = "linha"></div>
  </header>
  
  <main class="main_container">
    <div class="main_content">
      <div class="pesquisa_cliente_container">
        <div class="pesquisa_cliente">
          <div class="main_text_pesquisa_container">
            <p class="main_text_pesquisa">Pesquisar Clientes</p>
            <hr class="linha_seperador">
          </div>
          <form class="forms_pesquisa">
            <label for="ip_email">IP / E-Mail</label>
            <input type="text" name="ip_email" id="ip_email">
            <div class="selects_container">
              <label for="status" class="status">Status</label>
              <select name="status" id="status" class="status_select">
                <option value="" disabled selected>Selecione um Status</option>
                <option value="mensal">Ativo</option>
                <option value="semestral">Inativo</option>
              </select>
              <label for="mes" class="mes">Mês</label>
              <select name="mes" id="mes" class="mes_select">
                <option value="" disabled selected>Selecione um mês</option>
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
                <option value="" disabled selected>Selecione um ano</option>
                <option value="2025">2025</option>
              </select>                 
            </div>
            <div class="botoes_submit">
              <button type="reset" class="cancelar_submit">Cancelar</button>
              <button type="submit" class="confirmar_submit">Confirmar</button>
            </div>
          </form>
        </div>
        <div class="informacoes_cliente">
          <div class="main_text_info_container">
            <p class="main_text_info">Perfil do Usuário</p>
            <hr class="linha_separador">
          </div>
          <div class="usuario_info">
            <img src="../../image/cliente/editar_perfil/perfil_usuario.svg" alt="pfp" class="pfp_info">
            <p class="nome_info">Luís Fernando</p>
            <button class="desativar_usuario">Desativar Usuário</button>
          </div>
          <div class="data_cadastro">
            <p class="data_cadastro_text">Data De Cadastro</p>
            <p class="data_cadastro_date">22/03/2024 08:32:43</p>
          </div>
          <div class="email">
            <p class="email_text">E-Mail</p>
            <p class="email_date">adm1_EaoQuadrado@gmail.com</p>
          </div>
          <div class="cargo">
            <p class="cargo_text">Cargo</p>
            <p class="cargo_info">Admin</p>
          </div>
        </div>
      </div>
    </div>
    <div class="botoes">
      <select name="filtro" id="filtro" class="filtro">
        <option value="">Organizar por:</option>
        <option value="nome">Nome</option>
        <option value="categoria">Data de Cadastro</option>
        <option value="cargo">Cargo</option>
        <option value="plano">E-mail</option>
        <option value="data_inicio">Contato</option>
        <option value="email">Status</option>
      </select>
    </div>
    <div class="table">
      <p>IP</p>
      <p>Nome</p>
      <p>DATA DE CADASTRO</p>
      <p>Cargo</p>
      <p>E-MAIL</p>
      <p>CONTATO</p>
      <p>STATUS</p>
      <span>231.122.0.2</span>
      <span>Luís Fernando</span>
      <span>01/01/2025</span>
      <span>Admin</span>
      <span>adm1_EaoQuadrado@gmail.com</span>
      <span>+55 67 9 9999 9999</span>
      <span>Ativo</span>
      <span>192.168.0.1</span>
      <span>João Guilherme</span>
      <span>01/01/2025</span>
      <span>Admin</span>
      <span>adm2_EaoQuadrado@gmail.com</span>
      <span>+55 67 9 9999 9999</span>
      <span>Ativo</span>
      <span>111.148.02.14</span>
      <span>THUNDER GAMES</span>
      <span>05/01/2025</span>
      <span>Vendedor</span>
      <span>thundergames@gmail.com</span>
      <span>+55 67 9 9999 9999</span>
      <span>Ativo</span>
      <span>212.132.10.21</span>
      <span>Cliente10</span>
      <span>09/01/2025</span>
      <span>Cliente</span>
      <span>cliente10@gmail.com</span>
      <span>+55 67 9 9999 9999</span>
      <span>Ativo</span>
    </div>
  </main>
</body>
</html>