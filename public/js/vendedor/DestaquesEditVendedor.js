import cardProduto from "/INA/app/components/js/card_produto.js";

document.addEventListener("DOMContentLoaded", async () => {
  const isEditPage =
    document.querySelector(".destaques").dataset.editDestaques === "true";

  const btnAdd = document.querySelector(".destaques .add");
  const produtosSection = document.querySelector(".produtos");
  const destaquesContainer = document.querySelector(".destaques_container");
  const produtosContainer = document.querySelector(".produtos_container");
  const idVendedor = produtosContainer.dataset.id;

  function renderProdutos(container, produtos, adicionarBtnRemover = false) {
    produtos.forEach((produto) => {
      const cardHTML = cardProduto(produto);
      const tempDiv = document.createElement("div");
      tempDiv.innerHTML = cardHTML.trim();
      const cardElement = tempDiv.firstElementChild;

      cardElement.dataset.id = produto.id_produto;
      cardElement.classList.add("index_body_produto_card");

      if (adicionarBtnRemover) {
        cardElement.classList.add("produto");
        const btnRemove = criarBtnRemover(produto.id_produto, cardElement);
        cardElement.appendChild(btnRemove);
      }

      container.appendChild(cardElement);
    });
    if (btnAdd && adicionarBtnRemover) container.appendChild(btnAdd);
  }

  async function getProdutos(id_vendedor) {
    if (!id_vendedor) return [];
    const formData = new FormData();
    formData.append("id_vendedor", id_vendedor);

    const request = await fetch("ProdutosVendedor", {
      method: "POST",
      body: formData,
    });

    return await request.json();
  }

  async function getDestaques() {
    const response = await fetch("DestaquesVendedor", { method: "POST" });

    return await response.json();
  }

  function contarDestaques() {
    return destaquesContainer.querySelectorAll(
      ".index_body_produto_card.produto"
    ).length;
  }

  function atualizarBtnAdd() { 
    const qtd = contarDestaques();
    btnAdd.style.display = qtd >= 6 ? "none" : "block";

    if (qtd >= 6 && produtosSection.style.display === "block") {
      produtosSection.style.display = "none";
    }
  }

  if (btnAdd) {
    btnAdd.addEventListener("click", (e) => {
      e.stopPropagation();
      produtosSection.style.display =
        produtosSection.style.display === "block" ? "none" : "block";
    });
  }

  if (isEditPage) {
    const destaques = await getDestaques(idVendedor);
    renderProdutos(destaquesContainer, destaques, true);
  }

  const produtos = await getProdutos(idVendedor);

  renderProdutos(produtosContainer, produtos, false);

  atualizarBtnAdd();

  produtosContainer.addEventListener("click", (e) => {
    e.stopPropagation();
    const produtoCard = e.target.closest(".index_body_produto_card");
    if (!produtoCard) return;

    const produtoId = produtoCard.dataset.id;
    const destaquesAtuais = contarDestaques();

    if (destaquesAtuais >= 6) {
      gerarToast(
        "Você só pode adicionar até 6 produtos nos destaques.",
        "erro"
      );
      return;
    }

    if (destaquesContainer.querySelector(`.produto[data-id="${produtoId}"]`)) {
      gerarToast("Produto já está nos destaques.", "erro");
      return;
    }

    produtosContainer.removeChild(produtoCard);
    produtoCard.classList.add("produto");
    if (isEditPage) {
      const btnRemove = criarBtnRemover(produtoId, produtoCard);
      produtoCard.appendChild(btnRemove);
    }
    destaquesContainer.insertBefore(produtoCard, btnAdd);

    adicionarDestaque(produtoId);
    atualizarBtnAdd();
  });

  document.addEventListener("click", (e) => {
    if (
      produtosSection.style.display === "block" &&
      !produtosSection.contains(e.target) &&
      !btnAdd.contains(e.target)
    ) {
      produtosSection.style.display = "none";
    }
  });

  async function adicionarDestaque(produtoId) {
    const formdata = new URLSearchParams();
    formdata.append("id_produto", produtoId);

    try {
      const resp = await fetch("SalvarDestaque-api", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: formdata.toString(),
      });

      const res = await resp.json();

      if (res.success) {
        gerarToast("Produto adicionado aos destaques.", "sucesso");
      } else {
        throw new Error(res.error || "Erro ao adicionar destaque.");
      }
    } catch (error) {
      gerarToast(error.message, "erro");
      const clone = destaquesContainer.querySelector(
        `.produto[data-id="${produtoId}"]`
      );
      if (clone) clone.remove();
      atualizarBtnAdd();
    }
  }

  async function removerDestaque(produtoId, elemento) {
    const formdata = new URLSearchParams();
    formdata.append("id_produto", produtoId);

    try {
      const resp = await fetch("RemoverDestaque-api", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: formdata.toString(),
      });

      const res = await resp.json();

      if (res.success) {
        gerarToast("Produto removido dos destaques.", "sucesso");
        elemento.remove();

        const clone = elemento.cloneNode(true);
        const btnRemover = clone.querySelector(".btn-remover-destaque");
        if (btnRemover) clone.removeChild(btnRemover);
        clone.classList.remove("produto");
        produtosContainer.appendChild(clone);

        atualizarBtnAdd();
      } else {
        throw new Error(res.error || "Erro ao remover destaque.");
      }
    } catch (error) {
      gerarToast(error.message, "erro");
    }
  }

  function criarBtnRemover(produtoId, elementoPai) {
    const btnRemove = document.createElement("button");
    btnRemove.classList.add("btn-remover-destaque");
    btnRemove.style.fontWeight = 600;
    btnRemove.innerHTML = "×";

    btnRemove.addEventListener("click", (e) => {
      e.stopPropagation();
      removerDestaque(produtoId, elementoPai);
    });
    return btnRemove;
  }
});
