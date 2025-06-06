document.addEventListener("DOMContentLoaded", function() {
    const btnSalvar = document.getElementById('salvarEdit');
    if (!btnSalvar) return;

    async function toWebpDataURL(file, quality = 0.8) {
        const bitmap = await createImageBitmap(file);
        const canvas = document.createElement('canvas');
        canvas.width  = bitmap.width;
        canvas.height = bitmap.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(bitmap, 0, 0);
        return canvas.toDataURL('image/webp', quality);
      }


      btnSalvar.addEventListener('click', async e => {
        e.preventDefault();
    
        const nome       = document.getElementById('nomeAdmin').value.trim();
        const email       = document.getElementById('emailAdmin').value.trim();
        const telefone       = document.getElementById('telefoneAdmin').value.trim();
        const fotoFile   = document.getElementById('fileInputFoto').files[0];
        const errors     = [];
    
        if (!nome)   errors.push('O nome não pode ficar em branco.');
    
        if (!email)   errors.push('O e-mail não pode ficar em branco.');

        if (!telefone)   errors.push('O telefone não pode ficar em branco.');

        const isValidImage = f => f && ['image/jpeg','image/png','image/webp'].includes(f.type);
        if (fotoFile   && !isValidImage(fotoFile))   errors.push('Foto deve ser JPG/PNG/WebP.');
    
        if (errors.length) {
          errors.forEach(msg => gerarToast(msg, 'erro'));
          return;
        }
    
        let fotoData = null;
    
        try {
          if (fotoFile && isValidImage(fotoFile))   fotoData   = await toWebpDataURL(fotoFile, 0.8);
        } catch (err) {
          gerarToast('Falha ao processar imagem.', 'erro');
          return;
        }

        try {
            const resp = await fetch('/INA/api/admin/editarDadosAdmin', {
              method:  'POST',
              headers: {'Content-Type':'application/json'},
              body:    JSON.stringify({
                nomeAdmin:        nome,
                email: email,
                telefone: telefone,
                foto: fotoData,

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
    })
});
