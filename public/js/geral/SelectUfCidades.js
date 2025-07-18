import { GetUfCidades } from "./GetUfCidades.js";

document.addEventListener("DOMContentLoaded", async () => {
  const select = document.getElementById("localizacaoSelect");

  if (!select) {
    console.error("Elemento select não encontrado!");
    return;
  }

  try {
    const dados = await GetUfCidades();
    
    // Limpa opções exceto a primeira
    while (select.options.length > 1) select.remove(1);

    // Popula com UF - Cidade ordenado
    dados.forEach((estado) => {
      estado.cidades.forEach((cidade) => {
        select.add(
          new Option(
            `${estado.uf} - ${cidade.nome}`,
            `${estado.uf}-${cidade.nome}` // Valor enviado ao backend
          )
        );
      });
    });
  } catch (error) {
    console.error("Falha ao carregar localizações:", error);
    select.disabled = true; // Desativa o select em caso de erro
  }
});
