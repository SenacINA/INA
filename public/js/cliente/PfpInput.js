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

    if (document.getElementById('fileInputBanner')) {
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
    }

    
})



