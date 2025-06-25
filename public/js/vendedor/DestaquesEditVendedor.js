document.addEventListener('DOMContentLoaded', () => {
  const isEditPage = document.querySelector('.destaques')?.dataset.editDestaques === 'true';

  const btnAdd = document.querySelector('.destaques .add');
  const produtosSection = document.querySelector('.produtos');
  const destaquesContainer = document.querySelector('.destaques_container');
  const produtosContainer = document.querySelector('.produtos_container');

  function contarDestaques() {
    return destaquesContainer.querySelectorAll('.index_body_produto_card.produto').length;
  }

  function atualizarBtnAdd() {
    if (!btnAdd) return;
    const qtd = contarDestaques();
    btnAdd.style.display = qtd >= 6 ? 'none' : 'block';

    if (qtd >= 6 && produtosSection.style.display === 'block') {
      produtosSection.style.display = 'none';
    }
  }

  if (btnAdd) {
    btnAdd.addEventListener('click', (e) => {
      e.stopPropagation();
      produtosSection.style.display = produtosSection.style.display === 'block' ? 'none' : 'block';
    });
  }

  if (isEditPage) {
    destaquesContainer.querySelectorAll('.index_body_produto_card').forEach(card => {
      if (!card.querySelector('.btn-remover-destaque')) {
        const produtoId = card.dataset.id;
        const btnRemove = criarBtnRemover(produtoId, card);
        card.appendChild(btnRemove);
      }
      card.classList.add('produto');
    });
  }

  atualizarBtnAdd();

  produtosContainer.addEventListener('click', (e) => {
    e.stopPropagation();
    const produtoCard = e.target.closest('.index_body_produto_card');
    if (!produtoCard) return;

    const produtoId = produtoCard.dataset.id;
    const destaquesAtuais = contarDestaques();

    if (destaquesAtuais >= 6) {
      gerarToast('Você só pode adicionar até 6 produtos nos destaques.', 'erro');
      return;
    }

    if (destaquesContainer.querySelector(`.produto[data-id="${produtoId}"]`)) {
      gerarToast('Produto já está nos destaques.', 'erro');
      return;
    }

    const clone = produtoCard.cloneNode(true);
    clone.classList.add('produto');
    clone.dataset.id = produtoId;

    if (isEditPage) {
      const btnRemove = criarBtnRemover(produtoId, clone);
      clone.appendChild(btnRemove);
    }

    destaquesContainer.insertBefore(clone, btnAdd);
    produtoCard.remove();

    adicionarDestaque(produtoId);
    atualizarBtnAdd();
  });

  document.addEventListener('click', (e) => {
    if (
      produtosSection.style.display === 'block' &&
      !produtosSection.contains(e.target) &&
      !btnAdd.contains(e.target)
    ) {
      produtosSection.style.display = 'none';
    }
  });

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
      const clone = destaquesContainer.querySelector(`.produto[data-id="${produtoId}"]`);
      if (clone) clone.remove();
      atualizarBtnAdd();
    }
  }

  async function removerDestaque(produtoId, elemento) {
    const formdata = new URLSearchParams();
    formdata.append('id_produto', produtoId);

    const resp = await fetch('RemoverDestaque-api', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: formdata.toString()
    });

    const res = await resp.json();

    if (res.success) {
      gerarToast('Produto removido dos destaques.', 'sucesso');
      elemento.remove();

      const clone = elemento.cloneNode(true);
      const btnRemover = clone.querySelector('.btn-remover-destaque');
      if (btnRemover) clone.removeChild(btnRemover);
      clone.classList.remove('produto');
      produtosContainer.appendChild(clone);

      atualizarBtnAdd();
    } else {
      gerarToast('Erro ao remover destaque.', 'erro');
    }
  }

  function criarBtnRemover(produtoId, elementoPai) {
    const btnRemove = document.createElement('button');
    btnRemove.classList.add('btn-remover-destaque');
    btnRemove.style.fontWeight = 600;
    btnRemove.innerHTML = '×';

    btnRemove.addEventListener('click', (e) => {
      e.stopPropagation();
      removerDestaque(produtoId, elementoPai);
    });
    return btnRemove;
  }
});
