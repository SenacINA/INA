<?php
require_once './app/models/connect.php'; 

$db = new Database();
$db->connect();

$nome = "vendedor";
$email = "vendedor@email.com"; 
$senha = password_hash('senha123', PASSWORD_BCRYPT);
$dataRegistro = date('Y-m-d');
$tipoConta = 1; // 0 = admin, 1 = vendedor, 2 = cliente
$statusConta = 1;

$sql = "INSERT INTO cliente 
        (nome_cliente, email_cliente, senha_cliente, data_registro_cliente, tipo_conta_cliente, status_conta_cliente)
        VALUES 
        (:nome, :email, :senha, :data_registro, :tipo_conta, :status_conta)";

$params = [
    ':nome'          => $nome,
    ':email'         => $email,
    ':senha'         => $senha,
    ':data_registro' => $dataRegistro,
    ':tipo_conta'    => $tipoConta,
    ':status_conta'  => $statusConta
];

try {
    $db->executeQuery($sql, $params);

    $idCliente = $db->getConnection()->lastInsertId();

    if ($tipoConta == 1 || $tipoConta == 2) {
        $banner = $tipoConta == 1 ? "image/vendedor/perfil_vendedor/banner_vendedor_mini_perfil.png"
                                  : "image/cliente/perfil_cliente/banner_user.png";

        $foto = $tipoConta == 1 ? "image/vendedor/perfil_vendedor/pfp_vendedor.png"
                                : "image/cliente/perfil_cliente/foto_user.png";

        $sqlPerfil = "INSERT INTO perfil (id_cliente, foto_perfil, banner_perfil)
                      VALUES (:id_cliente, :foto, :banner)";
        
        $paramsPerfil = [
            ':id_cliente' => $idCliente,
            ':foto'       => $foto,
            ':banner'     => $banner
        ];

        $db->executeQuery($sqlPerfil, $paramsPerfil);

        echo "Usuário e perfil inseridos com sucesso!";
    } else {
        echo "Usuário admin inserido com sucesso (sem perfil).";
    }

} catch (PDOException $e) {
    echo "Erro ao inserir usuário: " . $e->getMessage();
}

