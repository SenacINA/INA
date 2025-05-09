import { getUfCidade } from "./getUfCidade.js";

document.addEventListener("DOMContentLoaded", async () => {
  const select = document.getElementById("localizacaoSelect");

  if (!select) {
    console.error("Elemento select não encontrado!");
    return;
  }

  try {
    const dados = await getUfCidade();

    // Limpa opções exceto a primeira
    while (select.options.length > 1) select.remove(1);

    // Popula com UF - Cidade ordenado
    dados.forEach((estado) => {
      estado.cidades.forEach((cidade) => {
        select.add(
          new Option(
            `${estado.uf} - ${cidade.nome}`,
            `${estado.uf}-${cidade.id}` // Sugestão: valor combinando UF + ID
          )
        );
      });
    });
  } catch (error) {
    console.error("Falha ao carregar localizações:", error);
    select.disabled = true; // Desativa o select em caso de erro
  }
});
