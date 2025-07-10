document.addEventListener('DOMContentLoaded', () => {
  const botaoWhats = document.querySelector('.botao_whats');
  const id_vendedor = document.getElementById('idVendedor')?.value;

  if (botaoWhats) {
    botaoWhats.addEventListener('click', async () => {
      try {
        // Faz a requisição ao back-end
        const response = await fetch(`getDadosVendedor-api?idVendedor=${id_vendedor}`);
        if (!response.ok) throw new Error('Erro ao buscar vendedor');

        const vendedor = await response.json();

        // Verifica se os dados estão presentes
        if (!vendedor || !vendedor.ddd_cliente || !vendedor.numero_celular_cliente) {
          alert('Não foi possível encontrar um vendedor.');
          return;
        }

        // Monta o link do WhatsApp
        const ddd = vendedor.ddd_cliente.toString().padStart(2, '0');
        const numero = vendedor.numero_celular_cliente.toString().padStart(9, '0');
        const mensagem = encodeURIComponent('Olá! Gostaria de saber mais sobre seu produto.');
        const link = `https://wa.me/55${ddd}${numero}?text=${mensagem}`;

        // Redireciona diretamente para o WhatsApp
        window.location.href = link;

      } catch (error) {
        console.error('Erro ao iniciar conversa no WhatsApp:', error);
        alert('Erro ao iniciar a conversa. Tente novamente.');
      }
    });
  }
});
