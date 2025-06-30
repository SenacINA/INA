document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("btnSalvarEndereco");
  const btnRemove = document.querySelectorAll("#carrinho_dados_remove_btn");
  const btnEdit = document.querySelectorAll("#carrinho_dados_edit_btn");

  btnRemove.forEach((btn) => {
    btn.addEventListener("click", async (e) => {
      const formData = new FormData();
      formData.append("endereco_id", btn.dataset.id);

      const response = await fetch("CarrinhoDados-excluir", {
        method: "POST",
        body: formData,
      });

      const json = await response.json();

      if (json.success) {
        gerarToast(json.message, "sucesso");
        e.target.closest("div").parentNode.parentNode.remove();
      } else {
        gerarToast(json.message, "erro");
      }
    });
  });

  btnEdit.forEach((btn) => {
    btn.addEventListener("click", async () => {
      const formData = new FormData();
      formData.append("endereco_id", btn.dataset.id);

      const response = await fetch("CarrinhoDados-Editar", {
        method: "POST",
        body: formData,
      });

      console.log(await response.json())
    });
  });

  btn.addEventListener("click", async () => {
    const formData = new FormData();

    const dados = {
      bairro: document.getElementById("bairro").value.trim(),
      endereco: document.getElementById("endereco_carrinho").value.trim(),
      numeroCasa: document.getElementById("numero_casa").value.trim(),
      cidade: document.getElementById("cidade").value.trim(),
      telefone: document.getElementById("telefone").value.trim(),
      referencia: document.getElementById("referencia").value.trim(),
    };

    Object.keys(dados).forEach((key) => {
      const value = dados[key];
      formData.append(`${key}`, value);
    });

    const response = await fetch("CarrinhoDados-salvar", {
      method: "POST",
      body: formData,
    });

    const data = await response.json();

    if (data.success) {
      gerarToast(data.message, "sucesso");
      setTimeout(() => {
        window.location.reload();
      }, 1500);
    } else {
      gerarToast(data.message, "erro");
    }
  });
});
