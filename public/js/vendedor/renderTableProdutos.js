document.addEventListener('DOMContentLoaded', function () {
    async function carregarTabelaProdutos(idVendedor) {
      try {
        const resposta = await fetch('/ina/GerenciarProdutos-api', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `id_vendedor=${idVendedor}`
        });
  
        const json = await resposta.json();
  
        if (!json.success) {
          console.error('Erro ao buscar produtos:', json.errors || json.erros);
          return;
        }
  
        const tbody = document.querySelector('.base_tabela tbody');
        tbody.innerHTML = ''; // limpa a tabela
  
        json.data.forEach(produto => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td># ${produto.codigo}</td>
            <td><span>${produto.nome}</span></td>
            <td>R$ ${produto.preco}</td>
            <td>${produto.quantidade}</td>
            <td><span>${produto.status}</span></td>
            <td><button class='base_botao btn_blue'>Editar</button></td>
          `;
          tbody.appendChild(tr);
        });
      } catch (erro) {
        console.error('Erro na requisição:', erro);
      }
    }
  
    carregarTabelaProdutos(idVendedor);
  });