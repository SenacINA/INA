<?php

require_once __DIR__ . '/../connect.php';

class RedefinicaoSenhaModel
{
    private $pdo;
    
    public function __construct()
    {
        $db = new Database();
        $db->connect();
        $this->pdo = $db->getConnection();
    }

    public function buscarClientePorEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT id_cliente FROM cliente WHERE email_cliente = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function salvarToken($id_cliente, $token, $expira)
    {
        $stmt = $this->pdo->prepare("INSERT INTO redefinicao_senha (id_cliente, token, expira_em) VALUES (?, ?, ?)");
        return $stmt->execute([$id_cliente, $token, $expira]);
    }

    public function validarToken($token)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM redefinicao_senha WHERE token = ? AND usado = 0 AND expira_em > NOW()");
        $stmt->execute([$token]);
        return $stmt->fetch();
    }

    public function atualizarSenha($id_cliente, $hashSenha)
    {
        $stmt = $this->pdo->prepare("UPDATE cliente SET senha_cliente = ? WHERE id_cliente = ?");
        return $stmt->execute([$hashSenha, $id_cliente]);
    }

    public function marcarTokenComoUsado($token)
    {
        $stmt = $this->pdo->prepare("UPDATE redefinicao_senha SET usado = 1 WHERE token = ?");
        return $stmt->execute([$token]);
    }
}
