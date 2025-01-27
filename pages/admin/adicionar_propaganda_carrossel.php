<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
  <title>E ao Quadrado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="../../css/admin/adicionar_propaganda.css">
</head>
<body class="main_container">
  <nav class="main_navbar"></nav>
  <main class="quadrado_container">
    <div class="main_text_container">
      <h1 class="texto_main_text">ANÚNCIOS</h1>
      <hr class="linha_main_text">
    </div>
    <div class="informacoes_anuncio">
      <hr class="linha_vertical_informacoes_anuncio">
      <h1 class="main_text_informacoes_anuncio">INFORMAÇÕES DO ANÚNCIO</h1>
    </div>
    <form action="" method="post" class="forms_informacoes_anuncio">
      <label for="anunciante">Nome do Anunciante</label>
      <input type="text" class="input_text_forms">
      <label for="email">E-mail</label>
      <input type="text" class="input_text_forms">
      <input type="file" name="anuncio" id="foto_anuncio" class="input_file_forms">
      <div class="file_text">
        <p class="enviar_foto">Envie uma Foto</p>
        <p class="tamanho_foto">O tamanho do arquivo não deve ultrapassar 2MB</p>
        <p class="add_link">adicionar link url</p>
      </div>
    </form>
    <form action="" method="post" class="forms_planos">
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
      <div class="proxima_cobranca">
        <img src="../../image/admin/adicionar_propaganda/calendario.svg" class="calendario">
        <div>
          <p class="proxima_cobranca_text">Próxima Cobrança</p>
          <p class="proxima_cobranca_date">18/08/2024</p>
        </div>
      </div>
    </form>
    <div class="buttons_container">
      <button class="cancelar_button">Cancelar</button>
      <button class="excluir_button">Excluir</button>
      <button class="salvar_button">Salvar</button>
    </div>
  </main>
  <div class="carrossel">
    <img src="../../image/admin/adicionar_propaganda/carrossel.png">
    <img src="../../image/admin/adicionar_propaganda/Retangulos.png">
  </div>
</body>
</html>