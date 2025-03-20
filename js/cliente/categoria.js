

const images = [
    '../../../../image/index/carrosselConsole.png',
    '../../../../image/index/carrosselGamer.png',
    '../../../../image/index/carrosselMovel.png',
    '../../../../image/index/carrosselCasa.png'
];

let currentIndex = 0;
const carrosselImage = document.getElementById('carrossel_image');
let isTransitioning = false; // Prevents overlapping transitions

function changeImage(direction) {
    // Prevent multiple transitions at once
    if (isTransitioning) return;
    isTransitioning = true;

    // Disable buttons during transition
    document.querySelectorAll('.index_body_carrossel_but').forEach(btn => btn.disabled = true);

    // Calculate the next index
    const nextIndex = (currentIndex + direction + images.length) % images.length;

    // Preload the next image
    const nextImage = new Image();
    nextImage.src = images[nextIndex];

    // Wait for the next image to load
    nextImage.onload = () => {
        // Fade out the current image
        carrosselImage.style.opacity = 0;

        // Wait for the fade-out to complete
        setTimeout(() => {
            // Swap the image source
            carrosselImage.src = images[nextIndex];
            currentIndex = nextIndex;

            // Fade in the new image
            carrosselImage.style.opacity = 1;

            // Update the active button
            updateActiveButton(nextIndex);

            // Re-enable buttons after the fade-in completes
            setTimeout(() => {
                isTransitioning = false;
                document.querySelectorAll('.index_body_carrossel_but').forEach(btn => btn.disabled = false);
            }, 500); // Match this timeout with the CSS transition duration
        }, 500); // Match this timeout with the CSS transition duration
    };
}

function currentSlide(index) {
    if (isTransitioning) return;
    const direction = index - 1 - currentIndex;
    changeImage(direction);
}

function updateActiveButton(index) {
    const buttons = document.querySelectorAll('.index_body_carrossel_nav button');
    buttons.forEach((button, i) => {
        if (i === index) {
            button.classList.add('active');
        } else {
            button.classList.remove('active');
        }
    });
}

// Event listeners for buttons
document.querySelector('.forward').addEventListener('click', () => changeImage(1));
document.querySelector('.back').addEventListener('click', () => changeImage(-1));

// Event listeners for navigation buttons
document.querySelectorAll('.index_body_carrossel_nav button').forEach((button, index) => {
    button.addEventListener('click', () => currentSlide(index + 1));
});

// Optional: Auto-rotate every 5 seconds
setInterval(() => {
    changeImage(1);
    updateActiveButton((currentIndex + 1) % images.length);
}, 10000);


function categoria(){
    let template = document.getElementById('produto_card_template');
    const container = document.getElementsByClassName('linha_card_produto');

    for(conteudo of container){
        for (let i = 0; i < 5; i++) {
            const clone = document.importNode(template.content, true);
            
            //Remove card de desconto/preço antigo de elemetos fora de destaque
            if(conteudo.id != "destaque_produtos"){
                const cardDesconto = clone.querySelector('#card_desconto_template');
                if (cardDesconto) {
                    cardDesconto.remove();//remove o elemento
                }
                const cardTextoDesconto = clone.querySelector('.card_preco_desconto')
                if(cardTextoDesconto){
                    cardTextoDesconto.remove();
                }
            }

            /**
             * @type {HTMLElement}
             */
            const cardEstrela = clone.querySelector('.card_estrela_texto')
            if(cardEstrela){
                let quantidade = (3 + Math.floor(Math.random() * 3)) * 10;
                if(quantidade !== 50){
                    quantidade += Math.random() > 0.5 ? 5 : 0;
                }
                cardEstrela.classList.add(`estrela_${quantidade}`)
            }
            /**
             * @type {HTMLElement}
             */
            const cardEstrelaQuantidade = clone.querySelector('.card_estrela_quantidade')
            if(cardEstrelaQuantidade){
                cardEstrelaQuantidade.innerText = `(${Math.ceil(Math.random() * 4000)})`
            }
            conteudo.appendChild(clone);
        }
    }
}
categoria()
