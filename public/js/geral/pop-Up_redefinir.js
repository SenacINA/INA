const btn = document.getElementById('continuar_button');
const popup = document.getElementById('popup');
const PATH_PUBLIC = './public';

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
      credentials: 'include'
    });

    const data = await res.json();

    if (data.link) {
      document.querySelector(".text_popup p").innerHTML = `
        ${data.mensagem}<br><br>
        <a href="${data.link}" class="base_botao btn_blue" id="close_btn">
          <img src="${PATH_PUBLIC}/image/geral/botoes/v_branco_icon.svg" alt="">
          Ok
        </a>
      `;

      // Re-adiciona o event listener porque o botão foi recriado
      document.getElementById('close_btn').addEventListener('click', function () {
        popup.style.display = 'none';
      });
    } else {
      document.querySelector(".text_popup p").innerText = data.mensagem;
    }

    popup.style.display = 'flex';

  } catch (error) {
    alert("Erro ao enviar solicitação.");
    console.error(error);
  }
});
