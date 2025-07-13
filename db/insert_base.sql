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
    '12345678910',
    '',
    '79033337',
    '178272851',
    '999999999',
    '5567',
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
    '12345678911',
    '',
    '79033337',
    '178272851',
    '999998888',
    '67',
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
    numero_celular_cliente,
    ddd_cliente,
    status_conta_cliente
) VALUES (
    3,
    'Cliente',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente@email.com',
    2,
    '40028922',
    '11',
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
    numero_celular_cliente,
    ddd_cliente,
    status_conta_cliente
) VALUES (
    4,
    'Cliente4',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente4@email.com',
    2,
    '911111111',
    '11',
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
    numero_celular_cliente,
    ddd_cliente,
    status_conta_cliente
) VALUES (
    5,
    'Cliente5',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente5@email.com',
    2,
    '922222222',
    '11',
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
    numero_celular_cliente,
    ddd_cliente,
    status_conta_cliente
) VALUES (
    6,
    'Cliente6',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-06-16',
    'cliente6@email.com',
    2,
    '933333333',
    '11',
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

-- Insert cliente id:7 (Vendedor 2)

INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    numero_celular_cliente,
    ddd_cliente,
    status_conta_cliente
) VALUES (
    7,
    'Vendedor2',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-07-01',
    'vendedor2@email.com',
    1,
    '900000000',
    '12',
    1
);

-- Insert Perfil vendedor 2

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    6,
    7,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Inserir categoria
