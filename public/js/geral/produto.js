document.addEventListener("DOMContentLoaded", () => {
  const link = document.getElementById("id_vendedor_produto");

  link.addEventListener("click", async () => {
    const id = link.dataset.id;
    const formData = new FormData();

    formData.append('vendedor_id', id);
    formData.append('clienteView', true);

    const perfil = await fetch("Perfil",  {
      method: "POST",
      body: formData
    });
    const json = perfil.json();
    console.log(await json.)
  });
});
