document.addEventListener('DOMContentLoaded', () => {
    const parallax = document.getElementById('hoverElement')

    if(!parallax)return

    if(sessionStorage.getItem('parallax')){
        parallax.parentNode.removeChild(parallax);
        return
    }

    const id = setTimeout(() => {
        sessionStorage.setItem('parallax', 'true')
        parallax.parentNode.removeChild(parallax);
        clearTimeout(id)
    }, 5000)
})