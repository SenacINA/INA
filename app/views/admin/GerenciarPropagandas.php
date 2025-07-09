<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Gerenciar Propagandas - E ao Quadrado";
$css = ["/css/admin/GerenciarPropagandas.css"];
require_once('./utils/head.php');
?>

<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main class="gerenciar_propagandas_body_container">
    <div class="gerenciar_propagandas_header_holder">
      <div class="gerenciar_propagandas_header_title_1">
        <img class="base_icon" src="<?= htmlspecialchars($PATH_PUBLIC) ?>/image/geral/icons/carrossel_icon.svg" alt="Ícone Carrossel" />
        <h1 class="gerenciar_propagandas_text_header">GERENCIAR PROPAGANDAS</h1>
      </div>
      <div class="gerenciar_propagandas_linha_sublinhado"></div>
    </div>

    <div class="gerenciar_propagandas_body_holder">
      <div class="gerenciar_propagandas_quadrado_container">

        <div class="gerenciar_propagandas_carrossel">
          <div class="gerenciar_propagandas_subtitulo_generico">
            <div class="gerenciar_propagandas_linha_vertical"></div>
            <div class="gerenciar_propagandas_subtitle_holder">
              <img class="base_icon" src="<?= htmlspecialchars($PATH_PUBLIC) ?>/image/geral/icons/lista_icon.svg" alt="Ícone Lista" />
              <h2 class="font_subtitulo font_celadon">Propagandas do Carrossel</h2>
            </div>
          </div>

          <div class="propagandas_carrossel_preview">
            <?php for ($i = 0; $i < 4; $i++):
              $imgCarrossel = $carrossel[$i]['endereco_carrossel'] ?? null;
            ?>
              <div class="upload_imagem upload_imagem_1">
                <label class="titulo" for="file<?= $i + 1 ?>">Imagem do carrossel (1400x600):</label>
                <input type="file" id="file<?= $i + 1 ?>" accept="image/*" data-size="1400x600" />
                <label for="file<?= $i + 1 ?>" class="btn_upload">Selecionar imagem</label>
                <span class="size_img"></span>

                <?php if ($imgCarrossel): ?>
                  <img src="<?= htmlspecialchars($imgCarrossel) ?>" alt="Carrossel <?= $i + 1 ?>" />
                <?php else: ?>
                  <div class="placeholder">Nenhuma imagem</div>
                <?php endif; ?>
              </div>
            <?php endfor; ?>

            <button type="button" class="base_botao btn_blue" id="btnEnviarCarrossel">
              <img src="<?= htmlspecialchars($PATH_PUBLIC) ?>/image/geral/botoes/+_branco_icon.svg" alt="Ícone Mais" />
              ENVIAR CARROSSEL
            </button>
          </div>
        </div>

        <div class="gerenciar_propagandas_uploads">
          <div class="gerenciar_propagandas_subtitulo_generico">
            <div class="gerenciar_propagandas_linha_vertical"></div>
            <div class="gerenciar_propagandas_subtitle_holder">
              <img class="base_icon" src="<?= htmlspecialchars($PATH_PUBLIC) ?>/image/geral/icons/lista_icon.svg" alt="Ícone Lista" />
              <h2 class="font_subtitulo font_celadon">Adicionar Propagandas</h2>
            </div>
          </div>

          <form id="formPropagandas">
            <div class="gerenciar_propagandas_uploads_grid">
              <?php
              $propSizes = ['670x300', '670x300', '670x125', '670x125'];
              for ($j = 0; $j < 4; $j++):
                $inputId = 5 + $j;
                $size = $propSizes[$j];

                if ($size === '670x300') {
                  $imgPropaganda = $propagandas_300[$j]['endereco_imagem'] ?? null;
                } else {
                  $imgPropaganda = $propagandas_125[$j - 2]['endereco_imagem'] ?? null;
                }
              ?>
                <div class="upload_imagem">
                  <label class="titulo" for="file<?= $inputId ?>">Propaganda <?= $j + 1 ?> (<?= htmlspecialchars($size) ?>):</label>
                  <input
                    type="file"
                    id="file<?= $inputId ?>"
                    accept="image/*"
                    data-size="<?= htmlspecialchars($size) ?>"
                    data-index="<?= $j ?>"
                    data-tipo="<?= $size ?>" />
                  <label for="file<?= $inputId ?>" class="btn_upload">Selecionar imagem</label>
                  <span class="size_img"></span>

                  <?php if ($imgPropaganda): ?>
                    <img src="<?= htmlspecialchars($imgPropaganda) ?>" alt="Propaganda <?= $j + 1 ?>" />
                  <?php else: ?>
                    <div class="placeholder">Nenhuma imagem</div>
                  <?php endif; ?>
                </div>
              <?php endfor; ?>


              <button type="button" class="base_botao btn_blue" id="btnEnviarPropagandas">
                <img src="<?= htmlspecialchars($PATH_PUBLIC) ?>/image/geral/botoes/+_branco_icon.svg" alt="Ícone Mais" />
                ENVIAR PROPAGANDAS
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

<script src="<?= htmlspecialchars($PATH_PUBLIC) ?>/js/admin/GerenciarPropagandas.js"></script>
<script type="module" src="<?= htmlspecialchars($PATH_COMPONENTS) ?>/js/Toast.js"></script>

</html>