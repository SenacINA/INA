const btn = document.getElementById('continuar_button');
const close_btn = document.getElementById('close_btn');
const popup = document.getElementById('popup');

document.getElementById("continuar_button").addEventListener("click", async () => {
  const email = document.getElementById("email-senha").value;

  if (!email) {
    alert("Por favor, preencha o e-mail.");
    return;
  }

  const formData = new FormData();
  formData.append("email", email);

  try {
    const res = await fetch("http://localhost/INA/app/controllers/geral/enviar_token.php", {
      method: "POST",
      body: formData
    });

    const data = await res.json();

    document.querySelector(".text_popup p").innerText = data.mensagem;
    document.getElementById("popup").style.display = "flex";
  } catch (error) {
    alert("Erro ao enviar solicitação.");
    console.error(error);
  }
});

close_btn.addEventListener('click', function () {
  popup.style.display = 'none';
});
