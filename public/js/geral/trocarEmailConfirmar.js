document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById('continuar_button_email');
  const PATH_PUBLIC = './public';

  btn.addEventListener("click", async () => {
    const novoEmailInput = document.getElementById("email-novo");
    const novoEmailConfirm = document.getElementById("email-novo-confirm");

    if (!novoEmailInput || !novoEmailConfirm) {
      gerarToast("Campo de e-mail não encontrado.", "erro");
      return;
    }

    const novoEmail = novoEmailInput.value;
    const confirmEmail = novoEmailConfirm.value;

    if (!novoEmail || !confirmEmail) {
      gerarToast("Por favor, preencha ambos os campos de e-mail.", "erro");
      return;
    }

    if (novoEmail !== confirmEmail) {
      gerarToast("Os e-mails não coincidem.", "erro");
      return;
    }

    const formData = new FormData();
    formData.append("email_cliente", novoEmail);
    formData.append("confirm_email_cliente", confirmEmail);

    try {
      const res = await fetch("ina/TrocarEmail-api-confirmar", {
        method: "POST",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        body: formData,
        credentials: 'include'
      });

      const data = await res.json();

      if (data.success) {
        gerarToast(data.mensagem || 'E-mail alterado com sucesso.', 'sucesso');
        
        setTimeout(() => {
          if (data.redirect) {
            window.location.href = data.redirect;
          }
        }, 3000);
      } else {
        gerarToast(data.mensagem || 'Erro ao alterar e-mail.', 'erro');
      }
    } catch (error) {
      gerarToast("Erro ao conectar ao servidor.", "erro");
      console.error(error);
    }
  });
});