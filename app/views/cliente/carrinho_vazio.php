<?php

function existeSearchParams()
{
  $params = $_SERVER['QUERY_STRING'];
  return $params != '';
}

function exibirResumo()
{

  if (existeSearchParams()) {
    $params = $_SERVER['QUERY_STRING'];
    $ids = explode('&', $params);

    foreach ($ids as $id) {
      echo $id . '<br>';
    }
  } else {
    echo '<span class="font_descricao font_celadon carrinho_vazio_sem_itens">Nenhuma informação para exibir</span>';
  }
}

function exibirProdutos()
{
  if (existeSearchParams()) {
    $params = $_SERVER['QUERY_STRING'];
    $ids = explode('&', $params);

    $quant_produto = 0;
    for ($i = 0; $i < count($ids); $i++) {
      if (substr($ids[$i], 0, 3) != 'id=') {
        return;
      }

      $quant_produto += 1;
      echo '
          <div class="carrinho_vazio_product_card">
          <div class="product-container">
            <div class="seller-info">
              Vendido e entregue por: <span class="seller-name">E ao Quadrado</span> | <span class="stock-status">Em estoque</span>
            </div>

            <div class="carrinho_vazio_detalhes_holder">
              <div class="carrinho_vazio_image_holder">
                <img src="../../image/cliente/produto/cadeira_gamer_size_big.png" alt="Cadeira gamer throne RGB" class="product-image">
                <!-- Product details -->
                <div class="product-details">
                  <p class="font_descricao font_cinza carrinho_vazio_bold">Fabricante: Grapol</p>
                  <h2 class=" font_celadon carrinho_vazio_bold">Cadeira gamer throne - RGB</h2>
                  <div class="font_descricao font_cinza">
                    <p>À vista no PIX com até 10% OFF</p>
                    <p class="font_descricao font_cinza">
                      R$ 1400,00 Em até 10x de R$ 140,00 sem juros no cartão Ou em 1x no cartão com até 5% OFF
                    </p>
                  </div>
                </div>
              </div>
              <!-- Quantity and price -->
              <div class="quantity-price">
                <!-- Quantity controls -->
                <div class="quantity-container">
                  <div class="quantity-controls">
                    <button id="carrinhoVazioBotaoDiminuir" class="base_botao btn_outline_blue quantity-btn">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                      </svg>
                    </button>
                    <span id="quantidadeCarrinho">1</span>
                    <button id="carrinhoVazioBotaoAumentar" class="base_botao btn_outline_blue quantity-btn">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                      </svg>
                    </button>
                  </div>
                </div>

                <!-- Price -->
                <div class="price-container">
                  <p id="carrinhoVazioPrecoTotal" class="font_base font_bold font_cinza carrinho_vazio_self_right">R$1400,00</p>
                  <p id="carrinhoVazioPrecoBase" class="font_descricao font_cinza carrinho_vazio_self_right">R$1400,00 unid.</p>
                  <button id="carrinhoVazioRemoverItem" class="remove-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                  </button>
                </div>
            </div>
            <!-- Product image -->
            
            </div>
          </div>
        </div>
      ';
    }

    if ($quant_produto == 0) {
      echo '<h1 class="items_vazio">NENHUM ITEM NO CARRINHO</h1>';
    }
  } else {
    echo '<h1 class="items_vazio">NENHUM ITEM NO CARRINHO</h1>';
  }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<?php
  $css = ["/css/cliente/carrinho_vazio.css"];
  require_once("../../../utils/head.php")
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