let totalImagens = 0;

document
  .getElementById("input-file")
  .addEventListener("change", function (event) {
    const files = event.target.files;
    const div = document.querySelector(".registro_produto_imagens");

    Array.from(files).forEach((file) => {
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.createElement("img");
          img.src = e.target.result;
          div.appendChild(img);
          totalImagens++;
          atualizarContadores();
        };
        reader.readAsDataURL(file);
      }
    });
  });

function adicionarImagemPorURL() {
  const url = document.getElementById("input-url").value;
  if (url) {
    const img = document.createElement("img");
    img.src = url;
    const div = document.querySelector(".registro_produto_imagens");
    div.appendChild(img);
    totalImagens++;
    atualizarContadores();
    document.getElementById("input-url").value = "";
  }
}

function atualizarContadores() {
  document.getElementById("contador-total").innerText = `${totalImagens} `;
}

function toolbarButton(e) {
  e.preventDefault();
}
// img_input.js
function coletarImagensParaEnvio() {
  const imagens = document.querySelectorAll('.registro_produto_imagens img');
  const imagensBase64 = [];
  
  imagens.forEach(img => {
      if (img.src.startsWith('data:image')) {
          imagensBase64.push(img.src);
      }
  });
  
  document.getElementById('produto-imagens').value = JSON.stringify(imagensBase64);
}

// Vincule ao submit do formulário
document.querySelector('form').addEventListener('submit', function(e) {
  coletarImagensParaEnvio();
});

