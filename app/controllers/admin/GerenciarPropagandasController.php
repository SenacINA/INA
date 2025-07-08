<?php
require_once('./app/models/admin/GerenciarPropagandasModel.php');



class GerenciarPropagandasController
{
    private GerenciarPropagandasModel $model;

    public function __construct()
    {
        $this->model = new GerenciarPropagandasModel();
    }

    public function index()
    {
        $carrossel = $this->model->listarImagensCarrossel();
        $propagandas_670x300 = $this->model->listarImagensPorTipo('670x300', 2);
        $propagandas_670x125 = $this->model->listarImagensPorTipo('670x125', 2);

        $dados = [
            'carrossel' => $carrossel,
            'propagandas_300' => $propagandas_670x300,
            'propagandas_125' => $propagandas_670x125
        ];

        extract($dados);
        require_once("./app/views/admin/GerenciarPropagandas.php");
    }

    private function apagarArquivoAntigo(string $caminhoRelativo)
    {
        $caminhoAbsoluto = __DIR__ . '/../../../public' . $caminhoRelativo;
        if (file_exists($caminhoAbsoluto)) {
            unlink($caminhoAbsoluto);
        }
    }

    public function substituirImagemPropaganda(string $tipo, string $novoEndereco, int $index = 0, bool $ativo = true)
    {
        $imagemAntiga = $this->model->buscarImagemPropagandaPorTipoEIndex($tipo, $index);
        if ($imagemAntiga) {
            $this->apagarArquivoAntigo($imagemAntiga);
        }

        return $this->model->inserirOuAtualizarImagemPropaganda($tipo, $novoEndereco, $index, $ativo);
    }

    public function substituirImagemCarrossel(string $novoEndereco, int $index = 0, bool $ativo = true)
    {
        $imagemAntiga = $this->model->buscarImagemCarrosselPorIndex($index);
        if ($imagemAntiga) {
            $this->apagarArquivoAntigo($imagemAntiga);
        }
        return $this->model->inserirOuAtualizarImagemCarrossel($novoEndereco, $index, $ativo);
        
    }

    public function uploadImagem()
    {
        if (!isset($_FILES['imagem']) || !isset($_POST['tipo'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Imagem ou tipo de propaganda não fornecido.']);
            return;
        }

        $tipo = strtolower($_POST['tipo']);
        $index = isset($_POST['index']) ? (int)$_POST['index'] : 0;

        $tiposValidos = ['670x300', '670x125', 'carrossel'];
        if (!in_array($tipo, $tiposValidos)) {
            http_response_code(400);
            echo json_encode(['erro' => 'Tipo de propaganda inválido.']);
            return;
        }

        $uploadDir = __DIR__ . '/../../../public/upload/propagandas/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid("img_", true) . '.' . $ext;
        $caminhoCompleto = $uploadDir . DIRECTORY_SEPARATOR . $nomeArquivo;

        if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            http_response_code(500);
            echo json_encode(['erro' => 'Falha no upload do arquivo.']);
            return;
        }

        $enderecoImagem = '/INA/public/upload/propagandas/' . $nomeArquivo;

        if ($tipo === 'carrossel') {
            $sucesso = $this->substituirImagemCarrossel($enderecoImagem, $index, true);
        } else {
            $sucesso = $this->substituirImagemPropaganda($tipo, $enderecoImagem, $index, true);
        }

        if ($sucesso) {
            echo json_encode(['sucesso' => true, 'endereco' => $enderecoImagem]);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao salvar imagem no banco de dados.']);
        }
    }

    public function limparDuplicatasAction()
    {
        $resultado = $this->model->limparDuplicatas();

        if (isset($resultado['sucesso'])) {
            echo json_encode($resultado);
        } else {
            http_response_code(500);
            echo json_encode($resultado);
        }
    }

    public function GerenciarPropagandasApi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->uploadImagem();
        } else {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido']);
        }
    }
}
