document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('fileInputFoto').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('imgPreviewFoto').src = event.target.result;
                document.getElementById('miniPfp').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('fileInputBanner').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('imgPreviewBanner').src = event.target.result;
                document.getElementById('miniBanner').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
})


document.addEventListener('DOMContentLoaded', () => {
  const btnSalvar = document.getElementById('salvarEdit');
  if (!btnSalvar) return;

  // converte File → WebP dataURL
  async function toWebpDataURL(file, quality = 0.8) {
    // cria um bitmap para desenhar no canvas
    const bitmap = await createImageBitmap(file);
    const canvas = document.createElement('canvas');
    canvas.width  = bitmap.width;
    canvas.height = bitmap.height;
    const ctx = canvas.getContext('2d');
    ctx.drawImage(bitmap, 0, 0);
    // retorna DataURL em webp
    return canvas.toDataURL('image/webp', quality);
  }

  btnSalvar.addEventListener('click', async e => {
    e.preventDefault();

    const nome       = document.getElementById('nomeCliente').value.trim();
    const fotoFile   = document.getElementById('fileInputFoto').files[0];
    const bannerFile = document.getElementById('fileInputBanner').files[0];
    const localizacao = document.getElementById('localizacaoSelect').value;
    const [uf, cidade] = localizacao.split('-').map(s => s.trim());
    const errors     = [];

    if (!nome)   errors.push('O nome não pode ficar em branco.');

    if (!nome)   errors.push('O nome não pode ficar em branco.');
    if (!localizacao || !uf || !cidade) errors.push('Selecione uma localização válida.');


    const isValidImage = f => f && ['image/jpeg','image/png','image/webp'].includes(f.type);
    if (fotoFile   && !isValidImage(fotoFile))   errors.push('Foto deve ser JPG/PNG/WebP.');
    if (bannerFile && !isValidImage(bannerFile)) errors.push('Banner deve ser JPG/PNG/WebP.');

    if (errors.length) {
      errors.forEach(msg => gerarToast(msg, 'erro'));
      return;
    }

    let fotoData   = null;
    let bannerData = null;

    try {
      if (fotoFile && isValidImage(fotoFile))   fotoData   = await toWebpDataURL(fotoFile, 0.8);
      if (bannerFile && isValidImage(bannerFile)) bannerData = await toWebpDataURL(bannerFile, 0.8);
    } catch (err) {
      gerarToast('Falha ao processar imagem.', 'erro');
      return;
    }

    // se não enviou nova imagem, deixe null e o servidor manterá a atual
    try {
      const resp = await fetch('/INA/api/cliente/editarDadosCliente', {
        method:  'POST',
        headers: {'Content-Type':'application/json'},
        body:    JSON.stringify({
          nomeCliente:        nome,
          ufCliente:          uf,
          cidadeCliente:      cidade,
          foto:               fotoData,
          banner:             bannerData
        })
      });
      const json = await resp.json();
      if (json.success) {
        gerarToast(json.message, 'sucesso');
        setTimeout(() => location.reload(), 800);
      } else {
        (json.errors||[]).forEach(msg => gerarToast(msg,'erro'));
      }
    } catch (err) {
      gerarToast('Erro de conexão, tente novamente.', 'erro');
    }
  });
});
