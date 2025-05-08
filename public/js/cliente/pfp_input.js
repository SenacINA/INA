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
  
    btnSalvar.addEventListener('click', async e => {
      e.preventDefault();
  
      const nome   = document.getElementById('nomeCliente').value.trim();
      const cidade = document.getElementById('localizacaoCliente').value;
      const fotoFile   = document.getElementById('fileInputFoto').files[0];
      const bannerFile = document.getElementById('fileInputBanner').files[0];
      const errors = [];
  
      if (!nome)   errors.push('O nome não pode ficar em branco.');
      if (!cidade) errors.push('Selecione uma localização.');
  
      const isValidImage = f => f && ['image/jpeg','image/png','image/webp'].includes(f.type);
      if (fotoFile   && !isValidImage(fotoFile))   errors.push('Foto deve ser JPG/PNG/WebP.');
      if (bannerFile && !isValidImage(bannerFile)) errors.push('Banner deve ser JPG/PNG/WebP.');
  
      // lê só se tiver arquivo
      const toDataURL = file => new Promise((res, rej) => {
        const r = new FileReader();
        r.onload  = () => res(r.result);
        r.onerror = () => rej('Falha ao ler arquivo');
        r.readAsDataURL(file);
      });
  
      let fotoData = null, bannerData = null;
      try {
        if (fotoFile && isValidImage(fotoFile))   fotoData   = await toDataURL(fotoFile);
        if (bannerFile && isValidImage(bannerFile)) bannerData = await toDataURL(bannerFile);
      } catch (err) {
        errors.push(err);
      }
  
      if (errors.length) {
        errors.forEach(msg => gerarToast(msg, 'erro'));
        return;
      }
  
      try {
        const resp = await fetch('/INA/api/cliente/editarDadosCliente', {
          method:  'POST',
          headers: {'Content-Type':'application/json'},
          body:    JSON.stringify({
            nomeCliente:        nome,
            localizacaoCliente: cidade,
            foto:               fotoData,
            banner:             bannerData
          })
        });
        const json = await resp.json();
        if (json.success) {
          gerarToast(json.message, 'sucesso');
          // opcional: força recarregar pra pegar blobs atualizados
          setTimeout(() => location.reload(), 800);
        } else {
          (json.errors||[]).forEach(msg => gerarToast(msg,'erro'));
        }
      } catch (err) {
        gerarToast('Erro de conexão, tente novamente.', 'erro');
      }
    });
  });
  

