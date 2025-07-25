<!-- PROBLEMA NA RESPONSIVIDADE -->
<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Cadastro Vendedor - E ao Quadrado";
$css = ["/css/vendedor/CadastroVendedor_2.css"];
require_once('./utils/head.php');
require_once($PATH_CONTROLLER . "/vendedor/VendedorController.php");
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
          <form action="CadastroVendedorForms" method="post">
            <div class="">
              <label for="local_da_empresa">Local da Empresa</label>
              <div class="base_input_select">
                <select name="local_da_empresa" id="localizacaoSelect" class="base_input">
                  <option value="<?= isset($user['localizacao']) ? $user['localizacao'] : '' ?>">
                    <?= isset($user['localizacao'])? $user['localizacao'] : 'Selecione uma localização' ?>
                  </option>
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
            <input value="<?= $user['email_cliente'] ?>" type="email" name="email" id="email" class="base_input">
            <h2>O código de confirmação será enviado para esse E-mail. </h2>
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
        <button class="cadastro_vendedor_2_finalizar" type='submit'>
          <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg" alt="">
          <label>FINALIZAR</label>
        </button>
      </div>
      </form>
    </div>
  </div>
  <script type='module' src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        let errors = <?php echo json_encode($errors ?? []); ?>;
        
        if (errors.length > 0) {
            errors.forEach(error => {
                gerarToast(error, "erro");
            });
        }
    });
  </script>
  <?php
  include_once("$PATH_COMPONENTS/php/footer.php");
  ?>
  <script src="<?= $PATH_PUBLIC ?>/js/vendedor/CadastroVendedor.js"></script>
  <script type='module' src="<?= $PATH_PUBLIC ?>/js/geral/SelectUfCidades.js"></script>

</body>

</html>