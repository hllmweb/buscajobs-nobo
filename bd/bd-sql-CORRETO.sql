
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

select nm_usuario from usuario;
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

drop procedure sp_filter;

#sp filtro
delimiter //
create procedure sp_filter(
	p_operacao varchar(50),
	p_usuario int,
	p_cidade int,
	p_profissao int,
	p_opcao int
)
begin
	/*
	 * p_opcao = {
	 * 	1 = filtro search 	
	 * 	0 = listar todos
	 *  2 = filtro individual
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
			or (p_opcao = 0) and u.id_usuario >= 1
			or (p_opcao = 2) and u.id_usuario = p_usuario); 
	end if;
end;
//
call sp_filter('FILTER_VAGA',5,null,null,2); 



drop procedure sp_inscricao;
#sp inscricao
create procedure sp_inscricao(
	p_operacao varchar(50),
	p_empresa int,
	p_usuario int
)
begin
	if p_operacao = 'INSCRICAO' then
		if exists (select * from inscricao where id_empresa = p_empresa and id_usuario = p_usuario) then
			select 1 opcao;
		else
			insert into inscricao (id_empresa, id_usuario) values (p_empresa, p_usuario);
		end if;
	end if;
end;

commit;
select * from empresa
select * from usuario
select * from inscricao
call sp_inscricao('INSCRICAO',5,15)




drop procedure sp_auth;
#sp auth
create procedure sp_auth(
	#p_operacao varchar(50),
	p_login varchar(100),
	p_senha varchar(100)
)
begin 
	declare v_opcao varchar(100);
	
	if exists (select 1 from empresa where email = p_login and senha = md5(p_senha)) then
		set v_opcao = 'EMPRESA';
		if v_opcao = 'EMPRESA' then
				select v_opcao opcao, e.* from empresa e where email = p_login and senha = md5(p_senha);
		end if;
	
	
	
		
	elseif (select 1 from usuario where email = p_login and senha = md5(p_senha)) then 
		set v_opcao = 'USUARIO';
		if v_opcao = 'USUARIO' then
			select  v_opcao opcao, u.*  from usuario u where email = p_login and senha = md5(p_senha);	
		end if;
	else
		select 'Você não possui cadastro!' mensagem;
	end if;

end;

commit;
select * from  empresa where email = 'hug@gmai.com' and senha = md5('11');
select * from usuario
update usuario set senha = md5('123') where id_usuario = 5


call sp_auth('joao@gmail.com','123');
call sp_auth('abc_brasil@gmail.com','123');
drop procedure sp_teste;
commit;
create procedure sp_teste()
begin
	select * from cidade;
end;
end




create function slug() returns char(100)
begin
	return 'sdasdas';
end




CREATE FUNCTION spacealphanum( 
	str TEXT 
) 
RETURNS TEXT
BEGIN 
  DECLARE i, len SMALLINT DEFAULT 1; 
  DECLARE ret TEXT DEFAULT ''; 
  DECLARE c CHAR(1); 
  SET len = CHAR_LENGTH( str ); 
  REPEAT 
    BEGIN 
      SET c = MID( str, i, 1 ); 
      IF c REGEXP '[[:alnum:]]' THEN 
        SET ret=CONCAT(ret,c); 
      ELSEIF  c = ' ' THEN
          SET ret=CONCAT(ret," ");
      END IF; 
      SET i = i + 1; 
    END; 
  UNTIL i > len END REPEAT; 
  SET ret = lower(ret);
  RETURN ret; 
end;