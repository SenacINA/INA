import cards from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
    html += cards.cardProduto(produto);
  });
  div.innerHTML = html;
}

async function getProdutos() {
  const request = await fetch("Home-api?ts=" + Date.now());
  return await request.json();
}

document.addEventListener("DOMContentLoaded", async () => {
  const divHistorico = document.getElementById("historico_cliente");
  const produtos = await getProdutos();
  renderProduto(divHistorico, produtos);
});
