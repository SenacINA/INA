document.getElementById('btnSalvarEndereco').addEventListener('click', function() {
  // Lista dos campos obrigatórios com seus ids
  const camposObrigatorios = [
    'nome_carrinho',
    'cpf_carrinho',
    'endereco_carrinho',
    'numeroCasa',
    'cidade',
    'cep'
  ];

  let formularioValido = true;

  // Remove classe de erro de todos os campos antes de validar
  camposObrigatorios.forEach(id => {
    const campo = document.getElementById(id);
    campo.classList.remove('input-error');
  });

  // Verifica campos obrigatórios
  camposObrigatorios.forEach(id => {
    const campo = document.getElementById(id);
    if (!campo.value.trim()) {
      campo.classList.add('input-error');
      formularioValido = false;
    }
  });

  if (!formularioValido) {
    // Para evitar o alerta, apenas foca no primeiro campo com erro
    document.querySelector('.input-error').focus();
    return;
  }

  // Segue o restante da lógica para salvar o endereço

  // Captura valores
  const nome = document.getElementById('nome_carrinho').value.trim();
  const cpf = document.getElementById('cpf_carrinho').value.trim();
  const endereco = document.getElementById('endereco_carrinho').value.trim();
  const numero = document.getElementById('numeroCasa').value.trim();
  const cidade = document.getElementById('cidade').value.trim();
  const cep = document.getElementById('cep').value.trim();
  const telefone = document.getElementById('telefone').value.trim();
  const email = document.getElementById('email').value.trim();
  const ponto = document.getElementById('ponto').value.trim();
  const mensagemVendedor = document.getElementById('mensagem_vendedor').value.trim();
  const opcaoEnvio = document.getElementById('opcaoEnvio').value;

  // Criar novo elemento para endereço salvo
  const novoEndereco = document.createElement('div');
  novoEndereco.classList.add('carrinho_dados_info_container');
  novoEndereco.innerHTML = `
    <input type="radio" name="endereco" class="base_radio">
    <div class="carrinho_dados_text_info">
      <div class="carrinho_dados_text">
        <h3 class="carrinho_dados_endereco_info">${endereco}</h3>
        <p class="carrinho_dados_endereco_info_adicional">
          Nº ${numero}, ${cidade}, CEP: ${cep}
        </p>
        <p><strong>Nome:</strong> ${nome}</p>
        <p><strong>CPF:</strong> ${cpf}</p>
        <p><strong>Telefone:</strong> ${telefone}</p>
        <p><strong>Email:</strong> ${email}</p>
        ${ponto ? `<p><strong>Ponto de referência:</strong> ${ponto}</p>` : ''}
        ${mensagemVendedor ? `<p><strong>Mensagem:</strong> ${mensagemVendedor}</p>` : ''}
        <p><strong>Opção de envio:</strong> ${opcaoEnvio}</p>
      </div>
      <div class="carrinho_dados_botoes_info">
        <button type="button" class="carrinho_dados_edit_info" title="Editar">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/caneta_carolina_icon.svg" alt="Editar">
        </button>
        <button type="button" class="carrinho_dados_remove_info" title="Remover">
          <img src="<?= $PATH_PUBLIC ?>/image/geral/icons/lixo_vermelho_icon.svg" alt="Remover">
        </button>
      </div>
    </div>
  `;

  // Remove endereço ao clicar no botão
  novoEndereco.querySelector('.carrinho_dados_remove_info').addEventListener('click', () => {
    novoEndereco.remove();
  });

  // Placeholder para editar (você pode implementar)
  novoEndereco.querySelector('.carrinho_dados_edit_info').addEventListener('click', () => {
    alert('Função de editar ainda não implementada.');
  });

  // Adiciona ao container dos endereços salvos
  document.getElementById('enderecos_salvos').appendChild(novoEndereco);

  // Limpa o formulário e remove classes de erro
  const form = document.getElementById('form_endereco');
  form.reset();
  camposObrigatorios.forEach(id => {
    document.getElementById(id).classList.remove('input-error');
  });
});

// Remove o erro assim que usuário digitar em um campo
const camposInput = [
  'nome_carrinho', 'cpf_carrinho', 'endereco_carrinho',
  'numeroCasa', 'cidade', 'cep'
];

camposInput.forEach(id => {
  const campo = document.getElementById(id);
  campo.addEventListener('input', () => {
    if (campo.value.trim()) {
      campo.classList.remove('input-error');
    }
  });
});
