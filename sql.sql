create table users
(
    idUser   int auto_increment,
    name     varchar(40) not null,
    password varchar(45) null,
    email    varchar(45) null,
    permisos tinyint(1)  not null,
    constraint idusers_UNIQUE
        unique (idUser)
);

alter table users
    add primary key (idUser);

create table posts
(
    id               int auto_increment,
    titulo           varchar(45)  null,
    imagenPequeña    varchar(45)  null,
    resumen          varchar(150) null,
    contenido        text         null,
    autor            varchar(40)  null,
    destacado        tinyint      null,
    categoria        varchar(45)  null,
    linkPost         varchar(45)  null,
    fecha            varchar(45)  null,
    idUsuarioCreador int          null,
    constraint id_UNIQUE
        unique (id),
    constraint idUsuarioCreador
        foreign key (idUsuarioCreador) references users (idUser)
);

alter table posts
    add primary key (id);

create table comments
(
    idComment int auto_increment,
    title     varchar(45) null,
    author    varchar(45) not null,
    content   text        not null,
    approved  tinyint(1)  not null,
    idPost    int         not null,
    constraint comments_idComment_uindex
        unique (idComment),
    constraint id
        foreign key (idPost) references posts (id)
);

create index id_idx
    on comments (idPost);

