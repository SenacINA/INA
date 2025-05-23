create database if not exists e2_database;
use e2_database;

create table if not exists cliente(
id_cliente int auto_increment primary key,
nome_cliente varchar(70) not null,
senha_cliente varchar(70) not null,
data_registro_cliente date not null,
email_cliente varchar(70) not null unique,
cpf_cliente varchar(15) , 
genero_cliente char(1),
cep_cliente varchar(10),
rg_cliente varchar(14),
numero_celular_cliente varchar(10),
ddd_cliente tinyint,
foto_perfil_cliente varchar(200),
banner_perfil_cliente varchar(200),
tipo_conta_cliente tinyint not null,
status_conta_cliente tinyint
);

CREATE table if not exists  redefinicao_senha (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_cliente INT NOT NULL,
  token VARCHAR(255) NOT NULL UNIQUE,
  expira_em DATETIME NOT NULL,
  usado BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);



CREATE TABLE IF NOT EXISTS endereco (
    id_endereco INT AUTO_INCREMENT PRIMARY KEY,
    rua_endereco VARCHAR(100) NOT NULL,
    bairro_endereco VARCHAR(100) NOT NULL,
    numero_endereco SMALLINT,
    referencia_endereco VARCHAR(200),
    uf_endereco VARCHAR(2) NOT NULL,     
    cidade_endereco VARCHAR(50) NOT NULL,  
    id_cliente INT NOT NULL UNIQUE,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);


create table if not exists categoria( -- 6
id_categoria int auto_increment primary key,
nome_categoria varchar(30) not null,
endereco_imagem_categoria varchar(200),
index_banner_categoria tinyint default 0
);

create table if not exists subcategoria( -- 8
id_subcategoria int auto_increment primary key,
nome_subcategoria varchar(30) not null,
categoria_subcategoria int, -- a ser revisado
foreign key (categoria_subcategoria) references categoria(id_categoria)
);

CREATE TABLE IF NOT EXISTS vendedor (
    id_vendedor      INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente       INT NOT NULL UNIQUE,  
    nome_fantasia    VARCHAR(255) NOT NULL,
    cnpj_vendedor    VARCHAR(30) UNIQUE NOT NULL,
    status           ENUM('Pendente', 'Aprovado', 'Reprovado') DEFAULT 'Pendente',
    data_requisicao  DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente) ON DELETE CASCADE
);
 

create table if not exists produto( -- 2
id_produto int auto_increment primary key,
id_vendedor int not null,
nome_produto varchar(200) not null,
preco_produto decimal not null,
categoria_produto int not null,
subcategoria_produto int not null,
origem_produto varchar(200),
unidade_produto int not null,
peso_liquido_produto float not null,
peso_bruto_produto float not null,
largura_produto float not null,
altura_produto float not null,
comprimento_produto float not null,
descricao_produto text not null,
status_produto boolean default true,
foreign key (id_vendedor) references vendedor(id_vendedor),
foreign key (categoria_produto) references categoria(id_categoria),
foreign key (subcategoria_produto) references subcategoria(id_subcategoria)
);


create table if not exists metodo_pagamento( -- 13
id_metodo_pagamento int auto_increment primary key,
tipo_pagamento varchar(50)
);

create table if not exists compra( -- 5
id_compra int auto_increment primary key,
id_cliente int not null,
data_compra date not null,
id_endereço int not null,
id_tipo_frete int,
foreign key (id_cliente) references cliente (id_cliente),
foreign key (id_endereço) references endereco(id_endereco)
);

create table if not exists avaliacao( -- 7
id_avaliacao int auto_increment primary key,
status_avaliacao boolean not null,
estrelas_avaliacao float(5) default 0, -- ver float dps
data_avaliacao date not null,
descricao_avaliacao varchar(500) not null,
id_produto int,
id_cliente int,
id_vendedor int,
foreign key (id_produto) references produto(id_produto),
foreign key (id_cliente) references cliente(id_cliente),
foreign key (id_vendedor) references vendedor(id_vendedor)
);

