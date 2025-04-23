<?php
    $routes = [
        '/' => 'geral/HomeController@index',
        '/user/{id}' => 'ClienteController@show',
        '/cliente/produto' => 'cliente/ProdutoController@index',
        '/cliente/carrinho' => 'cliente/CarrinhoController@index',
        '/cliente/categoria' => 'cliente/CategoriaController@index',
        '/cliente/perfil' => 'cliente/ClienteController@perfil',
        '/cliente/cadastro' => 'cliente/ClienteController@cadastro',
        '/cliente/login' => 'cliente/ClienteController@login',
        '/cliente/carrinho_dados' => 'cliente/ClienteController@dados',
        '/cliente/carrinho_pagamentos' => 'cliente/ClienteController@pagamentos',
        '/cliente/editar_perfil' => 'cliente/ClienteController@editarPerfil',
        '/geral/redefinir-email' => 'auth/AuthController@requestEmailReset',
        '/geral/redefinir-email/confirmar' => 'auth/AuthController@confirmEmailReset',
        '/geral/redefinir-senha' => 'auth/AuthController@requestPasswordReset',
        '/geral/redefinir-senha/confirmar'=> 'auth/AuthController@confirmPasswordReset',
        '/geral/sobre_nos' => 'geral/GeralController@sobreNos',

        // Join DIRECTOR SEPARETOR

    ]
?>
