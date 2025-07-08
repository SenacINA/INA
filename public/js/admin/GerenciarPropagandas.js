const validacoesImagem = {};

document.querySelectorAll('.upload_imagem input[type="file"]').forEach((input) => {
  const container = input.closest(".upload_imagem");
  const sizeSpan = container.querySelector(".size_img");
  const imgPreview = container.querySelector("img");

  if (imgPreview && imgPreview.src) {
    const img = new Image();
    img.onload = () => {
      const expectedSize = input.getAttribute("data-size");
      let [expectedWidth, expectedHeight] = expectedSize
        .split("x")
        .map((n) => parseInt(n, 10));

      sizeSpan.textContent = `${img.naturalWidth} x ${img.naturalHeight}`;

      const minWidth = expectedWidth * 0.8;
      const minHeight = expectedHeight * 0.8;

      if (img.naturalWidth < minWidth || img.naturalHeight < minHeight) {
        sizeSpan.style.color = "red";
        validacoesImagem[input.id] = false;
      } else {
        sizeSpan.style.color = "green";
        validacoesImagem[input.id] = true;
      }
    };
    img.src = imgPreview.src;
  }

  input.addEventListener("change", function () {
    const file = this.files[0];
    if (!file) {
      sizeSpan.textContent = "";
      sizeSpan.style.color = "";
      validacoesImagem[this.id] = false;
      return;
    }

    const previewImg = container.querySelector("img");
    if (previewImg) previewImg.remove();

    const img = new Image();
    const url = URL.createObjectURL(file);

    img.onload = () => {
      container.appendChild(img);

      const expectedSize = this.getAttribute("data-size");
      let [expectedWidth, expectedHeight] = expectedSize
        .split("x")
        .map((n) => parseInt(n, 10));

      sizeSpan.textContent = `${img.naturalWidth} x ${img.naturalHeight}`;

      const minWidth = expectedWidth * 0.8;
      const minHeight = expectedHeight * 0.8;

      if (img.naturalWidth < minWidth || img.naturalHeight < minHeight) {
        sizeSpan.style.color = "red";
        validacoesImagem[this.id] = false;
      } else {
        sizeSpan.style.color = "green";
        validacoesImagem[this.id] = true;
      }

      URL.revokeObjectURL(url);
    };

    img.src = url;
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const inputs = document.querySelectorAll("input[type='file'][id^='file']");

  const btnEnviarCarrossel = document.getElementById("btnEnviarCarrossel");
  const btnEnviarPropagandas = document.getElementById("btnEnviarPropagandas");

  btnEnviarCarrossel.addEventListener("click", async (e) => {
    e.preventDefault();
    await enviarImagensPorTipo("carrossel", 1, 4);
  });

  btnEnviarPropagandas.addEventListener("click", async (e) => {
    e.preventDefault();
    await enviarImagensPorTipo("propaganda", 5, 8);
  });

  async function enviarImagensPorTipo(tipoBase, inicio, fim) {
    for (let i = inicio; i <= fim; i++) {
      const input = document.getElementById(`file${i}`);
      if (!input || input.files.length === 0) continue;

      if (validacoesImagem[input.id] === false) {
        const label = document.querySelector(`label[for="${input.id}"]`);
        const nomeImagem = label ? label.textContent.trim() : `Imagem ${input.id}`;
        gerarToast(`${nomeImagem} é muito pequena.`, "erro");
        continue;
      }

      const file = input.files[0];
      const index = i < 5 ? i - 1 : i - 5;

      let tipo = tipoBase;
      if (tipoBase === "propaganda") {
        tipo = input.getAttribute("data-size");
      }

      const formData = new FormData();
      formData.append("imagem", file);
      formData.append("tipo", tipo);
      formData.append("index", index);

      try {
        const response = await fetch("/INA/GerenciarPropagandas-api", {
          method: "POST",
          body: formData,
        });

        const text = await response.text();

        try {
          const resultado = JSON.parse(text);

          if (response.ok && resultado.sucesso) {
            gerarToast('Imagens salvas com sucesso.', 'sucesso');
          } else {
            gerarToast("Erro ao salvar imagem.", "erro");
          }
        } catch (jsonError) {
          gerarToast("Resposta inesperada do servidor: " + text, "erro");
        }
      } catch (error) {
        gerarToast("Erro na requisição.", "erro");
      }
    }
  }
});
