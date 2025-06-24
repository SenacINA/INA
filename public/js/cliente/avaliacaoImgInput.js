// Configurações globais
const MAX_IMAGENS = 5;
let totalImagens = 0;

// Função para inicializar o sistema de imagens
function initImageUploadSystem() {
    const inputFile = document.getElementById("input-file");
    const container = document.querySelector(".registro_produto_imagens");
    
    if (!inputFile || !container) return;
    
    // Evento para upload de arquivos
    inputFile.addEventListener("change", handleFileUpload);
    
    // Event delegation para remover imagens
    container.addEventListener("click", function(e) {
        if (e.target.closest('.remove-image-btn')) {
            removerImagem(e);
        }
    });
}

// Função principal para upload de arquivos
async function handleFileUpload(event) {
    const files = event.target.files;
    const container = document.querySelector(".registro_produto_imagens");
    
    // Verifica limite máximo
    if (totalImagens + files.length > MAX_IMAGENS) {
        gerarToast('Limite de 5 imagens atingido', 'erro');
        event.target.value = '';
        return;
    }
    
    for (const file of files) {
        if (totalImagens >= MAX_IMAGENS) break;
        
        try {
            if (!isValidImage(file)) {
                gerarToast("Formato de imagem inválido. Use JPG, PNG ou WebP", "erro");
                continue;
            }
            
            const webpData = await convertImageToWebP(file);
            addImageToContainer(webpData);
            totalImagens++;
            atualizarContadores();
            
        } catch (error) {
            console.error("Erro ao processar imagem:", error);
            gerarToast("Erro ao processar imagem. Tente novamente.", "erro");
        }
    }
    
    event.target.value = '';
}

// Adiciona imagem ao container
function addImageToContainer(imageData) {
    const container = document.querySelector(".registro_produto_imagens");
    
    // Cria botão container
    const button = document.createElement('button');
    button.className = 'remove-image-btn';
    button.type = 'button';
    button.title = 'Remover imagem';
    
    // Cria elemento de imagem
    const img = document.createElement('img');
    img.src = imageData;
        
    button.appendChild(img);
    container.appendChild(button);
}

// Função para remover imagem
function removerImagem(event) {
    const button = event.target.closest('.remove-image-btn');
    if (button) {
        button.remove();
        totalImagens--;
        atualizarContadores();
    }
}

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
                resolve(canvas.toDataURL('image/webp', 0.8));
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
}

// Atualiza contadores
function atualizarContadores() {
    const contadorTotal = document.getElementById("contador-total");
    if (contadorTotal) {
        contadorTotal.textContent = totalImagens;
    }
}

// Inicializa o sistema quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', initImageUploadSystem);