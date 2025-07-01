CREATE DATABASE IF NOT EXISTS e2_database;

USE e2_database;

CREATE TABLE
    IF NOT EXISTS cliente (
        id_cliente INT AUTO_INCREMENT PRIMARY KEY,
        nome_cliente VARCHAR(70) NOT NULL,
        senha_cliente VARCHAR(70) NOT NULL,
        data_registro_cliente DATE NOT NULL,
        email_cliente VARCHAR(70) NOT NULL UNIQUE,
        cpf_cliente VARCHAR(15),
        genero_cliente CHAR(1),
        cep_cliente VARCHAR(10),
        rg_cliente VARCHAR(14),
        numero_celular_cliente VARCHAR(10),
        ddd_cliente TINYINT,
        foto_perfil_cliente VARCHAR(200),
        banner_perfil_cliente VARCHAR(200),
        tipo_conta_cliente TINYINT NOT NULL,
        status_conta_cliente TINYINT
    );

CREATE TABLE
    IF NOT EXISTS redefinicao_senha (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_cliente INT NOT NULL,
        token VARCHAR(255) NOT NULL UNIQUE,
        expira_em DATETIME NOT NULL,
        usado BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
    );

CREATE TABLE
    IF NOT EXISTS endereco (
        id_endereco INT AUTO_INCREMENT PRIMARY KEY,
        rua_endereco VARCHAR(100) NOT NULL,
        bairro_endereco VARCHAR(100) NOT NULL,
        numero_endereco SMALLINT,
        referencia_endereco VARCHAR(200),
        uf_endereco VARCHAR(2) NOT NULL,
        cidade_endereco VARCHAR(50) NOT NULL,
        id_cliente INT NOT NULL UNIQUE,
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
    );

CREATE TABLE
    IF NOT EXISTS categoria (
        -- 6
        id_categoria INT AUTO_INCREMENT PRIMARY KEY,
        nome_categoria VARCHAR(30) NOT NULL,
        endereco_imagem_categoria VARCHAR(200),
        index_banner_categoria TINYINT DEFAULT 0
    );

CREATE TABLE
    IF NOT EXISTS subcategoria (
        -- 8
        id_subcategoria INT AUTO_INCREMENT PRIMARY KEY,
        nome_subcategoria VARCHAR(30) NOT NULL,
        categoria_subcategoria INT,
        -- a ser revisado
        FOREIGN KEY (categoria_subcategoria) REFERENCES categoria (id_categoria)
    );

CREATE TABLE
    IF NOT EXISTS vendedor (
        id_vendedor INT (11) NOT NULL AUTO_INCREMENT,
        id_cliente INT NOT NULL UNIQUE,
        nome_fantasia VARCHAR(255) NOT NULL,
        cnpj_vendedor VARCHAR(30) NOT NULL,
        requisitos_completos TINYINT (1) NOT NULL DEFAULT 0,
        documento_entregue TINYINT (1) NOT NULL DEFAULT 0,
        STATUS ENUM ('Pendente', 'Aprovado', 'Reprovado') NOT NULL DEFAULT 'Pendente',
        data_requisicao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id_vendedor),
        UNIQUE KEY cnpj_vendedor (cnpj_vendedor),
        KEY idx_vendedor_status (STATUS),
        KEY idx_vendedor_data (data_requisicao)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE
    IF NOT EXISTS produto (
        -- 2
        id_produto INT AUTO_INCREMENT PRIMARY KEY,
        id_vendedor INT NOT NULL,
        cod_produto INT NOT NULL UNIQUE,
        nome_produto VARCHAR(200) NOT NULL,
        preco_produto DECIMAL NOT NULL,
        marca_produto VARCHAR(200) NOT NULL,
        categoria_produto INT NOT NULL,
        subcategoria_produto INT NOT NULL,
        origem_produto VARCHAR(200),
        unidade_produto INT NOT NULL,
        peso_liquido_produto FLOAT NOT NULL,
        peso_bruto_produto FLOAT NOT NULL,
        largura_produto FLOAT NOT NULL,
        altura_produto FLOAT NOT NULL,
        comprimento_produto FLOAT NOT NULL,
        descricao_produto TEXT NOT NULL,
        status_produto BOOLEAN DEFAULT TRUE,
        FOREIGN KEY (id_vendedor) REFERENCES vendedor (id_vendedor),
        FOREIGN KEY (categoria_produto) REFERENCES categoria (id_categoria),
        FOREIGN KEY (subcategoria_produto) REFERENCES subcategoria (id_subcategoria)
    );

