function limpa_formulário_cep() {
  document.getElementById("logradouro").value = "";
  document.getElementById("local_da_empresa").value = "";
}

function cepApi(conteudo) {
  if (!("erro" in conteudo)) {
    console.log(conteudo)
    document.getElementById("logradouro").value = (conteudo.logradouro);
    document.getElementById("localizacaoSelect").value = conteudo.uf + "-" + conteudo.localidade;
  }
}

function pesquisacep(valor) {
  var cep = valor.replace(/\D/g, "");

  if (cep != "") {
    var validacep = /^[0-9]{8}$/;

    if (validacep.test(cep)) {
      document.getElementById("logradouro").value = "...";

      var script = document.createElement("script");

      script.src = "https://viacep.com.br/ws/" + cep + "/json/?callback=cepApi";

      document.body.appendChild(script);
    } else {
      limpa_formulário_cep();
    }
  }
}
