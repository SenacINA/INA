import cardProduto from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
    html += cardProduto(produto);
  });
  div.innerHTML = html;
}

async function getProdutos(param) {
  const formData = new FormData();
  formData.append("pesquisa", param);
  const request = await fetch("Pesquisa-api", {
    method: "POST",
    body: formData,
  });
  return await request.json();
}

document.addEventListener("DOMContentLoaded", async () => {
  const divProdutos = document.getElementById("produto_container");
  let params = new URLSearchParams(document.location.search);
  let search = params.get("pesquisa");
  if (search.length == 0) {
    gerarToast("A pesquisa não pode ser vazia", "erro");
  } else {
    const produtos = await getProdutos(search);
    if (produtos.length == 0) {
      var p = document.createElement("p");
      p.textContent = "Nenhum produto encontrado";
      p.className = "font_bold font_subtitulo font_carolina";
      divProdutos.append(p);
    } else {
      renderProduto(divProdutos, produtos);
    }
  }
});
