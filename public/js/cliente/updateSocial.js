document.addEventListener('DOMContentLoaded', () => {    
    const form = document.getElementById('redesForm');
    const popup = document.getElementById('popup');

    if (!form) return;
  
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const data = new FormData(form);

        try {
            const resp = await fetch('/INA/api/cliente/editar-perfil/redes', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: data
            });

            const json = await resp.json();

            if (json.success) {
                gerarToast(json.message, 'sucesso');
                popup.style.display = 'none';

                setTimeout(() => {
                    window.location.href = 'EditarPerfil';
                }, 5000);
            } else {
                (json.errors || []).forEach(err => gerarToast(err, 'erro'));
            }
        } catch (err) {
            gerarToast('Erro de conexão, tente novamente.', 'erro');
        }
    });
});
