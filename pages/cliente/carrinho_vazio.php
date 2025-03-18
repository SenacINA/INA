<?php 

  function existeSearchParams(){
    $params = $_SERVER['QUERY_STRING'];
    return $params != '';
  }

  function exibirResumo(){

    if(existeSearchParams()){
      $params = $_SERVER['QUERY_STRING'];
      $ids = explode('&', $params);

      foreach( $ids as $id){
        echo $id . '<br>';
      }
    }else{
      echo '<span class="font_descricao font_celadon carrinho_vazio_sem_itens">Nenhuma informação para exibir</span>';
    }
  }

  function exibirProdutos(){
    if(existeSearchParams()){
      $params = $_SERVER['QUERY_STRING'];
      $ids = explode('&', $params);

      $quant_produto = 0;
      for ($i=0; $i < count($ids) ; $i++) { 
        if(substr($ids[$i], 0, 3) != 'id='){
          return;
        }

        $quant_produto += 1;
        echo substr($ids[$i], 3);
      }

      if($quant_produto == 0){
        echo '<h1 class="items_vazio">NENHUM ITEM NO CARRINHO</h1>';
      }
    }else{
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
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
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
            <div class="carrinho_vazio_conteudo_items carrinho_vazio_sem_itens">
              
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
            <?php exibirResumo();?>
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