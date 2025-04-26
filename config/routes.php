<?php
    $routes = [
        '/' => 'geral/HomeController@index',
        '/user/{id}' => 'cliente/ClienteController@show', // Exemplo com parâmetro dinâmico

        // Cliente
        '/produto' => 'cliente/ProdutoController@index',
        '/carrinho' => 'cliente/CarrinhoController@index',
        '/categoria' => 'cliente/CategoriaController@index',
        '/perfil-cliente' => 'cliente/ClienteController@perfil',
        '/login-cliente' => 'cliente/ClienteController@login',
        '/carrinho-dados' => 'cliente/ClienteController@dados',
        '/carrinho-pagamentos' => 'cliente/ClienteController@pagamentos',
        '/editar-perfil-cliente' => 'cliente/ClienteController@editarPerfil',
        '/login/auth' => 'auth/AuthController@login',
        '/logout'     => 'auth/AuthController@logout',
        '/cadastro-cliente' => 'cliente/ClienteController@cadastro',
        '/api/cliente/register'     => 'cliente/ClienteController@register',

        // Geral
        '/redefinir-email' => 'auth/AuthController@requestEmailReset',
        '/redefinir-email/confirmar' => 'auth/AuthController@confirmEmailReset',
        '/redefinir-senha' => 'auth/AuthController@requestPasswordReset',
        '/redefinir-senha/confirmar'=> 'auth/AuthController@confirmPasswordReset',
        '/sobre-nos' => 'geral/GeralController@sobreNos',

        // Vendedor - Cadastro e Perfil
        '/cadastro-vendedor-info' => 'vendedor/VendedorController@showInfo',
        '/cadastro-vendedor' => 'vendedor/VendedorController@showFormCadastro',
        '/perfil-vendedor' => 'vendedor/VendedorController@perfil',
        '/editar-perfil-vendedor' => 'vendedor/VendedorController@editarPerfil',

        // Vendedor - Produtos e Pedidos
        '/pedidos-vendedor' => 'vendedor/VendedorProductController@pedidos',
        '/pedido-confirmar' => 'vendedor/VendedorProductController@confirm',
        '/produto-registrar' => 'vendedor/VendedorProductController@create',
        '/produto-editar' => 'vendedor/VendedorProductController@edit',
        '/relatorio-vendas' => 'vendedor/VendedorProductController@report',

        // Admin
        '/admin-dashboard' => 'admin/AdminController@dashboard',
        '/admin-perfil' => 'admin/AdminController@perfil',
        '/aprovar-vendedor' => 'admin/AdminController@aprovarVendedor',
        '/atualizar-usuario' => 'admin/AdminController@atualizarUsuario',
        '/gerenciar-usuarios' => 'admin/AdminController@gerenciarUsuarios',
        '/gerenciar-produtos' => 'admin/AdminController@gerenciarProdutos',
        '/gerenciar-carrossel' => 'admin/AdminController@gerenciarCarrossel',
        '/relatorio-vendedor' => 'admin/AdminController@relatorioVendedor',
        '/historico-acesso' => 'admin/AdminController@historicoAcesso',
        '/admin-carrossel' => 'admin/AdminController@adminCarrossel',
    ];

    // Join DIRECTOR SEPARETOR
?>
