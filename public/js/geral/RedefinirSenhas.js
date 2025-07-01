
document.getElementById("continuar_button_senha").addEventListener("click", async () => {
    const senha = document.getElementById("senha").value;
    const confirmar = document.getElementById("confirmaSenha").value;
    const token = document.getElementById("token").value;

    const formData = new FormData();
    formData.append("senha", senha);
    formData.append("confirmaSenha", confirmar);
    formData.append("token", token);

    try {
        const res = await fetch("RedefinirSenha-api-salvar", {
            method: "POST",
            body: formData
        });

        const data = await res.json();
        if (data.success) {
            gerarToast(data.message, 'sucesso');
            setTimeout(() => {
                pag('/Login');
            }, 3000);
        } else if (data.errors && Array.isArray(data.errors)) {
            data.errors.forEach(error => gerarToast(error, 'erro'));
        } else {
            gerarToast('Erro desconhecido ao alterar senha.', 'erro');
        }
    } catch (error) {
        gerarToast('Erro ao conectar ao servidor.', 'erro');
        console.error(error);
    }
});