INSERT INTO categoria (nome_categoria, endereco_imagem_categoria) VALUES ('Geral', '/image/index/categoriasGeral.png');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) 
VALUES ('Geral', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Geral'));

-- Categoria: Periféricos
INSERT INTO categoria (nome_categoria, endereco_imagem_categoria)
VALUES ('Periféricos', '/image/index/categoriasPerifericos.png');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria)
VALUES 
  ('Mouses',     (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Periféricos')),
  ('Teclados',   (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Periféricos')),
  ('Headsets',   (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Periféricos'));

-- Categoria: Componentes
INSERT INTO categoria (nome_categoria, endereco_imagem_categoria)
VALUES ('Componentes', '/image/index/categoriasHardware.png');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria)
VALUES
  ('Placas de Vídeo',     (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Componentes')),
  ('Placas-Mãe',           (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Componentes')),
  ('Memórias RAM',         (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Componentes')),
  ('Fontes de Alimentação',(SELECT id_categoria FROM categoria WHERE nome_categoria = 'Componentes'));

-- Categoria: Acessórios
INSERT INTO categoria (nome_categoria, endereco_imagem_categoria)
VALUES ('Acessórios', '/image/index/categoriasAcessorios.png');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria)
VALUES
  ('Mousepads',            (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Acessórios')),
  ('Cabos e Adaptadores',  (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Acessórios')),
  ('Suportes e Montagens', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Acessórios'));

-- Categoria: Computadores
INSERT INTO categoria (nome_categoria, endereco_imagem_categoria)
VALUES ('Computadores', '/image/index/categoriasComputadores.png');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria)
VALUES
  ('Desktops',             (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Computadores')),
  ('Notebooks',            (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Computadores')),
  ('All-in-One',           (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Computadores'));

-- Categoria: Monitores
INSERT INTO categoria (nome_categoria, endereco_imagem_categoria)
VALUES ('Monitores', '/image/index/categoriasMonitores.png');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria)
VALUES
  ('LED',                  (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Monitores')),
  ('IPS',                  (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Monitores')),
  ('Curvos',               (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Monitores'));


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

-- Inserir endereço para o cliente 7 (Vendedor 2)
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
    2,
    '',
    '',
    '',
    '',
    'SP',
    'Presidente Prudente',
    7
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
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    1000,
    'Mouse Redragon Cobra M711',
    100,
    'Redragon',
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
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    1001,
    'Snoopy',
    1,
    'Cachorro',
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
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    1003,
    'SAMSUNG Galaxy Buds 2',
    250,
    'Samsung',
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
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    1004,
    'Deo Parfum Essencial Natura Masculino 100 ml',
    139,
    'Natura',
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
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    1005,
    'PlayStation 5 Pro PlayStation 5 Pro Sony 2024',
    6999,
    'Sony',
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

-- Insert vendedor 2 

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
    2,
    7,
    'Vendedor - 2',
    '12345678911',
    1,
    1,
    'Pendente',
    '2025-07-01 10:51:43'
);

-- Inserir produto 1 (id:6) do vendedor 2

INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    6,
    2,
    1000,
    'Monitor Gamer HERO 23,8'' 144Hz IPS FreeSync 24G2/BK Cor Preto/Vermelho AOC',
    899,
    'AOC',
    6,
    16,
    'São Paulo',
    50,
    7000,
    10000,
    22,
    52,
    52,
    '<p><strong>AOC HERO 27</strong></p><h4>Gameplay liso.</h4><p>Com o monitor HERO 27 seus movimentos serão ainda mais insanos. Com tela de 27", desempenho ultrarrápido e ótimos recursos para todos os tipos de jogos sua experiência será impecável. Conte também com o G-MENU, um software exclusivo da AOC para configurar seu dispositivo em uma única plataforma.</p><p><br class="ProseMirror-trailingBreak"></p><h3><strong>G-SYNC</strong></h3><p>É oficial: após ser testado pela NVIDIA, o monitor HERO 27 é compatível com a tecnologia G-Sync e entrega aos gamers uma experiência lisa, rápida e responsiva em todos os jogos.</p><p><br class="ProseMirror-trailingBreak"></p><h3><strong>TAXA DE ATUALIZAÇÃO DE 144HZ</strong></h3><p>Experimente uma jogabilidade impecável com a taxa de atualização de 144Hz, sem rastros e efeitos fantasmas.</p><p><br class="ProseMirror-trailingBreak"></p><h3><strong><br>1MS DE TEMPO DE RESPOSTA</strong></h3><p>Tenha em sua casa um monitor gamer com tempo de resposta de 1ms e aproveite um desempenho excepcional.</p><p><br class="ProseMirror-trailingBreak"></p><h3><strong><br>BASE ERGONÔMICA</strong></h3><p>Projetado e pensado para os gamers, a base ergonômica garante um controle preciso para o ajuste e adaptação conveniente da altura e ângulo do seu monitor, permitindo que você jogue por ainda mais tempo, sem nenhum desconforto.</p><p><br class="ProseMirror-trailingBreak"></p><h3><strong>DESIGN GAMER COM BORDAS ULTRAFINAS</strong></h3><p>Tenha uma experiência completamente imersiva graças às bordas ultrafinas, que possibilitam uma visão ininterrupta dos seus jogos.</p>',
    1
);

-- Imagens do produto 6
INSERT INTO imagem_produto (
    id_imagem_produto,
    id_produto,
    endereco_imagem_produto,
    index_imagem_produto
) VALUES
    (15, 6, '/upload/produtos/6/imagem_1_1751386027.webp', 1),
    (16, 6, '/upload/produtos/6/imagem_2_1751386027.webp', 2),
    (17, 6, '/upload/produtos/6/imagem_3_1751386027.webp', 3),
    (18, 6, '/upload/produtos/6/imagem_4_1751386027.webp', 4);

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
    (2, TRUE, 3.0, '2025-06-15',
     'Produto funcional, mas o acabamento poderia ser melhor e alguns detalhes de montagem vieram soltos.',
     'Regular', FALSE, 1, 4, 1),
    (3, TRUE, 2.0, '2025-06-14',
     'Não gostei da durabilidade; após poucos usos já apresentou sinal de desgaste.',
     'Ruim', FALSE, 1, 5, 1),
    (4, TRUE, 1, '2025-06-18',
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
    (2, '/upload/avaliacoes/1/2/avaliacao_imagem.jpg', 2),
    (3, '/upload/avaliacoes/1/4/avaliacao_imagem.jpg', 4),
    (4, '/upload/avaliacoes/1/4/avaliacao_imagem2.jpg', 4);


-- Insert metodo pagamento
INSERT INTO `metodo_pagamento` (`id_metodo_pagamento`, `tipo_pagamento`) VALUES ('1', 'Pix');

-- Insert na tabela compra
INSERT INTO compra (id_cliente, id_vendedor, data_compra, id_endereco, id_tipo_frete)
VALUES (3, 1, CURDATE(), 1, 1);  -- Supondo endereço ID 1 e frete ID 1

INSERT INTO compra (id_cliente, id_vendedor, data_compra, id_endereco, id_tipo_frete)
VALUES (3, 1, CURDATE(), 1, 1);

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
    1,
    1,  -- ID do produto
    1,  -- Quantidade
    (SELECT preco_produto FROM produto WHERE id_produto = 1),  -- Preço atual do produto
    1,  -- Método pagamento ID 1
    DATE_ADD(CURDATE(), INTERVAL 7 DAY),  -- Entrega em 7 dias
    TRUE,  -- Pagamento confirmado
    TRUE   -- Entrega confirmada
);


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
    2,
    3,  -- ID do produto
    1,  -- Quantidade
    (SELECT preco_produto FROM produto WHERE id_produto = 1),  -- Preço atual do produto
    1,  -- Método pagamento ID 1
    DATE_ADD(CURDATE(), INTERVAL 7 DAY),  -- Entrega em 7 dias
    TRUE,  -- Pagamento confirmado
    TRUE   -- Entrega confirmada
);

-- Promoção

INSERT INTO tipo_promocoes (promocao)
VALUES 
  ('Reais sobre Total'),
  ('Porcentagem sobre Total');


-- Promoção produto 1 e 3
INSERT INTO promocao (
  id_produto,
  ativo_promocao,
  tipo_promocao,
  desconto_promocao,
  data_inicio_promocao,
  data_fim_promocao,
  hora_inicio_promocao,
  hora_fim_promocao
) VALUES
  (1, TRUE, 1, 10,
   '2025-06-20', '2026-07-10',
   '00:00:00', '23:59:59'),
  (3, TRUE, 2, 20,
   '2025-06-25', '2026-07-05',
   '00:00:00', '23:59:59');

-- Cliente 8
INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    8,
    'Cliente8',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-07-05',
    'cliente8@email.com',
    2,
    1
);

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    7,
    8,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Cliente 9
INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    9,
    'Cliente9',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-07-06',
    'cliente9@email.com',
    2,
    1
);

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    8,
    9,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Cliente 10
INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    10,
    'Cliente10',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-07-07',
    'cliente10@email.com',
    2,
    1
);

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    9,
    10,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Cliente 11
INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    11,
    'Cliente11',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-07-08',
    'cliente11@email.com',
    2,
    1
);

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    10,
    11,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Cliente 12
INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    12,
    'Cliente12',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-07-09',
    'cliente12@email.com',
    2,
    1
);

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    11,
    12,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Cliente 13
INSERT INTO cliente (
    id_cliente,
    nome_cliente,
    senha_cliente,
    data_registro_cliente,
    email_cliente,
    tipo_conta_cliente,
    status_conta_cliente
) VALUES (
    13,
    'Cliente13',
    '$2y$10$30Srnx7UEWCHlsf4uI6m8OGSSUPeg8wZjre3o97oYRLl9VpEpeS12',
    '2025-07-10',
    'cliente13@email.com',
    2,
    1
);

INSERT INTO perfil (
    id_perfil,
    id_cliente,
    foto_perfil,
    banner_perfil
) VALUES (
    12,
    13,
    '/image/cliente/perfil_cliente/foto_user.png',
    '/image/cliente/perfil_cliente/banner_user.png'
);

-- Avaliações para o produto 1 (Mouse Redragon) pelos novos clientes
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
    (5, TRUE, 5.0, '2025-07-01',
     'Melhor mouse que já usei! Precisão incrível para jogos.',
     'Excelente', TRUE, 1, 8, 1),
     
    (6, TRUE, 4.5, '2025-07-02',
     'Bom custo-benefício, só acho um pouco pesado para meu gosto.',
     'Muito Boa', TRUE, 1, 9, 1),
     
    (7, TRUE, 3.5, '2025-07-03',
     'Atende às expectativas, mas o software de configuração poderia ser melhor.',
     'Boa', TRUE, 1, 10, 1),
     
    (8, TRUE, 2.0, '2025-07-04',
     'Botões começaram a falhar após 1 mês de uso. Não recomendo.',
     'Ruim', FALSE, 1, 11, 1),
     
    (9, TRUE, 4.0, '2025-07-05',
     'Iluminação RGB linda e ergonomia confortável para longas sessões.',
     'Muito Boa', TRUE, 1, 12, 1),
     
    (10, TRUE, 5.0, '2025-07-06',
     'Superou expectativas! Sensor preciso e construção durável.',
     'Excelente', TRUE, 1, 13, 1);

-- Imagens para algumas avaliações
INSERT INTO imagem_avaliacao (
    id_imagem_avaliacao,
    endereco_imagem_avaliacao,
    id_avaliacao
) VALUES
    (5, '/upload/avaliacoes/1/5/avaliacao_imagem1.jpg', 5),
    (6, '/upload/avaliacoes/1/5/avaliacao_imagem2.jpg', 5),
    (7, '/upload/avaliacoes/1/7/avaliacao_imagem.jpg', 7),
    (8, '/upload/avaliacoes/1/8/avaliacao_imagem.jpg', 8),
    (9, '/upload/avaliacoes/1/9/avaliacao_imagem.jpg', 9),
    (10, '/upload/avaliacoes/1/10/avaliacao_imagem.jpg', 10);

-- Avaliação do produto 2
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
) VALUES (
    11,  -- Próximo ID disponível
    TRUE,
    5.0,  -- Nota máxima
    '2025-07-12',  -- Data atual
    'Produto excelente! Snoopy chegou rápido e em perfeito estado. Superou todas as expectativas!',
    'Excelente',
    TRUE,
    2,   -- ID do produto Snoopy
    4,   -- ID do cliente 4 (diferente do 3)
    1    -- ID do vendedor (Vendedor1)
);

-- Compra do produto 2 pelo cliente 3 (sem avaliação)
-- Primeiro cria a compra
INSERT INTO compra (id_cliente, id_vendedor, data_compra, id_endereco, id_tipo_frete)
VALUES (3, 1, CURDATE(), 1, 1);  -- ID da compra será gerado automaticamente

-- Insere o item da compra (sem avaliação)
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
    LAST_INSERT_ID(),  -- ID da compra recém-criada
    2,  -- ID do produto Snoopy
    1,  -- Quantidade
    (SELECT preco_produto FROM produto WHERE id_produto = 2),  -- Preço atual
    1,  -- Método pagamento Pix
    DATE_ADD(CURDATE(), INTERVAL 7 DAY),  -- Entrega em 7 dias
    TRUE,  -- Pagamento confirmado
    TRUE   -- Entrega confirmada
);

-- Inserir novas categorias
INSERT INTO categoria (nome_categoria, endereco_imagem_categoria) VALUES
('Eletrônicos', '/image/index/categoriasEletronicos.png'),
('Livros', '/image/index/categoriasLivros.png'),
('Moda', '/image/index/categoriasModa.png'),
('Casa e Jardim', '/image/index/categoriasCasa.png'),
('Esportes', '/image/index/categoriasEsportes.png');

-- Inserir subcategorias para Eletrônicos
INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) VALUES
('Smartphones', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Eletrônicos')),
('Tablets', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Eletrônicos')),
('Smartwatches', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Eletrônicos'));

-- Inserir subcategorias para Livros
INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) VALUES
('Ficção', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Livros')),
('Não Ficção', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Livros')),
('Educacional', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Livros'));

-- Inserir subcategorias para Moda
INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) VALUES
('Roupas Masculinas', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Moda')),
('Roupas Femininas', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Moda')),
('Acessórios', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Moda'));

-- Inserir subcategorias para Casa e Jardim
INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) VALUES
('Móveis', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Casa e Jardim')),
('Decoração', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Casa e Jardim')),
('Jardim', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Casa e Jardim'));

-- Inserir subcategorias para Esportes
INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) VALUES
('Fitness', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Esportes')),
('Corrida', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Esportes')),
('Ciclismo', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Esportes'));

-- Inserir subcategoria para Eletrônicos
-- Exemplo: Smart TVs
INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) 
VALUES (
    'Smart TVs',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Eletrônicos')
);

-- Inserir novos produtos
-- Produto 7: Smartphone
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    7,
    1,
    2001,
    'Smartphone Samsung Galaxy S24',
    3999,
    'Samsung',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Eletrônicos'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Smartphones'),
    'São Paulo',
    15,
    168,
    200,
    7,
    15,
    1,
    '<p>Smartphone premium com câmera de 108MP e tela Dynamic AMOLED 2X</p>',
    1
);

INSERT INTO imagem_produto VALUES
(NULL, 7, '/upload/produtos/7/imagem_1_1750113375.webp', 1),
(NULL, 7, '/upload/produtos/7/imagem_2_1750113375.webp', 2);

-- Produto 8: Livro
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    8,
    1,
    2002,
    'Box O Senhor dos Anéis',
    199,
    'HarperCollins',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Livros'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Ficção'),
    'São Paulo',
    30,
    500,
    600,
    15,
    23,
    10,
    '<p>Edição especial da trilogia completa de O Senhor dos Anéis</p>',
    1
);

INSERT INTO imagem_produto VALUES
(NULL, 8, '/upload/produtos/8/imagem_1_1750113375.webp', 1);

-- Produto 9: Camiseta
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    9,
    1,
    2003,
    'Camiseta Nike Dry Fit',
    129,
    'Nike',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Moda'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Roupas Masculinas'),
    'São Paulo',
    50,
    150,
    200,
    20,
    30,
    1,
    '<p>Camiseta esportiva com tecnologia de absorção de suor</p>',
    1
);

INSERT INTO imagem_produto VALUES
(NULL, 9, '/upload/produtos/9/imagem_1_1750113375.webp', 1),
(NULL, 9, '/upload/produtos/9/imagem_2_1750113375.webp', 2);

-- Produto 10: Sofá
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    10,
    1,
    2004,
    'Sofá 3 Lugares Retrátil',
    2499,
    'Tok&Stok',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Casa e Jardim'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Móveis'),
    'São Paulo',
    5,
    35000,
    40000,
    90,
    85,
    210,
    '<p>Sofá premium com assentos retráteis e reclináveis</p>',
    1
);

INSERT INTO imagem_produto VALUES
(NULL, 10, '/upload/produtos/10/imagem_1_1750113375.webp', 1),
(NULL, 10, '/upload/produtos/10/imagem_2_1750113375.webp', 2);

-- Produto 11: Bicicleta
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    11,
    1,
    2005,
    'Bicicleta Mountain Bike',
    1599,
    'Caloi',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Esportes'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Ciclismo'),
    'São Paulo',
    8,
    15000,
    18000,
    60,
    100,
    170,
    '<p>Bicicleta aro 29 com 21 velocidades e suspensão dianteira</p>',
    1
);

INSERT INTO imagem_produto VALUES
(NULL, 11, '/upload/produtos/11/imagem_1_1750113375.webp', 1),
(NULL, 11, '/upload/produtos/11/imagem_2_1750113375.webp', 2),
(NULL, 11, '/upload/produtos/11/imagem_3_1750113375.webp', 3);

-- Promoções para os novos produtos
INSERT INTO promocao (
  id_produto,
  ativo_promocao,
  tipo_promocao,
  desconto_promocao,
  data_inicio_promocao,
  data_fim_promocao,
  hora_inicio_promocao,
  hora_fim_promocao
) VALUES
  (7, TRUE, 2, 15, '2025-07-10', '2026-01-15', '00:00:00', '23:59:59'),  -- Smartphone
  (10, TRUE, 1, 300, '2025-07-10', '2026-02-28', '00:00:00', '23:59:59'), -- Sofá
  (11, TRUE, 2, 20, '2025-07-01', '2025-12-31', '00:00:00', '23:59:59');  -- Bicicleta

  -- Novo produto: Smart TV
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    12,
    1,
    2006,
    'Smart TV LG 55" 4K UHD',
    2899,
    'LG',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Eletrônicos'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Smart TVs'),
    'São Paulo',
    20,
    12000,
    15000,
    123,
    72,
    8,
    '<p>Smart TV LG 55" 4K UHD com processador α7 Gen5, AI Sound Pro e webOS 23</p>',
    1
);

-- Imagens do produto
INSERT INTO imagem_produto VALUES
(NULL, 12, '/upload/produtos/12/imagem_1_1750113375.webp', 1),
(NULL, 12, '/upload/produtos/12/imagem_2_1750113375.webp', 2),
(NULL, 12, '/upload/produtos/12/imagem_3_1750113375.webp', 3);

-- Promoção para o produto (começa hoje e termina em dezembro)
INSERT INTO promocao (
  id_produto,
  ativo_promocao,
  tipo_promocao,
  desconto_promocao,
  data_inicio_promocao,
  data_fim_promocao,
  hora_inicio_promocao,
  hora_fim_promocao
) VALUES (
  12, 
  TRUE, 
  1,  -- Reais sobre Total
  400, -- Desconto de R$ 400
  '2025-07-12', -- Começa hoje
  '2025-12-31', -- Termina em dezembro
  '00:00:00', 
  '23:59:59'
);

-- Produto 13: Teclado Mecânico Gamer (Vendedor 2)
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    13,
    2,
    3001,
    'Teclado Mecânico Gamer Redragon Kumara',
    299,
    'Redragon',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Periféricos'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Teclados'),
    'São Paulo',
    25,
    800,
    1000,
    45,
    5,
    15,
    '<p>Teclado mecânico com switches Outemu Blue, retroiluminação RGB e construção em ABS</p>',
    1
);

-- Imagens do produto 13
INSERT INTO imagem_produto VALUES
(NULL, 13, '/upload/produtos/13/imagem_1_1750113375.webp', 1),
(NULL, 13, '/upload/produtos/13/imagem_2_1750113375.webp', 2),
(NULL, 13, '/upload/produtos/13/imagem_3_1750113375.webp', 3);

-- Produto 14: Headset Gamer (Vendedor 2) - EM PROMOÇÃO
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    14,
    2,
    3002,
    'Headset Gamer HyperX Cloud Stinger',
    349,
    'HyperX',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Periféricos'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Headsets'),
    'São Paulo',
    20,
    500,
    700,
    20,
    20,
    20,
    '<p>Headset com som surround virtual, microfone com cancelamento de ruído e conforto premium</p>',
    1
);

-- Imagens do produto 14
INSERT INTO imagem_produto VALUES
(NULL, 14, '/upload/produtos/14/imagem_1_1750113375.webp', 1),
(NULL, 14, '/upload/produtos/14/imagem_2_1750113375.webp', 2);

-- Promoção para o produto 14 (Headset)
INSERT INTO promocao (
  id_produto,
  ativo_promocao,
  tipo_promocao,
  desconto_promocao,
  data_inicio_promocao,
  data_fim_promocao,
  hora_inicio_promocao,
  hora_fim_promocao
) VALUES (
  14, 
  TRUE, 
  1,  -- Reais sobre Total
  50, -- Desconto de R$ 50
  '2025-07-12', -- Começa hoje
  '2025-12-31', -- Termina em dezembro
  '00:00:00', 
  '23:59:59'
);

-- Produto 15: Mousepad Grande (Vendedor 2) - COM 2 AVALIAÇÕES
INSERT INTO produto (
    id_produto,
    id_vendedor,
    cod_produto,
    nome_produto,
    preco_produto,
    marca_produto,
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
    15,
    2,
    3003,
    'Mousepad Speed Grande 90x40cm',
    89,
    'Havit',
    (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Acessórios'),
    (SELECT id_subcategoria FROM subcategoria WHERE nome_subcategoria = 'Mousepads'),
    'São Paulo',
    30,
    300,
    400,
    40,
    1,
    90,
    '<p>Mousepad de tecido speed com base antiderrapante para performance em jogos</p>',
    1
);

-- Imagens do produto 15
INSERT INTO imagem_produto VALUES
(NULL, 15, '/upload/produtos/15/imagem_1_1750113375.webp', 1),
(NULL, 15, '/upload/produtos/15/imagem_2_1750113375.webp', 2);

-- Avaliações para o produto 15 (Mousepad)
-- Primeira avaliação
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
) VALUES (
    12,  -- Próximo ID
    TRUE,
    4.5,
    '2025-07-10',
    'Ótimo mousepad, superou minhas expectativas!',
    'Muito Boa',
    TRUE,
    15,
    3,  -- Cliente 3
    2   -- Vendedor 2
);

-- Segunda avaliação
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
) VALUES (
    13,  -- Próximo ID
    TRUE,
    5.0,
    '2025-07-11',
    'Perfeito para meu setup! Entrega rápida e produto de qualidade.',
    'Excelente',
    TRUE,
    15,
    4,  -- Cliente 4
    2   -- Vendedor 2
);

-- Imagens para as avaliações do produto 15
INSERT INTO imagem_avaliacao VALUES
(NULL, '/upload/avaliacoes/15/12/avaliacao_imagem.jpg', 12),
(NULL, '/upload/avaliacoes/15/13/avaliacao_imagem1.jpg', 13),
(NULL, '/upload/avaliacoes/15/13/avaliacao_imagem2.jpg', 13);