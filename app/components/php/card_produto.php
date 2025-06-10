<?php

class cardProduto
{
    public function gerarProdutoCards($quantidade, $produtos, $inicio = 0)
    {
        $i = 1;
        foreach ($produtos as $produto) {
                echo "
                <div class='index_body_produto_card'>
                    <div class='index_body_imagem_produto'>
                        <img id='produto' src='" . (empty($produto['endereco_imagem_produto']) ? 'https://placehold.co/400x400' : "./public/" . $produto['endereco_imagem_produto']) . "' alt='" . $produto['nome_produto'] . "'>
                        <p>" . $produto['nome_produto'] . "</p>
                    </div>
                    <div class='index_body_estrela_valor'>
                        <div class='index_body_estrela_produto'>
                            <p>★★★★★</p>
                            <h4>(12)</h4>
                        </div>
                        <div class='index_body_valor_produto'>
                            <p id='indexBodyValorProduto'>R$" . number_format($produto['preco_produto'], 2, ',', '.') . "</p>
                        </div>
                    </div>
                    <div class='index_body_botoes_produto'>
                        <form method='POST' action='Carrinho-api-add' class='form_adicionar_carrinho'>
                            <input type='hidden' name='produto_id' value='" . $produto['id_produto'] . "'>
                            <input type='hidden' name='nome' value='" . $produto['nome_produto'] . "'>
                            <input type='hidden' name='preco' value='" . $produto['preco_produto'] . "'>
                            <input type='hidden' name='imagem' value='" . $produto['endereco_imagem_produto'] . "'>
                            <input type='hidden' name='quantidade' value='1'>
                            <button type='submit' class='base_botao btn_blue'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='26px' height='26px' viewBox='0 0 26 26' fill='none'>
                                    <path d='M5.78305 4.44444H23.75L21.3056 13H7.09931M22.5278 17.8889H7.86111L5.41667 2H1.75M9.08333 22.7778C9.08333 23.4528 8.53612 24 7.86111 24C7.1861 24 6.63889 23.4528 6.63889 22.7778C6.63889 22.1027 7.1861 21.5556 7.86111 21.5556C8.53612 21.5556 9.08333 22.1027 9.08333 22.7778ZM22.5278 22.7778C22.5278 23.4528 21.9806 24 21.3056 24C20.6305 24 20.0833 23.4528 20.0833 22.7778C20.0833 22.1027 20.6305 21.5556 21.3056 21.5556C21.9806 21.5556 22.5278 22.1027 22.5278 22.7778Z' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/>
                                </svg>
                            </button>
                        </form>
                        <button class='base_botao btn_blue' onclick='pag(\"Produto?id=" . $produto['id_produto'] . "\")'>Comprar</button>
                    </div>
                </div>";
                if ($i >= $quantidade) {
                    break;
                }
                else {
                    $i += 1;
                }
            }
        $totalProdutos = count($produtos);
        $fim = min($inicio + $quantidade, $totalProdutos);

        for ($i = $inicio; $i < $fim; $i++) {
            $produto = $produtos[$i];

            $imagem = empty($produto['endereco_imagem_produto']) ?
                'https://placehold.co/400x400' : "./public/" . $produto['endereco_imagem_produto'];
            $nome = htmlspecialchars($produto['nome_produto']);
            $preco = number_format($produto['preco_produto'], 2, ',', '.');
            $id = intval($produto['id_produto']);
            $subcategoria = htmlspecialchars($produto['subcategoria_produto']);
            $imagem_raw = htmlspecialchars($produto['endereco_imagem_produto']);

            echo "
            <div class='index_body_produto_card'>
                <div class='index_body_imagem_produto'>
                    <img id='produto' src='{$imagem}' alt='{$nome}'>
                    <p>{$nome}</p>
                </div>
                <div class='index_body_estrela_valor'>
                    <div class='index_body_estrela_produto'>
                        <p>★★★★★</p>
                        <h4>(12)</h4>
                    </div>
                    <div class='index_body_valor_produto'>
                        <p id='indexBodyValorProduto'>R$ {$preco}</p>
                    </div>
                </div>
                <div class='index_body_botoes_produto'>
                    <form method='POST' class='form_adicionar_carrinho'>
                        <input type='hidden' name='produto_id' value='{$id}'>
                        <input type='hidden' name='nome' value='{$nome}'>
                        <input type='hidden' name='preco' value='{$produto['preco_produto']}'>
                        <input type='hidden' name='imagem' value='{$imagem_raw}'>
                        <input type='hidden' name='subcategoria' value='{$subcategoria}'>
                        <input type='hidden' name='quantidade' value='1'>
                        <button type='submit' class='base_botao btn_blue' id='adicionar_carrinho'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='26px' height='26px' viewBox='0 0 26 26' fill='none'>
                                <path d='M5.78305 4.44444H23.75L21.3056 13H7.09931M22.5278 17.8889H7.86111L5.41667 2H1.75M9.08333 22.7778C9.08333 23.4528 8.53612 24 7.86111 24C7.1861 24 6.63889 23.4528 6.63889 22.7778C6.63889 22.1027 7.1861 21.5556 7.86111 21.5556C8.53612 21.5556 9.08333 22.1027 9.08333 22.7778ZM22.5278 22.7778C22.5278 23.4528 21.9806 24 21.3056 24C20.6305 24 20.0833 23.4528 20.0833 22.7778C20.0833 22.1027 20.6305 21.5556 21.3056 21.5556C21.9806 21.5556 22.5278 22.1027 22.5278 22.7778Z' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/>
                            </svg>
                        </button>
                    </form>
                    <button class='base_botao btn_blue' onclick='pag(\"Produto?id={$id}\")'>Comprar</button>
                </div>
            </div>";
        }
    }
}
