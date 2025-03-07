<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/vendedor/editar_produto.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    <title>E ao Quadrado</title>
    <link rel="icon" type="image/x-icon" href="./image/geral/icone_eaoquadrado.ico">
</head>
<body>
    <div class='editar_produto_main'>
        <div class='editar_produto_container'>
            <div class='editar_produto_title'>
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M30.8647 7.45769C31.5303 6.78602 31.5303 5.66658 30.8647 5.02936L26.8711 0.999355C26.2396 0.327689 25.1303 0.327689 24.4647 0.999355L21.3244 4.15102L27.7245 10.6094M0.639648 25.0416V31.4999H7.03965L25.9154 12.4349L19.5154 5.97658L0.639648 25.0416Z" fill="#006494"/>
                    </svg>
                    Editar Produto
                </h2>
            </div>
            <form action="#" class='editar_produto_form_grid'>
                <div class='editar_produto_form'>
                    <div class='editar_produto_form_title'>
                        <div class='editar_produto_line'></div>
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M10.3998 7.1998H5.5998V10.3998H10.3998V7.1998ZM0.799805 5.5998C0.799805 4.32677 1.30552 3.10587 2.20569 2.20569C3.10587 1.30552 4.32677 0.799805 5.5998 0.799805H15.1998V23.1998H5.5998C4.32677 23.1998 3.10587 22.6941 2.20569 21.7939C1.30552 20.8937 0.799805 19.6728 0.799805 18.3998V5.5998ZM3.9998 7.1998V10.3998C3.9998 10.8242 4.16838 11.2311 4.46843 11.5312C4.76849 11.8312 5.17546 11.9998 5.5998 11.9998H10.3998C10.8242 11.9998 11.2311 11.8312 11.5312 11.5312C11.8312 11.2311 11.9998 10.8242 11.9998 10.3998V7.1998C11.9998 6.77546 11.8312 6.36849 11.5312 6.06843C11.2311 5.76838 10.8242 5.5998 10.3998 5.5998H5.5998C5.17546 5.5998 4.76849 5.76838 4.46843 6.06843C4.16838 6.36849 3.9998 6.77546 3.9998 7.1998ZM4.7998 13.5998C4.58763 13.5998 4.38415 13.6841 4.23412 13.8341C4.08409 13.9841 3.9998 14.1876 3.9998 14.3998C3.9998 14.612 4.08409 14.8155 4.23412 14.9655C4.38415 15.1155 4.58763 15.1998 4.7998 15.1998H11.1998C11.412 15.1998 11.6155 15.1155 11.7655 14.9655C11.9155 14.8155 11.9998 14.612 11.9998 14.3998C11.9998 14.1876 11.9155 13.9841 11.7655 13.8341C11.6155 13.6841 11.412 13.5998 11.1998 13.5998H4.7998ZM3.9998 17.5998C3.9998 17.812 4.08409 18.0155 4.23412 18.1655C4.38415 18.3155 4.58763 18.3998 4.7998 18.3998H11.1998C11.412 18.3998 11.6155 18.3155 11.7655 18.1655C11.9155 18.0155 11.9998 17.812 11.9998 17.5998C11.9998 17.3876 11.9155 17.1841 11.7655 17.0341C11.6155 16.8841 11.412 16.7998 11.1998 16.7998H4.7998C4.58763 16.7998 4.38415 16.8841 4.23412 17.0341C4.08409 17.1841 3.9998 17.3876 3.9998 17.5998ZM16.7998 23.1998H18.3998C19.6728 23.1998 20.8937 22.6941 21.7939 21.7939C22.6941 20.8937 23.1998 19.6728 23.1998 18.3998V16.7998H16.7998V23.1998ZM23.1998 15.1998V8.7998H16.7998V15.1998H23.1998ZM23.1998 7.1998V5.5998C23.1998 4.32677 22.6941 3.10587 21.7939 2.20569C20.8937 1.30552 19.6728 0.799805 18.3998 0.799805H16.7998V7.1998H23.1998Z" fill="#247BA0"/>
                            </svg>
                            Informações do Produto
                        </h3>
                    </div>
                    <div class='editar_produto_form_input'>
                        <div class='editar_produto_input'>
                            <label for="nomeProduto">Nome do Produto</label>
                            <input type="text" id='nomeProduto' name='nomeProduto'>
                        </div>
                        <div class='editar_produto_small_input'>
                            <div class='editar_produto_input'>
                                <label for="valorProduto">Valor</label>
                                <input type="number" id='valorProduto' name='valorProduto'>
                            </div>
                            <div class='editar_produto_input'>
                                <label for="categoriaProduto">Categoria</label>
                                <input type="text" id='categoriaProduto' name='categoriaProduto'>
                            </div>
                        </div>
                        <div class='editar_produto_input'>
                            <label for="marcaProduto">Marca</label>
                            <input type="text" id='marcaProduto' name='marcaProduto'>
                        </div>
                        <div class='editar_produto_small_input'>
                            <div class='editar_produto_input'>
                                <label for="codigoProduto">Código</label>
                                <input type="number" id='codigoProduto' name='codigoProduto'>
                            </div>
                            <div class='editar_produto_input'>
                                <label for="estoqueProduto">Estoque</label>
                                <input type="number" id='estoqueProduto' name='estoqueProduto'>
                            </div>
                        </div>
                        <div class='editar_produto_small_input'>
                            <div class='editar_produto_input'>
                                <label for="origemProduto">Origem</label>
                                <input type="text" id='origemProduto' name='origemProduto'>
                            </div>
                        </div>
                    </div>
                    <div class='editar_produto_form_title'>
                        <div class='editar_produto_line'></div>
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M31.4182 8.87278L23.1273 0.581871C22.5455 5.32717e-05 21.6728 5.32717e-05 21.091 0.581871L0.581871 21.091C5.32866e-05 21.6728 5.32866e-05 22.5455 0.581871 23.1273L8.87278 31.4182C9.4546 32.0001 10.3273 32.0001 10.9091 31.4182L13.9637 28.3637L8.87278 23.2728C8.29096 22.691 8.29096 21.8182 8.87278 21.2364C9.4546 20.6546 10.3273 20.6546 10.9091 21.2364L16.0001 26.3273L18.0364 24.291L14.9819 21.2364C14.4001 20.6546 14.4001 19.7819 14.9819 19.2001C15.5637 18.6182 16.4364 18.6182 17.0182 19.2001L20.0728 22.2546L22.1091 20.2182L17.0182 15.1273C16.4364 14.5455 16.4364 13.6728 17.0182 13.091C17.6001 12.5091 18.4728 12.5091 19.0546 13.091L24.1455 18.1819L26.1819 16.1455L23.1273 13.091C22.5455 12.5091 22.5455 11.6364 23.1273 11.0546C23.7091 10.4728 24.5819 10.4728 25.1637 11.0546L28.2182 14.1091L31.2728 11.0546C32.0001 10.3273 32.0001 9.30914 31.4182 8.87278Z" fill="#247BA0"/>
                                </svg>
                                Dimensões E Peso
                            </h3>
                        </div>
                        <div class='editar_produto_form_input'>
                            <div class='editar_produto_small_input'>
                                <div class='editar_produto_input'>
                                    <label for="pesoLiquidoProduto">Peso Líquido</label>
                                    <input type="number" id='pesoLiquidoProduto' name='pesoProduto'>
                                </div>
                                <div class='editar_produto_input'>
                                    <label for="pesoBrutoProduto">Peso Bruto</label>
                                    <input type="text" id='pesoBrutoProduto' name='pesoBrutoProduto'>
                                </div>
                                <div class='editar_produto_input'>
                                    <label for="tipoEmbalagem">Tipo De Embalagem</label>
                                    <select id='tipoEmbalagem' name='tipoEmbalagem'>
                                        <option value="caixa">Caixa</option>
                                        <option value="saco">Saco</option>
                                        <option value="embalagemPlastica">Embalagem Plástica</option>
                                        <option value="outro">Outro</option>
                                    </select>
                                </div>
                                <div class='editar_produto_input'>
                                    <label for="larguraProduto">Largura</label>
                                    <input type="text" id='larguraProduto' name='larguraProduto'>
                                </div>
                                <div class='editar_produto_input'>
                                    <label for="alturaProduto">Altura</label>
                                    <input type="text" id='alturaProduto' name='alturaProduto'>
                                </div>
                                <div class='editar_produto_input'>
                                    <label for="comprimentoProduto">Comprimento</label>
                                    <input type="text" id='comprimentoProduto' name='comprimentoProduto'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>
</html>