<!DOCTYPE html>
<html lang="pt-br">
<?php
$css = ["/css/geral/home.css", "/css/geral/Parallax.css"];
$js = ["/js/geral/parallax.js"];
require_once('./utils/head.php')
?>

<body>

    <?php
    // echo var_dump($_SERVER['REQUEST_URI']);
    // echo var_dump($_SERVER['DOCUMENT_ROOT']);
    include_once("$PATH_COMPONENTS/php/navbar.php");
    include_once("$PATH_COMPONENTS/php/parallax.php");
    ?>

    <div class="index_body_main_container">
        <div id="carrosel_container" class="carrossel" data-path='./public' style="background: url('./public/image/index/fundoCarrossel.jpg') center/cover no-repeat">
        </div>
        <div class="index_body_bg_container">
            <div class="index_body_content_container">
                <div class="index_body_ad_box">
                    <div class="index_body_big_ad">
                        <img src="<?= $PATH_PUBLIC ?>/image/index/BannerCupom25.jpg" alt="">
                    </div>
                    <div class="index_body_mid_ad">
                        <img src="<?= $PATH_PUBLIC ?>/image/index/BannerCupom10.jpg" alt="">
                        <img src="<?= $PATH_PUBLIC ?>/image/index/BannerGarantia.jpg" alt="">
                    </div>
                </div>
                <h1 class="index_body_text_carolina">Descobertas do Dia</h1>
                <div class="index_body_produto_container">
                    <div class="index_body_container_title">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/foguinho.svg" alt="">
                        <h2 class="index_body_text_carolina">Novidades</h2>
                    </div>
                    <div id="div_novidades" class="index_body_produtos_content">
                    </div>
                    <a href='Categoria?categoria=1&subcategoria=1' class="index_body_ver_mais">
                        <p>Ver Mais</p>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19" />
                            </svg>
                        </button>
                    </a>
                </div>
                <div class="index_body_produto_container">
                    <div class="index_body_container_title">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/descontos.svg" alt="">
                        <h2 class="index_body_text_carolina">Descontos</h2>
                    </div>
                    <div class="index_body_produtos_content">
                    </div>
                    <a href='Categoria?categoria=1&subcategoria=1' class="index_body_ver_mais">
                        <p>Ver Mais</p>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19" />
                            </svg>
                        </button>
                    </a>
                </div>
                <img class="index_body_large_ad" src="<?= $PATH_PUBLIC ?>/image/index/BannerRedragon.jpg" alt="">
                <div class="index_body_produto_container">
                    <div class="index_body_container_title">
                        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/estrela_carolina.svg" alt="">
                        <h2 class="index_body_text_carolina">Mais Vendidos</h2>
                    </div>
                    <div class="index_body_produtos_content">
                    </div>
                    <a href='Categoria?categoria=1&subcategoria=1' class="index_body_ver_mais">
                        <p>Ver Mais</p>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
        ?>
    </div>
    <button id="btnTopo" class="btn-topo" title="Voltar ao topo">
        <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/seta_cima.svg" alt="">
    </button>
    <script type="module" src='<?= $PATH_PUBLIC ?>/js/geral/carrossel.js' data-isindex="1"></script>
    <script src='<?= $PATH_PUBLIC ?>/js/geral/BtnTopo.js' data-isindex="1"></script>
    <script src='<?= $PATH_PUBLIC ?>/js/geral/card.js'></script>
    <script type='module' src='<?= $PATH_PUBLIC ?>/js/geral/home.js'></script>
    <script type="module" src="<?= $PATH_COMPONENTS ?>/js/Toast.js"></script>
    <script></script>
</body>

</html>