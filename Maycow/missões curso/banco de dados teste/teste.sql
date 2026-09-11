create database escola;

use escola;

create table alunos (
 codigo int auto_increment primary key,
 nome varchar(100),
  cidade varchar(100)
  );
  
  insert into alunos(nome, cidade)
  values
  ("joão", "São Jose dos Campos"),
  ("Maria", "Jacaréi"),
  ("Isaac", "São Paulo");
  
  select cidade from alunos;