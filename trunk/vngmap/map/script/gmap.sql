drop schema if exists gmap;
create schema gmap character set = 'utf8';

drop table if exists gmap.address;
create table gmap.address(
id bigint auto_increment primary key,
x varchar(30),
y varchar(30),
name varchar(255),
houseno varchar(30),
street varchar(100),
ward varchar(100),
district varchar(100),
provincesorcity varchar(100),
country varchar(100),
fulladdress varchar(4000),
weight bigint,
categoryid bigint,
FULLTEXT (fulladdress)
);

drop table if exists gmap.category;
create table gmap.category(
id bigint auto_increment primary key, 
categoryname varchar(100),
description varchar(1024),
parentid bigint
);

drop table if exists gmap.config;
create table gmap.config(
id bigint auto_increment primary key, 
name varchar(100),
value varchar(100) 
);


drop table if exists gmap.country;
create table gmap.country(
id bigint auto_increment primary key, 
name varchar(100)
);

drop table if exists gmap.city;
create table gmap.city(
id bigint auto_increment primary key, 
country_id  bigint, 
name varchar(100)
);


ALTER TABLE gmap.address ADD `iconpath` VARCHAR( 500 ) NULL AFTER `categoryid`;

insert into gmap.config(`name`,`value`) value ('DEFAULT_ZOOM','15');
insert into gmap.config(`name`,`value`) value ('DEFAULT_LOCATION_ID','1');
insert into gmap.config(`name`,`value`) value ('DEFAULT_COUNTRY_ID','1');
insert into gmap.config(`name`,`value`) value ('DEFAULT_CITY_ID','1');
insert into gmap.config(`name`,`value`) value ('DEFAULT_CATEGORY_ID','1');

insert into gmap.address(`x`,`y`,`name`,`fulladdress`) value ('10.757968550004884', '106.66154567718507','HCM','ho chi minh');

insert into gmap.country(`name`) value ('VietNam');

insert into gmap.city(`country_id`,`name`) value (1,'Ho Chi Minh');

insert into gmap.category(`categoryname`,`description`,`parentid`) value ('Ngan Hang','Ngan Hang',null);