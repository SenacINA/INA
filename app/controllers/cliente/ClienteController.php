<?php

class ClienteController extends RenderView {
    public function perfil() {
        $this->loadView('cliente/perfil', []);
    }

    public function editarPerfil() {
        $this->loadView('cliente/editar_perfil', []);
    }

    public function cadastro( ) {
        $this->loadView('cliente/cadastro', []);
    }

    public function login( ) {
        $this->loadView('cliente/login', []);
    }

    public function dados( ) {
        $this->loadView('cliente/carrinho_dados', []);
    }

    public function pagamentos( ) {
        $this->loadView('cliente/carrinho_pagamentos', []);
    }

    // ADAPTAR FUNÇÃO DE LOGIN DO LF
}
