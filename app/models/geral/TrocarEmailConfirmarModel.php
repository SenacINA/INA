<?php

require_once __DIR__ . '/../connect.php';

class TrocarEmailConfirmarModel{
  private $pdo;

  public function __construct() {
      $db = new Database();
      $db->connect(); 
      $this->pdo = $db->getConnection(); 
  }

  public function getEmailAtual($clienteId) {
      $stmt = $this->pdo->prepare("SELECT email_cliente FROM cliente WHERE id_cliente = ?");
      $stmt->execute([$clienteId]);
      return $stmt->fetchColumn() ?: null;
  }

  public function emailExiste($email) {
      $stmt = $this->pdo->prepare("SELECT id_cliente FROM cliente WHERE email_cliente = ?");
      $stmt->execute([$email]);
      return $stmt->fetch() !== false;
  }

  public function atualizarEmail($clienteId, $novoEmail) {
      $stmt = $this->pdo->prepare("UPDATE cliente SET email_cliente = ? WHERE id_cliente = ?");
      return $stmt->execute([$novoEmail, $clienteId]);
  }
}

