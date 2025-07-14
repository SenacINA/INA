document.addEventListener("DOMContentLoaded", () => {
  const popup = document.getElementById("popup_desativar");
  const closeBtn = document.getElementById("close_btn_popUp");
  const confirmarBtn = document.getElementById("confirmar_desativar");
  const tbody = document.querySelector(".gerenciar_usuario_table tbody");
  const formPesquisa = document.querySelector(".gerenciar_usuario_forms_pesquisa_usuario");

  let paginaAtual = 0;
  const linhasPorPagina = 10;
  const vendedoresData = window.vendedores || [];

  let usuarioSelecionado = null;
  let botaoSelecionado = null;

  function renderizarPagina(pagina) {
    if (!tbody) return;
    tbody.innerHTML = "";

    const inicio = pagina * linhasPorPagina;
    const fim = inicio + linhasPorPagina;
    const vendedoresPagina = vendedoresData.slice(inicio, fim);

    vendedoresPagina.forEach((vendedor) => {
      const tipoConta =
        vendedor.tipo_conta_cliente == 0
          ? "Admin"
          : vendedor.tipo_conta_cliente == 1
            ? "Vendedor"
            : "Cliente";

      const estaAtivo = vendedor.status_conta_cliente == 1;
      const textoBotao = estaAtivo ? "Desativar" : "Ativar";

      const tr = document.createElement("tr");
      tr.innerHTML = `
      <td>${vendedor.id_cliente}</td>
      <td>${vendedor.nome_cliente}</td>
      <td>${vendedor.data_registro_cliente}</td>
      <td data-cargo="${vendedor.tipo_conta_cliente}">${tipoConta}</td>
      <td>${vendedor.email_cliente}</td>
      <td>(${vendedor.ddd_cliente}) ${vendedor.numero_celular_cliente}</td>
      <td data-status="${vendedor.status_conta_cliente}">
        <button class="base_botao ${estaAtivo ? "btn_red" : "btn_blue"} btn-status" data-id="${vendedor.id_cliente}" data-ativo="${vendedor.status_conta_cliente}">
          ${textoBotao}
        </button>
      </td>
    `;
      tbody.appendChild(tr);
      tr.addEventListener("click", (e) => {
        if (e.target.tagName.toLowerCase() === "button") return;
        selecionarUsuario(vendedor, tr);
      });
    });

    preencherLinhasVazias(tbody, vendedoresPagina.length, linhasPorPagina);
    atualizarBotoes();
    limparSelecao();

    document.querySelectorAll(".btn-status").forEach((botao) => {
      botao.addEventListener("click", (e) => {
        e.stopPropagation();

        const idUsuario = botao.getAttribute("data-id");
        usuarioSelecionado = vendedoresData.find(v => v.id_cliente == idUsuario);
        botaoSelecionado = botao;

        const estaAtivo = usuarioSelecionado.status_conta_cliente == 1;
        const textoConfirmacao = estaAtivo
          ? "Você deseja desativar este Usuário?"
          : "Você deseja ativar este Usuário?";

        const pTexto = popup.querySelector(".text_popup p");
        if (pTexto) {
          pTexto.textContent = textoConfirmacao;
        }

        popup.style.display = "flex";
      });
    });
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
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");
    if (!btnAnterior || !btnProximo) return;
    btnAnterior.disabled = paginaAtual <= 0;
    btnProximo.disabled = paginaAtual >= totalPaginas - 1;
  }

  function configurarNavegacao() {
    const btnAnterior = document.getElementById("btnAnterior");
    const btnProximo = document.getElementById("btnProximo");
    if (!btnAnterior || !btnProximo) return;
    btnAnterior.addEventListener("click", () => {
      if (paginaAtual > 0) {
        paginaAtual--;
        renderizarPagina(paginaAtual);
      }
    });
    btnProximo.addEventListener("click", () => {
      const totalPaginas = Math.ceil(vendedoresData.length / linhasPorPagina);
      if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
      }
    });
  }

  function selecionarUsuario(usuario, linhaElemento) {
    tbody.querySelectorAll("tr").forEach((tr) => tr.classList.remove("selecionado"));
    linhaElemento.classList.add("selecionado");
    usuarioSelecionado = usuario;
    atualizarPerfilUsuario(usuario);
  }

  function atualizarPerfilUsuario(usuario) {
    const nomeEl = document.getElementById("nome_cliente");
    const emailEl = document.getElementById("email_cliente");
    if (!nomeEl || !emailEl) return;
    nomeEl.textContent = usuario.nome_cliente;
    emailEl.textContent = usuario.email_cliente;
  }

  function limparSelecao() {
    usuarioSelecionado = null;
    tbody.querySelectorAll("tr").forEach((tr) => tr.classList.remove("selecionado"));
    const nomeEl = document.getElementById("nome_cliente");
    const emailEl = document.getElementById("email_cliente");
    if (nomeEl) nomeEl.textContent = "-";
    if (emailEl) emailEl.textContent = "-";
  }

  if (closeBtn) {
    closeBtn.addEventListener("click", () => {
      popup.style.display = "none";
    });
  }

  if (confirmarBtn) {
    confirmarBtn.addEventListener("click", async () => {
      if (!usuarioSelecionado) {
        gerarToast("Nenhum usuário selecionado.", "aviso");
        popup.style.display = "none";
        return;
      }

      try {
        const idUsuario = usuarioSelecionado.id_cliente;
        const ativo = usuarioSelecionado.status_conta_cliente == 1;
        const rota = ativo ? "/INA/GerenciarUsuarios-desativar" : "/INA/GerenciarUsuarios-ativar";

        const response = await fetch(rota, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ id: idUsuario }),
        });

        const result = await response.json();

        if (result.success) {
          gerarToast(`Usuário ${ativo ? "desativado" : "ativado"} com sucesso.`, "sucesso");
          popup.style.display = "none";

          usuarioSelecionado.status_conta_cliente = ativo ? 0 : 1;

          if (botaoSelecionado) {
            botaoSelecionado.textContent = ativo ? "Ativar" : "Desativar";
            botaoSelecionado.classList.toggle("btn_red", !ativo);
            botaoSelecionado.classList.toggle("btn_blue", ativo);
            botaoSelecionado.setAttribute("data-ativo", ativo ? "0" : "1");
          }

        } else {
          console.log(`Erro ao atualizar usuário: ${result.message || "Erro desconhecido"}`);
        }
      } catch (e) {
        console.error(e);
        gerarToast("Erro interno ao tentar atualizar o usuário.", "erro");
      }
    });
  }

  // === Evento do formulário de pesquisa com toast de aviso ===
  if (formPesquisa) {
    formPesquisa.addEventListener("submit", (e) => {
      e.preventDefault();

      const input = formPesquisa.querySelector("input[name='nomeUsuario']");
      const termo = input.value.trim().toLowerCase();

      if (termo === "" || termo === "0") {
        paginaAtual = 0;
        renderizarPagina(paginaAtual);
        return;
      }

      const termoNum = Number(termo);
      const filtrados = vendedoresData.filter((v) => {
        if (!isNaN(termoNum)) {
          return v.id_cliente === termoNum || v.nome_cliente.toLowerCase().includes(termo);
        }
        return v.nome_cliente.toLowerCase().includes(termo);
      });

      if (filtrados.length === 0) {
        gerarToast("Usuário não encontrado.", "aviso");
        paginaAtual = 0; 
        renderizarPagina(paginaAtual);
        return;
      }

      renderizarResultadoBusca(filtrados);
    });
  }

  function renderizarResultadoBusca(lista) {
    if (!tbody) return;
    tbody.innerHTML = "";

    lista.forEach((vendedor) => {
      const tipoConta =
        vendedor.tipo_conta_cliente == 0
          ? "Admin"
          : vendedor.tipo_conta_cliente == 1
            ? "Vendedor"
            : "Cliente";

      const estaAtivo = vendedor.status_conta_cliente == 1;
      const textoBotao = estaAtivo ? "Desativar" : "Ativar";

      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${vendedor.id_cliente}</td>
        <td>${vendedor.nome_cliente}</td>
        <td>${vendedor.data_registro_cliente}</td>
        <td data-cargo="${vendedor.tipo_conta_cliente}">${tipoConta}</td>
        <td>${vendedor.email_cliente}</td>
        <td>(${vendedor.ddd_cliente}) ${vendedor.numero_celular_cliente}</td>
        <td data-status="${vendedor.status_conta_cliente}">
          <button class="base_botao ${estaAtivo ? "btn_red" : "btn_blue"} btn-status" data-id="${vendedor.id_cliente}" data-ativo="${vendedor.status_conta_cliente}">
            ${textoBotao}
          </button>
        </td>
      `;

      tbody.appendChild(tr);

      tr.addEventListener("click", (e) => {
        if (e.target.tagName.toLowerCase() === "button") return;
        selecionarUsuario(vendedor, tr);
      });
    });

    preencherLinhasVazias(tbody, lista.length, linhasPorPagina);
    limparSelecao();
    atualizarBotoes();

    document.querySelectorAll(".btn-status").forEach((botao) => {
      botao.addEventListener("click", (e) => {
        e.stopPropagation();

        const idUsuario = botao.getAttribute("data-id");
        usuarioSelecionado = vendedoresData.find(v => v.id_cliente == idUsuario);
        botaoSelecionado = botao;

        const estaAtivo = usuarioSelecionado.status_conta_cliente == 1;
        const textoConfirmacao = estaAtivo
          ? "Você deseja desativar este Usuário?"
          : "Você deseja ativar este Usuário?";

        const pTexto = popup.querySelector(".text_popup p");
        if (pTexto) {
          pTexto.textContent = textoConfirmacao;
        }

        popup.style.display = "flex";
      });
    });
  }

  configurarNavegacao();
  renderizarPagina(paginaAtual);
});
