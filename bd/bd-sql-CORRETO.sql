
create table cidade(
	id_cidade int(1) primary key auto_increment not null,
	nm_cidade varchar(100) not null
);

insert into cidade (nm_cidade) values ('Rio de Janeiro');
commit;

select * from cidade;

create table profissao(
	id_profissao int(1) primary key auto_increment not null,
	nm_profissao varchar(100) not null
);

insert into profissao (nm_profissao) values ('Assistente Administrativo');
commit;

select * from profissao;

create table empresa(
	id_empresa int(1) primary key auto_increment not null,
	nm_empresa varchar(200) not null,
	email varchar(100) not null,
	senha varchar(100) not null,
	dt_cadastro datetime default CURRENT_TIMESTAMP
);

insert into empresa (nm_empresa, email, senha) values ('Empresa ABC Brasil LTDA','abc_brasil@gmail.com','123');


create table usuario(
	id_usuario int(11) primary key auto_increment not null,
	id_cidade int(11) not null,
	id_profissao int(11) not null,
	nm_usuario varchar(150) not null,
	desc_usuario text null,
	nivel_experiencia varchar(50) null,
	email varchar(100) not null,
	senha varchar(100) not null,
	dt_cadastro datetime default CURRENT_TIMESTAMP
);

insert into usuario (id_cidade, id_profissao, nm_usuario, desc_usuario, nivel_experiencia, email, senha) 
values (5,15,'Acacio Costa Larga','Fico só de boa!','Avançado','acacio@gmail.com',md5('777'));
commit;

select * from usuario;
update usuario set id_cidade = 5, id_profissao = 15 where id_usuario = 5
commit;

select u.id_usuario, p.nm_profissao, c.nm_cidade, u.nm_usuario, u.desc_usuario, u.nivel_experiencia,
u.email
from usuario u
join profissao p on p.id_profissao = u.id_profissao 
join cidade c on c.id_cidade = u.id_cidade 


create table inscricao(
	id_empresa int(1) not null,
	id_usuario int(1) not null,
	status_vaga char(1) default 'E' not null,
	dt_cadastro datetime default CURRENT_TIMESTAMP
);

delimiter //
create procedure sp_filter(
	p_operacao varchar(50),
	p_cidade int,
	p_profissao int,
	p_opcao int
)
begin
	/*
	 * p_opcao = {
	 * 	1 = filtro individual	
	 * 	0 = listar todos
	 * }
	 * */
	
	if p_operacao = 'FILTER_CIDADE' then

		select id_cidade, nm_cidade 
		from cidade order by nm_cidade asc;
	elseif p_operacao = 'FILTER_PROFISSAO' then
		select id_profissao, nm_profissao 
		from profissao order by nm_profissao asc;
	elseif p_operacao = 'FILTER_VAGA' then
		select u.id_usuario, p.nm_profissao, c.nm_cidade, u.nm_usuario, u.desc_usuario, u.nivel_experiencia,
		u.email
		from usuario u
		join profissao p on p.id_profissao = u.id_profissao 
		join cidade c on c.id_cidade = u.id_cidade
		where ((p_opcao = 1) and u.id_cidade = p_cidade and u.id_profissao = p_profissao 
			or (p_opcao = 0) and u.id_usuario >= 1); 
	end if;
end;
//

commit;

call sp_filter('FILTER_VAGA',1,null,1); 

drop procedure sp_teste;
commit;
create procedure sp_teste()
begin
	select * from cidade;
end;
end