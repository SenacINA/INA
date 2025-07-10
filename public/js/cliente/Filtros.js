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

async function getProdutosCategoria(categoria) {
  const formData = new FormData();

  formData.append("id_categoria", categoria);

  const request = await fetch("Categoria-api", {
    method: "POST",
    body: formData,
  });
  return await request.json();
}
async function getProdutosSubcategoria(subcategoria) {
  const formData = new FormData();

  formData.append("id_subcategoria", subcategoria);

  const request = await fetch("Subcategoria-api", {
    method: "POST",
    body: formData,
  });

  return await request.json();
}

document.addEventListener("DOMContentLoaded", async () => {
  const mensagem = sessionStorage.getItem("toast_mensagem");
  const tipo = sessionStorage.getItem("toast_tipo");

  if (mensagem && tipo) {
    gerarToast(mensagem, tipo);
    sessionStorage.removeItem("toast_mensagem");
    sessionStorage.removeItem("toast_tipo");
  }

  const dropdownToggle = document.querySelector(".dropdown-toggle");
  const filtros = document.querySelector(".filtros");
  const filterContainers = document.querySelectorAll(".container_filtro");

  if (dropdownToggle) {
    dropdownToggle.addEventListener("click", function () {
      filtros.classList.toggle("active");
      this.querySelector("img").classList.toggle("rotated");
    });
  }

  filterContainers.forEach((container) => {
    const titulo = container.querySelector(".titulo_filtro");

    titulo.addEventListener("click", () => {
      if (window.innerWidth > 1024 || filtros.classList.contains("active")) {
        container.classList.toggle("active_filter");
      }
    });
  });

  document.addEventListener("click", function (e) {
    if (
      !e.target.closest(".mobile-filters-dropdown") &&
      !e.target.closest(".filtros")
    ) {
      if (filtros) {
        filtros.classList.remove("active");
        if (dropdownToggle) {
          dropdownToggle.querySelector("img").classList.remove("rotated");
        }
      }
    }
  });

  const divCategoria = document.getElementById("produtos_categoria_div");

  let produtos = "";

  const idCategoria = divCategoria.dataset.id;
  const idSubcategoria = divCategoria.dataset.idSubcategoria;

  if (idCategoria) {
    produtos = await getProdutosCategoria(idCategoria);
  } else {
    produtos = await getProdutosSubcategoria(idSubcategoria);
    if (produtos.length === 0) {
      sessionStorage.setItem("toast_mensagem", "Está subcategoria está vazia");
      sessionStorage.setItem("toast_tipo", "erro");
      history.back();
      return;
    }
  }

  renderProduto(divCategoria, produtos);
});
