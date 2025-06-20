<!DOCTYPE html>
<html lang="pt-br">
<?php
$css = ["/css/cliente/CarrinhoVazio.css"];
$js = ["/js/cliente/Carrinhos.js"];
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
            <div class="carrinho_vazio_conteudo_items">
              <?php if (empty($itensCarrinho)): ?>
                <p>Seu carrinho está vazio.</p>
              <?php else: ?>
                <?php foreach ($itensCarrinho as $item): ?>
                  <div class="carrrinho_produto_item" data-id="<?= $item['id_produto'] ?>">
                    <img src="<?= empty($item['endereco_imagem_produto']) ? 'https://placehold.co/400x400' : "./public/" . $item['endereco_imagem_produto'] ?>" alt="<?= $item['nome_produto'] ?>">
                    <span><?= htmlspecialchars($item['nome_produto']) ?></span>
                    <div class="carrinho_quantidade">
                      <span id="preco_produto">R$ <?= number_format($item['preco_produto'], 2, ',', '.') ?></span>
                      <input class="input_quantidade" type="number" name="quantidade" id="quantidade_produto" min="1" max="99" value="<?= (int)$item['quantidade_produto'] ?>">
                      <form method="POST" action="Carrinho-api-remove">
                        <input hidden name="id_produto" id="id_produto" value="<?= $item['id_produto'] ?>">
                        <button class="">
                          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg">
                          <span>Limpar</span>
                        </button>
                      </form>
                    </div>
                  </div>
                  <hr>
                  <?php endforeach; ?>
                  <?php endif; ?>
            </div>

            <div class="carrinho_vazio_conteudo_servicos">
              <div class="servicos_container_1">
                <div class="text_servicos">
                  <img src="<?= $PATH_PUBLIC ?>/image/carrinho/servico.svg" class="base_icon" alt="Serviço de frete">
                  <p class="font_subtitulo font_celadon">FRETE</p>
                </div>

                <button id="btn_mostrar_servicos" class="btn_mostrar_servicos" aria-label="Mostrar serviços de frete">
                  <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_baixo.svg" class="base_icon" alt="Seta para baixo">
                </button>

                <div id="frete_container_1" class="frete_container_1 visible_servicos">
                  <div class="consultar_frete">
                    <h1>CONSULTAR FRETE</h1>
                    <div class="consultar_input">
                      <input class="base_input" type="text" aria-label="CEP para consultar frete">
                      <button class='base_botao btn_blue btn_consulta'>Ok</button>
                    </div>
                  </div>
                </div>

                <div id="frete_container_2" class="frete_container_2 visible_servicos">
                  <p class="font_descricao font_celadon font_bold">Total de Itens: <?= count($itensCarrinho) ?></p>
                  <p class="font_descricao font_celadon font_bold">Frete Total: N/A</p>
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
        <button class="carrinho_vazio_start base_botao btn_outline_blue" onclick="pag('')">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/seta_esquerda_carolina_icon.svg" alt="Voltar">
          VOLTAR
        </button>
        <div class="carrinho_vazio_holder_final">
          <form action="Carrinho-api-limpar">
            <button class="base_botao btn_red" id="remover_tudo" <?= $carrinhoVazio ?>>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/lixo_branco_icon.svg" alt="Remover tudo">
              REMOVER TUDO
            </button>
          </form>
          <button class="base_botao btn_blue" <?= $carrinhoVazio ?> onclick="pag('/CarrinhoDados')">
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
</body>

</html>