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
      gerarToast('Produto já está nos destaques.', 'erro');
      return; 
    }

    const clone = produtoCard.cloneNode(true);
    clone.classList.add('produto');
    clone.dataset.id = produtoId;
    destaquesContainer.insertBefore(clone, btnAdd);

    produtosSection.style.display = 'none';

    adicionarDestaque(produtoId);

    async function adicionarDestaque(produtoId) {
      const formdata = new URLSearchParams();
      formdata.append('id_produto', produtoId);

      const resp = await fetch('SalvarDestaque-api', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: formdata.toString()
      });

      const res = await resp.json();

      if (res.success) {
        gerarToast('Produto adicionado aos destaques.', 'sucesso');
      } else {
        gerarToast('Erro ao adicionar destaque.', 'erro');
        clone.remove();
      }
    }
  });
});
