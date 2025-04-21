document.addEventListener('DOMContentLoaded', () => {
    
    const URL = '.';

    const desktopImages = [
        `${URL}/public/image/carrossel/banner_carrossel_perifericos.png`,
        `${URL}/public/image/carrossel/banner_carrossel_escritorio.png`,
        `${URL}/public/image/carrossel/banner_carrossel_eletronicos.png`,
        `${URL}/public/image/carrossel/banner_carrossel_eletrodomesticos.png`
    ];
    
    const mobileImages = [
        `${URL}/public/image/carrossel/banner_carrossel_perifericos_mobile.png`,
        `${URL}/public/image/carrossel/banner_carrossel_escritorio_mobile.png`,
        `${URL}/public/image/carrossel/banner_carrossel_eletronicos_mobile.png`,
        `${URL}/public/image/carrossel/banner_carrossel_eletrodomesticos_mobile.png`
    ];

    let activeImages = [];
    const carrosselImage = document.getElementById('carrossel_image');
    let isTransitioning = false;
    let currentIndex = 0;

    const handleResponsiveChange = (mediaQuery) => {
        if (mediaQuery.matches) {
            activeImages = [...mobileImages];
        } else {
            activeImages = [...desktopImages];
        }
        
        carrosselImage.src = activeImages[currentIndex];
        updateNavButtons();
        updateActiveButton(currentIndex);
    };

    const mediaQuery = window.matchMedia('(max-width: 1024px)');
    mediaQuery.addListener(handleResponsiveChange);
    handleResponsiveChange(mediaQuery);

    function updateNavButtons() {
        const navContainer = document.querySelector('.carrossel_nav');
        navContainer.innerHTML = '';
        activeImages.forEach((_, index) => {
            const button = document.createElement('button');
            button.onclick = () => currentSlide(index);
            if (index === currentIndex) button.classList.add('active');
            navContainer.appendChild(button);
        });
    }

    function changeImage(direction) {
        if (isTransitioning) return;
        isTransitioning = true;

        document.querySelectorAll('.carrossel_but').forEach(btn => btn.disabled = true);

        const nextIndex = (currentIndex + direction + activeImages.length) % activeImages.length;
        const nextImage = new Image();
        nextImage.src = activeImages[nextIndex];

        nextImage.onload = () => {
            carrosselImage.style.opacity = 0;
            setTimeout(() => {
                carrosselImage.src = activeImages[nextIndex];
                currentIndex = nextIndex;
                carrosselImage.style.opacity = 1;
                updateActiveButton(nextIndex);

                setTimeout(() => {
                    isTransitioning = false;
                    document.querySelectorAll('.carrossel_but').forEach(btn => btn.disabled = false);
                }, 500);
            }, 500);
        };
    }

    function currentSlide(index) {
        if (isTransitioning) return;
        const direction = index - currentIndex;
        changeImage(direction);
    }

    function updateActiveButton(index) {
        const buttons = document.querySelectorAll('.carrossel_nav button');
        buttons.forEach((button, i) => {
            button.classList.toggle('active', i === index);
        });
    }

    document.querySelector('.forward').addEventListener('click', () => changeImage(1));
    document.querySelector('.back').addEventListener('click', () => changeImage(-1));

    // Adicionar funcionalidade de scroll para dispositivos móveis
    let touchStartX = 0;
    let touchEndX = 0;

    carrosselImage.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    carrosselImage.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchStartX - touchEndX > 30) {
            changeImage(1); // Scroll para frente
        }
        if (touchStartX - touchEndX < -30) {
            changeImage(-1); // Scroll para trás
        }
    });

    setInterval(() => {
        changeImage(1);
    }, 10000);
});