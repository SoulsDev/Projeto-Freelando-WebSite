/*DROP DATABASE freelando;*/
CREATE DATABASE freelando;
USE freelando;

CREATE TABLE contratante
(
	id_contratante INT AUTO_INCREMENT ,
    nome VARCHAR(35) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    dt_registro DATETIME NOT NULL,
    dt_modificacao DATETIME,
    PRIMARY KEY(id_contratante)
);
CREATE PROCEDURE Cadastrar_Contratante(nome VARCHAR(35), email VARCHAR(50), senha VARCHAR(40), dt_registro DATETIME) 
INSERT INTO contratante VALUES (default, nome, email, senha, dt_registro, null); 

CREATE TABLE autonomo
(
	id_autonomo INT AUTO_INCREMENT,
    nome VARCHAR(35) NOT NULL,
    cpf CHAR(11) NOT NULL,
    genero SMALLINT NOT NULL,
    dt_nasc DATE NOT NULL,
    cep VARCHAR(8) NOT NULL,
    uf CHAR(2) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    logradouro VARCHAR(100) NOT NULL,
    numero_logradouro INT NOT NULL,
    complemento VARCHAR(5) NOT NULL,
    email VARCHAR(25) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    dt_registro DATETIME NOT NULL,
    dt_modificacao DATETIME,
    PRIMARY KEY (id_autonomo)
);
CREATE PROCEDURE Cadastrar_Autonomo(nome VARCHAR(35), cpf VARCHAR(11), dt_nasc DATE, genero SMALLINT,
									cep VARCHAR(8), uf CHAR(2), cidade VARCHAR (50), logradouro VARCHAR(100),
                                    numero INT, complemento VARCHAR (5), email VARCHAR(25), senha VARCHAR(50), 
                                    dt_registro DATETIME)
INSERT INTO autonomo VALUES (default, nome, cpf, dt_nasc, genero, cep, uf, cidade, logradouro, numero, complemento, senha, dt_registro);


CREATE TABLE numero_contato(
	id_numero_contato iNT AUTO_INCREMENT,
	numero_celular VARCHAR(17),
    numero_telefone VARCHAR(18),
	id_autonomo INT,
    PRIMARY KEY (id_numero_contato),
	FOREIGN KEY (id_autonomo) REFERENCES autonomo(id_autonomo)
	/*
	numero é varchar pra poder usar o dado pra comparação no backend e para ocupar menos espaço
	+xx(xx)xxxxx-xxxx	ou	+xx(xx)xxxx-xxxx
	*/
);
CREATE PROCEDURE Cadastrar_Numero_Contato(id_autonomo INT, numero VARCHAR(17))
INSERT INTO numero_contato VALUES (default, id_autonomo, numero);



CREATE TABLE formacao_academica
(
	id_formacao_academica INT AUTO_INCREMENT,
    ensino VARCHAR(25) NOT NULL,
    nivel VARCHAR(15) NOT NULL,
    curso VARCHAR(15) NOT NULL,
    carga_horaria INT NOT NULL,
    id_autonomo INT NOT NULL,
    PRIMARY KEY (id_formacao_academica),
    FOREIGN KEY (id_autonomo) REFERENCES autonomo(id_autonomo)
    /*
	OBSERVAÇÕES:
    /////////
	*/
);
CREATE PROCEDURE Cadastrar_Formacao_Academica (ensino VARCHAR(25), nivel VARCHAR(15), curso VARCHAR(25), carga_horaria INT, id_autonomo INT)
INSERT INTO formacao_academica VALUES (DEFAULT, ensino, nivel, curso, carga_horaria, id_autonomo);

CREATE TABLE dados_profissionais(
	id_dados_profissional INT AUTO_INCREMENT,
    area VARCHAR(50) NOT NULL,
    profissao VARCHAR(50) NOT NULL,
    nivel_experiencia VARCHAR(50) NOT NULL,
    id_autonomo INT NOT NULL,
    PRIMARY KEY (id_dados_profissional),
    FOREIGN KEY (id_autonomo) REFERENCES autonomo(id_autonomo)
    /*
    OBSERVAÇÕES: 
    /////////
    */
);
CREATE PROCEDURE Cadastrar_Dados_Profissionais (area VARCHAR(30), profissão VARCHAR(50), nivel_experiencia VARCHAR(50), id_autonomo INT)
INSERT INTO dados_profissionais VALUES (DEFAULT, area, profissao, nivel_experiencia, id_autonomo);

