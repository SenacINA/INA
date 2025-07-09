import cards from "/INA/app/components/js/card_produto.js";

function renderProduto(div, produtos) {
  let html = "";
  produtos.forEach((produto) => {
    html += cards.cardProduto(produto);
  });
  div.innerHTML = html;
}

async function getProdutos(id_vendedor, cliente = false) {
  const formData = new FormData();
  formData.append("id_vendedor", id_vendedor);
  let request = "";
  if (cliente == "true") {
    request = await fetch("ProdutosVendedorCliente", {
      method: "POST",
      body: formData,
    });
  } else {
    formData.append("isCliente", cliente);
    request = await fetch("ProdutosVendedor", {
      method: "POST",
      body: formData,
    });
  }

  return await request.json();
}

async function getProdutosDestaques(id_vendedor, cliente) {
  const formData = new FormData();
  formData.append("id_vendedor", id_vendedor);
  if (cliente == true) {
    const request = await fetch("DestaquesVendedor", {
      method: "POST",
    });

    return await request.json();
  } else {
    const request = await fetch("DestaquesVendedor", {
      method: "POST",
      body: formData,
    });

    return await request.json();
  }
}

document.addEventListener("DOMContentLoaded", async () => {
  const divDestaques = document.getElementById("destaques_itens");
  const divVendedor = document.getElementById("produtos_vendedor");
  
  let produtos = "";
  
  if (divVendedor.dataset.cliente == "true") {
    produtos = await getProdutos(
      divVendedor.dataset.id,
      divVendedor.dataset.cliente
    );
  } else {
    produtos = await getProdutos(divVendedor.dataset.id);
  }

  const produtosDestaques = await getProdutosDestaques(divDestaques.dataset.id);

  if (produtosDestaques.length == 0) {
    const divDestaquesVazio = document.getElementById("destaques_container");
    divDestaquesVazio.style.display = "none";
  } else {
    renderProduto(divDestaques, produtosDestaques);
  }

  renderProduto(divVendedor, produtos);
});
