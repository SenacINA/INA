var PATH_PUBLIC = "./public";

const carrossel = (categorias) => {
  const carrossel = `
        <div class="carrossel_content">
            <button class="carrossel_but back">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                </svg>
            </button>
            <div class="carousel-container">
                <div class="carousel-wrapper">
                    <img id="carrossel_image" alt="Imagem Carrossel">
                </div>
            </div>
            <button class="carrossel_but forward">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 19h18a1.002 1.002 0 0 0 .823-1.569l-9-13c-.373-.539-1.271-.539-1.645 0l-9 13A.999.999 0 0 0 3 19"/>
                </svg>
            </button>
        </div>
        <div class="carrossel_nav">
            <button class="active" onclick="currentSlide(0)"></button>
            <button onclick="currentSlide(1)"></button>
            <button onclick="currentSlide(2)"></button>
            <button onclick="currentSlide(3)"></button>
        </div>
        <form method="POST" action="FiltrarCategoria" class="categorias_nav">`;

  let categoriaArray = [];

  categorias.forEach((categoria) => {
    categoriaArray.push(`<button value="${categoria["id_categoria"]}" name="${categoria["nome_categoria"]}" class="categorias_block">
<img src="${PATH_PUBLIC}${categoria["endereco_imagem_categoria"]}" alt="">
<p>${categoria["nome_categoria"]}</p>
</button>`);
  });

  return carrossel + categoriaArray.join("") + "</form>";
};

export default carrossel;
