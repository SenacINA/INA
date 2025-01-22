<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Vendedores</title>
    <link rel="stylesheet" href="../../css/admin/relatorio_vendedor.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar"></nav>
  <header>
    <img src="../../image/admin/gerenciar_carrossel/header_gerenciar_carrossel.svg" alt="header" width="100%">
  </header>
  <main class="main_container">
    <div class="main_content">
      <div class="pesquisa">
        <div class="pesquisa_cliente">
          <div class="main_text_pesquisa_container">
            <p class="main_text_pesquisa">Informações do vendedor</p>
            <hr class="linha">
            <form class="forms_pesquisa">
              <div>
                <p class="info_vendedor_p">Nome</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="nome">THUNDER GAMES</p></div>

                <p class="info_vendedor_p">E-mail</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="email">thundergames@gmail.com</p></div>

                <p class="info_vendedor_p">Produtos À Venda</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="quantia_produtos">8</p></div>

                <p class="info_vendedor_p">Avaliação Geral</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="avaliacao">4.5</p></div>

                <p class="info_vendedor_p">Tempo Como Vendedor</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="tempo_vendendo">4 Meses</p></div>

                <p class="info_vendedor_p">Código de Vendedor</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="codigo">222</p></div>
              </div>
              
              <div>
                <p class="info_vendedor_p">Telefone</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="telefone">67997051882</p></div>

                <p class="info_vendedor_p">Endereço</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="endereco">Rua Lago do Amor</p></div>

                <p class="info_vendedor_p">Bairro</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="bairro">Vila Monumento</p></div>

                <p class="info_vendedor_p">CEP</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="cep">25310-238</p></div>

                <p class="info_vendedor_p">Cidade</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="cidade">Campo Grande</p></div>
                
                <p class="info_vendedor_p">Estado</p>
                <div class="info_vendedor_box"><p class="info_vendedor_box_p" id="estado">Mato Grosso do Sul</p></div>
              </div>
            </form>
          </div>          
        </div>
        <div class="informacoes_cliente">
          <div class="main_text_info_container">
            <p class="main_text_info">Perfil do Vendedor</p>
            <hr class="linha">
          </div>
          <div class="vendedor_perfil">
            <p>a</p>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="botoes">
      <select name="filtro" id="filtro" class="filtro">
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
    <div class="table-wrapper">
    
    <table class="table">
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