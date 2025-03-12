function pag(url, loc = 1, params = "") {
    if (loc === 0) {
        window.location.href = "./pages/" + url + ".php" + params;
    } else {
        window.location.href = "../".repeat(loc ?? 1) + url + ".php" + params;
    }
}

function login(){
    switch (document.getElementById("email").value) {
        case "admin":
            pag("admin/dashboard");
            break;
        case "vendedor":
            pag("vendedor/perfil_vendedor");
            break;
        case "cliente":
            pag("cliente/perfil_cliente");
            break;
        default:
            alert("Login Incorreto");
            break;
    }
}