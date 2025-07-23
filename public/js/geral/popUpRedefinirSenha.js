const btn = document.getElementById("continuar_button_senha");
const popup = document.getElementById("popup");
const PATH_PUBLIC = "./public";

btn.addEventListener("click", async () => {
  const email = document.getElementById("email-senha").value;

  if (!email) {
    gerarToast("Por favor, preencha o e-mail.", "erro");
    return;
  }

  const formData = new FormData();
  formData.append("email", email);

  try {
    const res = await fetch("RedefinirSenha-api", {
      method: "POST",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      body: formData,
      credentials: "include",
    });

    const data = await res.json();

    if (data.success) {
      gerarToast("E-mail verificado com sucesso", "sucesso");
      setTimeout(() => {
        window.location.href = "RedefinirSenhaConfirmar";
      }, 1500);
    } else {
      gerarToast(data['error'], "erro");
    }
  } catch (error) {
    console.error(error);
    gerarToast("Erro ao enviar solicitação.", "erro");
  }
});
