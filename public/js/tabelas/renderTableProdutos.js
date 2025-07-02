document.addEventListener('DOMContentLoaded', function () {
  let produtos = [];
  let paginaAtual = 0;
  const produtosPorPagina = 10;

  const filtroSelect = document.getElementById('filtroRelatorio');

  async function carregarTabelaProdutos(idVendedor, filtro = 'code') {
    try {
      const resposta = await fetch('GerenciarProdutos-api', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_vendedor=${idVendedor}&filtro=${filtro}`
      });

      const json = await resposta.json();

      if (!json.success) {
        console.error('Erro ao buscar produtos:', json.errors || json.erros);
        return;
      }

      produtos = json.data;
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

    const inicio = pagina * produtosPorPagina;
    const fim = inicio + produtosPorPagina;
    const produtosPagina = produtos.slice(inicio, fim);

    produtosPagina.forEach(produto => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td># ${produto.cod_produto}</td>
        <td>
          <span class='nome_produto'>
            <img class='img_table' src='public/${produto.endereco_imagem_produto}'>
            <span>${produto.nome_produto}</span>
          </span>
        </td>
        <td>R$ ${produto.preco_produto}</td>
        <td>${produto.unidade_produto}</td>
        <td><span>${produto.status_produto ? "Ativo" : "Inativo"}</span></td>
        <td>
          <button class='base_botao btn_blue'>
            <img class='base_icon' src='public/image/geral/icons/caneta_branca_icon.svg'>
            EDITAR
          </button>
        </td>
      `;
      tbody.appendChild(tr);
    });

    // Adiciona linhas vazias para completar a página
    const linhasFaltantes = produtosPorPagina - produtosPagina.length;
    for (let i = 0; i < linhasFaltantes; i++) {
      const trVazio = document.createElement('tr');
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

    atualizarBotoes();
  }

  function configurarNavegacao() {
    const container = document.querySelector('.base_navegacao');
    let nav = document.querySelector('.navegacao_produtos');

    if (!nav) {
      nav = document.createElement('div');
      nav.className = 'navegacao_produtos';
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
        const totalPaginas = Math.ceil(produtos.length / produtosPorPagina);
        if (paginaAtual < totalPaginas - 1) {
          paginaAtual++;
          renderizarPagina(paginaAtual);
        }
      });
    }
  }

  function atualizarBotoes() {
    const totalPaginas = Math.ceil(produtos.length / produtosPorPagina);
    const btnAnterior = document.getElementById('btnAnterior');
    const btnProximo = document.getElementById('btnProximo');

    if (btnAnterior && btnProximo) {
      btnAnterior.disabled = paginaAtual === 0;
      btnProximo.disabled = paginaAtual >= totalPaginas - 1;
    }
  }

  // Event listener para o filtro
  if (filtroSelect) {
    filtroSelect.addEventListener('change', () => {
      const filtroSelecionado = filtroSelect.value || 'code';
      carregarTabelaProdutos(idVendedor, filtroSelecionado);
    });
  }

  // Início: carregamento inicial com filtro padrão
  carregarTabelaProdutos(idVendedor, filtroSelect?.value || 'code');
});
