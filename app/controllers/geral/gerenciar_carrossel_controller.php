<?php
session_start();

// Verificação de sessão de administrador
if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header('Location: admin_login.php');
    exit();
}

// Configuração do banco de dados
require_once('config/database.php');

class GerenciadorCarrossel {
    private $pdo;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function listarAnuncios($filtro = null, $ordem = 'data_inicio') {
        $query = "SELECT 
                    a.id, 
                    a.nome, 
                    a.categoria, 
                    a.data_inicio, 
                    a.data_expiracao, 
                    a.ativo,
                    u.id as usuario_id,
                    u.nome as usuario_nome,
                    u.email as usuario_email,
                    u.ip as usuario_ip,
                    u.cargo as usuario_cargo,
                    p.tipo as plano_tipo
                  FROM anuncios a
                  JOIN usuarios u ON a.usuario_id = u.id
                  JOIN planos p ON a.plano_id = p.id
                  WHERE a.ativo = 1";
        
        // Aplicar filtros
        if ($filtro) {
            $query .= " AND (u.nome LIKE :filtro OR u.email LIKE :filtro OR a.nome LIKE :filtro)";
        }
        
        // Ordenação
        $ordensValidas = ['ip', 'nome', 'categoria', 'cargo', 'data_inicio', 'data_expiracao', 'plano'];
        $ordem = in_array($ordem, $ordensValidas) ? $ordem : 'data_inicio';
        $query .= " ORDER BY " . $ordem;
        
        try {
            $stmt = $this->pdo->prepare($query);
            
            if ($filtro) {
                $stmt->bindValue(':filtro', '%' . $filtro . '%');
            }
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar anúncios: " . $e->getMessage());
            return [];
        }
    }
    // Métodos principais serão implementados abaixo
}
?>