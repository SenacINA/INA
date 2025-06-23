document.getElementById('formAvaliacao').addEventListener('submit', async function(event) {
    event.preventDefault();
    
    const estrelas = document.querySelector('input[name="rating"]:checked')?.value;
    const comentario = document.getElementById('comentario').value;
    const qualidade = document.getElementById('qualidade').value;
    const parecido = document.getElementById('parecido').value;
    const idProduto = document.getElementById('formAvaliacao').dataset.idProduto;
    const id_vendedor = document.getElementById('formAvaliacao').dataset.idVendedor;


    if (!estrelas || !comentario || !qualidade || !parecido) {
        gerarToast('Preencha todos os campos obrigatórios', 'erro');
        return;
    }

    // Coletar imagens (base64)
    const imagens = [];
    document.querySelectorAll('.registro_produto_imagens img').forEach(img => {
        if (img.src.startsWith('data:image/webp')) {
            imagens.push(img.src);
        }
    });

    const formData = new FormData();
    formData.append('estrelas', estrelas);
    formData.append('comentario', comentario);
    formData.append('qualidade', qualidade);
    formData.append('parecido', parecido);
    formData.append('id_produto', idProduto);
    formData.append('imagens', JSON.stringify(imagens));
    formData.append('id_vendedor', id_vendedor);

    try {
        const response = await fetch('/INA/api/avaliar-produto', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            gerarToast('Avaliação enviada com sucesso!', 'sucesso');
            setTimeout(() => {
                window.location.reload();
            }, 5000);
        } else {
            gerarToast(result.message || 'Erro ao enviar avaliação', 'erro');
        }
    } catch (error) {
        console.error('Erro:', error);
        gerarToast('Erro de conexão', 'erro');
    }
});