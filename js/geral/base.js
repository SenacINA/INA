function pag(url, loc = 1) {
    if (loc === 0) {
        window.location.href = "./pages/" + url + ".php";
    } else {
        window.location.href = "../" + url + ".php";
    }
}

function login(){
    switch (document.getElementById("email").value) {
        case "admin":
            window.location.href = "../admin/dashboard.php";
            break;
        case "vendedor":
            window.location.href = "../vendedor/perfil_vendedor.php";
            break;
        case "cliente":
            window.location.href = "../cliente/perfil_cliente.php";
            break;
        default:
            alert("Login Incorreto");
            break;
    }
}