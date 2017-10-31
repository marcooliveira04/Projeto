CREATE DATABASE clubHub;

CREATE TABLE estados(
	id		int				not null	primary key,
	nome	varchar(100)	not null
);

CREATE TABLE cidade(
	id		int				not null	primary key,
	nome	varchar(100)	not null,
	estado 	int				not null
);

CREATE TABLE assinante (
	id						int				not null primary key auto_increment,
	nome					varchar(255)	not null,
	cpf						varchar(11)		not null unique,
	rg						varchar(9)		not null unique,
	nascimento				date			not null,
	sexo					char(1)			not null,
	cepResidencial			varchar(8)		not null,
	ruaResidencial			varchar(255)	not null,
	numeroResidencial		varchar(10)		not null,
	complementoResidencial	varchar(50)		null,
	cidadeResidencial		int				not null,
	ufResidencial			int 			not null,
	cepEntrega				varchar(8)		null,
	ruaEntrega				varchar(255)	null,
	numeroEntrega			varchar(10)		null,
	complementoEntrega		varchar(50)		null,
	cidadeEntrega			int				null,
	ufEntrega 				int 			null,
	telefone				varchar(11)		not null,
	celular					varchar(11)		not null,
	email					varchar(255)	not null unique,
	senha					varchar(255)	not null
);

CREATE TABLE clubes(
	id 						int 			not null primary key auto_increment,
	nome 					varchar(255)	not null,
	razaoSocial 			varchar(255)	not null,
	cnpj 					varchar(14)		not null unique,
	cep						varchar(8)		not null,
	rua						varchar(255)	not null,
	numero					varchar(10)		not null,
	complemento				varchar(50)		null,
	cidade					int				not null,
	uf						int 			not null,
	telefone				varchar(11)		not null,
	celular					varchar(11)		not null,
	email					varchar(255)	not null unique,
	senha					varchar(255)	not null,
	categoria 				int 			not null
);

CREATE TABLE categoria(
	id		int				not null primary key,
	nome 	varchar(255)	not null
);

CREATE TABLE cliente(
	id				int				not null	primary key,
	nomeFantasia	varchar(255)	not null,
	cnpj			varchar(14)		not null,
	razaoSocial		varchar(255)	not null,
	categoria		int				not null
);

CREATE TABLE pacote(
	id			int				not null	primary key,
	nome 		varchar(255)	not null,
	valor 		decimal(6,2)	not null,
	id_cliente	int 			not null
);

CREATE TABLE periodicidade(
	id 			int 			not null	primary key,
	data_inicio	date 			not null,
	data_fim 	date 			not null,
	id_pacote 	int 			not null
);

CREATE TABLE assinatura(
	id 				int 			not null	primary key,
	id_assinante	int 			not null,
	id_pacote 		int 			not null
);

CREATE TABLE produto(
	id 			int 			not null 	primary key,
	nome 		varchar(255)	not null,
	valor		decimal(6,2)	not null
	id_clinte	int 			not null
);

CREATE TABLE vendas(
	id 				int 			not null 	primary key,
	valor_total		decimal(8,2)	not null,
	id_cliente 		int 			not null,
	id_assinante 	int 			not null
);