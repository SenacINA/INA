document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form_trocar_email');
  const avancarBtn = document.getElementById('avancar-btn');
  const responseMessage = document.getElementById('response-message');

  avancarBtn.addEventListener('click', function () {
    const senha = document.getElementById('senha-email').value;

    if (!senha) {
      gerarToast('A senha não pode estar vazia.', 'erro');
      return;
    }

    const formData = new FormData();
    formData.append('senha_cliente', senha);

    fetch(form.action, {
      method: 'POST',
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          gerarToast('Senha verificada com sucesso.', 'sucesso');
          setTimeout(function () {
            window.location.href = "trocar-email/confirmar";
          }, 3000);
        } else {
          gerarToast(data.messagem, 'erro');
        }
      })
      .catch(error => {
        gerarToast('Ocorreu um erro ao processar a requisição.', 'erro');
        console.error('Erro:', error);
      });
  });
});
