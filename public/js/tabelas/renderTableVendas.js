document.addEventListener("DOMContentLoaded", function () {
  let vendas = [];
  let paginaAtual = 0;
  const linhasPorPagina = 10;

  const filtroSelect = document.getElementById("filtros-gerenciar-vendas");

  async function carregarTabelaVendas(filtro = "") {
    try {
      const resposta = await fetch("GerenciarVendas-api", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `filtro=${filtro}`,
      });

      const json = await resposta.json();

      vendas = json.data;
      paginaAtual = 0;

      renderizarPagina(paginaAtual);
      configurarNavegacao();
    } catch (erro) {
      console.error("Erro na requisição:", erro);
    }
  }

  function renderizarPagina(pagina) {
    const tbody = document.querySelector(".base_tabela tbody");
    tbody.innerHTML = "";

    const inicio = pagina * linhasPorPagina;
    const fim = inicio + linhasPorPagina;
    const vendasPagina = vendas.slice(inicio, fim);

    vendasPagina.forEach((venda) => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td data-id_compra="${venda.id_compra}"># ${venda.id_compra}</td>
        <td data-cliente="${venda.cliente}">${venda.cliente}</td>
        <td data-preco="${venda.valor_total}"> ${Number(
        venda.valor_total
      ).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })}</td>
        <td data-data="${venda.data_compra}">${venda.data_compra}</td>
        <td>
            <form method="post" style="display:inline;" action="Venda-api-sale">
                <input type="hidden" name="id_venda" value="${venda.id_compra}">
                <button type="submit" class="aprovar_vendedor_btn_aprovar btn_blue base_botao">
                    <img class="base_icon" src="public/image/geral/icons/engrenagem_branco_icon.svg" alt="">
                    GERENCIAR
                </button>
            </form>
        </td>
      `;
      tbody.appendChild(tr);
    });

    const linhasFaltantes = linhasPorPagina - vendasPagina.length;
    for (let i = 0; i < linhasFaltantes; i++) {
      const trVazio = document.createElement("tr");
      trVazio.innerHTML = `
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
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
      const totalPaginas = Math.ceil(vendas.length / linhasPorPagina);
      if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
      }
    });
  }

  function atualizarBotoes() {
    const totalPaginas = Math.ceil(vendas.length / linhasPorPagina);
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");

    if (!btnAnterior || !btnProximo) return;
    btnAnterior.disabled = paginaAtual <= 0;
    btnProximo.disabled = paginaAtual >= totalPaginas - 1;
  }

  if (filtroSelect) {
    filtroSelect.addEventListener("change", () => {
      const filtroSelecionado = filtroSelect.value || "";
      carregarTabelaVendas(filtroSelecionado);
    });
  }

  carregarTabelaVendas("");
});
