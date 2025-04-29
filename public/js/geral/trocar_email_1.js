document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('form_trocar_email');
  const avancarBtn = document.getElementById('avancar-btn');
  const responseMessage = document.getElementById('response-message');

  avancarBtn.addEventListener('click', function() {
      // Impede o envio padrão do formulário
      const senha = document.getElementById('senha-email').value;

      if (!senha) {
          gerarToast('A senha não pode estar vazia.', 'erro');
          return;
      }

      const formData = new FormData();
      formData.append('senha_cliente', senha);

      // Envia a requisição para o controlador
      fetch(form.action, {
          method: 'POST',
          body: formData,
      })
      .then(response => {
          // Verifica se a resposta foi ok (status 200)
          if (!response.ok) {
              throw new Error('Erro na resposta do servidor');
          }
          return response.json(); // Converte a resposta em JSON
      })
      .then(data => {
          if (data.status === 'success') {
              gerarToast('Senha verificada com sucesso.', 'sucesso');
              
              // Redireciona para a próxima página após 3 segundos
              setTimeout(function() {
                  window.location.href = "trocar-email/confirmar";
              }, 3000);
          } else {
              gerarToast(data.messagem, 'erro');
          }
      })
      .catch(error => {
          // Caso ocorra algum erro com o fetch (como problemas de rede)
          console.error('Erro ao enviar a requisição:', error);
          gerarToast('Ocorreu um erro ao processar a requisição.', 'erro');
      });
  });
});
