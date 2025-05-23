<?php
require_once __DIR__ . '/../connect.php';

class GerenciarCarrosselModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->db->connect();
    }

    /**
     * Lista todos os anúncios do carrossel com filtros
     */
    public function listarAnuncios($filtros = []): mixed
    {
        $conn = $this->db->getConnection();
        $query = "SELECT 
                    c.id_carrossel,
                    cl.nome_cliente as nome,
                    cl.email_cliente as email,
                    ha.ip_historico_acesso as ip,
                    cat.nome_categoria as categoria,
                    cl.cargo,
                    c.proxima_cobranca_carrossel as data_expiracao,
                    DATE_SUB(c.proxima_cobranca_carrossel, INTERVAL 
                        CASE 
                            WHEN c.foi_pago_esse_mes_carrossel = 1 THEN 30 
                            ELSE 7 
                        END DAY) as data_inicio,
                    CASE 
                        WHEN c.foi_pago_esse_mes_carrossel = 1 THEN 'Mensal'
                        ELSE 'Semanal' 
                    END as plano,
                    GROUP_CONCAT(ic.endereco_imagem_carrossel) as imagens
                  FROM carrossel c
                  JOIN vendedor v ON c.id_vendedor = v.id_vendedor
                  JOIN cliente cl ON v.id_cliente = cl.id_cliente
                  LEFT JOIN historico_acesso ha ON cl.id_cliente = ha.id_cliente
                  LEFT JOIN produto p ON v.id_vendedor = p.id_vendedor
                  LEFT JOIN categoria cat ON p.categoria_produto = cat.id_categoria
                  LEFT JOIN imagem_carrossel ic ON c.id_carrossel = ic.id_carrossel";

        $where = [];
        $params = [];

        // Filtros
        if (!empty($filtros['nome'])) {
            $where[] = "cl.nome_cliente LIKE :nome";
            $params[':nome'] = '%' . $filtros['nome'] . '%';
        }

        if (!empty($filtros['email'])) {
            $where[] = "cl.email_cliente LIKE :email";
            $params[':email'] = '%' . $filtros['email'] . '%';
        }

        if (!empty($filtros['plano'])) {
            $where[] = "c.foi_pago_esse_mes_carrossel = :plano";
            $params[':plano'] = $filtros['plano'] === 'Mensal' ? 1 : 0;
        }

        if (!empty($where)) {
            $query .= " WHERE " . implode(separator: " AND ", array: $where);
        }

        $query .= " GROUP BY c.id_carrossel";

        // Ordenação
        $ordenacoesPermitidas = [
            'ip' => 'ha.ip_historico_acesso',
            'nome' => 'cl.nome_cliente',
            'categoria' => 'cat.nome_categoria',
            'cargo' => 'cl.cargo',
            'data_inicio' => 'data_inicio',
            'data_expiracao' => 'c.proxima_cobranca_carrossel',
            'plano' => 'plano'
        ];

        if (!empty($filtros['ordenar_por']) && isset($ordenacoesPermitidas[$filtros['ordenar_por']])) {
            $direcao = (!empty($filtros['direcao']) && strtoupper(string: $filtros['direcao']) === 'DESC') ? 'DESC' : 'ASC';
            $query .= " ORDER BY " . $ordenacoesPermitidas[$filtros['ordenar_por']] . " " . $direcao;
        }

        $stmt = $conn->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca usuário por ID ou e-mail
     */
    public function buscarUsuario($id = null, $email = null): mixed
    {
        try {
            // Verifica se ao menos um parâmetro foi informado
            if (!$id && !$email) {
                throw new Exception("É necessário fornecer um ID ou um email para buscar um usuário.");
            }

            $query = "SELECT 
            cl.id_cliente,
            cl.nome_cliente AS nome,
            cl.email_cliente AS email,
            ha.ip_historico_acesso AS ip,
            cl.tipo_conta_cliente,
            c.proxima_cobrança_carrossel AS data_expiracao,
            CASE 
                WHEN c.foi_pago_esse_mes_carrossel = 1 THEN 'Mensal'
                ELSE 'Semanal' 
            END AS plano
          FROM cliente cl
          LEFT JOIN vendedor v ON v.id_cliente = cl.id_cliente
          LEFT JOIN carrossel c ON v.id_vendedor = c.id_vendedor
          LEFT JOIN historico_acesso ha ON cl.id_cliente = ha.id_cliente
          WHERE (cl.id_cliente = :id OR cl.email_cliente = :email)
          LIMIT 1";




            // Obtendo a conexão
            $conn = $this->db->getConnection();
            if (!$conn) {
                throw new Exception("Falha ao obter conexão com o banco de dados.");
            }

            // Preparando e executando a query
            $stmt = $conn->prepare($query);

            // Define os parâmetros corretamente
            if ($id) {
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            } else {
                $stmt->bindValue(':id', null, PDO::PARAM_NULL);
            }

            if ($email) {
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            } else {
                $stmt->bindValue(':email', null, PDO::PARAM_NULL);
            }

            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            return $usuario ?: 'ñ user'; // Retorna null se nenhum usuário for encontrado

        } catch (Exception $e) {
            
            return "Erro ao buscar usuário: " . $e->getMessage();
        }
    }

    /**
     * Atualiza dados do anúncio no carrossel
     */
    // public function atualizarAnuncio($idCarrossel, $dados): mixed
    // {
    //     $conn = $this->db->getConnection();
    //     $query = "UPDATE carrossel SET
    //                 proxima_cobranca_carrossel = :data_expiracao,
    //                 foi_pago_esse_mes_carrossel = :plano_pago
    //               WHERE id_carrossel = :id";

    //     $planoPago = ($dados['plano'] === 'Mensal') ? 1 : 0;
    //     $dataExpiracao = $dados['data_expiracao'];

    //     $stmt = $conn->prepare($query);
    //     $stmt->bindParam(':data_expiracao', $dataExpiracao);
    //     $stmt->bindParam(':plano_pago', $planoPago);
    //     $stmt->bindParam(':id', $idCarrossel);

    //     return $stmt->execute();
    // }

    // /**
    //  * Atualiza dados do usuário
    //  */
    // public function atualizarUsuario($idCliente, $dados): mixed
    // {
    //     $query = "UPDATE cliente SET
    //                 nome_cliente = :nome,
    //                 cargo = :cargo
    //               WHERE id_cliente = :id";

    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':nome', $dados['nome']);
    //     $stmt->bindParam(':cargo', $dados['cargo']);
    //     $stmt->bindParam(':id', $idCliente);

    //     return $stmt->execute();
    // }
}
