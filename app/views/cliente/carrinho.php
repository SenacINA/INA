<!DOCTYPE html>
<html lang="pt-br">
<?php
$css = ["/css/cliente/CarrinhoVazio.css"];
require_once("./utils/head.php");
$carrinhoVazio = empty($itensCarrinho) ? 'disabled' : '';
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>

  <main>
    <div class="carrinho_vazio_nav">
      <div class="carrinho_vazio_nav_item carrinho_vazio_nav_selected">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/carrinho_icon.svg" alt="Ícone do carrinho">
        <span>Carrinho</span>
      </div>
      <hr>
      <div class="carrinho_vazio_nav_item">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/identificacao_cinza_icon.svg" alt="Ícone de identificação">
        <span>Identificação</span>
      </div>
      <hr>
      <div class="carrinho_vazio_nav_item">
        <img src="<?= $PATH_PUBLIC ?>/image/carrinho/pagamento_cinza_icon.svg" alt="Ícone de pagamento">
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
            <div class="carrinho_vazio_conteudo_items" id="carrinho_vazio">
              <?php if (empty($itensCarrinho)): ?>
                <p>Seu carrinho está vazio.</p>
              <?php else: ?>
                <?php foreach ($itensCarrinho as $item): ?>
                  <div class="carrinho_produto_item" data-carrinho-produto data-id="<?= $item['id_produto'] ?>">
                    <img src="<?= empty($item['endereco_imagem_produto']) ? 'https://placehold.co/400x400' : "./public/" . $item['endereco_imagem_produto'] ?>" alt="<?= $item['nome_produto'] ?>">
                    <span><?= htmlspecialchars($item['nome_produto']) ?></span>
                    <div class="carrinho_quantidade">
                      <span class="preco_produto">R$ <?= number_format($item['preco_produto'], 2, ',', '.') ?></span>
                      <input type="number"
                        name="quantidade"
                        min="1"
                        max="99"
                        value="<?= (int)$item['quantidade_produto'] ?>"
                        class="input_quantidade"
                        data-quantidade-produto>
                      <button class="base_botao btn_outline_red"
                        data-carrinho-remove-btn
                        data-id="<?= $item['id_produto'] ?>">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
                        Limpar
                      </button>
                    </div>
                  </div>
                  <hr class="linha_horizontal" data-linha-horizontal>
                <?php endforeach; ?>
              <?php endif; ?>
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
        <button class="carrinho_vazio_start base_botao btn_outline_blue" onclick="pag('')">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_carolina_icon.svg" alt="Voltar">
          VOLTAR
        </button>
        <div class="carrinho_vazio_holder_final">
          <button class="base_botao btn_red" id="remover_tudo" <?= $carrinhoVazio ?>>
            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/lixo_branco_icon.svg" alt="Remover tudo">
            REMOVER TUDO
          </button>
          <button class="base_botao btn_blue" id="salvar_carrinho" <?= $carrinhoVazio ?> onclick="pag('CarrinhoDados')">
            <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="Salvar">
            SALVAR
          </button>
        </div>
      </div>
    </div>
  </main>

  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <script src="<?= $PATH_PUBLIC ?>/js/cliente/Carrinho.js"></script>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
</body>

</html>