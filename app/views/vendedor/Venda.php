<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Confirmar Pedido - E ao Quadrado";
  $css = ["/css/vendedor/ConfirmarPedido.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="confirmar_pedido_body">
    <div class="confirmar_pedido_titulo">
      <div class="confirmar_pedido_text_titulo">
        <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/carrinho_carga_icon.svg" alt="">
        <h1>CONFIRMAR PEDIDO</h1>
      </div>

      <hr class="confirmar_pedido_linha_titulo">
    </div>

    <div class="confirmar_pedido_grid_id_pedido">
      <div class="confirmar_pedido_text_1">
        <hr class="confirmar_pedido_vertical">
        <div class="confirmar_pedido_id_pedido">
          <h1>#<?= htmlspecialchars($id_venda) ?></h1>
          <h2><?= htmlspecialchars($data_compra ?? 'Data não disponível') ?></h2>
        </div>

      </div>

      <div class="confirmar_pedido_botoes_status">
        <div class="confirmar_pedido_botao_1">
          <h2>Pagamento Pendente</h2>
        </div>
        <div class="confirmar_pedido_botao_2">
          <h2>Não processado</h2>
        </div>
      </div>
    </div>

    <div class="confirmar_pedido_grid_principal">
      <div class="confirmar_pedido_container_1">
        <div class="confirmar_pedido_itens">
          <div class="confirmar_pedido_produtos">
            <img src="<?=$PATH_PUBLIC?>/image/vendedor/confirmar_pedido/mouse.svg" alt="">
            <h1>Mouse Logitech G203</h1>
            <div class="confirmar_pedido_produtos_valor">
              <h2>R$170,91 x 1</h2>
              <h1>hehe</h1>
            </div>
          </div>
          <hr>          
        </div>

        <div class="confirmar_pedido_botao_confirmar_envio">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
          <h1>CONFIRMAR ENVIO</h1>
        </div>
      </div>

      <div class="confirmar_pedido_container_2">
        <div class="confirmar_pedido_titulo_cronograma">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/relogio_icon.svg" alt="">
          <h1>CRONOGRAMA</h1>
        </div>

        <div class="confirmar_pedido_itens_container_2">
          <div class="confirmar_pedido_container_2_item">
            <div>
              <img src="<?=$PATH_PUBLIC?>/image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
              <hr>
            </div>
            <div>
              <h1><?= htmlspecialchars($nome_cliente ?? 'Data não disponível') ?></h1>
              <h2>fez o pedido em</h2>
              <h2><?= htmlspecialchars($data_compra ?? 'Data não disponível') ?></h2>
            </div>
          </div>

          <!-- Pagamento confirmado -->
          <div class="confirmar_pedido_container_2_item">
            <div>
              <img src="<?=$PATH_PUBLIC?>/image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
            </div>
            <div>
              <h1><?= htmlspecialchars($nome_cliente ?? 'Data não disponível') ?></h1>
              <h2>pagamento confirmado em</h2>
              <h2>06/07/2024</h2>
            </div>
          </div>

          <!-- Aguardando Confirmação -->
          <div class="confirmar_pedido_container_2_item">
            <div>
              <img src="<?=$PATH_PUBLIC?>/image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
            </div>
            <div>
              <h1>Aguardando Confirmação</h1>
              <h2>Iniciado em</h2>
              <h2>06/07/2024</h2>
              <h2>às</h2>
              <h2>11:00.</h2>
            </div>
          </div>

          <!-- Aguardando Confirmação -->
          <div class="confirmar_pedido_container_2_item">
            <div>
              <img src="<?=$PATH_PUBLIC?>/image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
            </div>
            <div>
              <h1>Aguardando Confirmação</h1>
              <h2>Iniciado em</h2>
              <h2>06/07/2024</h2>
              <h2>às</h2>
              <h2>11:00.</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="confirmar_pedido_container_3">
        <div class="confirmar_pedido_itens_container_3">
          <div class="confirmar_pedido_container_3_item">
            <h2>Subtotal</h2>
            <h2>3 itens</h2>
            <h2>R$1.2225,57</h2>
          </div>

          <div class="confirmar_pedido_container_3_total">
            <h1>TOTAL</h1>
            <hr>
            <div class="confirmar_pedido_container_3_total_valor">
              <h2>Pago pelo Cliente</h2>
              <h2>R$0</h2>
            </div>

          </div>
        </div>

        <div class="confirmar_pedido_botao_receber_pagamento">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/enviar_branco_icon.svg" alt="">
          <h1>RECEBER PAGAMENTO</h1>
        </div>
      </div>

      <div class="confirmar_pedido_container_4">
        <div class="confirmar_pedido_container_4_item">
          <h1>CLIENTE</h1>
          <h2><?= htmlspecialchars($nome_cliente ?? 'Data não disponível') ?></h2>
          <h2>3 pedidos</h2>
        </div>

        <div class="confirmar_pedido_container_4_item">
          <div class="confirmar_pedido_linha">
            <h1>INFORMAÇÕES DE CONTATO</h1>
          </div>
          <h2><?= htmlspecialchars($numero_celular_cliente ?? 'Data não disponível') ?></h2>
        </div>

        <div class="confirmar_pedido_container_4_item">
          <div class="confirmar_pedido_linha">
            <h1>ENDEREÇO DE ENTREGA</h1>
          </div>
          <div class="confirmar_pedido_linha_2">
            <h3>CEP:</h3>
            <h2>69910-890</h2>
          </div>
          <h2>Rua Vinte e Três, Tancredo Neves - Rio Branco, AC</h2>
        </div>        
      </div>
    </div>
  </main>
  <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>
</html>