<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INA Carousel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .carousel-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 30px auto;
            max-width: 800px;
        }
        .carousel-container {
            position: relative;
            width: 300px;
            height: 300px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .carousel {
            display: flex;
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }
        .carousel img {
            min-width: 100%;
            height: 100%;
            object-fit: cover;
            flex-shrink: 0;
        }
        .arrow {
            background: #1e3a5f;
            color: white;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 50%;
            user-select: none;
            font-size: 24px;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .arrow:hover {
            background: #2a4a7a;
            transform: scale(1.1);
        }
        .footer {
            background: #1e3a5f;
            color: white;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            max-width: 600px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .team-description {
            margin-bottom: 30px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>I.N.A.</h1>
    <div class="team-description">
        <p>O Time Inteligência Não Artificial é composto de pessoas incríveis que trabalharam juntas para lhe trazer EaoQuadrado.</p>
        <p>Conheça cada uma delas nesse carrossel.</p>
    </div>
    
    <div class="carousel-wrapper">
        <div class="arrow" onclick="prevSlide()">&#9664;</div>
        
        <div class="carousel-container">
            <div class="carousel" id="carousel">
                <img src="../../image/index/Produto01.jpg" alt="Person 1">
                <img src="../../image/index/Produto02.jpg" alt="Person 2">
                <img src="../../image/index/Produto03.jpg" alt="Person 3">
                <img src="../../image/index/Produto04.jpg" alt="Person 4">
                <img src="../../image/index/Produto05.jpg" alt="Person 5">
                <img src="../../image/index/Produto06.jpg" alt="Person 6">
                <img src="../../image/index/Produto07.jpg" alt="Person 7">
                <img src="../../image/index/Produto08.jpg" alt="Person 8">
            </div>
        </div>
        
        <div class="arrow" onclick="nextSlide()">&#9654;</div>
    </div>
    
    <div class="footer" id="footer">
        <h2>Roberto Filho</h2>
        <p>Fez poha nenhuma<br>Fica dando spoiler de Invencível<br>Não consegue concentrar em uma tarefa por mais de 5 minutos.<br>Não gosta de JojoLand</p>
    </div>
    
    <script>
        let currentIndex = 0;
        const carousel = document.getElementById("carousel");
        const images = document.querySelectorAll(".carousel img");
        const footer = document.getElementById("footer");
        const totalImages = images.length;
        
        const descriptions = [
            { name: "Roberto Filho", text: "Fez poha nenhuma<br>Fica dando spoiler de Invencível<br>Não consegue concentrar em uma tarefa por mais de 5 minutos.<br>Não gosta de JojoLand" },
            { name: "Pessoa 2", text: "Descrição da pessoa 2 aqui." },
            { name: "Pessoa 3", text: "Descrição da pessoa 3 aqui." },
            { name: "Pessoa 4", text: "Descrição da pessoa 4 aqui." },
            { name: "Pessoa 5", text: "Descrição da pessoa 5 aqui." },
            { name: "Pessoa 6", text: "Descrição da pessoa 6 aqui." },
            { name: "Pessoa 7", text: "Descrição da pessoa 7 aqui." },
            { name: "Pessoa 8", text: "Descrição da pessoa 8 aqui." }
        ];
        
        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            footer.innerHTML = `<h2>${descriptions[currentIndex].name}</h2><p>${descriptions[currentIndex].text}</p>`;
        }
        
        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalImages;
            updateCarousel();
        }
        
        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            updateCarousel();
        }
        
        // Initialize the carousel
        updateCarousel();
    </script>
</body>
</html>