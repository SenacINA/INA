import cardProduto from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
    html += cardProduto(produto);
  });
  div.innerHTML = html;
}

async function getProdutos(id_vendedor) {
  const formData = new FormData;
  formData.append("id_vendedor", id_vendedor);

  const request = await fetch("ProdutosVendedor", {
    method: "POST",
    body: formData
  });

  return await request.json();
}

document.addEventListener("DOMContentLoaded", async () => {
  const divVendedor = document.getElementById("produtos_vendedor");
  const produtos = await getProdutos(divVendedor.dataset.id);
  renderProduto(divVendedor, produtos);
});
