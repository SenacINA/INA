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
  <link rel="stylesheet" href="../../css/admin/adicionar_propaganda.css">
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" href="../../css/style.css">
</head>

<body class="admin_carrossel_main_container">
    <?php
    include('../../pages/geral/navbar.php');
    ?>
  <main class="admin_carrossel_quadrado_container">
    <div class="admin_carrossel_main_text_container">
      <h1 class="admin_carrossel_texto_main_text">ANÚNCIOS</h1>
      <hr class="admin_carrossel_linha_main_text">
    </div>
    <div class="admin_carrossel_informacoes_anuncio">
      <hr class="admin_carrossel_linha_vertical_informacoes_anuncio">
      <h1 class="admin_carrossel_main_text_informacoes_anuncio">INFORMAÇÕES DO ANÚNCIO</h1>
    </div>
    <form action="" method="post" class="admin_carrossel_forms_informacoes_anuncio">
      <label for="anunciante">Nome do Anunciante</label>
      <input type="text" class="admin_carrossel_input_text_forms">
      <label for="email">E-mail</label>
      <input type="text" class="admin_carrossel_input_text_forms">
      <input type="file" name="anuncio" id="foto_anuncio" class="admin_carrossel_input_file_forms">
      <div class="file_text">
        <p class="admin_carrossel_enviar_foto">Envie uma Foto</p>
        <p class="admin_carrossel_tamanho_foto">O tamanho do arquivo não deve ultrapassar 2MB</p>
        <p class="admin_carrossel_add_link">adicionar link url</p>
      </div>
    </form>
    <form action="" method="post" class="admin_carrossel_forms_planos">
      <div>
        <input type="radio" name="plano_anual" id="plano">
        <label for="plano">Plano Anual</label>
      </div>
      <div>
        <input type="radio" name="plano_anual" id="plano">
        <label for="plano">Plano Semestral</label>
      </div>
      <div>
        <input type="radio" name="plano_anual" id="plano">
        <label for="plano">Plano Mensal</label>
      </div>
      <div class="admin_carrossel_proxima_cobranca">
        <img src="../../image/admin/adicionar_propaganda/calendario.svg" class="calendario">
        <div>
          <p class="admin_carrossel_proxima_cobranca_text">Próxima Cobrança</p>
          <p class="admin_carrossel_proxima_cobranca_date">18/08/2024</p>
        </div>
      </div>
    </form>
    <div class="admin_carrossel_buttons_container">
      <button class="admin_carrossel_cancelar_button"><img src="../../image/geral/x_botao_vermelho.svg">Cancelar</button>
      <button class="admin_carrossel_excluir_button"><img src="../../image/geral/lixo.svg">Excluir</button>
      <button class="admin_carrossel_salvar_button"><img src="../../image/geral/confirm_botao.svg">Salvar</button>
    </div>
  </main>
  <div class="admin_carrossel_carrossel">
    <img src="../../image/admin/adicionar_propaganda/carrossel.png">
    <img src="../../image/admin/adicionar_propaganda/Retangulos.png">
  </div>
</body>

</html>