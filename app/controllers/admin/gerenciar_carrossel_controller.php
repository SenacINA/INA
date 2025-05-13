<?php
require_once __DIR__ . '/models/admin/gerenciar_carrossel_models.php';

class CarrosselController {
    private $model;

    public function __construct() {
        $this->model = new CarrosselModel();
        $this->verificarAutenticacao();
    }

    /**
     * Verifica se o usuário está autenticado como admin
     */
    private function verificarAutenticacao() {
        if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
            header("Location: /login.php?error=acesso_negado");
            exit();
        }
    }

    /**
     * Lista os anúncios com filtros
     */
    public function listarAnuncios() {
        $filtros = [
            'nome' => $_GET['nome'] ?? null,
            'email' => $_GET['email'] ?? null,
            'plano' => $_GET['plano'] ?? null,
            'ordenar_por' => $_GET['ordenar_por'] ?? 'data_expiracao',
            'direcao' => $_GET['direcao'] ?? 'ASC'
        ];

        try {
            $anuncios = $this->model->listarAnuncios($filtros);
            
            // Formata os dados para a view
            foreach ($anuncios as &$anuncio) {
                $anuncio['data_inicio'] = date('d/m/Y', strtotime($anuncio['data_inicio']));
                $anuncio['data_expiracao'] = date('d/m/Y', strtotime($anuncio['data_expiracao']));
                $anuncio['imagens'] = explode(',', $anuncio['imagens']);
            }
            
            return $anuncios;
        } catch (Exception $e) {
            // Log do erro
            error_log("Erro ao listar anúncios: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Busca usuário por ID ou e-mail
     */
    public function buscarUsuario($id = null, $email = null) {
        try {
            $usuario = $this->model->buscarUsuario($id, $email);
            
            if ($usuario) {
                // Formata os dados para a view
                $usuario['data_expiracao'] = date('Y-m-d', strtotime($usuario['data_expiracao']));
                return $usuario;
            }
            
            return null;
        } catch (Exception $e) {
            error_log("Erro ao buscar usuário: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Atualiza dados do anúncio e usuário
     */
    public function atualizarAnuncio($dados) {
        try {
            // Validação dos dados
            if (empty($dados['nome']) || empty($dados['cargo']) || empty($dados['data_expiracao']) || empty($dados['plano'])) {
                throw new Exception("Todos os campos são obrigatórios");
            }

            if (!in_array($dados['plano'], ['Semanal', 'Mensal', 'Bimestral'])) {
                throw new Exception("Tipo de plano inválido");
            }

            // Atualiza usuário
            $dadosUsuario = [
                'nome' => $dados['nome'],
                'cargo' => $dados['cargo']
            ];
            $this->model->atualizarUsuario($dados['id_cliente'], $dadosUsuario);

            // Atualiza anúncio
            $dadosAnuncio = [
                'data_expiracao' => $dados['data_expiracao'],
                'plano' => $dados['plano']
            ];
            $this->model->atualizarAnuncio($dados['id_carrossel'], $dadosAnuncio);

            return true;
        } catch (Exception $e) {
            error_log("Erro ao atualizar anúncio: " . $e->getMessage());
            throw $e;
        }
    }
}
?>