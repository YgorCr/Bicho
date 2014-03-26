create sequence aposta_id_seq start with 1;

create table aposta (
	id integer default nextval('aposta_id_seq') primary key,
	data date default now() not null,
	tipo_da_aposta varchar not null,
	aposta varchar not null,
	valor integer not null,
	sorteio varchar not null,
	forma_de_pagamento varchar not null,
	pago boolean default FALSE not null,
	premiada boolean default FALSE not null,
	jogador_id integer references jogador(id) not null
);