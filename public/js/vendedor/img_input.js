let totalImagens = 0;

// Função para converter imagens para WebP
function convertImageToWebP(file) {
  return new Promise((resolve) => {
    const reader = new FileReader();
    reader.onload = function(e) {
      const img = new Image();
      img.onload = function() {
        const canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0);
        
        // Converte para WebP com 80% de qualidade
        const webpData = canvas.toDataURL('image/webp', 0.8);
        resolve(webpData);
      };
      img.src = e.target.result;
    };
    reader.readAsDataURL(file);
  });
}

// Função para converter URL para WebP
async function convertUrlToWebP(url) {
  try {
    const response = await fetch(url);
    const blob = await response.blob();
    return await convertImageToWebP(blob);
  } catch (e) {
    console.error("Erro ao converter imagem:", e);
    return null;
  }
}

document.getElementById("input-file").addEventListener("change", async function(event) {
  const files = event.target.files;
  const div = document.querySelector(".registro_produto_imagens");
  
  for (const file of files) {
    if (file) {
      try {
        const webpData = await convertImageToWebP(file);
        const img = document.createElement("img");
        img.src = webpData;
        div.appendChild(img);
        totalImagens++;
        atualizarContadores();
      } catch (e) {
        console.error("Erro ao processar imagem:", e);
      }
    }
  }
});

async function adicionarImagemPorURL() {
  const url = document.getElementById("input-url").value;
  if (url) {
    try {
      const webpData = await convertUrlToWebP(url);
      if (webpData) {
        const img = document.createElement("img");
        img.src = webpData;
        const div = document.querySelector(".registro_produto_imagens");
        div.appendChild(img);
        totalImagens++;
        atualizarContadores();
        document.getElementById("input-url").value = "";
      }
    } catch (e) {
      console.error("Erro ao carregar imagem por URL:", e);
      alert("Não foi possível carregar a imagem. Use um link direto para uma imagem.");
    }
  }
}

function atualizarContadores() {
  document.getElementById("contador-total").innerText = `${totalImagens} `;
}

function toolbarButton(e) {
  e.preventDefault();
}

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
  
  // Adiciona pequeno delay para garantir o processamento
  setTimeout(() => true, 100);
});