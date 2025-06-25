const toggleMostrarServicos = () => {
  const freteContainer1 = document.getElementById("frete_container_1");
  const freteContainer2 = document.getElementById("frete_container_2");

  if (!freteContainer1 || !freteContainer2) {
    console.log("Sem serviços");
    return;
  }

  freteContainer1.classList.toggle("visible_servicos");
  freteContainer2.classList.toggle("visible_servicos");
};

document.addEventListener("DOMContentLoaded", () => {
  const toggleBotao = document.getElementById("btn_mostrar_servicos");

  if (toggleBotao) {
    toggleBotao.addEventListener("click", () => toggleMostrarServicos());
  }

  document.querySelectorAll("input#quantidade_produto").forEach((input) => {
    input.addEventListener("change", async (e) => {
      let quantidade = input.value;
      if (quantidade > 99) {
        gerarToast("Limite de itens atingido", "erro");
        input.value = 99;
      } else {
        let id = e.target.closest(".carrrinho_produto_item").dataset.id;

        let formData = new FormData();
        formData.append("quantidade", quantidade);
        formData.append("id", id);

        await fetch("Carrinho-api-update", {
          method: "POST",
          body: formData,
        }).then(window.location.reload());
      }
    });
  });
});

document.querySelectorAll(".botao_adicionar_ao_carrinho").forEach((botao) => {
  botao.addEventListener("click", () => {
    const produtoId = botao.dataset.id;
    const quantidade = 1;

    fetch("Carrinho/adicionarItem", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `produto_id=${produtoId}&quantidade=${quantidade}`,
    }).then((res) => {
      if (res.ok) {
        console.log("Produto adicionado!");
      }
    });
  });
});


// Validação de CEP com API ViaCEP
document.getElementById('cep').addEventListener('blur', async function() {
    const cep = this.value.replace(/\D/g, '');
    
    if (cep.length === 8) {
        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();
            
            if (!data.erro) {
                document.getElementById('endereco').value = data.logradouro;
                document.getElementById('cidade').value = data.localidade;
                // Pode preencher outros campos conforme necessário
            }
        } catch (error) {
            console.error('Erro ao buscar CEP:', error);
        }
    }
});

// Validação de CPF
function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    // Implemente a validação de CPF aqui
    return cpf.length === 11;
}