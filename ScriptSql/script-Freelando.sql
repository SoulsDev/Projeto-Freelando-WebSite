DROP DATABASE IF EXISTS freelando;
CREATE DATABASE freelando;
USE freelando;
/*
	COMO LER O NOSSO BANCO;
    0 - Nomes de tabela no plural;
    1 - Tudo, com exeção de procedures e functions devem ser escritos em letras minusculas;
    2 - Procedures e functions devem ser declaradas inteiramente em letras MAIUSCULAS;
    3 - As identificações dos atributos são separados por "_" sendo;
		tipoDeDado_conteudo - nome das tabelas removido para simplificar os atributos;
////////////////////////////////////
*/


DROP TABLE IF EXISTS contratantes;
CREATE TABLE contratantes(
	n_id INT AUTO_INCREMENT ,
    c_nome VARCHAR(35) NOT NULL,
    c_email VARCHAR(50) NOT NULL,
    c_senha VARCHAR(70) NOT NULL,
    d_registro DATETIME NOT NULL,
    d_modificacao DATETIME,
    PRIMARY KEY(n_id)
);
CREATE PROCEDURE CADASTRAR_CONTRATANTE (nome VARCHAR(35), email VARCHAR(50), senha VARCHAR(70), registro DATETIME) 
	INSERT INTO contratantes VALUES (default, nome, email, senha, registro, null);
    
CREATE PROCEDURE SELECIONA_CONTRATANTE_EMAIL (email VARCHAR(50))
	SELECT * FROM contratantes WHERE c_email_contratante = email;
    
CREATE PROCEDURE LOGIN_CONTRATANTE (email VARCHAR(50), senha VARCHAR(70))
	SELECT count(n_id) FROM contratantes WHERE c_email = email AND c_senha = senha;
    
CREATE PROCEDURE LISTAR_CONTRATANTE (email VARCHAR(50), senha VARCHAR(70))
	SELECT * FROM contratantes WHERE c_email = email AND c_senha = senha;
/*/////////////////////////////////////////////////////////////////////////////////////////////*/
CREATE TABLE autonomos(
	n_id INT AUTO_INCREMENT,
    c_nome VARCHAR(35) NOT NULL,
    c_cpf CHAR(11) NOT NULL,
    c_genero SMALLINT NOT NULL,
    d_nascimento DATE NOT NULL,
    c_cep VARCHAR(8) NOT NULL,
    c_uf CHAR(2) NOT NULL,
    c_cidade VARCHAR(50) NOT NULL,
    c_logradouro VARCHAR(100) NOT NULL,
    n_numero_autonomo INT NOT NULL,
    c_complemento VARCHAR(5) NOT NULL,
    c_email VARCHAR(25) NOT NULL,
    c_senha VARCHAR(70) NOT NULL,
    d_registro DATETIME NOT NULL,
    d_alteracao DATETIME,
    /* data de alteração dos dados, por exemplo cursos, interesses */ 
    PRIMARY KEY (n_id)
);
CREATE PROCEDURE CADASTRAR_AUTONOMO (nome VARCHAR(35), cpf VARCHAR(11), nascimento DATE, genero SMALLINT, cep VARCHAR(8), uf CHAR(2), cidade VARCHAR (50), 
									 logradouro VARCHAR(100), numero INT, complemento VARCHAR (5), email VARCHAR(25), senha VARCHAR(70), registro DATETIME) 
	INSERT INTO autonomos VALUES (default, nome, cpf, genero, nascimento, cep, uf, cidade, logradouro, numero, complemento, email, senha, registro, null);
    
CREATE PROCEDURE VALIDA_AUTONOMO_CPF (cpf VARCHAR(11))
	SELECT * FROM autonomos WHERE c_cpf = cpf;
    
CREATE PROCEDURE LOGIN_AUTONOMO (email VARCHAR(50), senha VARCHAR(70))
	SELECT count(n_id) FROM autonomos WHERE c_email = email AND c_senha = senha;
    
CREATE PROCEDURE LISTAR_AUONOMOS (email VARCHAR(50), senha VARCHAR(70))
	SELECT * FROM autonomos 
		INNER JOIN telefones_autonomo ON autonomos.n_id = telefones_autonomo.n_id_autonomo
			INNER JOIN dados_academicos ON autonomos.n_id = dados_academicos.n_id_autonomo
				INNER JOIN dados_profissionais ON autonomos.n_id = dados_profissionais.n_id_autonomo;
/*/////////////////////////////////////////////////////////////////////////////////////////////*/


