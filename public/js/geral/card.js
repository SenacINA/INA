document.addEventListener("DOMContentLoaded", () => {
  document.body.addEventListener("click", async (event) => {
    const btn = event.target.closest(".adicionar_carrinho");

    if (!btn) return;

    const formData = new FormData();
    formData.append("produto_id", btn.dataset.id);
    formData.append("quantidade", btn.dataset.quantidade);

    try {
      const response = await fetch("Carrinho-api-add", {
        method: "POST",
        body: formData,
      });

      const json = await response.json(); // <- Corrigido aqui

      if (!json.success) {
        gerarToast(json.message, "erro");
      } else {
        gerarToast(json.message, "sucesso");
        atualizarBadge();
      }
    } catch (error) {
      console.error("Erro ao adicionar ao carrinho:", error);
      gerarToast("Erro interno ao adicionar ao carrinho.", "erro");
    }
  });
});
