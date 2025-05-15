<?php
require_once __DIR__ . '/../connect.php';

class ClienteModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db->connect();
  }

  public function dadosVendedor(string $id) : ?array {
    $sql = "
      SELECT * FROM vendedor WHERE id_cliente = :id;
    ";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
  }

  public function getEstrelasPorVendedor(string $idVendedor): array {
    $sql = "SELECT estrelas_avaliacao FROM avaliacao WHERE id_vendedor = :idVendedor";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':idVendedor', $idVendedor, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
  }

  public function getTipoContaById(string $id): ?int
  {
    $sql = "SELECT tipo_conta_cliente FROM cliente WHERE id_cliente = :id LIMIT 1";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? (int)$result['tipo_conta_cliente'] : null;
  }

  public function tipoCliente(string $id) : string {
        $sql  = "SELECT tipo_conta_Cliente FROM cliente WHERE id_cliente = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $tipoConta = $stmt->fetchColumn();

        switch ($tipoConta) {
            case 0:
                return "admin";
            case 1:
                return "vendedor";
            case 2:
                return "cliente";
            default:
                return "Tipo desconhecido";
        }
    }

  public function findById(string $id): ?array
  {
    $sql = "
        SELECT 
            cliente.id_cliente, 
            cliente.nome_cliente, 
            cliente.genero_cliente, 
            cliente.foto_perfil_cliente, 
            cliente.banner_perfil_cliente, 
            cliente.tipo_conta_cliente, 
            cliente.status_conta_cliente,
            cliente.data_registro_cliente,
            perfil.foto_perfil, 
            perfil.banner_perfil, 
            perfil.descricao_perfil, 
            perfil.instagram_perfil, 
            perfil.facebook_perfil, 
            perfil.linkedin_perfil, 
            perfil.youtube_perfil, 
            perfil.tiktok_perfil,
            perfil.x_perfil,
            endereco.uf_endereco as uf,            
            endereco.cidade_endereco as cidade     
        FROM 
            cliente
        JOIN perfil 
            ON cliente.id_cliente = perfil.id_cliente
        LEFT JOIN endereco 
            ON cliente.id_cliente = endereco.id_cliente
        WHERE cliente.id_cliente = :id 
        LIMIT 1";

    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ?: null;
  }


  public function emailExists(string $email): bool
  {
    $sql  = "SELECT COUNT(*) FROM cliente WHERE email_cliente = :email";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    return (int)$stmt->fetchColumn() > 0;
  }

  public function findByEmail(string $email): ?array
  {
    $sql = "SELECT * FROM cliente WHERE email_cliente = :email LIMIT 1";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
  }

  public function createUser(string $nome, string $email, string $senha): bool
  {
    try {
      $this->db->connect();
      $conn = $this->db->getConnection();

      $conn->beginTransaction();

      $sqlCliente = "INSERT INTO cliente
                            (nome_cliente, email_cliente, senha_cliente,
                            data_registro_cliente, tipo_conta_cliente, status_conta_cliente)
                        VALUES
                            (:nome, :email, :senha, CURDATE(), 2, 1)";

      $paramsCliente = [
        ':nome'  => $nome,
        ':email' => $email,
        ':senha' => $senha
      ];

      $this->db->executeQuery($sqlCliente, $paramsCliente);

      $idCliente = $conn->lastInsertId();

      $sqlPerfil = "INSERT INTO perfil
                            (id_cliente, foto_perfil, banner_perfil)
                        VALUES
                            (:id_cliente, :foto_perfil, :banner_perfil)";

      $paramsPerfil = [
        ':id_cliente'    => $idCliente,
        ':foto_perfil'   => '/image/cliente/perfil_cliente/foto_user.png',
        ':banner_perfil' => '/image/cliente/perfil_cliente/banner_user.png'
      ];

      $this->db->executeQuery($sqlPerfil, $paramsPerfil);

      $conn->commit();
      return true;
    } catch (PDOException $e) {
      if ($conn->inTransaction()) {
        $conn->rollBack();
      }
      die('Erro ao criar usuário: ' . $e->getMessage());
    }
  }
}
