CREATE DATABASE chatapp;

USE chatapp;

CREATE TABLE `users` (
`users_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
`users_name` varchar(30) DEFAULT NULL,
PRIMARY KEY (`users_id`),
UNIQUE KEY `users_name` (`users_name`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

CREATE TABLE `messages` (
  `messages_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `messages_text` varchar(50) DEFAULT NULL,
  `id_users` int(12) unsigned DEFAULT NULL,
  PRIMARY KEY (`messages_id`),
  KEY `fk_messages_users` (`id_users`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

