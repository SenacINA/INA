document.addEventListener("DOMContentLoaded", () => {
  const btnSalvar = document.getElementById("salvar_carrinho");
  const btnRemover = document.getElementById("remover_tudo");

  function disableButton() {
    btnSalvar.setAttribute("disabled", "");
    btnRemover.setAttribute("disabled", "");
  }

  function mostrarCarrinhoVazio() {
    const div = document.getElementById("carrinho_vazio");
    const p = document.createElement("p");
    p.textContent = "Seu carrinho está vazio.";
    div.appendChild(p);
  }

  async function removerTodosProdutos() {
    const response = await fetch("Carrinho-api-limpar");
    const json = await response.json();

    if (json.success) {
      gerarToast(json.message, "sucesso");

      document
        .querySelectorAll("[data-carrinho-produto]")
        .forEach((div) => div.remove());
      document
        .querySelectorAll("[data-linha-horizontal]")
        .forEach((linha) => linha.remove());

      mostrarCarrinhoVazio();
      disableButton();
      atualizarBadge();
    } else {
      gerarToast(json.message, "erro");
    }
  }

  async function removerProdutoIndividual(button) {
    const idProduto = button.dataset.id;

    const formData = new FormData();
    formData.append("id_produto", idProduto);

    const response = await fetch("Carrinho-api-remove", {
      method: "POST",
      body: formData,
    });

    const json = await response.json();

    if (json.success) {
      gerarToast(json.message, "sucesso");

      const produto = button.closest("[data-carrinho-produto]");
      const linha =
        produto?.nextElementSibling?.dataset.linhaHorizontal !== undefined
          ? produto.nextElementSibling
          : null;

      produto.remove();
      if (linha) linha.remove();

      const produtos = document.querySelectorAll(
        "[data-carrinho-produto]"
      ).length;

      if (produtos === 0) {
        mostrarCarrinhoVazio();
        disableButton();
      }

      atualizarBadge();
    } else {
      gerarToast(json.message, "erro");
    }
  }

  // Remover todos
  btnRemover?.addEventListener("click", removerTodosProdutos);

  // Remover individual
  document.querySelectorAll("[data-carrinho-remove-btn]").forEach((button) => {
    button.addEventListener("click", () => removerProdutoIndividual(button));
  });

  // Atualizar quantidade
  document.querySelectorAll("[data-quantidade-produto]").forEach((input) => {
    input.addEventListener("change", async (e) => {
      let quantidade = input.value;
      if (quantidade > 99) {
        gerarToast("Limite de itens atingido", "erro");
        input.value = 99;
      } else {
        const id = e.target.closest("[data-carrinho-produto]").dataset.id;

        const formData = new FormData();
        formData.append("quantidade", quantidade);
        formData.append("id", id);

        await fetch("Carrinho-api-update", {
          method: "POST",
          body: formData,
        });

        window.location.reload();
      }
    });
  });
});
