const cardProduto = (produto) => {
  let precoFinal = produto.preco_produto;
  let flagPromo = "";
  let hasPromo = false;

  if (produto.desconto_promocao > 0) {
    hasPromo = true;

    if (produto.tipo_promocao === 1) {
      // reais sobre total
      precoFinal = (produto.preco_produto - produto.desconto_promocao).toFixed(2).replace('.', ',');
      flagPromo = `- R$${produto.desconto_promocao}`;
    } else if (produto.tipo_promocao === 2) {
      // porcentagem sobre total
      precoFinal = (produto.preco_produto * (1 - produto.desconto_promocao / 100)).toFixed(2).replace('.', ',');
      flagPromo = `${produto.desconto_promocao}% OFF`;
    }    
  } 

  return `
    <div class='index_body_produto_card' data-id='${produto.id_produto}' data-nome='${produto.nome_produto}'>
      <div class='index_body_imagem_produto'>
        ${hasPromo ? `
          <div class="promo_container">
            <div class="promo_flag">${flagPromo}</div>
          </div>
        ` : ''}
        <img id='produto' src='./public/${produto.endereco_imagem_produto}' alt='${produto.nome_produto}'>
        <p>${produto.nome_produto}</p>
      </div>
      <div class="index_estrelas_button">
        <div class='index_body_estrela_valor'>
          <div class='index_body_estrela_produto'>
            <p class='estrelas-${Math.ceil(produto.media_avaliacoes)}'>★★★★★</p>
            <h4>${produto.total_avaliacoes}</h4>
          </div>
          <div class='index_body_valor_produto'>
            ${hasPromo ? `
              <p id='indexBodyValorProduto' class='preco_antigo'>R$${produto.preco_produto}</p>
              <p id='indexBodyValorProduto'>R$${precoFinal}</p>
            ` : `
              <p id='indexBodyValorProduto'>R$${produto.preco_produto + ',00'}</p>
            `}
          </div>
        </div>
        <div class='index_body_botoes_produto'>
          <input type='hidden' name='quantidade' value='1'>
          <button type='button' data-id='${produto.id_produto}' data-quantidade='1' class='adicionar_carrinho base_botao btn_blue'>
            <svg xmlns='http://www.w3.org/2000/svg' width='26px' height='26px' viewBox='0 0 26 26' fill='none'>
              <path d='M5.78305 4.44444H23.75L21.3056 13H7.09931M22.5278 17.8889H7.86111L5.41667 2H1.75M9.08333 22.7778C9.08333 23.4528 8.53612 24 7.86111 24C7.1861 24 6.63889 23.4528 6.63889 22.7778C6.63889 22.1027 7.1861 21.5556 7.86111 21.5556C8.53612 21.5556 9.08333 22.1027 9.08333 22.7778ZM22.5278 22.7778C22.5278 23.4528 21.9806 24 21.3056 24C20.6305 24 20.0833 23.4528 20.0833 22.7778C20.0833 22.1027 20.6305 21.5556 21.3056 21.5556C21.9806 21.5556 22.5278 22.1027 22.5278 22.7778Z' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/>
            </svg>
          </button>
          <a href='Produto/${produto.id_produto}' class='base_botao btn_blue btn_comprar'>COMPRAR</a>
        </div>
      </div>
    </div>
  `;
};

export default cardProduto;
