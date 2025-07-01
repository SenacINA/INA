document.addEventListener("DOMContentLoaded", () => {
  function disableButton() {
    const btnSalvar = document.getElementById("salvar_carrinho");
    const btnRemover = document.getElementById("remover_tudo");
    btnSalvar.setAttribute("disabled", "")
    btnRemover.setAttribute("disabled", "")
  }

  document
    .getElementById("remover_tudo")
    .addEventListener("click", async () => {
      const response = await fetch("Carrinho-api-limpar");

      const json = await response.json();
      if (json.success) {
        gerarToast(json.message, "sucesso");
        document.querySelectorAll("#carrinho_produto").forEach((div) => {
          div.remove();
        });
        document.querySelectorAll("#linha_horizontal").forEach((linha) => {
          linha.remove();
        });

        const div = document.getElementById("carrinho_vazio");
        const p = document.createElement("p");

        p.appendChild(document.createTextNode("Seu carrinho está vazio."));
        div.appendChild(p);

        disableButton();
        atualizarBadge();
      } else {
        gerarToast(json.message, "erro");
      }
    });
  document.querySelectorAll("button#carrinho_remove_btn").forEach((button) => {
    button.addEventListener("click", async () => {
      const formData = new FormData();

      formData.append("id_produto", button.dataset.id);

      const response = await fetch("Carrinho-api-remove", {
        method: "POST",
        body: formData,
      });

      const json = await response.json();

      if (json.success) {
        gerarToast(json.message, "sucesso");

        document.getElementById("carrinho_produto").remove();
        document.getElementById("linha_horizontal").remove();

        const produtos = document.querySelectorAll("#carrinho_produto").length

        if (produtos == 0) {
          const div = document.getElementById("carrinho_vazio");
          const p = document.createElement("p");
  
          p.appendChild(document.createTextNode("Seu carrinho está vazio."));
          div.appendChild(p);

          disableButton();
        }

        atualizarBadge();
      } else {
        gerarToast(json.message, "erro");
      }
    });
  });
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
