document.addEventListener('DOMContentLoaded', () => {
  const botaoWhats = document.querySelector('.botao_whats');
  const id_vendedor = document.getElementById('idVendedor')?.value;

  if (botaoWhats) {
    botaoWhats.addEventListener('click', async () => {
      let link = null;

      try {
        const response = await fetch(`getDadosVendedor-api?idVendedor=${id_vendedor}`);
        if (!response.ok) throw new Error('Erro ao buscar vendedor');

        const vendedor = await response.json();

        if (!vendedor || !vendedor.ddd_cliente || !vendedor.numero_celular_cliente) {
          alert('Não foi possível encontrar um vendedor.');
          return;
        }

        const ddd = vendedor.ddd_cliente.toString().padStart(2, '0');
        const numero = vendedor.numero_celular_cliente.toString().padStart(9, '0');
        const mensagem = encodeURIComponent('Olá! Gostaria de saber mais sobre seus produtos.');
        link = `https://wa.me/55${ddd}${numero}?text=${mensagem}`;

        // Abre a aba SOMENTE quando o link estiver pronto
        window.open(link, '_blank');
      } catch (error) {
        console.error('Erro ao iniciar conversa no WhatsApp:', error);
        alert('Erro ao iniciar a conversa. Tente novamente.');
      }
    });
  }
});
