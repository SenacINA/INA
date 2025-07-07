document.addEventListener("DOMContentLoaded", () => {
  const aprovar = document.getElementById("btn_aprovar");
  const reprovar = document.getElementById("btn_reprovar");

  aprovar.addEventListener("click", (e) => {
    e.preventDefault();
    const acao = document.getElementById("acaoAprovar");
    const id = document.getElementById("vendedor_id");
    enviarForms(acao.value, id.value);
  });

  reprovar.addEventListener("click", (e) => {
    e.preventDefault();
    const acao = document.getElementById("acaoReprovar");
    const id = document.getElementById("vendedor_id");
    enviarForms(acao.value, id.value);
  });

  async function enviarForms(acao, id) {
    try {
      const form = new FormData();
      form.append("acao", acao);
      form.append("vendedor_id", id);

      const response = await fetch("GerenciarVendedor", {
        method: "POST",
        body: form,
      });

      const json = await response.json();

      if (json.success) {
        gerarToast(json.message, "sucesso");
        setTimeout(() => {
          atualizarEstatisticas(); 
          location.reload();      
        }, 800);
      } else {
        gerarToast(json.message, "erro");
        setTimeout(() => location.reload(), 800);
      }
    } catch (err) {
    }
  }

  function atualizarEstatisticas() {
    fetch("/INA/EstatisticasVendedores-api")
      .then((res) => res.json())
      .then((data) => {
        document.getElementById("estatistica_aprovados").textContent =
          data.aprovados || 0;
        document.getElementById("estatistica_reprovados").textContent =
          data.reprovados || 0;
        document.getElementById("estatistica_inativados").textContent =
          data.inativados || 0;
      })
      .catch((err) => {
      });
  }

  atualizarEstatisticas();
});
