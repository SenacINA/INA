<?php

require_once('../../models/connect.php');

function getPerfil($id) {
  $db = new Database();
  $db->connect();
  $sql = "select * from perfil where id_cliente = $id";
  return $db->executeQuery($sql);
  $db->disconnect();
}