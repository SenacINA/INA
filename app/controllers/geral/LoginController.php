<?php
session_start();

require __DIR__ . '/../../models/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['senha'] ?? '';

    if (empty($email) || empty($password)) {
        header("Location: /INA/INA/app/views/cliente/login.php?error=emptyfields");
        exit();
    }

    $db = new Database();
    $db->connect();

    $sql = "SELECT * FROM cliente WHERE email_cliente = :email";
    $params = [':email' => $email];
    $result = $db->executeQuery($sql, $params);

    if ($result) {
        $storedHash = $result[0]['senha_cliente'];

        if (password_verify($password, $storedHash)) {
            // Verifica o tipo_conta_cliente e seta o texto certo
            $tipoConta = $result[0]['tipo_conta_cliente'];
            if ($tipoConta == 0) {
                $_SESSION['user_type'] = 'admin';
                $_SESSION['cliente_id'] = $result[0]['id_cliente'];

                header("Location: ../../views/admin/Dashboard.php");
            } elseif ($tipoConta == 1) {
                $_SESSION['user_type'] = 'vendedor';
                $_SESSION['cliente_id'] = $result[0]['id_cliente'];

                header("Location: ../../views/vendedor/PerfilVendedor.php");
            } elseif ($tipoConta == 2) {
                $_SESSION['user_type'] = 'cliente';
                $_SESSION['cliente_id'] = $result[0]['id_cliente'];

                header("Location: ../../views/cliente/PerfilCliente.php");
            } else {
                $_SESSION['user_type'] = 'desconhecido'; // caso aconteça algum valor inesperado
                $_SESSION['cliente_id'] = $result[0]['id_cliente'];

                header("Location: ../../views/cliente/PerfilCliente.php");
            }

            
            exit();
        } else {
            header("Location: /INA/INA/app/views/cliente/Login.php?error=invalidpassword");
            exit();
        }
    } else {
        header("Location: /INA/INA/app/views/cliente/Login.php?error=notfound");
        exit();
    }

    $db->disconnect();
}
?>