DROP TABLE IF EXISTS telefones_autonomo;
CREATE TABLE telefones_autonomo(
	n_id iNT AUTO_INCREMENT,
	c_telefone VARCHAR(17),
	n_id_autonomo INT,
    PRIMARY KEY (n_id),
	FOREIGN KEY (n_id_autonomo) REFERENCES autonomos(n_id)
);
CREATE PROCEDURE CADASTRAR_TELEFONE_AUTONOMO (telefone VARCHAR(17), id_autonomo INT)
	INSERT INTO telefones_autonomo VALUES (default, telefone, id_autonomo);
/*/////////////////////////////////////////////////////////////////////////////////////////////*/


DROP TABLE IF EXISTS dados_academicos;
CREATE TABLE dados_academicos(
	n_id INT AUTO_INCREMENT,
    c_ensino VARCHAR(25) NOT NULL,
    c_nivel VARCHAR(15) NOT NULL,
    c_curso VARCHAR(15) NOT NULL,
    n_carga_horaria INT NOT NULL,
    n_id_autonomo INT NOT NULL,
    PRIMARY KEY (n_id),
    FOREIGN KEY (n_id_autonomo) REFERENCES autonomos(n_id)
);

CREATE PROCEDURE CADASTRAR_DADO_ACADEMICO (ensino VARCHAR(25), nivel VARCHAR(15), curso VARCHAR(25), carga_horaria INT, id_autonomo INT)
	INSERT INTO dados_academicos VALUES (default, ensino, nivel, curso, carga_horaria, id_autonomo);
/*/////////////////////////////////////////////////////////////////////////////////////////////*/


DROP TABLE IF EXISTS areas;
CREATE TABLE areas(
	n_id INT AUTO_INCREMENT,
    c_nome VARCHAR(75),
    PRIMARY KEY (n_id)
);

CREATE PROCEDURE LISTAR_AREAS ()
	SELECT * FROM areas;
/*/////////////////////////////////////////////////////////////////////////////////////////////*/


DROP TABLE IF EXISTS profissoes;
CREATE TABLE profissoes(
	n_id INT AUTO_INCREMENT,
    c_nome VARCHAR(50),
    n_id_area INT NOT NULL,
    PRIMARY KEY (n_id),
    FOREIGN KEY (n_id_area) REFERENCES areas (n_id)
);


CREATE PROCEDURE LISTAR_PROFISSOES (id_area INT)
	SELECT * FROM profissoes WHERE n_id_area = id_area;
/*/////////////////////////////////////////////////////////////////////////////////////////////*/


DROP TABLE IF EXISTS dados_profissionais;
CREATE TABLE dados_profissionais(
	n_id INT AUTO_INCREMENT,
    n_id_area INT NOT NULL,
    n_id_profissao INT NOT NULL,
    n_experiencia INT NOT NULL,
    PRIMARY KEY (n_id),
    FOREIGN KEY (n_id_area) REFERENCES areas (n_id),
    FOREIGN KEY (n_id_profissao) REFERENCES profissoes (n_id)
);

CREATE PROCEDURE CADASTRAR_DADO_PROFISSIONAL (area_profissional VARCHAR(30), profissao VARCHAR(50), nivel_experiencia VARCHAR(50), id_autonomo INT)
INSERT INTO dados_profissionais VALUES (default, area_profissional, profissao, nivel_experiencia, id_autonomo);
/*/////////////////////////////////////////////////////////////////////////////////////////////*/

INSERT INTO areas VALUES (default, 'Administração e Contabilidade'),
						 (default, 'Advogados e Leis'),
                         (default, 'Atendimento ao Consumidor'),
                         (default, 'Design e Criação'),
                         (default, 'Educação e Consultoria'),
                         (default, 'Engenharia e Arquitetura'),
                         (default, 'Escrita'),
                         (default, 'Fotografia e AudioVisual'),
                         (default, 'Suporte Administrativo'),
                         (default, 'Tradução'),
                         (default, 'Vendas e Marketing'),
                         (default, 'Web, Mobile e Software');
                         
INSERT INTO profissoes VALUES (default, 'Análise de Dados e Estatistica', 1),
							  (default, 'Contabilidade', 1),
                              (default, 'Financeiro', 1),
                              (default, 'Gestão de Projetos', 1),
                              (default, 'Planejamento de Projetos', 1),
                              (default, 'Recursos Humanos', 1);
                              
INSERT INTO profissoes VALUES (default, 'Ambiental', 2),
							  (default, 'Civil', 2),
                              (default, 'Conciliação e Mediação',2),
                              (default, 'Consumidor', 2),
                              (default, 'Contratos', 2),
                              (default, 'Criminal', 2),
                              (default, 'Empresarial', 2),
                              (default, 'Familía', 2),
                              (default, 'Imigração e Internacional', 2),
                              (default, 'Imóveis', 2),
                              (default, 'Previdenciario', 2),
                              (default, 'Propriedade Intelectual', 2),
                              (default, 'Relações Domésticas', 2),
                              (default, 'Trabalhista', 2),
                              (default, 'Tributação', 2);
                              
