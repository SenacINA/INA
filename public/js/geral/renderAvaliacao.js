function renderComentarioAvaliacaoProduto(comentario) {
    const nome = comentario.nome || '';
    const estrelas = comentario.estrelas || 0;
    const qualidade = comentario.qualidade || '';
    const parecido = comentario.parecido ? 'Sim' : 'Não';
    const texto = comentario.texto || '';
    const imagens = comentario.imagens || [];
    const data = new Date(comentario.data).toLocaleDateString('pt-BR');
    const fotoPerfil = comentario.foto_perfil || '/image/cliente/perfil_cliente/foto_user.png';

    // Calcular classe das estrelas
    const estrelasClasse = `estrelas-${Math.round(estrelas)}`;
    
    // Gerar HTML das imagens
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

// Função para carregar e renderizar comentários
async function carregarComentarios(idVendedor, idProduto, maxRender = 5, offset = 0) {
    const container = document.querySelector('.grid_comentarios_usuarios');
    if (!container) return;
    
    try {
        // Montar URL com parâmetros
        const url = new URL('/ina/api-comentariosJson', window.location.origin);
        url.searchParams.append('idVendedor', idVendedor);
        url.searchParams.append('idProduto', idProduto);
        url.searchParams.append('maxRender', maxRender);
        url.searchParams.append('offset', offset);
        
        const response = await fetch(url);
        const responseData = await response.json();
        
        // Verificar se a resposta é válida
        if (!responseData || !responseData.success || !Array.isArray(responseData.data)) {
            throw new Error("Resposta inválida da API");
        }
        
        const comentarios = responseData.data;
        
        // Limpar container apenas na primeira carga
        if (offset === 0) {
            container.innerHTML = '';
        }
        
        // Renderizar cada comentário
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
        
        // Adicionar botão "Ver mais" se houver mais resultados
        const btnVerMais = container.querySelector('.btn-ver-mais');
        const hasMore = responseData.pagination?.has_more;
        
        if (hasMore) {
            if (!btnVerMais) {
                const btnContainer = document.createElement('div');
                btnContainer.className = 'btn-ver-mais';
                btnContainer.innerHTML = `
                    <button class="base_botao btn_blue">Ver mais avaliações</button>
                `;
                
                btnContainer.querySelector('button').addEventListener('click', () => {
                    carregarComentarios(idVendedor, idProduto, maxRender, offset + maxRender);
                });
                
                container.appendChild(btnContainer);
            }
        } else if (btnVerMais) {
            btnVerMais.remove();
        }
        
        // Mostrar mensagem se não houver comentários na primeira página
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

// Inicialização quando a página carregar
document.addEventListener('DOMContentLoaded', () => {
    // Obter parâmetros da página (exemplo usando atributos data-*)
    const produtoInfo = document.getElementById('produto-info');
    
    if (produtoInfo) {
        const idVendedor = produtoInfo.dataset.idVendedor;
        const idProduto = produtoInfo.dataset.idProduto;
        
        carregarComentarios(idVendedor, idProduto);
    }
});