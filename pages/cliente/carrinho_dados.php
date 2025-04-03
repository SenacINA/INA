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

<body class="fundo">
  <!-- fazer responsividade -->
  <!-- arrumar o nome das class -->

  <?php
  include_once('../../pages/geral/navbar.php');
  ?>

  <div class="carrinho_dados">
    <div class="carrinho_nav">
      <div class="carrinho_nav_item">
        <img src="../../image/carrinho/carrinho_cinza.svg">
        <span>Carrinho</span>
      </div>
      <hr class="carrinho_divisoria">
      <div class="carrinho_nav_item">
        <img src="../../image/carrinho/identificacao_selected.svg">
        <span>Identificação</span>
      </div>
      <hr class="carrinho_divisoria">
      <div class="carrinho_nav_item">
        <img src="../../image/carrinho/pagamento.svg">
        <span>Pagamento</span>
      </div>
    </div>
    <div class="forms_dados">
      <div class="main_container_carrinho_dados">
        <p class="main_text_carrinho_dados">Identificação</p>
        <hr class="separador_carrinho">
      </div>
      <div class="container_forms">
        <form action="" class="forms_carrinho">
          <label for="nome_carrinho">Nome:</label>
          <input type="text" class="base_input">
          <label for="cpf_carrinho">CPF:</label>
          <input type="text" class="base_input">
          <label for="endereco_carrinho">Endereço:</label>
          <input type="text" class="base_input">
          <div class="informacoes_cep">
            <label for="cep" class="cep">CEP:</label>
            <input type="number" name="cep" id="cep" class="base_input">
            <label for="cidade" class="cidade">Cidade:</label>
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
          <select name="opcaoEnvio" id="opcaoEnvio" class="base_input">
            <option value="" disabled selected>Selecione o tipo de entrega</option>
            <option value="entrega_padrao">Entrega Padrão - R$15,00</option>
          </select>
        </form>
        <div class="botoes_carrinho">
          <button class="salvar_carrinho" onclick="pag('cliente/carrinho_pagamentos')"><img src="../../image/geral/botoes/v_branco_icon.svg">Salvar</button>
        </div>
        <div class="informacoes_salvas">
          <div class="enderecos_salvos_main">
            <p class="enderecos_salvos_main_text">Endereços Salvos</p>
          </div>
          <forms action="" class="enderecos_salvos_container">
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
                    <img src="../../image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
            <div class="info_container">
              <input type="radio" name="endereco" class="base_radio">
              <div class="text_info">
                <div class="text">
                  <h3 class="endereco_info">Endereço</h3>
                  <p class="endereco_info_adicional">Nome, Número da casa, Cidade, CEP</p>
                </div>
                <div class="botoes_info">
                  <button class="edit_info">
                    <img src="../../image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="remove_info">
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