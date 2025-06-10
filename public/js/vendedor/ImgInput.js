let totalImagens = 0;

// Função para validar tipos de imagem
function isValidImage(file) {
  return file && ['image/jpeg', 'image/png', 'image/webp'].includes(file.type);
}

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
    
    // Verifica se o tipo de imagem é válido
    if (!isValidImage(blob)) {
      gerarToast("Formato de imagem inválido. Use JPG, PNG, WebP, GIF ou SVG.", "erro");
      return null;
    }
    
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
      // Valida o tipo do arquivo
      if (!isValidImage(file)) {
        gerarToast("Formato de imagem inválido. Use JPG, PNG, WebP", "erro");
        continue; // Pula para o próximo arquivo
      }
      
      try {
        const webpData = await convertImageToWebP(file);
        const img = document.createElement("img");
        img.src = webpData;
        div.appendChild(img);
        totalImagens++;
        atualizarContadores();
      } catch (e) {
        console.error("Erro ao processar imagem:", e);
        gerarToast("Erro ao processar imagem. Tente novamente.", "erro");
      }
    }
  }
  
  event.target.value = '';
});

async function adicionarImagemPorURL(event) {
  if(event) event.preventDefault();
  
  const url = document.getElementById("input-url").value;
  if (!url) return;
  
  try {
    const webpData = await convertUrlToWebP(url);
    if (!webpData) return;
    
    const img = document.createElement("img");
    img.src = webpData;
    document.querySelector(".registro_produto_imagens").appendChild(img);
    totalImagens++;
    atualizarContadores();
    document.getElementById("input-url").value = "";
    
  } catch (e) {
    console.error("Erro ao carregar imagem por URL:", e);
    gerarToast("Erro ao carregar imagem. Use um link direto para uma imagem.", "erro");
  }
}

function atualizarContadores() {
  document.getElementById("contador-total").innerText = `${totalImagens} `;
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

document.addEventListener('DOMContentLoaded', () => {
  
  document.querySelector('.url-add-button')?.addEventListener('click', adicionarImagemPorURL);
  
  document.getElementById('input-url')?.addEventListener('keypress', (e) => {
    if(e.key === 'Enter') {
      adicionarImagemPorURL(e);
    }
  });
});
