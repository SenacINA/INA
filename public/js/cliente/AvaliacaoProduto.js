document.addEventListener('DOMContentLoaded', () => {
  const textarea = document.getElementById('comentario');
  const campos = document.querySelector('.avaliacao_container_campos');
  const form = document.getElementById('formAvaliacao');

  if (!textarea || !campos || !form) return;

  // Ajusta altura do textarea com no máximo 3 linhas
  textarea.addEventListener('input', () => {
    let linhas = textarea.value.split('\n');

    if (linhas.length > 3) {
      linhas = linhas.slice(0, 3);
      textarea.value = linhas.join('\n');
    }

    textarea.style.height = '23px';
    const alturaMax = 58;
    const novaAltura = textarea.scrollHeight;

    textarea.style.height = Math.min(novaAltura, alturaMax) + 'px';
  });

  // Exibe os campos ao focar
  textarea.addEventListener('focus', () => {
    campos.style.display = 'grid';
  });

  let fecharTimeout;

  // Fecha apenas se o clique for fora de todo o formulário
  function tentarFecharCampos(event) {
    if (!form.contains(event.target)) {
      fecharTimeout = setTimeout(() => {
        campos.style.display = 'none';
      }, 150);
    }
  }

  function cancelarFechamento() {
    clearTimeout(fecharTimeout);
  }

  // Usa pointerdown para detectar antes de perder o foco
  document.addEventListener('pointerdown', tentarFecharCampos);
  form.addEventListener('pointerdown', cancelarFechamento);
});
