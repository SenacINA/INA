-- Inserir Cliente -> Vendedor
INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    cpf_cliente,
    genero_cliente,
    cep_cliente,
    rg_cliente,
    numero_celular_cliente,
    ddd_cliente,
    foto_perfil_cliente,
    banner_perfil_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    1,
    'Vendedor1',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'vendedor@email.com',
    '',
    '',
    '79033337',
    '178272851',
    '',
    '',
    '',
    '',
    1,
    1
);

-- Inserir Adm

INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    cpf_cliente,
    genero_cliente,
    cep_cliente,
    rg_cliente,
    numero_celular_cliente,
    ddd_cliente,
    foto_perfil_cliente,
    banner_perfil_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    2,
    'Adm',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'adm@email.com',
    '',
    '',
    '79033337',
    '178272851',
    '',
    '',
    '',
    '',
    0,
    1
);

-- Inserir permissões Adm

INSERT INTO permissao_admin (
    id_permissao,
    id_cliente,
    gerenciar_carrossel,
    gerenciar_usuarios,	
    gerenciar_produtos,	
    acessar_historico_acesso	
) VALUES (
    1,
    2,
    TRUE,
    TRUE,
    TRUE,
    TRUE
);

-- Inserir Cliente id:3

INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    3,
    'Cliente',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente@email.com',
    2,
    1
);

-- Insert Perfil cliente

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    2,
    3,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Insert cliente id:4

INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    4,
    'Cliente4',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente4@email.com',
    2,
    1
);

-- Insert Perfil cliente

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    3,
    4,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Insert cliente id:5

INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    5,
    'Cliente5',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente5@email.com',
    2,
    1
);

-- Insert Perfil cliente

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    4,
    5,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);


-- Insert cliente id:6

INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    6,
    'Cliente6',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente6@email.com',
    2,
    1
);

-- Insert Perfil cliente

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    5,
    6,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Inserir categoria
INSERT INTO categoria (nome_categoria) VALUES ('Geral');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) 
VALUES ('Geral', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Geral'));

-- Inserir endereço
INSERT INTO endereco (
    id_endereco,
    rua_endereco,
    bairro_endereco,
    numero_endereco,
    referencia_endereco,
    uf_endereco,
    cidade_endereco,
    id_cliente
) VALUES (
    1,
    '',
    '',
    '',
    '',
    'MS',
    'Campo Grande',
    1
);

-- Inserir perfil
INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil,
    descricao_perfil,
    tiktok_perfil,
    linkedin_perfil,
    facebook_perfil,
    youtube_perfil,
    instagram_perfil,
    x_perfil
) VALUES (
    1,
    1,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png',
    '',
    '',
    '',
    '',
    '',
    '',
    ''
);

-- Inserir vendedor
INSERT INTO vendedor (
    id_vendedor,
    id_cliente,
    nome_fantasia,
    cnpj_vendedor,
    requisitos_completos,
    documento_entregue,
    STATUS,
    data_requisicao
) VALUES (
    1,
    1,
    'Vendedor - 1',
    '12345678910',
    0,
    0,
    'Pendente',
    '2025-06-16 17:40:28'
);

-- Inserir produto 1
INSERT INTO produto (
    id_produto,
    id_vendedor,
    nome_produto,
    preco_produto,
    categoria_produto,
    subcategoria_produto,
    origem_produto,
    unidade_produto,
    peso_liquido_produto,
    peso_bruto_produto,
    largura_produto,
    altura_produto,
    comprimento_produto,
    descricao_produto,
    status_produto
) VALUES (
    1,
    1,
    'Mouse Redragon Cobra M711',
    100,
    1,
    1,
    'Campo Grande',
    10,
    1,
    2,
    6,
    5,
    6,
    '<p><strong>Negrito</strong></p><p><u>Sublinhado</u></p><p><em>Itálico</em></p><p><s>Taxado</s></p><p style="text-align: justify">Texto bem grande para exemplo e para testar o justificado do textobox tiptap, Texto bem grande para exemplo e para testar o justificado do textobox tiptap</p><p style="text-align: right">Texto na direita</p><p style="text-align: center">Texto centralizado</p><ul class="bullet-list"><li><p style="text-align: left">Lista Dot</p></li></ul><ol class="ordered-list"><li><p style="text-align: left">Lista númerica</p></li></ol>',
    1
);

-- Insert Imagem Produto 1
INSERT INTO `imagem_produto` (`id_imagem_produto`, `id_produto`, `endereco_imagem_produto`, `index_imagem_produto`) VALUES ('1', '1', '/upload/produtos/1/imagem_1_1750110499.webp', '1');

