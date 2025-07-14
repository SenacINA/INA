document.addEventListener("DOMContentLoaded", function () {
  let vendedores = window.vendedores || [];
  let vendedoresFiltrados = [...vendedores];
  let paginaAtual = 0;
  const linhasPorPagina = 10;
  const filtroSelect = document.getElementById("filtros-gerenciar-vendas");

  const popup = document.getElementById("popup_desativar");
  const closeBtn = document.getElementById("close_btn_popUp");
  const confirmarBtn = document.getElementById("confirmar_desativar");
  const popupTexto = popup.querySelector(".text_popup p");

  let acaoSelecionada = null;
  let vendedorSelecionado = null;

  function ordenarVendedores(tipoOrdenacao) {
    switch (tipoOrdenacao) {
      case "alfabetica":
        vendedoresFiltrados.sort((a, b) => a.vendedor.localeCompare(b.vendedor));
        break;
      case "cod":
        vendedoresFiltrados.sort((a, b) => a.codigo - b.codigo);
        break;
      case "status":
        const ordemStatus = {
          Pendente: 1,
          Aprovado: 2,
          Reprovado: 3,
          Inativado: 4,
        };
        vendedoresFiltrados.sort(
          (a, b) => (ordemStatus[a.status] || 99) - (ordemStatus[b.status] || 99)
        );
        break;
      default:
        break;
    }
  }

  function enviarAcao(acao, vendedorId) {
    fetch("/INA/AprovarVendedor-api", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ acao, vendedor_id: vendedorId }),
    })
      .then((res) => res.json())
      .then(() => {
        const vendedor = vendedores.find((v) => v.codigo === vendedorId);
        if (vendedor) {
          const statusMap = {
            aprovar: "Aprovado",
            reprovar: "Reprovado",
            inativar: "Inativado",
            ativar: "Pendente",
          };
          vendedor.status = statusMap[acao] || vendedor.status;
        }

        atualizarEstatisticas();
        ordenarVendedores(filtroSelect.value);
        renderizarPagina(paginaAtual);
      })
      .catch(() => { });
  }

  function montarLinha(vendedor) {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${vendedor.codigo}</td>
      <td>${vendedor.vendedor}</td>
      <td>${vendedor.requisitos}</td>
      <td>${vendedor.declaracao}</td>
      <td>${vendedor.status}</td>
      <td class="aprovar_vendedor_coluna_botoes"></td>
    `;

    const tdGerenciamento = tr.querySelector("td.aprovar_vendedor_coluna_botoes");

    function criarBotaoAcao(acao, texto, classeBtn) {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = classeBtn;
      btn.textContent = texto;

      btn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();

        acaoSelecionada = acao;
        vendedorSelecionado = vendedor;

        let msg = "";
        switch (acao) {
          case "aprovar":
            msg = "Você deseja aprovar este vendedor?";
            break;
          case "reprovar":
            msg = "Você deseja reprovar este vendedor?";
            break;
          case "inativar":
            msg = "Você deseja inativar este vendedor?";
            break;
          case "ativar":
            msg = "Você deseja ativar este vendedor?";
            break;
          default:
            msg = "Confirma esta ação?";
        }
        popupTexto.textContent = msg;
        popup.style.display = "flex";
      });

      return btn;
    }

    if (vendedor.status === "Pendente") {
      tdGerenciamento.appendChild(
        criarBotaoAcao("aprovar", "APROVAR", "aprovar_vendedor_btn_aprovar")
      );
      tdGerenciamento.appendChild(
        criarBotaoAcao("reprovar", "RECUSAR", "aprovar_vendedor_btn_recusar")
      );
    } else if (vendedor.status === "Inativado") {
      tdGerenciamento.appendChild(
        criarBotaoAcao("ativar", "ATIVAR", "aprovar_vendedor_btn_ativar")
      );
    } else {
      tdGerenciamento.appendChild(
        criarBotaoAcao("inativar", "INATIVAR", "aprovar_vendedor_btn_inativar")
      );
    }

    return tr;
  }

  function renderizarPagina(pagina) {
    const tbody = document.querySelector(".base_tabela tbody");
    tbody.innerHTML = "";

    const inicio = pagina * linhasPorPagina;
    const fim = inicio + linhasPorPagina;
    const paginaVendedores = vendedoresFiltrados.slice(inicio, fim);

    paginaVendedores.forEach((vendedor) => {
      tbody.appendChild(montarLinha(vendedor));
    });

    const linhasFaltantes = linhasPorPagina - paginaVendedores.length;
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
      const totalPaginas = Math.ceil(vendedoresFiltrados.length / linhasPorPagina);
      if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
      }
    });
  }

  function atualizarEstatisticas() {
    const aprovados = vendedores.filter(v => v.status === 'Aprovado').length;
    const reprovados = vendedores.filter(v => v.status === 'Reprovado').length;
    const inativados = vendedores.filter(v => v.status === 'Inativado').length;

    document.querySelectorAll('.aprovar_vendedor_card').forEach(card => {
      const titulo = card.querySelector('.aprovar_vendedor_titulo').textContent.trim();

      if (titulo === 'Vendedores Aprovados') {
        card.querySelector('.aprovar_vendedor_estatistica_descricao').textContent = aprovados;
      } else if (titulo === 'Vendedores Reprovados') {
        card.querySelector('.aprovar_vendedor_estatistica_descricao').textContent = reprovados;
      } else if (titulo === 'Vendedores Inativados') {
        card.querySelector('.aprovar_vendedor_estatistica_descricao').textContent = inativados;
      }
    });
  }

  function atualizarBotoes() {
    const totalPaginas = Math.ceil(vendedoresFiltrados.length / linhasPorPagina);
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");

    if (!btnAnterior || !btnProximo) return;

    btnAnterior.disabled = paginaAtual <= 0;
    btnProximo.disabled = paginaAtual >= totalPaginas - 1;
  }

  closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
    acaoSelecionada = null;
    vendedorSelecionado = null;
  });

  confirmarBtn.addEventListener("click", () => {
    if (!acaoSelecionada || !vendedorSelecionado) {
      popup.style.display = "none";
      return;
    }
    enviarAcao(acaoSelecionada, vendedorSelecionado.codigo);
    popup.style.display = "none";
    acaoSelecionada = null;
    vendedorSelecionado = null;
  });

  // Filtro de ordenação
  if (filtroSelect) {
    filtroSelect.addEventListener("change", () => {
      ordenarVendedores(filtroSelect.value);
      paginaAtual = 0;
      renderizarPagina(paginaAtual);
    });
  }

  // Filtro de busca
  // Filtro de busca com validação e toast
  const formBusca = document.querySelector(".aprovar_vendedor_forms_pesquisa_pedidos");
  const inputBusca = formBusca.querySelector("input[name='search']");

  formBusca.addEventListener("submit", (e) => {
    e.preventDefault();

    const termo = inputBusca.value.trim().toLowerCase();

    if (!termo || termo === "0") {
      vendedoresFiltrados = [...vendedores];
    } else {
      vendedoresFiltrados = vendedores.filter(v =>
        v.vendedor.toLowerCase().includes(termo) ||
        String(v.codigo) === termo
      );
    }

    if (vendedoresFiltrados.length === 0) {
      gerarToast("Nenhum vendedor encontrado.","aviso");
      vendedoresFiltrados = [...vendedores];
      inputBusca.value = "";
    }

    paginaAtual = 0;
    ordenarVendedores(filtroSelect.value);
    renderizarPagina(paginaAtual);
  });


  // Inicialização
  ordenarVendedores("cod");
  configurarNavegacao();
  renderizarPagina(paginaAtual);
});
