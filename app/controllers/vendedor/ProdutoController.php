<?php

require_once __DIR__ . '/../../models/vendedor/ProdutoModel.php';
require_once __DIR__ . '/../../models/vendedor/VendedorModel.php';


class ProdutoController extends RenderView
{
    public function __construct()
    {
        if (!isset($_SESSION['user_type']) || !isset($_SESSION['cliente_id'])) {
            header('Location: Login');
            exit;
        }
    }

    public function produto()
    {
        $errors = [];

        // Verifica se os campos obrigatórios estão preenchidos
        $nome = $_POST['nomeProduto'] ?? '';
        $valor = $_POST['valorProduto'] ?? '';
        $codigo = $_POST['codigoProduto'] ?? '';
        $unidade = $_POST['estoqueProduto'] ?? '';
        $origem = $_POST['origemProduto'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $imagensBase64 = json_decode($_POST['produto_imagens'] ?? '[]', true) ?: [];

        if (!is_array($imagensBase64)) {
            $imagensBase64 = [];
        }

        $imagensSalvas = []; // Armazena os caminhos das imagens salvas

        if (count($imagensBase64) < 1) {
            $errors[] = 'Pelo menos uma imagem deve ser adicionada.';
        }

        if (empty($nome)) {
            $errors[] = "O nome do produto é obrigatório.";
        }

        if (!is_numeric($valor) || $valor <= 0) {
            $errors[] = "O valor do produto deve ser um número válido e maior que zero.";
        }

        if (empty($codigo)) {
            $errors[] = "O código do produto é obrigatório.";
        }

        if (!is_numeric($unidade) || $unidade < 0) {
            $errors[] = "A quantidade em estoque deve ser um número válido e maior ou igual a zero.";
        }

        if (empty($origem)) {
            $errors[] = "A origem do produto é obrigatória.";
        }

        if (empty($descricao)) {
            $errors[] = "A descrição do produto é obrigatória.";
        }

        // Se houver erros, retorna para a tela de registro com mensagens
        if (!empty($errors)) {
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
            return;
        }

        // Dados opcionais
        $marca = $_POST['marcaProduto'] ?? '';
        $peso = $_POST['pesoProduto'] ?? '';
        $pesoBruto = $_POST['pesoBrutoProduto'] ?? '';
        $largura = $_POST['larguraProduto'] ?? '';
        $altura = $_POST['alturaProduto'] ?? '';
        $comprimento = $_POST['comprimentoProduto'] ?? '';
        $categoria = isset($_POST['categoriaProduto']) ? (int)$_POST['categoriaProduto'] : 1;
        $subCategoria = isset($_POST['subCategoriaProduto']) ? (int)$_POST['subCategoriaProduto'] : 1;

        // Promoção opcional
        if (isset($_POST['toggle-group'])) {
            $promocao = $_POST['tipoPromocaoProduto'] ?? '';
            $desconto = $_POST['produtoDescontPromo'] ?? '';
            $inicio = $_POST['promoDataInicio'] ?? '';
            $fim = $_POST['promoDataFim'] ?? '';
            $inicio_horario = $_POST['promoHoraInicio'] ?? '';
            $fim_horario = $_POST['promoHoraFim'] ?? '';
        }

        $vendedorModel = new VendedorModel();


        $vendedorId = $vendedorModel->getVendedorId($_SESSION['cliente_id']);
        if (!$vendedorId) {
            $errors[] = "Cliente não possui cadastro de vendedor";
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
            return;
        }

        $lastCod = $vendedorModel->getLastCod($vendedorId);

        if ($lastCod == $codigo) {
            $errors[] = "Esse código já foi usado";
        }

        // Após obter $categoria e $subCategoria
        $modelTemp = new ProdutoModel();

        // Garanta que os valores são numéricos
        $categoria = is_numeric($categoria) ? (int)$categoria : 1;
        $subCategoria = is_numeric($subCategoria) ? (int)$subCategoria : 1;

        // Validação da categoria
        if (!$modelTemp->categoriaExiste($categoria)) {
            $errors[] = "Categoria inválida. A categoria selecionada não existe no sistema.";
            $categoria = 1; // Usar categoria padrão
        }

        // Validação da subcategoria
        if (!$modelTemp->subcategoriaExiste($subCategoria)) {
            $errors[] = "Subcategoria inválida. A subcategoria selecionada não existe no sistema.";
            $subCategoria = 1; // Usar subcategoria padrão
        }

        // Validação da relação entre categoria e subcategoria
        if (!$modelTemp->subcategoriaPertenceACategoria($subCategoria, $categoria)) {
            $errors[] = "A subcategoria selecionada não pertence à categoria escolhida.";
            $subCategoria = 1; // Usar subcategoria padrão
        }

        if (!empty($errors)) {
            // $errors[] = "O produto foi cadastrado usando a categoria/subcategoria padrão 'Geral'.";
            $this->loadView('vendedor/RegistroProduto', [
                'errors' => $errors,
                'proxCod' => $lastCod + 1 
            ]);
            return;
        }

        // Criação do produto
        $model = new ProdutoModel();
        $produtoId = $model->createProduto(
            $vendedorId,
            (int)$codigo,
            (string)$nome,                 // Nome do produto
            (float)$valor,                 // Preço
            (int)$categoria,               // Categoria
            (int)$subCategoria,            // Subcategoria
            (string)$origem,               // Origem
            (int)$unidade,                 // Unidade em estoque
            (float)$peso,                  // Peso líquido
            (float)$pesoBruto,             // Peso bruto
            (float)$largura,               // Largura
            (float)$altura,                // Altura
            (float)$comprimento,           // Comprimento
            (string)$descricao,            // Descrição
            true                           // Status do produto (ativo)
        );
        if (isset($_POST['toggle-group'])) {
            echo $promocao;
            $promocao = $model->createPromocao($produtoId, true, $promocao, $desconto, $inicio, $fim, $inicio_horario, $fim_horario);
        }

        if (!$produtoId) {
            $errors[] = "Erro ao cadastrar o produto. Tente novamente.";
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
            return;
        }

        // Processamento das imagens
        if (!empty($imagensBase64)) {
            $baseDir = __DIR__ . '/../../../public/upload/produtos/' . $produtoId . '/';

            // Verifica/Cria diretório
            if (!is_dir($baseDir)) {
                if (!mkdir($baseDir, 0755, true)) {
                    error_log("Falha ao criar diretório: " . $baseDir);
                }
            }

            // Verifica permissão de escrita
            if (!is_writable($baseDir)) {
                error_log("Diretório não tem permissão de escrita: " . $baseDir);
            }

            foreach ($imagensBase64 as $index => $base64) {
                if (preg_match('/^data:image\/webp;base64,/', $base64)) {
                    // Extrai apenas os dados binários
                    $dataPart = substr($base64, strpos($base64, ',') + 1);
                    $dadosBinarios = base64_decode($dataPart);

                    // Verifica se decodificou corretamente
                    if ($dadosBinarios === false) {
                        error_log("Falha ao decodificar base64 na imagem: " . $index);
                        continue;
                    }

                    // Verifica tamanho dos dados
                    if (strlen($dadosBinarios) === 0) {
                        error_log("Dados binários vazios para a imagem: " . $index);
                        continue;
                    }

                    // Gera nome único para o arquivo
                    $nomeArquivo = 'imagem_' . ($index + 1) . '_' . time() . '.webp';
                    $absPath = $baseDir . $nomeArquivo;

                    // Salva a imagem
                    $bytesEscritos = file_put_contents($absPath, $dadosBinarios);

                    if ($bytesEscritos !== false) {
                        $caminhoRelativo = '/upload/produtos/' . $produtoId . '/' . $nomeArquivo;
                        $imagensSalvas[] = $caminhoRelativo;

                        // Salva no banco de dados
                        $model->adicionarImagemProduto(
                            $produtoId,
                            $caminhoRelativo,
                            $index + 1
                        );

                        error_log("Imagem salva com sucesso: " . $absPath . " (" . $bytesEscritos . " bytes)");
                    } else {
                        error_log("Falha ao salvar imagem: " . $absPath);
                    }
                } else {
                    error_log("Formato de imagem inválido: " . substr($base64, 0, 50) . "...");
                }
            }
        }

        $_SESSION['successMessage'] = "Produto cadastrado com sucesso!";
        header('Location: Perfil');
        exit;
    }

    private function getVendedorId(int $clienteId): ?int
    {
        $db = new Database();
        $db->connect();

        $sql = "SELECT id_vendedor FROM vendedor WHERE id_cliente = :id_cliente";
        $stmt = $db->getConnection()->prepare($sql);
        $stmt->bindValue(':id_cliente', $clienteId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['id_vendedor'] : null;
    }
}
