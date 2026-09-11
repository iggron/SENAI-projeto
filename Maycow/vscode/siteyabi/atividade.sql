Create database Atividade;
use Atividade;

create table usuarios_atividade (
	id int auto_increment primary key,
	nome varchar(100) not null,
    endereço varchar(100) not null,
    telefone varchar(16),
    email varchar(100)
);
	    desc usuarios_atividade;
        