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

    <main>
        <div class="about-background">
            <div class="background-gif-wrapper">
                <img class="background-gif" src="<?= $PATH_PUBLIC ?>/image/geral/wallpaper-sn.gif" alt="">
            </div>
            <div class="about-text">
                <h1>I.N.A.</h1>
                <p>O time <b>Inteligência Não Artificial</b> é composto de pessoas incríveis que trabalharam juntas para lhe trazer EaoQuadrado.</p>
                <p>Conheça cada uma deles passando o mouse sobre as fotos.</p>
            </div>
            <div class="about-text ">
                <img class="text-left" src="<?= $PATH_PUBLIC ?>/image/geral/ina.png">
            </div>
        </div>

        <div class="heros-main">
            <div class="hero-container">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/enzo.png" alt="">
                    <div class="details">
                        <div class="cardHeader">Enzo Da Silva</div>
                        <div class="cardText">
                            eu gosto de paçoca
                        </div>


                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>Título</h2>
                        <p>Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo Texto texto texto texto texo </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2">
                        <li class="icon-content">
                            <a
                                href="https://www.spotify.com/"
                                aria-label="Spotify"
                                data-social="spotify">
                                <div class="filled"></div>
                                <svg version="1.1" viewBox="0 0 100 100">
                                    <path
                                        d="M50,4C24.7,4,4,24.7,4,50s20.6,46,46,46s46-20.6,46-46S75.4,4,50,4z M71.6,71.5c0,0,0,0.1-0.1,0.1c-0.8,1.2-2,1.8-3.2,1.8  c-0.7,0-1.4-0.2-2-0.6c-10.2-6.3-23.3-7.7-38.8-4.1c-2.1,0.6-4-0.9-4.5-2.7c-0.6-2.3,0.9-4.1,2.7-4.6c17.7-4,32.6-2.3,44.4,5  c0.9,0.4,1.5,1,1.8,1.9C72.2,69.3,72.1,70.5,71.6,71.5z M76.9,59.3L76.9,59.3c-0.8,1.1-1.9,1.9-3.2,2.1c-0.2,0-0.5,0.1-0.7,0.1  c-0.8,0-1.6-0.3-2.3-0.7c-12-7.3-30.1-9.4-43.9-5c-2.5,0.6-5-0.7-5.6-3c-0.6-2.5,0.7-4.9,3-5.5c16.5-5,37.2-2.5,51.4,6.2  c0.8,0.4,1.5,1.3,1.8,2.5C77.9,57,77.6,58.3,76.9,59.3z M83.2,45.6c-1,1.4-2.7,2.1-4.4,2.1c-0.9,0-1.9-0.2-2.7-0.7c0,0,0,0,0,0  c-13.9-8.3-37.8-9.3-51.4-5.1c-2.7,0.8-5.5-0.7-6.4-3.3c-0.8-2.7,0.7-5.6,3.3-6.4c16.2-4.8,43-3.8,59.8,6.2  C83.8,39.6,84.7,42.9,83.2,45.6C83.3,45.5,83.3,45.5,83.2,45.6z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Spotify</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://www.pinterest.com/"
                                aria-label="Pinterest"
                                data-social="pinterest">
                                <div class="filled"></div>
                                <svg version="1.1" viewBox="0 0 100 100" xml:space="preserve">
                                    <path
                                        d="M83,17.8C74.5,8.9,63.4,4.3,50,4.1C37.7,4.2,26.8,8.6,17.9,17.3C8.9,26,4.3,37,4.1,50c0,0,0,0,0,0c0,9.1,2.5,17.4,7.4,24.9  c4.9,7.4,11.6,13.2,20.1,17.1c0.3,0.1,0.7,0.1,1-0.1c0.3-0.2,0.5-0.5,0.5-0.8l0-4.9c0.1-2.1,0.7-5.3,1.7-9.5c1-4,1.7-6.7,1.9-7.6  c0.7-3,1.7-7.2,3-12.6c0.1-0.2,0-0.5-0.1-0.7c-0.4-0.8-1-2.6-1.5-6.6c0.1-2.7,0.8-5.2,2.1-7.3c1.2-2,3.1-3.1,5.7-3.5  c2,0.1,4.7,0.8,5.1,5.9c-0.1,1.8-0.8,4.5-1.9,8.1c-1.2,3.8-1.9,6.3-2.1,7.6c-0.7,2.5-0.2,4.8,1.5,6.8c1.6,1.9,3.8,2.9,6.5,3.1  c4.3-0.1,8.1-2.6,11.2-7.5c1.7-3,2.9-6.3,3.5-9.7c0.7-3.4,0.7-7.1,0-10.8c-0.7-3.8-2.2-7.1-4.5-9.8c0,0-0.1-0.1-0.1-0.1  c-4.3-3.7-9.5-5.3-15.6-5c-6,0.4-11.3,2.6-15.9,6.6c-2.9,3.2-4.8,7.1-5.7,11.6c-0.9,4.6,0,9.1,2.6,13.3c0.3,0.5,0.5,0.8,0.6,1  c0,0.3,0,1-0.5,2.8c-0.5,1.8-0.9,2.2-0.9,2.2c0,0-0.1,0-0.1,0.1c0,0-0.2,0-0.4-0.1c-2.2-1-3.9-2.4-5.2-4.2c-1.3-1.9-2.1-4-2.5-6.3  c-0.3-2.5-0.4-5-0.3-7.5c0.2-2.5,0.7-5.1,1.4-7.7c3-6.9,8.5-11.9,16.3-14.8c7.8-2.9,16-3.2,24.3-0.8c6.5,2.8,11,7.4,13.6,13.7  c2.5,6.4,2.8,13.4,0.8,20.8c-2.2,7.1-6.4,12.4-12.1,15.7c-5.6,2.8-10.8,3-15.7,0.7c-1.8-1.1-3.1-2.3-3.9-3.5c-0.2-0.3-0.6-0.5-1-0.5  c-0.4,0.1-0.7,0.3-0.8,0.7c-0.7,2.7-1.3,4.7-1.6,6.2c-1.4,5.4-2.6,9.2-3.4,11c-0.8,1.6-1.6,3.1-2.4,4.3c-0.2,0.3-0.2,0.6-0.1,0.9  s0.3,0.5,0.6,0.6c4.3,1.3,8.7,2,13,2c12.4-0.1,23.2-4.6,32.1-13.4C91.1,73.9,95.8,62.9,96,50C95.9,37.5,91.5,26.7,83,17.8z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Pinterest</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://dribbble.com/"
                                aria-label="Dribbble"
                                data-social="dribbble">
                                <div class="filled"></div>
                                <svg version="1.1" viewBox="0 0 100 100">
                                    <path
                                        d="M83.5,18.5C74.9,9.3,62.8,4,50.2,4c-6.1,0-12,1.1-17.6,3.4C15.2,14.5,4,31.3,4,50c0,13.9,6.2,26.9,17,35.7  C29.2,92.3,39.4,96,50,96c6.6,0,13.2-1.5,19.2-4.2c12.5-5.7,21.7-16.6,25.2-29.8C95.5,57.9,96,53.8,96,50  C96,38.3,91.6,27.1,83.5,18.5z M75,22.3c-0.7,0.9-1.4,1.8-2.1,2.6c-1.4,1.6-2.8,3-4.4,4.3c-0.3,0.3-0.6,0.6-1,0.8  c-1,0.9-2.1,1.7-3.2,2.5l-0.3,0.2c-1.1,0.7-2.2,1.5-3.5,2.2c-0.4,0.3-0.9,0.5-1.4,0.8c-0.8,0.5-1.7,0.9-2.7,1.4  c-0.6,0.3-1.2,0.5-1.8,0.8L54.3,38c-0.1,0-0.2,0.1-0.3,0.1c0,0,0,0,0,0c-1.3-2.6-2.4-4.9-3.5-7l-0.3-0.5c-1.1-2-2.2-4-3.3-6  l-0.7-1.3c-1.1-1.9-2.2-3.7-3.2-5.4l-0.7-1.1c-0.7-1.2-1.4-2.3-2.2-3.5c3.2-0.8,6.5-1.3,9.8-1.3c9.4,0,18.4,3.5,25.4,9.8  C75.3,21.9,75.2,22.1,75,22.3z M46.4,40.6c-1.4,0.4-2.9,0.8-4.4,1.1c-0.3,0-0.7,0.1-0.9,0.2c-6,1-12.5,1.4-19.4,1.1  c-0.3,0-0.6,0-0.9,0c-0.3,0-0.5,0-0.7,0c-2.5-0.2-4.9-0.4-7.2-0.7c2.3-11.2,9.6-20.9,19.8-26.1c2.1,3.3,4.2,6.7,6.3,10.3l0.4,0.7  c0.9,1.6,1.9,3.4,3.2,5.8l0.6,1.2C44.4,36.6,45.4,38.6,46.4,40.6z M24.4,51.1c2.2,0.1,4.2,0,6.2-0.1l0.7,0c0.4,0,0.9,0,1.3,0  c2.8-0.2,5.5-0.5,8.5-1c0.5-0.1,1-0.2,1.6-0.3l0.5-0.1c2.2-0.4,4.2-0.9,6.1-1.4c0.1,0,0.3-0.1,0.4-0.1l0.5,1.1  c1.2,2.8,2.3,5.5,3.3,8.1c0,0,0,0,0,0c-0.2,0.1-0.5,0.2-0.7,0.2c-2,0.6-4,1.4-5.9,2.2c-0.6,0.3-1.3,0.5-1.9,0.8  c-1.4,0.6-2.7,1.3-4.1,2.1l-0.3,0.2c-0.2,0.1-0.5,0.2-0.6,0.4c-1.5,0.9-3.1,1.9-4.7,3c-0.2,0.1-0.4,0.3-0.6,0.4  c-0.2,0.1-0.4,0.3-0.6,0.5c-1,0.7-2,1.5-3,2.3c-0.4,0.3-0.7,0.6-1.1,0.9l-0.3,0.3c-0.7,0.6-1.5,1.3-2.2,1.9l-0.2,0.2  c-0.4,0.4-0.7,0.7-1.1,1.1l-0.2,0.2c-0.6,0.6-1.3,1.3-2,2l-0.4,0.4c-0.2,0.2-0.4,0.4-0.5,0.6C16.1,69.9,12,60.2,12,50.3  c0,0,0.1,0,0.1,0c0.4,0,0.7,0,1.1,0.1c3.5,0.4,6.9,0.6,10.3,0.7C23.8,51,24.1,51.1,24.4,51.1z M29.5,81.9c0.2-0.2,0.3-0.4,0.5-0.5  c1-1.1,2-2.1,3-3c1.9-1.8,3.8-3.3,5.7-4.8c0.2-0.1,0.4-0.3,0.6-0.4c0.2-0.2,0.5-0.4,0.8-0.6c1.1-0.8,2.2-1.5,3.4-2.2  c0.1-0.1,0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.1,0.3-0.2c1.4-0.8,2.9-1.6,4.5-2.3c0.3-0.1,0.6-0.2,0.8-0.4l0.6-0.3  c1.1-0.5,2.2-0.9,3.5-1.4c0.5-0.2,1.1-0.4,1.7-0.6l0.2-0.1c0.4-0.1,0.7-0.2,1.1-0.3c0,0,0,0,0,0c1.1,3.2,2.3,6.4,3.3,9.8l0.1,0.4  c1.1,3.6,2,7.3,2.9,10.8C51.7,89.8,39.3,88.3,29.5,81.9C29.4,81.9,29.4,81.9,29.5,81.9z M65.6,62.9c0.7-0.1,1.3-0.2,2-0.2  c2-0.2,4-0.2,5.9-0.2c0.2,0,0.4,0,0.6,0l0.2,0c2.2,0.1,4.6,0.3,6.9,0.6c0.4,0.1,0.9,0.1,1.3,0.2l0.6,0.1c0.7,0.1,1.5,0.3,2.2,0.4  c-3,7.6-8.3,14-15.2,18.3c-0.8-3.1-1.7-6.2-2.6-9.2l-0.1-0.4c-0.9-3-1.9-6.1-3.1-9.5C64.8,63.1,65.2,63,65.6,62.9z M81.6,55.2  C80,55,78.4,54.9,77,54.8l-0.9-0.1c-0.9-0.1-1.9-0.1-2.8-0.2c-0.2,0-0.3,0-0.5,0c-0.2,0-0.4,0-0.6,0c-2,0-3.9,0.1-5.9,0.3  c-0.2,0-0.3,0-0.5,0.1c-0.1,0-0.2,0-0.3,0c-1.3,0.1-2.6,0.3-3.9,0.5c-0.1-0.1-0.1-0.3-0.2-0.4c-0.1-0.2-0.2-0.5-0.3-0.7  c-1.1-2.9-2.3-5.7-3.2-7.8l-0.3-0.6c-0.1-0.1-0.1-0.3-0.2-0.4c0,0,0,0,0.1,0c0.2-0.1,0.5-0.2,0.7-0.3c0.6-0.2,1.2-0.5,1.8-0.8  c1.2-0.5,2.4-1.2,3.6-1.8c0.1-0.1,0.3-0.2,0.5-0.2c0.2-0.1,0.5-0.2,0.7-0.4c1.5-0.9,2.9-1.8,4.2-2.7l0.3-0.2  c0.2-0.1,0.4-0.3,0.6-0.4c0.9-0.6,1.9-1.4,2.8-2.2c1.5-1.2,2.9-2.5,4.3-4c0.8-0.8,1.5-1.6,2.2-2.4l0.4-0.5c0.5-0.5,0.9-1.1,1.3-1.6  C85.5,34.3,88,42.1,88,50c0,2-0.2,4.1-0.5,6.1c-0.3,0-0.6-0.1-0.8-0.1c-0.4-0.1-0.7-0.1-1.1-0.2l-1.1-0.2  C83.5,55.5,82.5,55.3,81.6,55.2z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Dribbble</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://telegram.org/"
                                aria-label="Telegram"
                                data-social="telegram">
                                <div class="filled"></div>
                                <svg version="1.1" viewBox="0 0 100 100">
                                    <path
                                        d="M95,9.9c-1.3-1.1-3.4-1.2-7-0.1c0,0,0,0,0,0c-2.5,0.8-24.7,9.2-44.3,17.3c-17.6,7.3-31.9,13.7-33.6,14.5  c-1.9,0.6-6,2.4-6.2,5.2c-0.1,1.8,1.4,3.4,4.3,4.7c3.1,1.6,16.8,6.2,19.7,7.1c1,3.4,6.9,23.3,7.2,24.5c0.4,1.8,1.6,2.8,2.2,3.2  c0.1,0.1,0.3,0.3,0.5,0.4c0.3,0.2,0.7,0.3,1.2,0.3c0.7,0,1.5-0.3,2.2-0.8c3.7-3,10.1-9.7,11.9-11.6c7.9,6.2,16.5,13.1,17.3,13.9  c0,0,0.1,0.1,0.1,0.1c1.9,1.6,3.9,2.5,5.7,2.5c0.6,0,1.2-0.1,1.8-0.3c2.1-0.7,3.6-2.7,4.1-5.4c0-0.1,0.1-0.5,0.3-1.2  c3.4-14.8,6.1-27.8,8.3-38.7c2.1-10.7,3.8-21.2,4.8-26.8c0.2-1.4,0.4-2.5,0.5-3.2C96.3,13.5,96.5,11.2,95,9.9z M30,58.3l47.7-31.6  c0.1-0.1,0.3-0.2,0.4-0.3c0,0,0,0,0,0c0.1,0,0.1-0.1,0.2-0.1c0.1,0,0.1,0,0.2-0.1c-0.1,0.1-0.2,0.4-0.4,0.6L66,38.1  c-8.4,7.7-19.4,17.8-26.7,24.4c0,0,0,0,0,0.1c0,0-0.1,0.1-0.1,0.1c0,0,0,0.1-0.1,0.1c0,0.1,0,0.1-0.1,0.2c0,0,0,0.1,0,0.1  c0,0,0,0,0,0.1c-0.5,5.6-1.4,15.2-1.8,19.5c0,0,0,0,0-0.1C36.8,81.4,31.2,62.3,30,58.3z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Telegram</div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="hero-container" id="eliasasa">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/eliasasa.jpg" alt="">
                    <div class="details">
                        <div class="cardHeader">Elias Oliveira</div>
                        <div class="cardText">
                            Pobre desde a nascença
                        </div>


                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>eliasasa</h2>
                        <p>
                            Me chamo Elias, tenho 19 anos (2025), cursando Desenvolvimento de Sistemas no SENACHUB ACADEMY. Gosto de trabalhar com Backend, mas brinco um pouco com Frontend também. Gosto de sempre estar estudando, ainda mais quando se trata de programação.
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="eliasasa-list">
                            <li>Maior fã de Rammstein do Brasil</li>
                            <li>Dono e inimigo do Snoopy</li>
                            <li>Gosto de paçoca, POO e MCV</li>
                        </ul>
                        </p>
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2">
                        <li class="icon-content">
                            <a
                                href="https://github.com/eliasasa"
                                aria-label="GitHub"
                                data-social="github">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33s1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
                                </svg>
                            </a>
                            <div class="tooltip">GitHub</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://discord.com/users/427981126041075714"
                                aria-label="Discord"
                                data-social="discord">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19.27 5.33C17.94 4.71 16.5 4.26 15 4a.1.1 0 0 0-.07.03c-.18.33-.39.76-.53 1.09a16.1 16.1 0 0 0-4.8 0c-.14-.34-.35-.76-.54-1.09c-.01-.02-.04-.03-.07-.03c-1.5.26-2.93.71-4.27 1.33c-.01 0-.02.01-.03.02c-2.72 4.07-3.47 8.03-3.1 11.95c0 .02.01.04.03.05c1.8 1.32 3.53 2.12 5.24 2.65c.03.01.06 0 .07-.02c.4-.55.76-1.13 1.07-1.74c.02-.04 0-.08-.04-.09c-.57-.22-1.11-.48-1.64-.78c-.04-.02-.04-.08-.01-.11c.11-.08.22-.17.33-.25c.02-.02.05-.02.07-.01c3.44 1.57 7.15 1.57 10.55 0c.02-.01.05-.01.07.01c.11.09.22.17.33.26c.04.03.04.09-.01.11c-.52.31-1.07.56-1.64.78c-.04.01-.05.06-.04.09c.32.61.68 1.19 1.07 1.74c.03.01.06.02.09.01c1.72-.53 3.45-1.33 5.25-2.65c.02-.01.03-.03.03-.05c.44-4.53-.73-8.46-3.1-11.95c-.01-.01-.02-.02-.04-.02M8.52 14.91c-1.03 0-1.89-.95-1.89-2.12s.84-2.12 1.89-2.12c1.06 0 1.9.96 1.89 2.12c0 1.17-.84 2.12-1.89 2.12m6.97 0c-1.03 0-1.89-.95-1.89-2.12s.84-2.12 1.89-2.12c1.06 0 1.9.96 1.89 2.12c0 1.17-.83 2.12-1.89 2.12" />
                                </svg>
                            </a>
                            <div class="tooltip">Discord</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://www.linkedin.com/in/elias-ol-neto/"
                                aria-label="Linkedin"
                                data-social="linkedin">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002M7 8.48H3V21h4zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91z" />
                                </svg>
                            </a>
                            <div class="tooltip">Linkedin</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Davi -->

            <div class="hero-container" id="davi">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/davi.png" alt="">
                    <div class="details">
                        <div class="cardHeader">Davi Bueno</div>
                        <div class="cardText">
                            Não no meu turno.
                        </div>


                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>bueno</h2>
                        <p>
                            Me chamo Davi, tenho 18 anos (2025), cursando Desenvolvimento de Sistemas no SENACHUB ACADEMY. Gosto de estudar sobre programação e psicologia, e sempre que tenho a oportunidade estou trabalhando em um projeto pessoal.
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="bueno-list">
                            <li>200h de sage</li>
                            <li>Mono sentinela</li>
                            <li>Plat 2 - Peak</li>
                        </ul>
                        </p>
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2">
                        <li class="icon-content">
                            <a
                                href="https://github.com/buenosdev"
                                aria-label="GitHub"
                                data-social="github">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33s1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
                                </svg>
                            </a>
                            <div class="tooltip">GitHub</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://discord.com/users/623689988130865172"
                                aria-label="Discord"
                                data-social="discord">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19.27 5.33C17.94 4.71 16.5 4.26 15 4a.1.1 0 0 0-.07.03c-.18.33-.39.76-.53 1.09a16.1 16.1 0 0 0-4.8 0c-.14-.34-.35-.76-.54-1.09c-.01-.02-.04-.03-.07-.03c-1.5.26-2.93.71-4.27 1.33c-.01 0-.02.01-.03.02c-2.72 4.07-3.47 8.03-3.1 11.95c0 .02.01.04.03.05c1.8 1.32 3.53 2.12 5.24 2.65c.03.01.06 0 .07-.02c.4-.55.76-1.13 1.07-1.74c.02-.04 0-.08-.04-.09c-.57-.22-1.11-.48-1.64-.78c-.04-.02-.04-.08-.01-.11c.11-.08.22-.17.33-.25c.02-.02.05-.02.07-.01c3.44 1.57 7.15 1.57 10.55 0c.02-.01.05-.01.07.01c.11.09.22.17.33.26c.04.03.04.09-.01.11c-.52.31-1.07.56-1.64.78c-.04.01-.05.06-.04.09c.32.61.68 1.19 1.07 1.74c.03.01.06.02.09.01c1.72-.53 3.45-1.33 5.25-2.65c.02-.01.03-.03.03-.05c.44-4.53-.73-8.46-3.1-11.95c-.01-.01-.02-.02-.04-.02M8.52 14.91c-1.03 0-1.89-.95-1.89-2.12s.84-2.12 1.89-2.12c1.06 0 1.9.96 1.89 2.12c0 1.17-.84 2.12-1.89 2.12m6.97 0c-1.03 0-1.89-.95-1.89-2.12s.84-2.12 1.89-2.12c1.06 0 1.9.96 1.89 2.12c0 1.17-.83 2.12-1.89 2.12" />
                                </svg>
                            </a>
                            <div class="tooltip">Discord</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://www.linkedin.com/in/buenosdev/"
                                aria-label="Linkedin"
                                data-social="linkedin">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002M7 8.48H3V21h4zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91z" />
                                </svg>
                            </a>
                            <div class="tooltip">Linkedin</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



    </main>

    <?php
    include_once("$PATH_COMPONENTS/php/footer.php");
    ?>

    <!-- <script src='<?= $PATH_PUBLIC ?>/js/geral/SobreNos.js'></script> -->
</body>

</html>