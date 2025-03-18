<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="../../css/cliente/carinho_dados.css">
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="fundo">
  <!-- fazer responsividade -->
  <!-- arrumar o nome das class -->
   
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>

  <div class="carrinho_dados">
    <img src="../../image/cliente/carrinho_dados/carrinho_top.png" class="carrinho_top">
    <div class="forms_dados">
      <div class="main_container_carrinho_dados">
        <p class="main_text_carrinho_dados">Identificação</p>
        <img src="../../image/cliente/carrinho_dados/separador_carrinho.png" class="separador_carrinho">
      </div>
      <div class="container_forms">
        <form action="" class="forms_carrinho">
          <label for="nome_carrinho">Nome:</label>
          <input type="text" class="base_input">
          <label for="cpf_carrinho">CPF:</label>
          <input type="text" class="base_input">
          <label for="endereco_carrinho">Endereço:</label>
          <input type="text" class="base_input">
          <div class="informacoes_cep">
            <label for="cep" class="cep">CEP:</label>
            <input type="number" name="cep" id="cep" class="base_input">
            <label for="cidade" class="cidade">Cidade:</label>
            <input type="text" id="cidade" class="base_input">
          </div>
          <label for="telefone">Telefone:</label>
          <input type="text" name="telefone" id="telefone" class="base_input">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" class="base_input">
        </form>
        <form action="" class="dados_adicionais">
          <label for="ponto">Ponto de referência(opcional):</label>
          <input type="text" name="ponto" id="ponto" class="base_input">
          <label for="numeroCasa">Número da casa:</label>
          <input type="number" name="numeroCasa" id="numeroCasa" class="base_input">
          <label for="mensagem_vendedor">Mensagem para o vendedor(opcional):</label>
          <input type="text" class="base_input">
          <label for="opcaoEnvio">Opções de envio</label>
          <select name="opcaoEnvio" id="opcaoEnvio" class="base_input">
            <option value="" disabled selected>Selecione o tipo de entrega</option>
            <option value="entrega_padrao">Entrega Padrão - R$13,25</option>
            <option value="entrega_expressa">Entrega Expressa - R$26,30</option>
          </select>
        </form>
        <div class="botoes_carrinho">
          <button class="salvar_carrinho"><img src="../../image/geral/confirm_botao.svg">Salvar</button>
        </div>
      </div>
    </div>
  </div>
  <?php 
      include_once('../../pages/geral/footer.php');
  ?>
</body>

</html>
