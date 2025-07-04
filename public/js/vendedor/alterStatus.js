function alterarStatusProduto(id, status) {
    const button = document.getElementById('statusProduto');
    const input = document.getElementById('statusProdutoInput');

    fetch('ProdutoStatus-api', {
        method: 'POST',
        body: JSON.stringify({ id, status }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(res => {
        if (!res.ok) throw new Error(`HTTP error: ${res.status}`);
        return res.json();
    })
    .then(data => {
        if (!data.success) {
            gerarToast(`Erro ao atualizar status: ${data.message}`, 'erro');
            return;
        }

        gerarToast('Status atualizado com sucesso', 'sucesso');

        const novoStatus = data.novoStatus ? 1 : 0;
        input.value = novoStatus;

        // Atualiza classes
        button.classList.remove('btn_red', 'btn_sappire');
        button.classList.add(!novoStatus ? 'btn_sappire' : 'btn_red');

        // Atualiza conteúdo de forma segura
        const imgPath = novoStatus
            ? './public/image/geral/botoes/v_branco_icon.svg'
            : './public/image/geral/botoes/x_branco_icon.svg';

        const textoBotao = !novoStatus ? 'ATIVAR PRODUTO' : 'INATIVAR PRODUTO';
        const novoStatusParaChamada = novoStatus ? 0 : 1;

        button.innerHTML = `<img src="${imgPath}" alt=""> ${textoBotao}`;
        button.setAttribute('onclick', `alterarStatusProduto(${id}, ${novoStatusParaChamada})`);
    })
    .catch(error => {
        console.error("Erro no fetch ou na atualização do botão:", error);
        gerarToast('Erro de rede ou atualização do status do produto', 'erro');
    });
}
