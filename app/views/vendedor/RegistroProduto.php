<!-- FINALIZADO -->
<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Cadastrar Produto- E ao Quadrado";
$css = ["/css/vendedor/RegistroProduto.css", "/css/vendedor/EditarProduto.css"];
require_once('./utils/head.php');

?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <div class='registro_produto_main'>
      <div class='registro_produto_title'>
        <h2>
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lapis_icon.svg">
          FICHA TECNICA
        </h2>
        <hr class="registro_produto_linha_titulo">
      </div>
      <div class='registro_produto_container'>
        <form action="ProdutoRegistro" id='form-produto' method="post" class='registro_produto_form_grid'>
          <div class='registro_produto_form'>
            <div class='registro_produto_form_title'>
              <div class='registro_produto_line'></div>
              <h3>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/informacao_icon.svg">
                Informações do Produto
              </h3>
            </div>
            <div class='registro_produto_form_input'>
              <div class='registro_produto_input'>
                <label for="nomeProduto">Nome do Produto</label>
                <input class='base_input' type="text" id='nomeProduto' name='nomeProduto'>
              </div>
              <div class='registro_produto_small_input'>
                <div class='registro_produto_input'>
                  <label for="valorProduto">Valor</label>
                  <input class='base_input' type="number" id='valorProduto' name='valorProduto'>
                </div>
              </div>
              <div class='registro_produto_input'>
                <label for="marcaProduto">Marca</label>
                <input class='base_input' type="text" id='marcaProduto' name='marcaProduto'>
              </div>
              <div class='registro_produto_small_input'>
                <div class='registro_produto_input'>
                  <label for="codigoProduto">Código</label>
                  <input value='<?= $proxCod ?>' class='base_input' type="number" id='codigoProduto' name='codigoProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="estoqueProduto">Estoque</label>
                  <input class='base_input' type="number" id='estoqueProduto' name='estoqueProduto'>
                </div>
              </div>
              <div class='registro_produto_small_input'>
                <div class='registro_produto_input'>
                  <label for="origemProduto">Origem</label>
                  <input class='base_input' type="text" id='origemProduto' name='origemProduto'>
                </div>
              </div>
              <div class="base_input_select">
                <label for="categoriaProduto">Categoria</label>
                <select
                  class="base_input" id="categoriaProduto" name="categoriaProduto">
                  <option value=""selected disabled>Selecione</option>
                </select>
              </div>

              <div class="base_input_select">
                <label for="subCategoriaProduto">Sub-Categoria</label>
                <select class="base_input" id="subCategoriaProduto" name="subCategoriaProduto">
                  <option value="" disabled selected>Selecione</option>
                </select>
              </div>

            </div>
          </div>
          <div class='registro_produto_form'>
            <div class='registro_produto_form_title'>
              <div class='registro_produto_line'></div>
              <h3>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/regua_icon.svg">
                Dimensões E Peso
              </h3>
            </div>
            <div class='registro_produto_form_input'>
              <div class='registro_produto_small_input'>
                <div class='registro_produto_input'>
                  <label for="pesoLiquidoProduto">Peso Líquido(g)</label>
                  <input class='base_input' type="number" id='pesoLiquidoProduto' name='pesoProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="pesoBrutoProduto">Peso Bruto(g)</label>
                  <input class='base_input' type="text" id='pesoBrutoProduto' name='pesoBrutoProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="larguraProduto">Largura(cm)</label>
                  <input class='base_input' type="text" id='larguraProduto' name='larguraProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="alturaProduto">Altura(cm)</label>
                  <input class='base_input' type="text" id='alturaProduto' name='alturaProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="comprimentoProduto">Comprimento(cm)</label>
                  <input class='base_input' type="text" id='comprimentoProduto' name='comprimentoProduto'>
                </div>
              </div>
            </div>
          </div>
          <div class='registro_produto_form'>
            <div class='registro_produto_text_editor'>
              <div class='registro_produto_form_title'>
                <div class='registro_produto_line'></div>
                <h3>
                  <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/descr_icon.svg">
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
                <div class="editor-content"></div>
              </div>
            </div>
          </div>
          <div class='registro_produto_form' id='promocao_container'>
            <div class='registro_produto_form_title'>
              <div class='registro_produto_line'></div>
              <h3>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/ticket_icon.svg">
                Promoção
              </h3>
            </div>
            <div class='toggle_container'>
              <label class="toggle">
                <input type="checkbox" name="toggle-group" id="toggle-promotion" class='base_input'>
                <span class="toggle_slider"></span>
              </label>
              <label for='toggle-promotion'>Ativar Promoção</label>
            </div>


            <div class='registro_produto_promocao'>
              <h4>Tipos de Promoção</h4>
              <div class='radio_inputs'>
                <label for="reaisSobreTotal">Reais sobre o Total</label>
                <input value="1" name='tipoPromocaoProduto' id='reaisSobreTotal' type="radio" checked>
              </div>
              <div class='radio_inputs'>
                <label for="porcenSobreProduto">Porcentagem sobre o Total</label>
                <input value="2" name='tipoPromocaoProduto' id='porcenSobreProduto' type="radio">
              </div>
            </div>
            <div class='registro_produto_small_input'>
              <div class='registro_produto_input'>
                <label for="produtoDescontPromo">Desconto da Promoção</label>
                <div class="input_icon_container">
                  <input class='base_input' type="text" id='produtoDescontPromo' name='produtoDescontPromo'>
                  <div class='input_icon'>
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/porcentagem_icon.svg">
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            <div class='registro_produto_small_input' id='small_duas_colunas'>
              <div class='registro_produto_input'>
                <label for="promoDataInicio">Data de Início</label>
                <input class='base_input' type="date" id='promoDataInicio' name='promoDataInicio'>
              </div>
              <div class='registro_produto_input'>
                <label for="promoDataFim">Data de Término</label>
                <input class='base_input' type="date" id='promoDataFim' name='promoDataFim'>
              </div>
              <div class='registro_produto_input'>
                <label for="promoHoraInicio">Horário de Início</label>
                <input class='base_input' type="time" id='promoHoraInicio' name='promoHoraInicio'>
              </div>
              <div class='registro_produto_input'>
                <label for="promoHoraFim">Horário de Término</label>
                <input class='base_input' type="time" id='promoHoraFim' name='promoHoraFim'>
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
          
          <input type="hidden" id="produto_imagens" name="produto_imagens"/>
          <input type="hidden" id="imagens_remover"  name="imagens_remover"/>

          <div class='registro_produto_form_buttons'>
            <button class="base_botao btn_outline_red" type='reset'>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/x_vermelho_icon.svg">
              CANCELAR
            </button>
            <button type='submit ' class="base_botao btn_blue">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/salvar_icon.svg">
              SALVAR
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/toast.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const imagensExistentes = [];
      <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $e): ?>
          gerarToast("<?= addslashes($e) ?>", "erro");
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($_SESSION['successMessage'])): ?>
        gerarToast("<?= addslashes($_SESSION['successMessage']) ?>", "sucesso");
        <?php unset($_SESSION['successMessage']); ?>
      <?php endif; ?>

    });

    document.querySelector('form').addEventListener('submit', function(e) {
      coletarImagensParaEnvio();
    });
  </script>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <script src="./public/js/vendedor/ImgInput.js"></script>
  <script type="module" src="./public/js/vendedor/TextEditor.js"></script>
  <script src="./public/js/vendedor/PromocaoToggle.js"></script>
  <script type="module" src="<?=$PATH_PUBLIC?>/js/vendedor/selectCats.js"></script>

</body>

</html>