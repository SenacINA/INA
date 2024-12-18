<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/admin/cadastro_usuario.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="body_admin_cadastro_usuario">
        <div class="nav_bar"></div>
        <div class="grid_bg">
            <div class="titulo"><h1>CADASTRAR</h1></div>
            <img src="../../image/geral/linha-divisoria-azul.png" alt="">
            <div class="grid_conteudo">

                <div class="texto1">
                    <h1>CADASTRO CLIENTE</h1>
                </div>
                <div class="texto2">
                    <h1>PERMISSÕES</h1>
                </div>

                <div class="grid_conteudo_1">
                    <!-- Nome -->
                    <label for="nome">Nome</label> <br>
                    <input type="text" name="nome" id="nome" placeholder="Nome" required>
                    <br>
                
                    <!-- Sobrenome -->
                    <label for="sobrenome">Sobrenome</label> <br>
                    <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required>
                    <br>

                    <div class="genero_cpf">
                        <!-- Gênero -->
                        <div class="genero">
                            <label for="genero">Gênero</label><br>
                            <select name="genero" id="genero" required>
                                <option value="" disabled selected>Selecione o gênero</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <!-- CPF -->
                        <div class="cpf">
                            <label for="cpf">CPF</label> <br>
                            <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF" required>
                        </div>
                    </div>

                    <!-- E-mail -->
                    <label for="email">E-mail</label> <br>
                    <input type="text" name="email" id="email" placeholder="E-mail" required>
                    <br>
                </div>
                

                <div class="grid_conteudo_2">
                    <div class="item1">
                        <input type="checkbox" name="permissao" id="gerenciar_carrossel" value="gerenciar_carrossel">
                        <label for="gerenciar_carrossel">Gerenciar Carrossel</label><br>
                    </div>
                    <div class="item2">
                        <input type="checkbox" name="permissao" id="gerenciar_usuarios" value="gerenciar_usuarios">
                        <label for="gerenciar_usuarios">Gerenciar Usuários</label><br>
                    </div>
                    <div class="item3">
                        <input type="checkbox" name="permissao" id="gerenciar_produtos" value="gerenciar_produtos">
                        <label for="gerenciar_produtos">Gerenciar Produtos</label>
                    </div>
                    <div class="botoes">
                        <div class="cancelar"><h1>Cancelar</h1></div>
                        <div class="cadastrar"><h1>Cadastrar</h1></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>