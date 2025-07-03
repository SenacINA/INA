document.addEventListener("DOMContentLoaded", function () {
  let vendedores = window.vendedores || [];
  let paginaAtual = 0;
  const linhasPorPagina = 10;
  const filtroSelect = document.getElementById("filtros-gerenciar-vendas");

  function ordenarVendedores(tipoOrdenacao) {
    switch (tipoOrdenacao) {
      case "alfabetica":
        vendedores.sort((a, b) => a.vendedor.localeCompare(b.vendedor));
        break;
      case "cod":
        vendedores.sort((a, b) => a.codigo - b.codigo);
        break;
      case "status":
        const ordemStatus = {
          Pendente: 1,
          Aprovado: 2,
          Reprovado: 3,
          Inativado: 4,
        };
        vendedores.sort(
          (a, b) =>
            (ordemStatus[a.status] || 99) - (ordemStatus[b.status] || 99)
        );
        break;
      default:
        break;
    }
  }

  function montarLinha(vendedor) {
    const tr = document.createElement("tr");
    tr.innerHTML = `
          <td># ${vendedor.codigo}</td>
          <td>${vendedor.vendedor}</td>
          <td>${vendedor.requisitos}</td>
          <td>${vendedor.declaracao}</td>
          <td>${vendedor.status}</td>
          <td class="aprovar_vendedor_coluna_botoes"></td>
        `;

    const tdGerenciamento = tr.querySelector(
      "td.aprovar_vendedor_coluna_botoes"
    );

    function criarFormAcao(acao, texto, classeBtn) {
      const form = document.createElement("form");
      form.method = "post";
      form.style.display = "inline";
      form.innerHTML = `
            <input type="hidden" name="acao" value="${acao}">
            <input type="hidden" name="vendedor_id" value="${vendedor.codigo}">
            <button type="submit" class="${classeBtn}">${texto}</button>
          `;
      return form;
    }

    if (vendedor.status === "Pendente") {
      tdGerenciamento.appendChild(
        criarFormAcao("aprovar", "APROVAR", "aprovar_vendedor_btn_aprovar")
      );
      tdGerenciamento.appendChild(
        criarFormAcao("reprovar", "RECUSAR", "aprovar_vendedor_btn_recusar")
      );
    } else if (vendedor.status === "Inativado") {
      const btnAtivar = document.createElement("form");
      btnAtivar.method = "post";
      btnAtivar.style.display = "inline";
      btnAtivar.innerHTML = `
          <input type="hidden" name="acao" value="ativar">
          <input type="hidden" name="vendedor_id" value="${vendedor.codigo}">
          <button type="submit" class="aprovar_vendedor_btn_ativar">ATIVAR</button>
        `;
      tdGerenciamento.appendChild(btnAtivar);
    } else {
      const formInativar = document.createElement("form");
      formInativar.method = "post";
      formInativar.style.display = "inline";
      formInativar.innerHTML = `
            <input type="hidden" name="acao" value="inativar">
            <input type="hidden" name="vendedor_id" value="${vendedor.codigo}">
            <button type="submit" class="aprovar_vendedor_btn_inativar">INATIVAR</button>
          `;
      tdGerenciamento.appendChild(formInativar);
    }

    return tr;
  }

  function renderizarPagina(pagina) {
    const tbody = document.querySelector(".base_tabela tbody");
    tbody.innerHTML = "";

    const inicio = pagina * linhasPorPagina;
    const fim = inicio + linhasPorPagina;
    const vendedoresPagina = vendedores.slice(inicio, fim);

    vendedoresPagina.forEach((vendedor) => {
      tbody.appendChild(montarLinha(vendedor));
    });

    const linhasFaltantes = linhasPorPagina - vendedoresPagina.length;
    for (let i = 0; i < linhasFaltantes; i++) {
      const trVazio = document.createElement("tr");
      trVazio.innerHTML = `
            <td class="linha-vazia">&nbsp;</td>
            <td class="linha-vazia">&nbsp;</td>
            <td class="linha-vazia">&nbsp;</td>
            <td class="linha-vazia">&nbsp;</td>
            <td class="linha-vazia">&nbsp;</td>
            <td class="linha-vazia">&nbsp;</td>
          `;
      tbody.appendChild(trVazio);
    }

    atualizarBotoes();
  }

  function configurarNavegacao() {
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");

    if (!btnAnterior || !btnProximo) return;

    btnAnterior.replaceWith(btnAnterior.cloneNode(true));
    btnProximo.replaceWith(btnProximo.cloneNode(true));

    const novoBtnAnterior = document.getElementById("btnAnterior");
    const novoBtnProximo = document.getElementById("btnProximo");

    novoBtnAnterior.addEventListener("click", () => {
      if (paginaAtual > 0) {
        paginaAtual--;
        renderizarPagina(paginaAtual);
      }
    });

    novoBtnProximo.addEventListener("click", () => {
      const totalPaginas = Math.ceil(vendedores.length / linhasPorPagina);
      if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
      }
    });
  }

  function atualizarBotoes() {
    const totalPaginas = Math.ceil(vendedores.length / linhasPorPagina);
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");

    if (!btnAnterior || !btnProximo) return;

    btnAnterior.disabled = paginaAtual <= 0;
    btnProximo.disabled = paginaAtual >= totalPaginas - 1;
  }

  ordenarVendedores("cod");
  configurarNavegacao();
  renderizarPagina(paginaAtual);

  if (filtroSelect) {
    filtroSelect.addEventListener("change", () => {
      ordenarVendedores(filtroSelect.value);
      paginaAtual = 0;
      renderizarPagina(paginaAtual);
    });
  }
});