INSERT INTO `imagem_produto` (`id_imagem_produto`, `id_produto`, `endereco_imagem_produto`, `index_imagem_produto`) VALUES ('2', '1', '/upload/produtos/1/imagem_2_1750110499.webp', '2');

-- Produto 2
INSERT INTO produto (
    id_produto,
    id_vendedor,
    nome_produto,
    preco_produto,
    categoria_produto,
    subcategoria_produto,
    origem_produto,
    unidade_produto,
    peso_liquido_produto,
    peso_bruto_produto,
    largura_produto,
    altura_produto,
    comprimento_produto,
    descricao_produto,
    status_produto
) VALUES (
    2,
    1,
    'Snoopy',
    1,
    1,
    1,
    'Campo Grande',
    1,
    7,
    10,
    30,
    45,
    50,
    '<p><strong><em><s><u>Cachorro do Elias</u></s></em></strong></p>',
    1
);

-- Produto 3
INSERT INTO produto (
    id_produto,
    id_vendedor,
    nome_produto,
    preco_produto,
    categoria_produto,
    subcategoria_produto,
    origem_produto,
    unidade_produto,
    peso_liquido_produto,
    peso_bruto_produto,
    largura_produto,
    altura_produto,
    comprimento_produto,
    descricao_produto,
    status_produto
) VALUES (
    3,
    1,
    'SAMSUNG Galaxy Buds 2',
    250,
    1,
    1,
    'São Paulo',
    0,
    5,
    5,
    5,
    3,
    5,
    '<ul class="bullet-list">
       <li><p>Seus ouvidos nunca tiveram tão bem: os fones de ouvido Galaxy Buds2 levam sua paixão por música a novos níveis com um som que faz você se sentir como se estivesse no palco com sua pulseira favorita. Observação: se o tamanho das pontas do fone de ouvido não corresponder ao tamanho dos seus canais auditivos ou se o fone de ouvido não for usado adequadamente em seus ouvidos, você pode não obter as qualidades de som corretas ou o desempenho de chamada de ouvido. Mude as pontas dos fones de ouvido para aquelas que se encaixam mais confortavelmente em seus ouvidos</p></li>
       <li><p>Atonue ruídos, sintonize vozes: o cancelamento de ruído ativo bloqueia sons indesejados, ajudando você a manter seu foco onde quer que esteja; o modo de som ambiente de baixa latência capta os sons que você deseja ouvir, para que você sempre tenha o nível de áudio perfeito para cada momento</p></li>
       <li><p>Sinta-se bem enquanto fica bem: o Galaxy Buds2 tem um design confortável e discreto que é 10% menor e mais leve que o Galaxy Buds Plus; você pode chegar ao final da sua lista de reprodução antes de lembrar que está usando-os</p></li>
       <li><p>Ouça claramente, fale com confiança: os 3 microfones dos fones de ouvido e a tecnologia de redução de ruído garantem que as vozes sejam transmitidas de forma nítida e clara, esteja você conversando com um amigo ou liderando uma chamada de conferência de alto impacto</p></li>
       <li><p>Vale a pena de sua lista de reprodução: satisfaça seu amor pela música com uma bateria de longa duração que está pronta para o trabalho — para que sua música não pare até que você faça</p></li>
       <li><p>TAP PARA CONTROLE TOTAL: controle sua lista de reprodução ou atenda chamadas com o toque de um dedo com controle de toque — chega de se atrapalhar para o seu telefone mudar uma música</p></li>
       <li><p>Interruptor: com o interruptor automático, os fones de ouvido detectam a conexão que você precisa e instantaneamente alteram o áudio para aquele dispositivo Galaxy; Mude sem esforço entre seu celular, tablet, relógio ou PC. Buds Controller é compatível com Galaxy Buds Plus, Galaxy Watch4 e seus respectivos modelos a seguir.</p></li>
     </ul>',
    1
);

-- Imagens do produto 2
INSERT INTO imagem_produto (
    id_imagem_produto,
    id_produto,
    endereco_imagem_produto,
    index_imagem_produto
) VALUES (
    3,
    2,
    '/upload/produtos/2/imagem_1_1750112171.webp',
    1
);

-- Imagens do produto 3
INSERT INTO imagem_produto (
    id_imagem_produto,
    id_produto,
    endereco_imagem_produto,
    index_imagem_produto
) VALUES
    (4, 3, '/upload/produtos/3/imagem_1_1750112786.webp', 1),
    (5, 3, '/upload/produtos/3/imagem_2_1750112786.webp', 2),
    (6, 3, '/upload/produtos/3/imagem_3_1750112787.webp', 3),
    (7, 3, '/upload/produtos/3/imagem_4_1750112788.webp', 4);

