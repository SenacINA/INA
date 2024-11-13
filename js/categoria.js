function categoria(){
    let template = document.getElementById('produto_card_template');
    const container = document.getElementsByClassName('linha_card_produto');

    for(conteudo of container){
        for (let i = 0; i < 5; i++) {
            const clone = document.importNode(template.content, true);
            
            //Remove card de desconto/preço antigo de elemetos fora de destaque
            if(conteudo.id != "destaque_produtos"){
                const cardDesconto = clone.querySelector('#card_desconto_template');
                if (cardDesconto) {
                    cardDesconto.remove();//remove o elemento
                }
                const cardTextoDesconto = clone.querySelector('.card_preco_desconto')
                if(cardTextoDesconto){
                    cardTextoDesconto.remove();
                }
            }

            /**
             * @type {HTMLElement}
             */
            const cardEstrela = clone.querySelector('.card_estrela_texto')
            if(cardEstrela){
                let quantidade = (3 + Math.floor(Math.random() * 3)) * 10;
                if(quantidade !== 50){
                    quantidade += Math.random() > 0.5 ? 5 : 0;
                }
                cardEstrela.classList.add(`estrela_${quantidade}`)
            }
            /**
             * @type {HTMLElement}
             */
            const cardEstrelaQuantidade = clone.querySelector('.card_estrela_quantidade')
            if(cardEstrelaQuantidade){
                cardEstrelaQuantidade.innerText = `(${Math.ceil(Math.random() * 4000)})`
            }
            conteudo.appendChild(clone);
        }
    }
}
categoria()