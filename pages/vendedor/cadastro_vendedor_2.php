<!-- PROBLEMA NA RESPONSIVIDADE -->
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
    <div class="cadastro_vendedor2_content">
      <div class="cadastro_vendedor2_titulo">
        <div class="cadastro_vendedor2_titulo_img">
          <img src="" alt="">
          <h1>CADASTRO DE VENDEDOR</h1>
        </div>
        <hr>
      </div>
      <div class="cadastro_vendedor_2_grid_conteudo">
        <div class="cadastro_vendedor_2_grid_conteudo_1">
          <div class="cadastro_vendedor_2_text_1">
            <hr class="cadastro_vendedor_2_vertical">
            <img src="../../image/admin/cadastro_vendedor_2/texto_icon.svg" alt="">
            <h1 class="cadastro_vendedor_2_text">Seu Perfil</h1>
          </div>
          <!-- Local da Empresa -->
          <div>
            <label for="local_da_empresa">Local da Empresa</label> <br>
            <select name="local_da_empresa" id="local_da_empresa" class="base_input">
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
            <h2>Se você não tiver uma empresa, informe o estado de sua residência.</h2>
          </div>

          <!-- CEP -->
          <div>
            <label for="cep">CEP</label> <br>
            <input type="text" name="cep" id="cep" class="base_input">
            <br>
          </div>
          
          <div class="cadastro_vendedor_2_conteudo_endereco1">
            <!-- Logradouro -->
            <div class="cadastro_vendedor_2_logradouro">
              <label for="logradouro">Logradouro</label> <br>
              <input type="text" name="logradouro" id="logradouro" class="base_input">
            </div>

            <!-- Número -->
            <div class="cadastro_vendedor_2_numero">
              <label for="numero">Número</label> <br>
              <input type="text" name="numero" id="numero" class="base_input">
            </div>
          </div>

          <!-- Nome / Razão Social -->
          <div>
            <label for="nome_razao_social">Nome / Razão Social</label> <br>
            <input type="text" name="nome_razao_social" id="nome_razao_social" class="base_input">
            <br>
          </div>
               
          <div class="cadastro_vendedor_2_conteudo_endereco2">
            <!-- CPF / CNPJ -->
            <div class="cadastro_vendedor_2_cpf_cnpj">
              <label for="cpf_cnpj">CPF / CNPJ</label> <br>
              <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="base_input">
            </div>

            <!-- RG -->
            <div class="cadastro_vendedor_2_rg">
              <label for="rg">RG</label> <br>
              <input type="text" name="rg" id="rg" class="base_input">
            </div>
          </div>
        </div>

        <div class="cadastro_vendedor_2_grid_conteudo_2">
          <div class="cadastro_vendedor_2_text_2">
            <hr class="cadastro_vendedor_2_vertical">
            <img src="" alt="">
            <h1 class="cadastro_vendedor_2_text">Seu Perfil</h1>
          </div>

          <!-- E-mail -->
          <div>
            <label for="email">E-mail</label> <br>
            <input type="email" name="email" id="email" class="base_input">
            <h2>O código de confirmação será enviado para esse E-mail. </h2>
          </div>
        
          <!-- Senha -->
          <div>
            <label for="senha">Senha</label> <br>
            <input type="password" name="senha" id="senha" class="base_input">
            <br>
          </div>
          
          <!-- Confirmar Senha -->
          <div>
            <label for="confirmar_senha">Confirmar Senha</label> <br>
            <input type="password" name="confirmar_senha" id="confirmar_senha" class="base_input">
            <br>
          </div>
          
          <!-- Categoria de Produtos -->
          <div>
            <label for="categoria_produtos">Categoria de Produtos</label> <br>
            <select name="categoria_produtos" id="categoria_produtos" class="base_input">
              <option value="opc1">Opção 1</option>
              <option value="opc2">Opção 2</option>
              <option value="opc3">Opção 3</option>
              <option value="opc4">Opção 4</option>
              <option value="opc5">Opção 5</option>
            </select>
            <br>
          </div>        
          
          <div class="cadastro_vendedor_2_conteudo_telefone">
            <!-- Telefone 1 -->
            <div class="cadastro_vendedor_2_telefone1">
              <label for="telefone1">Telefone 1</label> <br>
              <input type="tel" name="telefone1" id="telefone1" class="base_input">
              <br>
            </div>

            <!-- Telefone 2 -->
            <div class="cadastro_vendedor_2_telefone2">
              <label for="telefone2">Telefone 2</label> <br>
              <input type="tel" name="telefone2" id="telefone2" class="base_input">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="cadastro_vendedor_2_botao botao_input" onclick="pag('vendedor/perfil_vendedor')">
        <img src="../../image/vendedor/cadastro_vendedor_1/v_icon.svg">
        <h1>FINALIZAR</h1>
      </div>
    </div>
  </div>
  <?php
  include_once('../../pages/geral/footer.php');
  ?>
</body>

</html>