<?php 

if (isset($isIndex) && $isIndex) {
    $url = '';
} else {
    $url = '../.';
}

?>

<footer class='footer_body'>
    <img src="<?php echo $url ?>./image/geral/footer_crop.svg" alt="">
    <div class='footer_info'>
        <div class='footer_coluna'>
            <h2>Categorias</h2>
            <a href="../cliente/categoria.php" class="base_link">Hardware</a>
            <a href="../cliente/categoria.php" class="base_link">Periféricos</a>
            <a href="../cliente/categoria.php" class="base_link">Escritório</a>
            <a href="../cliente/categoria.php" class="base_link">Celulares</a>
            <a href="../cliente/categoria.php" class="base_link">Eletrodomésticos</a>
            <a href="../cliente/categoria.php" class="base_link">Games</a>
            <a href="../cliente/categoria.php" class="base_link">Livros</a>
            <a href="../cliente/categoria.php" class="base_link">Áudio</a>
            <a href="../cliente/categoria.php" class="base_link">Geek</a>
        </div>
        <div class='footer_coluna'>
            <h2>Termos e Condições</h2>
            <h3>FAQ</h3>
            <a href="../geral/faq.php" class="base_link underline">Acessibilidade</a>
            <a href="../geral/faq.php" class="base_link underline">Privacidade e Proteção de dados</a>
            <a href="../geral/faq.php" class="base_link underline">Informações de venda</a>
            <a href="../geral/faq.php" class="base_link underline">Trabalhe conosco</a>
        </div>
        <div class='footer_coluna'>
            <h2>Contato</h2>
            <p>
                Horário de atendimento:<br>
                07:00 a 22:00<br>
                Todos os Dias<br>
                Loja Virtual<br>
                (67) 91234-5678<br>
                E-mail:<br>
                Eaoquadrado@gmail.com
            </p>
        </div>
        <div class='footer_coluna footer_coluna_logo'>
            <div class='footer_logo'>
                <img src="<?php echo $url ?>./image/index/Logo.svg" alt="">
            </div>
            <div class='footer_whatsapp'>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"/>
                    </svg>
                    <span>Chat via WhatsApp</span>
                </button>
            </div>
        </div>
        <h2 class='footer_copyright'>
            © 2024 Senac Hub Academy MS CG e E ao Quadrado.com. Todos os direitos reservados.
        </h2>
    </div>
</footer>

