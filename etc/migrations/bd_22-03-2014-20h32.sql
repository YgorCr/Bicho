create sequence aposta_id_seq start with 1;

create table aposta (
	id integer default nextval('aposta_id_seq') primary key,
	data date default now() not null,
	tipo_da_aposta varchar not null,
	aposta char(4) not null,
	forma_de_pagamento varchar not null,
	jogador_id integer references jogador(id) not null
);