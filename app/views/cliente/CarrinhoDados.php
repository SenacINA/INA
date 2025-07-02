<!DOCTYPE html>
<html lang="pt-br">

<?php
$css = ["/css/cliente/CarrinhoDados.css"];
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
          <img src="<?= $PATH_PUBLIC ?>/image/carrinho/carrinho_cinza_icon.svg" alt="Carrinho">
          <span>Carrinho</span>
        </div>
        <hr>
        <div class="carrinho_dados_nav_item carrinho_dados_nav_selected">
          <img src="<?= $PATH_PUBLIC ?>/image/carrinho/identificacao_icon.svg" alt="Identificação">
          <span>Identificação</span>
        </div>
        <hr>
        <div class="carrinho_dados_nav_item">
          <img src="<?= $PATH_PUBLIC ?>/image/carrinho/pagamento_cinza_icon.svg" alt="Pagamento">
          <span>Pagamento</span>
        </div>
      </div>

      <div class="carrinho_dados_forms_dados">
        <div class="carrinho_dados_main_container_carrinho_dados">
          <p class="carrinho_dados_main_text_carrinho_dados">Identificação</p>
          <hr class="carrinho_dados_separador_carrinho">
        </div>

        <div class="carrinho_dados_container_forms">
          <form id="form_endereco" class="carrinho_dados_forms_carrinho">
            <div class="carrinho_dados_subtitulo_main">
              <hr class="carrinho_dados_carrinho_dados_linha">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/+_carolina_icon.svg" class="base_icon carrinho_dados_add_carrinho" alt="">
              <p class="carrinho_dados_subtitulo_main_text">Salvar Endereço</p>
            </div>

            <label for="endereco_carrinho">Endereço:</label>
            <input type="text" name="endereco" id="endereco_carrinho" class="base_input">

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro" class="base_input">

            <label for="cidade" class="carrinho_dados_cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" class="base_input">

            <label for="ponto">Ponto de referência (opcional):</label>
            <input type="text" name="referencia" id="referencia" class="base_input">

            <label for="numero_casa">Número da casa:</label>
            <input type="number" name="numero_casa" id="numero_casa" class="base_input">
            <div class="carrinho_dados_botoes_carrinho">
              <button class="carrinho_dados_start base_botao btn_outline_blue" type="button" onclick="history.back()">
                <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_carolina_icon.svg" alt="Voltar">
                VOLTAR
              </button>

              <button value="" type="button" id="btnSalvarEndereco" class="carrinho_dados_salvar_carrinho base_botao">
                <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/enviar_branco_icon.svg" alt="Salvar">
                Salvar
              </button>
            </div>
          </form>
          <div class="carrinho_dados_informacoes_salvas">
            <div class="carrinho_dados_subtitulo_main">
              <hr class="carrinho_dados_carrinho_dados_linha">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" aria-hidden="true">
                <path fill="#1B98E0" d="M10.925 14.05L16.6 8.4l-1.425-1.425l-4.25 4.25L8.8 9.1l-1.4 1.4zM1 21v-2h22v2zm3-3q-.825 0-1.412-.587T2 16V5q0-.825.588-1.412T4 3h16q.825 0 1.413.588T22 5v11q0 .825-.587 1.413T20 18z" />
              </svg>
              <p class="carrinho_dados_subtitulo_main_text">Endereços Salvos</p>
            </div>

            <div id="enderecos_salvos" class="carrinho_dados_subtitulo_container">
              <?php foreach ($enderecos as $endereco): ?>
                <div id="endereco" class="carrinho_dados_info_container">
                  <input type="radio" name="endereco" class="base_radio" value="<?= $endereco['id_endereco'] ?>">
                  <div class="carrinho_dados_text_info">
                    <div class="carrinho_dados_text">
                      <h3 class="carrinho_dados_endereco_info"><?= "Nº " .  htmlspecialchars($endereco['numero_endereco']) . ", " . htmlspecialchars($endereco['rua_endereco']) . ", " .  htmlspecialchars($endereco['bairro_endereco']) ?></h3>
                      <p class="carrinho_dados_endereco_info_adicional">
                        <?= ($endereco['cidade_endereco']) ?>
                      </p>
                    </div>
                    <div class="carrinho_dados_botoes_info">
                      <button data-id="<?= $endereco['id_endereco'] ?>" id="carrinho_dados_edit_btn" type="button" class="carrinho_dados_edit_info">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg">
                      </button>
                      <button id="carrinho_dados_remove_btn" data-id="<?= $endereco['id_endereco'] ?>" type="button" class="carrinho_dados_remove_info">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
                      </button>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <button class="carrinho_dados_avançar_carrinho base_botao" onclick="pag('CarrinhoPagamentos')">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="Avançar">
              AVANÇAR
            </button>
          </div>
        </div>
      </div>
  </main>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/cliente/CarrinhoDados.js"></script>
</body>

</html>