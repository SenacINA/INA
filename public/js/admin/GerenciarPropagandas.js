document
  .querySelectorAll('.upload_imagem input[type="file"]')
  .forEach((input) => {
    input.addEventListener("change", function () {
      const file = this.files[0];
      const container = this.closest(".upload_imagem");
      const sizeLabel = container.querySelector(".size_img");

      const existingImg = container.querySelector("img");
      if (existingImg) existingImg.remove();

      if (!file) {
        sizeLabel.textContent = "";
        sizeLabel.style.color = "";
        ajustarPaddingBodyContainer();
        return;
      }

      const img = new Image();
      const url = URL.createObjectURL(file);

      img.onload = () => {
        container.appendChild(img);

        const expectedSize = this.getAttribute("data-size");
        let [expectedWidth, expectedHeight] = expectedSize
          .split("x")
          .map((n) => parseInt(n, 10));

        sizeLabel.textContent = `${img.naturalWidth} x ${img.naturalHeight}`;

        const minWidth = expectedWidth * 0.8;
        const minHeight = expectedHeight * 0.8;

        if (img.naturalWidth < minWidth || img.naturalHeight < minHeight) {
          sizeLabel.style.color = "red";
        } else {
          sizeLabel.style.color = "green";
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

  async function enviarImagensPorTipo(tipo, inicio, fim) {
    for (let i = inicio; i <= fim; i++) {
      const input = document.getElementById(`file${i}`);
      if (!input || input.files.length === 0) continue;

      const file = input.files[0];
      const index = i < 5 ? i - 1 : i - 5;

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
            console.log(`Imagem enviada: ${resultado.endereco}`);
            alert(`Imagem ${tipo} ${index + 1} enviada com sucesso!`);
          } else {
            console.error("Erro:", resultado.erro || "Erro desconhecido.");
            alert(
              "Erro ao enviar imagem: " +
                (resultado.erro || "Erro desconhecido.")
            );
          }
        } catch (jsonError) {
          console.error("Resposta não é JSON:", text);
          alert("Erro inesperado na resposta do servidor.");
        }
      } catch (error) {
        console.error("Erro de rede:", error);
        alert("Falha na requisição.");
      }
    }
  }
});
