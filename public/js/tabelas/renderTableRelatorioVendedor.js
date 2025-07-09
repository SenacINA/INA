document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector(".relatorio_vendedor_forms");
  const perfilHolder = document.getElementById("perfil-vendedor");
  const nomeEl = document.getElementById("nome");
  const fotoPerfilEl = document.querySelector(".relatorio_vendedor_card_img_perfil");
  const campoNome = document.getElementById("campo-nome");
  const campoEmail = document.getElementById("campo-email");
  const campoData = document.getElementById("campo-data");
  const tbody = document.querySelector("table tbody");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const vendedorId = form.querySelector('input[name="vendedor_id"]').value.trim();

    if (!vendedorId) {
      alert("Por favor, insira o ID do vendedor.");
      return;
    }

    try {
      const response = await fetch("/INA/RelatorioVendedor-api", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({ vendedor_id: vendedorId }),
      });

      if (!response.ok) throw new Error("Erro na requisição");

      const data = await response.json();

      if (data.error || !data.perfil) {
        alert(data.error || "Vendedor não encontrado.");
        if (perfilHolder) perfilHolder.style.display = "none";
        tbody.innerHTML = "";
        return;
      }
      
      if (perfilHolder) {
        perfilHolder.style.display = "flex"; 

        nomeEl.textContent = data.perfil.nome;
        fotoPerfilEl.src =
          data.perfil.foto_perfil && data.perfil.foto_perfil !== ""
            ? data.perfil.foto_perfil
            : "/image/default-profile.png";
        campoNome.textContent = data.perfil.nome;
        campoEmail.textContent = data.perfil.email;
        campoData.textContent = data.perfil.data_cadastro
          ? new Date(data.perfil.data_cadastro).toLocaleDateString("pt-BR")
          : "";
      }

      // Atualiza a tabela de vendas
      tbody.innerHTML = "";
      data.vendas.forEach((venda) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${venda.id}</td>
          <td>${venda.produto}</td>
          <td>R$ ${parseFloat(venda.preco).toFixed(2)}</td>
          <td>${venda.quantidade}</td>
          <td>${venda.status}</td>
          <td>${venda.cliente}</td>
        `;
        tbody.appendChild(tr);
      });
    } catch (error) {
      alert("Erro ao buscar dados. Tente novamente.");
      console.error(error);
    }
  });
});
