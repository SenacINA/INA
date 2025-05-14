const btn = document.getElementById('continuar_button_senha');
const popup = document.getElementById('popup');
const PATH_PUBLIC = './public';

btn.addEventListener("click", async () => {
  const email = document.getElementById("email-senha").value;

  if (!email) {
    gerarToast("Por favor, preencha o e-mail.", "erro");
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
    
      document.querySelector(".text_popup").innerHTML = `
        ${data.mensagem}
        <button class="base_botao btn_blue" id="close_btn">
          <img src="${PATH_PUBLIC}/image/geral/botoes/v_branco_icon.svg" alt="">
          OK
        </button>
      `;

      document.querySelector('.text_popup').addEventListener('click', function(event) {
        if (event.target && event.target.id === 'close_btn') {
          popup.style.display = 'none';

          window.location.href = data.link; 
        }
      });

      gerarToast(data.mensagem || 'E-mail enviado com sucesso.', 'sucesso');
    } else {
      document.querySelector(".text_popup").innerText = data.mensagem;
      gerarToast(data.mensagem || 'Erro ao enviar e-mail.', 'erro');
    }

    popup.style.display = 'flex';

  } catch (error) {
    console.error(error);
    gerarToast("Erro ao enviar solicitação.", "erro");
  }
});