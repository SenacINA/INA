document.addEventListener("DOMContentLoaded", () => {
  const popup = document.getElementById("popup_desativar");
  const closeBtn = document.getElementById("close_btn");
  const confirmarBtn = document.getElementById("confirmar_desativar");
  const tbody = document.querySelector(".gerenciar_usuario_table tbody");

  let paginaAtual = 0;
  const linhasPorPagina = 10;
  const vendedoresData = window.vendedores || [];

  let usuarioSelecionado = null;
  let botaoSelecionado = null; // Para guardar o botão clicado

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
          <button class="base_botao ${
            estaAtivo ? "btn_red" : "btn_blue"
          } btn-status" data-id="${vendedor.id_cliente}" data-ativo="${
            vendedor.status_conta_cliente
          }">
            ${textoBotao}
          </button>
        </td>
      `;
      tbody.appendChild(tr);

      // Seleciona usuário e atualiza perfil ao clicar na linha (exceto no botão)
      tr.addEventListener("click", (e) => {
        if (e.target.tagName.toLowerCase() === "button") return; // Ignora click no botão
        selecionarUsuario(vendedor, tr);
      });
    });

    preencherLinhasVazias(tbody, vendedoresPagina.length, linhasPorPagina);
    atualizarBotoes();
    limparSelecao();

    // Adiciona evento para os botões ativar/desativar da tabela
    document.querySelectorAll(".btn-status").forEach((botao) => {
      botao.addEventListener("click", (e) => {
        e.stopPropagation();

        // Guarda usuário e botão selecionado
        const idUsuario = botao.getAttribute("data-id");
        usuarioSelecionado = vendedoresData.find(v => v.id_cliente == idUsuario);
        botaoSelecionado = botao;

        // Mostrar popup de confirmação
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

  // Eventos do popup
  if (closeBtn) {
    closeBtn.addEventListener("click", () => {
      popup.style.display = "none";
    });
  }

  if (confirmarBtn) {
    confirmarBtn.addEventListener("click", async () => {
      if (!usuarioSelecionado) {
        alert("Nenhum usuário selecionado.");
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
          alert(`Usuário ${ativo ? "desativado" : "ativado"} com sucesso.`);
          popup.style.display = "none";
          location.reload();
        } else {
          alert(`Erro ao atualizar usuário: ${result.message || "Erro desconhecido"}`);
        }
      } catch (e) {
        console.error(e);
        alert("Erro interno ao tentar atualizar o usuário.");
      }
    });
  }

  configurarNavegacao();
  renderizarPagina(paginaAtual);
});
