<?php
require_once './app/models/admin/GerenciarCarrosselModel.php';

class CarrosselController {
    private $model;

    public function __construct() {
        $this->model = new CarrosselModel();
        $this->verificarAutenticacao();
    }

    /**
     * Verifica se o usuário está autenticado como admin
     */
    private function verificarAutenticacao(): void {
        if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
            header("Location: /login.php?error=acesso_negado");
            exit();
        }
    }

    /**
     * Lista os anúncios com filtros
     */
    public function listarAnuncios(): mixed {
        $filtros = [
            'nome' => $_GET['nome'] ?? null,
            'email' => $_GET['email'] ?? null,
            'plano' => $_GET['plano'] ?? null,
            'ordenar_por' => $_GET['ordenar_por'] ?? 'data_expiracao',
            'direcao' => $_GET['direcao'] ?? 'ASC'
        ];

        try {
            $anuncios = $this->model->listarAnuncios(filtros: $filtros);
            
            // Formata os dados para a view
            foreach ($anuncios as &$anuncio) {
                $anuncio['data_inicio'] = date(format: 'd/m/Y', timestamp: strtotime(datetime: $anuncio['data_inicio']));
                $anuncio['data_expiracao'] = date(format: 'd/m/Y', timestamp: strtotime(datetime: $anuncio['data_expiracao']));
                $anuncio['imagens'] = explode(separator: ',', string: $anuncio['imagens']);
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
    public function buscarUsuario($id = null, $email = null): mixed {
        try {
            $usuario = $this->model->buscarUsuario($id, email: $email);
            
            if ($usuario) {
                // Formata os dados para a view
                $usuario['data_expiracao'] = date(format: 'Y-m-d', timestamp: strtotime(datetime: $usuario['data_expiracao']));
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
    public function atualizarAnuncio($dados): bool {
        try {
            // Validação dos dados
            if (empty($dados['nome']) || empty($dados['cargo']) || empty($dados['data_expiracao']) || empty($dados['plano'])) {
                throw new Exception("Todos os campos são obrigatórios");
            }

            if (!in_array($dados['plano'], haystack: ['Semanal', 'Mensal', 'Bimestral'])) {
                throw new Exception(message: "Tipo de plano inválido");
            }

            // Atualiza usuário
            $dadosUsuario = [
                'nome' => $dados['nome'],
                'cargo' => $dados['cargo']
            ];
            $this->model->atualizarUsuario(idCliente: $dados['id_cliente'], dados: $dadosUsuario);

            // Atualiza anúncio
            $dadosAnuncio = [
                'data_expiracao' => $dados['data_expiracao'],
                'plano' => $dados['plano']
            ];
            $this->model->atualizarAnuncio(idCarrossel: $dados['id_carrossel'], dados: $dadosAnuncio);

            return true;
        } catch (Exception $e) {
            error_log(message: "Erro ao atualizar anúncio: " . $e->getMessage());
            throw $e;
        }
    }
}
?>