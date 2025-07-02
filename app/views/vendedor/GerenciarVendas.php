<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Gerenciar Vendas - E ao Quadrado";
$css = ["/css/vendedor/GerenciarVendas.css"];
require_once('./utils/head.php');
var_dump($vendas);
?>

<body>

    <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>
    <main class="gerenciar_vendas_body_container">
        <div class="gerenciar_vendas_firula_holder">
            <div class="gerenciar_vendas_header_holder">
                <div class="gerenciar_vendas_text_titulo">
                    <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/produto_icon.svg" alt="">
                    <h1 class="gerenciar_vendas_header_holder font_titulo">GERENCIAR VENDAS</h1>
                </div>
                <hr class="gerenciar_vendas_linha_sublinhado">
            </div>

            <div class="gerenciar_vendas_body_holder">
                <div class="gerenciar_vendas_main_content">
                    <div class="gerenciar_vendas_quadrado_container">
                        <div class="gerenciar_vendas_pesquisar_vendas">
                            <div class="gerenciar_vendas_subtitulo_generico">
                                <div class="gerenciar_vendas_linha_vertical"></div>
                                <div class="gerenciar_vendas_subtitle_holder">
                                    <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/produto_lupa_icon.svg" />
                                    <h2 class="font_subtitulo font_celadon">Pesquisar vendas</p>
                                </div>
                            </div>
                            <form action="" method="post" class="gerenciar_vendas_forms_pesquisa_pedidos">
                                <div class="gerenciar_vendas_form_cliente">
                                    <label class="font_subtitulo font_celadon">Nome do Cliente</label>
                                    <input type="text" spellcheck="false" class="base_input" name="cliente">
                                </div>
                                <div class="gerenciar_vendas_inputs_esquerda">

                                    <div class="gerenciar_vendas_input_mes base_input_select">
                                        <label for="mes" class="font_subtitulo font_celadon">Mês</label>
                                        <select name="mes" id="mes" class="gerenciar_vendas_mes_select base_input">
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
                                    <div class="gerenciar_vendas_input_ano base_input_select">
                                        <label for="ano" class="font_subtitulo font_celadon">Ano</label>
                                        <select name="ano" id="ano" class="gerenciar_vendas_ano_select base_input">
                                            <option value="" selected disabled style="display: none;">Selecione</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="gerenciar_vendas_holder_botao">

                                    <button type="submit" class="base_botao btn_blue">
                                        <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">
                                        PROCURAR
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="gerenciar_vendas_estatisticas">
                            <div class="gerenciar_vendas_subtitulo_generico">
                                <div class="gerenciar_vendas_linha_vertical"></div>
                                <div class="gerenciar_vendas_subtitle_holder">
                                    <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/grafico_icon.svg" />
                                    <h2 class="font_subtitulo font_celadon">Estatísticas</p>
                                </div>
                            </div>
                            <div class="gerenciar_vendas_estatistica_holder">
                                <div class="gerenciar_vendas_card">
                                    <span class="gerenciar_vendas_titulo">Lucro total</span>
                                    <span class="gerenciar_vendas_estatistica_descricao">
                                        R$ <?= number_format($estatisticas['lucro_total'] ?? 0, 2, ',', '.') ?>
                                    </span>
                                </div>
                                <div class="gerenciar_vendas_card">
                                    <span class="gerenciar_vendas_titulo">Total De Vendas</span>
                                    <span class="gerenciar_vendas_estatistica_descricao">
                                        <?= $estatisticas['total_vendas'] ?? 0 ?> UNI
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gerenciar_vendas_header_title">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/pasta_clock_icon.svg" />
            <h1 class="gerenciar_vendas_text_header font_titulo">HISTÓRICO DE VENDAS</h1>
        </div>
        <div class="gerenciar_vendas_table">
            <div class="gerenciar_vendas_table_filtro bg_carolina">
                <p class="gerenciar_vendas_filtro_titulo font_subtitulo">Organizar por:</p>
                <select id="filtros-gerenciar-vendas" name="ordenar">
                    <option selected value="id_compra">ID</option>
                    <option value="alfabetica">A-Z</option>
                    <option value="valor_total">PREÇO</option>
                    <option value="data_compra">DATA DE COMPRA</option>
                </select>
            </div>
        </div>

        <div class='tabela-scroll'>
            <div class="base_tabela">
                <table>
                    <colgroup>
                        <col class="gerenciar_vendas_table_col-1">
                        <col class="gerenciar_vendas_table_col-2">
                        <col class="gerenciar_vendas_table_col-3">
                        <col class="gerenciar_vendas_table_col-4">
                        <col class="gerenciar_vendas_table_col-5">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Preço</th>
                            <th>Data de Compra</th>
                            <th>Gerenciamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($vendas)): ?>
                            <tr>
                                <td colspan="5">Nenhum resultado encontrado</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($vendas as $v): ?>
                                <tr>
                                    <td data-id_compra="<?= $v['id_compra'] ?>">#<?= htmlspecialchars($v['id_compra']) ?></td>
                                    <td data-cliente=" <?= $v['cliente'] ?> "><?= htmlspecialchars($v['cliente']) ?></td>
                                    <td data-preco="<?= $v['valor_total'] ?>">R$ <?= number_format($v['valor_total'], 2, ',', '.') ?></td>
                                    <td data-data="<?= date('d/m/Y', strtotime($v['data_compra']))?>"><?= htmlspecialchars(date('d/m/Y', strtotime($v['data_compra']))) ?></td>
                                    <td>
                                        <form method="post" style="display:inline;" action="Venda-api-sale">
                                            <input type="hidden" name="id_venda" value="<?= htmlspecialchars($v['id_compra']) ?>">

                                            <button type="submit" class="aprovar_vendedor_btn_aprovar btn_blue base_botao">
                                                <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_branca_icon.svg" alt="">
                                                GERENCIAR
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="base_navegacao">
            <div class="navegacao_vendas">
                <button id="btnAnterior" class="base_botao btn_blue">
                    <img src="./public/image/geral/icons/seta_filtro_branco.svg" class="base_icon esquerda">
                </button>
                <button id="btnProximo" class="base_botao btn_blue">
                    <img src="./public/image/geral/icons/seta_filtro_branco.svg" class="base_icon direita">
                </button>
            </div>
        </div>

        </div>
    </main>
</body>
<script src="<?= $PATH_PUBLIC ?>/js/tabelas/renderTableVendas.js"></script>

</html>