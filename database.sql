create database mariadb;
use mariadb;
create table users
(
Id int Primary key auto_increment,
login varchar(20) not null unique,
password varchar(20) not null
);

