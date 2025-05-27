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

  '/CarrinhoDados'             => 'cliente/ClienteController@dados',
  '/CarrinhoPagamentos'        => 'cliente/ClienteController@pagamentos',

  // Geral
  '/sobre-nos'                 => 'geral/GeralController@sobreNos',

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
  '/EditarPerfil'              => 'geral/GeralController@editarPerfil',
  '/Perfil'                    => 'geral/GeralController@perfil',
  '/error/404'                 => 'gerral/GeralController@error',

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
  '/CadastroProduto'          => 'vendedor/ProdutoController@produto',

  // Admin
  '/AdminDashboard'            => 'admin/AdminController@dashboard',
  '/AdminPerfil'               => 'admin/AdminController@perfil',
  '/AprovarVendedor'           => 'admin/AdminController@aprovarVendedor',
  '/AtualizarUsuario'          => 'admin/AdminController@atualizarUsuario',
  '/GerenciarUsuarios'         => 'admin/AdminController@gerenciarUsuarios',
  '/GerenciarProdutos'         => 'admin/AdminController@gerenciarProdutos',
  '/GerenciarCarrossel'        => 'admin/AdminController@gerenciarCarrossel',
  '/RelatorioVendedor'         => 'admin/AdminController@relatorioVendedor',
  '/HistoricoAcesso'           => 'admin/AdminController@historicoAcesso',
  '/AdminCarrossel'            => 'admin/AdminController@adminCarrossel',
];

// Join DIRECTOR SEPARETOR
