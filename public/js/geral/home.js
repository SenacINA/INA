import cardProduto from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
    if (produto.desconto_promocao > 0) {
      if (produto.tipo_promocao == 1) {
        produto["flag_promo"] = `- R$${produto.desconto_promocao}`;
        produto["preco_produto_promo"] = (
          produto.preco_produto - produto.desconto_promocao
        );
      } else if (produto.tipo_promocao == 2) {
        produto["flag_promo"] = `${produto.desconto_promocao}% OFF`;
        produto["preco_produto_promo"] = (
          produto.preco_produto * (1 - produto.desconto_promocao / 100)
        );
      }
    }
    html += cardProduto(produto);
  });
  div.innerHTML = html;
}

async function getProdutos(filter = null) {
  let url = "Home-api";
  if (filter) {
    url += `?filtro=${filter}`;
  } else {
    url += `?ts=${Date.now()}`;
  }
  
  const request = await fetch(url);
  return await request.json();
}

document.addEventListener("DOMContentLoaded", async () => {
  const divsProdutos = document.querySelectorAll('.index_body_produtos_content');
  
  // novidades
  const divNovidades = divsProdutos[0];
  // descontos 
  const divDescontos = divsProdutos[1];
  // Seção 2: Mais Vendidos
  const divMaisVendidos = divsProdutos[2];

  const produtosNovidades = await getProdutos();
  renderProduto(divNovidades, produtosNovidades);

  const produtosDescontos = await getProdutos("promocao");
  renderProduto(divDescontos, produtosDescontos);

  const produtosMaisVendidos = await getProdutos("mais_vendidos");
  renderProduto(divMaisVendidos, produtosMaisVendidos);
});