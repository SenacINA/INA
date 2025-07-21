// renderAvaliacao.js

function renderComentarioAvaliacaoProduto(comentario) {
    const nome = comentario.nome || '';
    const estrelas = comentario.estrelas || 0;
    const qualidade = comentario.qualidade || '';
    const parecido = comentario.parecido ? 'Sim' : 'Não';
    const texto = comentario.texto || '';
    const imagens = comentario.imagens || [];
    const data = new Date(comentario.data).toLocaleDateString('pt-BR');
    const fotoPerfil = comentario.foto_perfil || '/image/cliente/perfil_cliente/foto_user.png';

    const estrelasClasse = `estrelas-${Math.round(estrelas)}`;

    const imagensHTML = imagens.map(img =>
        `<div class='image1_user'><img src='./public${img}' alt=''></div>`
    ).join('');

    return `
        <div class="comentario_usuario">
            <div class="grid_user">
                <div class='cliente_nome_pic'>
                    <img class="icon_user" src="./public${fotoPerfil}" alt="Foto do cliente">
                    <div>
                        <h1>${nome}</h1>
                        <h2 class='vendedor_estrelas ${estrelasClasse}'>★★★★★</h2>
                    </div>
                </div>
            </div>

            <div class="grid_comentario_user">
                <div class="avaliacao_user_item1">
                    <h2>Avaliado em:</h2>
                    <h3>${data}</h3>
                </div>
                <div class="avaliacao_user_item1">
                    <h2>Qualidade:</h2>
                    <h3>${qualidade}</h3>
                </div>
                <div class="avaliacao_user_item2">
                    <h2>Parecido com o anúncio:</h2>
                    <h3>${parecido}</h3>
                </div>
                <h2 class='produto_comentario'>
                    ${texto}
                </h2>
            </div>

            <div class="grid_images_user">
                ${imagensHTML}
            </div>
        </div>
        <hr class='linha_comentario'>
    `;
}

async function carregarComentarios(idVendedor, idProduto, maxRender = 5, offset = 0, tipoFiltro = null, valorFiltro = null) {
    const container = document.querySelector('.grid_comentarios_usuarios');
    if (!container) return;

    try {
        const url = new URL('/ina/api-comentariosJson', window.location.origin);
        url.searchParams.append('idVendedor', idVendedor);
        url.searchParams.append('idProduto', idProduto);
        url.searchParams.append('maxRender', maxRender);
        url.searchParams.append('offset', offset);

        // se houver filtro, adiciona à URL
        if (tipoFiltro && valorFiltro) {
            url.searchParams.append(tipoFiltro, valorFiltro);
        }

        const response = await fetch(url);
        const responseData = await response.json();

        if (!responseData || !responseData.success || !Array.isArray(responseData.data)) {
            throw new Error("Resposta inválida da API");
        }

        const comentarios = responseData.data;

        // no primeiro carregamento (offset=0), limpo tudo
        if (offset === 0) {
            container.innerHTML = '';
        }

        // remove botão antigo de “Ver mais”
        const btnVerMaisExistente = container.querySelector('.btn-ver-mais');
        if (btnVerMaisExistente) {
            btnVerMaisExistente.remove();
        }

        comentarios.forEach(comentario => {
            const dadosComponente = {
                nome: comentario.nome_cliente,
                estrelas: comentario.estrelas_avaliacao,
                qualidade: comentario.qualidade,
                parecido: comentario.parecido,
                texto: comentario.descricao_avaliacao,
                imagens: comentario.imagens || [],
                foto_perfil: comentario.foto_perfil_cliente,
                data: comentario.data_avaliacao
            };
            container.innerHTML += renderComentarioAvaliacaoProduto(dadosComponente);
        });

        // adiciona “Ver mais avaliações” se houver paginação
        const hasMore = responseData.pagination?.has_more;
        if (hasMore) {
            const btnContainer = document.createElement('div');
            btnContainer.className = 'btn-ver-mais';
            btnContainer.innerHTML = `
                <button class="base_botao btn_blue">Ver mais avaliações</button>
            `;
            btnContainer.querySelector('button').addEventListener('click', () => {
                carregarComentarios(idVendedor, idProduto, maxRender, offset + maxRender, tipoFiltro, valorFiltro);
            });
            container.appendChild(btnContainer);
        }

        // se não vier nada na primeira carga
        if (offset === 0 && comentarios.length === 0) {
            container.innerHTML = '<div class="sem_avaliacoes">Sem avaliações</div>';
        }

    } catch (error) {
        console.error('Erro ao carregar comentários:', error);
        if (offset === 0) {
            container.innerHTML = `<div class="sem_avaliacoes">Erro ao carregar avaliações: ${error.message}</div>`;
        }
    }
}

