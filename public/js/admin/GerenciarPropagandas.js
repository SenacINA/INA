function ajustarPaddingBodyContainer() {
  const container = document.querySelector('.gerenciar_propagandas_body_container');
  if (!container) return;

  const alturaConteudo = container.scrollHeight;

  if (alturaConteudo > 600) {
    container.style.paddingBottom = '200px';
  } else {
    container.style.paddingBottom = '16px';
  }
}

document.querySelectorAll('.upload_imagem input[type="file"]').forEach(input => {
  input.addEventListener('change', function () {
    const file = this.files[0];
    const container = this.closest('.upload_imagem');
    const sizeLabel = container.querySelector('.size_img');

    const existingImg = container.querySelector('img');
    if (existingImg) existingImg.remove();

    if (!file) {
      sizeLabel.textContent = '';
      sizeLabel.style.color = '';
      ajustarPaddingBodyContainer(); 
      return;
    }

    const img = new Image();
    const url = URL.createObjectURL(file);

    img.onload = () => {
      container.appendChild(img);

      const expectedSize = this.getAttribute('data-size'); 
      let [expectedWidth, expectedHeight] = expectedSize.split('x').map(n => parseInt(n, 10));

      sizeLabel.textContent = `${img.naturalWidth} x ${img.naturalHeight}`;

      const minWidth = expectedWidth * 0.8;
      const minHeight = expectedHeight * 0.8;

      if (img.naturalWidth < minWidth || img.naturalHeight < minHeight) {
        sizeLabel.style.color = 'red';
      } else {
        sizeLabel.style.color = 'green';
      }

      URL.revokeObjectURL(url);

      ajustarPaddingBodyContainer(); 
    };

    img.src = url;
  });
});
