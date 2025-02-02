
-- TABELAT E KRIJUARA NE phpMyAdmin

-- Krijimi i tabeles useri:

CREATE TABLE useri (
    id int auto_increment primary key,
    email varchar(255) not null,
    password varchar(255) not null,
    role enum('admin','user') default 'user';
);

-- Krijimi i tabeles Contact us:

CREATE TABLE contactus (
    id int auto_increment primary key,
    emri varchar(255) not null,
    email varchar(255) not null,
    msg TEXT not null
);

-- Krijimi i tabeles Houses:

CREATE TABLE houses (
    id int auto_increment primary key,
    title varchar(255),
    description TEXT,
    location varchar(255), 
    image_url varchar(255),
    email varchar(255) not null 
);

-- Krijimi i tabeles New:

CREATE TABLE new (
    id int auto_increment primary key,
    title varchar(255) not null,
    img varchar(255) not null,
    description TEXT not null
); 
