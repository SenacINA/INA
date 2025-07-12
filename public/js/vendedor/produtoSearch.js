document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector(
    ".gerenciar_produtos_forms_pesquisa_pedidos"
  );
  const resultadoEl = document.querySelector(".resultado_pesquisa");
  const titleEl = resultadoEl.querySelector(".resultado_title");
  const imgEl = resultadoEl.querySelector(".resultado_img");
  const dadosEls = resultadoEl.querySelectorAll(".resultado_dados p");
  const buttonEditar = document.getElementById("editar_search");

  const params = new URLSearchParams(document.location.search);
  const adminParam = params.get("admin");
  const isAdmin = parseInt(adminParam);

  if (isAdmin) {
    buttonEditar.classList = "base_botao btn_red";
    buttonEditar.innerHTML =
      "<img class='base_icon' src='./public/image/geral/botoes/x_branco_icon.svg'></img> INATIVAR";
  }

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const inputs = form.querySelectorAll(".base_input");

    const name = inputs[0].value;
    const code = inputs[1].value;

    if (!name && !code) {
      gerarToast("Preencha pelo menos um dos campos para pesquisa", "erro");
      return;
    }

    try {
      const formData = new FormData();

      formData.append("name", name);
      formData.append("code", code);

      let params = new URLSearchParams(document.location.search);
      if (params.get("vendedor_id")) {
        let vendedorParam = params.get("vendedor_id");
        let vendedor_id = parseInt(vendedorParam);
        formData.append("vendedor_id", vendedor_id);
      }

      const res = await fetch("Search-product-api", {
        method: "POST",
        body: formData,
      });

      const json = await res.json();

      if (!json.success) {
        gerarToast(json.message || "Produto não encontrado", "erro");
        return;
      }

      atualizarResultadoProduto(json.data);
    } catch (err) {
      console.error(err);
      gerarToast("Erro ao buscar produto. Tente novamente", "erro");
    }
  });

  function atualizarResultadoProduto(produto) {
    const strong = titleEl.querySelector("strong");
    strong.textContent = produto.nome_produto;

    const textNode = Array.from(titleEl.childNodes).find(
      (n) => n.nodeType === Node.TEXT_NODE
    );
    if (textNode) {
      textNode.nodeValue = ` #${produto.cod_produto}`;
    } else {
      titleEl.append(` #${produto.cod_produto}`);
    }

    imgEl.src = "./public" + produto.endereco_imagem_produto;
    imgEl.alt = produto.nome_produto;

    if (isAdmin) {
      buttonEditar.disabled = produto.status_produto == 0 ? true : false;
      buttonEditar.onclick = () => {
        inativarProduto(produto.id, false);
      };
    } else {
      buttonEditar.disabled = false;
      buttonEditar.onclick = () => {
        window.location.href = `EditarProduto?id=${produto.id}`;
      };
    }

    if (dadosEls.length >= 3) {
      dadosEls[0].innerHTML = `<strong>Preço:</strong> R$${produto.preco_produto}`;
      dadosEls[1].innerHTML = `<strong>Quantidade:</strong> ${produto.quantidade}`;
      dadosEls[2].innerHTML = `<strong>Status:</strong> ${
        produto.status_produto ? "Ativo" : "Inativo"
      }`;
    }
  }

  async function inativarProduto(id, status) {
    const resp = await fetch("ProdutoStatus-api", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        id: id,
        status: status,
        admin: true,
      }),
    });

    const json = await resp.json();

    if (json.success) {
      gerarToast(json.message, "sucesso");
    } else {
      gerarToast(json.message, "erro");
    }
  }
});
