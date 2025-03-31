document.addEventListener('DOMContentLoaded', function() {
    const btnTopo = document.getElementById('btnTopo');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 2000) { 
            btnTopo.classList.add('visible');
        } else {
            btnTopo.classList.remove('visible');
        }
    });
    
    btnTopo.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});