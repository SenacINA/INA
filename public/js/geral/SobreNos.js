let currentIndex = 0;
const carousel = document.getElementById("carousel");
const images = document.querySelectorAll(".carousel img");
const footer = document.getElementById("footer");
const totalImages = images.length;

const descriptions = [
    { name: "Enzo Guenka Lopez", text: "Trabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manrabalhou dia e noite para idk manou dia e noite para idk man." },
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