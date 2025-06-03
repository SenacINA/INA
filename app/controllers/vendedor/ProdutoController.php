<?php

require_once __DIR__ . '/../../models/vendedor/ProdutoModel.php';

class ProdutoController extends RenderView
{
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

        $imagensSalvas = [];

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

        // Criação do produto
        $model = new ProdutoModel();
        $produtoId = $model->createProduto(
            (int)$_SESSION['cliente_id'],  // ID do vendedor
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
        
        if (!$produtoId) {
            $errors[] = "Erro ao cadastrar o produto. Tente novamente.";
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
            return;
        }

        // Processamento das imagens
        if (!empty($imagensBase64)) {
            $uploadDir = __DIR__ . '/../../../public/upload/produtos/';
            
            // Verifica/Cria diretório
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            foreach ($imagensBase64 as $index => $base64) {
                if (preg_match('/^data:image\/(\w+);base64,/', $base64, $matches)) {
                    $extensao = strtolower($matches[1]);
                    $dadosBinarios = base64_decode(substr($base64, strpos($base64, ',') + 1));
                    
                    // Valida tamanho máximo (4MB)
                    $maxSize = 4 * 1024 * 1024;
                    if (strlen($dadosBinarios) > $maxSize) {
                        continue; // Ignora imagem muito grande
                    }
                    
                    // Gera nome único para o arquivo
                    $nomeArquivo = 'produto_' . time() . '_' . $index . '.webp';
                    $caminhoCompleto = $uploadDir . $nomeArquivo;
                    
                    // Converte e salva como WebP
                    if ($this->converterParaWebP($dadosBinarios, $caminhoCompleto, $extensao)) {
                        $imagensSalvas[] = '/upload/produtos/' . $nomeArquivo;
                    }
                }
            }
            
            // Salva caminhos das imagens no banco
            $this->salvarImagensProduto($produtoId, $imagensSalvas);
        }

        // Limpeza em caso de erro nas imagens
        if (empty($imagensSalvas)) {
            $model->deletarProduto($produtoId);
            $errors[] = "Falha ao processar imagens do produto";
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
            return;
        }

        $this->loadView('vendedor/EditarProduto', [
            'dadosProduto' => $produtoId,
            'imagens' => $imagensSalvas
        ]);
    }

    private function converterParaWebP($dadosBinarios, $caminhoDestino, $formatoOriginal)
    {
        try {
            // Se já for WebP, salva diretamente
            if ($formatoOriginal === 'webp') {
                return file_put_contents($caminhoDestino, $dadosBinarios) !== false;
            }

            // Cria imagem a partir dos dados binários
            // erro aqui
            $imagem = imagecreatefromstring($dadosBinarios);
            if ($imagem === false) {
                return false;
            }

            // Salva como WebP (qualidade 80%)
            $result = imagewebp($imagem, $caminhoDestino, 80);
            imagedestroy($imagem);
            return $result;
        } catch (Exception $e) {
            error_log("Erro conversão imagem: " . $e->getMessage());
            return false;
        }
    }

    private function salvarImagensProduto($produtoId, $caminhosImagens)
    {
        $model = new ProdutoModel();
        foreach ($caminhosImagens as $index => $caminho) {
            $model->adicionarImagemProduto($produtoId, $caminho, $index + 1);
        }
    }
}