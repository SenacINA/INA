<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Gerenciar Carrossel - E ao Quadrado";
  $css = ["/css/admin/AdminCarrossel.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main>
    <div class="admin_carrossel_quadrado_container">
      <div class="admin_carrossel_content">
        <div class="admin_carrossel_main_text_container">
          <h1 class="admin_carrossel_texto_main_text">
            <img class="admin_carrossel_img_anuncios base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/megafone_icon.svg" alt="">
              ANÚNCIOS
            </h1>
          <hr class="admin_carrossel_linha_main_text">
        </div>

        <div class="admin_carrossel_informacoes_anuncio">
          <div class="admin_carrossel_main_informacoes_anuncio">
            <hr class="admin_carrossel_linha_vertical_informacoes_anuncio">
            <h1 class="admin_carrossel_main_text_informacoes_anuncio">
            <p>
            <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/info_icon.svg" alt="">
              INFORMAÇÕES DO ANÚNCIO</h1>
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
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_vermelho_icon.svg">
            Cancelar
          </button>

          <button class="admin_carrossel_excluir_button base_botao" onclick="history.back()">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/lixo_branco_icon.svg">
            Excluir
          </button>

          <button class="admin_carrossel_salvar_button base_botao" onclick="history.back()">
            <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg">
            Salvar
          </button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>