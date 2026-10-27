-- tablas para el proyecto
create table articulos(
    id int auto_increment primary key,
    nombre varchar(40) unique,
    descripcion text,
    precio decimal(6, 2) -- 9999.99
);

create table usuarios(
    id int auto_increment primary key,
    username varchar(40) unique,
    password varchar(250),
    perfil int default 0 -- utilizaremos 1 para admin, 0 user normal 
);