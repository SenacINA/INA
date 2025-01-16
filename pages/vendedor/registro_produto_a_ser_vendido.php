<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/vendedor/registro_produto_a_ser_vendido.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="body_registro_produto_a_ser_vendido">
        <div class="nav_bar"></div>
        <div class="grid_bg" >
            <div class="grid_titulo">
                <h1>DADOS GERAIS</h1>
                <h2>Produto</h2>
                <hr>
                <h3>Novo Produto</h3>
            </div>
            
            <div class="grid_conteudo">
                <div class="grid_conteudo_1">
                    <h1>Informações do Produto</h1>

                    <!-- Nome do Produto -->
                    <label for="nomedoproduto">Nome do Produto</label> <br>
                    <input type="text" name="nomedoproduto" id="nomedoproduto" required> <br>    

                    <!-- Preço (R$) -->
                    <label for="preco">Preço (R$)</label> <br> 
                    <input type="text" name="preco" id="preco" required> <br>

                    <!-- Categoria -->
                    <label for="categoria">Categoria</label> <br> 
                    <input type="text" name="categoria" id="categoria" required> <br>

                    <!-- Marca -->
                    <label for="marca">Marca</label> <br> 
                    <input type="text" name="marca" id="marca" required> <br>

                    <!-- Código -->
                    <label for="codigo">Código</label> <br> 
                    <input type="text" name="codigo" id="codigo" required> <br>

                    <!-- Origem -->
                    <label for="origem">Origem</label> <br> 
                    <input type="text" name="origem" id="origem" required> <br>

                    <!-- Unidade -->
                    <label for="unidade">Unidade</label> <br> 
                    <input type="text" name="unidade" id="unidade" required> <br>
                </div>

                <div class="grid_conteudo_2">
                    <h1>Dimensões e Peso</h1>

                    <!-- Peso Líquido -->
                    <label for="pesoliquido">Peso Líquido</label> <br>
                    <input type="text" name="pesoliquido" id="pesoliquido" placeholder="Kg" required> <br>    

                    <!-- Peso Bruto -->
                    <label for="pesobruto">Peso Bruto</label> <br> 
                    <input type="text" name="pesobruto" id="pesobruto" placeholder="Kg" required> <br>

                    <!-- Tipo da Embalagem -->
                    <label for="tipoembalagem">Tipo da Embalagem</label> <br> 
                    <select name="tipoembalagem" id="tipoembalagem" required>
                        <option value="" disabled selected>Opção 1</option>
                        <option value="opcao2">Opção 2</option>
                        <option value="opcao3">Opção 3</option>
                    </select> <br>

                    <!-- Embalagem -->
                    <label for="embalagem">Embalagem</label> <br> 
                    <select name="embalagem" id="embalagem" required>
                        <option value="" disabled selected>Opção 1</option>
                        <option value="opcao2">Opção 2</option>
                        <option value="opcao3">Opção 3</option>
                    </select> <br>

                    <!-- Largura -->
                    <label for="largura">Largura</label> <br> 
                    <input type="text" name="largura" id="largura" placeholder="Cm" required> <br>

                    <!-- Altura -->
                    <label for="altura">Altura</label> <br> 
                    <input type="text" name="altura" id="altura" placeholder="Cm" required> <br>

                    <!-- Comprimento -->
                    <label for="comprimento">Comprimento</label> <br> 
                    <input type="text" name="comprimento" id="comprimento" placeholder="Cm" required> <br>
                </div>

                <div class="grid_conteudo_3">
                    <div class="conteudo_3_quadrado"></div>
                    <div class="grid_procurar_arquivo">
                        <div class="procurar_aquivo_upload">
                            <img src="../../image/vendedor/registro_produto_a_ser_vendido/upload.png" alt="">
                            <h1>Procurar arquivo</h1>
                        </div>
                        <h1>ou</h1>
                        <a href="">adicionar link url</a>
                        <h2>O tamanho do arquivo não deve ultrapassar 2MB</h2>
                    </div>
                </div>

                <div class="grid_conteudo_4">
                    <h1>Descrição do produto</h1>
                    <textarea name="observacoes" id="observacoes" rows="4"></textarea>
                </div>

                <div class="grid_conteudo_5">
                    <div class="botoes">
                        <div class="cancelar">
                            <h1>Cancelar</h1>
                        </div>
                        <div class="adicionar">
                            <h1>Adicionar Produto</h1>
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