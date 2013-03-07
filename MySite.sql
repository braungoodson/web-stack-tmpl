create database if not exists MySite;
connect MySite;

create user 'MySite'@'localhost' identified by 'MySite';
grant all privileges on MySite.* to 'MySite'@'localhost';
flush privileges;

create table users (
	uid float(64,0) auto_increment not null primary key,
	uname varchar(255) not null unique key,
	upassword varchar(255) not null,
	uemail varchar(255) not null,
	urole varchar(255) not null
);

insert into users (uname,upassword,uemail,urole) values (
	'administrator',
	'administrator',
	'administrator@mysite.com',
	'administrator'
);
