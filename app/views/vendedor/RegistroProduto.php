<!-- FINALIZADO -->
<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Cadastrar Produto- E ao Quadrado";
$css = ["/css/vendedor/registro_produto.css"];
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
        <form action="CadastroProduto" method="post" class='registro_produto_form_grid'>
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
                  <input class='base_input' type="number" id='codigoProduto' name='codigoProduto'>
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
              <div class='base_input_select'>
                <label for="categoriaProduto">Categoria</label>
                <select class='base_input' id='categoriaProduto' name='categoriaProduto'>
                  <option value="" disabled selected>Selecione</option>
                  <option value="1">Categoria 1</option>
              </select>
              </div>

              <div class='base_input_select'>
                <label for="categoriaProduto">Sub-Categoria</label>
                <select class='base_input' id='subCategoriaProduto' name='subCategoriaProduto'>
                    <option value="" disabled selected>Selecione</option>
                    <option value="1">Sub-Categoria 1</option>
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
                  <label for="pesoLiquidoProduto">Peso Líquido</label>
                  <input class='base_input' type="number" id='pesoLiquidoProduto' name='pesoProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="pesoBrutoProduto">Peso Bruto</label>
                  <input class='base_input' type="text" id='pesoBrutoProduto' name='pesoBrutoProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="larguraProduto">Largura</label>
                  <input class='base_input' type="text" id='larguraProduto' name='larguraProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="alturaProduto">Altura</label>
                  <input class='base_input' type="text" id='alturaProduto' name='alturaProduto'>
                </div>
                <div class='registro_produto_input'>
                  <label for="comprimentoProduto">Comprimento</label>
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
                  <button onclick="toolbarButton(e)" data-command="bold" title="Negrito"><b>B</b></button>
                  <button onclick="toolbarButton(e)" data-command="underline" title="Sublinhado"><u>U</u></button>
                  <button onclick="toolbarButton(e)" data-command="italic" title="Itálico">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/italico_icon.svg">
                  </button>
                  <button onclick="toolbarButton(e)" data-command="strike" title="Tachado"><s>S</s></button>
                  <div class="dropdown">
                    <button type="button" onclick="toolbarButton(e)">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/lista_icon.svg">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_baixo_icon.svg">
                    </button>
                    <div class="dropdown-content" id='dropdown_list'>
                      <button class='dropdown_button' onclick="toolbarButton(e)" data-command="bulletList" title="Lista não ordenada">• Lista</button>
                      <button class='dropdown_button' onclick="toolbarButton(e)" data-command="orderedList" title="Lista ordenada">1. Lista</button>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class='dropdown_button' onclick="toolbarButton(e)" type="button">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/alinhamento_icon.svg">
                      <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_baixo_icon.svg">
                    </button>
                    <div class="dropdown-content">
                      <button class='dropdown_button' onclick="toolbarButton(e)" data-command="alignLeft" title="Esquerda">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/alinhamento_esquerda_icon.svg">
                      </button>
                      <button class='dropdown_button' onclick="toolbarButton(e)" data-command="alignCenter" title="Centro" style='justify-content: center'>
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/alinhamento_centro_icon.svg">
                      </button>
                      <button class='dropdown_button' onclick="toolbarButton(e)" data-command="alignRight" title="Direita" style='transform: scaleX(-1);'>
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/alinhamento_direita_icon.svg">
                      </button>
                      <button class='dropdown_button' onclick="toolbarButton(e)" data-command="alignJustify" title="Justificado" style='justify-content: center'>
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
                <input name='tipoPromocaoProduto' id='reaisSobreTotal' type="radio" checked>
              </div>
              <div class='radio_inputs'>
                <label for="reaisSobreFrete">Reais sobre o Frete</label>
                <input name='tipoPromocaoProduto' id='reaisSobreFrete' type="radio">
              </div>
              <div class='radio_inputs'>
                <label for="porcenSobreProduto">Porcentagem sobre o Total</label>
                <input name='tipoPromocaoProduto' id='porcenSobreProduto' type="radio">
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
          <div class='registro_produto_form' id='image_container'>
            <div class='registro_produto_form_title'>
              <div class='registro_produto_line'></div>
              <h3>
                <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/imagem_icon.svg">
                Imagens e Vídeos
              </h3>
            </div>
            <div class="registro_produto_imagens"></div>
            <div class="contador">
              <span id="contador-total">0</span>
              <span id="contador-restante"> / 1</span>
            </div>
            <button class="base_botao btn_blue" name="produtoImagem">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/arquivo_icon.svg">
              ENVIAR ARQUIVO
              <input type="file" id="input-file" name="produtoImagem" accept="image/*" multiple>
            </button>
            <h4 id='info-image'>
              O tamanho do arquivo não pode ultrapassar 2mb
            </h4>
            <div class="input-url-container">
              <span class="dropdown" id='input_url'>
                adicionar link URL
                <div class="dropdown-content">
                  <input class='base_input' type="text" id="input-url" placeholder="Insira a URL da imagem">
                  <button onclick="adicionarImagemPorURL()">Adicionar</button>
                </div>
              </span>
            </div>
          </div>
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
  <script type="module" src="<?=$PATH_COMPONENTS?>/js/toast.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      <?php if (!empty($errors)): ?>
        <?php foreach($errors as $e): ?>
          gerarToast("<?= addslashes($e) ?>", "erro");
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($_SESSION['successMessage'])): ?>
        gerarToast("<?= addslashes($_SESSION['successMessage']) ?>", "sucesso");
        <?php unset($_SESSION['successMessage']); ?>
      <?php endif; ?>
      
    });
  </script>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <script src="./public/js/vendedor/img_input.js"></script>
  <script type="module" src="./public/js/vendedor/text_editor.js"></script>
  <script src="./public/js/vendedor/promocao_toggle.js"></script>
</body>

</html>