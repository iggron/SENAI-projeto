create database escola1;
use escola1;

create table alunos1 (
id int auto_increment primary key,
nome varchar (100),
turma char (1),
idade varchar(100),
data_de_nascimento date 
);

insert into alunos1
(nome, turma, idade, data_de_nascimento)
values
('miguel', 'A', '17', '2009-03-24'),
('igor', 'B', '16', '2009-10-28'),
('gustavo', 'C', '16', '2010-12-27');

select * from alunos1