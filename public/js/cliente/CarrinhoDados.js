document.getElementById('btnSalvarEndereco').addEventListener('click', async function () {
  const camposObrigatorios = [
    'nome_carrinho',
    'cpf_carrinho',
    'endereco_carrinho',
    'numero_casa',   // corrigido aqui para bater com o id do HTML
    'cidade',
    'cep'
  ];

  let formularioValido = true;

  // Limpa erros anteriores
  camposObrigatorios.forEach(id => {
    const campo = document.getElementById(id);
    if (campo) campo.classList.remove('input-error');
  });

  // Validação dos campos obrigatórios
  camposObrigatorios.forEach(id => {
    const campo = document.getElementById(id);
    if (!campo || !campo.value.trim()) {
      if (campo) campo.classList.add('input-error');
      formularioValido = false;
    }
  });

  if (!formularioValido) {
    const primeiroErro = document.querySelector('.input-error');
    if (primeiroErro) primeiroErro.focus();
    return;
  }

  // Coleta os dados
  const dados = {
    nome: document.getElementById('nome_carrinho').value.trim(),
    cpf: document.getElementById('cpf_carrinho').value.trim(),
    endereco: document.getElementById('endereco_carrinho').value.trim(),
    numeroCasa: document.getElementById('numero_casa').value.trim(), // corrigido
    cidade: document.getElementById('cidade').value.trim(),
    cep: document.getElementById('cep').value.trim(),
    telefone: document.getElementById('telefone').value.trim(),
    email: document.getElementById('email').value.trim(),
    ponto: document.getElementById('ponto').value.trim()
  };

  try {
    const response = await fetch('/CarrinhoDados-salvar', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(dados)
    });

    if (!response.ok) throw new Error(`Erro HTTP ${response.status}`);

    const data = await response.json();

    if (data.sucesso) {
      alert('Endereço salvo com sucesso!');

      // Adiciona o novo endereço ao DOM
      const novoEndereco = document.createElement('div');
      novoEndereco.classList.add('carrinho_dados_info_container');
      novoEndereco.innerHTML = `
        <input type="radio" name="endereco" class="base_radio">
        <div class="carrinho_dados_text_info">
          <div class="carrinho_dados_text">
            <h3 class="carrinho_dados_endereco_info">${dados.endereco}</h3>
            <p class="carrinho_dados_endereco_info_adicional">
              Nº ${dados.numeroCasa}, ${dados.cidade}, CEP: ${dados.cep}
            </p>
            <p><strong>Nome:</strong> ${dados.nome}</p>
            <p><strong>CPF:</strong> ${dados.cpf}</p>
            <p><strong>Telefone:</strong> ${dados.telefone}</p>
            <p><strong>Email:</strong> ${dados.email}</p>
            ${dados.ponto ? `<p><strong>Ponto de referência:</strong> ${dados.ponto}</p>` : ''}
          </div>
          <div class="carrinho_dados_botoes_info">
            <button type="button" class="carrinho_dados_edit_info" title="Editar">
              <img src="/image/geral/icons/caneta_carolina_icon.svg" alt="Editar">
            </button>
            <button type="button" class="carrinho_dados_remove_info" title="Remover">
              <img src="/image/geral/icons/lixo_vermelho_icon.svg" alt="Remover">
            </button>
          </div>
        </div>
      `;

      // Evento de remoção
      novoEndereco.querySelector('.carrinho_dados_remove_info').addEventListener('click', () => {
        novoEndereco.remove();
      });

      document.getElementById('enderecos_salvos').appendChild(novoEndereco);

      // Limpa formulário
      const form = document.getElementById('form_endereco');
      form.reset();
      camposObrigatorios.forEach(id => {
        const campo = document.getElementById(id);
        if (campo) campo.classList.remove('input-error');
      });

    } else {
      alert('Erro: ' + data.mensagem);
    }

  } catch (error) {
    console.error('Erro na requisição:', error);
    alert('Erro ao salvar o endereço.');
  }
});

// Remove classe de erro ao digitar
['nome_carrinho', 'cpf_carrinho', 'endereco_carrinho', 'numero_casa', 'cidade', 'cep'].forEach(id => {
  const campo = document.getElementById(id);
  if (campo) {
    campo.addEventListener('input', () => {
      if (campo.value.trim()) {
        campo.classList.remove('input-error');
      }
    });
  }
});
