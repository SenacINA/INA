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
</head>
<body>
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="admin_carrossel_quadrado_container">
      <div class="admin_carrossel_content">
        <div class="admin_carrossel_main_text_container">
          <h1 class="admin_carrossel_texto_main_text"> <img  class="admin_carrossel_img_anuncios" src="../../image/admin/admin_carrossel/admin_anuncios.png" alt="">  ANÚNCIOS</h1>
          <hr class="admin_carrossel_linha_main_text">
        </div>

        <div class="admin_carrossel_informacoes_anuncio">
          <div class="admin_carrossel_main_informacoes_anuncio">
            <hr class="admin_carrossel_linha_vertical_informacoes_anuncio">
            <h1 class="admin_carrossel_main_text_informacoes_anuncio">
            <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
            <g clip-path="url(#clip0_7984_13526)">
              <path d="M9.47294 18C14.2673 18 18.1539 13.9706 18.1539 9C18.1539 4.02944 14.2673 0 9.47294 0C4.67859 0 0.791992 4.02944 0.791992 9C0.791992 13.9706 4.67859 18 9.47294 18Z" fill="#2888b1"/>
              <path d="M7.7832 12.6191C7.72461 12.6191 7.6709 12.624 7.62207 12.6338C7.49512 12.6533 7.43164 12.7754 7.43164 13H11.0352V12.6191C10.9082 12.6191 10.7959 12.6094 10.6982 12.5898C10.3564 12.5312 10.1855 12.2871 10.1855 11.8574V7.08203H11.0352V6.70117H8.3252V12.6191H7.7832ZM8.19336 4.78223C8.19336 4.96777 8.24219 5.14355 8.33984 5.30957C8.54492 5.6709 8.8623 5.85156 9.29199 5.85156C9.46777 5.85156 9.63867 5.80762 9.80469 5.71973C10.1855 5.52441 10.376 5.21191 10.376 4.78223C10.376 4.59668 10.332 4.4209 10.2441 4.25488C10.0293 3.87402 9.71191 3.68359 9.29199 3.68359C9.10645 3.68359 8.93066 3.73242 8.76465 3.83008C8.38379 4.03516 8.19336 4.35254 8.19336 4.78223Z" fill="white"/>
            </g>
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
            <input type="checkbox" name="plano" id="plano_anual">
            <label for="plano_anual">Plano Anual</label>
          </div>
          <div class="admin_carrossel_plano2">
            <input type="checkbox" name="plano" id="plano_semestral">
            <label for="plano_semestral">Plano Semestral</label>
          </div>
          <div class="admin_carrossel_plano3">
            <input type="checkbox" name="plano" id="plano_mensal">
            <label for="plano_mensal">Plano Mensal</label>
          </div>
        </form>

        <div class="admin_carrossel_buttons_container">
          <button class="admin_carrossel_cancelar_button" onclick="history.back()"><img src="../../image/geral/x_botao_vermelho.svg">Cancelar</button>
          <button class="admin_carrossel_excluir_button" onclick="history.back()"><img src="../../image/geral/lixo.svg">Excluir</button>
          <button class="admin_carrossel_salvar_button" onclick="history.back()"><img src="../../image/geral/confirm_botao.svg">Salvar</button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>