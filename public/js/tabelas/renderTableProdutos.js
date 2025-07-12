document.addEventListener("DOMContentLoaded", function () {
  let produtos = [];
  let paginaAtual = 0;
  const produtosPorPagina = 10;

  const filtroSelect = document.getElementById("filtroRelatorio");

  async function carregarTabelaProdutos(idVendedor, filtro = "code") {
    try {
      const resposta = await fetch("GerenciarProdutos-api", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `id_vendedor=${idVendedor}&filtro=${filtro}`,
      });

      const json = await resposta.json();

      if (!json.success) {
        console.error("Erro ao buscar produtos:", json.errors || json.erros);
        return;
      }

      produtos = json.data;
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

    const inicio = pagina * produtosPorPagina;
    const fim = inicio + produtosPorPagina;
    const produtosPagina = produtos.slice(inicio, fim);

    produtosPagina.forEach((produto) => {
      const tr = document.createElement("tr");
      let params = new URLSearchParams(document.location.search);
      let adminParam = params.get("admin");
      let isAdmin = parseInt(adminParam);

      if (isAdmin == 1) {
        tr.innerHTML = `
          <td># ${produto.cod_produto}</td>
          <td>
            <span class='nome_produto'>
              <img class='img_table' src='public/${
                produto.endereco_imagem_produto
              }'>
              <span>${produto.nome_produto}</span>
            </span>
          </td>
          <td>R$ ${produto.preco_produto}</td>
          <td>${produto.unidade_produto}</td>
          <td><span>${produto.status_produto ? "Ativo" : "Inativo"}</span></td>
          <td>
            <button data-id=${
              produto.id_produto
            } ${!produto.status_produto ? 'disabled' : ''} id='btn_inativar' class='base_botao btn_red'">
              <img class='base_icon' src="./public/image/geral/botoes/x_branco_icon.svg">
              INATIVAR
            </button>
          </td>
        `;
      } else {
        tr.innerHTML = `
          <td># ${produto.cod_produto}</td>
          <td>
            <span class='nome_produto'>
              <img class='img_table' src='public/${
                produto.endereco_imagem_produto
              }'>
              <span>${produto.nome_produto}</span>
            </span>
          </td>
          <td>R$ ${produto.preco_produto}</td>
          <td>${produto.unidade_produto}</td>
          <td><span>${produto.status_produto ? "Ativo" : "Inativo"}</span></td>
          <td>
            <button class='base_botao btn_blue' onclick="window.location.href = 'EditarProduto?id=${
              produto.id_produto
            }'">
              <img class='base_icon' src='public/image/geral/icons/caneta_branca_icon.svg'>
              EDITAR
            </button>
          </td>
        `;
      }
      tbody.appendChild(tr);
    });

    const linhasFaltantes = produtosPorPagina - produtosPagina.length;
    for (let i = 0; i < linhasFaltantes; i++) {
      const trVazio = document.createElement("tr");
      trVazio.innerHTML = `
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
        <td class="linha-vazia"></td>
      `;
      tbody.appendChild(trVazio);
    }

    const btns = document.querySelectorAll("#btn_inativar");

    btns.forEach((btn) => {
      btn.addEventListener("click", () => {
        inativarProduto(btn.dataset.id, false);
      });
    });

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
      const totalPaginas = Math.ceil(produtos.length / produtosPorPagina); // ← CORRIGIDO
      if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
      }
    });
  }

  function atualizarBotoes() {
    const totalPaginas = Math.ceil(produtos.length / produtosPorPagina); // ← CORRIGIDO
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");

    if (!btnAnterior || !btnProximo) return;
    btnAnterior.disabled = paginaAtual <= 0;
    btnProximo.disabled = paginaAtual >= totalPaginas - 1;
  }

  async function inativarProduto(id, status) {
    const resp = await fetch("ProdutoStatus-api", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        id: id,
        status: status,
        admin: true,
      }),
    });

    const json = await resp.json();
    
    if (json.success) {
      gerarToast(json.message, "sucesso");
    } else {
      gerarToast(json.message, "erro");
    }
  }

  if (filtroSelect) {
    filtroSelect.addEventListener("change", () => {
      const filtroSelecionado = filtroSelect.value || "";
      carregarTabelaProdutos(idVendedor, filtroSelecionado);
    });
  }

  carregarTabelaProdutos(idVendedor, filtroSelect?.value || "code");
});
