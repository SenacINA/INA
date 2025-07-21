import cardProduto from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
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
