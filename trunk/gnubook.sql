-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 12 Novembre 2009 à 16:41
-- Version du serveur: 5.1.37
-- Version de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gnubook`
--

-- --------------------------------------------------------

--
-- Structure de la table `gb_users`
--

CREATE TABLE IF NOT EXISTS `gb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `type` text NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `gb_users`
--

CREATE TABLE IF NOT EXISTS `gb_activity` (`id` INT NOT NULL AUTO_INCREMENT, `url` TEXT NOT NULL, `text` TEXT NOT NULL, `recipients` TEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = MyISAM;

-- --------------------------------------------------------

--
-- Structure de la table `gb_search`
--

CREATE TABLE IF NOT EXISTS `gb_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