create table if not exists carrossel( -- 9
id_carrossel int auto_increment primary key,
id_vendedor int not null, -- foreign key
link_carrossel varchar(200) not null,
proxima_cobrança_carrossel date not null,
foi_pago_esse_mes_carrossel boolean not null,
foreign key (id_vendedor) references vendedor(id_vendedor)
);

create table if not exists carrinho( -- 10
id_cliente int,
id_produto int,
quantidade_produto smallint not null,
foreign key (id_cliente) references cliente(id_cliente),
foreign key (id_produto) references produto(id_produto)
);

create table if not exists imagem_produto( -- 11
id_imagem_produto int auto_increment primary key,
id_produto int,
endereco_imagem_produto varchar(200) not null,
index_imagem_produto int not null,
foreign key (id_produto) references produto(id_produto)
);

create table if not exists imagem_carrossel( -- 12
id_imagem_carrossel int auto_increment primary key,
id_carrossel int,
endereco_carrossel varchar(200) not null,
foreign key (id_carrossel) references carrossel(id_carrossel)
);

create table if not exists perfil( -- 17
id_perfil int PRIMARY KEY AUTO_INCREMENT,
id_cliente int,
foto_perfil VARCHAR(500)not null default 'default_profile_picture.jpg',
banner_perfil VARCHAR(500) not null default 'default_banner_picture.jpg',
descricao_perfil varchar(500),
tiktok_perfil varchar(50),
linkedin_perfil varchar(50),
facebook_perfil varchar(50),
youtube_perfil varchar(50),
instagram_perfil varchar(50),
x_perfil varchar(50),
foreign key (id_cliente) references cliente(id_cliente)
);

create table if not exists historico_acesso( -- 16
id_historico_acesso int primary key auto_increment,
id_cliente int,
ip_historico_acesso varchar(50),
data_historico_acesso date,
horario_historico_acesso time,
navegador_historico_acesso varchar(200),
foreign key (id_cliente) references cliente(id_cliente)
);

create table if not exists promocao( -- 20
id_promocao int primary key auto_increment,
id_produto int unique,
ativo_promocao boolean default false,
tipo_promocao int,
desconto_promocao float,
data_inicio_promocao date,
data_fim_promocao date,
hora_inicio_promocao time,
hora_fim_promocao time,
foreign key (id_produto) references produto(id_produto) 
);

create table if not exists anuncio( -- 21
index_anuncio int unique primary key, 
endereco_imagem_anuncio varchar(200) not null  
);

create table if not exists item_compra( -- 22
id_item_compra int primary key auto_increment,
id_compra int,
id_produto int,
quantidade_compra smallint,
preco_pago_compra decimal not null,
id_metodo_pagamento int,
data_limite_entrega_compra date not null,
status_pagamento_compra boolean,
status_entrega_compra boolean,
foreign key (id_compra) references compra(id_compra),
foreign key (id_produto) references produto(id_produto),
foreign key (id_metodo_pagamento) references metodo_pagamento(id_metodo_pagamento)
);

create table if not exists imagem_avaliacao( -- 23
id_imagem_avaliacao int primary key auto_increment,
endereco_imagem_avaliacao varchar(200) not null,
id_avaliacao int,
foreign key (id_avaliacao) references avaliacao(id_avaliacao)
);

create table if not exists tag( -- 26
id_tag int primary key auto_increment,
nome_tag varchar(200) not null
);

create table if not exists tag_produto ( -- 25
id_tag_produto integer primary key auto_increment, 
id_produto int,  
id_tag int,
foreign key (id_produto) references produto(id_produto),  
foreign key (id_tag) references tag(id_tag)  
);

create table if not exists tag_vinculo( -- 27
id_tag_vinculo int primary key auto_increment,
id_tag int,
id_categoria int,
id_subcategoria int,
foreign key (id_tag) references tag(id_tag),
foreign key (id_categoria) references categoria(id_categoria),
foreign key (id_subcategoria) references subcategoria(id_subcategoria)
);