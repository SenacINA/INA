<?php
$routes = [
      '/'                                       => 'geral/HomeController@index',
      '/user/{id}'                              => 'cliente/ClienteController@show',
      '/Home-api'                               => 'geral/HomeController@sendProdutoHome',
      '/Carrossel-api'                          => 'geral/HomeController@sendCategoriaHome',

      // Cliente
      '/Produto'                                => 'cliente/ProdutoController@index',
      '/Produto/{produto_id}'                   => 'cliente/ProdutoController@mostrarProduto',
      '/Categoria'                              => 'cliente/CategoriaController@index',
      '/FiltrarCategoria'                       => 'cliente/CategoriaController@filtrarCategoria',
      '/FiltrarSubcategoria'                    => 'cliente/CategoriaController@filtrarSubcategoria',
      '/Categoria-api'                          => 'cliente/CategoriaController@sendProdutosCategorias',
      '/Subcategoria-api'                       => 'cliente/CategoriaController@sendProdutosSubcategorias',
      '/Login'                                  => 'cliente/ClienteController@login',
      '/auth'                                   => 'auth/AuthController@loginForm',
      '/Logout'                                 => 'auth/AuthController@logout',
      '/CadastroCliente'                        => 'cliente/ClienteController@cadastro',
      '/api/cliente/register'                   => 'cliente/ClienteController@register',
      '/api/cliente/editar-perfil/redes'        => 'cliente/ClienteController@updateSocial',
      '/api/cliente/editarDadosCliente'         => 'cliente/ClienteCOntroller@editarDadosCliente',
      '/api/avaliar-produto'                    => 'cliente/ProdutoController@avaliarProduto',
      '/api-comentariosJson'                => 'cliente/ProdutoController@comentarios',
      '/api-comentarioClienteJson'           => 'cliente/ProdutoController@comentarioCliente',   
      // Cliente - Carrinho
      '/Carrinho'                               => 'cliente/CarrinhoController@index',
      '/Carrinho-api-exibir'                    => 'cliente/CarrinhoController@exibirItens',
      '/Carrinho-api-add'                       => 'cliente/CarrinhoController@adicionarItem',
      '/Carrinho-api-remove'                    => 'cliente/CarrinhoController@removerItem',
      '/Carrinho-api-limpar'                    => 'cliente/CarrinhoController@limparCarrinho',
      '/Carrinho-api-update'                    => 'cliente/CarrinhoController@atualizar',
      '/Carrinho-api-badge'                     => 'cliente/CarrinhoController@exibirBadge',
      '/CarrinhoPagamentos'                     => 'cliente/ClienteController@pagamentos',

      '/CarrinhoDados'                          => 'cliente/CarrinhoDadosController@index',
      '/CarrinhoDados-salvar'                   => 'cliente/CarrinhoDadosController@salvarEndereco',
      '/CarrinhoDados-excluir'                  => 'cliente/CarrinhoDadosController@excluirEndereco',
      '/CarrinhoDados-editar'                   => 'cliente/CarrinhoDadosController@editEndereco',

      // Geral
      '/Pesquisa'                               => 'geral/PesquisaController@index',
      '/Pesquisa-api'                           => 'geral/PesquisaController@sendPesquisa',
      '/sobre-nos'                              => 'geral/GeralController@sobreNos',

      // Geral - Trocar Email
      '/TrocarEmail'                            => 'auth/AuthController@requestEmailReset',
      '/TrocarEmail-api'                        => 'geral/TrocarEmailController@TrocarEmail',

      '/TrocarEmailConfirmar'                   => 'auth/AuthController@confirmEmailReset',
      '/TrocarEmail-api-confirmar'              => 'geral/salvarNovoEmailController@salvarEmail',

      // Geral - Redefinir Senha
      '/RedefinirSenha'                         => 'auth/AuthController@requestPasswordReset',
      '/RedefinirSenhaConfirmar'                => 'auth/AuthController@confirmPasswordReset',

      '/RedefinirSenha-api'                     => 'geral/EnviarTokenController@gerarToken',
      '/RedefinirSenha-api-salvar'              => 'geral/EnviarTokenController@salvarSenha',

      // Geral - Perfil
      '/EditarPerfil'                           => 'geral/GeralController@editarPerfil',
      '/Perfil'                                 => 'geral/GeralController@perfil',
      '/Error-404'                              => 'geral/GeralController@error',
      '/ProdutosVendedorCliente'                => 'geral/GeralController@sendProdutosVendedor',

      // Vendedor - Cadastro e Perfil
      '/ProdutosVendedor'                       => 'vendedor/VendedorController@sendProdutosVendedor',
      '/CadastroVendedorInfo'                   => 'vendedor/VendedorController@showInfo',
      '/CadastroVendedor'                       => 'vendedor/VendedorController@showFormCadastro',
      '/CadastroVendedorForms'                  => 'vendedor/VendedorController@cadastroForm',
      '/GetCategoriasSubcategorias-api'         => 'vendedor/VendedorController@getCategoriasSubcategorias',


      '/api/vendedor/editarDadosVendedor'       => 'vendedor/VendedorController@editarDadosVendedor',
      '/SalvarDestaque-api'                     => 'vendedor/DestaqueController@salvarDestaque',
      '/RemoverDestaque-api'                    => 'vendedor/DestaqueController@removerDestaque',
      '/getDadosVendedor-api'                   => 'vendedor/VendedorController@getDadosVendedor',
      '/DestaquesVendedor'                      => 'vendedor/DestaqueController@listarDestaques',

      // Vendedor - Produtos e Pedidos
      '/PedidosVendedor'                        => 'vendedor/VendedorProductController@pedidos',
      '/PedidoConfirmar'                        => 'vendedor/VendedorProductController@confirm',
      '/ProdutoRegistrar'                       => 'vendedor/VendedorProductController@create',
      '/EditarProduto'                          => 'vendedor/VendedorProductController@edit',
      '/AtualizarProduto'                       => 'vendedor/ProdutoController@atualizarProduto',
      '/ProdutoStatus-api'                      => 'vendedor/ProdutoController@alterarStatusProduto',
      '/RelatorioVendas'                        => 'vendedor/VendedorProductController@report',
      '/ProdutoRegistro'                        => 'vendedor/ProdutoController@produto',
      '/GerenciarProdutos'                      => 'vendedor/VendedorController@gerenciarProdutos',
      '/GerenciarProdutos-api'                  => 'vendedor/VendedorController@relatorioProdutosJson',
      '/Search-product-api'                     => 'vendedor/ProdutoController@searchProductJson',

      // Vendedor - Gerenciar Vendas
      '/GerenciarVendas'                        => 'vendedor/GerenciarVendasController@index',
      '/GerenciarVendas-api'                    => 'vendedor/GerenciarVendasController@exibirVendas',
      '/Venda-api-sale'                         => 'vendedor/VendaController@exibirVenda',

      // Admin
      '/AdminDashboard'                         => 'admin/AdminController@dashboard',

      '/AprovarVendedor'                        => 'admin/AprovarVendedorController@index',
      '/AprovarVendedor-api'                    => 'admin/AprovarVendedorController@atualizarStatus',
      '/EstatisticasVendedores-api'             => 'admin/AprovarVendedorController@mostrarEstatisticas',

      '/AtualizarUsuario'                       => 'admin/AdminController@atualizarUsuario',

      '/GerenciarUsuarios'                      => 'admin/GerenciarUsuariosController@index',
      '/GerenciarUsuarios-desativar'            => 'admin/GerenciarUsuariosController@desativarUsuario',
      '/GerenciarUsuarios-ativar'               => 'admin/GerenciarUsuariosController@ativarUsuario',
      '/GerenciarUsuarios-search'               => 'admin/GerenciarUsuariosController@searchDesativar',

      '/GerenciarPropagandas'                   => 'admin/GerenciarPropagandasController@index',
      '/GerenciarPropagandas-api'               => 'admin/GerenciarPropagandasController@GerenciarPropagandasApi',

      '/RelatorioVendedor'                      => 'admin/RelatorioVendedorController@index',
      '/RelatorioVendedor-api'                  => 'admin/RelatorioVendedorController@exibirRelatorio',

      '/AdminCarrossel'                         => 'admin/AdminController@adminCarrossel',
      '/searchDesativarUser'                    => 'admin/AdminController@searchDesativarUser',
      '/DesativarUser'                          => 'admin/AdminController@desativarUser',
      '/GerenciarVendedor'                      => 'admin/AdminController@gerenciarVendedor',
      '/api/admin/pesquisar-cliente'            => 'admin/AdminController@searchUser',
      '/api/admin/atualizar-cliente'            => 'admin/AdminController@updateUser',
      '/api/admin/editarDadosAdmin'             => 'admin/AdminController@editarDadosAdmin',
];

// Join DIRECTOR SEPARETOR
