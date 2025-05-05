<?php
    $routes = [
        '/'                          => 'geral/HomeController@index',
        '/user/{id}'                 => 'cliente/ClienteController@show',

        // Cliente
        '/produto'                   => 'cliente/ProdutoController@index',
        '/carrinho'                  => 'cliente/CarrinhoController@index',
        '/categoria'                 => 'cliente/CategoriaController@index',
        '/perfil-cliente'            => 'cliente/ClienteController@perfil',
        '/login-cliente'             => 'cliente/ClienteController@login',
        '/carrinho-dados'            => 'cliente/ClienteController@dados',
        '/carrinho-pagamentos'       => 'cliente/ClienteController@pagamentos',
        '/editar-perfil-cliente'     => 'cliente/ClienteController@editarPerfil',
        '/auth'                      => 'auth/AuthController@loginForm',
        '/logout'                    => 'auth/AuthController@logout',
        '/cadastro-cliente'          => 'cliente/ClienteController@cadastro',
        '/api/cliente/register'      => 'cliente/ClienteController@register',

        // Geral
        '/sobre-nos'                 => 'geral/GeralController@sobreNos',
        '/trocar-email'              => 'auth/AuthController@requestEmailReset',
        '/trocar-email-php'          => 'geral/TrocarEmail1Controller@TrocarEmail',
        '/trocar-email-confirmar'    => 'auth/AuthController@confirmEmailReset',
        '/redefinir-senha'           => 'auth/AuthController@requestPasswordReset',
        '/redefinir-senha-confirmar' => 'auth/AuthController@confirmPasswordReset',
        '/redefinir-senha-api'       => 'geral/EnviarTokenController@gerarToken',
        '/redefinir-senha-api-salvar'=> 'geral/EnviarTokenController@salvarSenha',

        // Vendedor - Cadastro e Perfil
        '/cadastro-vendedor-info'    => 'vendedor/VendedorController@showInfo',
        '/cadastro-vendedor'         => 'vendedor/VendedorController@showFormCadastro',
        '/perfil-vendedor'           => 'vendedor/VendedorController@perfil',
        '/editar-perfil-vendedor'    => 'vendedor/VendedorController@editarPerfil',

        // Vendedor - Produtos e Pedidos
        '/pedidos-vendedor'          => 'vendedor/VendedorProductController@pedidos',
        '/pedido-confirmar'          => 'vendedor/VendedorProductController@confirm',
        '/produto-registrar'         => 'vendedor/VendedorProductController@create',
        '/produto-editar'            => 'vendedor/VendedorProductController@edit',
        '/relatorio-vendas'          => 'vendedor/VendedorProductController@report',
        '/cadastro-produto'          => 'vendedor/ProdutoController@produto',

        // Admin
        '/admin-dashboard'           => 'admin/AdminController@dashboard',
        '/admin-perfil'              => 'admin/AdminController@perfil',
        '/aprovar-vendedor'          => 'admin/AdminController@aprovarVendedor',
        '/atualizar-usuario'         => 'admin/AdminController@atualizarUsuario',
        '/gerenciar-usuarios'        => 'admin/AdminController@gerenciarUsuarios',
        '/gerenciar-produtos'        => 'admin/AdminController@gerenciarProdutos',
        '/gerenciar-carrossel'       => 'admin/AdminController@gerenciarCarrossel',
        '/relatorio-vendedor'        => 'admin/AdminController@relatorioVendedor',
        '/historico-acesso'          => 'admin/AdminController@historicoAcesso',
        '/admin-carrossel'           => 'admin/AdminController@adminCarrossel',
    ];

    // Join DIRECTOR SEPARETOR
?>
