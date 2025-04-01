

const imagese = [
    '../../image/index/carrosselConsole.png',
    '../../image/index/carrosselGamer.png',
    '../../image/index/carrosselMovel.png',
    '../../image/index/carrosselCasa.png'
];

const carrosselImagee = document.getElementById('carrossel_image');

function changeImage(direction) {
    // Prevent multiple transitions at once
    if (isTransitioning) return;
    isTransitioning = true;

    // Disable buttons during transition
    document.querySelectorAll('.carrossel_but').forEach(btn => btn.disabled = true);

    // Calculate the next index
    const nextIndex = (currentIndex + direction + imagese.length) % imagese.length;

    // Preload the next image
    const nextImage = new Image();
    nextImage.src = imagese[nextIndex];

    // Wait for the next image to load
    nextImage.onload = () => {
        // Fade out the current image
        carrosselImagee.style.opacity = 0;

        // Wait for the fade-out to complete
        setTimeout(() => {
            // Swap the image source
            carrosselImagee.src = imagese[nextIndex];
            currentIndex = nextIndex;

            // Fade in the new image
            carrosselImagee.style.opacity = 1;

            // Update the active button
            updateActiveButton(nextIndex);

            // Re-enable buttons after the fade-in completes
            setTimeout(() => {
                isTransitioning = false;
                document.querySelectorAll('.carrossel_but').forEach(btn => btn.disabled = false);
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
    const buttons = document.querySelectorAll('.carrossel_nav button');
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
document.querySelectorAll('.carrossel_nav button').forEach((button, index) => {
    button.addEventListener('click', () => currentSlide(index + 1));
});

// Optional: Auto-rotate every 5 seconds
setInterval(() => {
    changeImage(1);
    updateActiveButton((currentIndex + 1) % imagese.length);
}, 10000);