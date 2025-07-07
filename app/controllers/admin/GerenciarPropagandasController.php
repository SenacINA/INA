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

        $propagandas = array_merge($propagandas_670x300, $propagandas_670x125);

        $dados = [
            'carrossel' => $carrossel,
            'propagandas' => $propagandas
        ];

        extract($dados);
        require_once("./app/views/admin/GerenciarPropagandas.php");
    }

    public function salvarImagemCarrossel($id_carrossel, $endereco)
    {
        return $this->model->adicionarImagemCarrossel($id_carrossel, $endereco);
    }

    public function salvarImagemPropaganda($tipo, $endereco, $index)
    {
        return $this->model->adicionarImagem($tipo, $endereco, $index);
    }

    public function uploadImagem()
    {
        if (!isset($_FILES['imagem']) || !isset($_POST['tipo'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Imagem ou tipo de propaganda não fornecido.']);
            return;
        }

        $tipo = $_POST['tipo'];
        $index = isset($_POST['index']) ? (int)$_POST['index'] : 0;

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
            $sucesso = $this->model->adicionarImagemCarrossel($enderecoImagem, $index);
        } else {
            $sucesso = $this->model->adicionarImagem($tipo, $enderecoImagem, $index);
        }

        if ($sucesso) {
            echo json_encode(['sucesso' => true, 'endereco' => $enderecoImagem]);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao salvar imagem no banco de dados.']);
        }
    }

    public function salvarImagemBase64Propaganda(string $base64, string $tipo, int $index = 0)
    {
        $baseDir = __DIR__ . '/../../../public/upload/propagandas/';

        if (!is_dir($baseDir)) {
            if (!mkdir($baseDir, 0755, true)) {
                error_log("Falha ao criar diretório: " . $baseDir);
                return false;
            }
        }

        if (!is_writable($baseDir)) {
            error_log("Diretório sem permissão de escrita: " . $baseDir);
            return false;
        }

        if (preg_match('/^data:image\/(\w+);base64,/', $base64, $tipoImagem)) {
            $ext = strtolower($tipoImagem[1]);
            $dataPart = substr($base64, strpos($base64, ',') + 1);
            $dadosBinarios = base64_decode($dataPart);

            if ($dadosBinarios === false || strlen($dadosBinarios) === 0) {
                error_log("Falha ao decodificar base64 ou dados vazios.");
                return false;
            }

            $nomeArquivo = 'propaganda_' . $index . '_' . time() . '.' . $ext;
            $absPath = $baseDir . $nomeArquivo;

            $bytesEscritos = file_put_contents($absPath, $dadosBinarios);

            if ($bytesEscritos === false) {
                error_log("Falha ao salvar imagem no caminho: " . $absPath);
                return false;
            }

            $enderecoRelativo = '/INA/public/upload/propagandas/' . $nomeArquivo;

            if ($tipo === 'carrossel') {
                $sucesso = $this->model->adicionarImagemCarrossel($enderecoRelativo, $index);
            } else {
                $sucesso = $this->model->adicionarImagem($tipo, $enderecoRelativo, $index);
            }

            if (!$sucesso) {
                error_log("Falha ao salvar registro da imagem no banco.");
                return false;
            }

            return $enderecoRelativo;
        } else {
            error_log("Formato da imagem base64 inválido.");
            return false;
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
