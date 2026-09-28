create database if not exists cadastro;
use cadastro;

create table usuarios (
   id int auto_increment primary key,
   nome varchar(100) not null,
   endereco varchar(100) not null,
   telefone varchar(14) not null,
   email varchar(320) not null
);

desc usuarios


   