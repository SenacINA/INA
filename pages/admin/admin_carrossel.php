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
  <link rel="stylesheet" href="../../css/admin/admin_carrossel.css">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body>
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->

  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="admin_carrossel_quadrado_container">
      <div class="admin_carrossel_content">
        <div class="admin_carrossel_main_text_container">
          <h1 class="admin_carrossel_texto_main_text">
            <img  class="admin_carrossel_img_anuncios" src="../../image/geral/icons/megafone_icon.svg" alt="">
              ANÚNCIOS
            </h1>
          <hr class="admin_carrossel_linha_main_text">
        </div>

        <div class="admin_carrossel_informacoes_anuncio">
          <div class="admin_carrossel_main_informacoes_anuncio">
            <hr class="admin_carrossel_linha_vertical_informacoes_anuncio">
            <h1 class="admin_carrossel_main_text_informacoes_anuncio">
            <p>
            <img src="../../image/geral/icons/info_icon.svg" alt="">
              <defs>
                <clipPath id="clip0_7984_13526">
                  <rect width="19" height="18" fill="white"/>
                </clipPath>
              </defs>
              </svg> INFORMAÇÕES DO ANÚNCIO</h1>
          </div>
          
          <form action="" method="post" class="admin_carrossel_forms_informacoes_anuncio_1">
            <div class="admin_carrossel_input_text_forms">
              <label for="anunciante">Nome do Anunciante</label>
              <input type="text" class="base_input">
            </div>
            <div class="admin_carrossel_input_text_forms">
              <label for="email">E-mail</label>
              <input type="text" class="base_input">
            </div>
          </form>
        </div> 

        <form action="" method="post" class="admin_carrossel_forms_informacoes_anuncio_2">  
          <div class="admin_carrossel_file_container">
            <input  type="file" name="anuncio" id="foto_anuncio" class="admin_carrossel_input_file_forms">
            <div class="admin_carrossel_file_text ">
              <p class="admin_carrossel_enviar_foto">Envie uma Foto</p>
              <p class="admin_carrossel_tamanho_foto">O tamanho do arquivo não deve ultrapassar 2MB</p>
              <p class="admin_carrossel_add_link">adicionar link url</p>
            </div>
          </div>
        </form>
        
        <form action="" method="post" class="admin_carrossel_forms_planos">
          <div class="admin_carrossel_plano1">
            <input type="radio" name="plano" id="plano_anual">
            <label for="plano_anual">Plano Anual</label>
          </div>
          <div class="admin_carrossel_plano2">
            <input type="radio" name="plano" id="plano_semestral">
            <label for="plano_semestral">Plano Semestral</label>
          </div>
          <div class="admin_carrossel_plano3">
            <input type="radio" name="plano" id="plano_mensal">
            <label for="plano_mensal">Plano Mensal</label>
          </div>
        </form>

        <div class="admin_carrossel_buttons_container">
          <button class="admin_carrossel_cancelar_button base_botao" onclick="history.back()">
            <img src="../../image/geral/botoes/x_vermelho_icon.svg">
            Cancelar
          </button>

          <button class="admin_carrossel_excluir_button base_botao" onclick="history.back()">
            <img src="../../image/geral/botoes/lixo_branco_icon.svg">
            Excluir
          </button>

          <button class="admin_carrossel_salvar_button base_botao" onclick="history.back()">
            <img src="../../image/geral/botoes/v_branco_icon.svg">
            Salvar
          </button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>