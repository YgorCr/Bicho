create sequence jogador_id_seq start with 1;

create table jogador(
	id integer default nextval('jogador_id_seq') primary key,
	nome varchar not null,
	cpf_cod varchar not null,
	estador char(2) not null,
	cidade varchar not null,
	rua varchar not null,
	bairro varchar not null,
	complemento varchar,
	senha char(32) not null
);