-- Produto 4
INSERT INTO produto (
    id_produto,
    id_vendedor,
    nome_produto,
    preco_produto,
    categoria_produto,
    subcategoria_produto,
    origem_produto,
    unidade_produto,
    peso_liquido_produto,
    peso_bruto_produto,
    largura_produto,
    altura_produto,
    comprimento_produto,
    descricao_produto,
    status_produto
) VALUES (
    4,
    1,
    'Deo Parfum Essencial Natura Masculino 100 ml',
    139,
    1,
    1,
    'São Paulo',
    50,
    100,
    500,
    7,
    10,
    5,
    '<p>Essencial Deo Parfum Masculino: uma potência em fragrância<br><br>Essencial Deo Parfum Masculino Natura é a expressão máxima da elegância e força. com notas intensas e marcantes, traduz o poder e a sofisticação do homem moderno, oferecendo uma experiência olfativa única.<br><br>Clássico da perfumaria brasileira que combina o frescor das notas verdes com a potência de madeiras profundas.<br>Família olfativa: amadeirado<br>Notas de topo: bergamota, lavanda, gálbano, zimbro, noz moscada, grapefrut e manjericão.<br>Notas de corpo: gerânio, patchuli, alecrim, sálvia e jasmim.<br>Notas de fundo: cedro, musk, musgo de carvalho, sândalo, âmbar, fir bálsamo e mirra.<br>Ocasião: para sair, ocasiões especiais<br><br>BENEFÍCIOS:<br>Fragrância sofisticada e marcante.<br>Longa duração e intensidade.<br>Ideal para ocasiões especiais.<br><br>Aroma amadeirado intenso<br>Uma fragrância poderosa que combina a intensidade das madeiras com a sofisticação das notas cítricas, ideal para o homem que busca uma presença marcante. fusão que traduz a essência do homem moderno, unindo elegância e força em uma fragrância inconfundível.<br><br>DICAS DE USO:<br>Todo mundo tem um jeito único de se perfumar. mas, para prolongar a fragrância, nossa dica é que aplique nos pontos de maior pulsação, como pescoço, punhos e atrás das orelhas. mantenha uma aura de elegância durante todo o dia.</p>',
    1
);

-- Produto 5
INSERT INTO produto (
    id_produto,
    id_vendedor,
    nome_produto,
    preco_produto,
    categoria_produto,
    subcategoria_produto,
    origem_produto,
    unidade_produto,
    peso_liquido_produto,
    peso_bruto_produto,
    largura_produto,
    altura_produto,
    comprimento_produto,
    descricao_produto,
    status_produto
) VALUES (
    5,
    1,
    'PlayStation 5 Pro PlayStation 5 Pro Sony 2024',
    6999,
    1,
    1,
    'São Paulo',
    120,
    4500,
    6000,
    15,
    45,
    35,
    '<p>Console Playstation 5 Pro Ssd Com 2tb 8k Wi-fi 7 Vvr Upscaling Edição Digital Branco + Controle DualSense<br><br><br>Com o console PlayStation 5 Pro, os maiores criadores de jogos do mundo podem melhorar seus jogos com recursos incríveis, como Ray Tracing avançado, imagem super nítida para TV 4K e jogabilidade com alta taxa de quadros.* Isso significa que você poderá jogar os jogos do PS5 com os visuais mais impressionantes já vistos em um console PlayStation e, com 2 TB de armazenamento SSD incluídos, seus jogos favoritos estarão prontos e esperando a próxima aventura incrível.<br><br>O PS5 Pro é um console totalmente digital, sem unidade de disco. Inicie uma sessão na sua conta da PlayStation Network e acesse a PlayStation Store para comprar e baixar jogos. Você também pode adicionar uma unidade de disco ao seu console PS5 Pro se quiser jogar jogos de PS5 ou PS4 em discos Blu-ray, ou se quiser assistir a filmes e programas em discos Blu-ray 4K Ultra HD, discos Blu-ray e DVDs. A unidade de disco compatível é vendida separadamente.<br><br>*Recursos disponíveis somente em jogos de PS5 selecionados que foram aprimorados para o PS5 Pro em comparação com o PS5. Os recursos aprimorados do PS5 Pro variam de acordo com o jogo.<br><br>*Uma parte do SSD é reservada para software do sistema e outras funções, portanto a capacidade disponível do SSD pode variar.<br><br>Super-resolução espectral do PlayStation (PSSR)<br>Aproveite a imagem super nítida em sua TV 4K usando a resolução aprimorada por IA para jogar em definição ultra-alta com detalhes surpreendentes.*<br><br>Desempenho otimizado do console<br>Alcance taxas de quadros mais altas e mais consistentes para uma gameplay fluida e tranquila com suporte para telas de 60 Hz e 120 Hz.*<br><br>Ray Tracing avançado<br>Experimente um realismo de alto nível graças aos reflexos e sombras com traçado de raios e à iluminação global de alta qualidade enquanto explora mundos de jogos impressionantes.*<br><br class="ProseMirror-trailingBreak"></p>',
    1
);

