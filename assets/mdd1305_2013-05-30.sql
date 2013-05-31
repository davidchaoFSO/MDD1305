# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: mdd1305
# Generation Time: 2013-05-30 20:43:18 -0500
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table games
# ------------------------------------------------------------

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;

INSERT INTO `games` (`id`, `user`, `title`, `status`, `comment`, `created_at`, `updated_at`)
VALUES
	(2,'davidchao','some title','Not Started','testing dropdown',1368803647,1368803702),
	(4,'davidchao','the third title','Stuck','testing create with disabled user field',1369200225,1369200225),
	(5,'davidchao','another title','In Progress','testing update',1369200547,1369200547),
	(6,'johndoe123','super mario','Stuck','Stage 5-3',1369961103,1369961128);

/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`type`, `name`, `migration`)
VALUES
	('app','default','001_create_games'),
	('package','auth','001_auth_create_usertables'),
	('package','auth','002_auth_create_grouptables'),
	('package','auth','003_auth_create_roletables'),
	('package','auth','004_auth_create_permissiontables'),
	('package','auth','005_auth_create_authdefaults'),
	('package','auth','006_auth_add_authactions'),
	('package','auth','007_auth_add_permissionsfilter');

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `email`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`)
VALUES
	(1,'davidchao','D0leR+IiGjLO21baLH4fygCGNUJJAGXVBm11cSoIGQM=',1,'davidchao@fullsail.edu','1369954531','ccdd009f9d52da8efb2659047b47f3513bc9934e','a:5:{s:9:\"firstname\";s:5:\"David\";s:8:\"lastname\";s:4:\"Chao\";s:9:\"birthdate\";s:10:\"1985-07-10\";s:10:\"newsletter\";i:1;s:8:\"question\";s:4:\"chao\";}',1369184205,1369952901),
	(2,'testuser','MiLbCsfkX1wODwZ6aJZTN91JnxHDcR64WA5VF0M1ySA=',1,'testuser@gmail.com','1369201170','142301afeb95c07bf19150fbf638ca71b92c1696','a:0:{}',1369193172,0),
	(3,'testuser2','MiLbCsfkX1wODwZ6aJZTN91JnxHDcR64WA5VF0M1ySA=',1,'testuser2@gmail.com','1369195758','8c526f3640d19ba176aee11be31db2f4d411e691','a:0:{}',1369193446,0),
	(4,'johndoe123','D0leR+IiGjLO21baLH4fygCGNUJJAGXVBm11cSoIGQM=',1,'johndoe123@geocities.com','1369961034','1d0aafc1d1e826a8cc1ffa2a5b08fcea55153ab3','a:5:{s:9:\"firstname\";s:4:\"John\";s:8:\"lastname\";s:3:\"Doe\";s:9:\"birthdate\";s:10:\"1980-05-05\";s:10:\"newsletter\";i:1;s:8:\"question\";s:5:\"Smith\";}',1369961034,1369961070);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
