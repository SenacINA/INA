document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('cadastroForm');
    if (!form) return;
  
    form.addEventListener('submit', async e => {
      e.preventDefault();
      const data = new FormData(form);
  
      try {
        const resp = await fetch('/INA/api/cliente/register', {
          method: 'POST',
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          body: data
        });
        const json = await resp.json();
  
        if (json.success) {
          gerarToast(json.message, 'sucesso');
          form.reset();
        } else {
          (json.errors || []).forEach(err => gerarToast(err, 'erro'));
        }
      } catch (err) {
        gerarToast('Erro de conexão, tente novamente.', 'erro');
      }
    });
  });
  