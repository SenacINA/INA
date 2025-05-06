<!-- PROBLEMA NA RESPONSIVIDADE -->
<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Cadastro Vendedor - E ao Quadrado";
$css = ["/css/vendedor/cadastro_vendedor_2.css"];
require_once('./utils/head.php');
require_once($PATH_CONTROLLER . "/vendedor/VendedorController.php");
$modelCidade = new VendedorController();
$cidades = $modelCidade->getCidade();
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <div class="cadastro_vendedor_2_grid_bg">
    <div class="cadastro_vendedor2_content">
      <div class="cadastro_vendedor2_titulo">
        <div class="cadastro_vendedor2_titulo_img">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/lista_perfil_icon.svg" alt="">
          <h1>CADASTRO DE VENDEDOR</h1>
        </div>
        <hr>
      </div>
      <div class="cadastro_vendedor_2_grid_conteudo">
        <div class="cadastro_vendedor_2_grid_conteudo_1">
          <div class="cadastro_vendedor_2_text_1">
            <hr class="cadastro_vendedor_2_vertical">
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/loja_icon.svg" alt="">
            <h1 class="cadastro_vendedor_2_text">Loja</h1>
          </div>
          <!-- Local da Empresa -->
          <form action="cadastro-vendedor-forms" method="post">
            <div class="">
              <label for="local_da_empresa">Local da Empresa</label>
              <div class="base_input_select">
                <select name="local_da_empresa" id="local_da_empresa" class="base_input">
                  <option value="" disabled selected>Selecione a cidade</option>
                  <?php
                  foreach ($cidades as $key => $value) {
                    echo "<option value='". str_replace(" ", "_", $value['nome_cidade']) . "'>" . $value['nome_cidade'] . "</option>";
                  }
                  ?>
                  
                </select>
                <h2>Se você não tiver uma empresa, informe o estado de sua residência.</h2>
              </div>
            </div>

            <!-- CEP -->
            <div>
              <label for="cep">CEP</label> <br>
              <input type="text" name="cep" id="cep" class="base_input" onblur="pesquisacep(this.value);">
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
            <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_icon.svg" alt="">
            <h1 class="cadastro_vendedor_2_text">Seu Perfil</h1>
          </div>

          <!-- E-mail -->
          <div class="cadastro_vendedor_2_content_email">
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
            <div class="base_input_select">
              <select name="categoria_produtos" id="categoria_produtos" class="base_input">
                <option value="opc1">Opção 1</option>
                <option value="opc2">Opção 2</option>
                <option value="opc3">Opção 3</option>
                <option value="opc4">Opção 4</option>
                <option value="opc5">Opção 5</option>
              </select>
            </div>
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

      <div class="cadastro_vendedor_2_botao_finalizar">
        <button class="cadastro_vendedor_2_finalizar" onclick="pag('vendedor/perfil_vendedor')">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
          <label>FINALIZAR</label>
        </button>
      </div>
      </form>
    </div>
  </div>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <script src="<?= $PATH_PUBLIC ?>/js/vendedor/cadastro_vendedor.js"></script>
</body>

</html>