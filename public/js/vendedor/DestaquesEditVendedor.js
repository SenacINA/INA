document.addEventListener('DOMContentLoaded', () => {
  const btnAdd = document.querySelector('.destaques .add');
  const produtosSection = document.querySelector('.produtos');
  const destaquesContainer = document.querySelector('.destaques_container');
  const produtosContainer = document.querySelector('.produtos_container');

  btnAdd.addEventListener('click', () => {
    produtosSection.style.display = produtosSection.style.display === 'block' ? 'none' : 'block';
  });

  produtosContainer.addEventListener('click', (e) => {
    const produtoCard = e.target.closest('.index_body_produto_card');
    if (!produtoCard) return;

    const produtoId = produtoCard.dataset.id;

    if (destaquesContainer.querySelector(`.produto[data-id="${produtoId}"]`)) {
      alert('Produto já está nos destaques.');
      return;
    }

    const clone = produtoCard.cloneNode(true);
    clone.classList.add('produto');
    clone.dataset.id = produtoId;
    destaquesContainer.insertBefore(clone, btnAdd);
    produtosSection.style.display = 'none';

    function adicionarDestaque(ProdutoId) {
      fetch('/SalvarDestaque-api', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id_produto=' + encodeURIComponent(ProdutoId)
      })
        .then(res => {
          if (!res.ok) throw new Error('Resposta não OK');
          return res.json();
        })
        .then(data => {
          if (data.success) {
            alert('Produto adicionado aos destaques!');
          } else {
            alert(data.error || 'Erro ao adicionar destaque');
          }
        })
        .catch(() => alert('Erro na comunicação com o servidor'));
    }

    adicionarDestaque(produtoId);
  });
});
