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
      echo substr($ids[$i], 3);
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

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/cliente/carrinho_vazio.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="../../js/geral/base.js"></script>
  <script src="../../js/cliente/carrinho.js"></script>
  
</head>

<body class="carrinho_vazio_body">
  <?php
  include_once('../../pages/geral/navbar.php');
  ?>
  <main class="carrinho_vazio_main">
    <div class="carrinho_vazio_nav">
      <div class="carrinho_vazio_nav_item carrinho_vazio_nav_selected">
        <img src="../../image/carrinho/carrinho.svg">
        <span>Carrinho</span>
      </div>
      <hr class="carrinho_vazio_divisoria">
      <div class="carrinho_vazio_nav_item">
        <img src="../../image/carrinho/identificacao.svg">
        <span>Identificação</span>
      </div>
      <hr class="carrinho_vazio_divisoria">
      <div class="carrinho_vazio_nav_item">
        <img src="../../image/carrinho/conclusao.svg">
        <span>Conclusão</span>
      </div>
      <hr class="carrinho_vazio_divisoria">
      <div class="carrinho_vazio_nav_item">
        <img src="../../image/carrinho/confirmacao.svg">
        <span>Confirmação</span>
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
          <!-- carrinho_vazio_sem_itens -->
            <div class="carrinho_vazio_conteudo_items ">
              <div class="carrinho_vazio_product_card">
                <div class="product-container">
                  <div class="seller-info">
                    Vendido e entregue por: <span class="seller-name">E ao Quadrado</span> | <span class="stock-status">Em estoque</span>
                  </div>

                  <div class="carrinho_vazio_detalhes_holder">
                    <div class="carrinho_vazio_image_holder">
                      <img src="https://placehold.co/200" alt="Cadeira gamer throne RGB" class="product-image">
                      <!-- Product details -->
                      <div class="product-details">
                        <p class="manufacturer">Fabricante: Grapol</p>
                        <h3 class="product-name font_celadon">Cadeira gamer throne - RGB</h3>
                        <div class="font_descricao">
                          <p>À vista no PIX com até 10% OFF</p>
                          <p class="font_descricao font_bold font_cinza">
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
                        <p id="carrinhoVazioPrecoTotal" class="font_base font_bold font_cinza carrinho_vazio_self_left">R$1400,00</p>
                        <p id="carrinhoVazioPrecoBase" class="font_descricao font_cinza carrinho_vazio_self_left">R$1400,00 unid.</p>
                        <button class="remove-btn">
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
              <?php //exibirProdutos()
              ?>
            </div>
            <div class="carrinho_vazio_conteudo_servicos">
              <div class="carrinho_vazio_servicos_text">
                <img src="../../image/carrinho/servico.svg" class="servico_icon">
                <p class="font_subtitulo font_celadon">SERVIÇOS</p>
              </div>
              <div class="subtotal_container_text">
                <img src="../../image/carrinho/seta.svg" class="seta">
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
        <button class="base_botao btn_outline_blue"><img src="../../image/geral/seta_botao.svg">VOLTAR</button>
        <button class="base_botao btn_red"><img src="../../image/geral/x_botao.svg">REMOVER TUDO</button>
        <button class="base_botao btn_blue"><img src="../../image/geral/confirm_botao.svg">SALVAR</button>
      </div>
    </div>
  </main>
  
</body>

</html>