async function carregarComentariosCliente(idVendedor, idProduto, idCliente) {
    const container = document.getElementById('comentario-cliente-container');
    if (!container) return;

    try {
        const url = new URL('/ina/api-comentarioClienteJson', window.location.origin);
        url.searchParams.append('idVendedor', idVendedor);
        url.searchParams.append('idProduto', idProduto);
        url.searchParams.append('idCliente', idCliente);

        const response = await fetch(url);
        const responseData = await response.json();

        if (!responseData || !responseData.success || !responseData.data) {
            throw new Error("Comentário do cliente não encontrado.");
        }

        const comentario = responseData.data;
        const dadosComponente = {
            nome: comentario.nome_cliente,
            estrelas: comentario.estrelas_avaliacao,
            qualidade: comentario.qualidade,
            parecido: comentario.parecido,
            texto: comentario.descricao_avaliacao,
            imagens: comentario.imagens || [],
            foto_perfil: comentario.foto_perfil_cliente,
            data: comentario.data_avaliacao
        };
        container.innerHTML = renderComentarioCliente(dadosComponente);

    } catch (error) {
        console.error('Erro ao carregar comentário do cliente:', error);
        container.remove();
    }
}

function renderComentarioCliente(comentario) {
    const nome = comentario.nome || '';
    const estrelas = comentario.estrelas || 0;
    const qualidade = comentario.qualidade || '';
    const parecido = comentario.parecido ? 'Sim' : 'Não';
    const texto = comentario.texto || '';
    const imagens = comentario.imagens || [];
    const data = new Date(comentario.data).toLocaleDateString('pt-BR');
    const fotoPerfil = comentario.foto_perfil || '/image/cliente/perfil_cliente/foto_user.png';

    const estrelasClasse = `estrelas-${Math.round(estrelas)}`;
    const imagensHTML = imagens.map(img =>
        `<div class='image1_user'><img src='./public${img}' alt=''></div>`
    ).join('');

    return `
        <h2 class="comentario-title">Seu comentário</h2>
        <div class="comentario_usuario">
            <div class="grid_user">
                <div class='cliente_nome_pic'>
                    <img class="icon_user" src="./public${fotoPerfil}" alt="Foto do cliente">
                    <div>
                        <h1>${nome}</h1>
                        <h2 class='vendedor_estrelas ${estrelasClasse}'>★★★★★</h2>
                    </div>
                </div>
            </div>

            <div class="grid_comentario_user">
                <div class="avaliacao_user_item1">
                    <h2>Avaliado em:</h2>
                    <h3>${data}</h3>
                </div>
                <div class="avaliacao_user_item1">
                    <h2>Qualidade:</h2>
                    <h3>${qualidade}</h3>
                </div>
                <div class="avaliacao_user_item2">
                    <h2>Parecido com o anúncio:</h2>
                    <h3>${parecido}</h3>
                </div>
                <h2 class='produto_comentario'>
                    ${texto}
                </h2>
            </div>

            <div class="grid_images_user">
                ${imagensHTML}
            </div>
        </div>
    `;
}

document.addEventListener('DOMContentLoaded', () => {
    const produtoInfo = document.getElementById('produto-info');
    if (!produtoInfo) return;

    const idVendedor = produtoInfo.dataset.idVendedor;
    const idProduto  = produtoInfo.dataset.idProduto;
    const idCliente  = produtoInfo.dataset.idCliente || '';

    // carrega o comentário do próprio cliente (se existir)
    if (idCliente > 0) {
        carregarComentariosCliente(idVendedor, idProduto, idCliente);
    }

    // carga inicial sem filtro
    carregarComentarios(idVendedor, idProduto);

    // configura botões de filtro
    const filtros = document.querySelectorAll('.btn-filtrar-avaliacao');
    filtros.forEach(btn => {
        btn.addEventListener('click', () => {
            const tipo  = btn.dataset.tipo;   // "estrelas" ou "com_midia"
            const valor = btn.dataset.valor;  // "1".."5" ou "1"
            // recarrega do zero com filtro
            carregarComentarios(idVendedor, idProduto, 5, 0, tipo, valor);
        });
    });
});
