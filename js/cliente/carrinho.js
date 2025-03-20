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
        return num + add >= max ? num : num + add;
    }
    return num + add <= min ? num : num + add;
}

document.addEventListener('DOMContentLoaded', () => {
    const btn_add = document.getElementById("carrinhoVazioBotaoAumentar")
    const btn_dec = document.getElementById("carrinhoVazioBotaoDiminuir")
    const carrinho_value = document.getElementById("quantidadeCarrinho")
    const precoTotal = document.getElementById("carrinhoVazioPrecoTotal")
    console.log('algo2')

    if(!(btn_add && btn_dec && carrinho_value && precoTotal)){
        console.log('Carrinho vazio ou Erro ao encontrar elementos')
        return
    }
    console.log('algo3')
    

    btn_add.addEventListener('click', () => {
        const newValue = handleAddRemoveButton(carrinho_value.innerText)

        console.log(newValue)
        if(!newValue){
            console.log(`Não foi possivel calcular o novo valor: ${newValue}`)
            return
        }

        const oldPreco = parseFloat(precoTotal.innerText.substring(2).replace(',', '.'))
        
        if(isNaN(oldPreco)){
            console.log('não foi possivel converter preço antigo do carrinho para número')
            return
        }

        const newTotal = newValue * oldPreco

        precoTotal.innerText = `R$${String(newTotal.toFixed(2)).replace('.', ',')}`

        carrinho_value.innerText = `${newValue}`
    })

    
    btn_dec.addEventListener('click', () => {
        const newValue = handleAddRemoveButton(carrinho_value.innerText, -1)

        console.log(newValue)

        if(!newValue){
            console.log(`Não foi possivel calcular o novo valor: ${newValue}`)
            return
        }

        const oldPreco = parseFloat(precoTotal.innerText.substring(2).replace(',', '.'))
        
        if(isNaN(oldPreco)){
            console.log('não foi possivel converter preço antigo do carrinho para número')
            return
        }

        const newTotal = newValue * oldPreco

        precoTotal.innerText = `R$${String(newTotal.toFixed(2)).replace('.', ',')}`

        carrinho_value.innerText = `${newValue}`
    })

})