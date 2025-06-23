<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Editar Perfil - E ao Quadrado";
$css = ["/css/vendedor/EditarPerfilVendedor.css"];
require_once('./utils/head.php');
include("$PATH_COMPONENTS/php/card_produto.php");
?>

<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>
  <div class="title_mobile">
    <div class="title_text">
      <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_icon.svg">
      <h1 class="font_titulo title_main_text">Editar perfil</h1>
    </div>
  </div>
  <main class="quadrado_vendedor">
    <div class="title">
      <div class="title_text">
        <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_icon.svg">
        <h1 class="font_titulo title_main_text">Editar perfil</h1>
      </div>
      <hr class="linha_title">
    </div>
    <div class='coluna_quadrado'>
      <div class="mini_perfil_vendedor">
        <img src="<?= $PATH_PUBLIC . $user['banner_perfil'] ?>" id='miniBanner' alt="banner" class="banner_vendedor">
        <div class='pfp_info_vendedor'>
          <img src="<?= $PATH_PUBLIC . $user['foto_perfil'] ?>" id='miniPfp' alt="pfp_vendedor" class="pfp_vendedor">
          <div class="infos_container">
            <div class="nome_vendedor">
              <h1 class="nome_vendedor"><?= htmlspecialchars($vendedor['nome_fantasia']) ?></h1>
            </div>
            <div class="produtos_vendedor_container">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/loja_icon.svg" class="icon_produtos_vendedor">
              <p class="produtos_vendedor">Produtos: <?= htmlspecialchars($vendedor['quantidadeProdutos'] ?? '0') ?></p>
            </div>
            <div class="avaliacao_vendedor_container">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/estela_icon.svg">
              <p class="avaliacao_vendedor">Avaliação geral: <?= htmlspecialchars($vendedor['mediaEstrelas'] ?? '0') ?></p>
            </div>
            <div class="tempo_vendedor_container">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/perfil_membros_icon.svg">
              <p class="tempo_vendedor">Vendedor há: <?= htmlspecialchars($vendedor['tempo'] ?? '0 meses') ?></p>
            </div>
            <div class="localizacao_vendedor_container">
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/localizacao_icon.svg">
              <p class="localizacao_vendedor"><?= $user['localizacao'] ?></p>
            </div>
          </div>
        </div>

        <hr class="separador_mini_perfil">
        <div class="about_container">
          <div class='about_title'>
            <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/texto_icon.svg" class="icon_about_us">
            <h1 class="sobre_nos_vendedor">Sobre:</h1>
          </div>
          <p class="text_about"><?= nl2br(htmlspecialchars($user['descricao_perfil'] ?? 'Sem descrição.')) ?></p>
        </div>
        <div class="contatos_container">
          <div class="contatos_vendedor">
            <?php if (!empty($user['instagram_perfil'])): ?>
              <div class="rede_social">
                <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/instagram_icon.svg" class="icon_instagram_cliente">
                <span class="instagram_cliente"><?= htmlspecialchars($user['instagram_perfil']) ?></span>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['facebook_perfil'])): ?>
              <div class="rede_social">
                <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/facebook_icon.svg" class="icon_facebook_cliente">
                <span class="facebook_cliente"><?= htmlspecialchars($user['facebook_perfil']) ?></span>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['x_perfil'])): ?>
              <div class="rede_social">
                <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/x_twitter_icon.svg" class="icon_x_cliente">
                <span class="x_cliente"><?= htmlspecialchars($user['x_perfil']) ?></span>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['linkedin_perfil'])): ?>
              <div class="rede_social">
                <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/linkedin_icon.svg" class="icon_linkedin_cliente">
                <span class="linkedin_cliente"><?= htmlspecialchars($user['linkedin_perfil']) ?></span>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['youtube_perfil'])): ?>
              <div class="rede_social">
                <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/youtube_icon.svg" class="icon_youtube_cliente">
                <span class="youtube_cliente"><?= htmlspecialchars($user['youtube_perfil']) ?></span>
              </div>
            <?php endif; ?>

            <?php if (!empty($user['tiktok_perfil'])): ?>
              <div class="rede_social">
                <img class="base_icon" src="<?= $PATH_PUBLIC ?>/image/geral/icons/tiktok_icon.svg" class="icon_tiktok_cliente">
                <span class="tiktok_cliente"><?= htmlspecialchars($user['tiktok_perfil']) ?></span>
              </div>
            <?php endif; ?>
          </div>
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
            <img id="imgPreviewFoto" src="<?= $PATH_PUBLIC . $user['foto_perfil'] ?>">
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
            <img id="imgPreviewBanner" src="<?= $PATH_PUBLIC . $user['banner_perfil'] ?>" class="banner_vendedor_forms">
          </button>
          <p class="warn">As dimensões recomendadas são: 1500 x 500 pixels.</p>
        </div>
      </div>
    </div>

    <div class="forms">
      <form action="" class="forms_container">
        <div class="forms_inner_container">
          <label for="nomeVendedor" class="inner">Nome:</label>
          <input type="text" name="nomeVendedor" id="nomeVendedor" class="base_input nome_vendedor_forms"
            value="<?= htmlspecialchars($vendedor['nome_fantasia']) ?>">
        </div>
        <div class="forms_inner_container">
          <label for="descricao">Descrição:</label>
          <textarea name="descricao" maxlength="500" id="descricao" cols="90" rows="10" class="base_input"><?= htmlspecialchars($user['descricao_perfil']) ?></textarea>
          <div class="counter"><span id="charCount">0</span> / 500</div>
        </div>
        <div class="forms_inner_container">
          <label for="localizacaoSelect">Localização:</label>
          <select name="localizacaoCliente" id="localizacaoSelect" class="base_input">
            <option value="<?= isset($user['localizacao']) ? $user['localizacao'] : '' ?>">
              <?= isset($user['localizacao']) ? $user['localizacao'] : 'Selecione uma localização' ?>
            </option>
          </select>
        </div>
      </form>
      <div class="botoes_redefinir">
        <button type="button" onclick="pag('RedefinirSenha')" class='base_botao btn_blue redefinir_senha_vendedor'>
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/cadeado_branco_icon.svg" alt="">
          Redefinir senha
        </button>

        <button type="button" onclick="pag('TrocarEmail')" class="base_botao btn_blue trocar_email_vendedor">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/email_branco_icon.svg" alt="">
          Trocar email
        </button>
      </div>
      <div class="redes_sociais_vendedor">
        <div class="redes_text">
          <hr class="linha_vertical">
          <p class="main_text_redes">Redes Sociais:</p>
        </div>
        <div class="redes_edit">
          <?php if (!empty($user['instagram_perfil'])): ?>
            <div class='redes_div'>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/instagram_icon.svg" alt="instagram">
              <a href="https://instagram.com/<?= htmlspecialchars($user['instagram_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['instagram_perfil']) ?></a>
            </div>
          <?php endif; ?>

          <?php if (!empty($user['facebook_perfil'])): ?>
            <div class='redes_div'>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/facebook_icon.svg" alt="facebook">
              <a href="https://facebook.com/<?= htmlspecialchars($user['facebook_perfil']) ?>" class="link_rede"><?= htmlspecialchars($user['facebook_perfil']) ?></a>
            </div>
          <?php endif; ?>

          <?php if (!empty($user['x_perfil'])): ?>
            <div class='redes_div'>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/x_twitter_icon.svg" alt="x.com">
              <a href="https://x.com/<?= htmlspecialchars($user['x_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['x_perfil']) ?></a>
            </div>
          <?php endif; ?>

          <?php if (!empty($user['linkedin_perfil'])): ?>
            <div class='redes_div'>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/linkedin_icon.svg" alt="linkedin">
              <a href="https://linkedin.com/in/<?= htmlspecialchars($user['linkedin_perfil']) ?>" class="link_rede"><?= htmlspecialchars($user['linkedin_perfil']) ?></a>
            </div>
          <?php endif; ?>

          <?php if (!empty($user['youtube_perfil'])): ?>
            <div class='redes_div'>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/youtube_icon.svg" alt="youtube">
              <a href="https://youtube.com/@<?= htmlspecialchars($user['youtube_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['youtube_perfil']) ?></a>
            </div>
          <?php endif; ?>

          <?php if (!empty($user['tiktok_perfil'])): ?>
            <div class='redes_div'>
              <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/tiktok_icon.svg" alt="tiktok">
              <a href="https://tiktok.com/@<?= htmlspecialchars($user['tiktok_perfil']) ?>" class="link_rede">@<?= htmlspecialchars($user['tiktok_perfil']) ?></a>
            </div>
          <?php endif; ?>
        </div>
        <button class="base_botao btn_blue botao_edit" id="botao_editar">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_branca_icon.svg" alt="">
          Editar
        </button>
      </div>
    </div>

    <div class="destaques">
      <div class="destaques_text">
        <hr class="linha_vertical">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/loja_icon.svg" class="icon_destaques_vendedor">
        <p class="destaques_main_text">Destaques</p>
      </div>
      <?php
      include_once("$PATH_CONTROLLER/vendedor/DestaqueController.php");
      $controller = new DestaqueController();
      $destaques = $controller->listarDestaques();
      ?>
      <div class="destaques_container">
        <?php
        $IdVendedor = $_SESSION['cliente_id'];
        include_once("$PATH_COMPONENTS/php/card_produto.php");
        include_once("$PATH_CONTROLLER/geral/CardController.php");

        $card = new cardProduto;
        $controller = new CardController;

        $destaques = $controller->sendDestaques($IdVendedor);
        $card->gerarProdutoCards(6, $destaques);
        ?>
        <button class="add">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/add_icon.svg" alt="Adicionar">
        </button>
      </div>

    </div>

    <div class="produtos" style="display:none;">
      <div class="produtos_text">
        <hr class="linha_vertical">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/loja_icon.svg" class="icon_produtos_vendedor">
        <p class="produtos_main_text">Produtos</p>
      </div>
      <div class="produtos_container">
        <?php
        $IdVendedor = $_SESSION['cliente_id'];

        include_once("$PATH_COMPONENTS/php/card_produto.php");
        include_once("$PATH_CONTROLLER/geral/CardController.php");

        $card = new cardProduto;
        $controller = new CardController;

        $info = $controller->sendProdutosNaoDestaques($IdVendedor);
        $card->gerarProdutoCards(2, $info);
        ?>
      </div>
    </div>
  
    <div class="botoes">
      <button id=salvarEdit class="base_botao btn_blue salvar">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">
        Salvar
      </button>
      <button class="base_botao btn_outline_red cancelar">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/x_vermelho_icon.svg">
        Cancelar
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
            <img class='base_icon' src="<?= $PATH_PUBLIC ?>/image/geral/botoes/x_azul_icon.svg" alt="">
          </button>
        </div>
      </div>
      <!-- FORM POPUP ALTERAR REDE -->
      <form id='redesForm' class="forms_redes_sociais">
        <div>
          <label for="instagram"><img src="<?= $PATH_PUBLIC ?>/image/geral/icons/instagram_icon.svg">Instagram *</label>
          <input class="base_input" id="instagram" type="text" name="instagram" value="<?= isset($user['instagram_perfil']) ? htmlspecialchars($user['instagram_perfil']) : '' ?>" placeholder="Username">

          <label for="facebook"><img src="<?= $PATH_PUBLIC ?>/image/geral/icons/facebook_icon.svg">Facebook *</label>
          <input class="base_input" id="facebook" type="text" name="facebook" value="<?= isset($user['facebook_perfil']) ? htmlspecialchars($user['facebook_perfil']) : '' ?>" placeholder="Username">

          <label for="x"><img src="<?= $PATH_PUBLIC ?>/image/geral/icons/x_twitter_icon.svg">X.com *</label>
          <input class="base_input" id="x" type="text" name="x" value="<?= isset($user['x_perfil']) ? htmlspecialchars($user['x_perfil']) : '' ?>"
            placeholder="Username">
        </div>
        <div>
          <label for="linkedin"><img src="<?= $PATH_PUBLIC ?>/image/geral/icons/linkedin_icon.svg">Linkedin *</label>
          <input class="base_input" id="linkedin" type="text" name="linkedin" value="<?= isset($user['linkedin_perfil']) ? htmlspecialchars($user['linkedin_perfil']) : '' ?>"
            placeholder="Username">

          <label for="youtube"><img src="<?= $PATH_PUBLIC ?>/image/geral/icons/youtube_icon.svg">Youtube *</label>
          <input class="base_input" id="youtube" type="text" name="youtube" value="<?= isset($user['youtube_perfil']) ? htmlspecialchars($user['youtube_perfil']) : '' ?>"
            placeholder="Username">

          <label for="tiktok"><img src="<?= $PATH_PUBLIC ?>/image/geral/icons/tiktok_icon.svg">Tiktok *</label>
          <input class="base_input" id="tiktok" type="text" name="tiktok" value="<?= isset($user['tiktok_perfil']) ? htmlspecialchars($user['tiktok_perfil']) : '' ?>"
            placeholder="Username">
        </div>
        <p>* Opcional</p>
        <button class="base_botao btn_blue" type='submit'><img src="<?= $PATH_PUBLIC ?>/image/geral/botoes/v_branco_icon.svg">SALVAR</button>
      </form>
    </div>
  </div>
  <script type="module" src="<?= $PATH_PUBLIC ?>/js/geral/SelectUfCidades.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/cliente/PfpInput.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/cliente/updateSocial.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/cliente/EditarPerfilCliente.js"></script>
  <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/vendedor/ProfileEditVendedor.js"></script>
  <script src="<?= $PATH_PUBLIC ?>/js/vendedor/DestaquesEditVendedor.js"></script>
  <script>
    const textArea = document.getElementById('descricao');
    const charCount = document.getElementById('charCount');

    function updateCharCount() {
      charCount.textContent = textArea.value.length;
    }

    document.addEventListener('DOMContentLoaded', updateCharCount);

    textArea.addEventListener('input', updateCharCount);
  </script>

  <?php include_once("$PATH_COMPONENTS/php/footer.php"); ?>
</body>

</html>