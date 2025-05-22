<!DOCTYPE html>
<html lang="pt-br">
<?php
$css = ["/css/cliente/carrinho_vazio.css"];
$js = ["/js/cliente/carrinho.js"];
require_once("./utils/head.php");

// Verifica se o carrinho existe na sessão
if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = [];  // Cria o carrinho vazio se não existir
}

// Pega os itens do carrinho e o total
$itensCarrinho = $_SESSION['carrinho'];
$totalCarrinho = 0;

// Calcula o total do carrinho
foreach ($itensCarrinho as $item) {
  $totalCarrinho += $item['preco'] * $item['quantidade'];
}
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="carrinho_vazio_nav">
      <div class="carrinho_vazio_nav_item carrinho_vazio_nav_selected">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/carrinho_icon.svg">
        <span>Carrinho</span>
      </div>
      <hr>
      <div class="carrinho_vazio_nav_item">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/identificacao_cinza_icon.svg">
        <span>Identificação</span>
      </div>
      <hr>
      <div class="carrinho_vazio_nav_item">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/pagamento_cinza_icon.svg">
        <span>Pagamento</span>
      </div>
    </div>

    <div class="carrinho_vazio_conteudo">
      <div class="carrinho_vazio_conteudo_holder">
        <div class="carrinho_vazio_main_holder">
          <div>
            <div class="carrinho_vazio_text_info">
              <h2>Produto</h2>
              <h2 class="quantidade_text">Quantidade</h2>
            </div>
            <hr class="carrinho_vazio_divisoria_quadrado">
          </div>

          <div class="carrinho_vazio_main_content">
            <div class="carrinho_vazio_conteudo_items">
              <?php if (empty($itensCarrinho)): ?>
                <p>Seu carrinho está vazio.</p>
              <?php else: ?>
                <?php foreach ($itensCarrinho as $item): ?>
                  <div class="produto_item">
                    <img src="<?= $item['imagem'] ?>" alt="<?= $item['nome'] ?>">
                    <span><?= $item['nome'] ?></span>
                    <span><?= $item['quantidade'] ?></span>
                    <span><?= number_format($item['preco'], 2, ',', '.') ?></span>
                  </div>
                <?php endforeach; ?>
                <p>Total: R$ <?= number_format($totalCarrinho, 2, ',', '.') ?></p>
              <?php endif; ?>
            </div>

            <div class="carrinho_vazio_conteudo_servicos">
              <div class="servicos_container_1">
                <div class="text_servicos">
                  <img src="<?= $PATH_PUBLIC ?>/image/carrinho/servico.svg" class="base_icon">
                  <p class="font_subtitulo font_celadon">FRETE</p>
                </div>

                <button id="btn_mostrar_servicos" class="btn_mostrar_servicos">
                  <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_baixo.svg" class="base_icon">
                </button>

                <div id="frete_container_1" class="frete_container_1 visible_servicos">
                  <div class="consultar_frete">
                    <h1>CONSULTAR FRETE</h1>
                    <div class="consultar_input">
                      <input class="base_input" type="text">
                      <button class='base_botao btn_blue btn_consulta'>Ok</button>
                    </div>
                  </div>
                </div>

                <div id="frete_container_2" class="frete_container_2 visible_servicos">
                  <p class="font_descricao font_celadon font_bold">Total de Itens: <?= count($itensCarrinho) ?></p>
                  <p class="font_descricao font_celadon font_bold">Frete Total: R$ 10,00</p>
                </div>
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
          <div class="carrinho_vazio_resumo">
            <p>Total: R$ <?= number_format($totalCarrinho, 2, ',', '.') ?></p>
          </div>
        </div>
      </div>

      <div class="carrinho_vazio_botoes_holder">
        <button class="carrinho_vazio_start base_botao btn_outline_blue" onclick="history.back()">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_carolina_icon.svg">
          VOLTAR
        </button>
        <div class="carrinho_vazio_holder_final">
          <button id="carrinhoVazioRemoverTudo" class="base_botao btn_red">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/lixo_branco_icon.svg">
            REMOVER TUDO
          </button>

          <button class="base_botao btn_blue" onclick="pag('cliente/CarrinhoDados')">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">
            SALVAR
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