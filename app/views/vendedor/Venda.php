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
        <div id="botao_topo_pago" class="<?= $status_pagamento_compra ? 'confirmar_pedido_botao_3' : 'confirmar_pedido_botao_1' ?>">
          <h2><?= $status_pagamento_compra ? 'Pago' : 'Pagamento Pendente' ?></h2>
        </div>
        <div id="botao_topo_processado" class="<?= $status_entrega_compra ? 'confirmar_pedido_botao_3' : 'confirmar_pedido_botao_2' ?>">
          <h2><?= $status_entrega_compra ? 'Processado' : 'Não processado' ?></h2>
        </div>
      </div>
    </div>

    <div class="confirmar_pedido_grid_principal">
      <div class="confirmar_pedido_container_1">
      <div class="confirmar_pedido_itens">
        <?php foreach ($itens_venda as $item): ?>
            <div class="confirmar_pedido_produtos">
                <img src="<?=$PATH_PUBLIC?>/image/vendedor/confirmar_pedido/mouse.svg" alt="">
                <h1><?= htmlspecialchars($item['nome_produto']) ?></h1>
                <div class="confirmar_pedido_produtos_valor">
                    <h2>R$<?= number_format($item['preco_pago_compra'], 2, ',', '.') ?> x <?= $item['quantidade_compra'] ?></h2>
                    <h1>R$<?= number_format($item['total_item'], 2, ',', '.') ?></h1>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
      </div>
        <div id="botao_confirmar_envio" class="confirmar_pedido_botao_confirmar_envio" onclick="confirmarEnvio()">
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
              <h2><?= $status_pagamento_compra ? 'pagamento confirmado' : 'pagamento pendente' ?></h2>
            </div>
          </div>

          <!-- Aguardando Confirmação -->
          <div class="confirmar_pedido_container_2_item">
            <div>
              <img src="<?=$PATH_PUBLIC?>/image/vendedor/confirmar_pedido/bolinha_itens.svg" alt="">
            </div>
            <div>
              <h1><?= $status_entrega_compra ? 'Envio Confirmado' : 'Envio não confirmado' ?></h1>
            </div>
          </div>
        </div>
      </div>

      <div class="confirmar_pedido_container_3">
        <div class="confirmar_pedido_itens_container_3">
          <div class="confirmar_pedido_container_3_item">
            <h2>Subtotal</h2>
            <h2><?= $quantidade_itens_venda ?>  itens</h2>
            <h2>R$<?= number_format($total_pago_compra ?? 0, 2, ',', '.') ?></h2>
          </div>

          <div class="confirmar_pedido_container_3_total">
            <h1>TOTAL</h1>
            <hr>
            <div class="confirmar_pedido_container_3_total_valor">
              <h2>Pago pelo Cliente</h2>
              <h2><?php if ($status_pagamento_compra): ?>
            R$<?= number_format($total_pago_compra ?? 0, 2, ',', '.') ?>
        <?php else: ?>
            R$0,00
        <?php endif; ?></h2>
            </div>

          </div>
        </div>

        <div id="botao_receber_pagamento" class="confirmar_pedido_botao_receber_pagamento" onclick="receberPagamento()">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/enviar_branco_icon.svg" alt="">
          <h1>RECEBER PAGAMENTO</h1>
        </div>
      </div>

      <div class="confirmar_pedido_container_4">
        <div class="confirmar_pedido_container_4_item">
          <h1>CLIENTE</h1>
          <h2><?= htmlspecialchars($nome_cliente ?? 'Data não disponível') ?></h2>
          <h2><?= $vendas[0]['quantidade_compras_cliente_vendedor'] ?? 0 ?> pedidos</h2>
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
            <h2><?= htmlspecialchars($cep_cliente ?? 'Data não disponível - CEP') ?></h2>
          </div>
          <h2><?= htmlspecialchars($rua_endereco ?? 'Data não disponível - Rua') ?> <?= htmlspecialchars($numero_endereco ?? 'Data não disponível - Número da rua') ?>, <?= htmlspecialchars($bairro_endereco ?? 'Data não disponível - Bairro') ?> - <?= htmlspecialchars($cidade_endereco ?? 'Data não disponível - Cidade') ?>, <?= htmlspecialchars($uf_endereco ?? 'Data não disponível - Estado') ?></h2>
        </div>        
      </div>
    </div>
  </main>
  <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>
</html>

<script>
function confirmarEnvio() {
    fetch(window.location.href, { // chama a mesma página
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=confirmar_envio&id_compra=<?= $id_venda ?>'
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'OK') {
            // Muda texto do botão e status visual
            const botao = document.getElementById('botao_confirmar_envio');
            botao.querySelector('h1').innerText = 'Processado';

            // Atualiza status visual abaixo da compra
            document.querySelector('.confirmar_pedido_botao_2 h2').innerText = 'Processado';

            // Atualiza o botão amarelo do topo
            const botaoTopo = document.getElementById('botao_topo_processado');
            botaoTopo.className = 'confirmar_pedido_botao_3';
        }
    })
    .catch(error => console.error('Erro:', error));
}

function receberPagamento() {
    fetch(window.location.href, { // chama a mesma página
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=receber_pagamento&id_compra=<?= $id_venda ?>'
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'OK') {
            // Muda texto do botão e status visual
            const botao = document.getElementById('botao_receber_pagamento');
            botao.querySelector('h1').innerText = 'Pago';

            // Atualiza status visual abaixo da compra
            document.querySelector('.confirmar_pedido_botao_1 h2').innerText = 'Pago';

            // Atualiza o botão laranja do topo
            const botaoTopo = document.getElementById('botao_topo_pago');
            botaoTopo.className = 'confirmar_pedido_botao_3';
        }
    })
    .catch(error => console.error('Erro:', error));
}

</script>

