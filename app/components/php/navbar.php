<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function handlePerfil()
{
  $user = $_SESSION["user_type"] ?? '';

  switch ($user) {
    case 'admin':
      return "Perfil";
    case 'cliente':
      return "Perfil";
    case 'vendedor':
      return "Perfil";
    default:
      return "Login";
  }
}

function gerarTitle($user)
{
  $content = '<a class="menu-item">
                    <img class="icon" style="max-width:24px" src="./public/image/index/Logo.svg" alt="">
                    <span>EaoQuadrado</span>
                </a>';
  switch ($user) {
    case 'admin':
      $content = 'Gestão Geral';
      break;
    case 'vendedor':
      $content = 'Gestão Geral';
      break;
    default:
      $content = $content;
      break;
  }

  return $content;
}

function generateModalContent($user)
{

  $content = '';

  switch ($user) {
    case 'admin':
      $content = '
              <li>
                <a href="#" class="menu-item" onclick="pag(\'AdminDashboard\')">
                <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db"><path fill="#3498db" d="M12 3s-6.186 5.34-9.643 8.232A1.04 1.04 0 0 0 2 12a1 1 0 0 0 1 1h2v7a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-4h4v4a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-7h2a1 1 0 0 0 1-1a.98.98 0 0 0-.383-.768C18.184 8.34 12 3 12 3"/></svg>
                    <span>Home</span>
                </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'Perfil\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                      </svg>
                      <span>Seu Perfil</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'RelatorioVendedor\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z" />
                      </svg>
                      <span>Relatório De Vendas</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'GerenciarUsuarios\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                      </svg>
                      <span>Gerenciar Usuário</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'GerenciarProdutos\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                      </svg>
                      <span>Gerenciar Produtos</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'GerenciarCarrossel\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M10 8v8l5-4-5-4zm9-5H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z" />
                      </svg>
                      <span>Gerenciar Carrossel</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'RedefinirSenha\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                      </svg>
                      <span>Redefinir Senha</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'AprovarVendedor\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                      </svg>
                      <span>Aprovar Vendedor</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'AtualizarUsuario\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                      <path fill="#3498db" d="M5.7 9c.4-2 2.2-3.5 4.3-3.5c1.5 0 2.7.7 3.5 1.8l1.7-2C14 3.9 12.1 3 10 3C6.5 3 3.6 5.6 3.1 9H1l3.5 4L8 9zm9.8-2L12 11h2.3c-.5 2-2.2 3.5-4.3 3.5c-1.5 0-2.7-.7-3.5-1.8l-1.7 1.9C6 16.1 7.9 17 10 17c3.5 0 6.4-2.6 6.9-6H19z"/></svg>
                      <span>Atualizar Usuário</span>
                  </a>
              </li>
          ';
      break;

    case 'cliente':
      $content = '
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'Perfil\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                      </svg>
                      <span>Seu Perfil</span>
                  </a>
              </li>
              <li>
                  <a onclick="pag(\'RedefinirSenha\')" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                      </svg>
                      <span>Redefinir Senha</span>
                  </a>
              </li>
              <li>
                  <a onclick="pag(\'EditarPerfil\')" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path fill="#3498db" d="m21.7 13.35l-1 1l-2.05-2.05l1-1a.55.55 0 0 1 .77 0l1.28 1.28c.21.21.21.56 0 .77M12 18.94l6.06-6.06l2.05 2.05L14.06 21H12zM12 14c-4.42 0-8 1.79-8 4v2h6v-1.89l4-4c-.66-.08-1.33-.11-2-.11m0-10a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4"/>
                      </svg>
                      <span>Editar Perfil</span>
                  </a>
              </li>
              <li>
                  <a onclick="pag(\'CadastroVendedorInfo\')" class="menu-item">
                  <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                    <path fill="#3498db" d="m21.41 11.58l-9-9C12.04 2.21 11.53 2 11 2H4a2 2 0 0 0-2 2v7c0 .53.21 1.04.59 1.41l.41.4c.9-.54 1.94-.81 3-.81a6 6 0 0 1 6 6c0 1.06-.28 2.09-.82 3l.4.4c.37.38.89.6 1.42.6s1.04-.21 1.41-.59l7-7c.38-.37.59-.88.59-1.41s-.21-1.04-.59-1.42M5.5 7A1.5 1.5 0 0 1 4 5.5A1.5 1.5 0 0 1 5.5 4A1.5 1.5 0 0 1 7 5.5A1.5 1.5 0 0 1 5.5 7M10 19H7v3H5v-3H2v-2h3v-3h2v3h3z"/>
                    </svg>
                      <span>Cadastro Vendedor</span>
                  </a>
              </li>
          ';
      break;

    case 'vendedor':
      $content = '
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'Perfil\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                      </svg>
                      <span>Seu Perfil</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'EditarPerfil\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z" />
                      </svg>
                      <span>Editar Perfil</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'GerenciarProdutos\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                      <path fill="#3498db" d="M3 4.5A1.5 1.5 0 0 1 4.5 3h15A1.5 1.5 0 0 1 21 4.5V6a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 6zM4 9h16v2.498A6.5 6.5 0 0 0 17.5 11a6.5 6.5 0 0 0-3 .732a.75.75 0 0 0-.75-.732h-3.5a.75.75 0 0 0 0 1.5h3.096a6.49 6.49 0 0 0-2.346 5a6.47 6.47 0 0 0 1.022 3.5H7.75A3.75 3.75 0 0 1 4 17.25zm10.277 4.976a2 2 0 0 1-1.441 2.496l-.584.145a5.7 5.7 0 0 0 .006 1.807l.54.13a2 2 0 0 1 1.45 2.51l-.187.631c.44.386.94.7 1.485.922l.493-.519a2 2 0 0 1 2.899 0l.499.526a5.3 5.3 0 0 0 1.482-.913l-.198-.686a2 2 0 0 1 1.442-2.496l.583-.145a5.7 5.7 0 0 0-.006-1.807l-.54-.13a2 2 0 0 1-1.449-2.51l.186-.631a5.3 5.3 0 0 0-1.484-.922l-.493.518a2 2 0 0 1-2.9 0l-.498-.525c-.544.22-1.044.53-1.483.913zM17.5 19c-.8 0-1.45-.671-1.45-1.5c0-.828.65-1.5 1.45-1.5s1.45.672 1.45 1.5c0 .829-.65 1.5-1.45 1.5"/>
                      </svg>
                      <span>Gerenciar Produto</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'RelatorioVendas\')">
                  <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path fill="#3498db" d="M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                  </svg>
                      <span>Relatório de Vendas</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'ProdutoRegistrar\')">
                  <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#3498db" d="M5 21q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V10.2q0 .45-.363.725t-.812.175q-.65-.125-1.338-.075t-1.312.25q-.425.125-.8-.112T16 10.5V8H8v6.375q0 .575.475.863t.975.037L12 14l.775.375q.3.15.413.45t.012.625q-.125.35-.162.738t-.038.787q0 .725.175 1.45T13.7 19.8q.225.425.025.813T13.1 21zm13-3h-2q-.425 0-.712-.288T15 17t.288-.712T16 16h2v-2q0-.425.288-.712T19 13t.713.288T20 14v2h2q.425 0 .713.288T23 17t-.288.713T22 18h-2v2q0 .425-.288.713T19 21t-.712-.288T18 20zM5.4 6h13.2l-.85-1H6.25z"/>
                  </svg>
                      <span>Registrar Produto</span>
                  </a>
              </li>
          ';
      break;

    default:
      $content = '
            <li>
                <a href="#" class="menu-item" onclick="pag(\'Login\')">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#3498DB" fill-rule="evenodd" d="M3.5 9.568v4.864c0 2.294 0 3.44.722 4.153c.655.647 1.674.706 3.596.712l-.015-.105c-.115-.844-.115-1.916-.115-3.247v-.053c0-.403.331-.73.74-.73c.408 0 .739.327.739.73c0 1.396.001 2.37.101 3.105c.098.714.275 1.093.548 1.362s.656.445 1.379.54c.744.1 1.731.101 3.146.101h.985c1.415 0 2.401-.002 3.146-.1c.723-.096 1.106-.272 1.378-.541c.273-.27.451-.648.548-1.362c.1-.734.102-1.709.102-3.105V8.108c0-1.397-.002-2.37-.102-3.105c-.097-.714-.275-1.093-.547-1.362c-.273-.27-.656-.445-1.38-.54C17.728 3 16.742 3 15.327 3h-.985c-1.415 0-2.402.002-3.146.1c-.723.096-1.106.272-1.379.541c-.273.27-.45.648-.548 1.362c-.1.734-.101 1.708-.101 3.105c0 .403-.331.73-.74.73a.734.734 0 0 1-.739-.73v-.053c0-1.33 0-2.403.115-3.247l.015-.105c-1.922.006-2.94.065-3.596.712c-.722.713-.722 1.86-.722 4.153m9.885 5.38l2.464-2.432a.723.723 0 0 0 0-1.032l-2.464-2.432a.746.746 0 0 0-1.045 0a.723.723 0 0 0 0 1.032l1.202 1.186H6.457a.734.734 0 0 0-.74.73c0 .403.331.73.74.73h7.085l-1.202 1.186a.723.723 0 0 0 0 1.032a.746.746 0 0 0 1.045 0" clip-rule="evenodd" />
                    </svg>
                    <span>Logar</span>
                </a>
              </li>
          '; // Se não houver usuário, o modal fica vazio
      break;
  }

  // Adiciona o botão de logout para todos os tipos de usuário
  if (!empty($user)) {
    $content .= '
          <li>
              <a onclick="pag(\'Logout\')" id="sideBarLogout" class="menu-item logout">
                  <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#e74c3c">
                      <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                  </svg>
                  <span>Logout</span>
              </a>
          </li>
      ';
  }
  return $content;
}
?>

