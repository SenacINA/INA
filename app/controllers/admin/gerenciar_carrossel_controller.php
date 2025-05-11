<?php
session_start();

// Verificação de autenticação do administrador
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: /INA/INA/app/views/cliente/login.php?error=restrictedaccess");
    exit();
}


class GerenciadorCarrossel {

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }
    
    public function listarCarrosseis($filtro = null) {
        $sql = "SELECT 
                    c.id_carrossel,
                    c.link_carrossel,
                    c.proxima_cobranca_carrossel,
                    c.foi_pago_esse_mes_carrossel,
                    v.id_vendedor,
                    v.cnpj_vendedor,
                    cl.nome_cliente,
                    cl.email_cliente,
                    GROUP_CONCAT(ic.endereco_imagem_carrossel) as imagens
                FROM carrossel c
                JOIN vendedor v ON c.id_vendedor = v.id_vendedor
                JOIN cliente cl ON v.id_vendedor = cl.id_cliente
                LEFT JOIN imagem_carrossel ic ON c.id_carrossel = ic.id_carrossel";
        
        $params = [];
        if ($filtro) {
            $where = [];
            if (!empty($filtro['status_pagamento'])) {
                $where[] = "c.foi_pago_esse_mes_carrossel = :status_pagamento";
                $params[':status_pagamento'] = $filtro['status_pagamento'];
            }
            if (!empty($filtro['data_inicio'])) {
                $where[] = "c.proxima_cobranca_carrossel >= :data_inicio";
                $params[':data_inicio'] = $filtro['data_inicio'];
            }
            if (!empty($filtro['nome_vendedor'])) {
                $where[] = "cl.nome_cliente LIKE :nome_vendedor";
                $params[':nome_vendedor'] = '%' . $filtro['nome_vendedor'] . '%';
            }
            if (!empty($where)) {
                $sql .= " WHERE " . implode(" AND ", $where);
            }
        }
        
        $sql .= " GROUP BY c.id_carrossel";
        
        // Ordenação
        $ordenacao = $filtro['ordenacao'] ?? 'proxima_cobranca_carrossel';
        $direcao = 'ASC';
        if (strpos($ordenacao, '-') === 0) {
            $ordenacao = substr($ordenacao, 1);
            $direcao = 'DESC';
        }
        
        $ordenacoesPermitidas = ['id_vendedor', 'proxima_cobranca_carrossel', 'foi_pago_esse_mes_carrossel', 'nome_cliente'];
        if (in_array($ordenacao, $ordenacoesPermitidas)) {
            $sql .= " ORDER BY {$ordenacao} {$direcao}";
        }
        
        return $this->db->executeQuery($sql, $params);
    }
    
    public function atualizarCarrossel($idCarrossel, $dados) {
        $sql = "UPDATE carrossel SET 
                    link_carrossel = :link,
                    proxima_cobranca_carrossel = :proxima_cobranca,
                    foi_pago_esse_mes_carrossel = :pago
                WHERE id_carrossel = :id";
        
        $params = [
            ':link' => $dados['link_carrossel'],
            ':proxima_cobranca' => $dados['proxima_cobranca_carrossel'],
            ':pago' => $dados['foi_pago_esse_mes_carrossel'] ?? false,
            ':id' => $idCarrossel
        ];
        
        return $this->db->executeQuery($sql, $params);
    }
    
    public function atualizarImagensCarrossel($idCarrossel, $imagens) {
        $this->db->executeQuery("DELETE FROM imagem_carrossel WHERE id_carrossel = :id", [':id' => $idCarrossel]);
        
        $sql = "INSERT INTO imagem_carrossel (id_carrossel, endereco_imagem_carrossel) VALUES ";
        $values = [];
        $params = [];
        
        foreach ($imagens as $index => $imagem) {
            $values[] = "(:id, :imagem{$index})";
            $params[":imagem{$index}"] = $imagem;
        }
        
        $params[':id'] = $idCarrossel;
        $sql .= implode(", ", $values);
        
        return $this->db->executeQuery($sql, $params);
    }
    
    public function __destruct() {
        $this->db->disconnect();
    }
}

// Processamento das requisições
$gerenciador = new GerenciadorCarrossel();
$response = [];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $filtro = [
            'status_pagamento' => $_GET['status_pagamento'] ?? null,
            'data_inicio' => $_GET['data_inicio'] ?? null,
            'nome_vendedor' => $_GET['nome_vendedor'] ?? null,
            'ordenacao' => $_GET['ordenacao'] ?? 'proxima_cobranca_carrossel'
        ];
        
        $carrosseis = $gerenciador->listarCarrosseis($filtro);
        $response = ['success' => true, 'data' => $carrosseis];
    } 
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dados = [
            'link_carrossel' => $_POST['link_carrossel'],
            'proxima_cobranca_carrossel' => $_POST['proxima_cobranca_carrossel'],
            'foi_pago_esse_mes_carrossel' => $_POST['foi_pago_esse_mes_carrossel'] ?? false
        ];
        
        if empty($dados['link_carrossel']) {
            throw new Exception("O link do carrossel é obrigatório");
        }
        
        $sucesso = $gerenciador->atualizarCarrossel($_POST['id_carrossel'], $dados);
        
        if ($sucesso && !empty($_FILES['imagens'])) {
            $imagens = [];
            foreach ($_FILES['imagens']['tmp_name'] as $key => $tmp_name) {
                $target_dir = "../../uploads/carrossel/";
                $target_file = $target_dir . basename($_FILES['imagens']['name'][$key]);
                if (move_uploaded_file($tmp_name, $target_file)) {
                    $imagens[] = $target_file;
                }
            }
            $gerenciador->atualizarImagensCarrossel($_POST['id_carrossel'], $imagens);
        }
        
        $response = ['success' => true, 'message' => 'Carrossel atualizado com sucesso!'];
    }
} catch (Exception $e) {
    http_response_code(400);
    $response = ['success' => false, 'error' => $e->getMessage()];
}

header('Content-Type: application/json');
echo json_encode($response);
?>