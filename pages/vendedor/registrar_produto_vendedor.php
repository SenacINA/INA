<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/vendedor/registrar_produto_vendedor.css">
    <title>Vendedor - Registrar novo produto</title>
</head>
<body>
    <?php
    include_once('../../pages/geral/navbar.php');
    ?>
    <div class="container_registro">
        <h2 id="dgTitle" class="font_titulo">DADOS GERAIS</h2>
        <div class="container_registro_linha">
            <h2 class="font_titulo" id="pdTitle">Produto</h2>
            <hr>
        </div>
        <h2 class="font_titulo" id="npTitle">Novo Produto</h2>
        <div class="grid_title">
            <h2 class="font_titulo">Informações do Produto</h2>
            <h2 class="font_titulo">Dimensões e Peso</h2>
            <h2 class="font_titulo">Pelo menos uma foto ou vídeo</h2>
        </div>
        <form>
            <div class="grid_main">
                <div class="coluna1">
                    <div>
                        <label class="font_subtitulo" for="prodNome">Nome do Produto</label>
                        <input class="input_prod" type="text" id="prodNome" name="prodNome" required>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodPreco">Preço R$</label>
                        <input class="input_prod" type="text" id="prodPreco" name="prodPreco" required>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodCatg">Categoria</label>
                        <input class="input_prod" type="text" id="prodCatg" name="prodCatg" required>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodMarca">Marca</label>
                        <input class="input_prod" type="text" id="prodMarca" name="prodMarca" required>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodCod">Código</label>
                        <input class="input_prod" type="text" id="prodCod" name="prodCod" required>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodOrigem">Origem</label>
                        <input class="input_prod" type="text" id="prodOrigem" name="prodOrigem" required>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodUni">Unidade</label>
                        <input class="input_prod" type="text" id="prodUni" name="prodUni" required>
                    </div>
                </div>
                <div class="coluna2">
                    <div>
                        <label class="font_subtitulo" for="prodPesoL">Peso Liquído</label>
                        <div>
                            <input class="input_prod" type="text" id="prodPesoL" name="prodPesoL" required placeholder="Em kg">
                            <h2 class="unidade_medida">Kg</h2>
                        </div>
                        
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodPesoB">Peso Bruto</label>
                        <div>
                            <input class="input_prod" type="text" id="prodPesoB" name="prodPesoB" required required placeholder="Em kg">
                            <h2 class="unidade_medida">Kg</h2>
                        </div>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodTipoEmb">Tipo da Embalagem</label>
                        <select class="input_prod seletor" id="prodTipoEmb" name="prodTipoEmb">
                            <option value="PacoteCaixa">Pacote/Caixa</option>
                            <option value="opcao2">Opção 2</option>
                            <option value="opcao3">Opção 3</option>
                        </select>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodEmb">Embalagem</label>
                        <select class="input_prod seletor" id="prodEmb" name="prodEmb">
                            <option value="pac_cai">Embalagem customizada</option>
                            <option value="opcao2">Opção 2</option>
                            <option value="opcao3">Opção 3</option>
                        </select>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodLarg">Largura</label>
                        <div>
                            <input class="input_prod" type="text" id="prodLarg" name="prodLarg" required placeholder="0,0">
                            <h2 class="unidade_medida">Cm</h2>
                        </div>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodAlt">Altura</label>
                        <div>
                            <input class="input_prod" type="text" id="prodAlt" name="prodAlt" required placeholder="0,0">
                            <h2 class="unidade_medida">Cm</h2>
                        </div>
                    </div>
                    <div>
                        <label class="font_subtitulo" for="prodCompri">Comprimento</label>
                        <div>
                            <input class="input_prod" type="text" id="prodCompri" name="prodCompri" required placeholder="0,0">
                            <h2 class="unidade_medida">Cm</h2>
                        </div>
                    </div>
                </div>
                <div class="coluna3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="216" height="216" viewBox="0 0 216 216" fill="none">
                        <rect x="0.496235" y="0.502458" width="212.449" height="213.002" transform="matrix(0.999988 0.00494369 -0.00751872 0.999972 2.08777 0.47217)" fill="#E4EAEA" stroke="#747474" stroke-dasharray="2 2"/>
                    </svg>
                    <div>
                        <label for="prodImgs">Escolha um arquivo:</label>
                        <input type="file" id="prodImgs" name="prodImgs" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="desc">
                <div class="grid_desc">
                    <label for="prodDesc" class="font_titulo">Descrição do produto</label>
                    <textarea class="input_prod" id="prodDesc" name="prodDesc" required></textarea>
                </div>
                <div class="grid_but">
                    <button class="font_botoes but_cancel" type="reset">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48"><defs><mask id="ipSCloseOne0"><g fill="none" stroke-linejoin="round" stroke-width="4"><path fill="#fff" stroke="#fff" d="M24 44c11.046 0 20-8.954 20-20S35.046 4 24 4S4 12.954 4 24s8.954 20 20 20Z"/><path stroke="#000" stroke-linecap="round" d="M29.657 18.343L18.343 29.657m0-11.314l11.314 11.314"/></g></mask></defs><path fill="#fff" d="M0 0h48v48H0z" mask="url(#ipSCloseOne0)"/></svg>
                        </div>CANCELAR
                    </button>
                    <button class="font_botoes but_submit" type="submit">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024">
                                <path fill="#fff" d="M512 64a448 448 0 1 1 0 896a448 448 0 0 1 0-896m-38.4 409.6H326.4a38.4 38.4 0 1 0 0 76.8h147.2v147.2a38.4 38.4 0 0 0 76.8 0V550.4h147.2a38.4 38.4 0 0 0 0-76.8H550.4V326.4a38.4 38.4 0 1 0-76.8 0z" />
                            </svg>
                        </div>ADICIONAR
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>