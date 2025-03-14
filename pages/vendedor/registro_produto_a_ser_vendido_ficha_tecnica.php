<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/vendedor/registro_produto_a_ser_vendido_ficha_tecnica.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <!-- fazer a responsividade -->
    <!--arrumar o nome das class  -->
    
    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <div class="body_registro_produto_a_ser_vendido_ficha_tecnica">
        <div class="grid_bg">
            <div class="grid_titulo">
                <h1>FICHA TÉCNICA</h1>
                <h2>Produto</h2>
                <hr>
                <h3>Novo Produto</h3>
            </div>

            <div class="grid_conteudo">
                <div class="grid_conteudo_1">
                    <h1>Informações do Produto</h1>

                    <!-- Lote do Produto -->
                    <label for="nomedoproduto">Nome do Produto</label> <br>
                    <input type="text" name="nomedoproduto" id="nomedoproduto" required> <br>

                    <!-- Preço -->
                    <label for="preco">Preço (R$)</label> <br>
                    <input type="number" name="preco" id="preco" step="0.01" min="0" required> <br>

                    <!-- Categoria -->
                    <label for="categoria">Categoria</label> <br>
                    <select name="categoria" id="categoria" required>
                        <option value="categoria1">Categoria 1</option>
                        <option value="categoria2">Categoria 2</option>
                        <option value="categoria3">Categoria 3</option>
                    </select> <br>

                    <!-- Observações -->
                    <label for="observacoes">Observações</label> <br>
                    <textarea name="observacoes" id="observacoes" rows="4"></textarea>
                </div>

                <div class="grid_conteudo_2">
                    <h1>Dimensões</h1>

                    <!-- Peso Líquido -->
                    <label for="pesoliquido">Peso Líquido</label> <br>
                    <input type="text" name="pesoliquido" id="pesoliquido" placeholder="Kg" required> <br>

                    <!-- Peso Bruto -->
                    <label for="pesobruto">Peso Bruto</label> <br>
                    <input type="text" name="pesobruto" id="pesobruto" placeholder="Kg" required> <br>

                    <!-- Material -->
                    <label for="material">Material</label> <br>
                    <select name="material" id="material">
                        <option value="madeira">Madeira</option>
                        <option value="metal">Metal</option>
                        <option value="plastico">Plástico</option>
                    </select> <br>

                    <!-- Descrição do produto -->
                    <label for="descricao">Descrição do Produto</label> <br>
                    <textarea name="descricao" id="descricao" rows="4"></textarea>
                </div>

                <div class="grid_conteudo_3">
                    <div class="conteudo_3_quadrado">
                        <img src="../../image/vendedor/registro_produto_a_ser_vendido_ficha_tecnica/cadeira_gamer_size_big.png" alt="Imagem do produto">
                    </div>
                    <div class="grid_procurar_arquivo">
                        <div class="procurar_aquivo_upload">
                            <img src="../../image/vendedor/registro_produto_a_ser_vendido/upload.png" alt="Ícone de upload">
                            <h1>Procurar arquivo</h1>
                        </div>
                        <h1>ou</h1>
                        <a href="#">Adicionar link URL</a>
                        <h2>O tamanho do arquivo não deve ultrapassar 2MB</h2>
                    </div>
                </div>

                <div class="grid_conteudo_4">
                    <div class="botoes">
                        <div class="cancelar">
                            <h1><img src="../../image/geral/x_botao_vermelho.svg" alt="">Cancelar</h1>
                        </div>
                        <div class="salvar">
                            <h1><img src="../../image/geral/confirm_botao.svg" alt="">Adicionar produto</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer_carrinho">
            <img src="../../image/cliente/footer/img_footer_placeholder.png" width="100%" height="100%">
        </footer>
    </div>
</body>

</html>