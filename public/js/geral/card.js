// import '/base.js';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.form_adicionar_carrinho').forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            await fetch('Carrinho-api-add', {
                method: 'POST',
                body: formData
            }).then(() => {
                atualizarBadge();
            });
        });
    });
});