CREATE TABLE
    IF NOT EXISTS destaques (
        id_destaque INT AUTO_INCREMENT PRIMARY KEY,
        id_vendedor INT NOT NULL,
        id_produto INT NOT NULL,
        UNIQUE KEY (id_vendedor, id_produto),
        FOREIGN KEY (id_vendedor) REFERENCES vendedor (id_vendedor),
        FOREIGN KEY (id_produto) REFERENCES produto (id_produto)
    );

CREATE TABLE
    IF NOT EXISTS metodo_pagamento (
        -- 13
        id_metodo_pagamento INT AUTO_INCREMENT PRIMARY KEY,
        tipo_pagamento VARCHAR(50)
    );

CREATE TABLE
    IF NOT EXISTS compra (
        -- 5
        id_compra INT AUTO_INCREMENT PRIMARY KEY,
        id_cliente INT NOT NULL,
        id_vendedor INT NOT NULL,
        data_compra DATE NOT NULL,
        id_endereço INT NOT NULL,
        id_tipo_frete INT,
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente),
        FOREIGN KEY (id_vendedor) REFERENCES vendedor (id_vendedor),
        FOREIGN KEY (id_endereço) REFERENCES endereco (id_endereco)
    );

CREATE TABLE
    IF NOT EXISTS avaliacao (
        -- 7
        id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
        status_avaliacao BOOLEAN NOT NULL,
        estrelas_avaliacao FLOAT (5) DEFAULT 0,
        -- ver float dps
        data_avaliacao DATE NOT NULL,
        descricao_avaliacao VARCHAR(500) NOT NULL,
        qualidade VARCHAR(50),
        parecido BOOLEAN NOT NULL,
        id_produto INT,
        id_cliente INT,
        id_vendedor INT,
        FOREIGN KEY (id_produto) REFERENCES produto (id_produto),
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente),
        FOREIGN KEY (id_vendedor) REFERENCES vendedor (id_vendedor)
    );

CREATE TABLE
    IF NOT EXISTS carrossel (
        -- 9
        id_carrossel INT AUTO_INCREMENT PRIMARY KEY,
        id_vendedor INT NOT NULL,
        -- foreign key
        link_carrossel VARCHAR(200) NOT NULL,
        proxima_cobrança_carrossel DATE NOT NULL,
        foi_pago_esse_mes_carrossel BOOLEAN NOT NULL,
        FOREIGN KEY (id_vendedor) REFERENCES vendedor (id_vendedor)
    );

CREATE TABLE
    IF NOT EXISTS carrinho (
        -- 10
        id_cliente INT,
        id_produto INT,
        quantidade_produto SMALLINT NOT NULL,
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente) ON DELETE CASCADE,
        FOREIGN KEY (id_produto) REFERENCES produto (id_produto) ON DELETE CASCADE
    );

CREATE TABLE
    IF NOT EXISTS imagem_produto (
        -- 11
        id_imagem_produto INT AUTO_INCREMENT PRIMARY KEY,
        id_produto INT,
        endereco_imagem_produto VARCHAR(200) NOT NULL,
        index_imagem_produto INT NOT NULL,
        FOREIGN KEY (id_produto) REFERENCES produto (id_produto)
    );

CREATE TABLE
    IF NOT EXISTS imagem_carrossel (
        -- 12
        id_imagem_carrossel INT AUTO_INCREMENT PRIMARY KEY,
        id_carrossel INT,
        endereco_carrossel VARCHAR(200) NOT NULL,
        FOREIGN KEY (id_carrossel) REFERENCES carrossel (id_carrossel)
    );

CREATE TABLE
    IF NOT EXISTS perfil (
        -- 17
        id_perfil INT PRIMARY KEY AUTO_INCREMENT,
        id_cliente INT,
        foto_perfil VARCHAR(500) NOT NULL DEFAULT '/image/cliente/perfil_cliente/foto_user.png',
        banner_perfil VARCHAR(500) NOT NULL DEFAULT '/image/cliente/perfil_cliente/banner_user.png',
        descricao_perfil VARCHAR(500),
        tiktok_perfil VARCHAR(50),
        linkedin_perfil VARCHAR(50),
        facebook_perfil VARCHAR(50),
        youtube_perfil VARCHAR(50),
        instagram_perfil VARCHAR(50),
        x_perfil VARCHAR(50),
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
    );

