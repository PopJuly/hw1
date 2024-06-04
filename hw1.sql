CREATE DATABASE hw1;
USE hw1;

create table users(
	id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null
);

create table insegnamenti(
	id integer primary key auto_increment,
    user_id integer not null,
    nome_insegnamento varchar(250) not null,
    nome_docente varchar(50) not null,
    foreign key (user_id) references users(id)
);

select * from users;
select * from insegnamenti;

/*drop table insegnamenti;*/







