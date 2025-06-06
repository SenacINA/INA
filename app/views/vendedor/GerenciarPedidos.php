<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Gerenciar Pedidos- E ao Quadrado";
  $css = ["/css/vendedor/GerenciarPedidos.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="gerenciar_pedidos_body_container">
    <div class="gerenciar_pedidor_firula_holder">
      <div class="gerenciar_pedidos_header_holder">
        <div class="gerenciar_pedidos_text_titulo">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/engrenagem_icon.svg" alt="">
          <h1 class="gerenciar_pedidos_header_holder font_titulo">GERENCIAR PEDIDOS</h1>
        </div>
        <hr class="gerenciar_pedidos_linha_sublinhado">
      </div>
      
      <div class="gerenciar_pedidos_body_holder">
        <div class="gerenciar_pedidos_main_content">
          <div class="gerenciar_pedidos_quadrado_container">
            <div class="gerenciar_pedidos_pesquisar_pedidos">
              <div class="gerenciar_pedidos_subtitulo_generico">
                <div class="gerenciar_pedidos_linha_vertical"></div>
                <div class="gerenciar_pedidos_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_lupa_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Pesquisar Pedidos</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_pedidos_forms_pesquisa_pedidos">
                <div class="gerenciar_pedidos_form_cliente">
                  <label class="font_subtitulo font_celadon">Código Do Produto / Nome Cliente</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="gerenciar_pedidos_inputs_esquerda">
                  <div class="gerenciar_pedidos_input_status base_input_select">
                    <label for="select_cod" class="font_subtitulo font_celadon">Status</label>
                    <select name="select_cod" class="gerenciar_pedidos_select_status base_input">
                      <option value="Entregue">Pago</option>
                      <option value="Em transporte">Pendente</option>
                    </select>
                  </div>
                  <div class="gerenciar_pedidos_input_mes base_input_select">
                    <label for="mes" class="font_subtitulo font_celadon">Mês</label>
                    <select name="mes" id="mes" class="gerenciar_pedidos_mes_select base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value="janeiro">Janeiro</option>
                      <option value="fevereiro">Fevereiro</option>
                      <option value="marco">Março</option>
                      <option value="abril">Abril</option>
                      <option value="maio">Maio</option>
                      <option value="junho">Junho</option>
                      <option value="julho">Julho</option>
                      <option value="agosto">Agosto</option>
                      <option value="setembro">Setembro</option>
                      <option value="outubro">Outubro</option>
                      <option value="novembro">Novembro</option>
                      <option value="dezembro">Dezembro</option>
                    </select>
                  </div>
                  <div class="gerenciar_pedidos_input_ano base_input_select">
                    <label for="ano" class="font_subtitulo font_celadon">Ano</label>
                    <select name="ano" id="ano" class="gerenciar_pedidos_ano_select base_input">
                      <option value="" selected disabled style="display: none;">Selecione</option>
                      <option value=" 2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                    </select>
                  </div>
                </div>
                <div class="gerenciar_pedidos_holder_botao">
                  <button type="reset" class="base_botao btn_red">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_branco_icon.svg">
                    CANCELAR
                  </button>

                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg">
                    CONFIRMAR
                  </button>
                </div>
              </form>
            </div>
            <div class="gerenciar_pedidos_estatisticas">
              <div class="gerenciar_pedidos_subtitulo_generico">
                <div class="gerenciar_pedidos_linha_vertical"></div>
                <div class="gerenciar_pedidos_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/grafico_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Estatísticas</p>
                </div>
              </div>
              <div class="gerenciar_pedidos_estatistica_holder">
                <div class="gerenciar_pedidos_card">
                  <span class="gerenciar_pedidos_titulo">Valor Total</span>
                  <span class="gerenciar_pedidos_estatistica_descricao">R$14.145,35</span>
                </div>
                <div class="gerenciar_pedidos_card">
                  <span class="gerenciar_pedidos_titulo">Total De Vendas</span>
                  <span class="gerenciar_pedidos_estatistica_descricao">14 UNI</span>
                </div>
                <div class="gerenciar_pedidos_card">
                  <span class="gerenciar_pedidos_titulo">Tempo Medio De Entrega</span>
                  <span class="gerenciar_pedidos_estatistica_descricao">9 Dias</span>
                </div>
                <div class="gerenciar_pedidos_card">
                  <span class="gerenciar_pedidos_titulo">Pedidos Recebidos</span>
                  <span class="gerenciar_pedidos_estatistica_descricao">4 - 100%</span>
                </div>
                <div class="gerenciar_pedidos_card">
                  <span class="gerenciar_pedidos_titulo">Total De Pedidos</span>
                  <span class="gerenciar_pedidos_estatistica_descricao">4</span>
                </div>
                <div class="gerenciar_pedidos_card">
                  <span class="gerenciar_pedidos_titulo">Pedidos Reembolsados</span>
                  <span class="gerenciar_pedidos_estatistica_descricao">0 - 0%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gerenciar_pedidos_header_title">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/pasta_clock_icon.svg"/>
      <h1 class="gerenciar_pedidos_text_header font_titulo">HISTÓRICO DE PEDIDOS</h1>
    </div>
    <div class="gerenciar_pedidos_table">
      <div class="gerenciar_pedidos_table_filtro bg_carolina">
        <p class="gerenciar_pedidos_filtro_titulo font_subtitulo">Organizar por:</p>
        <select>
          <option value="" selected disable style="display: none;"></option>
          <option value="">Opa1</option>
          <option value="">Opa2</option>
          <option value="">Opa3</option>
          <option value="">Opa4</option>
        </select>
      </div>
      <div class="base_tabela">
        <table>
          <colgroup>
            <col class="gerenciar_pedidos_table_col-1">
            <col class="gerenciar_pedidos_table_col-2">
            <col class="gerenciar_pedidos_table_col-3">
            <col class="gerenciar_pedidos_table_col-4">
            <col class="gerenciar_pedidos_table_col-5">
            <col class="gerenciar_pedidos_table_col-6">
            <col class="gerenciar_pedidos_table_col-7">
          </colgroup>
          <thead>
            <tr>
              <th>Cód.</th>
              <th>Produto</th>
              <th>Preço</th>
              <th>Qtn.</th>
              <th>Forma de Pagamento</th>
              <th>Status</th>
              <th>Cliente</th>
            </tr>
            <tbody>
              <tr>
                <td># 1001</td>
                <td>
                  <span>
                    Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB Cadeira Gamer Throne - RGB
                  </span>
                </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>
                  <span>
                    Pix
                  </span>
                </td>
                <td>Pago</td>
                <td>
                  <span>
                    Roberto Carlos
                  </span>
                </td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>Pix</td>
                <td>Pendente</td>
                <td>Roberto Carlos</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>Boleto - 6x</td>
                <td>Pendente</td>
                <td>Roberto Carlos</td>
              </tr>
              <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB </td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>Boleto - 12x</td>
                <td>Pago</td>
                <td>Roberto Carlos</td>
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </main>
  <?php 
    include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
</body>

</html>