<!-- PROBLEMA NA RESPONSIVIDADE -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/vendedor/cadastro_vendedor_1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Atá 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="cadastro_vendedor1_background">
      <div class="cadastro_vendedor1_grid" >   
        <div class="cadastro_vendedor1_titulo">
          <div class="cadastro_vendedor1_titulo_img">
              <img src="../../image/geral/icons/etiqueta_add_icon.svg" alt="">
              <h1>CADASTRO DE VENDEDOR</h1>
          </div>
          <hr>
        </div>

        <div class="cadastro_vendedor1_lista_ordenada" >
          <ol>
              <h1>Bem-Vindo!</h1>
              <li>
                  <h1>Fornecer informações e documentos</h1>
                  <h2>Informações pessoais e comerciais relevantes para cumprir as medidas de identificação e verificação. </h2>
              </li>
              <li>
                  <h1>Aprovação das credênciais</h1>
                  <h2>Os dados fornecidos serão verificados através do nosso sistema de validação. Essa etapa auxilia na confiabilidade das vendas.</h2>
              </li>
              <li>
                  <h1>Cadastro de produtos </h1>
                  <h2>Após a verificação das informações e documentos (5 dias úteis). Faça o registro dos seus produtos. </h2>
              </li>
          </ol>
          <L>
              <h1>Dados necessários:</h1>
              <li>Documento de identidade (RG) ou passaporte válido emitido pelo governo;</li>
              <li>Declaração do banco ou cartão de crédito recente; </li>
              <li>Cartão de crédito ou débito para cobrança;</li>
              <li>Celular ou E-mail. </li>
          </L>
        </div>

        <div class="cadastro_vendedor1_botao_salvar">
            <button class="cadastro_vendedor1_salvar" onclick="pag('vendedor/cadastro_vendedor_2')">
                <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">
                <label>CONTINUAR</label>
            </button>
        </div>
      </div>
    </div>
  </main>
  <?php 
      include_once('../../pages/geral/footer.php');
  ?>
</body>
</html>