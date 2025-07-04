document.addEventListener('DOMContentLoaded', () => {
  const catSelect = document.getElementById('categoriaProduto');
  const subSelect = document.getElementById('subCategoriaProduto');

  const selectedCatId = catSelect.dataset.selected || '';
  const selectedSubId = subSelect.dataset.selected || '';

  fetch('GetCategoriasSubcategorias-api')
    .then(response => {
      if (!response.ok) {
        throw new Error('Rede retornou status ' + response.status);
      }
      return response.json();
    })
    .then(resp => {
      if (!resp.success) {
        throw new Error('API retornou sucesso=false');
      }

      const cats = Array.isArray(resp.data) ? resp.data : [];

      const subcatsByCat = {};
      cats.forEach(cat => {
        subcatsByCat[cat.id] = Array.isArray(cat.subcategorias)
          ? cat.subcategorias
          : [];
      });

      cats.forEach(cat => {
        const opt = document.createElement('option');
        opt.value = cat.id;
        opt.textContent = cat.nome;
        if (String(cat.id) === String(selectedCatId)) {
          opt.selected = true;
        }
        catSelect.appendChild(opt);
      });

      if (selectedCatId) {
        updateSubcats(selectedCatId, subcatsByCat, selectedSubId);
      }

      catSelect.addEventListener('change', e => {
        updateSubcats(e.target.value, subcatsByCat, null);
      });
    })
    .catch(err => {
      console.error('Erro ao carregar categorias:', err);
    });

  function updateSubcats(catId, subcatsByCat, preselectSubId) {
    subSelect.innerHTML = '<option value="" disabled selected>Selecione</option>';

    const list = subcatsByCat[catId] || [];
    list.forEach(sub => {
      const opt = document.createElement('option');
      opt.value = sub.id;
      opt.textContent = sub.nome;
      if (preselectSubId && String(sub.id) === String(preselectSubId)) {
        opt.selected = true;
      }
      subSelect.appendChild(opt);
    });
  }
});
