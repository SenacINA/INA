<?php    
require_once __DIR__.'/../../models/admin/AdminModel.php';

class AdminController extends RenderView {

    public function dashboard() {
        $this->loadView('admin/dashboard', []);
    }

    public function perfil() {
        $this->loadView('admin/perfil_admin', []);
    }

    public function aprovarVendedor() {
        $this->loadView('admin/aprovar_vendedor', []);
    }

    public function atualizarUsuario() {
        $this->loadView('admin/atualizar_usuario', []);
    }

    public function gerenciarUsuarios() {
        $this->loadView('admin/gerenciar_usuario', []);
    }

    public function gerenciarProdutos() {
        $this->loadView('admin/gerenciar_produtos', []);
    }

    public function gerenciarCarrossel() {
        $this->loadView('admin/gerenciar_carrossel', []);
    }

    public function relatorioVendedor() {
        $this->loadView('admin/relatorio_vendedor', []);
    }

    public function historicoAcesso() {
        $this->loadView('admin/historico_acesso', []);
    }

    public function adminCarrossel() {
        $this->loadView('admin/admin_carrossel', []);
    }

    public function searchUser() {

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                exit;
            }
        
            header('Content-Type: application/json; charset=utf-8');
        
            $id = trim($_POST['idUsuario'] ?? '');
            $email = trim($_POST['emailUsuario'] ?? '');
        
            if (!$id && !$email) {
                echo json_encode([
                    'success' => false,
                    'errors'  => ['Informe o ID ou o e-mail para realizar a busca.']
                ], JSON_UNESCAPED_UNICODE);
                exit;
            }
        
            $model = new AdminModel();
            $result = $model->pesquisarUsuario($id, $email);
        
            if ($result) {
                echo json_encode([
                    'success' => true,
                    'data'    => $result
                ], JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode([
                    'success' => false,
                    'errors'  => ['Nenhum cliente encontrado com os dados informados.']
                ], JSON_UNESCAPED_UNICODE);
            }
            exit;
        }

        public function updateUser() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $model = new AdminModel();
        
                $dados = [
                    'id' => $_POST['id'] ?? null,
                    'nomeInput' => $_POST['nomeInput'] ?? '',
                    'senhaInput' => $_POST['senhaInput'] ?? '',
                    'emailInput' => $_POST['emailInput'] ?? '',
                    'cpfInput' => $_POST['cpfInput'] ?? '',
                    'telefoneInput' => $_POST['telefoneInput'] ?? '',
                    'cepInput' => $_POST['cepInput'] ?? '',
                    'estadoInput' => $_POST['estadoInput'] ?? '',
                    'cidadeInput' => $_POST['cidadeInput'] ?? '',
                    'bairroInput' => $_POST['bairroInput'] ?? '',
                    'enderecoInput' => $_POST['enderecoInput'] ?? '',
                    'numeroInput' => $_POST['numeroInput'] ?? '',
                    'tipoConta' => isset($_POST['adminCheckbox']) ? 0 : (isset($_POST['clienteCheckbox']) ? 1 : 2),
                    'status' => isset($_POST['statusCheckbox']) ? 1 : 0
                ];
        
                $sucesso = $model->atualizarUsuario($dados);
        
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => $sucesso,
                    'message' => $sucesso ? 'Dados atualizados com sucesso!' : 'Erro ao atualizar dados.'
                ]);
                exit;
            }
        }
        
}
