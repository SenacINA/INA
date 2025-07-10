import cardProduto from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
    if (produto.desconto_promocao > 0) {
      if (produto.tipo_promocao == 1) {
        // reais sobre total
        produto["flag_promo"] = `- R$${produto.desconto_promocao}`;
        produto["preco_produto_promo"] = (
          produto.preco_produto - produto.desconto_promocao
        );
      } else if (produto.tipo_promocao == 2) {
        // porcentagem sobre total
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
  var request;
  switch (filter) {
    case "mais_vendidos":
      request = await fetch("Home-api?filtro=mais_vendidos");
      break;
    case "promocao":
      request = await fetch("Home-api?filtro=promocao");
      break;
    default:
      request = await fetch("Home-api?ts=" + Date.now());
  }

  return await request.json();
}

document.addEventListener("DOMContentLoaded", async () => {
  const divHistorico = document.getElementById("historico_cliente");
  const produtos = await getProdutos();
  renderProduto(divHistorico, produtos);
});
