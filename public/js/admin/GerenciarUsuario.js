

console.log('a')


document.addEventListener('DOMContentLoaded', function() {
    const buttonDesativar = document.getElementById("disable_button");
    const modal = document.getElementById("modal_desativar");
    const fecharModal = document.getElementById("modal_fechar");
    const confirmarModal = document.getElementById("modal_confirmar");


    if (buttonDesativar && modal && fecharModal && confirmarModal) {
        buttonDesativar.addEventListener("click", function(e) {
          console.log('asa')
            e.preventDefault();
            modal.style.display = "flex";
        });

        fecharModal.addEventListener("click", function() {
            modal.style.display = "none";
        });

        modal.addEventListener("click", function(e) {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });

        confirmarModal.addEventListener("click", function() {
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
                modal.style.display = "none";
                window.location.reload();
            });
        });

        async function sendData(formData) {
            return await fetch("DesativarUser", {
                method: "POST",
                body: formData,
            });
        }
    } else {
        console.error("Um ou mais elementos não foram encontrados no DOM");
    }
});