CREATE TABLE contrato(
	id_contrato INT AUTO_INCREMENT,
    valor FLOAT NOT NULL,
    data_contrato DATETIME NOT NULL,
    descricao VARCHAR(150) NOT NULL,
    id_autonomo INT NOT NULL,
    id_contratante INT NOT NULL,
    PRIMARY KEY (id_contrato),
    FOREIGN KEY (id_autonomo) REFERENCES autonomo(id_autonomo),
    FOREIGN KEY (id_contratante) REFERENCES contratante(id_contratante)
    /*
	OBSERVAÇÕES:
    /////////
    */
);

/*

	TABELAS COMENTADAS POIS AINDA NÃO TEMOS DEFINIÇÕES SOBRE ELAS AINDA.
    //////////////////////////////////////////////////////////////

CREATE TABLE curtida_post
(
	id_curtida_post INT AUTO_INCREMENT,
    id_post INT NOT NULL,
	id_curtida INT NOT NULL,
    PRIMARY KEY (id_compartilhamento_post),
	FOREIGN KEY (id_post) REFERENCES post(id_post),
	FOREIGN KEY (id_curtida) REFERENCES curtida(id_curtida)
);

CREATE TABLE comentario_post
(
	id_comentario_post INT AUTO_INCREMENT,
    id_post INT NOT NULL,
	id_comentario INT NOT NULL,
    PRIMARY KEY (id_compartilhamento_post),
	FOREIGN KEY (id_post) REFERENCES post(id_post),
	FOREIGN KEY (id_comentario) REFERENCES comentario(id_comentario)
);

CREATE TABLE compartilhamento_post
(
	id_compartilhamento_post INT AUTO_INCREMENT,
    id_post INT NOT NULL,
	id_compartilhamento INT NOT NULL,
    PRIMARY KEY (id_compartilhamento_post),
	FOREIGN KEY (id_post) REFERENCES post(id_post),
	FOREIGN KEY (id_compartilhamento) REFERENCES compartilhamento(id_compartilhamento)
);

CREATE TABLE post
(
	id_post INT AUTO_INCREMENT,
    conteudo VARCHAR(150),
    caminho_arquivo VARCHAR(100),
    id_autonomo INT NOT NULL,
    PRIMARY KEY (id_post),
    FOREIGN KEY (id_autonomo) REFERENCES autonomo(id_autonomo)
);

CREATE TABLE chat(
	id_chat INT AUTO_INCREMENT,
	id_automono INT NOT NULL,
	id_cliente INT NOT NULL,
    PRIMARY KEY (id_chat),
	FOREIGN KEY (id_automono) REFERENCES autonomo(id_automono),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)	
);

CREATE TABLE mensagem(
	id_mensagem INT AUTO_INCREMENT,
	dt_mensagem DATETIME NOT NULL,
	mensagem VARCHAR(80),
	remetente VARCHAR(10),
	PRIMARY KEY (id_mensagem)
);
CREATE TABLE dado_criptografado(
	id_dado_criptografado INT AUTO_INCREMENT,
	dado = VARCHAR(50),
	PRIMARY KEY (id_dado_criptografado)
	
	
	Separado das chaves de criptografia para diminuir risco
    
);


CREATE TABLE criptografia(
	id_criptografia INT AUTO_INCREMENT,
	chave_secreta VARCHAR(),
	vetor VARCHAR(),
	nonce VARCHAR(),
	id_dado INT NOT NULL,
	PRIMARY KEY (id_criptografia),
	FOREIGN KEY (id_dado) REFERENCES dado_criptografado(id_dado)	
	
	Modelo de tabela feito a partir dos elementos gerados pela cifra AES
	Separado do dado criptografado para diminuir risco
    
);*/



