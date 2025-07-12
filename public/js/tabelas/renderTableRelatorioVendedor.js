document.addEventListener("DOMContentLoaded", () => {
  const tbody = document.querySelector("table tbody");
  const form = document.querySelector(".relatorio_vendedor_forms");
  const filtroSelect = document.getElementById("filtros-relatorio-vendas");
  const perfilHolder = document.getElementById("perfil-vendedor");

  let paginaAtual = 0;
  const itensPorPagina = 10;
  let modo = "lista";
  let vendas = [];

  function inicializarPerfil() {
    if (!perfilHolder) return;

    perfilHolder.querySelector("#nome").textContent = "---";
    perfilHolder.querySelector("#campo-nome").textContent = "---";
    perfilHolder.querySelector("#campo-email").textContent = "---";
    perfilHolder.querySelector("#campo-data").textContent = "---";

    const img = perfilHolder.querySelector("#foto-perfil");
    img.removeAttribute("src");
    img.style.display = "none";
  }

  function atualizarPerfil(perfil) {
    if (!perfilHolder || !perfil) return;

    const nome = perfil.nome || "---";
    const email = perfil.email || "---";
    const dataCadastro = perfil.data_cadastro
      ? new Date(perfil.data_cadastro).toLocaleDateString("pt-BR")
      : "---";
    const foto = perfil.foto_perfil;

    perfilHolder.querySelector("#nome").textContent = nome;
    perfilHolder.querySelector("#campo-nome").textContent = nome;
    perfilHolder.querySelector("#campo-email").textContent = email;
    perfilHolder.querySelector("#campo-data").textContent = dataCadastro;

    const img = perfilHolder.querySelector("#foto-perfil");

    if (foto) {
      img.onload = () => {
        img.style.display = "block";
        ajustarColunas(modo);
      };

      img.onerror = () => {
        img.removeAttribute("src");
        img.style.display = "none";
        ajustarColunas(modo);
      };

      img.src = PATH_PUBLIC + foto;
    } else {
      img.removeAttribute("src");
      img.style.display = "none";
      ajustarColunas(modo);
    }
  }

  const filtrosLista = `
    <option selected value="id_vendedor">ID</option>
    <option value="nome">Nome</option>
    <option value="data_cadastro">Data Cadastro</option>
    <option value="nome_fantasia">Nome Fantasia</option>
    <option value="cnpj_vendedor">CNPJ</option>
  `;

  const filtrosRelatorio = `
    <option selected value="id">ID</option>
    <option value="produto">Produto</option>
    <option value="preco">Preço Uni.</option>
    <option value="quantidade">Quantidade</option>
    <option value="status">Status</option>
    <option value="cliente">Cliente</option>
  `;

  function ajustarColunas(modo) {
    const colgroup = document.querySelector("table colgroup");
    if (!colgroup) return;

    const colClassesLista = [
      "lista_col_1",
      "lista_col_2",
      "lista_col_3",
      "lista_col_4",
      "lista_col_5",
      "lista_col_6",
    ];

    const colClassesRelatorio = [
      "relatorio_col_1",
      "relatorio_col_2",
      "relatorio_col_3",
      "relatorio_col_4",
      "relatorio_col_5",
      "relatorio_col_6",
    ];

    const classes = modo === "lista" ? colClassesLista : colClassesRelatorio;

    const cols = colgroup.querySelectorAll("col");

    cols.forEach((col, i) => {
      const classesAtuais = [...col.classList];

      classesAtuais.forEach((c) => {
        if (c.startsWith("lista_col_") || c.startsWith("relatorio_col_")) {
          col.classList.remove(c);
        }
      });

      col.classList.add(classes[i]);
    });
  }

  function atualizarFiltros() {
    if (modo === "lista") {
      filtroSelect.innerHTML = filtrosLista;
      filtroSelect.value = "id_vendedor";
    } else if (modo === "relatorio") {
      filtroSelect.innerHTML = filtrosRelatorio;
      filtroSelect.value = "id";
    }
  }

  function ordenarVendas() {
    const campo = filtroSelect.value;
    if (!vendas || vendas.length === 0) return;

    vendas.sort((a, b) => {
      let valA, valB;

      if (modo === "relatorio") {
        valA = a[campo];
        valB = b[campo];

        if (campo === "preco") {
          valA = parseFloat(valA);
          valB = parseFloat(valB);
        } else if (campo === "quantidade" || campo === "id") {
          valA = Number(valA);
          valB = Number(valB);
        } else {
          valA = valA ? valA.toString().toLowerCase() : "";
          valB = valB ? valB.toString().toLowerCase() : "";
        }
      } else if (modo === "lista") {
        switch (campo) {
          case "id_vendedor":
            valA = Number(a.id_vendedor);
            valB = Number(b.id_vendedor);
            break;
          case "nome":
            valA = a.nome ? a.nome.toLowerCase() : "";
            valB = b.nome ? b.nome.toLowerCase() : "";
            break;
          case "data_cadastro":
            valA = new Date(a.data_cadastro).getTime() || 0;
            valB = new Date(b.data_cadastro).getTime() || 0;
            break;
          case "nome_fantasia":
            valA = a.nome_fantasia ? a.nome_fantasia.toLowerCase() : "";
            valB = b.nome_fantasia ? b.nome_fantasia.toLowerCase() : "";
            break;
          case "cnpj_vendedor":
            valA = a.cnpj_vendedor ? a.cnpj_vendedor.toLowerCase() : "";
            valB = b.cnpj_vendedor ? b.cnpj_vendedor.toLowerCase() : "";
            break;
          default:
            valA = "";
            valB = "";
        }
      } else {
        valA = "";
        valB = "";
      }

      if (valA < valB) return -1;
      if (valA > valB) return 1;
      return 0;
    });
  }

  async function carregarListaVendedores(pagina = 0) {
    try {
      const response = await fetch("/INA/RelatorioVendedor-api", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          listar_vendedores: 1,
          limit: itensPorPagina,
          offset: pagina * itensPorPagina,
        }),
      });
      const data = await response.json();

      if (!data.success)
        throw new Error(data.message || "Erro ao carregar vendedores");

      modo = "lista";
      ajustarColunas(modo);

      vendas = data.vendedores || [];

      atualizarCabecalhoTabelaParaLista();
      atualizarFiltros();

      ordenarVendas();

      paginaAtual = pagina;
      configurarNavegacao(paginaAtual, data.total || vendas.length);

      renderizarTabelaPagina(paginaAtual);

      if (perfilHolder) perfilHolder.style.display = "grid";
      inicializarPerfil();
    } catch (e) {
      console.error(e);
    }
  }

  async function buscarVendedorPorId(vendedorId) {
    try {
      const response = await fetch("/INA/RelatorioVendedor-api", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ vendedor_id: vendedorId }),
      });

      const data = await response.json();
      if (!data.success || !data.perfil) {
        throw new Error("Vendedor não encontrado");
      }

      modo = "lista";
      vendas = [
        {
          id_vendedor: vendedorId,
          nome: data.perfil.nome || "---",
          data_cadastro: data.perfil.data_cadastro || "---",
          nome_fantasia: data.perfil.nome_fantasia || "---",
          cnpj_vendedor: data.perfil.cnpj_vendedor || "---",
        },
      ];

      ajustarColunas(modo);
      atualizarCabecalhoTabelaParaLista();
      atualizarFiltros();
      ordenarVendas();

      paginaAtual = 0;
      configurarNavegacao(paginaAtual, 1);
      renderizarTabelaPagina(paginaAtual);

      if (perfilHolder) {
        perfilHolder.style.display = "grid";
        atualizarPerfil(data.perfil);
      }
    } catch (e) {
      gerarToast("Vendedor não encontrado!","erro");
      vendas = [];
      carregarListaVendedores();
    }
  }

  async function buscarRelatorioVendedor(vendedorId) {
    try {
      const response = await fetch("/INA/RelatorioVendedor-api", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          listar_vendas: 1,
          vendedor_id: vendedorId,
        }),
      });

      const data = await response.json();
      if (!data.success) {
        inicializarPerfil();
        gerarToast(data.message || "Vendedor não encontrado", "erro");
        return false;
      }

      if (!data.vendas || data.vendas.length === 0) {
        modo = "relatorio";
        ajustarColunas(modo);
        vendas = [];

        atualizarCabecalhoTabelaParaRelatorio();
        atualizarFiltros();
        ordenarVendas();

        paginaAtual = 0;
        configurarNavegacao(paginaAtual, 0);
        renderizarTabelaPagina(paginaAtual);

        if (perfilHolder && data.perfil) {
          perfilHolder.style.display = "grid";
          atualizarPerfil(data.perfil);
        } else if (perfilHolder) {
          perfilHolder.style.display = "none";
        }

        return true;
      }

      modo = "relatorio";
      vendas = data.vendas;

      atualizarCabecalhoTabelaParaRelatorio();
      atualizarFiltros();
      ordenarVendas();

      paginaAtual = 0;
      configurarNavegacao(paginaAtual, vendas.length);
      renderizarTabelaPagina(paginaAtual);

      if (perfilHolder) {
        perfilHolder.style.display = "grid";
        atualizarPerfil(data.perfil);
      }

      return true;
    } catch (e) {
      inicializarPerfil();
      vendas = [];
      renderizarTabela([]);
      return false;
    }
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const vendedorId = form
      .querySelector('input[name="vendedor_id"]')
      .value.trim();

    inicializarPerfil();

    if (!vendedorId || vendedorId === "0") {
      carregarListaVendedores();
    } else {
      buscarVendedorPorId(vendedorId);
    }
  });

  function renderizarTabelaPagina(pagina) {
    const inicio = pagina * itensPorPagina;
    const fim = inicio + itensPorPagina;
    renderizarTabela(vendas.slice(inicio, fim));
  }

  function renderizarTabela(dados) {
    tbody.innerHTML = "";
    const totalLinhas = 10;

    if (!dados || dados.length === 0) {
      for (let i = 0; i < totalLinhas; i++) {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        `;
        tbody.appendChild(tr);
      }
      return;
    }

    dados.forEach((item) => {
      const tr = document.createElement("tr");
      if (modo === "lista") {
        tr.innerHTML = `
          <td>${item.id_vendedor}</td>
          <td>${item.nome}</td>
          <td>${new Date(item.data_cadastro).toLocaleDateString("pt-BR")}</td>
          <td>${item.nome_fantasia}</td>
          <td>${item.cnpj_vendedor}</td>
          <td></td>
        `;

        const cell = tr.querySelector("td:last-child");

        // Adiciona a classe para aplicar grid no td
        cell.classList.add("td-botoes");

        // Botão RELATÓRIO
        const btnRelatorio = document.createElement("button");
        btnRelatorio.className = "base_botao btn_blue";
        btnRelatorio.type = "button";

        const imgRelatorio = document.createElement("img");
        imgRelatorio.className = "base_icon";
        imgRelatorio.src =
          PATH_PUBLIC + "/image/geral/botoes/v_branco_icon.svg";
        imgRelatorio.alt = "Ícone Vendas";

        btnRelatorio.appendChild(imgRelatorio);
        btnRelatorio.appendChild(document.createTextNode(" VENDAS"));

        btnRelatorio.addEventListener("click", () => {
          const idVendedor = item.id_vendedor;
          if (idVendedor && idVendedor !== "N/A") {
            buscarRelatorioVendedor(idVendedor);
          } else {
            alert("ID do vendedor inválido.");
          }
        });

        const btnBuscar = document.querySelector("#btnBuscarVendedor");
        if (btnBuscar) {
          btnBuscar.addEventListener("click", () => {
            const vendedorId = form
              .querySelector('input[name="vendedor_id"]')
              .value.trim();

            inicializarPerfil();

            if (!vendedorId || vendedorId === "0") {
              carregarListaVendedores();
              return;
            }

            buscarRelatorioVendedor(vendedorId)
              .then((sucesso) => {
                if (!sucesso) carregarListaVendedores();
              })
              .catch(() => {
                carregarListaVendedores();
              });
          });
        }

        // Botão PRODUTOS
        const btnProdutos = document.createElement("button");
        btnProdutos.className = "base_botao btn_blue";
        btnProdutos.type = "button";

        const imgProdutos = document.createElement("img");
        imgProdutos.className = "base_icon";
        imgProdutos.src = PATH_PUBLIC + "/image/geral/botoes/v_branco_icon.svg";
        imgProdutos.alt = "Ícone Produtos";

        btnProdutos.appendChild(imgProdutos);
        btnProdutos.appendChild(document.createTextNode(" PRODUTOS"));

        btnProdutos.addEventListener("click", () => {
          window.location.href = `GerenciarProdutos?vendedor_id=${item.id_vendedor}&admin=1`;
        });

        cell.appendChild(btnRelatorio);
        cell.appendChild(btnProdutos);
      } else if (modo === "relatorio") {
        tr.innerHTML = `
          <td>${item.id}</td>
          <td>${item.produto}</td>
          <td>R$ ${parseFloat(item.preco).toFixed(2)}</td>
          <td>${item.quantidade}</td>
          <td>${item.status}</td>
          <td>${item.cliente}</td>
        `;
      }
      tbody.appendChild(tr);
    });

    for (let i = dados.length; i < totalLinhas; i++) {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      `;
      tbody.appendChild(tr);
    }
  }

  //

  function atualizarCabecalhoTabelaParaLista() {
    const thead = document.querySelector("table thead");
    thead.innerHTML = `
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data Cadastro</th>
        <th>Nome Fantasia</th>
        <th>CNPJ</th>
        <th>Gerenciamento</th>
      </tr>
    `;
  }

  function atualizarCabecalhoTabelaParaRelatorio() {
    const thead = document.querySelector("table thead");
    thead.innerHTML = `
      <tr>
        <th>ID</th>
        <th>Produto</th>
        <th>Preço Uni.</th>
        <th>Quantidade</th>
        <th>Status</th>
        <th>Cliente</th>
      </tr>
    `;
  }

  function configurarNavegacao(pagina, totalItens) {
    paginaAtual = pagina;
    const totalPaginas = Math.ceil(totalItens / itensPorPagina);

    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");

    btnAnterior.disabled = paginaAtual <= 0;
    btnProximo.disabled = paginaAtual >= totalPaginas - 1;

    btnAnterior.onclick = () => {
      if (paginaAtual > 0) {
        paginaAtual--;
        if (modo === "lista") {
          carregarListaVendedores(paginaAtual);
        } else if (modo === "relatorio") {
          renderizarTabelaPagina(paginaAtual);
        }
      }
    };

    btnProximo.onclick = () => {
      if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        if (modo === "lista") {
          carregarListaVendedores(paginaAtual);
        } else if (modo === "relatorio") {
          renderizarTabelaPagina(paginaAtual);
        }
      }
    };
  }

  filtroSelect.addEventListener("change", () => {
    ordenarVendas();
    paginaAtual = 0;
    configurarNavegacao(paginaAtual, vendas.length);
    renderizarTabelaPagina(paginaAtual);
  });

  carregarListaVendedores();
});
