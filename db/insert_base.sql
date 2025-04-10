-- Active: 1725968277993@@10.28.1.231@3306@e2_database
INSERT INTO estado (nome_estado, sigla_estado) 
VALUES 
('Acre', 'AC'),
('Alagoas', 'AL'),
('Amapá', 'AP'),
('Amazonas', 'AM'),
('Bahia', 'BA'),
('Ceará', 'CE'),
('Distrito Federal', 'DF'),
('Espírito Santo', 'ES'),
('Goiás', 'GO'),
('Maranhão', 'MA'),
('Mato Grosso', 'MT'),
('Mato Grosso do Sul', 'MS'),
('Minas Gerais', 'MG'),
('Pará', 'PA'),
('Paraíba', 'PB'),
('Paraná', 'PR'),
('Pernambuco', 'PE'),
('Piauí', 'PI'),
('Rio de Janeiro', 'RJ'),
('Rio Grande do Norte', 'RN'),
('Rio Grande do Sul', 'RS'),
('Rondônia', 'RO'),
('Roraima', 'RR'),
('Santa Catarina', 'SC'),
('São Paulo', 'SP'),
('Sergipe', 'SE'),
('Tocantins', 'TO');

INSERT INTO cidade (nome_cidade, id_estado) 
VALUES
('Rio Branco', 1), -- Acre (id_estado = 1)
('Cruzeiro do Sul', 1),  -- Cidade adicional

('Maceió', 2),  -- Alagoas (id_estado = 2)
('Arapiraca', 2),

('Macapá', 3), -- Amapá (id_estado = 3)
('Santana', 3),

('Manaus', 4), -- Amazonas (id_estado = 4)
('Parintins', 4),

('Salvador', 5), -- Bahia (id_estado = 5)
('Feira de Santana', 5),

('Fortaleza', 6), -- Ceará (id_estado = 6)
('Juazeiro do Norte', 6),

('Brasília', 7), -- Distrito Federal (id_estado = 7)
('Ceilândia', 7),

('Vitória', 8), -- Espírito Santo (id_estado = 8)
('Cariacica', 8),

('Goiânia', 9), -- Goiás (id_estado = 9)
('Anápolis', 9),

('São Luís', 10), -- Maranhão (id_estado = 10)
('Imperatriz', 10),

('Cuiabá', 11), -- Mato Grosso (id_estado = 11)
('Rondonópolis', 11),

('Campo Grande', 12), -- Mato Grosso do Sul (id_estado = 12)
('Dourados', 12),

('Belo Horizonte', 13), -- Minas Gerais (id_estado = 13)
('Uberlândia', 13),

('Belém', 14), -- Pará (id_estado = 14)
('Santarém', 14),

('João Pessoa', 15), -- Paraíba (id_estado = 15)
('Campina Grande', 15),

('Curitiba', 16), -- Paraná (id_estado = 16)
('Londrina', 16),

('Recife', 17), -- Pernambuco (id_estado = 17)
('Caruaru', 17),

-- Piauí (id_estado = 18)
('Teresina', 18),
('Parnaíba', 18),

-- Rio de Janeiro (id_estado = 19)
('Rio de Janeiro', 19),
('Niterói', 19),

-- Rio Grande do Norte (id_estado = 20)
('Natal', 20),
('Mossoró', 20),

-- Rio Grande do Sul (id_estado = 21)
('Porto Alegre', 21),
('Caxias do Sul', 21),

-- Rondônia (id_estado = 22)
('Porto Velho', 22),
('Ji-Paraná', 22),

-- Roraima (id_estado = 23)
('Boa Vista', 23),
('Rorainópolis', 23),

-- Santa Catarina (id_estado = 24)
('Florianópolis', 24),
('Joinville', 24),

-- São Paulo (id_estado = 25)
('São Paulo', 25),
('Campinas', 25),

-- Sergipe (id_estado = 26)
('Aracaju', 26),
('Itabaiana', 26),

-- Tocantins (id_estado = 27)
('Palmas', 27),
('Araguaína', 27);