<?php
function Carrossel($path)
{
    $PATH_PUBLIC = $path . '/public';

    echo <<<HTML
    <div class="carrossel" data-path="{$PATH_PUBLIC}" style="background: url('{$PATH_PUBLIC}/image/index/fundoCarrossel.jpg') center/cover no-repeat;">
        <div class="carrossel_content">
            <button class="carrossel_but back">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                </svg>
            </button>
            <div class="carousel-container">
                <div class="carousel-wrapper">
                    <img id="carrossel_image" alt="Imagem Carrossel">
                </div>
            </div>
            <button class="carrossel_but forward">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                </svg>
            </button>
        </div>
        <div class="carrossel_nav">
            <button class="active" onclick="currentSlide(0)"></button>
            <button onclick="currentSlide(1)"></button>
            <button onclick="currentSlide(2)"></button>
            <button onclick="currentSlide(3)"></button>
        </div>
        <form method="POST" action="Categoria" class="categorias_nav">
            <button value="1" name="categoria" class="categorias_block">
                <img src="{$PATH_PUBLIC}/image/index/carrosselHardware.png" alt="">
                <p>Hardware</p>
            </button>
            <button value="2" name="categoria" class="categorias_block">
                <img src="{$PATH_PUBLIC}/image/index/carrosselPerifericos.png" alt="">
                <p>Periféricos</p>
            </button>
            <button value="3" name="categoria" class="categorias_block">
                <img src="{$PATH_PUBLIC}/image/index/carrosselEscritorio.png" alt="">
                <p>Escritório</p>
            </button>
            <button value="4" name="categoria" class="categorias_block">
                <img src="{$PATH_PUBLIC}/image/index/carrosselCelulares.png" alt="">
                <p>Celulares</p>
            </button>
            <button value="5" name="categoria" class="categorias_block">
                <img src="{$PATH_PUBLIC}/image/index/carrosselEletro.png" alt="">
                <p>Eletrodomésticos</p>
            </button>
        </form>
    </div>
HTML;
}
