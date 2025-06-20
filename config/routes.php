<?php
$routes = [
      '/'                          => 'geral/HomeController@index',
      '/user/{id}'                 => 'cliente/ClienteController@show',

      // Cliente
      '/Produto'                   => 'cliente/ProdutoController@index',
      '/Categoria'                 => 'cliente/CategoriaController@index',
      '/Login'                     => 'cliente/ClienteController@login',
      '/auth'                      => 'auth/AuthController@loginForm',
      '/Logout'                    => 'auth/AuthController@logout',
      '/CadastroCliente'           => 'cliente/ClienteController@cadastro',
      '/api/cliente/register'      => 'cliente/ClienteController@register',
      '/api/cliente/editar-perfil/redes'  => 'cliente/ClienteController@updateSocial',
      '/api/cliente/editarDadosCliente'   => 'cliente/ClienteCOntroller@editarDadosCliente',

      // Cliente - Carrinho
      '/Carrinho'                  => 'cliente/CarrinhoController@index',
      '/Carrinho-api-exibir'       => 'cliente/CarrinhoController@exibirItens',
      '/Carrinho-api-add'          => 'cliente/CarrinhoController@adicionarItem',
      '/Carrinho-api-remove'       => 'cliente/CarrinhoController@removerItem',
      '/Carrinho-api-limpar'       => 'cliente/CarrinhoController@limparCarrinho',
      '/Carrinho-api-update'       => 'cliente/CarrinhoController@atualizar',
      '/Carrinho-api-badge'        => 'cliente/CarrinhoController@exibirBadge',

      '/CarrinhoDados'             => 'cliente/ClienteController@dados',
      '/CarrinhoPagamentos'        => 'cliente/ClienteController@pagamentos',

      // Geral
      '/sobre-nos'                 => 'geral/GeralController@sobreNos',
      '/Subcategoria'              => 'geral/CardController@filtrarProdutosSubcategoria',
      
      // Geral - Trocar Email
      '/TrocarEmail'               => 'auth/AuthController@requestEmailReset',
      '/TrocarEmail-api'           => 'geral/TrocarEmailController@TrocarEmail',

      '/TrocarEmailConfirmar'      => 'auth/AuthController@confirmEmailReset',
      '/TrocarEmail-api-confirmar' => 'geral/salvarNovoEmailController@salvarEmail',

      // Geral - Redefinir Senha
      '/RedefinirSenha'            => 'auth/AuthController@requestPasswordReset',
      '/RedefinirSenhaConfirmar'   => 'auth/AuthController@confirmPasswordReset',

      '/RedefinirSenha-api'        => 'geral/EnviarTokenController@gerarToken',
      '/RedefinirSenha-api-salvar' => 'geral/EnviarTokenController@salvarSenha',

      // Geral - Perfil
      '/EditarPerfil' => 'geral/GeralController@editarPerfil',
      '/Perfil' => 'geral/GeralController@perfil',
      '/Error/404' => 'gerral/GeralController@error',

      // Vendedor - Cadastro e Perfil
      '/CadastroVendedorInfo'             => 'vendedor/VendedorController@showInfo',
      '/CadastroVendedor'                 => 'vendedor/VendedorController@showFormCadastro',
      '/CadastroVendedorForms'            => 'vendedor/VendedorController@cadastroForm',
      '/api/vendedor/editarDadosVendedor' => 'vendedor/VendedorController@editarDadosVendedor',

      // Vendedor - Produtos e Pedidos
      '/PedidosVendedor'          => 'vendedor/VendedorProductController@pedidos',
      '/PedidoConfirmar'          => 'vendedor/VendedorProductController@confirm',
      '/ProdutoRegistrar'         => 'vendedor/VendedorProductController@create',
      '/ProdutoEditar'            => 'vendedor/VendedorProductController@edit',
      '/RelatorioVendas'          => 'vendedor/VendedorProductController@report',
      '/ProdutoRegistro'          => 'vendedor/ProdutoController@produto',

      // Admin
      '/AdminDashboard'           => 'admin/AdminController@dashboard',
      '/AprovarVendedor'          => 'admin/AdminController@aprovarVendedor',
      '/AtualizarUsuario'         => 'admin/AdminController@atualizarUsuario',
      '/GerenciarUsuarios'        => 'admin/AdminController@gerenciarUsuarios',
      '/GerenciarProdutos'        => 'admin/AdminController@gerenciarProdutos',
      '/GerenciarCarrossel'       => 'admin/AdminController@gerenciarCarrossel',
      '/RelatorioVendedor'        => 'admin/AdminController@relatorioVendedor',
      '/AdminCarrossel'           => 'admin/AdminController@adminCarrossel',
      '/searchDesativarUser'      => 'admin/AdminController@searchDesativarUser',
      '/DesativarUser'            => 'admin/AdminController@desativarUser',
      '/GerenciarVendedor'           => 'admin/AdminController@gerenciarVendedor',
      '/api/admin/pesquisar-cliente' => 'admin/AdminController@searchUser',
      '/api/admin/atualizar-cliente' => 'admin/AdminController@updateUser',
      '/api/admin/editarDadosAdmin' => 'admin/AdminController@editarDadosAdmin',
];

// Join DIRECTOR SEPARETOR
