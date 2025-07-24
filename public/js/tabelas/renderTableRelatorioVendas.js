window.addEventListener("DOMContentLoaded", () => {
    configurarNavegacao();
    renderizarPagina(paginaAtual);
  });
  

function renderizarPagina(pagina) {
    const tbody = document.querySelector("tbody");
    tbody.innerHTML = "";
  
    const inicio = pagina * linhasPorPagina;
    const fim = inicio + linhasPorPagina;
    const paginaDados = vendedoresData.slice(inicio, fim);
  
    paginaDados.forEach(item => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${item.codigo}</td>
        <td>${item.pedido}</td>
        <td>${item.preco}</td>
        <td>${item.quantidade}</td>
        <td>${item.previsao}</td>
        <td>${item.status}</td>
        <td>${item.cliente}</td>
      `;
      tbody.appendChild(tr);
    });
  
    preencherLinhasVazias(tbody, paginaDados.length);
    atualizarBotoes();
  }

  function preencherLinhasVazias(tbody, linhasExistentes, totalDesejado = 10) {
    const linhasFaltantes = totalDesejado - linhasExistentes;
    for (let i = 0; i < linhasFaltantes; i++) {
      const trVazio = document.createElement("tr");
      trVazio.innerHTML = `
        <td class="linha-vazia">&nbsp;</td>
        <td class="linha-vazia">&nbsp;</td>
        <td class="linha-vazia">&nbsp;</td>
        <td class="linha-vazia">&nbsp;</td>
        <td class="linha-vazia">&nbsp;</td>
        <td class="linha-vazia">&nbsp;</td>
        <td class="linha-vazia">&nbsp;</td>
      `;
      tbody.appendChild(trVazio);
    }
  }
  
  function atualizarBotoes() {
    const totalPaginas = Math.ceil(vendedoresData.length / linhasPorPagina);
    document.getElementById("btnAnterior").disabled = paginaAtual <= 0;
    document.getElementById("btnProximo").disabled = paginaAtual >= totalPaginas - 1;
  }
  
  function configurarNavegacao() {
    document.getElementById("btnAnterior").addEventListener("click", () => {
      if (paginaAtual > 0) {
        paginaAtual--;
        renderizarPagina(paginaAtual);
      }
    });
  
    document.getElementById("btnProximo").addEventListener("click", () => {
      const totalPaginas = Math.ceil(vendedoresData.length / linhasPorPagina);
      if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
      }
    });
  }

  document.getElementById("filtroRelatorio").addEventListener("change", function () {
    const valorSelecionado = this.value;
  
    vendedoresData.sort((a, b) => {
      if (valorSelecionado === "preco") {
        const valorA = parseFloat(a.preco.replace("R$", "").replace(",", "."));
        const valorB = parseFloat(b.preco.replace("R$", "").replace(",", "."));
        return valorA - valorB;
      }
      if (valorSelecionado === "quantidade") {
        return a.quantidade - b.quantidade;
      }
      return a[valorSelecionado].toString().localeCompare(b[valorSelecionado].toString());
    });
  
    paginaAtual = 0;
    renderizarPagina(paginaAtual);
  });
  