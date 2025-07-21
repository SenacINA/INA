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

async function carregarComentarios(
    idVendedor,
    idProduto,
    maxRender = 5,
    offset = 0,
    tipoFiltro = null,
    valorFiltro = null,
    idCliente = 0
) {
    const container = document.querySelector('.grid_comentarios_usuarios');
    if (!container) return;

    try {
        const url = new URL('/ina/api-comentariosJson', window.location.origin);
        url.searchParams.append('idVendedor', idVendedor);
        url.searchParams.append('idProduto',  idProduto);
        url.searchParams.append('maxRender',  maxRender);
        url.searchParams.append('offset',     offset);

        if (idCliente > 0) {
            url.searchParams.append('idCliente', idCliente);
        }
        if (tipoFiltro && valorFiltro) {
            url.searchParams.append(tipoFiltro, valorFiltro);
        }

        const response     = await fetch(url);
        const responseData = await response.json();

        if (!responseData.success || !Array.isArray(responseData.data)) {
            throw new Error("Resposta inválida da API");
        }

        const comentarios = responseData.data;

        if (offset === 0) {
            container.innerHTML = '';
        }

        // remove botão antigo de ver mais
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

        // botao ver mais
        const hasMore = responseData.pagination?.has_more;
        if (hasMore) {
            const btnContainer = document.createElement('div');
            btnContainer.className = 'btn-ver-mais';
            btnContainer.innerHTML = `
                <button class="base_botao btn_blue">Ver mais avaliações</button>
            `;
            btnContainer.querySelector('button').addEventListener('click', () => {
                carregarComentarios(
                    idVendedor,
                    idProduto,
                    maxRender,
                    offset + maxRender,
                    tipoFiltro,
                    valorFiltro,
                    idCliente
                );
            });
            container.appendChild(btnContainer);
        }

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
        url.searchParams.append('idProduto',  idProduto);
        url.searchParams.append('idCliente',  idCliente);

        const response     = await fetch(url);
        const responseData = await response.json();

        if (!responseData.success || !responseData.data) {
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

    // carrega comentário próprio do cliente (se existir)
    if (idCliente > 0) {
        carregarComentariosCliente(idVendedor, idProduto, idCliente);
    }

    // sem filtro
    carregarComentarios(
        idVendedor,
        idProduto,
        5,
        0,      
        null,   
        null,   
        idCliente
    );

    // configuração dos botões de filtro
    const filtros = document.querySelectorAll('.btn-filtrar-avaliacao');
    filtros.forEach(btn => {
        btn.addEventListener('click', () => {
            let tipoFiltro = null;
            let valorFiltro = null;

            if (btn.classList.contains('selecionado')) {
                btn.classList.remove('selecionado');
            } else {
                const anterior = document.querySelector('.btn-filtrar-avaliacao.selecionado');
                if (anterior) anterior.classList.remove('selecionado');
                btn.classList.add('selecionado');
                tipoFiltro  = btn.dataset.tipo;
                valorFiltro = btn.dataset.valor;
            }

            carregarComentarios(
                idVendedor,
                idProduto,
                5,
                0,
                tipoFiltro,
                valorFiltro,
                idCliente
            );
        });
    });
});
