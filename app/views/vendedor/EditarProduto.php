<!-- FINALIZADO -->
<?php
$imagensExistentes = array_map(fn($i) => ['id' => $i['id'], 'url' => $i['url']], $produto['imagens'] ?? []);
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Editar Produto - E ao Quadrado";
  $css = ["/css/vendedor/EditarProduto.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <div class='editar_produto_main'>
      <div class='editar_produto_title'>
        <h2>
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path
              d="M30.8647 7.45769C31.5303 6.78602 31.5303 5.66658 30.8647 5.02936L26.8711 0.999355C26.2396 0.327689 25.1303 0.327689 24.4647 0.999355L21.3244 4.15102L27.7245 10.6094M0.639648 25.0416V31.4999H7.03965L25.9154 12.4349L19.5154 5.97658L0.639648 25.0416Z"
              fill="#006494" />
          </svg>
          EDITAR PRODUTO
        </h2>
        <hr class="editar_produto_linha_titulo">
      </div>
      <div class='editar_produto_container'>
        <form action="AtualizarProduto" class='editar_produto_form_grid' method="POST">
          <input type="hidden" name="produtoId" value="<?= $produto['id_produto'] ?>">
          <div class='editar_produto_form'>
            <div class='editar_produto_form_title'>
              <div class='editar_produto_line'></div>
              <h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M10.3998 7.1998H5.5998V10.3998H10.3998V7.1998ZM0.799805 5.5998C0.799805 4.32677 1.30552 3.10587 2.20569 2.20569C3.10587 1.30552 4.32677 0.799805 5.5998 0.799805H15.1998V23.1998H5.5998C4.32677 23.1998 3.10587 22.6941 2.20569 21.7939C1.30552 20.8937 0.799805 19.6728 0.799805 18.3998V5.5998ZM3.9998 7.1998V10.3998C3.9998 10.8242 4.16838 11.2311 4.46843 11.5312C4.76849 11.8312 5.17546 11.9998 5.5998 11.9998H10.3998C10.8242 11.9998 11.2311 11.8312 11.5312 11.5312C11.8312 11.2311 11.9998 10.8242 11.9998 10.3998V7.1998C11.9998 6.77546 11.8312 6.36849 11.5312 6.06843C11.2311 5.76838 10.8242 5.5998 10.3998 5.5998H5.5998C5.17546 5.5998 4.76849 5.76838 4.46843 6.06843C4.16838 6.36849 3.9998 6.77546 3.9998 7.1998ZM4.7998 13.5998C4.58763 13.5998 4.38415 13.6841 4.23412 13.8341C4.08409 13.9841 3.9998 14.1876 3.9998 14.3998C3.9998 14.612 4.08409 14.8155 4.23412 14.9655C4.38415 15.1155 4.58763 15.1998 4.7998 15.1998H11.1998C11.412 15.1998 11.6155 15.1155 11.7655 14.9655C11.9155 14.8155 11.9998 14.612 11.9998 14.3998C11.9998 14.1876 11.9155 13.9841 11.7655 13.8341C11.6155 13.6841 11.412 13.5998 11.1998 13.5998H4.7998ZM3.9998 17.5998C3.9998 17.812 4.08409 18.0155 4.23412 18.1655C4.38415 18.3155 4.58763 18.3998 4.7998 18.3998H11.1998C11.412 18.3998 11.6155 18.3155 11.7655 18.1655C11.9155 18.0155 11.9998 17.812 11.9998 17.5998C11.9998 17.3876 11.9155 17.1841 11.7655 17.0341C11.6155 16.8841 11.412 16.7998 11.1998 16.7998H4.7998C4.58763 16.7998 4.38415 16.8841 4.23412 17.0341C4.08409 17.1841 3.9998 17.3876 3.9998 17.5998ZM16.7998 23.1998H18.3998C19.6728 23.1998 20.8937 22.6941 21.7939 21.7939C22.6941 20.8937 23.1998 19.6728 23.1998 18.3998V16.7998H16.7998V23.1998ZM23.1998 15.1998V8.7998H16.7998V15.1998H23.1998ZM23.1998 7.1998V5.5998C23.1998 4.32677 22.6941 3.10587 21.7939 2.20569C20.8937 1.30552 19.6728 0.799805 18.3998 0.799805H16.7998V7.1998H23.1998Z"
                    fill="#247BA0" />
                </svg>
                Informações do Produto
              </h3>
            </div>
            <div class='editar_produto_form_input'>
              <div class='editar_produto_input'>
                <label for="nomeProduto">Nome do Produto</label>
                <input class='base_input' type="text" id='nomeProduto' value="<?= $produto['nome_produto'] ?>" name='nomeProduto'>
              </div>
              <div class='editar_produto_small_input'>
                <div class='editar_produto_input'>
                  <label for="valorProduto">Valor</label>
                  <input class='base_input' type="number" id='valorProduto' value="<?= $produto['preco_produto'] ?>" name='valorProduto'>
                </div>
                <div class='editar_produto_input'>
                  <label for="marcaProduto">Marca</label>
                  <input class='base_input' type="text" id='marcaProduto' value="<?= $produto['marca_produto'] ?>" name='marcaProduto'>
                </div>
              </div>
              
              <div class='editar_produto_small_input'>
                
                <div class='editar_produto_input'>
                  <label for="codigoProduto">Código</label>
                  <input class='base_input' type="number" id='codigoProduto' value="<?= $produto['cod_produto'] ?>" name='codigoProduto'>
                </div>
                <div class='editar_produto_input'>
                  <label for="estoqueProduto">Estoque</label>
                  <input class='base_input' type="number" id='estoqueProduto' value="<?= $produto['unidade_produto']?>" name='estoqueProduto'>
                </div>
              </div>
              <div class='editar_produto_small_input'>
                <div class='editar_produto_input'>
                  <label for="origemProduto">Origem</label>
                  <input class='base_input' type="text" id='origemProduto' value="<?= $produto['origem_produto']?>" name='origemProduto'>
                </div>
              </div>

              <div class="base_input_select">
                <label for="categoriaProduto">Categoria</label>
                <select
                  class="base_input" id="categoriaProduto" name="categoriaProduto" data-selected="<?= $produto['categoria']['id'] ?>" >
                  <option value="" disabled>Selecione</option>
                </select>
              </div>

              <div class="base_input_select">
                <label for="subCategoriaProduto">Sub-Categoria</label>
                <select class="base_input" id="subCategoriaProduto" name="subCategoriaProduto" data-selected="<?= $produto['subcategoria']['id'] ?>">
                  <option value="" disabled selected>Selecione</option>
                </select>
              </div>
            </div>
          </div>
          <div class='editar_produto_form'>
            <div class='editar_produto_form_title'>
              <div class='editar_produto_line'></div>
              <h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path
                    d="M31.4182 8.87278L23.1273 0.581871C22.5455 5.32717e-05 21.6728 5.32717e-05 21.091 0.581871L0.581871 21.091C5.32866e-05 21.6728 5.32866e-05 22.5455 0.581871 23.1273L8.87278 31.4182C9.4546 32.0001 10.3273 32.0001 10.9091 31.4182L13.9637 28.3637L8.87278 23.2728C8.29096 22.691 8.29096 21.8182 8.87278 21.2364C9.4546 20.6546 10.3273 20.6546 10.9091 21.2364L16.0001 26.3273L18.0364 24.291L14.9819 21.2364C14.4001 20.6546 14.4001 19.7819 14.9819 19.2001C15.5637 18.6182 16.4364 18.6182 17.0182 19.2001L20.0728 22.2546L22.1091 20.2182L17.0182 15.1273C16.4364 14.5455 16.4364 13.6728 17.0182 13.091C17.6001 12.5091 18.4728 12.5091 19.0546 13.091L24.1455 18.1819L26.1819 16.1455L23.1273 13.091C22.5455 12.5091 22.5455 11.6364 23.1273 11.0546C23.7091 10.4728 24.5819 10.4728 25.1637 11.0546L28.2182 14.1091L31.2728 11.0546C32.0001 10.3273 32.0001 9.30914 31.4182 8.87278Z"
                    fill="#247BA0" />
                </svg>
                Dimensões E Peso
              </h3>
            </div>
            <div class='editar_produto_form_input'>
              <div class='editar_produto_small_input'>
                <div class='editar_produto_input'>
                  <label for="pesoLiquidoProduto">Peso Líquido(g)</label>
                  <input class='base_input' value="<?= $produto['peso_liquido_produto'] ?>" type="number" id='pesoLiquidoProduto' name='pesoProduto'>
                </div>
                <div class='editar_produto_input'>
                  <label for="pesoBrutoProduto">Peso Bruto(g)</label>
                  <input class='base_input' type="text" value="<?= $produto['peso_bruto_produto'] ?>" id='pesoBrutoProduto' name='pesoBrutoProduto'>
                </div>
                <div class='editar_produto_input'>
                  <label for="larguraProduto">Largura(cm)</label>
                  <input class='base_input' type="text" value="<?= $produto['largura_produto'] ?>" id='larguraProduto' name='larguraProduto'>
                </div>
                <div class='editar_produto_input'>
                  <label for="alturaProduto">Altura(cm)</label>
                  <input class='base_input' type="text" value="<?= $produto['altura_produto'] ?>" id='alturaProduto' name='alturaProduto'>
                </div>
                <div class='editar_produto_input'>
                  <label for="comprimentoProduto">Comprimento(cm)</label>
                  <input class='base_input' type="text" value="<?= $produto['altura_produto'] ?>" id='comprimentoProduto' name='comprimentoProduto'>
                </div>
              </div>
            </div>
          </div>
          <div class='editar_produto_form'>
            <div class='editar_produto_text_editor'>
              <div class='editar_produto_form_title'>
                <div class='editar_produto_line'></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="2 2 20 20">
                  <path fill="#247BA0" d="M14 17H7v-2h7m3-2H7v-2h10m0-2H7V7h10m2-4H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2" />
                </svg>
                <h3>
                  Descrição Do Produto
                </h3>
              </div>
              <div class='text_editor_div'>
                <div class="toolbar">
                  <button type="button" data-command="bold" title="Negrito"><b>B</b></button>
                  <button type="button" data-command="underline" title="Sublinhado"><u>U</u></button>
                  <button type="button" data-command="italic" title="Itálico">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/italico_icon.svg">
                  </button>
                  <button type="button" data-command="strike" title="Tachado"><s>S</s></button>
                  <div class="dropdown">
                    <button type="button">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/lista_icon.svg">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_baixo_icon.svg">
                    </button>
                    <div class="dropdown-content" id='dropdown_list'>
                      <button class='dropdown_button' type='button' data-command="bulletList" title="Lista não ordenada">• Lista</button>
                      <button class='dropdown_button' type='button' data-command="orderedList" title="Lista ordenada">1. Lista</button>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button type="button" class='dropdown_button' type="button">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/alinhamento_icon.svg">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_baixo_icon.svg">
                    </button>
                    <div class="dropdown-content">
                      <button type="button" class='dropdown_button' data-command="alignLeft" title="Esquerda">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/alinhamento_esquerda_icon.svg">
                      </button>
                      <button type="button" class='dropdown_button' data-command="alignCenter" title="Centro" style='justify-content: center'>
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/alinhamento_centro_icon.svg">
                      </button>
                      <button type="button" class='dropdown_button' data-command="alignRight" title="Direita" style='transform: scaleX(-1);'>
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/alinhamento_direita_icon.svg">
                      </button>
                      <button type="button" class='dropdown_button' data-command="alignJustify" title="Justificado" style='justify-content: center'>
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/alinhamento_justificado_icon.svg">
                      </button>
                    </div>
                  </div>
                </div>
                <input type="text" id="descricao" name="descricao" hidden>
                <div class="editor-content">
                  
                    <?= $produto['descricao_produto'] ?>
                  
                </div>
              </div>
            </div>
          </div>
          <div class='editar_produto_form' id='promocao_container'>
            <div class='editar_produto_form_title'>
              <div class='editar_produto_line'></div>
              <h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M6.82824 6.82824C8.3901 5.26637 8.3901 2.73326 6.82824 1.1714C5.26637 -0.390466 2.73326 -0.390466 1.1714 1.1714C-0.390466 2.73326 -0.390466 5.26637 1.1714 6.82824C2.73389 8.39073 5.26637 8.39073 6.82824 6.82824ZM22.8281 17.1713C21.2663 15.6094 18.7332 15.6094 17.1713 17.1713C15.6094 18.7332 15.6094 21.2663 17.1713 22.8281C18.7332 24.39 21.2663 24.39 22.8281 22.8281C24.3906 21.2663 24.3906 18.7338 22.8281 17.1713ZM22.7069 2.70701L21.2931 1.29327C20.5119 0.512028 19.2457 0.512028 18.465 1.29327L1.29327 18.465C0.512028 19.2463 0.512028 20.5125 1.29327 21.2931L2.70701 22.7069C3.48826 23.4881 4.7545 23.4881 5.53512 22.7069L22.7069 5.53512C23.4881 4.7545 23.4881 3.48826 22.7069 2.70701Z"
                    fill="#247BA0" />
                </svg>
                Promoção
              </h3>
            </div>
            <div class='toggle_container'>
              <label class="toggle">
                <input <?= (!empty($promocao) && $promocao['ativo_promocao'] != 0 ) ? 'checked' : '' ?> type="checkbox" name="toggle-group" id="toggle-promotion" class='base_input'>
                <span class="toggle_slider"></span>
              </label>
              <label for='toggle-promotion'>Ativar Promoção</label>
            </div>
            <div class='editar_produto_promocao'>
                <h4>Tipos de Promoção</h4>
                <div class='radio_inputs'>
                    <label for="reaisSobreTotal">Reais sobre o Total</label>
                    <input value='1' name='tipoPromocaoProduto' id='reaisSobreTotal' type="radio" 
                          <?= (($promocao['tipo_promocao'] ?? 0) == 1) ? 'checked' : '' ?>>
                </div>
                <div class='radio_inputs'>
                    <label for="porcenSobreProduto">Porcentagem sobre o Total</label>
                    <input value='2' name='tipoPromocaoProduto' id='porcenSobreProduto' type="radio"
                          <?= (($promocao['tipo_promocao'] ?? 0) == 2) ? 'checked' : '' ?>>
                </div>
            </div>
            <div class='editar_produto_small_input'>
              <div class='editar_produto_input'>
                <label for="produtoDescontPromo">Desconto da Promoção</label>
                <div class="input_icon_container">
                  <input class='base_input' type="text" id='produtoDescontPromo' value="<?= $promocao['desconto_promocao'] ?? ''?>" name='produtoDescontPromo'>
                  <div class='input_icon'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path
                        d="M6.82824 6.82824C8.3901 5.26637 8.3901 2.73326 6.82824 1.1714C5.26637 -0.390466 2.73326 -0.390466 1.1714 1.1714C-0.390466 2.73326 -0.390466 5.26637 1.1714 6.82824C2.73389 8.39073 5.26637 8.39073 6.82824 6.82824ZM22.8281 17.1713C21.2663 15.6094 18.7332 15.6094 17.1713 17.1713C15.6094 18.7332 15.6094 21.2663 17.1713 22.8281C18.7332 24.39 21.2663 24.39 22.8281 22.8281C24.3906 21.2663 24.3906 18.7338 22.8281 17.1713ZM22.7069 2.70701L21.2931 1.29327C20.5119 0.512028 19.2457 0.512028 18.465 1.29327L1.29327 18.465C0.512028 19.2463 0.512028 20.5125 1.29327 21.2931L2.70701 22.7069C3.48826 23.4881 4.7545 23.4881 5.53512 22.7069L22.7069 5.53512C23.4881 4.7545 23.4881 3.48826 22.7069 2.70701Z"
                        fill="#247BA0" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            <div class='editar_produto_small_input' id='small_duas_colunas'>
              <div class='editar_produto_input'>
                <label for="promoDataInicio">Data de Início</label>
                <input class='base_input' value="<?= ($promocao['data_inicio_promocao']) ?? '' ?>" type="date" id='promoDataInicio' name='promoDataInicio'>
              </div>
              <div class='editar_produto_input'>
                <label for="promoDataFim">Data de Término</label>
                <input class='base_input' value="<?= ($promocao['data_fim_promocao']) ?? '' ?>" type="date" id='promoDataFim' name='promoDataFim'>
              </div>
              <div class='editar_produto_input'>
                <label for="promoHoraInicio">Horário de Início</label>
                <input class='base_input' value="<?= ($promocao['hora_inicio_promocao']) ?? '' ?>" type="time" id='promoHoraInicio' name='promoHoraInicio'>
              </div>
              <div class='editar_produto_input'>
                <label for="promoHoraFim">Horário de Término</label>
                <input class='base_input' value="<?= ($promocao['hora_fim_promocao']) ?? '' ?>" type="time" id='promoHoraFim' name='promoHoraFim'>
              </div>
            </div>
          </div>
          <div class='editar_produto_form' id='image_container'>
            <div class='editar_produto_form_title'>
              <div class='editar_produto_line'></div>
              <h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M0 3.81814C0 2.01302 1.34531 0.54541 3 0.54541H21C22.6547 0.54541 24 2.01302 24 3.81814V20.1818C24 21.9869 22.6547 23.4545 21 23.4545H3C1.34531 23.4545 0 21.9869 0 20.1818V3.81814ZM15.1781 9.26416C14.9672 8.92666 14.6203 8.72723 14.25 8.72723C13.8797 8.72723 13.5281 8.92666 13.3219 9.26416L9.24375 15.7892L8.00156 14.0965C7.78594 13.8051 7.4625 13.6363 7.125 13.6363C6.7875 13.6363 6.45938 13.8051 6.24844 14.0965L3.24844 18.1875C2.97656 18.5556 2.925 19.0619 3.1125 19.4863C3.3 19.9108 3.69375 20.1818 4.125 20.1818H19.875C20.2922 20.1818 20.6766 19.9312 20.8688 19.5272C21.0609 19.1233 21.0375 18.6375 20.8031 18.2642L15.1781 9.26416ZM5.25 8.72723C5.84674 8.72723 6.41903 8.46863 6.84099 8.00831C7.26295 7.54799 7.5 6.92367 7.5 6.27268C7.5 5.6217 7.26295 4.99737 6.84099 4.53706C6.41903 4.07674 5.84674 3.81814 5.25 3.81814C4.65326 3.81814 4.08097 4.07674 3.65901 4.53706C3.23705 4.99737 3 5.6217 3 6.27268C3 6.92367 3.23705 7.54799 3.65901 8.00831C4.08097 8.46863 4.65326 8.72723 5.25 8.72723Z" fill="#247BA0" />
                </svg>
                Imagens
              </h3>
            </div>
            <div class="registro_produto_imagens"></div>
            <div class="contador">
              <span id="contador-total">0</span>
              <span id="contador-restante"> / 1</span>
            </div>
            <button class="base_botao btn_blue" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 15.7496C12.1993 15.7496 12.39 15.6706 12.5307 15.5299C12.6713 15.3893 12.7504 15.1985 12.7504 14.9996V4.02658L14.4304 5.98758C14.5598 6.13875 14.744 6.23232 14.9424 6.2477C15.1408 6.26308 15.3372 6.19901 15.4884 6.06958C15.6395 5.94016 15.7331 5.75598 15.7485 5.55756C15.7639 5.35915 15.6998 5.16275 15.5704 5.01158L12.5704 1.51158C12.5 1.42925 12.4125 1.36314 12.3141 1.31782C12.2157 1.27249 12.1087 1.24902 12.0004 1.24902C11.892 1.24902 11.785 1.27249 11.6866 1.31782C11.5882 1.36314 11.5008 1.42925 11.4304 1.51158L8.43036 5.01158C8.36628 5.08643 8.31756 5.17318 8.287 5.26686C8.25644 5.36054 8.24463 5.45932 8.25224 5.55756C8.25986 5.65581 8.28675 5.75159 8.33138 5.83944C8.37601 5.9273 8.43751 6.0055 8.51236 6.06958C8.58722 6.13367 8.67396 6.18238 8.76764 6.21294C8.86132 6.2435 8.9601 6.25531 9.05835 6.2477C9.15659 6.24009 9.25237 6.2132 9.34022 6.16856C9.42808 6.12393 9.50628 6.06243 9.57036 5.98758L11.2504 4.02758V14.9996C11.2504 15.4136 11.5864 15.7496 12.0004 15.7496Z" fill="#F9F9FC" />
                <path d="M16 9C15.298 9 14.947 9 14.694 9.169C14.5852 9.24179 14.4918 9.33522 14.419 9.444C14.25 9.697 14.25 10.048 14.25 10.75V15C14.25 15.5967 14.0129 16.169 13.591 16.591C13.169 17.0129 12.5967 17.25 12 17.25C11.4033 17.25 10.831 17.0129 10.409 16.591C9.98705 16.169 9.75 15.5967 9.75 15V10.75C9.75 10.048 9.75 9.697 9.581 9.444C9.50821 9.33522 9.41478 9.24179 9.306 9.169C9.053 9 8.702 9 8 9C5.172 9 3.757 9 2.879 9.879C2 10.757 2 12.17 2 14.999V15.999C2 18.829 2 20.242 2.879 21.121C3.757 22 5.172 22 8 22H16C18.828 22 20.243 22 21.121 21.121C21.999 20.242 22 18.828 22 16V15C22 12.171 22 10.757 21.121 9.879C20.243 9 18.828 9 16 9Z" fill="#F9F9FC" />
              </svg>
              ENVIAR ARQUIVO
              <input type="file" id="input-file" accept="image/*" multiple>
            </button>
            <h4 id='info-image'>
              O tamanho do arquivo não pode ultrapassar 2mb
            </h4>
            <div class="input-url-container">
              <span class="dropdown" id='input_url'>
                adicionar link URL
                <div class="dropdown-content">
                  <input class='base_input' type="text" id="input-url" placeholder="Insira a URL da imagem">
                  <button type='button' onclick="adicionarImagemPorURL()">Adicionar</button>
                </div>
              </span>
            </div>
          </div>
          <div class='editar_produto_form_buttons'>
            <input type="hidden" id="produto-imagens" name="produto_imagens">
            <input type="hidden" name="imagens_remover" id="imagens-remover" value="">
            <input type="hidden" name="cod_atual" value="<?= $produto['cod_produto'] ?>">
            <input type="hidden" name="statusProdutoInput" id="statusProdutoInput" value="<?= $produto['status_produto'] ?>">
            <button type='button' class="base_botao <?= $produto['status_produto'] ? 'btn_red' : 'btn_sappire' ?>" onclick="alterarStatusProduto(<?= $produto['id_produto'] ?>, <?= $produto['status_produto'] ? '0' : '1' ?>)" id='statusProduto'>
              <?php if ($produto['status_produto']): ?>
                  <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/x_branco_icon.svg">
              <?php else: ?>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
              <?php endif; ?>
              <?= $produto['status_produto'] ? 'INATIVAR PRODUTO' : 'ATIVAR PRODUTO' ?>
            </button>
            <a class='a_button' href="GerenciarProdutos">
                <button class="base_botao btn_outline_red" type='button'>
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                  <path d="M9.5 0C4.523 0 0.5 4.023 0.5 9C0.5 13.977 4.523 18 9.5 18C14.477 18 18.5 13.977 18.5 9C18.5 4.023 14.477 0 9.5 0ZM13.37 12.87C13.2867 12.9534 13.1878 13.0196 13.079 13.0648C12.9701 13.11 12.8534 13.1332 12.7355 13.1332C12.6176 13.1332 12.5009 13.11 12.392 13.0648C12.2832 13.0196 12.1843 12.9534 12.101 12.87L9.5 10.269L6.899 12.87C6.73072 13.0383 6.50248 13.1328 6.2645 13.1328C6.02652 13.1328 5.79828 13.0383 5.63 12.87C5.46172 12.7017 5.36718 12.4735 5.36718 12.2355C5.36718 12.1177 5.39039 12.001 5.43549 11.8921C5.48058 11.7832 5.54668 11.6843 5.63 11.601L8.231 9L5.63 6.399C5.46172 6.23072 5.36718 6.00248 5.36718 5.7645C5.36718 5.52652 5.46172 5.29828 5.63 5.13C5.79828 4.96172 6.02652 4.86718 6.2645 4.86718C6.50248 4.86718 6.73072 4.96172 6.899 5.13L9.5 7.731L12.101 5.13C12.1843 5.04668 12.2832 4.98058 12.3921 4.93549C12.501 4.89039 12.6177 4.86718 12.7355 4.86718C12.8533 4.86718 12.97 4.89039 13.0789 4.93549C13.1878 4.98058 13.2867 5.04668 13.37 5.13C13.4533 5.21332 13.5194 5.31224 13.5645 5.42111C13.6096 5.52998 13.6328 5.64666 13.6328 5.7645C13.6328 5.88234 13.6096 5.99902 13.5645 6.10789C13.5194 6.21676 13.4533 6.31568 13.37 6.399L10.769 9L13.37 11.601C13.712 11.943 13.712 12.519 13.37 12.87Z" fill="#D73232" />
                </svg>
                CANCELAR
              </button>
            </a>
            
            <button type='submit ' class="base_botao btn_blue">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3333 9.16667C18.3333 14.2294 14.2294 18.3333 9.16667 18.3333C4.10392 18.3333 0 14.2294 0 9.16667C0 4.10392 4.10392 0 9.16667 0C14.2294 0 18.3333 4.10392 18.3333 9.16667ZM13.5795 6.94925C13.6494 6.85126 13.6994 6.74046 13.7265 6.62316C13.7536 6.50587 13.7574 6.38438 13.7375 6.26564C13.7177 6.1469 13.6747 6.03322 13.6109 5.93111C13.5472 5.82899 13.4639 5.74044 13.3659 5.6705C13.2679 5.60056 13.1571 5.55061 13.0398 5.52349C12.9225 5.49637 12.8011 5.49262 12.6823 5.51245C12.5636 5.53229 12.4499 5.57531 12.3478 5.63908C12.2457 5.70284 12.1571 5.7861 12.0872 5.88408L8.13267 11.4207L6.14808 9.43525C5.9752 9.26827 5.74365 9.17588 5.5033 9.17797C5.26295 9.18005 5.03304 9.27646 4.86308 9.44642C4.69313 9.61637 4.59672 9.84629 4.59463 10.0866C4.59254 10.327 4.68494 10.5585 4.85192 10.7314L7.60192 13.4814C7.69606 13.5754 7.80953 13.6478 7.93445 13.6935C8.05937 13.7393 8.19275 13.7573 8.32533 13.7463C8.4579 13.7353 8.5865 13.6956 8.70218 13.6299C8.81787 13.5642 8.91787 13.4741 8.99525 13.3659L13.5795 6.94925Z" fill="white" />
              </svg>
              SALVAR
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <script>

    const imagensExistentes = <?= json_encode($imagensExistentes) ?>;
    document.addEventListener('DOMContentLoaded', () => {
      renderImagens(imagensExistentes);

      <?php if (!empty($_SESSION['errors'])): ?>
        gerarToast(<?= json_encode($_SESSION['errors']) ?>, "erro");
        <?php unset($_SESSION['errors']); ?>
      <?php endif; ?>

      <?php if (!empty($_SESSION['successMessage'])): ?>
        gerarToast(<?= json_encode($_SESSION['successMessage']) ?>, "sucesso");
        <?php unset($_SESSION['successMessage']); ?>
      <?php endif; ?>
    });

    document.querySelector('form').addEventListener('submit', function(e) {
      coletarImagensParaEnvio();
    });
  </script>


  <script src="<?=$PATH_PUBLIC?>/js/vendedor/ImgInput.js"></script>
  <script type="module" src="<?=$PATH_PUBLIC?>/js/vendedor/TextEditor.js"></script>
  <script type="module" src="<?=$PATH_PUBLIC?>/js/vendedor/selectCats.js"></script>
  <script src="<?=$PATH_PUBLIC?>/js/vendedor/PromocaoToggle.js"></script>
  <script src="<?=$PATH_PUBLIC?>/js/vendedor/alterStatus.js"></script>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/toast.js"></script>
</body>

</html>