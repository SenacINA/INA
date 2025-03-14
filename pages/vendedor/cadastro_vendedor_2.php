<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/vendedor/cadastro_vendedor_2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- fazer responsividade -->

  <?php
    include_once('../../pages/geral/navbar.php');
    ?>

  <div class="cadastro_vendedor_2_grid_bg">
    <div class="cadastro_vendedor_2_titulo">
      <h1>INFORMAÇÕES DA EMPRESA</h1>
    </div>
    <img src="../../image/geral/linha-divisoria-azul.png" alt="">
    <div class="cadastro_vendedor_2_grid_conteudo">
      <div class="cadastro_vendedor_2_grid_conteudo_1">
        <!-- Local da Empresa -->
        <label for="local_da_empresa">Local da Empresa</label> <br>
        <select name="local_da_empresa" id="local_da_empresa">
          <option value="" disabled selected>Selecione a cidade</option>
          <option value="aquidauana">Aquidauana</option>
          <option value="campo_grande">Campo Grande</option>
          <option value="chapadão_do_sul">Chapadão do Sul</option>
          <option value="corumbá">Corumbá</option>
          <option value="coxim">Coxim</option>
          <option value="dourados">Dourados</option>
          <option value="maracaju">Maracaju</option>
          <option value="nova_andradina">Nova Andradina</option>
          <option value="paranaíba">Paranaíba</option>
          <option value="ponta_pora">Ponta Porã</option>
          <option value="porto_murtinho">Porto Murtinho</option>
          <option value="sidrolândia">Sidrolândia</option>
          <option value="três_lagoas">Três Lagoas</option>

        </select>
        <h1>Se você não tiver uma empresa, informe o estado de sua residência.</h1>
        <br>

        <!-- CEP -->
        <label for="cep">CEP</label> <br>
        <input type="text" name="cep" id="cep" placeholder="Digite o CEP" required>
        <br>

        <div class="cadastro_vendedor_2_conteudo_endereco1">
          <!-- Logradouro -->
          <div class="cadastro_vendedor_2_logradouro">
            <label for="logradouro">Logradouro</label> <br>
            <input type="text" name="logradouro" id="logradouro" placeholder="Rua, Avenida, etc." required>
          </div>

          <!-- Número -->
          <div class="cadastro_vendedor_2_numero">
            <label for="numero">Número</label> <br>
            <input type="text" name="numero" id="numero" placeholder="Número do imóvel" required>
          </div>
        </div>

        <!-- Nome / Razão Social -->
        <label for="nome_razao_social">Nome / Razão Social</label> <br>
        <input type="text" name="nome_razao_social" id="nome_razao_social" placeholder="Nome completo ou Razão Social" required>
        <br>

        <div class="cadastro_vendedor_2_conteudo_endereco2">
          <!-- CPF / CNPJ -->
          <div class="cadastro_vendedor_2_cpf_cnpj">
            <label for="cpf_cnpj">CPF / CNPJ</label> <br>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="Digite o CPF ou CNPJ" required>
          </div>

          <!-- RG -->
          <div class="cadastro_vendedor_2_rg">
            <label for="rg">RG</label> <br>
            <input type="text" name="rg" id="rg" placeholder="Número do RG" required>
          </div>
        </div>
      </div>

      <div class="cadastro_vendedor_2_grid_conteudo_2">
        <!-- E-mail -->
        <label for="email">E-mail</label> <br>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
        <h1>O código de confirmação será enviado para esse E-mail. </h1>
        <br>

        <!-- Senha -->
        <label for="senha">Senha</label> <br>
        <input type="password" name="senha" id="senha" placeholder="Crie uma senha" required>
        <br>

        <!-- Confirmar Senha -->
        <label for="confirmar_senha">Confirmar Senha</label> <br>
        <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirme a senha" required>
        <br>

        <!-- Categoria de Produtos -->
        <label for="categoria_produtos">Categoria de Produtos</label> <br>
        <select name="categoria_produtos" id="categoria_produtos" required>
          <option value="eletronicos">Eletrônicos</option>
          <option value="moveis">Móveis</option>
          <option value="vestuario">Vestuário</option>
          <option value="alimentos">Alimentos</option>
          <option value="bebidas">Bebidas</option>
          <option value="esportes">Esportes</option>
          <option value="beleza">Beleza e Cuidados Pessoais</option>
          <option value="livros">Livros</option>
          <option value="automotivo">Automotivo</option>
          <option value="brinquedos">Brinquedos</option>
        </select>
        <br>

        <div class="cadastro_vendedor_2_conteudo_telefone">
          <!-- Telefone 1 -->
          <div class="cadastro_vendedor_2_telefone1">
            <label for="telefone1">Telefone 1</label> <br>
            <input type="tel" name="telefone1" id="telefone1" placeholder="DDD + Número" required>
            <br>
          </div>

          <!-- Telefone 2 -->
          <div class="cadastro_vendedor_2_telefone2">
            <label for="telefone2">Telefone 2</label> <br>
            <input type="tel" name="telefone2" id="telefone2" placeholder="DDD + Número">
            <br>
          </div>
        </div>
      </div>
    </div>
    <div class="cadastro_vendedor_2_botao" onclick="pag('vendedor/perfil_vendedor')">
      <h1>Finalizar Cadastro</h1>
    </div>
  </div>
</body>

</html>