
<!DOCTYPE html>
<html lang="pt-br">
<?php
  $css = ["/css/cliente/carrinho_vazio.css"];
  $js = ["/js/cliente/carrinho.js"];
  require_once("../../../utils/head.php");
  include_once("$PATH_COMPONENTS/php/produto_carrinho.php");
?>
<body class="carrinho_vazio_body">
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main class="carrinho_vazio_main">
    <div class="carrinho_vazio_nav">
      <div class="carrinho_vazio_nav_item carrinho_vazio_nav_selected">
        <img src="<?=$PATH_PUBLIC?>/image/carrinho/carrinho.svg">
        <span>Carrinho</span>
      </div>
      <hr class="carrinho_vazio_divisoria">
      <div class="carrinho_vazio_nav_item">
        <img src="<?=$PATH_PUBLIC?>/image/carrinho/identificacao.svg">
        <span>Identificação</span>
      </div>
      <hr class="carrinho_vazio_divisoria">
      <div class="carrinho_vazio_nav_item">
        <img src="<?=$PATH_PUBLIC?>/image/carrinho/pagamento.svg">
        <span>Pagamento</span>
      </div>
    </div>
    <div class="carrinho_vazio_conteudo">
      <div class="carrinho_vazio_conteudo_holder">
        <div class="carrinho_vazio_main_holder">
          <div>
            <div class="carrinho_vazio_text_info">
              <h2>Produto</h2>
              <h2>Quantidade</h2>
            </div>
            <hr class="carrinho_vazio_divisoria_quadrado">
          </div>
          <div class="carrinho_vazio_main_content">
            <div class="carrinho_vazio_conteudo_items ">
              <?php exibirProdutos()?>
            </div>
            <div class="carrinho_vazio_conteudo_servicos">
              <div class="carrinho_vazio_servicos_text">
                <img src="<?=$PATH_PUBLIC?>/image/carrinho/servico.svg" class="servico_icon">
                <p class="font_subtitulo font_celadon">SERVIÇOS</p>
              </div>
              <div class="subtotal_container_text">
                <img src="<?=$PATH_PUBLIC?>/image/carrinho/seta.svg" class="seta">
                <p class="font_descricao font_celadon font_bold">Subtotal serviços: R$ 00,00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carrinho_vazio_resumo_holder">
          <div>
            <div class="carrinho_vazio_text_info carrinho_vazio_text_resumo">
              <h2>Resumo</h2>
            </div>
            <hr class="carrinho_vazio_divisoria_quadrado">
          </div>
          <div class="carrinho_vazio_resumo <?php ?>">
            <?php exibirResumo(); ?>
          </div>
        </div>
      </div>
      <div class="carrinho_vazio_botoes_holder">
        <button class="carrinho_vazio_start base_botao btn_outline_blue" onclick="history.back()">
          <img src="<?=$PATH_PUBLIC?>/image\geral\botoes\seta_esquerda_carolina_icon.svg">
          VOLTAR
        </button>
        <div class="carrinho_vazio_holder_final">
          <button id="carrinhoVazioRemoverTudo" class="base_botao btn_red">
            <img src="<?=$PATH_PUBLIC?>/image\geral\botoes\x_branco_icon.svg">
            REMOVER TUDO
          </button>

          <button class="base_botao btn_blue" onclick="pag('cliente/carrinho_dados')">
            <img src="<?=$PATH_PUBLIC?>/image\geral\botoes\v_branco_icon.svg">
            SALVAR
          </button>
        </div>
      </div>
    </div>
  </main>


</body>


</html>