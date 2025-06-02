const buttonDesativar = document.getElementById("disable_button");

buttonDesativar.addEventListener("click", function (e) {
  const nome = document.getElementById("nome_cliente").innerText;
  const email = document.getElementById("email_cliente").innerText;
  const cargo =
    document.getElementById("cargo_cliente").innerText == "Admin"
      ? 0
      : document.getElementById("cargo_cliente").innerText == "Vendedor"
      ? 1
      : 2;

  let formData = new FormData();
  formData.append("nome", nome);
  formData.append("email", email);
  formData.append("cargo", cargo);

  if(sendData(formData)) {
    window.location.reload();
  }
});

async function sendData(formData) {
  await fetch("DesativarUser", {
    method: "POST",
    body: formData,
  });
}
