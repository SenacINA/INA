document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form_trocar_email');
  const avancarBtn = document.getElementById('avancar-btn');

  function enviarRequisicao() {
    const senha = document.getElementById('senha-email').value;

    if (!senha) {
      gerarToast('A senha não pode estar vazia.', 'erro');
      return;
    }

    const formData = new FormData();
    formData.append('senha-email', senha); 

    fetch(form.action, {
      method: 'POST',
      body: formData,
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Erro na resposta do servidor');
        }
        return response.json();
      })
      .then(data => {
        console.log('Resposta do servidor:', data);

        if (data.status === 'success') {
          gerarToast('Senha verificada com sucesso.', 'sucesso');
          setTimeout(() => {
            window.location.href = 'TrocarEmailConfirmar';
          }, 3000);
        } else {
          gerarToast(data.messagem || 'Erro ao verificar senha.', 'erro');
        }
      })
      .catch(error => {
        console.error('Erro ao enviar a requisição:', error);
        gerarToast('Ocorreu um erro ao processar a requisição.', 'erro');
      });
  }

  avancarBtn.addEventListener('click', enviarRequisicao);

  form.addEventListener('submit', function (event) {
    event.preventDefault();
    enviarRequisicao();
  });
});