<div class="base_nav_nav" id="baseNavHeaderMain">
  <div class="base_nav_logo_container" onclick="pag('')">
    <img id="baseNavLogoHeader">
  </div>
  <div class="base_nav_search_container">
    <input type="text" id="baseNavSearchInput" placeholder="Pesquisar...">
    <button type="submit" class="base_nav_square_button_search">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
      </svg>
    </button>
  </div>
  <div class="base_nav_button_container">
    <button class="base_nav_square_button" onclick="pag('<?= handlePerfil() ?>')">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <g fill="none" fill-rule="evenodd">
          <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
          <path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2M8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0m9.758 7.484A7.99 7.99 0 0 1 12 20a7.99 7.99 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984" />
        </g>
      </svg>
    </button>
    <button class="base_nav_square_button carrinho_com_badge" onclick="pag('Carrinho')">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2" />
      </svg>
          <span id="carrinho-badge" class="carrinho_badge"></span>
    </button>

    <button class="base_nav_square_button" id="baseNavSideBar">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path fill="currentColor" d="M4 18q-.425 0-.712-.288T3 17t.288-.712T4 16h16q.425 0 .713.288T21 17t-.288.713T20 18zm0-5q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-5q-.425 0-.712-.288T3 7t.288-.712T4 6h16q.425 0 .713.288T21 7t-.288.713T20 8z" />
      </svg>
    </button>
  </div>
</div>

<div id="modal-container" class="modal-container" hidden>
  <div id="modal" class="modal" role="dialog" aria-labelledby="modal-title" aria-modal="true">
    <div class="modal-header">
      <h2 id="modal-title"><?php echo gerarTitle($_SESSION["user_type"] ?? ''); ?></h2>
      <button id="close-modal" class="close-button" aria-label="Fechar menu">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <nav class="modal-content">
      <ul class="menu-list">
        <?php echo generateModalContent($_SESSION["user_type"] ?? ''); ?>
      </ul>
    </nav>
  </div>
</div>