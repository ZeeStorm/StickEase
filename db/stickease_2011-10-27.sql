# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: stickease
# Generation Time: 2011-10-27 15:07:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table actions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `actions`;

CREATE TABLE `actions` (
  `action_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `action_text` mediumblob,
  `action_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`action_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `project_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `project_name` varchar(50) NOT NULL DEFAULT '',
  `project_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `project_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `project_deleted` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table stickys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stickys`;

CREATE TABLE `stickys` (
  `sticky_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) unsigned NOT NULL,
  `sticky_note` varchar(140) NOT NULL DEFAULT '',
  `sticky_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sticky_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id_created` int(11) unsigned NOT NULL,
  `user_id_assigned` int(11) unsigned NOT NULL DEFAULT '0',
  `sticky_completed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sticky_priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sticky_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `sticky_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sticky_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tempkeys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tempkeys`;

CREATE TABLE `tempkeys` (
  `tempkey_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `tempkey_key` char(32) NOT NULL DEFAULT '',
  `tempkey_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tempkey_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` char(255) NOT NULL DEFAULT '',
  `user_password` varchar(100) DEFAULT '',
  `user_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_display` varchar(100) NOT NULL DEFAULT '',
  `user_invited` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users_x_projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_x_projects`;

CREATE TABLE `users_x_projects` (
  `uxp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `uxp_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uxp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uxp_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uxp_id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
