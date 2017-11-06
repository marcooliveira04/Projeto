CREATE TABLE enderecos(
	idPessoa 				int 			not null,
	cep						varchar(8)		not null,
	rua						varchar(255)	not null,
	numero					varchar(10)		not null,
	bairro					varchar(60) 	not null,
	complemento				varchar(50)		null,
	cidade					int				not null,
	uf						int 			not null,
	tipo					char(1)			not null
);

CREATE TABLE assinante (
	id						int				not null primary key auto_increment,
	nome					varchar(255)	not null,
	cpf						varchar(11)		not null unique,
	rg						varchar(9)		not null unique,
	nascimento				date			not null,
	sexo					char(1)			not null,
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
	telefone				varchar(11)		not null,
	celular					varchar(11)		not null,
	email					varchar(255)	not null unique,
	senha					varchar(255)	not null,
	categoria 				int 			not null
);

