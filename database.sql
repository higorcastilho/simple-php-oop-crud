create database 'php_oop_crud_database';

use 'php_oop_crud_database';

CREATE TABLE `users` (
	`id` int(11) NOT NULL auto_increment,
	`name` varchar(100) NOT NULL,
	`age` int(3) NOT NULL,
	`email` varchar(100) NOT NULL,
	PRIMARY KEY (`id`) 
);