-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- GÃ©nÃ©rÃ© le :  Mer 22 Juin 2016 Ã  00:25
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnÃ©es :  `projet_lo07`
--

-- --------------------------------------------------------

--
-- Structure de la table `chercheur`
--

DROP TABLE IF EXISTS `chercheur`;
CREATE TABLE IF NOT EXISTS `chercheur` (
  `id_chercheur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `laboratoire` varchar(20) NOT NULL,
  `organisation` varchar(20) NOT NULL,
  PRIMARY KEY (`id_chercheur`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chercheur`
--

INSERT INTO `chercheur` (`id_chercheur`, `nom`, `prenom`, `laboratoire`, `organisation`) VALUES
(0, 'admin', 'admin', '', ''),
(1, 'Rouquet', 'RaphaÃ«l', 'LNIO', 'UTT'),
(2, 'Lefeuvre', 'ClÃ©ment', 'LNIO', 'UTT'),
(19, 'Obama', 'Barack', 'GAMMA3', 'USA'),
(20, 'Torvald', 'Linus', 'Tech-CICO', 'Linux'),
(21, 'Polnareff', 'Michel', 'Tech-CICO', 'Chanteur');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `email`, `mdp`, `admin`) VALUES
(0, 'raphael.rouquet@utt.fr', 'admin', 1),
(1, 'r95.rouquet@orange.fr', '123', 0);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `titre` tinytext,
  `categorie` varchar(4) DEFAULT NULL,
  `label` varchar(20) DEFAULT NULL,
  `date` year(4) DEFAULT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id_publication`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `titre`, `categorie`, `label`, `date`, `lieu`, `type`) VALUES
(19, 'ConfÃ©rence 1', 'RI', 'MB', 2016, 'Maison Blanche', 'ConfÃ©rence'),
(20, 'CrÃ©er son systÃ¨me d''exploitation', 'RI', 'LIN', 1990, 'Aucune idÃ©e', 'ConfÃ©rence'),
(21, 'J''aime LO07 de tout mon coeur', 'TD', 'LO07', 2016, 'UTT', 'Ouvrage'),
(22, 'J''aime NF19 de tout mon coeur', 'BV', 'NF19', 2015, 'Chez moi', 'Revue'),
(23, 'On ira tous au paradis', 'RI', 'Chanson', 1972, 'PolnarÃ©volution', 'ConfÃ©rence');

-- --------------------------------------------------------

--
-- Structure de la table `publie`
--

DROP TABLE IF EXISTS `publie`;
CREATE TABLE IF NOT EXISTS `publie` (
  `id_chercheur` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id_chercheur`,`id_publication`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `publie`
--

INSERT INTO `publie` (`id_chercheur`, `id_publication`, `ordre`) VALUES
(1, 19, 1),
(1, 21, 1),
(1, 22, 1),
(1, 23, 2),
(2, 19, 2),
(19, 19, 3),
(20, 20, 1),
(21, 23, 1);

--
-- Contraintes pour les tables exportÃ©es
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`id_compte`) REFERENCES `chercheur` (`id_chercheur`);

--
-- Contraintes pour la table `publie`
--
ALTER TABLE `publie`
  ADD CONSTRAINT `publie_ibfk_1` FOREIGN KEY (`id_chercheur`) REFERENCES `chercheur` (`id_chercheur`),
  ADD CONSTRAINT `publie_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
