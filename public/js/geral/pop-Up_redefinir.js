const btn = document.getElementById('continuar_button');
const close_btn = document.getElementById('close_btn');
const popup = document.getElementById('popup');

btn.addEventListener("click", async () => {
  const email = document.getElementById("email-senha").value;

  if (!email) {
    alert("Por favor, preencha o e-mail.");
    return;
  }

  const formData = new FormData();
  formData.append("email", email);

  try {
    const res = await fetch("redefinir-senha-api", {
      method: "POST",
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: formData,
      credentials: 'include' // 🔥 Obrigatório para sessão funcionar corretamente
    });
    

    const data = await res.json();

    // Aqui corrigido: Se veio um link, mostra o link
    if (data.link) {
      document.querySelector(".text_popup p").innerHTML = `
        ${data.mensagem}<br><br>
        <a href="${data.link}" class="base_botao btn_blue" id="close_btn" >Redefinir Senha</a>
      `;
    } else {
      document.querySelector(".text_popup p").innerText = data.mensagem;
    }

    popup.style.display = 'flex';

  } catch (error) {
    alert("Erro ao enviar solicitação.");
    console.error(error);
  }
});

close_btn.addEventListener('click', function () {
  popup.style.display = 'none';
});
