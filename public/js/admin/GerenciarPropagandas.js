const validacoesImagem = {};

document
  .querySelectorAll('.upload_imagem input[type="file"]')
  .forEach((input) => {
    const container = input.closest(".upload_imagem");
    const sizeSpan = container.querySelector(".size_img");
    const imgPreview = container.querySelector("img");
    const placeholder = container.querySelector(".placeholder");

    if (imgPreview && imgPreview.src) {
      container.classList.remove("sem-imagem");
      if (placeholder) placeholder.classList.add("hidden");

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
    } else {
      sizeSpan.textContent = "0 x 0";
      sizeSpan.style.color = "";
      validacoesImagem[input.id] = false;
      container.classList.add("sem-imagem");
      if (placeholder) placeholder.classList.remove("hidden");
    }

    input.addEventListener("change", function () {
      const file = this.files[0];
      if (!file) {
        sizeSpan.textContent = "0 x 0";
        sizeSpan.style.color = "red";
        validacoesImagem[this.id] = false;

        const previewImg = container.querySelector("img");
        if (previewImg) previewImg.remove();

        if (placeholder) placeholder.classList.remove("hidden");
        container.classList.add("sem-imagem");
        return;
      }

      container.classList.remove("sem-imagem");

      const previewImg = container.querySelector("img");
      if (previewImg) previewImg.remove();

      const img = new Image();
      const url = URL.createObjectURL(file);

      img.onload = () => {
        if (placeholder) placeholder.classList.add("hidden");

        container.appendChild(img);

        const expectedSize = this.getAttribute("data-size");
        let [expectedWidth, expectedHeight] = expectedSize
          .split("x")
          .map((n) => parseInt(n, 10));

        sizeSpan.textContent = `${img.naturalWidth} x ${img.naturalHeight}`;
        sizeSpan.style.color =
          img.naturalWidth < expectedWidth * 0.8 ||
          img.naturalHeight < expectedHeight * 0.8
            ? "red"
            : "green";

        validacoesImagem[this.id] =
          img.naturalWidth >= expectedWidth * 0.8 &&
          img.naturalHeight >= expectedHeight * 0.8;

        URL.revokeObjectURL(url);
      };

      img.src = url;
    });
  });

document.addEventListener("DOMContentLoaded", () => {
  const btnEnviarCarrossel = document.getElementById("btnEnviarCarrossel");
  const btnEnviarPropagandas = document.getElementById("btnEnviarPropagandas");

  btnEnviarCarrossel.addEventListener("click", async (e) => {
    e.preventDefault();
    await enviarImagensPorTipo("carrossel", 1, 4);
  });

  btnEnviarPropagandas.addEventListener("click", async (e) => {
    e.preventDefault();
    await enviarImagensPropagandaPorTipo();
  });

  async function enviarImagensPorTipo(tipoBase, inicio, fim) {
    let teveErro = false;
    let algumaImagemSelecionada = false;

    for (let i = inicio; i <= fim; i++) {
      const input = document.getElementById(`file${i}`);
      if (!input || input.files.length === 0) continue;

      algumaImagemSelecionada = true;

      if (validacoesImagem[input.id] === false) {
        const label = document.querySelector(`label[for="${input.id}"]`);
        const nomeImagem = label
          ? label.textContent.trim()
          : `Imagem ${input.id}`;
        gerarToast(`${nomeImagem} é muito pequena.`, "erro");
        teveErro = true;
        continue;
      }

      const file = input.files[0];
      const index = i - inicio; 

      const formData = new FormData();
      formData.append("imagem", file);
      formData.append("tipo", tipoBase);
      formData.append("index", index);

      try {
        const response = await fetch("/INA/GerenciarPropagandas-api", {
          method: "POST",
          body: formData,
        });

        const text = await response.text();

        try {
          const resultado = JSON.parse(text);

          if (!(response.ok && resultado.sucesso)) {
            gerarToast("Erro ao salvar imagem.", "erro");
            teveErro = true;
          }
        } catch (jsonError) {
          gerarToast("Resposta inesperada do servidor: " + text, "erro");
          teveErro = true;
        }
      } catch (error) {
        gerarToast("Erro na requisição.", "erro");
        teveErro = true;
      }
    }

    if (!algumaImagemSelecionada) {
      gerarToast("Nenhuma imagem foi selecionada para adicionar.", "aviso");
      return;
    }

    if (!teveErro) {
      gerarToast("Todas as imagens foram salvas com sucesso.", "sucesso");

      for (let i = inicio; i <= fim; i++) {
        const input = document.getElementById(`file${i}`);
        if (!input) continue;

        input.value = "";
        validacoesImagem[input.id] = false;
      }
    }
  }

  async function enviarImagensPropagandaPorTipo() {
    const tiposPropaganda = ["670x300", "670x125"];
    let teveErro = false;
    let algumaImagemSelecionada = false;

    for (const tipo of tiposPropaganda) {
      const inicio = tipo === "670x300" ? 5 : 7;
      const fim = inicio + 1;

      for (let i = inicio; i <= fim; i++) {
        const input = document.getElementById(`file${i}`);
        if (!input || input.files.length === 0) continue;

        if (input.getAttribute("data-size") !== tipo) continue;

        algumaImagemSelecionada = true;

        if (validacoesImagem[input.id] === false) {
          const label = document.querySelector(`label[for="${input.id}"]`);
          const nomeImagem = label
            ? label.textContent.trim()
            : `Imagem ${input.id}`;
          gerarToast(`${nomeImagem} é muito pequena.`, "erro");
          teveErro = true;
          continue;
        }

        const file = input.files[0];
        const index = i - inicio; // 0 ou 1

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

            if (!(response.ok && resultado.sucesso)) {
              gerarToast("Erro ao salvar imagem.", "erro");
              teveErro = true;
            }
          } catch (jsonError) {
            gerarToast("Resposta inesperada do servidor: " + text, "erro");
            teveErro = true;
          }
        } catch (error) {
          gerarToast("Erro na requisição.", "erro");
          teveErro = true;
        }
      }
    }

    if (!algumaImagemSelecionada) {
      gerarToast("Nenhuma imagem foi selecionada para adicionar.", "aviso");
      return;
    }

    if (!teveErro) {
      gerarToast("Todas as imagens foram salvas com sucesso.", "sucesso");

      for (let i = 5; i <= 8; i++) {
        const input = document.getElementById(`file${i}`);
        if (!input) continue;

        input.value = "";
        validacoesImagem[input.id] = false;
      }
    }
  }
});
