<?php

require_once('../../models/connect.php');

function getPerfil($id) {
    $db = new Database();
    $db->connect();

    $sql = "SELECT * FROM perfil 
            INNER JOIN cliente ON perfil.id_cliente = cliente.id_cliente 
            WHERE perfil.id_cliente = :id";

    $params = [':id' => $id];
    $result = $db->executeQuery($sql, $params);

    $db->disconnect();
    return $result;
}