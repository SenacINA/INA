<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/admin/admin_carrosel.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="../../js/geral/base.js"></script>
</head>

<body>
  <!-- fazer responsividade -->
   
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <header>
    <img src="../../image/admin/gerenciar_carrossel/header_gerenciar_carrossel.svg" alt="header" width="100%">
  </header>
  <main class="main_container">
    <div class="main_content">
      <div class="pesquisa">
        <div class="pesquisa_cliente">
          <div class="main_text_pesquisa_container">
            <p class="main_text_pesquisa">Pesquisar Clientes</p>
            <hr class="linha">
          </div>
          <form class="forms_pesquisa">
            <label for="ip_email">IP / E-Mail</label>
            <input type="text" name="ip_email" id="ip_email">
            <div class="selects">
              <label for="plano" class="plano">Plano</label>
              <select name="plano" id="plano" class="plano_select">
                <option value="">Selecione um plano</option>
                <option value="mensal">Mensal</option>
                <option value="semestral">Semestral</option>
                <option value="anual">Anual</option>
              </select>
              <label for="mes" class="mes">Mês</label>
              <select name="mes" id="mes" class="mes_select">
                <option value="">Selecione um mês</option>
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
              <label for="ano" class="ano">Ano</label>
              <select name="ano" id="ano" class="ano_select">
                <option value="">Selecione um ano</option>
                <option value="2020">2020</option>
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
          </form>
        </div>
        <div class="gerenciar_pedidos_linha_sublinhado"></div>
      </div>
      <div class="gerenciar_pedidos_body_holder bg_azul_leve">
        <div class="gerenciar_pedidos_main_content">
          <div class="gerenciar_pedidos_quadrado_container">
            <div class="gerenciar_pedidos_pesquisar_pedidos">
              <div class="gerenciar_pedidos_subtitulo_generico">
                <div class="gerenciar_pedidos_linha_vertical"></div>
                <div class="gerenciar_pedidos_subtitle_holder">
                  <img class="base_icon" src="../../image/admin/atualizar_usuario/perfil_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Pesquisar</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_pedidos_forms_pesquisa_pedidos">
                <div class="gerenciar_pedidos_form_cliente">
                  <h2>Digite o ID e o E-mail do usuário para encontrá-lo.</h2>
                  <label class="font_subtitulo font_celadon">ID do Usuário</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="gerenciar_pedidos_inputs_esquerda">
                  <div class="gerenciar_pedidos_input_status">
                    <label for="select_cod" class="font_subtitulo font_celadon">Email</label>
                    <input class="gerenciar_pedidos_select_status base_input" type="text">
                  </div>
                  
                  
                </div>
             
              </form>
            </div>
            <div class="gerenciar_pedidos_estatisticas">
              <div class="gerenciar_pedidos_subtitulo_generico">
                <div class="gerenciar_pedidos_linha_vertical"></div>
                <div class="gerenciar_pedidos_subtitle_holder">
                  <img class="base_icon" src="../../image/admin/atualizar_usuario/perfil_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Informações Do usuário</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_pedidos_forms_pesquisa_pedidos">
                <div class="gerenciar_pedidos_form_cliente">
                  <label class="font_subtitulo font_celadon">Nome</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="gerenciar_pedidos_inputs_esquerda">
                  <div class="gerenciar_pedidos_input_status">
                    <label for="select_cod" class="font_subtitulo font_celadon">Plano</label>
                    <select name="select_cod" class="gerenciar_pedidos_select_status base_input">
                      <option value="Semanal">Semanal</option>
                      <option value="Mensal">Mensal</option>
                      <option value="Bimestral">Bimestral</option>
                      <option value="Semestral">Semestral</option>


                    </select>
                  </div>
                  <div class="gerenciar_pedidos_input_mes">
                    <label for="mes" class="font_subtitulo font_celadon">Data de Início</label>
                    <input class="gerenciar_pedidos_mes_select base_input" type="date">
                  </div>
                  <div class="gerenciar_pedidos_input_ano">
                    <label for="ano" class="font_subtitulo font_celadon">Data de Expiração</label>
                    <input class="gerenciar_pedidos_ano_select base_input" type="date">
                
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="botoes">
      <select name="filtro" id="filtro" class="filtro">
        <option value="">Organizar por:</option>
        <option value="nome">Nome</option>
        <option value="categoria">Categoria</option>
        <option value="cargo">Cargo</option>
        <option value="plano">Plano</option>
        <option value="data_inicio">Data de início</option>
        <option value="data_expiracao">Data de expiração</option>
      </select>
      <button class="add_anuncio" onclick="pag('admin/admin_carrossel')"><img src="../../image/geral/add_botao.svg">Adicionar anúncio</button>
    </div>
    <div class="gerenciar_pedidos_table">
      <div class="gerenciar_pedidos_table_filtro bg_carolina">
        <p class="gerenciar_pedidos_filtro_titulo font_subtitulo">Organizar por:</p>
        <select>
          <option value="" selected disable style="display: none;"></option>
          <option value="">IP</option>
          <option value="">Nome</option>
          <option value="">Categoria</option>
          <option value="">Cargo</option>
          <option value="">Data de Início</option>
          <option value="">Data de Expiração</option>
          <option value="">Plano</option>

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
              <th>IP</th>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Cargo</th>
              <th>Data de Início</th>
              <th>Data de Expiração</th>
              <th>Plano</th>
            </tr>
            <tbody>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia</td>
                <td>Hardware</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Mensal</td>
              </tr>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia </td>
                <td>Periféricos</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Bimestral</td>
              </tr>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia</td>
                <td>Periféricos</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Semanal</td>
              </tr>
              <tr>
                <td>192.168.0.1</td>
                <td>Info@nvidia</td>
                <td>Celulares</td>
                <td>Vendedor</td>
                <td>01/01/2001</td>
                <td>01/01/2001</td>
                <td>Semanal</td>
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </main>
</body>

</html>
