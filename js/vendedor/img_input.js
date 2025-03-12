let totalImagens = 0;

document.getElementById('input-file').addEventListener('change', function(event) {
    const files = event.target.files;
    const div = document.querySelector('.editar_produto_imagens');
    
    Array.from(files).forEach(file => {
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                div.appendChild(img);
                totalImagens++;
                atualizarContadores();
            };
            reader.readAsDataURL(file);
        }
    });
});

function adicionarImagemPorURL() {
    const url = document.getElementById('input-url').value;
    if (url) {
        const img = document.createElement('img');
        img.src = url;
        const div = document.querySelector('.editar_produto_imagems');
        div.appendChild(img);
        totalImagens++;
        atualizarContadores();
        document.getElementById('input-url').value = '';
    }
}

function atualizarContadores() {
    document.getElementById('contador-total').innerText = `${totalImagens} `;
}