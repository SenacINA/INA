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
    

        // Validação básica dos campos obrigatórios
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
        $produtoImagem = $_POST['produtoImagem'] ?? '';
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
        $sucesso = $model->createProduto(
            (int)$_SESSION['cliente_id'],  // ID do vendedor
            (string)$nome,                 // Nome do produto
            (string)$valor,                // Preço (mantido como string para compatibilidade)
            (int)$categoria,               // Categoria como INT
            (int)$subCategoria,            // Subcategoria como INT
            (string)$origem,               // Origem do produto
            (int)$unidade,                 // Unidade em estoque
            (float)$peso,                  // Peso líquido
            (float)$pesoBruto,             // Peso bruto
            (float)$largura,               // Largura
            (float)$altura,                // Altura
            (float)$comprimento,           // Comprimento
            (string)$descricao,            // Descrição do produto
            (string)'ativo'                // Status do produto
        );
        
        if ($sucesso) {
            $this->loadView('vendedor/EditarProduto', ['dadosProduto' => $sucesso]);
        } else {
            $errors[] = "Erro ao cadastrar o produto. Tente novamente.";
            $this->loadView('vendedor/RegistroProduto', ['errors' => $errors]);
        }
    }
}
