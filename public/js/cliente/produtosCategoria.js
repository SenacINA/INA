import cardProduto from "./public/components/js/card_produto.js";

function renderProduto(div, produtos) {
  produtos.forEach(produto => {
    div.innerHTML += cardProduto(produto)
  });
}

async function getProdutosCategoria(categoria) {
  const formData = new FormData();
  
  formData.append("id_categoria", categoria)
  
  const request = await fetch("categorias-api", {
    method: "POST",
    body: formData
  });

  const json = await request.json();

  return json
}

document.addEventListener("DOMContentLoaded", async () => {
  const divCategoria = document.getElementById("produtos_categoria_div");
  
  const produtos = await getProdutosCategoria(divCategoria.dataset.id);
  renderProduto(divCategoria, produtos);
})
