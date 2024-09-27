Database star:

    create database star
    default character set utf8
    default collate utf8_german2_ci; 

Table users:

    create table users (
        id int(9) auto_increment primary key,
        email varchar(255) not null unique,
        password varchar(255) not null
    ) default charset = utf8;


Table products:

    create table products (
        id int(9) auto_increment primary key,
        name varchar(60) not null unique,
        brand varchar(60) not null,
        category varchar(45) not null,
        created_by varchar(255) not null,
        price decimal(10, 2) not null,
        created_at timestamp default current_timestamp,
        updated_at timestamp default current_timestamp on update current_timestamp, 
        foreign key (created_by) references users(email)
    ) default charset = utf8;