<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Gerenciar Propagandas - E ao Quadrado";
$css = ["/css/admin/GerenciarPropagandas.css"];
require_once('./utils/head.php');
?>

<body>
  <?php
  include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <main class="gerenciar_propagandas_body_container">
    <div class="gerenciar_propagandas_firula_holder">
      <div class="gerenciar_propagandas_header_holder">
        <div class="gerenciar_propagandas_header_title_1">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/carrossel_icon.svg" />
          <h1 class="gerenciar_propagandas_text_header">GERENCIAR PROPAGANDAS</h1>
        </div>
        <div class="gerenciar_propagandas_linha_sublinhado"></div>
      </div>
      <div class="gerenciar_propagandas_body_holder">
        <div class="gerenciar_propagandas_main_content">
          <div class="gerenciar_propagandas_quadrado_container">
            <div class="gerenciar_propagandas_pesquisar_pedidos">
              <div class="gerenciar_propagandas_subtitulo_generico">
                <div class="gerenciar_propagandas_linha_vertical"></div>
                <div class="gerenciar_propagandas_subtitle_holder">
                  <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/lista_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Pesquisar</p>
                </div>
              </div>
              <form action="" method="post" class="gerenciar_propagandas_forms_pesquisa_pedidos">
                <div class="gerenciar_propagandas_form_cliente">
                  <h2>Digite o ID e o E-mail do usuário para encontrá-lo.</h2>
                  <label class="font_subtitulo font_celadon">ID do Usuário</label>
                  <input type="text" spellcheck="false" class="base_input">
                </div>
                <div class="gerenciar_propagandas_inputs_esquerda">
                  <div class="gerenciar_propagandas_input_status">
                    <label for="select_cod" class="font_subtitulo font_celadon">Email</label>
                    <input class="gerenciar_propagandas_select_status base_input" type="text">
                  </div>
                </div>
              </form>
            </div>

            <div class="gerenciar_propagandas_carrossel">
              <div class="gerenciar_propagandas_subtitulo_generico">
                <div class="gerenciar_propagandas_linha_vertical"></div>
                <div class="gerenciar_propagandas_subtitle_holder">
                  <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/lista_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Propagandas do Carrossel</h2>
                </div>
              </div>

              <div class="propagandas_carrossel_preview">
                <div class="upload_imagem upload_imagem_1">
                  <label class="titulo" for="file1">Imagem do propaganda (1400x300):</label>
                  <input type="file" id="file1" accept="image/*" data-size="1400x300" />
                  <label for="file1" class="btn_upload">Selecionar imagem</label>
                  <label for="" class="size_img"></label>
                </div>
                <div class="upload_imagem upload_imagem_1">
                  <label class="titulo" for="file2">Imagem do propaganda (1400x300):</label>
                  <input type="file" id="file2" accept="image/*" data-size="1400x300" />
                  <label for="file2" class="btn_upload">Selecionar imagem</label>
                  <label for="" class="size_img"></label>
                </div>
                <div class="upload_imagem upload_imagem_1">
                  <label class="titulo" for="file3">Imagem do propaganda (1400x300):</label>
                  <input type="file" id="file3" accept="image/*" data-size="1400x300" />
                  <label for="file3" class="btn_upload">Selecionar imagem</label>
                  <label for="" class="size_img"></label>
                </div>
                <div class="upload_imagem upload_imagem_1">
                  <label class="titulo" for="file4">Imagem do propaganda (1400x300):</label>
                  <input type="file" id="file4" accept="image/*" data-size="1400x300" />
                  <label for="file4" class="btn_upload">Selecionar imagem</label>
                  <label for="" class="size_img"></label>
                </div>
                <button type="submit" class="base_botao btn_blue">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/+_branco_icon.svg" />
                    Enviar
                  </button>
              </div>
            </div>

            <div class="gerenciar_propagandas_uploads">
              <div class="gerenciar_propagandas_subtitulo_generico">
                <div class="gerenciar_propagandas_linha_vertical"></div>
                <div class="gerenciar_propagandas_subtitle_holder">
                  <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/lista_icon.svg" />
                  <h2 class="font_subtitulo font_celadon">Adicionar Propagandas</h2>
                </div>
              </div>

              <form id="formPropagandas">
                <div class="gerenciar_propagandas_uploads_grid">
                  <div class="upload_imagem">
                    <label class="titulo" for="file5">Propaganda 1 (670x300):</label>
                    <input type="file" id="file5" accept="image/*" data-size="670x300" />
                    <label for="file5" class="btn_upload">Selecionar imagem</label>
                    <label for="" class="size_img"></label>
                  </div>

                  <div class="upload_imagem">
                    <label class="titulo" for="file6">Propaganda 2 (670x300):</label>
                    <input type="file" id="file6" accept="image/*" data-size="670x300" />
                    <label for="file6" class="btn_upload">Selecionar imagem</label>
                    <label for="" class="size_img"></label>
                  </div>

                  <div class="upload_imagem">
                    <label class="titulo" for="file7">Propaganda 3 (670x125):</label>
                    <input type="file" id="file7" accept="image/*" data-size="670x125" />
                    <label for="file7" class="btn_upload">Selecionar imagem</label>
                    <label for="" class="size_img"></label>
                  </div>

                  <div class="upload_imagem">
                    <label class="titulo" for="file8">Propaganda 4 (670x125):</label>
                    <input type="file" id="file8" accept="image/*" data-size="670x125" />
                    <label for="file8" class="btn_upload">Selecionar imagem</label>
                    <label for="" class="size_img"></label>
                  </div>

                  <button type="submit" class="base_botao btn_blue">
                    <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/+_branco_icon.svg" />
                    Enviar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  </main>
</body>
<script src="<?= $PATH_PUBLIC ?>/js/admin/GerenciarPropagandas.js"></script>
<script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>

</html>