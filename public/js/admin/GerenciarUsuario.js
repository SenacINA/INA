console.log('Script de Gerenciar Usuários carregado');

document.addEventListener('DOMContentLoaded', function() {
    const buttonDesativar = document.getElementById("disable_button");
    const popupDesativar = document.getElementById("popup_desativar");
    const fecharPopup = document.getElementById("close_btn");
    const confirmarPopup = document.getElementById("confirmar_desativar");

    if (buttonDesativar && popupDesativar && fecharPopup && confirmarPopup) {

        buttonDesativar.addEventListener("click", function(e) {
            e.preventDefault();
            popupDesativar.classList.add('abrir');
        });


        fecharPopup.addEventListener("click", function() {
            popupDesativar.classList.remove('abrir');
        });


        popupDesativar.addEventListener("click", function(e) {
            if (e.target === popupDesativar) {
                popupDesativar.classList.remove('abrir');
            }
        });


        confirmarPopup.addEventListener("click", function() {
            const nome = document.getElementById("nome_cliente").innerText;
            const email = document.getElementById("email_cliente").innerText;
            const cargo = 
                document.getElementById("cargo_cliente").innerText == "Admin" ? 0 :
                document.getElementById("cargo_cliente").innerText == "Vendedor" ? 1 : 2;

            let formData = new FormData();
            formData.append("nome", nome);
            formData.append("email", email);
            formData.append("cargo", cargo);

            sendData(formData).then(() => {
                popupDesativar.classList.remove('abrir');
                window.location.reload();
            }).catch(error => {
                console.error('Erro ao desativar usuário:', error);
                popupDesativar.classList.remove('abrir');
            });
        });

        async function sendData(formData) {
            try {
                const response = await fetch("DesativarUser", {
                    method: "POST",
                    body: formData,
                });
                
                if (!response.ok) {
                    throw new Error('Erro na requisição');
                }
                
                return await response;
            } catch (error) {
                console.error('Erro:', error);
                throw error;
            }
        }
    } else {
        console.error("Elementos necessários não encontrados no DOM:");
        if (!buttonDesativar) console.error("Botão desativar não encontrado");
        if (!popupDesativar) console.error("Popup desativar não encontrado");
        if (!fecharPopup) console.error("Botão fechar popup não encontrado");
        if (!confirmarPopup) console.error("Botão confirmar popup não encontrado");
    }
});