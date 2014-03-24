create sequence resultados_id_seq start with 1;

create table resultados (
	id integer default nextval('resultados_id_seq') primary key,
	data date default now() not null,
	sorteio1 varchar not null,
	sorteio2 varchar not null,
	sorteio3 varchar not null,
	sorteio4 varchar not null,
	sorteio5 varchar not null
);