-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.31-0ubuntu0.12.10.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-07-09 00:45:03
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for fotoboth
CREATE DATABASE IF NOT EXISTS `fotoboth` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fotoboth`;


-- Dumping structure for table fotoboth.albums
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `place` varchar(30) NOT NULL,
  `photographer` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `when` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fotoboth.albums: ~0 rows (approximately)
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` (`id`, `title`, `description`, `place`, `photographer`, `model`, `when`, `category_id`, `created`, `modified`) VALUES
	(1, 'Album 1', 'DescriÃ§Ã£o do album 1', 'Taquara', 'Murilo', 'Murilo', '2013-07-09', 0, '2013-07-09 00:43:50', '2013-07-09 00:43:50');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;


-- Dumping structure for table fotoboth.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fotoboth.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table fotoboth.pictures
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `picture_path` varchar(200) NOT NULL,
  `file_size` varchar(250) NOT NULL,
  `album_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table fotoboth.pictures: ~13 rows (approximately)
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` (`id`, `title`, `dir`, `picture_path`, `file_size`, `album_id`, `created`, `modified`) VALUES
	(13, 'qwqwqwqwqw', 'files', 'foto-coelhoMDAzNjAy.jpg', '6.87 KB', 0, '2013-07-08 00:36:02', '2013-07-08 00:36:02');
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;


-- Dumping structure for table fotoboth.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table fotoboth.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `group_id`, `email`, `created`, `modified`) VALUES
	(1, 'Murilo Mothsin da Silveira', 'murilo', 'murilo', 'author', 1, 'mothsin@hotmail.com', '2013-07-02 23:51:40', '2013-07-07 21:33:14'),
	(2, 'admin', 'admin', 'admin', 'admin', 1, 'admin@email.com', '2013-07-03 00:22:44', '2013-07-07 21:33:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;


CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(20) NOT NULL,
  `embed` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;