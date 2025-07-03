<!DOCTYPE html>
<html lang="pt-br">    
<?php
  $titulo = "Sobre Nós - E ao Quadrado";
  $css = ["/css/geral/SobreNos.css"];
  require_once('./utils/head.php');
?>
<body>
    <?php
        include_once("$PATH_COMPONENTS/php/navbar.php");
    ?>
    <div class="background-sobre_nos">

    </div>
    <main class="sobre_nos_container">
        <h1 class="sobre_nos_titulo">I.N.A.</h1>
        <div class="sobre_nos_descricao">
            <p>O Time Inteligência Não Artificial é composto de pessoas incríveis que trabalharam juntas para lhe trazer EaoQuadrado.</p>
            <p>Conheça cada uma delas abaixo.</p>
        </div>
        
        <!-- Grade de Membros -->
        <div class="sobre_nos_grade">
        <a href="#sobre-nos-enzo" class="sobre_nos_card">
            <img src="<?=$PATH_PUBLIC?>/image/geral/enzo.png" alt="Enzo">
            <span>Enzo</span>
        </a>
        <a href="#sobre-nos-pessoa2" class="sobre_nos_card">
            <img src="<?=$PATH_PUBLIC?>/image/index/Produto02.jpg" alt="Person 2">
            <span>Pessoa 2</span>
        </a>
        
        <a href="#sobre-nos-roberto" class="sobre_nos_card">
            <img src="<?=$PATH_PUBLIC?>/image/index/Produto08.jpg" alt="Person 8">
            <span>Roberto Filho</span>
        </a>
        </div>
        
        <!-- Seções de detalhes -->
        <section id="sobre-nos-enzo" class="sobre_nos_secao">
            <img src="<?=$PATH_PUBLIC?>/image/geral/enzo.png" alt="Enzo" class="sobre_nos_foto">
            <div class="sobre_nos_info">
                <h2>Enzo</h2>
                <p>Descrição do Enzo.</p>
            </div>
        </section>

        <section id="sobre-nos-pessoa2" class="sobre_nos_secao">
            <img src="<?=$PATH_PUBLIC?>/image/index/Produto02.jpg" alt="Person 2" class="sobre_nos_foto">
            <div class="sobre_nos_info">
                <h2>Pessoa 2</h2>
                <p>Descrição da Pessoa 2.</p>
            </div>
        </section>

        <!-- Adicione mais seções conforme necessário -->

        <section id="sobre-nos-roberto" class="sobre_nos_secao">
            <img src="<?=$PATH_PUBLIC?>/image/index/Produto08.jpg" alt="Roberto Filho" class="sobre_nos_foto">
            <div class="sobre_nos_info">
                <h2>Roberto Filho</h2>
                <p>Fez poha nenhuma<br>Fica dando spoiler de Invencível<br>Não consegue concentrar em uma tarefa por mais de 5 minutos.<br>Não gosta de JojoLand</p>
            </div>
        </section>
    </main>
        
    <?php
        include_once("$PATH_COMPONENTS/php/footer.php");
    ?>
    
<!-- <script src='<?=$PATH_PUBLIC?>/js/geral/SobreNos.js'></script> -->
</body>
</html>