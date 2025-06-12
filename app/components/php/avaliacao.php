<?php

class ComentarioAvaliacaoComponent {
    public static function render($comentario) {
        $nome = $comentario['nome'] ?? '';
        $estrelas = $comentario['estrelas'] ?? 5;
        $qualidade = $comentario['qualidade'] ?? '';
        $parecido = $comentario['parecido'] ?? '';
        $texto = $comentario['texto'] ?? '';
        $imagens = $comentario['imagens'] ?? [];
        $fotoPerfil = $comentario['foto_perfil'] ?? 'default_profile.svg';
        $data = $comentario['data'] ?? '';
        
        $estrelasHTML = str_repeat('★', $estrelas) . str_repeat('☆', 5 - $estrelas);
        
        $qualidadeHTML = $qualidade ? "
            <div class='avaliacao_user_1_item1'>
                <h2>Qualidade:</h2>
                <h3>$qualidade</h3>
            </div>
        " : '';
        
        $parecidoHTML = $parecido ? "
            <div class='avaliacao_user_1_item2'>
                <h2>Parecido com o anúncio:</h2>
                <h3>$parecido</h3>
            </div>
        " : '';
        
        $imagensHTML = '';
        foreach ($imagens as $img) {
            $imagensHTML .= "
            <div class='image1_user_1'>
                <img src='$img' alt='Imagem da avaliação'>
            </div>";
        }
        
        return <<<HTML
        <div class="comentario_usuario_1">
            <div class="grid_user_1">
                <div class='cliente_nome_pic'>
                    <img class="base_icon" src="$fotoPerfil" alt="Foto de perfil">
                    <h1>$nome</h1>
                </div>
                
                <div class="estrelas_avaliacao_produto">
                    <h2 class='nome_vendedor_estrela'>$estrelasHTML</h2>
                </div>
            </div>
            
            <div class="grid_comentario_user_1">
                $qualidadeHTML
                $parecidoHTML
                $data
                <h2 class='produto_comentario'>
                    $texto
                </h2>
            </div>
            
            <div class="grid_images_user_1">
                $imagensHTML
            </div>
        </div>
        HTML;
    }
}