

<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the login value from the POST request
        $login = $_POST['email'] ?? '';

        switch ($login) {
            case 'admin':
                $_SESSION['user_type'] = "admin";

                header('Location:../../views/admin/dashboard.php');
                exit();
            case 'cliente':
                $_SESSION['user_type'] = "cliente";

                header('Location:../../views/cliente/perfil_cliente.php');
                exit();
            case 'vendedor':
                $_SESSION['user_type'] = "vendedor";

                header('Location:../../views/vendedor/perfil_vendedor.php');
                exit();
            default:
                header("Location:../../index.php");
                exit();
                break;
        }
    }
?>