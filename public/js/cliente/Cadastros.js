document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('cadastroForm');
    if (!form) return;
  
    form.addEventListener('submit', async e => {
      e.preventDefault();
      const data = new FormData(form);
  
      try {
        const resp = await fetch('/INA/api/cliente/register', {
          method: 'POST',
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          body: data
        });
        const json = await resp.json();
  
        if (json.success) {
          gerarToast(json.message, 'sucesso');
          form.reset();
        } else {
          (json.errors || []).forEach(err => gerarToast(err, 'erro'));
        }
      } catch (err) {
        gerarToast('Erro de conexão, tente novamente.', 'erro');
      }
    });
  });
  


  /*Js para a validação visual*/
  
document.addEventListener("DOMContentLoaded", () => {
  const senhaInput = document.getElementById("senha");
  const confirmaInput = document.getElementById("confirmaSenha");

  const regraCaracteres = document.getElementById("regra-caracteres");
  const regraMinuscula = document.getElementById("regra-minuscula");
  const regraNumero = document.getElementById("regra-numero");
  const regraCoincidir = document.getElementById("regra-senha-coicidir");

  function validarSenha() {
    const senha = senhaInput.value;
    const confirmar = confirmaInput.value;

    toggleClasse(regraCaracteres, senha.length >= 6);
    toggleClasse(regraMinuscula, /[a-z]/.test(senha));
    toggleClasse(regraNumero, /\d/.test(senha));
    toggleClasse(regraCoincidir, senha !== "" && senha === confirmar);
  }

  function toggleClasse(elemento, valido) {
    if (valido) {
      elemento.classList.add("valida");
      elemento.classList.remove("invalida");
    } else {
      elemento.classList.remove("valida");
      elemento.classList.add("invalida");
    }
  }

  senhaInput.addEventListener("input", validarSenha);
  confirmaInput.addEventListener("input", validarSenha);
});
