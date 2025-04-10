// @ts-check

/**
 * Função para gerenciar adição ao carrinho
 * @param {string} value  
 * @param {number} add Default 1
 * @param {number} max Defualt 10
 * @param {number} min Default 1
 */
function handleAddRemoveButton(value, add = 1, max = 10, min = 1){
    if( typeof value !== 'string' ||
        typeof add !== 'number' ||
        typeof max !== 'number' ||
        typeof min !== 'number'
    ){
        console.log(`argumentos invalidos na função handleAddRemoveButton: ${value}, ${add}, ${max}, ${min}`)
        return
    }
    console.log('algo1')

    const num = parseInt(value);
    if(isNaN(num)){
        console.log(`Argumento inválido em handleAddRemoveButton: ${value}, precisa ser um número inteiro`)
        return
    }
    console.log('algo4', num, 'add', add)

    if(add > 0){
        return num + add > max ? num : num + add;
    }
    return num + add < min ? num : num + add;
}

const removerTudoFun = () => {
    const elemento = document.getElementsByClassName('carrinho_vazio_conteudo_items')[0]
    if(!elemento)return

    elemento.innerHTML = '<h1 class="items_vazio">NENHUM ITEM NO CARRINHO</h1>'
}

const toggleMostarServicos = () => {
    console.log('aaaaaaaaaaaaaaaaaaak')
    const freteContainer1 = document.getElementById("frete_container_1");
    const freteContainer2 = document.getElementById("frete_container_2");

    if (!freteContainer1 || !freteContainer2) {
        console.log('Sem serviços');
        return;
    }

    freteContainer1.classList.toggle('visible_servicos');
    freteContainer2.classList.toggle('visible_servicos');
}


document.addEventListener('DOMContentLoaded', () => {
    const btn_add = document.getElementById("carrinhoVazioBotaoAumentar")
    const btn_dec = document.getElementById("carrinhoVazioBotaoDiminuir")
    const carrinho_value = document.getElementById("quantidadeCarrinho")
    const precoTotal = document.getElementById("carrinhoVazioPrecoTotal")
    const precoBase = document.getElementById("carrinhoVazioPrecoBase")
    
    const removerTudo = document.getElementById("carrinhoVazioRemoverTudo")
    const removerTudoItem = document.getElementById("carrinhoVazioRemoverItem")
    const toggleBotao = document.getElementById("btn_mostrar_servicos")


    if(toggleBotao){
        console.log('boooooooooooota')
        toggleBotao.addEventListener('click', () => toggleMostarServicos() )
    }

    if(!(btn_add && btn_dec && carrinho_value && precoTotal && precoBase && removerTudo && removerTudoItem)){
        console.log('Carrinho vazio ou Erro ao encontrar elementos')
        return
    }
    
    removerTudo.addEventListener('click', removerTudoFun)
    removerTudoItem.addEventListener('click', removerTudoFun)

    btn_add.addEventListener('click', () => {
        
        const newValue = handleAddRemoveButton(carrinho_value.innerText)

        const oldValue = parseInt(carrinho_value.innerText)

        if(isNaN(oldValue) || oldValue === newValue){
            console.log('Skipping new value')
            return
        }

        if(!newValue){
            console.log(`Não foi possivel calcular o novo valor: ${newValue}`)
            return
        }

        const basePreco = parseFloat(precoBase.innerText.substring(2).replace(' unid.', '').replace(',', '.'))
        
        if(isNaN(basePreco)){
            console.log('não foi possivel converter preço antigo do carrinho para número')
            return
        }

        const newTotal = newValue * basePreco

        precoTotal.innerText = `R$${String(newTotal.toFixed(2)).replace('.', ',')}`

        carrinho_value.innerText = `${newValue}`
    })


    btn_dec.addEventListener('click', () => {
        const newValue = handleAddRemoveButton(carrinho_value.innerText, -1)
        const oldValue = parseInt(carrinho_value.innerText)

        if(isNaN(oldValue) || oldValue === newValue){
            console.log('Skipping new value')
            return
        }

        if(!newValue){
            console.log(`Não foi possivel calcular o novo valor: ${newValue}`)
            return
        }

        const basePreco = parseFloat(precoBase.innerText.substring(2).replace(',', '.'))
        
        if(isNaN(basePreco)){
            console.log('não foi possivel converter preço antigo do carrinho para número')
            return
        }

        const newTotal = newValue * basePreco

        precoTotal.innerText = `R$${String(newTotal.toFixed(2)).replace('.', ',')}`

        carrinho_value.innerText = `${newValue}`
    })

})