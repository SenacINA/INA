document.addEventListener("DOMContentLoaded", () => {
  const btnSalvar = document.getElementById("btnSalvarEndereco");
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

      const response = await fetch("CarrinhoDados-editar", {
        method: "POST",
        body: formData,
      });

      const json = await response.json();

      const inputs = {
        bairro_endereco: document.getElementById("bairro"),
        rua_endereco: document.getElementById("endereco_carrinho"),
        numero_endereco: document.getElementById("numero_casa"),
        cidade_endereco: document.getElementById("cidade"),
        referencia_endereco: document.getElementById("referencia"),
      };

      Object.keys(inputs).forEach((key) => {
        const info = json[key];
        inputs[key].value = info;
      });

      btnSalvar.value = btn.dataset.id;
    });
  });

  btnSalvar.addEventListener("click", async () => {
    const formData = new FormData();

    const dados = {
      bairro: document.getElementById("bairro").value.trim(),
      endereco: document.getElementById("endereco_carrinho").value.trim(),
      numero: document.getElementById("numero_casa").value.trim(),
      cidade: document.getElementById("cidade").value.trim(),
      referencia: document.getElementById("referencia").value.trim(),
    };

    let vazio = false;

    Object.keys(dados).forEach((key) => {
      if (dados[key] === "") {
        if (key != "referencia") {
          gerarToast(`Preencha o campo de ${key}`, "erro");
          vazio = true;
        }
      }
    });

    if (!vazio) {
      Object.keys(dados).forEach((key) => {
        const value = dados[key];
        formData.append(`${key}`, value);
      });

      if (btnSalvar.value !== "") {
        formData.append("id_endereco", btnSalvar.value);
      }

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
    }
  });
});
