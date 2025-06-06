document.addEventListener('DOMContentLoaded', function () {

    const btnTopo = document.getElementById('btnTopo');
    const pageHeight = document.documentElement.clientHeight;

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