-- Imagens do produto 4
INSERT INTO imagem_produto (
    id_imagem_produto,
    id_produto,
    endereco_imagem_produto,
    index_imagem_produto
) VALUES
    (8, 4, '/upload/produtos/4/imagem_1_1750113078.webp', 1),
    (9, 4, '/upload/produtos/4/imagem_2_1750113080.webp', 2),
    (10, 4, '/upload/produtos/4/imagem_3_1750113082.webp', 3),
    (11, 4, '/upload/produtos/4/imagem_4_1750113083.webp', 4);

-- Imagens do produto 5
INSERT INTO imagem_produto (
    id_imagem_produto,
    id_produto,
    endereco_imagem_produto,
    index_imagem_produto
) VALUES
    (12, 5, '/upload/produtos/5/imagem_1_1750113375.webp', 1),
    (13, 5, '/upload/produtos/5/imagem_2_1750113375.webp', 2),
    (14, 5, '/upload/produtos/5/imagem_3_1750113375.webp', 3);

-- Avaliações para o produto 1 do vendedor 1 por vários clientes

INSERT INTO avaliacao (
    id_avaliacao,
    status_avaliacao,
    estrelas_avaliacao,
    data_avaliacao,
    descricao_avaliacao,
    qualidade,
    parecido,
    id_produto,
    id_cliente,
    id_vendedor
) VALUES
    (1, TRUE, 5.0, '2025-06-17',
     'Produto incrível, superou todas as minhas expectativas! Ótima qualidade e entrega rápida.',
     'Excelente', TRUE, 1, 2, 1),
    -- (2, TRUE, 4, '2025-06-16',
    --  'Ótimo desempenho, só a embalagem chegou um pouco amassada, mas o produto veio intacto.',
    --  'Boa', TRUE, 1, 3, 1),
    (3, TRUE, 3.0, '2025-06-15',
     'Produto funcional, mas o acabamento poderia ser melhor e alguns detalhes de montagem vieram soltos.',
     'Regular', FALSE, 1, 4, 1),
    (4, TRUE, 2.0, '2025-06-14',
     'Não gostei da durabilidade; após poucos usos já apresentou sinal de desgaste.',
     'Ruim', FALSE, 1, 5, 1),
    (5, TRUE, 0, '2025-06-18',
     'Recebi o produto danificado e ainda não consegui contato para troca. Estou aguardando resposta.',
     'Péssimo', FALSE, 1, 6, 1);

-- Inserir imagens para avaliações do produto 1

INSERT INTO imagem_avaliacao (
    id_imagem_avaliacao,
    endereco_imagem_avaliacao,
    id_avaliacao
) VALUES
    (1, '/upload/avaliacoes/1/1/avaliacao_imagem.jpg', 1),
    -- (2, '/upload/avaliacoes/1/2/avaliacao_imagem.jpg', 2),
    (3, '/upload/avaliacoes/1/3/avaliacao_imagem.jpg', 3),
    (4, '/upload/avaliacoes/1/4/avaliacao_imagem.jpg', 4),
    (5, '/upload/avaliacoes/1/5/avaliacao_imagem2.jpg', 4);


-- Insert metodo pagamento
INSERT INTO `metodo_pagamento` (`id_metodo_pagamento`, `tipo_pagamento`) VALUES ('1', 'Pix');

-- Insert na tabela compra
INSERT INTO compra (id_cliente, data_compra, id_endereço, id_tipo_frete)
VALUES (3, CURDATE(), 1, 1);  -- Supondo endereço ID 1 e frete ID 1

-- Obter o ID da compra recém-criada
SET @id_compra = LAST_INSERT_ID();

-- Insert na tabela item_compra
INSERT INTO item_compra (
    id_compra, 
    id_produto, 
    quantidade_compra, 
    preco_pago_compra, 
    id_metodo_pagamento, 
    data_limite_entrega_compra, 
    status_pagamento_compra, 
    status_entrega_compra
)
VALUES (
    @id_compra,
    1,  -- ID do produto
    1,  -- Quantidade
    (SELECT preco_produto FROM produto WHERE id_produto = 1),  -- Preço atual do produto
    1,  -- Método pagamento ID 1
    DATE_ADD(CURDATE(), INTERVAL 7 DAY),  -- Entrega em 7 dias
    TRUE,  -- Pagamento confirmado
    TRUE   -- Entrega confirmada
);