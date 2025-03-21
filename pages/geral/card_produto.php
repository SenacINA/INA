<?php
function gerarProdutoCards($quantidade, $isIndexValor) {
    $isIndex = $isIndexValor;

    if (isset($isIndex) && $isIndex) {
        $URL = '';
    } else {
        $URL = '../.';
    }
    $imageUrls = [
        "{$URL}./image/index/Produto01.jpg",
        "{$URL}./image/index/Produto02.jpg",
        "{$URL}./image/index/Produto03.jpg",
        "{$URL}./image/index/Produto04.jpg",
        "{$URL}./image/index/Produto05.jpg",
        "{$URL}./image/index/Produto06.jpg",
        "{$URL}./image/index/Produto07.jpg",
        "{$URL}./image/index/Produto08.jpg",
        "{$URL}./image/index/Produto09.jpg",
        "{$URL}./image/index/Produto10.jpg",
        "{$URL}./image/index/Produto11.jpg",
        "{$URL}./image/index/Produto12.jpg",
    ];
 
    for ($i = 0; $i < $quantidade; $i++) {
        $produto =  $i == 0 ? "'?id=1'" : "''";
        // Define a primeira imagem como 'cadeira_gamer_size_big.png'
        if ($i == 0) {
            $imageSrc = "{$URL}./image/cliente/produto/cadeira_gamer_size_big.png";
        } else {
            // Seleciona uma imagem aleatória do array
            $randomIndex = array_rand($imageUrls);
            $imageSrc = $imageUrls[$randomIndex];
        }
 
        echo "
        <div class='index_body_produto_card'>
            <div class='index_body_desconto'>
                <span>20% OFF</span>
            </div>
            <div class='index_body_imagem_produto'>
                <img id='produto' src='$imageSrc' alt='Produto'>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class='index_body_estrela_valor'>
                <div class='index_body_estrela_produto'>
                    <p>★★★★★</p>
                    <h4>(12)</h4>
                </div>
                <div class='index_body_valor_produto'>
                    <p id='indexBodyValorAntigo'>R$1000</p>
                    <p id='indexBodyValorProduto'>R$800</p>
                </div>
            </div>
            <div class='index_body_botoes_produto'>
                <button class='base_botao btn_blue' onclick=\"pag('cliente/carrinho_vazio',0, $produto)\">
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' viewBox='0 0 26 26' fill='none'>
                        <path d='M5.78305 4.44444H23.75L21.3056 13H7.09931M22.5278 17.8889H7.86111L5.41667 2H1.75M9.08333 22.7778C9.08333 23.4528 8.53612 24 7.86111 24C7.1861 24 6.63889 23.4528 6.63889 22.7778C6.63889 22.1027 7.1861 21.5556 7.86111 21.5556C8.53612 21.5556 9.08333 22.1027 9.08333 22.7778ZM22.5278 22.7778C22.5278 23.4528 21.9806 24 21.3056 24C20.6305 24 20.0833 23.4528 20.0833 22.7778C20.0833 22.1027 20.6305 21.5556 21.3056 21.5556C21.9806 21.5556 22.5278 22.1027 22.5278 22.7778Z' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/>
                    </svg>
                </button>
                <button class='base_botao btn_blue' onclick=\"pag('cliente/produto',0)\">
                    Comprar
                </button>
            </div>
        </div>";
    }
}

?>