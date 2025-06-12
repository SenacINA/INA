INSERT INTO categoria (nome_categoria) VALUES ('Geral');

INSERT INTO subcategoria (nome_subcategoria, categoria_subcategoria) 
VALUES ('Geral', (SELECT id_categoria FROM categoria WHERE nome_categoria = 'Geral'));
