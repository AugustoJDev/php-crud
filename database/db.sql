create database registereds;

use registereds;

CREATE TABLE `users` (
  `id` int(3) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `contact` int(20) NOT NULL,
  `delivery` DATE,
  `value` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `admin` (
    `name` varchar(15) NOT NULL,
    `login` varchar(15) NOT NULL,
    `password` varchar(15) NOT NULL,
    `token` varchar(16)
)

SELECT * FROM `admin` WHERE 1;

INSERT INTO admin (name, login, password, token) VALUES ('admin', 'admin', 'admin', NULL);