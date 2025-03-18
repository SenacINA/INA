const images = [
    './image/index/carrosselMovel.png',
    './image/index/carrosselGamer.png',
    './image/index/carrosselConsole.png',
    './image/index/carrosselCasa.png'
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

            // Re-enable buttons after the fade-in completes
            setTimeout(() => {
                isTransitioning = false;
                document.querySelectorAll('.index_body_carrossel_but').forEach(btn => btn.disabled = false);
            }, 500); // Match this timeout with the CSS transition duration
        }, 500); // Match this timeout with the CSS transition duration
    };
}

// Event listeners for buttons
document.querySelector('.forward').addEventListener('click', () => changeImage(1));
document.querySelector('.back').addEventListener('click', () => changeImage(-1));

// Optional: Auto-rotate every 5 seconds
setInterval(() => changeImage(1), 10000);