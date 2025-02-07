drop database if exists fct;
create database fct;
use fct;

create table tutoresinstituto(
    id          int(11)         auto_increment primary key,
    nombre      varchar(255)    not null,
    apellidos   varchar(255)    not null,
    email       varchar(255)    not null
);

create table alumnos(
    id                  int(11)         auto_increment primary key,
    nombre              varchar(255)    not null,
    apellidos           varchar(255)    not null,
    nif                 varchar(9)      not null,
    nuss                varchar(12)     not null,
    email               varchar(255)    not null,
    movil               varchar(15)     not null,
    fecha_nacimiento    date            not null,
    tutoresinstituto_id int(11)         not null,
    foreign key (tutoresinstituto_id) references tutoresinstituto(id) on delete cascade
);

create table empresas(
    id          int(11)         auto_increment primary key,
    nombre      varchar(255)    not null,
    localidad   varchar(255)    not null
);

create table tutoresempresa(
    id          int(11)         auto_increment primary key,
    nombre      varchar(255)    not null,
    apellidos   varchar(255)    not null,
    email       varchar(255)    not null,
    empresa_id  int(11)         not null,
    foreign key (empresa_id) references empresas(id) on delete cascade
);

create table alumno_tutorempresa(
    id                 int(11)         auto_increment primary key,
    alumno_id          int(11)         not null,
    tutorempresa_id    int(11)         not null,
    fecha_inicio       date            not null,
    fecha_fin          date            not null,
    foreign key (alumno_id) references alumnos(id) on delete cascade,
    foreign key (tutorempresa_id) references tutoresempresa(id) on delete cascade
);
