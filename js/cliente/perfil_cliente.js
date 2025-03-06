const menu = document.getElementById("menu");

menu.addEventListener("change", () => {
  switch (menu.value) {
    case "editar-perfil":
      menu.selectedIndex = 0;
      window.location.href = "../../pages/cliente/editar_perfil.php";

    case "pedidos":
      menu.selectedIndex = 0;
      window.location.href = "../../pages/vendedor/cadastro_vendedor_1.php";

    case "sair":
  }
});