CREATE TABLE
    IF NOT EXISTS historico_acesso (
        -- 16
        id_historico_acesso INT PRIMARY KEY AUTO_INCREMENT,
        id_cliente INT,
        ip_historico_acesso VARCHAR(50),
        data_historico_acesso DATE,
        horario_historico_acesso TIME,
        navegador_historico_acesso VARCHAR(200),
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
    );

CREATE TABLE
    IF NOT EXISTS tipo_promocoes (
        id_tipo_promocao INT PRIMARY KEY AUTO_INCREMENT,
        promocao VARCHAR(50)
    );

CREATE TABLE
    IF NOT EXISTS promocao (
        -- 20
        id_promocao INT PRIMARY KEY AUTO_INCREMENT,
        id_produto INT UNIQUE,
        ativo_promocao BOOLEAN DEFAULT FALSE,
        tipo_promocao INT,
        desconto_promocao FLOAT,
        data_inicio_promocao DATE,
        data_fim_promocao DATE,
        hora_inicio_promocao TIME,
        hora_fim_promocao TIME,
        FOREIGN KEY (id_produto) REFERENCES produto (id_produto),
        FOREIGN KEY (tipo_promocao) REFERENCES tipo_promocoes (id_tipo_promocao)
    );

CREATE TABLE
    IF NOT EXISTS anuncio (
        -- 21
        index_anuncio INT UNIQUE PRIMARY KEY,
        endereco_imagem_anuncio VARCHAR(200) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS item_compra (
        -- 22
        id_item_compra INT PRIMARY KEY AUTO_INCREMENT,
        id_compra INT,
        id_produto INT,
        quantidade_compra SMALLINT,
        preco_pago_compra DECIMAL NOT NULL,
        id_metodo_pagamento INT,
        data_limite_entrega_compra DATE NOT NULL,
        status_pagamento_compra BOOLEAN,
        status_entrega_compra BOOLEAN,
        FOREIGN KEY (id_compra) REFERENCES compra (id_compra),
        FOREIGN KEY (id_produto) REFERENCES produto (id_produto),
        FOREIGN KEY (id_metodo_pagamento) REFERENCES metodo_pagamento (id_metodo_pagamento)
    );

CREATE TABLE
    IF NOT EXISTS imagem_avaliacao (
        -- 23
        id_imagem_avaliacao INT PRIMARY KEY AUTO_INCREMENT,
        endereco_imagem_avaliacao VARCHAR(200) NOT NULL,
        id_avaliacao INT,
        FOREIGN KEY (id_avaliacao) REFERENCES avaliacao (id_avaliacao)
    );

CREATE TABLE
    IF NOT EXISTS tag (
        -- 26
        id_tag INT PRIMARY KEY AUTO_INCREMENT,
        nome_tag VARCHAR(200) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS tag_produto (
        -- 25
        id_tag_produto INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_produto INT,
        id_tag INT,
        FOREIGN KEY (id_produto) REFERENCES produto (id_produto),
        FOREIGN KEY (id_tag) REFERENCES tag (id_tag)
    );

CREATE TABLE
    IF NOT EXISTS tag_vinculo (
        -- 27
        id_tag_vinculo INT PRIMARY KEY AUTO_INCREMENT,
        id_tag INT,
        id_categoria INT,
        id_subcategoria INT,
        FOREIGN KEY (id_tag) REFERENCES tag (id_tag),
        FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria),
        FOREIGN KEY (id_subcategoria) REFERENCES subcategoria (id_subcategoria)
    );

CREATE TABLE
    IF NOT EXISTS permissao_admin (
        id_permissao INT AUTO_INCREMENT PRIMARY KEY,
        id_cliente INT NOT NULL,
        gerenciar_carrossel BOOLEAN DEFAULT FALSE,
        gerenciar_usuarios BOOLEAN DEFAULT FALSE,
        gerenciar_produtos BOOLEAN DEFAULT FALSE,
        acessar_historico_acesso BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente) ON DELETE CASCADE
    );

CREATE TABLE
    relatorio_vendedor (
        id INT AUTO_INCREMENT PRIMARY KEY,
        vendedor_id INT NOT NULL,
        produto_id INT NOT NULL,
        cliente_id INT NOT NULL,
        quantidade INT NOT NULL,
        STATUS ENUM ('Entregue', 'Pendente') NOT NULL,
        FOREIGN KEY (vendedor_id) REFERENCES vendedor (id_vendedor),
        FOREIGN KEY (produto_id) REFERENCES produto (id_produto),
        FOREIGN KEY (cliente_id) REFERENCES cliente (id_cliente)
    );