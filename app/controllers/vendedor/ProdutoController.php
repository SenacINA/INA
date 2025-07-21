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
            $this->loadView('vendedor/RegistroProduto', [
                'errors' => $errors,
                'proxCod' => ($codigo)
            ]);
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

        $promocaoAtiva = isset($_POST['toggle-group']);
        if ($promocaoAtiva) {
            $promocao       = (int)($_POST['tipoPromocaoProduto'] ?? 0);
            $desconto       = $_POST['produtoDescontPromo'] ?? '';
            $inicio         = $_POST['promoDataInicio'] ?? '';
            $fim            = $_POST['promoDataFim'] ?? '';
            $inicio_horario = $_POST['promoHoraInicio'] ?? '';
            $fim_horario    = $_POST['promoHoraFim'] ?? '';

            if (!in_array($promocao, [1, 2])) {
                $errors[] = "Tipo de promoção inválido.";
            }
            if (!is_numeric($desconto) || $desconto <= 0) {
                $errors[] = "O valor do desconto deve ser um número positivo.";
            }
            if ($promocao === 2) {
                $descontoValor = ($valor * $desconto) / 100;
                if ($descontoValor >= $valor) {
                    $errors[] = "O desconto em porcentagem não pode ser igual ou maior que 100%.";
                }
            } elseif ($promocao === 1) {
                if ($desconto >= $valor) {
                    $errors[] = "O desconto em valor fixo não pode ser maior ou igual ao valor do produto.";
                }
            }
            if (empty($inicio) || empty($fim) || empty($inicio_horario) || empty($fim_horario)) {
                $errors[] = "Todos os campos de data e horário da promoção são obrigatórios.";
            }
            $dataInicio = DateTime::createFromFormat('Y-m-d H:i', $inicio . ' ' . $inicio_horario);
            $dataFim    = DateTime::createFromFormat('Y-m-d H:i', $fim    . ' ' . $fim_horario);
            if (!$dataInicio || !$dataFim) {
                $errors[] = "Formato de data/horário inválido.";
            } elseif ($dataInicio > $dataFim) {
                $errors[] = "A data/horário de término deve ser posterior ao início.";
            }
        }

        $vendedorModel = new VendedorModel();


        $vendedorId = $vendedorModel->getVendedorId($_SESSION['cliente_id']);
        if (!$vendedorId) {
            $errors[] = "Cliente não possui cadastro de vendedor";
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
            return;
        }

        $existe = $vendedorModel->codJaExiste($vendedorId, $codigo);

        if ($existe) {
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
                'proxCod' => ($codigo + 1)
            ]);
            return;
        }

        // Criação do produto
        $model = new ProdutoModel();
        $produtoId = $model->createProduto(
            $vendedorId,
            (string)$nome,                 // Nome do produto
            (float)$valor,                 // Preço
            (string)$marca,                // Marca                
            (int)$codigo,
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
            1                           // Status do produto (ativo)
        );


        if (!$produtoId) {
            $errors[] = "Erro ao cadastrar o produto. Tente novamente.";
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
            return;
        }

        if ($promocaoAtiva) {
            $promoSuccess = $model->createPromocao(
                $produtoId,
                true,            // ativo
                $promocao,       // tipo
                $desconto,       // valor ou %
                $inicio,
                $fim,
                $inicio_horario,
                $fim_horario
            );
            if (!$promoSuccess) {
                error_log("Falha ao criar promoção para produto ID {$produtoId}");
            }
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

    public function searchProductJson()
    {
        header('Content-Type: application/json; charset=utf-8');

        $nome = $_POST['name'] ?? '';
        $cod  = $_POST['code'] ?? '';
        

        $model = new VendedorModel();

        if (!isset($_POST['vendedor_id'])) {
            $idVendedor = $model->getVendedorId($_SESSION['cliente_id']);
    
            if ($idVendedor < 1 || ($nome === '' && $cod === '')) {
                echo json_encode(['success' => false, 'message' => 'Informe nome ou código.']);
                exit;
            }
        } else {
            $idVendedor = $_POST['vendedor_id'];
        }


        $model = new ProdutoModel();
        $prod = $model->searchProduct($nome, $cod, $idVendedor);

        if (!$prod) {
            echo json_encode(['success' => false, 'message' => 'Produto não encontrado.']);
        } else {
            echo json_encode(['success' => true, 'data' => $prod]);
        }
        exit;
    }

    public function atualizarProduto()
    {
        $errors = [];
        $produtoId = $_POST['produtoId'] ?? null;

        if (!$produtoId) {
            $errors[] = "Produto não especificado.";
            $_SESSION['errors'] = $errors;
            header("Location: EditarProduto?id=$produtoId");
            exit;
        }

        $vendedorModel = new VendedorModel();
        $vendedorId = $vendedorModel->getVendedorId($_SESSION['cliente_id']);

        if (!$vendedorId) {
            $errors[] = "Cliente não possui cadastro de vendedor";
            $_SESSION['errors'] = $errors;
            header("Location: EditarProduto?id=$produtoId");
            exit;
        }

        $produtoModel = new ProdutoModel();
        $produto = $produtoModel->getProdutoById($produtoId);

        if (!$produto || $produto['id_vendedor'] != $vendedorId) {
            $errors[] = "Produto não encontrado ou não pertence a este vendedor.";
            $_SESSION['errors'] = $errors;
            header("Location: EditarProduto?id=$produtoId");;
            exit;
        }

        // Validações básicas
        $nome = $_POST['nomeProduto'] ?? '';
        $valor = $_POST['valorProduto'] ?? '';
        $codigo = $_POST['codigoProduto'] ?? '';
        $unidade = $_POST['estoqueProduto'] ?? '';
        $origem = $_POST['origemProduto'] ?? '';
        $descricao = $_POST['descricao'] ?? '';

        if (empty($nome)) $errors[] = "O nome do produto é obrigatório.";
        if (!is_numeric($valor) || $valor <= 0) $errors[] = "Valor inválido. Confira a promoção.";
        if (empty($codigo)) $errors[] = "Código do produto é obrigatório.";
        if (!is_numeric($unidade) || $unidade < 0) $errors[] = "Estoque inválido.";
        if (empty($origem)) $errors[] = "Origem do produto é obrigatória.";
        if (empty($descricao)) $errors[] = "Descrição do produto é obrigatória.";

        // Campos opcionais
        $marca = $_POST['marcaProduto'] ?? '';
        $peso = $_POST['pesoProduto'] ?? 0;
        $pesoBruto = $_POST['pesoBrutoProduto'] ?? 0;
        $largura = $_POST['larguraProduto'] ?? 0;
        $altura = $_POST['alturaProduto'] ?? 0;
        $comprimento = $_POST['comprimentoProduto'] ?? 0;
        $categoria = (int)($_POST['categoriaProduto'] ?? 1);
        $subCategoria = (int)($_POST['subCategoriaProduto'] ?? 1);
        $codAntigo = $_POST['cod_atual'] ?? '';
        $promocao = $_POST['tipoPromocaoProduto'] ?? '';

        $existe = $vendedorModel->codJaExiste($vendedorId, $codigo, $produtoId);
        if ($existe && $codigo != $codAntigo) {
            $errors[] = "Este código já está em uso por outro produto.";
        }

        if (!$produtoModel->categoriaExiste($categoria)) {
            $errors[] = "Categoria inválida.";
            $categoria = 1;
        }

        if (!$produtoModel->subcategoriaExiste($subCategoria)) {
            $errors[] = "Subcategoria inválida.";
            $subCategoria = 1;
        }

        if (!$produtoModel->subcategoriaPertenceACategoria($subCategoria, $categoria)) {
            $errors[] = "Subcategoria não pertence à categoria selecionada.";
            $subCategoria = 1;
        }

        // Verificação da promoção
        $promocaoData = $produtoModel->getPromocaoByProdutoId($produtoId);

        // Validação da promoção
        $promocaoAtiva = isset($_POST['toggle-group']) && $_POST['toggle-group'] === 'on';

        if ($promocaoAtiva) {
            $promocaoTipo = $_POST['tipoPromocaoProduto'] ?? null;
            $desconto = $_POST['produtoDescontPromo'] ?? null;

            // Validação do tipo de promoção
            if (!in_array($promocaoTipo, [1, 2])) {
                $errors[] = "Tipo de promoção inválido.";
            }

            // Validação do valor do desconto
            if (!is_numeric($desconto) || $desconto <= 0) {
                $errors[] = "O valor do desconto deve ser um número positivo.";
            }

            // Verificação se o desconto não ultrapassa o valor do produto
            if ($promocaoTipo == 2) {
                $descontoValor = ($valor * $desconto) / 100;
                if ($descontoValor >= $valor) {
                    $errors[] = "O desconto em porcentagem não pode ser igual ou maior que 100%.";
                }
            } elseif ($promocaoTipo == 1) {
                if ($desconto >= $valor) {
                    $errors[] = "O desconto em valor fixo não pode ser maior ou igual ao valor do produto.";
                }
            }

            // Validação das datas/horários
            $inicio = $_POST['promoDataInicio'] ?? null;
            $fim = $_POST['promoDataFim'] ?? null;
            $inicio_horario = $_POST['promoHoraInicio'] ?? null;
            $fim_horario = $_POST['promoHoraFim'] ?? null;

            if (empty($inicio) || empty($fim) || empty($inicio_horario) || empty($fim_horario)) {
                $errors[] = "Todos os campos da promoção são obrigatórios quando ativada";
            }

            // Validação se data final é maior que inicial
            $dataInicio = DateTime::createFromFormat('Y-m-d H:i', $inicio . ' ' . $inicio_horario);
            $dataFim = DateTime::createFromFormat('Y-m-d H:i', $fim . ' ' . $fim_horario);

            if ($dataInicio > $dataFim) {
                $errors[] = "A data/horário de término da promoção deve ser posterior à data de início.";
            }
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            header('Location: EditarProduto?id=' . $produtoId);
            exit;
        }

        // Atualizar produto
        $success = $produtoModel->updateProduto(
            $produtoId,
            $nome,
            $valor,
            $marca,
            $codigo,
            $categoria,
            $subCategoria,
            $origem,
            $unidade,
            $peso,
            $pesoBruto,
            $largura,
            $altura,
            $comprimento,
            $descricao
        );

        if (!$success) {
            $errors[] = "Erro ao atualizar o produto. Tente novamente.";
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            header('Location: EditarProduto?id=' . $produtoId);
            exit;
        }

        // Gerenciar promoção
        $promocaoSuccess = true;
        if ($promocaoAtiva) {
            if ($promocaoData) {
                $promocaoSuccess = $produtoModel->updatePromocao(
                    $promocaoData['id_promocao'],
                    true,
                    $promocao,
                    $desconto,
                    $inicio,
                    $fim,
                    $inicio_horario,
                    $fim_horario
                );
            } else {
                $promocaoSuccess = $produtoModel->createPromocao(
                    $produtoId,
                    true,
                    $promocao,
                    $desconto,
                    $inicio,
                    $fim,
                    $inicio_horario,
                    $fim_horario
                );
            }

            if (!$promocaoSuccess) {
                $errors[] = "Erro ao salvar promoção.";
            }
        } else if ($promocaoData) {
            $promocaoSuccess = $produtoModel->desativarPromocao($promocaoData['id_promocao']);
            if (!$promocaoSuccess) {
                $errors[] = "Erro ao desativar promoção.";
            }
        }

        // Gerenciar imagens
        $imagensExistentes = $produtoModel->getImagensProduto($produtoId);
        $imagensParaRemover = json_decode($_POST['imagens_remover'] ?? '[]', true) ?: [];

        // Verificar quantidade mínima de imagens
        $totalImagensRestantes = count($imagensExistentes) - count($imagensParaRemover);
        $novasImagensBase64 = json_decode($_POST['produto_imagens'] ?? '[]', true) ?: [];

        if ($totalImagensRestantes + count($novasImagensBase64) < 1) {
            $errors[] = "O produto deve ter pelo menos uma imagem.";
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            header('Location: EditarProduto?id=' . $produtoId);
            exit;
        }

        // Remover imagens selecionadas
        foreach ($imagensParaRemover as $imagemId) {
            if (!$produtoModel->removerImagemProduto($imagemId)) {
                $errors[] = "Erro ao remover imagem ID: $imagemId";
            }
        }

        // Reordenar imagens restantes
        $ordem = 1;
        foreach ($imagensExistentes as $imagem) {
            if (!in_array($imagem['id_imagem_produto'], $imagensParaRemover)) {
                if (!$produtoModel->atualizarOrdemImagem($imagem['id_imagem_produto'], $ordem)) {
                    $errors[] = "Erro ao reordenar imagens";
                }
                $ordem++;
            }
        }

        // Adicionar novas imagens
        if (!empty($novasImagensBase64)) {
            $baseDir = __DIR__ . '/../../../public/upload/produtos/' . $produtoId . '/';
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            foreach ($novasImagensBase64 as $base64) {
                if (preg_match('/^data:image\/webp;base64,/', $base64)) {
                    $dataPart = substr($base64, strpos($base64, ',') + 1);
                    $dadosBinarios = base64_decode($dataPart);

                    if ($dadosBinarios !== false) {
                        $nomeArquivo = 'imagem_' . $ordem . '_' . time() . '.webp';
                        $absPath = $baseDir . $nomeArquivo;

                        if (file_put_contents($absPath, $dadosBinarios)) {
                            $caminhoRelativo = '/upload/produtos/' . $produtoId . '/' . $nomeArquivo;
                            if (!$produtoModel->adicionarImagemProduto($produtoId, $caminhoRelativo, $ordem)) {
                                $errors[] = "Erro ao salvar nova imagem no banco de dados";
                            }
                            $ordem++;
                        } else {
                            $errors[] = "Erro ao salvar arquivo de imagem";
                        }
                    } else {
                        $errors[] = "Erro ao decodificar imagem";
                    }
                } else {
                    $errors[] = "Formato de imagem inválido";
                }
            }
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            $_SESSION['successMessage'] = "Produto atualizado com sucesso!";
        }

        header('Location: GerenciarProdutos');
        exit;
    }

    public function alterarStatusProduto()
    {
        header('Content-Type: application/json');

        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        $produtoId = $data['id'] ?? null;
        $novoStatus = $data['status'] ?? null;

        if ($produtoId === null || $novoStatus === null) {
            echo json_encode([
                'success' => false,
                'message' => 'Parâmetros inválidos.'
            ]);
            return;
        }

        if (!$data['admin']) {
            $vendedorModel = new VendedorModel();
            $vendedorId = $vendedorModel->getVendedorId($_SESSION['cliente_id']);

            if (!$vendedorId) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Cliente não possui cadastro de vendedor.'
                ]);
                return;
            }
            $produtoModel = new ProdutoModel();
            $produto = $produtoModel->getProdutoById($produtoId);
            
            if (!$produto || $produto['id_vendedor'] != $vendedorId) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Produto não encontrado ou não pertence ao vendedor.'
                ]);
                return;
            }
        }
        
        $produtoModel = new ProdutoModel();
        $novoStatus = (bool) $novoStatus;
        $success = $produtoModel->ativarInativarProduto($produtoId, $novoStatus);

        if ($success) {
            echo json_encode([
                'success' => true,
                'message' => 'Status do produto atualizado com sucesso.',
                'novoStatus' => $novoStatus
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Erro ao atualizar status.'
            ]);
        }
    }
}
