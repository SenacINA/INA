<!DOCTYPE html>
<html lang="pt-br">

<?php
  $css = ["/css/cliente/editar_perfil_cliente.css"];
  require_once("./utils/head.php")
?>

<?php
  $errors  = $errors  ?? [];
  $success = $success ?? null;
  $bannerDefault = "/image/cliente/editar_perfil/mini_banner_perfil_cliente.png";
  $fotoDefault   = "/image/cliente/editar_perfil/perfil_usuario.svg";
  $bannerSrc = !empty($user['banner_perfil'])
    ? $user['banner_perfil']
    : $bannerDefault;
  $fotoSrc   = !empty($user['foto_perfil'])
    ? $user['foto_perfil']
    : $fotoDefault;
?>

<body>
  <!-- Até 375px -->  

  <?php
    include_once("$PATH_COMPONENTS/php/navbar.php");
  ?>
  <div class="title_mobile">
    <div class="title_text">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg">
      <h1 class="font_titulo title_main_text">Editar perfil</h1>
    </div>
  </div>
  <main class="quadrado_cliente">
    <div class="title">
      <div class="title_text">
        <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg">
        <h1 class="font_titulo title_main_text">Editar perfil</h1>
      </div>
      <hr class="linha_title">
    </div>
    <div class="mini_perfil_cliente">
      <img src="<?=$PATH_PUBLIC . $bannerSrc ?>" id='miniBanner' alt="banner" class="banner_cliente">
      <img src="<?= $PATH_PUBLIC . $fotoSrc ?>" id='miniPfp' alt="pfp_cliente" class="pfp_cliente">
      <div class="infos_container">
        <div class="nome_cliente">
          <h1 class="nome_cliente"><?= htmlspecialchars($user['nome_cliente']) ?></h1>
        </div>
        <div class="produtos_cliente_container">
          <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/balao_exclamacao_icon.svg">
          <p class="avaliacao_cliente">Ativo há: Agora</p>
        </div>
        <div class="avaliacao_cliente_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/localizacao_icon.svg" class="icon_produtos_cliente">
          <p class="produtos_cliente">
            <?= isset($user['nome_cidade']) && isset($user['nome_estado']) ? 
                htmlspecialchars($user['nome_cidade']) . ", " . htmlspecialchars($user['nome_estado']) : 
                "Localização não disponível" ?>
          </p>
        </div>
        <div class="tempo_cliente_container">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_membros_icon.svg">
          <p class="tempo_cliente">
            <?php
              $dataRegistro = $user['data_registro_cliente'];
              $diasCliente = (strtotime(date('Y-m-d')) - strtotime($dataRegistro)) / 86400;
              echo "Cliente há: " . round($diasCliente) . " Dias";
            ?>
        </p>
        </div>
      </div>
      <div class="contatos_container">
        <div class="contatos_cliente">
            <?php if (!empty($user['instagram_perfil'])): ?>
                <div class="rede_social">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" class="icon_instagram_cliente">
                    <span class="instagram_cliente"><?= htmlspecialchars($user['instagram_perfil']) ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['facebook_perfil'])): ?>
                <div class="rede_social">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" class="icon_facebook_cliente">
                    <span class="facebook_cliente"><?= htmlspecialchars($user['facebook_perfil']) ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['x_perfil'])): ?>
                <div class="rede_social">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/x_twitter_icon.svg" class="icon_x_cliente">
                    <span class="x_cliente"><?= htmlspecialchars($user['x_perfil']) ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['linkedin_perfil'])): ?>
                <div class="rede_social">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/linkedin_icon.svg" class="icon_linkedin_cliente">
                    <span class="linkedin_cliente"><?= htmlspecialchars($user['linkedin_perfil']) ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['youtube_perfil'])): ?>
                <div class="rede_social">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/youtube_icon.svg" class="icon_youtube_cliente">
                    <span class="youtube_cliente"><?= htmlspecialchars($user['youtube_perfil']) ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($user['tiktok_perfil'])): ?>
                <div class="rede_social">
                    <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/tiktok_icon.svg" class="icon_tiktok_cliente">
                    <span class="tiktok_cliente"><?= htmlspecialchars($user['tiktok_perfil']) ?></span>
                </div>
            <?php endif; ?>
        </div>
        <hr class="separador_mini_perfil">

      </div>
    </div>
    </div>
    <div class="forms">
      <!-- FORM NOME, LOC -->
      <form method="POST" action='editar-perfil-cliente' class="forms_container">
        <div class="forms_inner_container">
          <label for="nomeCliente" class="inner">Nome:</label>
          <input type="text" name="nomeCliente" id="nomeCliente" class="base_input nome_cliente_forms" value='<?= htmlspecialchars($user['nome_cliente']) ?>'>
        </div>
        <div class="forms_inner_container">
          <label for="localizacaoCliente">Localização:</label>
          <select name="localizacaoCliente" id="localizacaoCliente" class="base_input">
            <option value="">Selecione uma localização</option>
            <?php foreach ($localizacoes as $loc): 
                $cidadeId = $loc['id_cidade'];
                $nomeCidade = $loc['nome_cidade'];
                $siglaEstado = $loc['sigla_estado'];
                $valor = "$siglaEstado - $nomeCidade";
                
                $selected = (isset($user['nome_cidade']) && isset($user['sigla_estado']) &&
                            $user['nome_cidade'] === $nomeCidade &&
                            $user['sigla_estado'] === $siglaEstado) ? 'selected' : '';
            ?>
              <option value="<?= htmlspecialchars($cidadeId) ?>" <?= $selected ?>>
                <?= htmlspecialchars($valor) ?>
              </option>
            <?php endforeach; ?>
          </select>


        </div>
      </form>
      <div class="botoes_redefinir">
        <button type="button" onclick="pag('redefinir-senha')" class='base_botao btn_blue redefinir_senha_cliente'>
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
          Redefinir senha
        </button>

        <button type="button" onclick="pag('trocar-email')" class="base_botao btn_blue trocar_email_cliente">
          <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/sair_branco_icon.svg" alt="">
          Trocar email
        </button>
      </div>
      <div class="redes_sociais_cliente">
        <div class="redes_text">
          <hr class="linha_vertical">
          <p class="main_text_redes">Redes Sociais:</p>
        </div>
        <div class="redes_edit">
          <?php if (!empty($user['instagram_perfil'])): ?>
              <div class='redes_div'>
                  <img src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg" alt="instagram">
                  <a href="https://instagram.com/<?= htmlspecialchars($user['instagram_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['instagram_perfil']) ?></a>
              </div>
          <?php endif; ?>

          <?php if (!empty($user['facebook_perfil'])): ?>
              <div class='redes_div'>
                  <img src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg" alt="facebook">
                  <a href="https://facebook.com/<?= htmlspecialchars($user['facebook_perfil']) ?>" class="link_rede"><?= htmlspecialchars($user['facebook_perfil']) ?></a>
              </div>
          <?php endif; ?>

          <?php if (!empty($user['x_perfil'])): ?>
              <div class='redes_div'>
                  <img src="<?=$PATH_PUBLIC?>/image/geral/icons/x_twitter_icon.svg" alt="x.com">
                  <a href="https://x.com/<?= htmlspecialchars($user['x_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['x_perfil']) ?></a>
              </div>
          <?php endif; ?>

          <?php if (!empty($user['linkedin_perfil'])): ?>
              <div class='redes_div'>
                  <img src="<?=$PATH_PUBLIC?>/image/geral/icons/linkedin_icon.svg" alt="linkedin">
                  <a href="https://linkedin.com/in/<?= htmlspecialchars($user['linkedin_perfil']) ?>" class="link_rede"><?= htmlspecialchars($user['linkedin_perfil']) ?></a>
              </div>
          <?php endif; ?>

          <?php if (!empty($user['youtube_perfil'])): ?>
              <div class='redes_div'>
                  <img src="<?=$PATH_PUBLIC?>/image/geral/icons/youtube_icon.svg" alt="youtube">
                  <a href="https://youtube.com/@<?= htmlspecialchars($user['youtube_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['youtube_perfil']) ?></a>
              </div>
          <?php endif; ?>

          <?php if (!empty($user['tiktok_perfil'])): ?>
              <div class='redes_div'>
                  <img src="<?=$PATH_PUBLIC?>/image/geral/icons/tiktok_icon.svg" alt="tiktok">
                  <a href="https://tiktok.com/@<?= htmlspecialchars($user['tiktok_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['tiktok_perfil']) ?></a>
              </div>
          <?php endif; ?>
      </div>


          <?php if (!empty($user['youtube'])): ?>
            <div>
              <img src="<?=$PATH_PUBLIC?>/image/geral/icons/youtube_icon.svg" alt="youtube">
              <a href="https://youtube.com/<?= htmlspecialchars($user['youtube']) ?>" class="link_rede"><?= htmlspecialchars($user['youtube']) ?></a>
            </div>
          <?php endif; ?>

          <?php if (!empty($user['tiktok'])): ?>
            <div>
              <img src="<?=$PATH_PUBLIC?>/image/geral/icons/tiktok_icon.svg" alt="tiktok">
              <a href="https://tiktok.com/@<?= htmlspecialchars($user['tiktok']) ?>" class="link_rede">@<?= htmlspecialchars($user['tiktok']) ?></a>
            </div>
          <?php endif; ?>
        </div>

        <button class="base_botao btn_blue botao_edit" id="botao_editar">
          <img src="<?=$PATH_PUBLIC?>/image/geral/icons/caneta_branca_icon.svg" alt="">
          Editar
        </button>
      </div>
    </div>
    <div class="edit_foto">
      <div class="foto_container">
        <div class="foto_text">
          <hr class="linha_vertical">
          <p class="text_pfp">Imagem de Perfil:</p>
        </div>
        <!-- Foto de perfil -->
        <button class="img_container" type="button" onclick="document.getElementById('fileInputFoto').click();">
          <input type="file" id="fileInputFoto" name="foto" style="display: none;" accept="image/*" />
          <img id="imgPreviewFoto" src="<?=$PATH_PUBLIC . $fotoSrc ?>">
        </button>
        <p class="warn">As dimensões recomendadas são: 400 x 400 pixels.</p>
      </div>
      <div class="banner_container">
        <div class="banner_text">
          <hr class="linha_vertical">
          <p class="text_banner">Imagem de Banner:</p>
        </div>
        <button class="img_container" type="button" onclick="document.getElementById('fileInputBanner').click();">
          <input type="file" id="fileInputBanner" name="banner" style="display: none;" accept="image/*" />
          <img id="imgPreviewBanner" src="<?= $PATH_PUBLIC . $bannerSrc ?>" class="banner_cliente_forms">
        </button>
        <p class="warn">As dimensões recomendadas são: 1500 x 500 pixels.</p>
      </div>
    </div>
    <div class="botoes">
      <button id=salvarEdit class="base_botao btn_blue salvar">
        <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg">Salvar
      </button>
      <button class="base_botao btn_outline_red cancelar">
        <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_vermelho_icon.svg">Cancelar
      </button>
    </div>
  </main>
  <div class="popup_container" id="popup">
    <div class="popup">
        <div class="text_popup">
            <hr class="linha_vertical">
            <h1 class="font_titulo">Redes Sociais</h1>
            <div>
                <button class="fechar" id="close_btn">
                  <img class='base_icon' src="<?=$PATH_PUBLIC?>/image/geral/botoes/x_azul_icon.svg" alt="">
                </button>
            </div>
        </div>
        <!-- FORM POPUP ALTERAR REDE -->
        <form id='redesForm' class="forms_redes_sociais">
            <div>
                <label for="instagram"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/instagram_icon.svg">Instagram *</label>
                <input class="base_input" type="text" name="instagram" value="<?= isset($user['instagram_perfil']) ? htmlspecialchars($user['instagram_perfil']) : '' ?>" placeholder="Username">
                
                <label for="facebook"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/facebook_icon.svg">Facebook *</label>
                <input class="base_input" type="text" name="facebook" value="<?= isset($user['facebook_perfil']) ? htmlspecialchars($user['facebook_perfil']) : '' ?>" placeholder="Username">
                
                <label for="x"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/x_twitter_icon.svg">X.com *</label>
                <input class="base_input" type="text" name="x" value="<?= isset($user['x_perfil']) ? htmlspecialchars($user['x_perfil']) : '' ?>"
                placeholder="Username">
            </div>
            <div>
                <label for="linkedin"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/linkedin_icon.svg">Linkedin *</label>
                <input class="base_input" type="text" name="linkedin" value="<?= isset($user['linkedin_perfil']) ? htmlspecialchars($user['linkedin_perfil']) : '' ?>"
                placeholder="Username">
                
                <label for="youtube"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/youtube_icon.svg">Youtube *</label>
                <input class="base_input" type="text" name="youtube" value="<?= isset($user['youtube_perfil']) ? htmlspecialchars($user['youtube_perfil']) : '' ?>"
                placeholder="Username">
                
                <label for="tiktok"><img src="<?=$PATH_PUBLIC?>/image/geral/icons/tiktok_icon.svg">Tiktok *</label>
                <input class="base_input" type="text" name="tiktok" value="<?= isset($user['tiktok_perfil']) ? htmlspecialchars($user['tiktok_perfil']) : '' ?>"
                placeholder="Username">
            </div>
            <p>* Opcional</p>
            <button class="base_botao btn_blue" type='submit'><img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg">Salvar</button>
        </form>
    </div>
  </div>
  <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
  ?>

</body>

<script src="<?=$PATH_PUBLIC?>/js/cliente/editar_perfil_cliente.js"></script>
<script src="<?=$PATH_PUBLIC?>/js/cliente/updateSocial.js"></script>
<script src="<?=$PATH_PUBLIC?>/js/cliente/pfp_input.js"></script>
<script type="module" src="<?=$PATH_COMPONENTS?>/js/toast.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    <?php foreach($errors as $e): ?>
      gerarToast("<?= addslashes($e) ?>", "erro");
    <?php endforeach; ?>

    <?php if ($success): ?>
      gerarToast("<?= addslashes($success) ?>", "sucesso");
    <?php endif; ?>
  });
</script>

</html>
