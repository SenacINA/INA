<!DOCTYPE html>
<html lang="pt-br">
  
<?php
  $css = ["/css/cliente/carinho_dados.css"];
  require_once("./utils/head.php")
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
<main>
  <div class="carrinho_dados">

    <div class="carrinho_dados_nav">
      <div class="carrinho_dados_nav_item">
        <img src="<?=$PATH_PUBLIC?>/image/carrinho/carrinho_cinza_icon.svg">
        <span>Carrinho</span>
      </div>
      <hr>
      <div class="carrinho_dados_nav_item  carrinho_dados_nav_selected">
        <img src="<?=$PATH_PUBLIC?>/image/carrinho/identificacao_icon.svg">
        <span>Identificação</span>
      </div>
      <hr>
      <div class="carrinho_dados_nav_item">
        <img src="<?=$PATH_PUBLIC?>/image/carrinho/pagamento_cinza_icon.svg">
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
          <div  class="base_input_select">
            <select name="opcaoEnvio" id="opcaoEnvio" class="base_input">
              <option value="" disabled selected>Selecione o tipo de entrega</option>
              <option value="entrega_padrao">Entrega Padrão - R$15,00</option>
            </select>
          </div>
          
        </form>
        <div class="carrinho_dados_botoes_carrinho">
          <button class="carrinho_dados_start base_botao btn_outline_blue" onclick="history.back()">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/seta_esquerda_carolina_icon.svg">
            VOLTAR
          </button>

          <button class="carrinho_dados_salvar_carrinho base_botao" onclick="pag('cliente/CarrinhoPagamentos')">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/enviar_branco_icon.svg">
            Salvar
          </button>
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
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
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                  </button>
                  <button class="carrinho_dados_remove_info">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
                  </button>
                </div>
              </div>
            </div>
          </forms>
        </div>

        <button class="carrinho_dados_avançar_carrinho base_botao" onclick="pag('cliente/CarrinhoPagamentos')">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">
          AVANÇAR
        </button>
      </div>
    </div>
  </div>
</main>
  <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>
</html>