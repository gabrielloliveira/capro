drop database if exists capro;
create database capro;
use capro;

create table usuarios(
	id int not null auto_increment primary key,
    username varchar(50) not null unique,
    email varchar(255) not null unique,
    senha varchar(255) not null
)engine InnoDB;

create table projetos(
	id int not null auto_increment primary key,
    nomeProjeto varchar(150) not null,
    descricao varchar(255),
    dataInicio date not null,
    dataEntrega date,
    nomeCliente varchar(255) not null,
    emailCliente varchar(255),
    foneCliente varchar(15),
    valor decimal(7, 2) not null,
    finalizado boolean not null default 0,
    pago boolean not null default 0
)engine InnoDB;

create table usuariosComProjetos(
	idUsuario int not null,
    idProjeto int not null,
    foreign key (idUsuario) references usuarios(id),
    foreign key (idProjeto) references projetos(id),
    primary key (idUsuario, idProjeto)
)engine InnoDB;