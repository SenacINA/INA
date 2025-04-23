<?php

function handlePerfil()
{
  $user = $_SESSION["user_type"] ?? '';

  switch ($user) {
    case 'admin':
      return "dashboard";
    case 'cliente':
      return "perfil-cliente";
    case 'vendedor':
      return "perfil-vendedor";
    default:
      return "login-cliente";
  }
}

function generateModalContent($user) {
  $content = '';

  switch ($user) {
      case 'admin':
          $content = '
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'cliente/carrinho_pagamentos\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                      </svg>
                      <span>Seu Perfil</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z" />
                      </svg>
                      <span>Relatório De Vendas</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                      </svg>
                      <span>Gerenciar Usuário</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                      </svg>
                      <span>Gerenciar Produtos</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M10 8v8l5-4-5-4zm9-5H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z" />
                      </svg>
                      <span>Gerenciar Carrossel</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                      </svg>
                      <span>Redefinir Senha</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                      </svg>
                      <span>Aprovar Vendedor</span>
                  </a>
              </li>
          ';
          break;

      case 'cliente':
          $content = '
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'cliente/carrinho_pagamentos\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                      </svg>
                      <span>Seu Perfil</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                      </svg>
                      <span>Redefinir Senha</span>
                  </a>
              </li>
          ';
          break;

      case 'vendedor':
          $content = '
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'vendedor/perfil_vendedor\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                      </svg>
                      <span>Seu Perfil</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'vendedor/relatorio_vendas\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z" />
                      </svg>
                      <span>Relatório De Vendas</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="menu-item" onclick="pag(\'vendedor/gerenciar_pedidos\')">
                      <svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="#3498db">
                          <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                      </svg>
                      <span>Gerenciar Produtos</span>
                  </a>
              </li>
          ';
          break;

      default:
          $content = ''; // Se não houver usuário, o modal fica vazio
          break;
  }

  // Adiciona o botão de logout para todos os tipos de usuário
  if (!empty($user)) {
      $content .= '
          <li>
              <a href="#" id="sideBarLogout" class="menu-item logout">
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
// Função para gerar o valor do onclick com base na variável $isIndex

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
    <button class="base_nav_square_button" onclick="pag('<?=handlePerfil()?>')">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <g fill="none" fill-rule="evenodd">
          <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
          <path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2M8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0m9.758 7.484A7.99 7.99 0 0 1 12 20a7.99 7.99 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984" />
        </g>
      </svg>
    </button>
    <button class="base_nav_square_button" onclick="pag('carrinho')">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2" />
      </svg>
    </button>
    <button class="base_nav_square_button" id="baseNavSideBar">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path fill="currentColor" d="M4 18q-.425 0-.712-.288T3 17t.288-.712T4 16h16q.425 0 .713.288T21 17t-.288.713T20 18zm0-5q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-5q-.425 0-.712-.288T3 7t.288-.712T4 6h16q.425 0 .713.288T21 7t-.288.713T20 8z" />
      </svg>
    </button>
  </div>
</div>

<?php

?>

<div id="modal-container" class="modal-container" hidden>
  <div id="modal" class="modal" role="dialog" aria-labelledby="modal-title" aria-modal="true">
    <div class="modal-header">
      <h2 id="modal-title">Gestão Geral</h2>
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