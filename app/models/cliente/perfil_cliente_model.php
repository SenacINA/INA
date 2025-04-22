<?php

require_once('../../models/connect.php');

function getPerfil() {
  $db = new Database();
  $db->connect();
  $sql = 'select * from perfil';
  return $db->executeQuery($sql);
  $db->disconnect();
}