<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório do Vendedor</title>
    <link rel="stylesheet" href="../../css/admin/relatorio_vendedor.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar"></nav>
  <header>
    <img src="../../image/admin/gerenciar_carrossel/header_gerenciar_carrossel.svg" alt="header" width="100%">
  </header>
  <main class="relatorio_vendedor_main_container">
    <div class="relatorio_vendedor_main_content">
      <div class="relatorio_vendedor_grid_parent">
        <div class="relatorio_vendedor_grid_info_main">
          <div class="relatorio_vendedor_grid_main">
            <p class="font_titulo relatorio_vendedor_align_text_center">Informações do vendedor</p>
            <hr class="admin_linha">
            <form class="relatorio_vendedor_grid_info">
              <div>
                <p class="relatorio_vendedor_texto_info">Nome</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorNome">THUNDER GAMES</p></div>

                <p class="relatorio_vendedor_texto_info">E-mail</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorEmail">thundergames@gmail.com</p></div>

                <p class="relatorio_vendedor_texto_info">Produtos À Venda</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorQuantiaProdutos">8</p></div>

                <p class="relatorio_vendedor_texto_info">Avaliação Geral</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorAvaliacao">4.5</p></div>

                <p class="relatorio_vendedor_texto_info">Tempo Como Vendedor</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorTempoVendendo">4 Meses</p></div>

                <p class="relatorio_vendedor_texto_info">Código de Vendedor</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorCodigo">222</p></div>
              </div>
              
              <div>
                <p class="relatorio_vendedor_texto_info">Telefone</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorTelefone">67997051882</p></div>

                <p class="relatorio_vendedor_texto_info">Endereço</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorEndereco">Rua Lago do Amor</p></div>

                <p class="relatorio_vendedor_texto_info">Bairro</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorBairro">Vila Monumento</p></div>

                <p class="relatorio_vendedor_texto_info">CEP</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorCep">25310-238</p></div>

                <p class="relatorio_vendedor_texto_info">Cidade</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorCidade">Campo Grande</p></div>
                
                <p class="relatorio_vendedor_texto_info">Estado</p>
                <div class="relatorio_vendedor_body_info"><p class="relatorio_vendedor_texto_body_info" id="relatorioVendedorEstado">Mato Grosso do Sul</p></div>
              </div>
            </form>
          </div>          
        </div>
        <div class="relatorio_vendedor_grid_perfil">
          <div class="main_text_info_container">
            <p class="font_titulo relatorio_vendedor_align_text_center">Perfil do Vendedor</p>
            <hr class="admin_linha">
          </div>
          <div class="relatorio_vendedor_perfil">
            <img src="../../image/admin/relatorio_vendedor/imagem_perfil_vendedor.png" class="relatorio_vendedor_imagem_perfil">
            <p class="relatorio_vendedor_align_text_center font_bold">THUNDER GAMES</p>
            <p class="relatorio_vendedor_texto_descricao_perfil">Lorem ipsum dolor sit amet. Non quidem earum ut facilis deserunt et voluptatem praesentium et error distinctio. In doloremque minus et harum ducimus hic omnis sapiente ut perferendis perferendis. Quo distinctio consequatur est consequuntur repellendus eos fugiat accusantium quo quod eius et nesciunt temporibus. At recusandae asperiores et nisi laborum id sint suscipit et asperiores consequatur est molestiae Quis qui dolorem vitae. At dolorum quos non omnis internos et quos quis.</p>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="botoes">
      <select name="filtro" id="relatorioVendedorFiltro" class="relatorio_vendedor_filtro">
        <option value="">Organizar por:</option>
        <option value="codigo">CÓDIGO</option>
        <option value="produto">PRODUTO</option>
        <option value="preco">PREÇO</option>
        <option value="quantidade">QUANTIDADE</option>
        <option value="preview_da_entrega">PREVIEW DA ENTREGA</option>
        <option value="status">STATUS</option>
        <option value="nome_cliente">NOME DO CLIENTE</option>
      </select>
    </div>
    <div class="relatorio_vendedor_table_wrapper">
    
    <table class="relatorio_vendedor_table">
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>PRODUTO</th>
                <th>PREÇO</th>
                <th>QUANTIDADE</th>
                <th>PREVIEW DA ENTREGA</th>
                <th>STATUS</th>
                <th>NOME DO CLIENTE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td># 1001</td>
                <td>Cadeira Gamer Throne - RGB</td>
                <td>R$ 1.400,00</td>
                <td>01</td>
                <td>20/01/2025</td>
                <td>Entregue</td>
                <td>Roberto Carlos</td>
            </tr>
            <tr>
                <td># 10002</td>
                <td>Carregador Portátil</td>
                <td>R$ 199,00</td>
                <td>02</td>
                <td>20/01/2025</td>
                <td>Entregue</td>
                <td>Claudia</td>
            </tr>
            <tr>
                <td># 1003</td>
                <td>Xiaomi Redmi PocoPhone X6</td>
                <td>R$ 12.043,90</td>
                <td>10</td>
                <td>20/01/2025</td>
                <td>Entregue</td>
                <td>Pedro</td>
            </tr>
            <tr>
                <td># 1004</td>
                <td>Cadeira Gamer Throne - RGB</td>
                <td>R$ 899,90</td>
                <td>01</td>
                <td>20/01/2025</td>
                <td>Entregue</td>
                <td>Jonathan Joestar</td>
            </tr>
        </tbody>
    </table>
    </div>
  </main>
</body>
</html>