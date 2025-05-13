document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formPesquisa');
  if (!form) return;

  form.addEventListener('submit', async e => {
    e.preventDefault();

    const data = new FormData(form);

    try {
      const resp = await fetch('/INA/api/admin/pesquisar-cliente', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        body: data
      });

      const json = await resp.json();

      if (json.success) {
        const dados = json.data;
        
        const preencherCampo = (name, valor) => {
          const campo = document.querySelector(`[name="${name}"]`);
          if (campo) campo.value = valor ?? '';
        };

        // Dados pessoais
        preencherCampo('nomeInput', dados.nome_cliente);
        preencherCampo('senhaInput', dados.senha_cliente);
        preencherCampo('emailInput', dados.email_cliente);
        preencherCampo('telefoneInput', dados.telefone_cliente);
        preencherCampo('cpfInput', dados.cpf_cliente);
        preencherCampo('telefone2Input', dados.telefone2_cliente);

        // Endereço
        preencherCampo('cepInput', dados.cep_cliente);
        preencherCampo('estadoInput', dados.estado);
        preencherCampo('cidadeInput', dados.cidade);
        preencherCampo('bairroInput', dados.bairro);
        preencherCampo('enderecoInput', dados.endereco);
        preencherCampo('numeroInput', dados.numero);

        // Permissões
        const setPermissao = valor => {
          const permissoes = {
            adminCheckbox: 0,
            clienteCheckbox: 1,
            vendedorCheckbox: 2
          };
        
          for (const [name, code] of Object.entries(permissoes)) {
            const checkbox = document.querySelector(`[name="${name}"]`);
            if (checkbox) checkbox.checked = Number(valor) === code;
          }
        };
        
        const statusCheckbox = document.querySelector('[name="statusCheckbox"]');
        if (statusCheckbox) statusCheckbox.checked = Number(dados.status_conta_cliente) === 1;
        
        setPermissao(dados.tipo_conta_cliente);
        

        gerarToast(json.message || 'Busca realizada com sucesso.', 'sucesso');
      } else {
        (json.errors || []).forEach(err => gerarToast(err, 'erro'));
      }

    } catch (err) {
      gerarToast('Erro de conexão, tente novamente.', 'erro');
    }
  });
});
