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

function exibirProdutos(){
  global $PATH_PUBLIC;
  if (existeSearchParams()) {
    $params = $_SERVER['QUERY_STRING'];
    $ids = explode('&', $params);

    $quant_produto = 0;
    for ($i = 0; $i < count($ids); $i++) {
      if (substr($ids[$i], 0, 3) != 'id=') {
        return;
      }

      $quant_produto += 1;
      echo <<<HTML
        <div class="carrinho_vazio_product_card">
          <div class="product-container">
            <div class="seller-info">
              Vendido e entregue por: <span class="seller-name">E ao Quadrado</span> | <span class="stock-status">Em estoque</span>
            </div>

            <div class="carrinho_vazio_detalhes_holder">
              <div class="carrinho_vazio_image_holder">
                <img src="{$PATH_PUBLIC}/image/cliente/produto/cadeira_gamer_size_big.png" alt="Cadeira gamer throne RGB" class="product-image">
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
            </div>
          </div>
        </div>
      HTML;
    }

    if ($quant_produto == 0) {
      echo '<h1 class="items_vazio">NENHUM ITEM NO CARRINHO</h1>';
    }
  } else {
    echo '<h1 class="items_vazio">NENHUM ITEM NO CARRINHO</h1>';
  }
}
