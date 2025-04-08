<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/cliente/carinho_dados.css">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>

<body class="carrinho_dados_fundo">
  <?php
  include_once('../../pages/geral/navbar.php');
  ?>

  <div class="carrinho_dados">
    <div class="carrinho_dados_carrinho_nav">
      <div class="carrinho_dados_carrinho_nav_item">
        <img src="../../image/carrinho/carrinho_cinza.svg">
        <span>Carrinho</span>
      </div>
      <hr class="carrinho_dados_carrinho_divisoria">
      <div class="carrinho_dados_carrinho_nav_item">
        <img src="../../image/carrinho/identificacao_selected.svg">
        <span>Identificação</span>
      </div>
      <hr class="carrinho_dados_carrinho_divisoria">
      <div class="carrinho_dados_carrinho_nav_item">
        <img src="../../image/carrinho/pagamento.svg">
        <span>Pagamento</span>
      </div>
    </div>
    <div class="carrinho_dados_forms_dados">
      <div class="carrinho_dados_main_container_carrinho_dados">
        <p class="carrinho_dados_main_text_carrinho_dados">Identificação</p>
        <hr class="carrinho_dados_separador_carrinho">
      </div>
      <div class="carrinho_dados_container_forms">
        <form action="" class="carrinho_dados_forms_carrinho">
          <label for="nome_carrinho">Nome:</label>
          <input type="text" class="base_input">
          <label for="cpf_carrinho">CPF:</label>
          <input type="text" class="base_input">
          <label for="endereco_carrinho">Endereço:</label>
          <input type="text" class="base_input">
          <div class="carrinho_dados_informacoes_cep">
            <label for="cep" class="carrinho_dados_cep">CEP:</label>
            <input type="number" name="cep" id="cep" class="base_input">
            <label for="cidade" class="carrinho_dados_cidade">Cidade:</label>
            <input type="text" id="cidade" class="base_input">
          </div>
          <label for="telefone">Telefone:</label>
          <input type="text" name="telefone" id="telefone" class="base_input">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" class="base_input">
          <label for="ponto">Ponto de referência(opcional):</label>
          <input type="text" name="ponto" id="ponto" class="base_input">
          <label for="numeroCasa">Número da casa:</label>
          <input type="number" name="numeroCasa" id="numeroCasa" class="base_input">
          <label for="mensagem_vendedor">Mensagem para o vendedor(opcional):</label>
          <input type="text" class="base_input">
          <label for="opcaoEnvio">Opções de envio</label>
          <select name="opcaoEnvio" id="opcaoEnvio" class="base_input_select">
            <option value="" disabled selected>Selecione o tipo de entrega</option>
            <option value="entrega_padrao">Entrega Padrão - R$15,00</option>
          </select>
        </form>
        <div class="carrinho_dados_botoes_carrinho">
          <button class="carrinho_dados_salvar_carrinho" onclick="pag('cliente/carrinho_pagamentos')"><img src="../../image/geral/botoes/v_branco_icon.svg">Salvar</button>
        </div>
        <div class="carrinho_dados_informacoes_salvas">
          <div class="carrinho_dados_enderecos_salvos_main">
            <hr class="carrinho_dados_carrinho_dados_linha">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
              <path fill="#1B98E0" d="M10.925 14.05L16.6 8.4l-1.425-1.425l-4.25 4.25L8.8 9.1l-1.4 1.4zM1 21v-2h22v2zm3-3q-.825 0-1.412-.587T2 16V5q0-.825.588-1.412T4 3h16q.825 0 1.413.588T22 5v11q0 .825-.587 1.413T20 18z" />
            </svg>
            <p class="carrinho_dados_enderecos_salvos_main_text">Endereços Salvos</p>
          </div>
          <forms action="" class="carrinho_dados_enderecos_salvos_container">
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="carrinho_dados_info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="carrinho_dados_text_info">
                <div class="carrinho_dados_text">
                  <h3 class="carrinho_dados_endereco_info">Endereço</h3>
                  <p class="carrinho_dados_endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="carrinho_dados_botoes_info">
                  <button class="carrinho_dados_edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
          </forms>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once('../../pages/geral/footer.php');
  ?>
</body>

</html>