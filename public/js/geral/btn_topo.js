document.addEventListener('DOMContentLoaded', function () {
    const scriptTag = document.querySelector('script[data-isindex]');
    const isIndex = parseInt(scriptTag.dataset.isindex, 10) || 0;
    const URL = isIndex === 1 ? '' : '../';

    const btnTopo = document.getElementById('btnTopo');
    const pageHeight = document.documentElement.clientHeight;

    btnTopo.style.backgroundImage = `url(${URL}image/icons/topo.png)`; // Exemplo de ajuste com base no isIndex

    window.addEventListener('scroll', function () {
        if (window.pageYOffset > pageHeight) {
            btnTopo.classList.add('visible');
        } else {
            btnTopo.classList.remove('visible');
        }
    });

    btnTopo.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});