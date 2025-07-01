document.addEventListener("DOMContentLoaded", () => {
  const btnCarrinho = document.getElementById("produto_add_carrinho");
  const btnComprar = document.getElementById("produto_comprar");

  btnCarrinho.addEventListener("click", async () => {
    const formData = new FormData();
    formData.append("produto_id", btnCarrinho.dataset.id);

    const response = await fetch("Carrinho-api-add", {
      method: "POST",
      body: formData,
    });
    const json = await response.json();

    if (!json.success) {
      gerarToast(json.message, "erro");
    } else {
      gerarToast(json.message, "sucesso");
      atualizarBadge();
    }
  });

  btnComprar.addEventListener("click", async () => {
    const formData = new FormData();
    formData.append("produto_id", btnComprar.dataset.id)

    const response = await fetch("Carrinho-api-add", {
      method: "POST",
      body: formData
    });
    const json = await response.json();

    if(!json.success) {
      gerarToast(json.message, "erro");
    } else {
      pag('Carrinho');
    }
  })
});
