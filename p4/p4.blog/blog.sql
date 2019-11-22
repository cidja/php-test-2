-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `signal` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signal`) VALUES
(1,	2,	'Irene',	'Très bonne idée j\'adore ',	'2019-11-18 11:17:34',	''),
(2,	1,	'Jean jean',	'C\'est un très bon choix aussi',	'2019-11-15 17:15:32',	''),
(3,	1,	'polo',	'toujours la ',	'2019-11-18 09:33:18',	''),
(4,	1,	'test',	'bonjour\r\n',	'2019-11-18 10:26:06',	''),
(5,	1,	'Paul',	'Ceci est un commentaire',	'2019-11-18 10:26:27',	'true'),
(6,	2,	'Raymonde',	'Je trouve ça imonde ',	'2019-11-18 10:34:58',	'FALSE'),
(19,	2,	'ufu',	'ss(s',	'2019-11-20 16:20:43',	'');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1,	'Ceci est mon premier billet',	'Bonjour à tous,\r\nvous découvrirez au fur et à mesure dans ce blog l\'avancement de mon roman, j\'ai besoin de vous pour le faire avancer vos commentaires seront bienvenus ',	'2019-11-14 11:16:12'),
(2,	'Un début d\'inspiration...',	'Mes chers lecteurs je vous écris aujourd\'hui car je n\'ai rien à raconter et je sais que cela en fera rire quelques uns, de ce fait je suis très content de cela.',	'2019-11-15 17:59:21');

-- 2019-11-20 15:47:56