INSERT INTO profissoes VALUES (default, 'Atendimento ao Consumidor', 3),
							  (default, 'Suporte Técnico', 3);
                              
INSERT INTO profissoes VALUES (default, 'Animação', 4),
							  (default, 'Apresentação', 4),
                              (default, 'Design 3D', 4),
                              (default, 'Design de Moda', 4),
                              (default, 'Design de Produto', 4),
                              (default, 'Design Gráfico', 4),
                              (default, 'Diagramação', 4),
                              (default, 'Ilustração', 4),
                              (default, 'Logotipos', 4),
                              (default, 'Motion Design', 4),
                              (default, 'Rótulos e Embalagens', 4);
                              
INSERT INTO profissoes VALUES (default, 'Agricultura', 5),
							  (default, 'Assessor de Investimentos', 5),
                              (default, 'Assessoria de Imprensa', 5),
                              (default, 'Consultoria Pessoal', 5),
                              (default, 'Contabilidade', 5),
                              (default, 'Corretor', 5),
                              (default, 'Design e Criação', 5),
                              (default, 'Engenharia e Arquitetura', 5),
                              (default, 'Escrita e Conteúdo', 5),
                              (default, 'Fundamental e Ensino Médio', 5),
                              (default, 'Idiomas', 5),
                              (default, 'Jurídico', 5),
                              (default, 'Negócios e Finanças', 5),
                              (default, 'Saúde e Fitness', 5),
                              (default, 'Tecnologia da Informação', 5),
                              (default, 'Vendas e Marketing', 5),
                              (default, 'Web, Mobile e Tecnologia', 5);
                              
                              
INSERT INTO profissoes VALUES (default, 'Arquitetura', 6),
							  (default, 'Design de Interiores', 6),
                              (default, 'Design Industrial', 6),
                              (default, 'Engenharia Civil', 6),
                              (default, 'Engenharia Elétrica', 6),
                              (default, 'Eletronica', 6),
                              (default, 'Engenharia Mecânica ', 6),
                              (default, 'Engenharia Quimica', 6),
                              (default, 'Modelagem 3D e CAD', 6);
                              

INSERT INTO profissoes VALUES (default, 'Acessoria de Imprensa', 7),
							  (default, 'Copywriting', 7),
                              (default, 'Currículo e Carta de Apresentação', 7),
                              (default, 'Edição e Revisão', 7),
                              (default, 'Jornalismo', 7),
                              (default, 'Redação', 7),
                              (default, 'Roteiro', 7);
                              
INSERT INTO profissoes VALUES (default, 'Acessoria de Imprensa', 7),
							  (default, 'Copywriting', 7),
                              (default, 'Currículo e Carta de Apresentação', 7),
                              (default, 'Edição e Revisão', 7),
                              (default, 'Jornalismo', 7),
                              (default, 'Redação', 7),
                              (default, 'Roteiro', 7);
                              
INSERT INTO profissoes VALUES (default, 'Áudio - Edição e Produção', 8),
							  (default, 'Cinegrafia', 8),
                              (default, 'Edição de Imagens', 8),
                              (default, 'Fotografia', 8),
                              (default, 'Locução e Narração', 8),
                              (default, 'Vídeo - Edição e Produção', 8);
                              
INSERT INTO profissoes VALUES (default, 'Assistente Virtual', 9),
							  (default, 'Entrada de Dados', 9),
                              (default, 'Pesquisa Online', 9),
                              (default, 'Planilhas e Relatórios', 9),
                              (default, 'Transcrição', 9);
                              
INSERT INTO profissoes VALUES (default, 'Alemão', 10),
							  (default, 'Chinês', 10),
                              (default, 'Espanhol', 10),
                              (default, 'Francês', 10),
                              (default, 'Inglês', 10),
                              (default, 'Italiano', 10),
                              (default, 'Japonês', 10);
                              
INSERT INTO profissoes VALUES (default, 'Comercial', 11),
							  (default, 'Gestão de Midias Sociais', 11),
                              (default, 'Marketing Digital', 11),
                              (default, 'Pesquisa de Mercado', 11),
                              (default, 'Relações Publicas', 11),
                              (default, 'SEO - Search Engine Optimization', 11);
                              
INSERT INTO profissoes VALUES (default, 'Banco de Dados', 12),
							  (default, 'Cloud Computing', 12),
                              (default, 'Desenvolvimento de Games', 12),
                              (default, 'Desenvolvimento Desktop', 12),
                              (default, 'Desenvolvimento Mobile', 12),
                              (default, 'Desenvolvimento Web', 12),
                              (default, 'Teste de Software', 12),
                              (default, 'UX/UI e Web Design', 12);