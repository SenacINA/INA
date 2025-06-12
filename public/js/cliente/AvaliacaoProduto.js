document.addEventListener('DOMContentLoaded', () => {
    const textarea = document.getElementById('comentario');
  
    if (!textarea) return; // evita erro se não achar o textarea
  
    textarea.addEventListener('input', () => {
      let linhas = textarea.value.split('\n');
  
      if (linhas.length > 3) {
        linhas = linhas.slice(0, 3);
        textarea.value = linhas.join('\n');
      }
  
      textarea.style.height = '23px';
      const alturaMax = 58;
      const novaAltura = textarea.scrollHeight;
  
      if (novaAltura <= alturaMax) {
        textarea.style.height = novaAltura + 'px';
      } else {
        textarea.style.height = alturaMax + 'px';
      }
    });
 
    const campos = document.querySelector('.avaliacao_container_campos');

    textarea.addEventListener('focus', () => {
        campos.style.display = 'grid';
    });

    document.addEventListener('click', (event) => {
        if (
            !textarea.contains(event.target) &&
            !campos.contains(event.target)
        ) {
            campos.style.display = 'none';
        }
    });

    textarea.addEventListener('focus', () => {
        campos.style.display = 'grid';
    });
});