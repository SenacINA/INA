document.addEventListener('DOMContentLoaded', function () {
    let vendas = [];
    let paginaAtual = 0;
    const vendasPorPagina = 10;
  
    async function carregarTabelaVendas(filtro = '') {
      try {
        const resposta = await fetch('Venda-api-lista', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `filtro=${encodeURIComponent(filtro)}`
        });
  
        const json = await resposta.json();
  
        if (!json.success) {
          console.error('Erro ao buscar vendas:', json.errors || json.erros);
          return;
        }
  
        vendas = json.data;
        paginaAtual = 0;
  
        renderizarPagina(paginaAtual);
        configurarNavegacao();
  
      } catch (erro) {
        console.error('Erro na requisição:', erro);
      }
    }
  
    function renderizarPagina(pagina) {
      const tbody = document.querySelector('.base_tabela tbody');
      tbody.innerHTML = '';
  
      const inicio = pagina * vendasPorPagina;
      const fim = inicio + vendasPorPagina;
      const vendasPagina = vendas.slice(inicio, fim);
  
      if (vendasPagina.length === 0) {
        const tr = document.createElement('tr');
        tr.innerHTML = `<td colspan="5">Nenhum resultado encontrado</td>`;
        tbody.appendChild(tr);
        return;
      }
  
      vendasPagina.forEach(v => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>#${v.id_compra}</td>
          <td>${escapeHtml(v.cliente)}</td>
          <td>R$ ${Number(v.valor_total).toFixed(2).replace('.', ',')}</td>
          <td>${escapeHtml(formatarData(v.data_compra))}</td>
          <td>
            <form method="post" action="Venda-api-sale" style="display:inline;">
              <input type="hidden" name="id_venda" value="${v.id_compra}">
              <button type="submit" class="aprovar_vendedor_btn_aprovar btn_blue base_botao">GERENCIAR</button>
            </form>
          </td>
        `;
        tbody.appendChild(tr);
      });
  
      // Completar linhas para manter altura constante
      const linhasFaltantes = vendasPorPagina - vendasPagina.length;
      for (let i = 0; i < linhasFaltantes; i++) {
        const trVazio = document.createElement('tr');
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
      const container = document.querySelector('.base_navegacao');
      if (!container) {
        console.warn('Elemento .base_navegacao não encontrado para inserir navegação');
        return;
      }
  
      let nav = document.querySelector('.navegacao_vendas');
  
      if (!nav) {
        nav = document.createElement('div');
        nav.className = 'navegacao_vendas';
        nav.innerHTML = `
          <button id="btnAnterior" class="base_botao btn_blue">
            <img src='./public/image/geral/icons/seta_filtro_branco.svg' class='base_icon esquerda'>
          </button>
          <button id="btnProximo" class="base_botao btn_blue">
            <img src='./public/image/geral/icons/seta_filtro_branco.svg' class='base_icon direita'>
          </button>
        `;
        container.after(nav);
  
        document.getElementById('btnAnterior').addEventListener('click', () => {
          if (paginaAtual > 0) {
            paginaAtual--;
            renderizarPagina(paginaAtual);
          }
        });
  
        document.getElementById('btnProximo').addEventListener('click', () => {
          const totalPaginas = Math.ceil(vendas.length / vendasPorPagina);
          if (paginaAtual < totalPaginas - 1) {
            paginaAtual++;
            renderizarPagina(paginaAtual);
          }
        });
      }
  
      atualizarBotoes();
    }
  
    function atualizarBotoes() {
      const totalPaginas = Math.ceil(vendas.length / vendasPorPagina);
      const btnAnterior = document.getElementById('btnAnterior');
      const btnProximo = document.getElementById('btnProximo');
  
      if (btnAnterior && btnProximo) {
        btnAnterior.disabled = paginaAtual === 0;
        btnProximo.disabled = paginaAtual >= totalPaginas - 1;
      }
    }
  
    // Função simples para escapar HTML (evitar XSS)
    function escapeHtml(text) {
      return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
    }
  
    // Formata data do formato ISO para dd/mm/yyyy
    function formatarData(dataStr) {
      const d = new Date(dataStr);
      if (isNaN(d)) return dataStr;
      return d.toLocaleDateString('pt-BR');
    }
  
    // Começa carregando os dados
    carregarTabelaVendas();
  });
  