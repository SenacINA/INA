document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("input#quantidade_produto").forEach((input) => {
    input.addEventListener("change", async (e) => {
      let quantidade = input.value;
      if (quantidade > 99) {
        gerarToast("Limite de itens atingido", "erro");
        input.value = 99;
      } else {
        let id = e.target.closest(".carrrinho_produto_item").dataset.id;

        let formData = new FormData();
        formData.append("quantidade", quantidade);
        formData.append("id", id);

        await fetch("Carrinho-api-update", {
          method: "POST",
          body: formData,
        }).then(window.location.reload());
      }
    });
  });
});

document.querySelectorAll(".botao_adicionar_ao_carrinho").forEach((botao) => {
  botao.addEventListener("click", () => {
    const produtoId = botao.dataset.id;
    const quantidade = 1;

    fetch("Carrinho/adicionarItem", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `produto_id=${produtoId}&quantidade=${quantidade}`,
    }).then((res) => {
      if (res.ok) {
        console.log("Produto adicionado!");
      }
    });
  });
});
