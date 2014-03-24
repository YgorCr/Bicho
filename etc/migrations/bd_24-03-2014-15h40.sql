create sequence administrador_id_seq start with 1;

create table administrador (
	id integer default nextval('administrador_id_seq') primary key,
	nome varchar default now() not null,
	cpf_cod varchar not null,
	senha char(32) not null
);