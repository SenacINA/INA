<?php
function gerarProdutoCards($quantidade, $path) {
    $PATH_ROOT = $path ? '.' : '..';
    $PATH_PUBLIC = "$PATH_ROOT/public";

    $imageUrls = [
        "$PATH_PUBLIC/image/index/Produto01.jpg",
        "$PATH_PUBLIC/image/index/Produto02.jpg",
        "$PATH_PUBLIC/image/index/Produto03.jpg",
        "$PATH_PUBLIC/image/index/Produto04.jpg",
        "$PATH_PUBLIC/image/index/Produto05.jpg",
        "$PATH_PUBLIC/image/index/Produto06.jpg",
        "$PATH_PUBLIC/image/index/Produto07.jpg",
        "$PATH_PUBLIC/image/index/Produto08.jpg",
        "$PATH_PUBLIC/image/index/Produto09.jpg",
        "$PATH_PUBLIC/image/index/Produto10.jpg",
        "$PATH_PUBLIC/image/index/Produto11.jpg",
        "$PATH_PUBLIC/image/index/Produto12.jpg",
    ];

    for ($i = 0; $i < $quantidade; $i++) {
        $produto =  $i == 0 ? "'?id=1'" : "''";
        $imageSrc = $i == 0
            ? "$PATH_PUBLIC/image/cliente/produto/cadeira_gamer_size_big.png"
            : $imageUrls[array_rand($imageUrls)];

        echo "
        <div class='index_body_produto_card'>
            <div class='index_body_desconto'>
                <span>20% OFF</span>
            </div>
            <div class='index_body_imagem_produto'>
                <img id='produto' src='$imageSrc' alt='Produto'>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lectus orci, lobortis eu eros vitae, consequat molestie velit. Maecenas pulvinar nisi ac interdum mollis. Curabitur vitae mattis nibh. Integer accumsan suscipit sem, nec ullamcorper velit ultricies vel. Mauris at egestas velit. Ut dapibus, neque in posuere molestie, metus erat pellentesque neque, id egestas mauris orci in tortor. Nullam sed magna ullamcorper, pharetra arcu sit amet, maximus mi. Curabitur libero mauris, sollicitudin ac auctor sit amet, malesuada id ipsum. Donec egestas lacus elit, vel ultricies ex volutpat ut. Vivamus viverra quam a est viverra sagittis.</p>
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
                <button class='base_botao btn_blue' onclick=\"pag('carrinho')\">
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' viewBox='0 0 26 26' fill='none'>
                        <path d='M5.78305 4.44444H23.75L21.3056 13H7.09931M22.5278 17.8889H7.86111L5.41667 2H1.75M9.08333 22.7778C9.08333 23.4528 8.53612 24 7.86111 24C7.1861 24 6.63889 23.4528 6.63889 22.7778C6.63889 22.1027 7.1861 21.5556 7.86111 21.5556C8.53612 21.5556 9.08333 22.1027 9.08333 22.7778ZM22.5278 22.7778C22.5278 23.4528 21.9806 24 21.3056 24C20.6305 24 20.0833 23.4528 20.0833 22.7778C20.0833 22.1027 20.6305 21.5556 21.3056 21.5556C21.9806 21.5556 22.5278 22.1027 22.5278 22.7778Z' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/>
                    </svg>
                </button>
                <button class='base_botao btn_blue' onclick=\"pag('produto')\">
                    Comprar
                </button>
            </div>
        </div>";
    }
}
?>
