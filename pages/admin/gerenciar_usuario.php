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
  <nav class="gerenciar_usuario_navbar_principal"></nav>
  <header class = "gerenciar_usuario_header">
    <div class = "gerenciar_usuario_header_title">
      <h1>GERENCIAR USUARIO</h1> 
    </div>
    <div class = "gerenciar_usuario_header_linha"></div>
  </header>
  
  <main class="gerenciar_usuario_main_container">
    <div class="gerenciar_usuario_main_content">
      <div class="gerenciar_usuario_pesquisa_cliente_container">
        <div class="gerenciar_usuario_pesquisa_cliente">
          <div class="gerenciar_usuario_main_text_pesquisa_container">
            <p class="gerenciar_usuario_main_text_pesquisa">Pesquisar Clientes</p>
            <hr class="gerenciar_usuario_linha_separador">
          </div>
          <form class="gerenciar_usuario_forms_pesquisa">
            <label for="ip_email">IP / E-Mail</label>
            <input type="text" name="ip_email" id="gerenciar_usuario_ip_email">
            <div class="gerenciar_usuario_selects_container">
              <label for="status" class="gerenciar_usuario_status">Status</label>
              <select name="status" id="gerenciar_usuario_status" class="gerenciar_usuario_status_select">
                <option value="" disabled selected>Selecione um Status</option>
                <option value="mensal">Ativo</option>
                <option value="semestral">Inativo</option>
              </select>
              <label for="mes" class="gerenciar_usuario_mes">Mês</label>
              <select name="mes" id="gerenciar_usuario_mes" class="gerenciar_usuario_mes_select">
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
              <label for="ano" class="gerenciar_usuario_ano">Ano</label>
              <select name="ano" id="gerenciar_usuario_ano" class="gerenciar_usuario_ano_select">
                <option value="" disabled selected>Selecione um ano</option>
                <option value="2025">2025</option>
              </select>                 
            </div>
            <div class="gerenciar_usuario_botoes_submit">
              <button type="reset" class="gerenciar_usuario_cancelar_submit">Cancelar</button>
              <button type="submit" class="gerenciar_usuario_confirmar_submit">Confirmar</button>
            </div>
          </form>
        </div>
        <div class="gerenciar_usuario_informacoes_cliente">
          <div class="gerenciar_usuario_main_text_info_container">
            <p class="gerenciar_usuario_main_text_info">Perfil do Usuário</p>
            <hr class="gerenciar_usuario_linha_separador">
          </div>
          <div class="gerenciar_usuario_usuario_info">
            <img src="../../image/cliente/editar_perfil/perfil_usuario.svg" alt="pfp" class="gerenciar_usuario_pfp_info">
            <p class="gerenciar_usuario_nome_info">Luís Fernando</p>
            <button class="gerenciar_usuario_desativar_usuario">Desativar Usuário</button>
          </div>
          <div class="gerenciar_usuario_data_cadastro">
            <p class="gerenciar_usuario_data_cadastro_text">Data De Cadastro</p>
            <p class="gerenciar_usuario_data_cadastro_date">22/03/2024 08:32:43</p>
          </div>
          <div class="gerenciar_usuario_email">
            <p class="gerenciar_usuario_email_text">E-Mail</p>
            <p class="gerenciar_usuario_email_date">adm1_EaoQuadrado@gmail.com</p>
          </div>
          <div class="gerenciar_usuario_cargo">
            <p class="gerenciar_usuario_cargo_text">Cargo</p>
            <p class="gerenciar_usuario_cargo_info">Admin</p>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_usuario_botoes">
      <select name="filtro" id="gerenciar_usuario_filtro" class="gerenciar_usuario_filtro">
        <option value="">Organizar por:</option>
        <option value="nome">Nome</option>
        <option value="categoria">Data de Cadastro</option>
        <option value="cargo">Cargo</option>
        <option value="plano">E-mail</option>
        <option value="data_inicio">Contato</option>
        <option value="email">Status</option>
      </select>
    </div>
    <div class="gerenciar_usuario_table">
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