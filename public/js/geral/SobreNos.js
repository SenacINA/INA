let currentIndex = 1; // Começa na primeira imagem real (não no clone)
const carousel = document.getElementById("carousel");
const images = document.querySelectorAll(".carousel img");
const footer = document.getElementById("footer");
const totalImages = images.length;

const descriptions = [
    { name: "Enzo Guenka Lopez", text: "Trabalhou dia e noite..." },
    // ... (mantenha suas descrições originais)
];

// Função para mapear índice do carrossel para índice de descrição
function getDescriptionIndex(carouselIndex) {
    const realIndex = carouselIndex - 1;
    return (realIndex + descriptions.length) % descriptions.length;
}

function updateCarousel() {
    // Deslocamento considerando clones nas extremidades
    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    
    // Atualiza footer com descrição correspondente
    const descIndex = getDescriptionIndex(currentIndex);
    footer.innerHTML = `<h2>${descriptions[descIndex].name}</h2><p>${descriptions[descIndex].text}</p>`;
}

function nextSlide() {
    currentIndex++;
    carousel.style.transition = "transform 0.5s ease";
    updateCarousel();

    // Pula silenciosamente para o clone "real" quando chegar no final
    if (currentIndex === totalImages - 1) {
        setTimeout(() => {
            carousel.style.transition = "none";
            currentIndex = 1;
            updateCarousel();
        }, 500);
    }
}

function prevSlide() {
    currentIndex--;
    carousel.style.transition = "transform 0.5s ease";
    updateCarousel();

    // Pula silenciosamente para o clone "real" quando chegar no início
    if (currentIndex === 0) {
        setTimeout(() => {
            carousel.style.transition = "none";
            currentIndex = totalImages - 2;
            updateCarousel();
        }, 500);
    }
}

// Inicialização
updateCarousel();