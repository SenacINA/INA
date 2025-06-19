<?php

class ComentarioAvaliacaoProdutoComponent {
    public static function render($comentario) {
        $nome = $comentario['nome'];
        $estrelas = $comentario['estrelas'] ?? 0;
        $qualidade = $comentario['qualidade'];
        $parecido = $comentario['parecido'];
        $texto = $comentario['texto'];
        $imagens = $comentario['imagens'] ?? [];

        $parecido = $parecido ? 'Sim' : 'Não';

        $PATH_PUBLIC = './public' ;
        
        // Usar foto de perfil do banco ou padrão
        $fotoPerfil = $comentario['foto_perfil'] ?? '/image/cliente/perfil_cliente/foto_user.png';
        
        // Converter estrelas para classe CSS
        $estrelasClasse = 'estrelas-' . round($estrelas);

        // Gerar HTML para imagens
        $imagensHTML = '';
        foreach ($imagens as $img) {
            $imagensHTML .= "<div class='image1_user'><img src='$PATH_PUBLIC$img' alt=''></div>";
        }
        
        return <<<HTML
        <div class="comentario_usuario">
            <div class="grid_user">
                <div class='cliente_nome_pic'>
                    <img class="icon_user" src="$PATH_PUBLIC$fotoPerfil" alt="Foto do cliente">
                    <div>
                        <h1>$nome</h1>
                        <h2 class='vendedor_estrelas $estrelasClasse'>★★★★★</h2>
                    </div>
                </div>
            </div>

            <div class="grid_comentario_user">
                <div class="avaliacao_user_item1">
                    <h2>Qualidade:</h2>
                    <h3>$qualidade</h3>
                </div>
                <div class="avaliacao_user_item2">
                    <h2>Parecido com o anúncio:</h2>
                    <h3>$parecido</h3>
                </div>
                <h2 class='produto_comentario'>
                    $texto
                </h2>
            </div>

            <div class="grid_images_user">
                $imagensHTML
            </div>
        </div>
        HTML;
    }
}