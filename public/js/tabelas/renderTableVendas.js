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
      <tr>
        <td data-id_compra="${venda.id_venda}"># ${venda.id_venda}</td>
        <td data-cliente="${venda.nome_cliente}">${venda.nome_cliente}</td>
        <td data-preco="${venda.valor_total}">R$ ${venda.valor_total}</td>
        <td data-data="${venda.data_venda}">${venda.data_venda}</td>
        <td>
            <form method="post" style="display:inline;" action="Venda-api-sale">
                <input type="hidden" name="id_venda" value="${venda.id_venda}">

                <button type="submit" class="aprovar_vendedor_btn_aprovar btn_blue base_botao">
                    <img class="base_icon" src="public/image/geral/icons/caneta_branca_icon.svg" alt="">
                    GERENCIAR
                </button>
            </form>
        </td>
      </tr>
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
    const container = document.querySelector(".base_navegacao");
    let nav = document.querySelector(".navegacao_vendas");

    if (!nav) {
      nav = document.createElement("div");
      nav.className = "navegacao_vendas";
      nav.innerHTML = `
        <button id="btnAnterior" class="base_botao btn_blue">
          <img src="./public/image/geral/icons/seta_filtro_branco.svg" class="base_icon esquerda">
        </button>
        <button id="btnProximo" class="base_botao btn_blue">
          <img src="./public/image/geral/icons/seta_filtro_branco.svg" class="base_icon direita">
        </button>
      `;
      container.after(nav);

      document.getElementById("btnAnterior").addEventListener("click", () => {
        if (paginaAtual > 0) {
          paginaAtual--;
          renderizarPagina(paginaAtual);
        }
      });

      document.getElementById("btnProximo").addEventListener("click", () => {
        const totalPaginas = Math.ceil(vendas.length / linhasPorPagina);
        if (paginaAtual < totalPaginas - 1) {
          paginaAtual++;
          renderizarPagina(paginaAtual);
        }
      });
    }
  }

  function atualizarBotoes() {
    const totalPaginas = Math.ceil(vendas.length / linhasPorPagina);
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");

    if (btnAnterior && btnProximo) {
      btnAnterior.disabled = paginaAtual === 0;
      btnProximo.disabled = paginaAtual >= totalPaginas - 1;
    }
  }

  if (filtroSelect) {
    filtroSelect.addEventListener("change", () => {
      const filtroSelecionado = filtroSelect.value || "";
      carregarTabelaVendas(filtroSelecionado);
    });
  }

  // Inicializa a tabela com o filtro padrão vazio
  carregarTabelaVendas("");
});
