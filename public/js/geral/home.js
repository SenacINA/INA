import cardProduto from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
    html += cardProduto(produto);
  });
  div.innerHTML = html;
}

async function getProdutos() {
  const request = await fetch("Home-api?ts=" + Date.now());
  return await request.json();
}

document.addEventListener("DOMContentLoaded", async () => {
  const divNovidades = document.getElementById("div_novidades");
  const produtos = await getProdutos();
  renderProduto(divNovidades, produtos);
});
