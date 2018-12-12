## Base de dados
CREATE DATABASE found_Cake CHARACTER SET "utf8";

## Tabela usuarios - Estrutura
CREATE TABLE usuarios(
	id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(45) NOT NULL,
	email VARCHAR(40) NOT NULL,
    senha CHAR(64) NOT NULL,
	tipo enum('ADMIN','COMUM') NOT NULL
);
## Tabela posts - Estrutura
CREATE TABLE anuncio(
	id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Nome VARCHAR(100) NOT NULL,
	texto VARCHAR(500) NOT NULL,
	resumo VARCHAR(150) NOT NULL,
	regiao VARCHAR(50) NOT NULL,
    contato VARCHAR(100) NOT NULL,
    imagem VARCHAR(40) NOT NULL,
	usuario_id SMALLINT NOT NULL
);
#Criando relacionamento entre as tabelas
ALTER TABLE anuncio ADD
	FOREIGN KEY(usuario_id) REFERENCES usuarios(id);

