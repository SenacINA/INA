// import '/base.js';

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".form_adicionar_carrinho").forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const resp = await fetch("Carrinho-api-add", {
        method: "POST",
        body: formData,
      });
      const json = await resp.json();
      if (!json.success) {
        gerarToast(json.message, "erro");
      } else {
        atualizarBadge();
      }
    });
    async function atualizarBadge() {
      await fetch("Carrinho-api-badge")
        .then((res) => res.json())
        .then((data) => {
          const badge = document.getElementById("carrinho-badge");
          if (badge) {
            badge.innerText = data.quantidade;
            badge.style.display = data.quantidade ? "inline" : "none";
          }
        });
    }
  });
});
