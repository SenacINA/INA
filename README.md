
```
INA
├─ app
│  ├─ components
│  │  ├─ js
│  │  │  └─ toast.js
│  │  └─ php
│  │     ├─ card_produto.php
│  │     ├─ carrossel.php
│  │     ├─ footer.php
│  │     ├─ navbar.php
│  │     ├─ parallax.php
│  │     └─ produto_carrinho.php
│  ├─ controllers
│  │  └─ geral
│  │     ├─ enviar_token.php
│  │     ├─ login_controller.php
│  │     └─ logout_model.php
│  ├─ models
│  │  ├─ connect.php
│  │  └─ login_model.php
│  └─ views
│     ├─ admin
│     │  ├─ admin_carrossel.php
│     │  ├─ aprovar_vendedor.php
│     │  ├─ atualizar_usuario.php
│     │  ├─ dashboard.php
│     │  ├─ gerenciar_carrossel.php
│     │  ├─ gerenciar_produtos.php
│     │  ├─ gerenciar_usuario.php
│     │  ├─ historico_acesso.php
│     │  ├─ perfil_admin.php
│     │  └─ relatorio_vendedor.php
│     ├─ cliente
│     │  ├─ cadastro.php
│     │  ├─ carrinho_dados.php
│     │  ├─ carrinho_pagamentos.php
│     │  ├─ carrinho_vazio.php
│     │  ├─ categoria.php
│     │  ├─ editar_perfil_cliente.php
│     │  ├─ login.php
│     │  ├─ perfil_cliente.php
│     │  └─ produto.php
│     ├─ geral
│     │  ├─ error.php
│     │  ├─ home.php
│     │  ├─ redefinir_email_1.php
│     │  ├─ redefinir_email_2.php
│     │  ├─ redefinir_senha_1.php
│     │  ├─ redefinir_senha_2.php
│     │  └─ sobre_nos.php
│     └─ vendedor
│        ├─ cadastro_vendedor_1.php
│        ├─ cadastro_vendedor_2.php
│        ├─ confirmar_pedido.php
│        ├─ editar_perfil_vendedor.php
│        ├─ editar_produto.php
│        ├─ gerenciar_pedidos.php
│        ├─ perfil_vendedor.php
│        ├─ registro_produto.php
│        └─ relatorio_vendas.php
├─ config
│  ├─ database.php
│  └─ routes.php
├─ db
│  ├─ banco_schema.sql
│  └─ insert_base.sql
├─ index.php
├─ public
│  ├─ css
│  │  ├─ admin
│  │  │  ├─ admin_carrossel.css
│  │  │  ├─ aprovar_vendedor.css
│  │  │  ├─ atualizar_usuario.css
│  │  │  ├─ dashboard.css
│  │  │  ├─ gerenciar_carrossel.css
│  │  │  ├─ gerenciar_produtos.css
│  │  │  ├─ gerenciar_usuario.css
│  │  │  ├─ historico_acesso.css
│  │  │  ├─ perfil_admin.css
│  │  │  └─ relatorio_vendedor.css
│  │  ├─ cliente
│  │  │  ├─ cadastro.css
│  │  │  ├─ carinho_dados.css
│  │  │  ├─ carrinho_pagamentos.css
│  │  │  ├─ carrinho_vazio.css
│  │  │  ├─ categoria.css
│  │  │  ├─ editar_perfil_cliente.css
│  │  │  ├─ login.css
│  │  │  ├─ perfil_cliente.css
│  │  │  └─ produto.css
│  │  ├─ geral
│  │  │  ├─ error.css
│  │  │  ├─ footer.css
│  │  │  ├─ home.css
│  │  │  ├─ parallax.css
│  │  │  ├─ preferencias.css
│  │  │  ├─ redefinir_email_1.css
│  │  │  ├─ redefinir_email_2.css
│  │  │  ├─ redefinir_senha_1.css
│  │  │  ├─ redefinir_senha_2.css
│  │  │  └─ sobre_nos.css
│  │  ├─ style.css
│  │  └─ vendedor
│  │     ├─ cadastro_vendedor_1.css
│  │     ├─ cadastro_vendedor_2.css
│  │     ├─ confirmar_pedido.css
│  │     ├─ editar_perfil_vendedor.css
│  │     ├─ editar_produto.css
│  │     ├─ gerenciar_pedidos.css
│  │     ├─ perfil_vendedor.css
│  │     ├─ registro_produto.css
│  │     └─ relatorio_vendas.css
│  ├─ image
│  │  ├─ admin
│  │  │  ├─ dashboard
│  │  │  │  ├─ aprovar_vendedor.svg
│  │  │  │  ├─ gerenciar_carrossel.svg
│  │  │  │  ├─ gerenciar_cupom.svg
│  │  │  │  ├─ gerenciar_produtos.svg
│  │  │  │  ├─ gerenciar_user.svg
│  │  │  │  ├─ gestao.svg
│  │  │  │  ├─ linha.svg
│  │  │  │  ├─ logout.svg
│  │  │  │  ├─ redefinir_senha.svg
│  │  │  │  ├─ relatorio_vendas.svg
│  │  │  │  ├─ seta.svg
│  │  │  │  ├─ seta_baixo.svg
│  │  │  │  ├─ seta_baixo2.svg
│  │  │  │  └─ seu_perfil.svg
│  │  │  ├─ gerenciar_carrossel
│  │  │  │  └─ perfil_img.svg
│  │  │  ├─ perfil_admin
│  │  │  │  ├─ enviar_arquivo.svg
│  │  │  │  └─ perfil_img.svg
│  │  │  └─ relatorio_vendedor
│  │  │     └─ imagem_perfil_vendedor.png
│  │  ├─ carrinho
│  │  │  ├─ carrinho_cinza_icon.svg
│  │  │  ├─ carrinho_icon.svg
│  │  │  ├─ confirmacao_cinza_icon.svg
│  │  │  ├─ identificacao_cinza_icon.svg
│  │  │  ├─ identificacao_icon.svg
│  │  │  ├─ pagamento_cinza_icon.svg
│  │  │  ├─ pagamento_icon.svg
│  │  │  ├─ servico.svg
│  │  │  └─ whatsapp_user_carrinho_pagamentos.png
│  │  ├─ carrossel
│  │  │  ├─ banner_carrossel_eletrodomesticos.png
│  │  │  ├─ banner_carrossel_eletrodomesticos_mobile.png
│  │  │  ├─ banner_carrossel_eletronicos.png
│  │  │  ├─ banner_carrossel_eletronicos_mobile.png
│  │  │  ├─ banner_carrossel_escritorio.png
│  │  │  ├─ banner_carrossel_escritorio_mobile.png
│  │  │  ├─ banner_carrossel_perifericos.png
│  │  │  └─ banner_carrossel_perifericos_mobile.png
│  │  ├─ cliente
│  │  │  ├─ cadastro
│  │  │  │  └─ cadastro_fundo.png
│  │  │  ├─ categoria
│  │  │  │  ├─ img_carrossel_placeholder.png
│  │  │  │  ├─ img_fundo_categoria.png
│  │  │  │  └─ img_seta_triangulo.png
│  │  │  ├─ editar_perfil
│  │  │  │  ├─ mini_banner_perfil_cliente.png
│  │  │  │  └─ perfil_usuario.svg
│  │  │  ├─ faq-img
│  │  │  │  ├─ cara.svg
│  │  │  │  ├─ check.svg
│  │  │  │  └─ man_faq.png
│  │  │  ├─ footer
│  │  │  │  ├─ img_footer_placeholder.png
│  │  │  │  └─ whats_logo.png
│  │  │  ├─ perfil_cliente
│  │  │  │  ├─ Anuncio.png
│  │  │  │  ├─ banner_user.png
│  │  │  │  ├─ foto_user.png
│  │  │  │  ├─ icon_contato_user.png
│  │  │  │  ├─ membro_user.svg
│  │  │  │  ├─ seta.svg
│  │  │  │  └─ teclado_gamer.png
│  │  │  └─ produto
│  │  │     ├─ bar_video.png
│  │  │     ├─ cadeira_gamer.png
│  │  │     ├─ cadeira_gamer_1.jpg
│  │  │     ├─ cadeira_gamer_2.jpg
│  │  │     ├─ cadeira_gamer_3.jpg
│  │  │     ├─ cadeira_gamer_4.jpg
│  │  │     ├─ cadeira_gamer_size_big.png
│  │  │     ├─ icon_camera.svg
│  │  │     ├─ icon_profile.svg
│  │  │     └─ user_thunder_gamers.png
│  │  ├─ geral
│  │  │  ├─ botoes
│  │  │  │  ├─ +_branco_icon.svg
│  │  │  │  ├─ +_carolina_icon.svg
│  │  │  │  ├─ alinhamento_icon.svg
│  │  │  │  ├─ arquivo_icon.svg
│  │  │  │  ├─ cesta_branca_icon.svg
│  │  │  │  ├─ enviar_branco_icon.svg
│  │  │  │  ├─ italico_icon.svg
│  │  │  │  ├─ lista_icon.svg
│  │  │  │  ├─ lixo_branco_icon.svg
│  │  │  │  ├─ sair_branco_icon.svg
│  │  │  │  ├─ sair_vermelho_icon.svg
│  │  │  │  ├─ salvar_icon.svg
│  │  │  │  ├─ seta_baixo_icon.svg
│  │  │  │  ├─ seta_esquerda_branco_icon.svg
│  │  │  │  ├─ seta_esquerda_carolina_icon.svg
│  │  │  │  ├─ v_branco_icon.svg
│  │  │  │  ├─ x_branco_icon.svg
│  │  │  │  └─ x_vermelho_icon.svg
│  │  │  ├─ check.svg
│  │  │  ├─ confirmacao.svg
│  │  │  ├─ enzo.png
│  │  │  ├─ error
│  │  │  │  └─ inaBot_tv.png
│  │  │  ├─ footer.svg
│  │  │  ├─ footer_crop.svg
│  │  │  ├─ icone_eaoquadrado.ico
│  │  │  ├─ icons
│  │  │  │  ├─ add_icon.svg
│  │  │  │  ├─ alinhamento_centro_icon.svg
│  │  │  │  ├─ alinhamento_direita_icon.svg
│  │  │  │  ├─ alinhamento_esquerda_icon.svg
│  │  │  │  ├─ alinhamento_justificado_icon.svg
│  │  │  │  ├─ anuncio_icon.svg
│  │  │  │  ├─ atualizar_icon.svg
│  │  │  │  ├─ balao_exclamacao_icon.svg
│  │  │  │  ├─ balao_interrogacao_icon.svg
│  │  │  │  ├─ bandeira_icon.svg
│  │  │  │  ├─ cadeado_icon.svg
│  │  │  │  ├─ caneta_branca_icon.svg
│  │  │  │  ├─ caneta_carolina_icon.svg
│  │  │  │  ├─ carrinho_carga_icon.svg
│  │  │  │  ├─ carrossel_icon.svg
│  │  │  │  ├─ check_carolina_icon.svg
│  │  │  │  ├─ configure.svg
│  │  │  │  ├─ cupom_icon.svg
│  │  │  │  ├─ descr_icon.svg
│  │  │  │  ├─ engrenagem_icon.svg
│  │  │  │  ├─ estela_icon.svg
│  │  │  │  ├─ etiqueta_add_icon.svg
│  │  │  │  ├─ etiqueta_icon.svg
│  │  │  │  ├─ facebook_icon.svg
│  │  │  │  ├─ grafico_icon.svg
│  │  │  │  ├─ imagem_icon.svg
│  │  │  │  ├─ informacao_icon.svg
│  │  │  │  ├─ info_icon.svg
│  │  │  │  ├─ info_user_icon.svg
│  │  │  │  ├─ instagram_icon.svg
│  │  │  │  ├─ lapis_icon.svg
│  │  │  │  ├─ linkedin_icon.svg
│  │  │  │  ├─ lista_caneta_icon.svg
│  │  │  │  ├─ lista_icon.svg
│  │  │  │  ├─ lista_lupa_icon.svg
│  │  │  │  ├─ lista_perfil_icon.svg
│  │  │  │  ├─ lista_relatorio_icon.svg
│  │  │  │  ├─ lixo_vermelho_icon.svg
│  │  │  │  ├─ localizacao_icon.svg
│  │  │  │  ├─ loja_icon.svg
│  │  │  │  ├─ loja_icon_branco.svg
│  │  │  │  ├─ megafone_icon.svg
│  │  │  │  ├─ olho_aberto_icon.svg
│  │  │  │  ├─ olho_fechado_icon.svg
│  │  │  │  ├─ pasta_clock_icon.svg
│  │  │  │  ├─ pc_celular_icon.svg
│  │  │  │  ├─ perfil_icon.svg
│  │  │  │  ├─ perfil_info_icon.svg
│  │  │  │  ├─ perfil_lupa_icon.svg
│  │  │  │  ├─ perfil_membros_icon.svg
│  │  │  │  ├─ perfil_verificado_icon.svg
│  │  │  │  ├─ porcentagem_icon.svg
│  │  │  │  ├─ produto_icon.svg
│  │  │  │  ├─ produto_lupa_icon.svg
│  │  │  │  ├─ regua_icon.svg
│  │  │  │  ├─ relogio_icon.svg
│  │  │  │  ├─ seta_baixo.svg
│  │  │  │  ├─ seta_cima.svg
│  │  │  │  ├─ seta_filtro.svg
│  │  │  │  ├─ seta_longa_icon.svg
│  │  │  │  ├─ seta_menor_icon.svg
│  │  │  │  ├─ tempo_icon.svg
│  │  │  │  ├─ texto_icon.svg
│  │  │  │  ├─ ticket_icon.svg
│  │  │  │  ├─ tiktok_icon.svg
│  │  │  │  ├─ whatsapp_icon.svg
│  │  │  │  ├─ x_twitter_icon.svg
│  │  │  │  └─ youtube_icon.svg
│  │  │  ├─ logo-eaoquadrado.png
│  │  │  └─ parallax
│  │  │     ├─ img_parallax_background.png
│  │  │     └─ logo_parallax.svg
│  │  ├─ index
│  │  │  ├─ BannerCupom10.jpg
│  │  │  ├─ BannerCupom25.jpg
│  │  │  ├─ BannerGarantia.jpg
│  │  │  ├─ bannerJBL.png
│  │  │  ├─ BannerRedragon.jpg
│  │  │  ├─ carrinho.png
│  │  │  ├─ carrosselCasa.png
│  │  │  ├─ carrosselCelulares.png
│  │  │  ├─ carrosselConsole.png
│  │  │  ├─ carrosselEletro.png
│  │  │  ├─ carrosselEscritorio.png
│  │  │  ├─ carrosselGamer.png
│  │  │  ├─ carrosselHardware.png
│  │  │  ├─ carrosselMovel.png
│  │  │  ├─ carrosselPerifericos.png
│  │  │  ├─ config.png
│  │  │  ├─ fundoCarrossel.jpg
│  │  │  ├─ Logo.svg
│  │  │  ├─ logoEscrita.svg
│  │  │  ├─ lupa.png
│  │  │  ├─ Produto01.jpg
│  │  │  ├─ Produto02.jpg
│  │  │  ├─ Produto03.jpg
│  │  │  ├─ Produto04.jpg
│  │  │  ├─ Produto05.jpg
│  │  │  ├─ Produto06.jpg
│  │  │  ├─ Produto07.jpg
│  │  │  ├─ Produto08.jpg
│  │  │  ├─ Produto09.jpg
│  │  │  ├─ Produto10.jpg
│  │  │  ├─ Produto11.jpg
│  │  │  ├─ Produto12.jpg
│  │  │  └─ user.png
│  │  └─ vendedor
│  │     ├─ confirmar_pedido
│  │     │  ├─ bolinha_itens.svg
│  │     │  ├─ mouse.svg
│  │     │  └─ teclado.svg
│  │     ├─ editar_perfil_vendedor
│  │     │  ├─ banner_vendedor_mini_perfil.png
│  │     │  └─ pfp_vendedor.png
│  │     ├─ gerenciar_vendedor
│  │     │  └─ banner.png
│  │     └─ perfil_vendedor
│  │        ├─ banner_vendedor_mini_perfil.png
│  │        └─ pfp_vendedor.png
│  └─ js
│     ├─ admin
│     │  ├─ cupom.js
│     │  ├─ placeholder.txt
│     │  ├─ toggleSenha.js
│     │  └─ toggle_redefinir.js
│     ├─ cliente
│     │  ├─ carrinho.js
│     │  ├─ categoria.js
│     │  ├─ editar_perfil_cliente.js
│     │  ├─ filtro.js
│     │  └─ produto_carrossel.js
│     ├─ geral
│     │  ├─ base.js
│     │  ├─ btn_topo.js
│     │  ├─ carrossel.js
│     │  ├─ parallax.js
│     │  ├─ pop-Up_redefinir.js
│     │  └─ sobre_nos.js
│     └─ vendedor
│        ├─ img_input.js
│        ├─ perfil_vendedor.js
│        ├─ promocao_toggle.js
│        └─ text_editor.js
└─ utils
   └─ head.php

```
```
INA
├─ app
│  ├─ components
│  │  ├─ js
│  │  │  └─ toast.js
│  │  └─ php
│  │     ├─ card_produto.php
│  │     ├─ carrossel.php
│  │     ├─ footer.php
│  │     ├─ navbar.php
│  │     ├─ parallax.php
│  │     └─ produto_carrinho.php
│  ├─ controllers
│  │  └─ geral
│  │     ├─ enviar_token.php
│  │     ├─ login_controller.php
│  │     └─ logout_model.php
│  ├─ models
│  │  ├─ connect.php
│  │  └─ login_model.php
│  └─ views
│     ├─ admin
│     │  ├─ admin_carrossel.php
│     │  ├─ aprovar_vendedor.php
│     │  ├─ atualizar_usuario.php
│     │  ├─ dashboard.php
│     │  ├─ gerenciar_carrossel.php
│     │  ├─ gerenciar_produtos.php
│     │  ├─ gerenciar_usuario.php
│     │  ├─ historico_acesso.php
│     │  ├─ perfil_admin.php
│     │  └─ relatorio_vendedor.php
│     ├─ cliente
│     │  ├─ cadastro.php
│     │  ├─ carrinho_dados.php
│     │  ├─ carrinho_pagamentos.php
│     │  ├─ carrinho_vazio.php
│     │  ├─ categoria.php
│     │  ├─ editar_perfil_cliente.php
│     │  ├─ login.php
│     │  ├─ perfil_cliente.php
│     │  └─ produto.php
│     ├─ geral
│     │  ├─ error.php
│     │  ├─ home.php
│     │  ├─ redefinir_email_1.php
│     │  ├─ redefinir_email_2.php
│     │  ├─ redefinir_senha_1.php
│     │  ├─ redefinir_senha_2.php
│     │  └─ sobre_nos.php
│     └─ vendedor
│        ├─ cadastro_vendedor_1.php
│        ├─ cadastro_vendedor_2.php
│        ├─ confirmar_pedido.php
│        ├─ editar_perfil_vendedor.php
│        ├─ editar_produto.php
│        ├─ gerenciar_pedidos.php
│        ├─ perfil_vendedor.php
│        ├─ registro_produto.php
│        └─ relatorio_vendas.php
├─ config
│  ├─ database.php
│  └─ routes.php
├─ db
│  ├─ banco_schema.sql
│  └─ insert_base.sql
├─ index.php
├─ public
│  ├─ css
│  │  ├─ admin
│  │  │  ├─ admin_carrossel.css
│  │  │  ├─ aprovar_vendedor.css
│  │  │  ├─ atualizar_usuario.css
│  │  │  ├─ dashboard.css
│  │  │  ├─ gerenciar_carrossel.css
│  │  │  ├─ gerenciar_produtos.css
│  │  │  ├─ gerenciar_usuario.css
│  │  │  ├─ historico_acesso.css
│  │  │  ├─ perfil_admin.css
│  │  │  └─ relatorio_vendedor.css
│  │  ├─ cliente
│  │  │  ├─ cadastro.css
│  │  │  ├─ carinho_dados.css
│  │  │  ├─ carrinho_pagamentos.css
│  │  │  ├─ carrinho_vazio.css
│  │  │  ├─ categoria.css
│  │  │  ├─ editar_perfil_cliente.css
│  │  │  ├─ login.css
│  │  │  ├─ perfil_cliente.css
│  │  │  └─ produto.css
│  │  ├─ geral
│  │  │  ├─ error.css
│  │  │  ├─ footer.css
│  │  │  ├─ home.css
│  │  │  ├─ parallax.css
│  │  │  ├─ preferencias.css
│  │  │  ├─ redefinir_email_1.css
│  │  │  ├─ redefinir_email_2.css
│  │  │  ├─ redefinir_senha_1.css
│  │  │  ├─ redefinir_senha_2.css
│  │  │  └─ sobre_nos.css
│  │  ├─ style.css
│  │  └─ vendedor
│  │     ├─ cadastro_vendedor_1.css
│  │     ├─ cadastro_vendedor_2.css
│  │     ├─ confirmar_pedido.css
│  │     ├─ editar_perfil_vendedor.css
│  │     ├─ editar_produto.css
│  │     ├─ gerenciar_pedidos.css
│  │     ├─ perfil_vendedor.css
│  │     ├─ registro_produto.css
│  │     └─ relatorio_vendas.css
│  ├─ image
│  │  ├─ admin
│  │  │  ├─ dashboard
│  │  │  │  ├─ aprovar_vendedor.svg
│  │  │  │  ├─ gerenciar_carrossel.svg
│  │  │  │  ├─ gerenciar_cupom.svg
│  │  │  │  ├─ gerenciar_produtos.svg
│  │  │  │  ├─ gerenciar_user.svg
│  │  │  │  ├─ gestao.svg
│  │  │  │  ├─ linha.svg
│  │  │  │  ├─ logout.svg
│  │  │  │  ├─ redefinir_senha.svg
│  │  │  │  ├─ relatorio_vendas.svg
│  │  │  │  ├─ seta.svg
│  │  │  │  ├─ seta_baixo.svg
│  │  │  │  ├─ seta_baixo2.svg
│  │  │  │  └─ seu_perfil.svg
│  │  │  ├─ gerenciar_carrossel
│  │  │  │  └─ perfil_img.svg
│  │  │  ├─ perfil_admin
│  │  │  │  ├─ enviar_arquivo.svg
│  │  │  │  └─ perfil_img.svg
│  │  │  └─ relatorio_vendedor
│  │  │     └─ imagem_perfil_vendedor.png
│  │  ├─ carrinho
│  │  │  ├─ carrinho_cinza_icon.svg
│  │  │  ├─ carrinho_icon.svg
│  │  │  ├─ confirmacao_cinza_icon.svg
│  │  │  ├─ identificacao_cinza_icon.svg
│  │  │  ├─ identificacao_icon.svg
│  │  │  ├─ pagamento_cinza_icon.svg
│  │  │  ├─ pagamento_icon.svg
│  │  │  ├─ servico.svg
│  │  │  └─ whatsapp_user_carrinho_pagamentos.png
│  │  ├─ carrossel
│  │  │  ├─ banner_carrossel_eletrodomesticos.png
│  │  │  ├─ banner_carrossel_eletrodomesticos_mobile.png
│  │  │  ├─ banner_carrossel_eletronicos.png
│  │  │  ├─ banner_carrossel_eletronicos_mobile.png
│  │  │  ├─ banner_carrossel_escritorio.png
│  │  │  ├─ banner_carrossel_escritorio_mobile.png
│  │  │  ├─ banner_carrossel_perifericos.png
│  │  │  └─ banner_carrossel_perifericos_mobile.png
│  │  ├─ cliente
│  │  │  ├─ cadastro
│  │  │  │  └─ cadastro_fundo.png
│  │  │  ├─ categoria
│  │  │  │  ├─ img_carrossel_placeholder.png
│  │  │  │  ├─ img_fundo_categoria.png
│  │  │  │  └─ img_seta_triangulo.png
│  │  │  ├─ editar_perfil
│  │  │  │  ├─ mini_banner_perfil_cliente.png
│  │  │  │  └─ perfil_usuario.svg
│  │  │  ├─ faq-img
│  │  │  │  ├─ cara.svg
│  │  │  │  ├─ check.svg
│  │  │  │  └─ man_faq.png
│  │  │  ├─ footer
│  │  │  │  ├─ img_footer_placeholder.png
│  │  │  │  └─ whats_logo.png
│  │  │  ├─ perfil_cliente
│  │  │  │  ├─ Anuncio.png
│  │  │  │  ├─ banner_user.png
│  │  │  │  ├─ foto_user.png
│  │  │  │  ├─ icon_contato_user.png
│  │  │  │  ├─ membro_user.svg
│  │  │  │  ├─ seta.svg
│  │  │  │  └─ teclado_gamer.png
│  │  │  └─ produto
│  │  │     ├─ bar_video.png
│  │  │     ├─ cadeira_gamer.png
│  │  │     ├─ cadeira_gamer_1.jpg
│  │  │     ├─ cadeira_gamer_2.jpg
│  │  │     ├─ cadeira_gamer_3.jpg
│  │  │     ├─ cadeira_gamer_4.jpg
│  │  │     ├─ cadeira_gamer_size_big.png
│  │  │     ├─ icon_camera.svg
│  │  │     ├─ icon_profile.svg
│  │  │     └─ user_thunder_gamers.png
│  │  ├─ geral
│  │  │  ├─ botoes
│  │  │  │  ├─ +_branco_icon.svg
│  │  │  │  ├─ +_carolina_icon.svg
│  │  │  │  ├─ alinhamento_icon.svg
│  │  │  │  ├─ arquivo_icon.svg
│  │  │  │  ├─ cesta_branca_icon.svg
│  │  │  │  ├─ enviar_branco_icon.svg
│  │  │  │  ├─ italico_icon.svg
│  │  │  │  ├─ lista_icon.svg
│  │  │  │  ├─ lixo_branco_icon.svg
│  │  │  │  ├─ sair_branco_icon.svg
│  │  │  │  ├─ sair_vermelho_icon.svg
│  │  │  │  ├─ salvar_icon.svg
│  │  │  │  ├─ seta_baixo_icon.svg
│  │  │  │  ├─ seta_esquerda_branco_icon.svg
│  │  │  │  ├─ seta_esquerda_carolina_icon.svg
│  │  │  │  ├─ v_branco_icon.svg
│  │  │  │  ├─ x_branco_icon.svg
│  │  │  │  └─ x_vermelho_icon.svg
│  │  │  ├─ check.svg
│  │  │  ├─ confirmacao.svg
│  │  │  ├─ enzo.png
│  │  │  ├─ error
│  │  │  │  └─ inaBot_tv.png
│  │  │  ├─ footer.svg
│  │  │  ├─ footer_crop.svg
│  │  │  ├─ icone_eaoquadrado.ico
│  │  │  ├─ icons
│  │  │  │  ├─ add_icon.svg
│  │  │  │  ├─ alinhamento_centro_icon.svg
│  │  │  │  ├─ alinhamento_direita_icon.svg
│  │  │  │  ├─ alinhamento_esquerda_icon.svg
│  │  │  │  ├─ alinhamento_justificado_icon.svg
│  │  │  │  ├─ anuncio_icon.svg
│  │  │  │  ├─ atualizar_icon.svg
│  │  │  │  ├─ balao_exclamacao_icon.svg
│  │  │  │  ├─ balao_interrogacao_icon.svg
│  │  │  │  ├─ bandeira_icon.svg
│  │  │  │  ├─ cadeado_icon.svg
│  │  │  │  ├─ caneta_branca_icon.svg
│  │  │  │  ├─ caneta_carolina_icon.svg
│  │  │  │  ├─ carrinho_carga_icon.svg
│  │  │  │  ├─ carrossel_icon.svg
│  │  │  │  ├─ check_carolina_icon.svg
│  │  │  │  ├─ configure.svg
│  │  │  │  ├─ cupom_icon.svg
│  │  │  │  ├─ descr_icon.svg
│  │  │  │  ├─ engrenagem_icon.svg
│  │  │  │  ├─ estela_icon.svg
│  │  │  │  ├─ etiqueta_add_icon.svg
│  │  │  │  ├─ etiqueta_icon.svg
│  │  │  │  ├─ facebook_icon.svg
│  │  │  │  ├─ grafico_icon.svg
│  │  │  │  ├─ imagem_icon.svg
│  │  │  │  ├─ informacao_icon.svg
│  │  │  │  ├─ info_icon.svg
│  │  │  │  ├─ info_user_icon.svg
│  │  │  │  ├─ instagram_icon.svg
│  │  │  │  ├─ lapis_icon.svg
│  │  │  │  ├─ linkedin_icon.svg
│  │  │  │  ├─ lista_caneta_icon.svg
│  │  │  │  ├─ lista_icon.svg
│  │  │  │  ├─ lista_lupa_icon.svg
│  │  │  │  ├─ lista_perfil_icon.svg
│  │  │  │  ├─ lista_relatorio_icon.svg
│  │  │  │  ├─ lixo_vermelho_icon.svg
│  │  │  │  ├─ localizacao_icon.svg
│  │  │  │  ├─ loja_icon.svg
│  │  │  │  ├─ loja_icon_branco.svg
│  │  │  │  ├─ megafone_icon.svg
│  │  │  │  ├─ olho_aberto_icon.svg
│  │  │  │  ├─ olho_fechado_icon.svg
│  │  │  │  ├─ pasta_clock_icon.svg
│  │  │  │  ├─ pc_celular_icon.svg
│  │  │  │  ├─ perfil_icon.svg
│  │  │  │  ├─ perfil_info_icon.svg
│  │  │  │  ├─ perfil_lupa_icon.svg
│  │  │  │  ├─ perfil_membros_icon.svg
│  │  │  │  ├─ perfil_verificado_icon.svg
│  │  │  │  ├─ porcentagem_icon.svg
│  │  │  │  ├─ produto_icon.svg
│  │  │  │  ├─ produto_lupa_icon.svg
│  │  │  │  ├─ regua_icon.svg
│  │  │  │  ├─ relogio_icon.svg
│  │  │  │  ├─ seta_baixo.svg
│  │  │  │  ├─ seta_cima.svg
│  │  │  │  ├─ seta_filtro.svg
│  │  │  │  ├─ seta_longa_icon.svg
│  │  │  │  ├─ seta_menor_icon.svg
│  │  │  │  ├─ tempo_icon.svg
│  │  │  │  ├─ texto_icon.svg
│  │  │  │  ├─ ticket_icon.svg
│  │  │  │  ├─ tiktok_icon.svg
│  │  │  │  ├─ whatsapp_icon.svg
│  │  │  │  ├─ x_twitter_icon.svg
│  │  │  │  └─ youtube_icon.svg
│  │  │  ├─ logo-eaoquadrado.png
│  │  │  └─ parallax
│  │  │     ├─ img_parallax_background.png
│  │  │     └─ logo_parallax.svg
│  │  ├─ index
│  │  │  ├─ BannerCupom10.jpg
│  │  │  ├─ BannerCupom25.jpg
│  │  │  ├─ BannerGarantia.jpg
│  │  │  ├─ bannerJBL.png
│  │  │  ├─ BannerRedragon.jpg
│  │  │  ├─ carrinho.png
│  │  │  ├─ carrosselCasa.png
│  │  │  ├─ carrosselCelulares.png
│  │  │  ├─ carrosselConsole.png
│  │  │  ├─ carrosselEletro.png
│  │  │  ├─ carrosselEscritorio.png
│  │  │  ├─ carrosselGamer.png
│  │  │  ├─ carrosselHardware.png
│  │  │  ├─ carrosselMovel.png
│  │  │  ├─ carrosselPerifericos.png
│  │  │  ├─ config.png
│  │  │  ├─ fundoCarrossel.jpg
│  │  │  ├─ Logo.svg
│  │  │  ├─ logoEscrita.svg
│  │  │  ├─ lupa.png
│  │  │  ├─ Produto01.jpg
│  │  │  ├─ Produto02.jpg
│  │  │  ├─ Produto03.jpg
│  │  │  ├─ Produto04.jpg
│  │  │  ├─ Produto05.jpg
│  │  │  ├─ Produto06.jpg
│  │  │  ├─ Produto07.jpg
│  │  │  ├─ Produto08.jpg
│  │  │  ├─ Produto09.jpg
│  │  │  ├─ Produto10.jpg
│  │  │  ├─ Produto11.jpg
│  │  │  ├─ Produto12.jpg
│  │  │  └─ user.png
│  │  └─ vendedor
│  │     ├─ confirmar_pedido
│  │     │  ├─ bolinha_itens.svg
│  │     │  ├─ mouse.svg
│  │     │  └─ teclado.svg
│  │     ├─ editar_perfil_vendedor
│  │     │  ├─ banner_vendedor_mini_perfil.png
│  │     │  └─ pfp_vendedor.png
│  │     ├─ gerenciar_vendedor
│  │     │  └─ banner.png
│  │     └─ perfil_vendedor
│  │        ├─ banner_vendedor_mini_perfil.png
│  │        └─ pfp_vendedor.png
│  └─ js
│     ├─ admin
│     │  ├─ cupom.js
│     │  ├─ placeholder.txt
│     │  ├─ toggleSenha.js
│     │  └─ toggle_redefinir.js
│     ├─ cliente
│     │  ├─ carrinho.js
│     │  ├─ categoria.js
│     │  ├─ editar_perfil_cliente.js
│     │  ├─ filtro.js
│     │  └─ produto_carrossel.js
│     ├─ geral
│     │  ├─ base.js
│     │  ├─ btn_topo.js
│     │  ├─ carrossel.js
│     │  ├─ parallax.js
│     │  ├─ pop-Up_redefinir.js
│     │  └─ sobre_nos.js
│     └─ vendedor
│        ├─ img_input.js
│        ├─ perfil_vendedor.js
│        ├─ promocao_toggle.js
│        └─ text_editor.js
├─ README.md
└─ utils
   └─ head.php

```