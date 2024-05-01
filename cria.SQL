

CREATE TABLE aulas (
    id int(11) AUTO_INCREMENT,
    titulo varchar(30),
    descricao varchar(500),
    url varchar(500),
    link varchar(500),
    duracao varchar(500),
    categoria int(11),
    PRIMARY KEY (id)
);

CREATE TABLE categorias (
    id int(11) AUTO_INCREMENT,
    titulo varchar(30),
    PRIMARY KEY (id)
);

