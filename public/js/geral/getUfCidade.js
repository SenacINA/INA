export async function getUfCidade() {
  const ufUrl = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
  try {
    const ufResponse = await fetch(ufUrl);
    if (!ufResponse.ok) {
      throw new Error("Erro ao buscar estados");
    }
    let states = await ufResponse.json();

    // Ordena os estados pela sigla
    states.sort((a, b) => a.sigla.localeCompare(b.sigla));

    // Para cada estado, busca suas cidades e as ordena
    const ufCities = await Promise.all(
      states.map(async (state) => {
        const citiesUrl = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${state.sigla}/municipios`;
        const citiesResponse = await fetch(citiesUrl);
        if (!citiesResponse.ok) {
          throw new Error(
            `Erro ao buscar cidades para o estado ${state.sigla}`
          );
        }
        let cities = await citiesResponse.json();

        cities.sort((a, b) => a.nome.localeCompare(b.nome));

        return {
          uf: state.sigla,
          cidades: cities.map((city) => ({ id: city.id, nome: city.nome })),
        };
      })
    );

    return ufCities;
  } catch (error) {
    console.error(error);
    return [];
  }
}
