document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('continuar_button');
  const popup = document.getElementById('popup');

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

      if (data.status === 'success') {
        gerarToast(data.mensagem || 'E-mail enviado com sucesso.', 'sucesso');

        if (data.link) {
          document.querySelector(".text_popup p").innerHTML = `
            ${data.mensagem}<br><br>
            <a href="${data.link}" class="base_botao btn_blue" id="close_btn">Redefinir Senha</a>
          `;
          popup.style.display = 'flex';

          setTimeout(() => {
            const close_btn = document.getElementById('close_btn');
            if (close_btn) {
              close_btn.addEventListener('click', function () {
                popup.style.display = 'none';
              });
            }
          }, 3000);
        }

      } else {
        gerarToast(data.mensagem || 'Erro ao enviar e-mail.', 'erro');
      }

    } catch (error) {
      console.error(error);
      gerarToast("Erro ao enviar solicitação.", "erro");
    }
  });
});
