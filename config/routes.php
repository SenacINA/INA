<?php

    // return [
    //     '' => '/app/views/geral/home.php',
    //     'index.php' => '/app/views/geral/home.php',
    //     'sobre' => '/app/views/geral/sobre_nos.php',
    //     '404' => '/app/views/geral/error.php',
    //     'carrinho_vazio.php' => '/app/views/cliente/carrinho_vazio.php',
    // ];

    $routes = [
        '/' => 'HomeController@index',
        '/users/{id}' => 'UserController@show',
        '/cliente/produto' => 'ProdutoController@index',
    ]

// MVC Baseada em controller

?>
