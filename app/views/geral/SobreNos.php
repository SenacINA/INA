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

            <!-- Enzo -->

            <div class="hero-container">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/enzo.jpg" alt="">
                    <div class="details">
                        <div class="cardHeader">Enzo Lopez</div>
                        <div class="cardText">
                            PRAISE THE SUN!
                        </div>
                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text" id="enzo">
                        <h2>Enzo</h2>
                        <p>Meu nome é Enzo, tenho atualmente 19 anos e estudo no Voucher Desenvolvedor no Senac Hub Academy! Apaixonado em trabalhar com desenvolvimento web, seja front ou back. Tentando sempre aprofundar meu conhecimento!</p>
                        <br>
                        <p>Algumas coisas sobre mim:</p>
                        <ul class="eliasasa-list">
                            <li>Fanático de Dark Souls - (Platinei Dark Souls 1,3, Elden Ring)</li>
                        </ul>
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/PraiseSun.png" alt="">
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2">
                        <li class="icon-content">
                            <a
                                href="https://github.com/enzoglopez"
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
                                href="https://br.linkedin.com/in/enzo-guenka-lopez-08b67030b"
                                aria-label="Linkedin"
                                data-social="linkedin">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002M7 8.48H3V21h4zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91z" />
                                </svg>
                            </a>
                            <div class="tooltip">Linkedin</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://steamcommunity.com/id/hawsty/"
                                aria-label="Steam"
                                data-social="steam">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <rect width="24" height="24" fill="none" />
                                    <path fill="currentColor" d="M11.979 0C5.678 0 .511 4.86.022 11.037l6.432 2.658a3.4 3.4 0 0 1 1.912-.59q.094.001.188.006l2.861-4.142V8.91a4.53 4.53 0 0 1 4.524-4.524c2.494 0 4.524 2.031 4.524 4.527s-2.03 4.525-4.524 4.525h-.105l-4.076 2.911l.004.159a3.39 3.39 0 0 1-3.39 3.396a3.41 3.41 0 0 1-3.331-2.727L.436 15.27C1.862 20.307 6.486 24 11.979 24c6.627 0 11.999-5.373 11.999-12S18.605 0 11.979 0M7.54 18.21l-1.473-.61c.262.543.714.999 1.314 1.25a2.551 2.551 0 0 0 3.337-3.324a2.547 2.547 0 0 0-3.255-1.413l1.523.63a1.878 1.878 0 0 1-1.445 3.467zm11.415-9.303a3.02 3.02 0 0 0-3.015-3.015a3.015 3.015 0 1 0 3.015 3.015m-5.273-.005a2.264 2.264 0 1 1 4.531 0a2.267 2.267 0 0 1-2.266 2.265a2.264 2.264 0 0 1-2.265-2.265" />
                                </svg>
                            </a>
                            <div class="tooltip">Steam</div>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Elias -->

            <div class="hero-container" id="eliasasa">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/eliasasa.jpg" alt="">
                    <div class="details">
                        <div class="cardHeader">Elias Oliveira</div>
                        <div class="cardText">
                            Pobre desde a nascença.
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
                            <li>Gosto de paçoca, POO e MVC</li>
                            <li>Platinei The Binding of Issac</li>
                        </ul>
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/isaac-drip.gif">
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2 example-2_left_2">
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
                            No meu turno, não.
                        </div>
                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>Avatar#OO7</h2>
                        <p>
                            Me chamo Davi, tenho 18 anos (em 2025) e estou cursando Desenvolvimento de Sistemas no SENACHUB ACADEMY. Tenho grande interesse por programação e psicologia, e sempre que posso, me dedico a projetos pessoais. Atualmente, estou focado em me tornar um desenvolvedor full-stack, ao mesmo tempo em que aprofundo meus estudos em psicanálise.
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="bueno-list">
                            <li>200h de deadlock</li>
                            <li>Mono sentinela</li>
                            <li>Plat 2 - Peak</li>
                        </ul>
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
                        <li class="icon-content">
                            <a
                                href="https://www.instagram.com/bueno.l1fe?igsh=Nmc3NGNqOGcwNWFw"
                                aria-label="Instagram"
                                data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                    <path fill="currentColor" d="M7.5 5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5" />
                                    <path fill="currentColor" fill-rule="evenodd" d="M4.5 0A4.5 4.5 0 0 0 0 4.5v6A4.5 4.5 0 0 0 4.5 15h6a4.5 4.5 0 0 0 4.5-4.5v-6A4.5 4.5 0 0 0 10.5 0zM4 7.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0M11 4h1V3h-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="tooltip">Instragram</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Filipe -->

            <div class="hero-container" id="filipe">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/filipe.png" alt="">
                    <div class="details">
                        <div class="cardHeader">Filipe O. Simões</div>
                        <div class="cardText">
                            Herdeiro da escala 7x0
                        </div>
                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>Filipe</h2>
                        <p>
                            Me chamo Filipe, tenho 19 anos (em 2025) e estou cursando Desenvolvimento de Sistemas no SENACHUB ACADEMY. Estou focado em me desenvolver na área de programação, com maior afinidade pelo front-end e pela organização de projetos. No entanto, também tenho familiaridade com o back-end e não encontro dificuldades em atuar nessa área quando necessário.
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="filipe-list">
                            <li>Protótipo de ciborgue</li>
                            <li>Dono de fazenda</li>
                            <li>Commit na main</li>
                        </ul>
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2_left example-2">
                        <li class="icon-content">
                            <a
                                href="https://github.com/OSepiliF"
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
                                href="https://discord.com/users/649711663674687498"
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
                                href="https://www.linkedin.com/in/epilif-os/"
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

            <!-- Ana -->

            <div class="hero-container" id="ana">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/ana.jpg" alt="">
                    <div class="details">
                        <div class="cardHeader">Ana Vasques</div>
                        <div class="cardText">
                            Provável artista pobre.
                        </div>
                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>Ana</h2>
                        <p>
                            Me chamo Ana, tenho 17 anos (em 2025) e estou cursando Desenvolvimento de Sistemas no SENACHUB ACADEMY. Tenho grande interesse por programação, com afinidade pela área de Front-End. Onde, pretendo me especializar em UI/UX Desing. Além disso, sou artista (tanto digital quanto manual), apaixonada pelo conceito da arte ser contemplada e acessível a todos.
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="ana-list">
                            <li>Mãe de 10 filhos (Gatos)</li>
                            <li>Amo Trash Metal</li>
                            <li>Desenho nas horas vagas (sempre)</li>
                        </ul>
                        <img class="pinguin" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/pinguin.gif">
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2">
                        <li class="icon-content">
                            <a
                                href="https://github.com/Vyenvyy"
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
                                href="https://discord.com/users/763117452720472066"
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
                                href="https://www.linkedin.com"
                                aria-label="Linkedin"
                                data-social="linkedin">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002M7 8.48H3V21h4zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91z" />
                                </svg>
                            </a>
                            <div class="tooltip">Linkedin</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://www.instagram.com/vyenvyy/"
                                aria-label="Instagram"
                                data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                    <path fill="currentColor" d="M7.5 5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5" />
                                    <path fill="currentColor" fill-rule="evenodd" d="M4.5 0A4.5 4.5 0 0 0 0 4.5v6A4.5 4.5 0 0 0 4.5 15h6a4.5 4.5 0 0 0 4.5-4.5v-6A4.5 4.5 0 0 0 10.5 0zM4 7.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0M11 4h1V3h-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="tooltip">Instragram</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Cadu -->

            <div class="hero-container" id="cadu">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/cadu.jpg" alt="">
                    <div class="details">
                        <div class="cardHeader">Carlos Eduardo</div>
                        <div class="cardText">
                            Um programador de peso!
                        </div>
                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>Cadu</h2>
                        <p>
                            Me chamo Carlos Eduardo, tenho 19 anos (em 2025) e estou cursando Desenvolvimento de Sistemas no SENACHUB ACADEMY. Tenho grande interesse pela área de programação e procuro me especializar em Desenvolvimento Web e Banco de Dados
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="cadu-list">
                            <li>Gilgamesh x Umbaba</li>
                            <li>Amo Warhammer 40K</li>
                            <li>Mestre de Rotas</li>
                        </ul>
                        <img class="pinguin" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/crash.gif">
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2_left_2 example-2">
                        <li class="icon-content">
                            <a
                                href="https://github.com/cadulucas1"
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
                                href="https://www.linkedin.com/in/carlos-eduardo-de-lucas-gonzalez-0a304b332/"
                                aria-label="Linkedin"
                                data-social="linkedin">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002M7 8.48H3V21h4zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91z" />
                                </svg>
                            </a>
                            <div class="tooltip">Linkedin</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://www.instagram.com/cadu_de_lucas/"
                                aria-label="Instagram"
                                data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                    <path fill="currentColor" d="M7.5 5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5" />
                                    <path fill="currentColor" fill-rule="evenodd" d="M4.5 0A4.5 4.5 0 0 0 0 4.5v6A4.5 4.5 0 0 0 4.5 15h6a4.5 4.5 0 0 0 4.5-4.5v-6A4.5 4.5 0 0 0 10.5 0zM4 7.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0M11 4h1V3h-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="tooltip">Instragram</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Luis Fernando -->

            <div class="hero-container" id="luis_f">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/luis_f.jpg" alt="">
                    <div class="details">
                        <div class="cardHeader">Luis Fernando</div>
                        <div class="cardText">
                            O Negro n°1 do voucher.
                        </div>
                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>Luis Fernando</h2>
                        <p>
                            Me chamo Luis Fernando, tenho 23 anos (em 2025) e estou cursando Desenvolvimento de Sistemas no SENACHUB ACADEMY. Eu sou um dono de Startup que planeja revolucionar o mundo de jogos com experiências inovativas e divertidas como Type 'n' Fish.
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="luis_f-list">
                            <li>Dono da CapCat</li>
                            <li>Marrom bombom</li>
                            <li>O Melhor garoto de programa do senac</li>
                        </ul>
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        <img class="isaac" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/literalmenteeu.gif">
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2">
                        <li class="icon-content">
                            <a
                                href="http://github.com/LuisFernandoVirissimoNascimento"
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
                                href="https://discord.gg/G2d6awHvyp"
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
                                href="https://www.linkedin.com/in/lu%C3%ADs-fernando-virissimo-nascimento-611848228/"
                                aria-label="Linkedin"
                                data-social="linkedin">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002M7 8.48H3V21h4zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91z" />
                                </svg>
                            </a>
                            <div class="tooltip">Linkedin</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://www.instagram.com/lfulti/"
                                aria-label="Instagram"
                                data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                    <path fill="currentColor" d="M7.5 5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5" />
                                    <path fill="currentColor" fill-rule="evenodd" d="M4.5 0A4.5 4.5 0 0 0 0 4.5v6A4.5 4.5 0 0 0 4.5 15h6a4.5 4.5 0 0 0 4.5-4.5v-6A4.5 4.5 0 0 0 10.5 0zM4 7.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0M11 4h1V3h-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="tooltip">Instragram</div>
                        </li>
                        <li class="icon-content">
                            <a
                                href="https://store.steampowered.com/app/3546760/Type_n_Fish/"
                                aria-label="Steam"
                                data-social="steam">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <rect width="24" height="24" fill="none" />
                                    <path fill="currentColor" d="M11.979 0C5.678 0 .511 4.86.022 11.037l6.432 2.658a3.4 3.4 0 0 1 1.912-.59q.094.001.188.006l2.861-4.142V8.91a4.53 4.53 0 0 1 4.524-4.524c2.494 0 4.524 2.031 4.524 4.527s-2.03 4.525-4.524 4.525h-.105l-4.076 2.911l.004.159a3.39 3.39 0 0 1-3.39 3.396a3.41 3.41 0 0 1-3.331-2.727L.436 15.27C1.862 20.307 6.486 24 11.979 24c6.627 0 11.999-5.373 11.999-12S18.605 0 11.979 0M7.54 18.21l-1.473-.61c.262.543.714.999 1.314 1.25a2.551 2.551 0 0 0 3.337-3.324a2.547 2.547 0 0 0-3.255-1.413l1.523.63a1.878 1.878 0 0 1-1.445 3.467zm11.415-9.303a3.02 3.02 0 0 0-3.015-3.015a3.015 3.015 0 1 0 3.015 3.015m-5.273-.005a2.264 2.264 0 1 1 4.531 0a2.267 2.267 0 0 1-2.266 2.265a2.264 2.264 0 0 1-2.265-2.265" />
                                </svg>
                            </a>
                            <div class="tooltip">Steam</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Luis Cunha -->

            <div class="hero-container" id="cunha">

                <div class="card">
                    <img class="hero-image" src="<?= $PATH_PUBLIC ?>/image/sobre_nos/cunha.jpg" alt="">
                    <div class="details">
                        <div class="cardHeader">Luís Cunha</div>
                        <div class="cardText">
                            Uma mente brilhante.
                        </div>
                    </div>
                </div>
                <div class="hero-info">
                    <div class="hero-text">
                        <h2>Luís Cunha</h2>
                        <p>
                            Eu sou Luís Cunha, atualmente estudo no Senac Hub Academy e também da Ufms. Sou desenvolvedor fullstack, gosto de Rick and Morty, sou aspirante a modder de Minecraft, usuário número um do Operador ternário, ouvinte de Kpop, hater de Margin e viciado em flexbox
                            <br>
                            <br>
                            Algumas coisas sobre mim:
                        <ul class="cunha-list">
                            <li>Usuário número um do Operador ternário</li>
                            <li>Ouvinte de Kpop</li>
                            <li> hater de Margin e viciado em flexbox</li>
                        </ul>
                        </p>
                    </div>
                    <!-- From Uiverse.io by WAIOKYERE -->
                    <ul class="example-2 example-2_left">
                        <li class="icon-content">
                            <a
                                href="https://github.com/LuisCunha05"
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
                                href="https://discord.gg/users/237041130984833025"
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
                                href="https://www.linkedin.com/in/luís-felipe-g-cunha-b18b80142"
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