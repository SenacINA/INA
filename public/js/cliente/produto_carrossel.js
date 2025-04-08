document.addEventListener('DOMContentLoaded', () => {
    const imageList = [
        '../../../public/image/cliente/produto/cadeira_gamer_1.jpg',
        '../../../public/image/cliente/produto/cadeira_gamer_2.jpg',
        '../../../public/image/cliente/produto/cadeira_gamer_3.jpg',
        '../../../public/image/cliente/produto/cadeira_gamer_4.jpg'
    ];

    const mainImage = document.querySelector('.produto_image img');
    const thumbnailsContainer = document.querySelector('.images_scroll');
    const prevButton = document.querySelector('.icon_scroll:not(.foward)');
    const nextButton = document.querySelector('.icon_scroll.foward');
    let currentIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;

    function updateMainImage(index) {
        document.querySelectorAll('.images_scroll div').forEach(thumb => {
            thumb.classList.remove('imagem_selecionada');
        });

        currentIndex = index;
        mainImage.src = imageList[currentIndex];
        thumbnailsContainer.children[currentIndex].classList.add('imagem_selecionada');
    }

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
        updateMainImage(currentIndex);
    });

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % imageList.length;
        updateMainImage(currentIndex);
    });

    thumbnailsContainer.addEventListener('click', (e) => {
        const thumbnailDiv = e.target.closest('.images_scroll div');
        if (thumbnailDiv) {
            const index = Array.from(thumbnailsContainer.children).indexOf(thumbnailDiv);
            updateMainImage(index);
        }
    });

    document.querySelector('.produto_image').addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    });

    document.querySelector('.produto_image').addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchStartX - touchEndX > 30) {
            currentIndex = (currentIndex + 1) % imageList.length;
            updateMainImage(currentIndex);
        }
        if (touchStartX - touchEndX < -30) {
            currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
            updateMainImage(currentIndex);
        }
    });

    updateMainImage(0);
});