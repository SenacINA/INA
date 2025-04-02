<?php
function Carrossel($isIndex = 1) {
    $URL = $isIndex === 1 ? '' : '../.';

    echo <<<HTML
    <div class="carrossel" style='background: url(${URL}./image/index/fundoCarrossel.jpg) center/cover no-repeat;'>
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
        <div class="categorias_nav">
            <div class="categorias_block" onclick="pag('${URL}./cliente/categoria',0)">
                <img src="{$URL}./image/index/carrosselHardware.png" alt="">
                <p>Hardware</p>
            </div>
            <div class="categorias_block" onclick="pag('${URL}./cliente/categoria',0)">
                <img src="{$URL}./image/index/carrosselPerifericos.png" alt="">
                <p>Periféricos</p>
            </div>
            <div class="categorias_block" onclick="pag('${URL}./cliente/categoria',0)">
                <img src="{$URL}./image/index/carrosselEscritorio.png" alt="">
                <p>Escritório</p>
            </div>
            <div class="categorias_block" onclick="pag('${URL}./cliente/categoria',0)">
                <img src="{$URL}./image/index/carrosselCelulares.png" alt="">
                <p>Celulares</p>
            </div>
            <div class="categorias_block" onclick="pag('${URL}./cliente/categoria',0)">
                <img src="{$URL}./image/index/carrosselEletro.png" alt="">
                <p>Eletrodomésticos</p>
            </div>
        </div>
    </div>
HTML;
}
?>