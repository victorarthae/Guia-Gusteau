-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Set-2015 às 01:08
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guiagusteau`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `freezers`
--

CREATE TABLE IF NOT EXISTS `freezers` (
  `id_user` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_ingredient`),
  KEY `fk_ingredient_idx` (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id_user` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL,
  `grade` float NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_recipe_idx` (`id_recipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id_ingredient` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id_ingredient`),
  UNIQUE KEY `id_ingredient_UNIQUE` (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id_user` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `photo` blob,
  `gender` varchar(1) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user_UNIQUE` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id_user`, `birthday`, `photo`, `gender`, `email`) VALUES
(1, '0000-00-00', '', 'M', 'victorragaricaq@gmail.com'),
(3, '0000-00-00', '', 'M', 'victorragaricaq@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `id_recipe` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(145) NOT NULL,
  `description` longtext NOT NULL,
  `grade` float DEFAULT NULL,
  `youtube_link` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id_recipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recipes_ingredients`
--

CREATE TABLE IF NOT EXISTS `recipes_ingredients` (
  `id_recipe` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  PRIMARY KEY (`id_recipe`,`id_ingredient`),
  KEY `fk_ingredient_idx` (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `facebook` tinyint(1) DEFAULT NULL,
  `googleplus` tinyint(1) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user_UNIQUE` (`id_user`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `username`, `facebook`, `googleplus`, `password`) VALUES
(1, 'vgarcia', 1, NULL, '123abc'),
(3, 'hahaha', NULL, NULL, 'vsf');

--
-- Acionadores `users`
--
DROP TRIGGER IF EXISTS `users_AFTER_INSERT`;
DELIMITER //
CREATE TRIGGER `users_AFTER_INSERT` AFTER INSERT ON `users`
 FOR EACH ROW BEGIN
	insert into profiles (id_user) values (new.id_user);
END
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `freezers`
--
ALTER TABLE `freezers`
  ADD CONSTRAINT `fk_ingredient_frezeers` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredients` (`id_ingredient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_freezers` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_recipe_grades` FOREIGN KEY (`id_recipe`) REFERENCES `recipes` (`id_recipe`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_grades` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `fk_user_profiles` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `recipes_ingredients`
--
ALTER TABLE `recipes_ingredients`
  ADD CONSTRAINT `fk_ingredient_rein` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredients` (`id_ingredient`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recipe_rein` FOREIGN KEY (`id_recipe`) REFERENCES `recipes` (`id_recipe`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
