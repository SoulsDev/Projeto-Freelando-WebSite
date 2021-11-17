/*DROP DATABASE freelando;*/

/*
	COMO LER O NOSSO BANCO;
    
    1 - Tudo, com exeção de procedures e functions devem ser escritos em letras minusculas;
    2 - Procedures e functions devem ser declaradas inteiramente em letras MAIUSCULAS;
    3 - As identificações dos atributos são separados por "_" sendo:
		tipoDeDado_conteudo_nomeTabela;
        
        ////////////////////////////////////
*/
CREATE DATABASE freelando;
USE freelando;

CREATE TABLE contratante
(
	n_id_contratante INT AUTO_INCREMENT ,
    c_nome_contratante VARCHAR(35) NOT NULL,
    c_email_contratante VARCHAR(50) NOT NULL,
    c_senha_contratante VARCHAR(40) NOT NULL,
    d_registro_contratante DATETIME NOT NULL,
    d_modificacao_contratante DATETIME,
    PRIMARY KEY(n_id_contratante)
);
CREATE PROCEDURE CADASTRAR_CONTRATANTE (nome VARCHAR(35), email VARCHAR(50), senha VARCHAR(40), registro DATETIME) 
	INSERT INTO contratante VALUES (default, nome, email, senha, registro, null);
    
CREATE PROCEDURE SELECIONA_CONTRATANTE_EMAIL (email VARCHAR(50))
	SELECT * FROM contratante WHERE c_email_contratante = email;
    
/*/////////////////////////////////////////////////////////////////////////////////////////////*/
CREATE TABLE autonomo(
	n_id_autonomo INT AUTO_INCREMENT,
    c_nome_autonomo VARCHAR(35) NOT NULL,
    c_cpf_autonomo CHAR(11) NOT NULL,
    c_genero_autonomo SMALLINT NOT NULL,
    d_nascimento_autonomo DATE NOT NULL,
    c_cep_autonomo VARCHAR(8) NOT NULL,
    c_uf_autonomo CHAR(2) NOT NULL,
    c_cidade_autonomo VARCHAR(50) NOT NULL,
    c_logradouro_autonomo VARCHAR(100) NOT NULL,
    n_numero_autonomo INT NOT NULL,
    c_complemento_autonomo VARCHAR(5) NOT NULL,
    c_email_autonomo VARCHAR(25) NOT NULL,
    c_senha_autonomo VARCHAR(50) NOT NULL,
    d_registro_autonomo DATETIME NOT NULL,
    d_modificacao_autonomo DATETIME,
    PRIMARY KEY (n_id_autonomo)
);
CREATE PROCEDURE CADASTRAR_AUTONOMO (nome VARCHAR(35), cpf VARCHAR(11), nascimento DATE, genero SMALLINT, cep VARCHAR(8), uf CHAR(2), cidade VARCHAR (50), 
									 logradouro VARCHAR(100), numero INT, complemento VARCHAR (5), email VARCHAR(25), senha VARCHAR(50), registro DATETIME)
	INSERT INTO autonomo VALUES (default, nome, cpf, nascimento, genero, cep, uf, cidade, logradouro, numero, complemento, senha, registro);
    
CREATE PROCEDURE VALIDA_AUTONOMO_CPF (cpf VARCHAR(11))
	SELECT * FROM autonomo WHERE c_cpf_autonomo = cpf;

/*    
CREATE PROCEDURE FILTRAR_AUTONOMO_AREA (area VARCHAR(50)) 
	SELECT * FROM autonomo 
		INNER JOIN telefone_autonomo ON autonomo.n_id_autonomo = telefone_autonomo.n_id_autonomo
			INNER JOIN 
*/
/*/////////////////////////////////////////////////////////////////////////////////////////////*/
CREATE TABLE telefone_autonomo(
	n_id_telefone_autonomo iNT AUTO_INCREMENT,
	c_telefone_autonomo VARCHAR(17),
	n_id_autonomo INT,
    PRIMARY KEY (n_id_telefone_autonomo),
	FOREIGN KEY (n_id_autonomo) REFERENCES autonomo(n_id_autonomo)
);
CREATE PROCEDURE CADASTRAR_TELEFONE_AUTONOMO (telefone VARCHAR(17), id_autonomo INT)
	INSERT INTO telefone_autonomo VALUES (default, telefone, id_autonomo);


/*/////////////////////////////////////////////////////////////////////////////////////////////*/
CREATE TABLE formacao_academica
(
	n_id_formacao_academica INT AUTO_INCREMENT,
    c_ensino_formacao_academica VARCHAR(25) NOT NULL,
    c_nivel_formacao_academica VARCHAR(15) NOT NULL,
    c_curso_formacao_academica VARCHAR(15) NOT NULL,
    n_carga_horaria_formacao_academica INT NOT NULL,
    n_id_autonomo INT NOT NULL,
    PRIMARY KEY (n_id_formacao_academica),
    FOREIGN KEY (n_id_autonomo) REFERENCES autonomo(n_id_autonomo)
);

CREATE PROCEDURE CADASTRAR_FORMACAO_ACADEMICA (ensino VARCHAR(25), nivel VARCHAR(15), curso VARCHAR(25), carga_horaria INT, id_autonomo INT)
	INSERT INTO formacao_academica VALUES (default, ensino, nivel, curso, carga_horaria, id_autonomo);

/*/////////////////////////////////////////////////////////////////////////////////////////////*/
CREATE TABLE experiencia_profissional(
	n_id_experiencia_profissional INT AUTO_INCREMENT,
    c_area_experiencia_profissional VARCHAR(50) NOT NULL,
    c_profissao_experiencia_profissional VARCHAR(50) NOT NULL,
    c_nivel_experiencia_profissional VARCHAR(50) NOT NULL,
    n_id_autonomo INT NOT NULL,
    PRIMARY KEY (n_id_experiencia_profissional),
    FOREIGN KEY (n_id_autonomo) REFERENCES autonomo(n_id_autonomo)
);

CREATE PROCEDURE CADASTRAR_EXPERIENCIA_PROFISSIONAL (area_profissional VARCHAR(30), profissao VARCHAR(50), nivel_experiencia VARCHAR(50), id_autonomo INT)
INSERT INTO dados_profissionais VALUES (default, area_profissional, profissao, nivel_experiencia, id_autonomo);


/*/////////////////////////////////////////////////////////////////////////////////////////////*/
/*
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
    
	OBSERVAÇÕES:
    /////////

);
*/
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



