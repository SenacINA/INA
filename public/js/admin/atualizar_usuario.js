document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formPesquisa');
    if (!form) return;
  
    form.addEventListener('submit', async e => {
      e.preventDefault();
  
      const data = new FormData(form);
  
      try {
        const resp = await fetch('/INA/api/admin/pesquisar-cliente', {
          method: 'POST',
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          body: data
        });
  
        const json = await resp.json();
  
        if (json.success) {
          gerarToast(json.message || 'Busca realizada com sucesso.', 'sucesso');
          form.reset();
        } else {
          (json.errors || []).forEach(err => gerarToast(err, 'erro'));
        }
  
      } catch (err) {
        gerarToast('Erro de conexão, tente novamente.', 'erro');
      }
    });
  });
  