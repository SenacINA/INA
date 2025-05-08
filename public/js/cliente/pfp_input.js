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

        if (!nome) errors.push('O nome não pode ficar em branco.');
        if (!cidade) errors.push('Selecione uma localização.');

        // Função para validar o tipo de arquivo
        const isValidImage = file => {
            return file && ['image/jpeg', 'image/png', 'image/webp'].includes(file.type);
        };

        if (fotoFile && !isValidImage(fotoFile)) errors.push('O arquivo de foto deve ser uma imagem válida (JPEG, PNG ou WEBP). GIF não é permitido.');
        if (bannerFile && !isValidImage(bannerFile)) errors.push('O arquivo de banner deve ser uma imagem válida (JPEG, PNG ou WEBP). GIF não é permitido.');

        // Função para converter arquivo em Base64
        const toDataURL = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = () => reject('Falha ao ler o arquivo');
            reader.readAsDataURL(file);
        });

        let fotoData = null;
        let bannerData = null;

        try {
            if (fotoFile && isValidImage(fotoFile)) fotoData = await toDataURL(fotoFile);
            if (bannerFile && isValidImage(bannerFile)) bannerData = await toDataURL(bannerFile);
        } catch (err) {
            errors.push(err);
        }

        if (errors.length) {
            errors.forEach(msg => gerarToast(msg, 'erro'));
            return;
        }

        if (!fotoData) fotoData = document.getElementById('miniPfp').src;
        if (!bannerData) bannerData = document.getElementById('miniBanner').src;

        if (fotoData === './public/') {
            return;
        }
        if (bannerData === './public/') {
            return;
        }

        try {
            const resp = await fetch('/INA/api/cliente/editarDadosCliente', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    nomeCliente: nome,
                    localizacaoCliente: cidade,
                    foto: fotoData,
                    banner: bannerData
                })
            });

            const json = await resp.json();

            if (json.success && json.foto && json.banner && json.foto !== './public/' && json.banner !== './public/') {
                gerarToast('Perfil atualizado com sucesso!', 'sucesso');

                document.getElementById('miniPfp').src = json.foto;
                document.getElementById('miniBanner').src = json.banner;
            } else {
                gerarToast('Falha ao atualizar perfil. Verifique os arquivos enviados.', 'erro');
            }
        } catch (err) {
            gerarToast('Erro de conexão, tente novamente.', 'erro');
        }
    });
});
